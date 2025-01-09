<?php
    require_once '../include/config.php';
    include '../include/web/user.php';

    include "../api/user.php";
    include "../api/wall.php";

    $text = '';
    $user = new user();
    $wall = new wall();

    switch($_GET['page']){
        case NULL:
            // Выкладывание поста

            if(isset($_POST['do_post'])){
                $result = $wall->add($_SESSION['user']['token'], $_POST['text'], $_GET['id']);
                if(isset($result['error'])){
                    $text = $result['error'];
                }
            }

            // Лайк

            if(isset($_GET['like'])){
                $result = $wall->like($_SESSION['user']['token'], $_GET['like']);
                if(isset($result['error'])){
                    $text = $result['error'];
                }
                header("Location: user.php?id={$_GET['id']}&p={$_GET['p']}#post{$_GET['like']}");
                exit();
            }

            // Закреп

            if(isset($_GET['pin'])){
                $result = $wall->pin($_SESSION['user']['token'], $_GET['pin']);
                if(isset($result['error'])){
                    $text = $result['error'];
                }
                header("Location: user.php?id={$_GET['id']}&p={$_GET['p']}");
                exit();
            }

            // Удаление поста

            if(isset($_GET['del'])){
                $result = $wall->delete($_SESSION['user']['token'], $_GET['del']);
                if(isset($result['error'])){
                    $text = $result['error'];
                }
                header("Location: user.php?id={$_GET['id']}&p={$_GET['p']}");
                exit();
            }

            // А твой ли профиль?

            if($_GET['id'] == $_SESSION['user']['user_id']){
                $data_user[0] = $user->profile($_SESSION['user']['token'], $_GET['id']);
                $_SESSION['user']['priv'] = $data_user[0]['privilege'];
            } else{
                $data_user = $user->getuser($_GET['id']);
            }

            // Проверка на существование профиля

            if($data_user[0]['username'] == 'Not found' or isset($data_user['error'])){
                header("Location: user.php?id=" .$_SESSION['user']['user_id']);
            } else {
                // Узнавание о пользователях со стены

                $data_wall = $wall->getbyuser($_SESSION['user']['token'], $_GET['id'], (int)$_GET['p']);
                
                $user_ids = '';
                $from_ids = '';
                $i = 0;

                foreach($data_wall as $data){
                    $user_ids = $user_ids . (string)$data['user_id'] . ',';
                    $from_ids = $from_ids . (string)$data['id_from'] . ',';
                    $i++;
                }

                $user_ids = $user->getuser($user_ids);
                $from_ids = $user->getuser($from_ids);
            }

            break;
        case 'avatar':
            if(isset($_POST['do_change'])){
                $result = $user->avatar($_SESSION['user']['token']);
                header("Location: index.php");
            }

            break;
    }
?>

<?php 
    $site_header = array(
        lang_change_avatar => '?page=avatar'
    );

    switch($_GET['page']){
        case NULL:
            require "../themes/{$_SESSION['theme']}/users/user.php"; 
            break;
        case 'avatar':
            require "../themes/{$_SESSION['theme']}/users/avatar.php"; 
            break;
    }
?>