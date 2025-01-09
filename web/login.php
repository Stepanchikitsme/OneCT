<?php 
    require_once '../include/config.php';
    include "../api/account.php";

    if(isset($_SESSION['user']['token'])){
        header("Location: user.php");
    }

    if(isset($_POST['login'])){
        $login = new account();
        $info = $login->login($_POST['email'], $_POST['pass'], $_POST['code']);
        if(isset($info['error'])){
            $text = $info['error'];
        } elseif(isset($info['token'])){
            $_SESSION['user'] = $info;
            header("Location: user.php");
        }
    }
?>

<?php require "../themes/{$_SESSION['theme']}/auth/login.php"; ?>