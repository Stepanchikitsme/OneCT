<?php 
    require_once '../include/config.php';
    ini_set('display_errors', false);

    if($_GET['page'] == NULL){
        if(isset($_SESSION['user']['token'])){
            header("Location: user.php");
        }
    }
?>

<?php
    switch($_GET['page']){
        case NULL:
            require "../themes/{$_SESSION['theme']}/index/index.php"; 
            break;
        case 'terms':
            require "../themes/{$_SESSION['theme']}/index/terms.php"; 
            break;
        case 'authors':
            $data = $db->query("SELECT id, name, img100 FROM users WHERE priv > 1");            
            require "../themes/{$_SESSION['theme']}/index/authors.php"; 
            break;
    }
?>