<?php
    require_once '../include/config.php';
    include '../include/web/user.php';
    require_once "../vendor/autoload.php";
        
    use Otp\Otp;
    use Otp\GoogleAuthenticator;
    use ParagonIE\ConstantTime\Encoding;
    use chillerlan\QRCode\QRCode;

    switch($_GET['page']){
        case NULL:
            include "../api/user.php";

            $user = new user();

            function getInfos($directory, $jsonFile, $jsonParametr) {
                $result = [];
            
                $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory));
            
                
                foreach ($iterator as $file) {
                    if ($file->isFile() && $file->getFilename() === $jsonFile) {
                        $filePath = $file->getPathname();
                        $lang = basename($file->getPath());
            
                        $jsonContent = json_decode(file_get_contents($filePath), true);
                        if ($jsonContent !== null) {
                            $result[$lang] = $jsonContent[$jsonParametr];
                        }
                    }
                }
            
                return $result;
            }

            $langs = getInfos('../lang', 'lang.json', 'lang_name');
            $themes = getInfos('../themes', 'theme.json', 'name');

            if(isset($_POST['do_change'])){
                $result = $user->change($_SESSION['user']['token'], $_POST['name'], $_POST['desc'], $_POST['yespost']);
                $_SESSION['lang'] = $_POST['language'];
                $_SESSION['theme'] = $_POST['theme'];
            }

            $data = $user->profile($_SESSION['user']['token'], $_SESSION['user']['user_id']);
            break;
        case 'pass':
            $change = "UPDATE users SET pass = '" .password_hash($_POST['pass'], PASSWORD_DEFAULT). "' WHERE id = '" .$_SESSION['user']['user_id']. "'";
            $user = $db->query('SELECT pass FROM users where id = ' .(int)$_SESSION['user']['user_id'])->fetch();

            if(isset($_POST['do_change'])){
                if(!password_verify($_POST['oldpass'], $user['pass'])){
                    $error = lang_old_pass_no;
                }

                if($_POST['pass'] != $_POST['pass2']){
                    $error = lang_2_pass_no;
                }

                if(empty(trim($_POST['pass']))){
                    $error = lang_pass_empty;
                }
                
                if(empty($error)){
                    $db->query($change);
                    header("Location: index.php");
                }
            }
            break;
        case 'otp':
            if($user_account['2fa'] == 0){
                if(isset($_POST['do_2fa'])){
                    $otp = new Otp();
            
                    if($otp->checkTotp(Encoding::base32DecodeUpper($_SESSION['secret']), $_POST['code'])) {
                        $query = "UPDATE users SET secret = '" .$_SESSION['secret']. "' WHERE token = '" .$_SESSION['user']['token']. "'";
                        $db->query($query);
                        header('Location: settings.php');
                    } else{
                        $text = lang_no_code;
                    }
                }
            
                $secret = GoogleAuthenticator::generateRandom();
                $_SESSION['secret'] = $secret;
                $qr = GoogleAuthenticator::getKeyUri('totp', $sitename.':' . $user_account['username'], $secret);
                $qrimg = (new QRCode)->render($qr . '&issuer='.$sitename);
            } else {
                if(isset($_POST['do_unbind'])){
                    $change = "UPDATE users SET secret='' WHERE id = '" .$_SESSION['user']['user_id']. "'";
                    $user = $db->query('SELECT pass FROM users where id = ' .(int)$_SESSION['user']['user_id'])->fetch();

                    if(!password_verify($_POST['pass'], $user['pass'])){
                        $error = lang_pass_no;
                    }
    
                    if(empty($error)){
                        $db->query($change);
                        header("Location: settings.php");
                    }
                }
            }
            break;
    }
?>
 
<?php
    switch($_GET['page']){
        case NULL:
            require "../themes/{$_SESSION['theme']}/settings/settings.php";
            break;
        case 'pass':
            require "../themes/{$_SESSION['theme']}/settings/pass.php";
            break;
        case 'otp':
            if($user_account['2fa'] == 0){
                require "../themes/{$_SESSION['theme']}/settings/otp.php";
            } else {
                require "../themes/{$_SESSION['theme']}/settings/dotp.php";
            }
            break;
    }
?>