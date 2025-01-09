<?php 
    require_once '../include/config.php';

	ini_set('display_errors', false);

    if(isset($_SESSION['user']['token'])){
        header("Location: user.php");
    }
							
	if(isset($_POST['do_signup'])){
        $checkemail = "SELECT email FROM users WHERE email = " .$db->quote($_POST['email']);
        $checkip = "SELECT ip FROM users WHERE ip = " .$db->quote($_SERVER['REMOTE_ADDR']);
        $createacc = "INSERT INTO users(name, email, pass, ip) VALUES (
            " .$db->quote($_POST['username']). ", 
            " .$db->quote($_POST['email']). ", 
            '" .password_hash($_POST['pass'], PASSWORD_DEFAULT). "', 
            " .$db->quote($_SERVER['REMOTE_ADDR']). ")";

		if(empty(trim($_POST['username']))){
			$text = lang_no_user;
		}
						
		if(empty(trim($_POST['email']))){
			$text = lang_no_email;
		}
						
		if(empty(trim($_POST['pass']))){
			$text = lang_no_pass;
		}	
						
		if($_POST['pass2'] != $_POST['pass'] ){
			$text = lang_no_2_pass;
		}

		if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
			$text = lang_invalid_email;
		}
						
		if($db->query($checkemail)->rowCount() != 0){
			$text = lang_full_email;
		}	
		
		if($_SESSION['code'] != $_POST['captcha']){
			$text = lang_no_captcha;
		}	

		if(empty(trim($text))){
			if($db->query($createacc)){
				$text = lang_yes_reg;
			} else {
				$text = lang_server_error;
			}
		}
	}
?>

<?php require "../themes/{$_SESSION['theme']}/auth/reg.php"; ?>