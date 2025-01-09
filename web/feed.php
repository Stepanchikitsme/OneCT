<?php
    require_once '../include/config.php';
    include '../include/web/user.php';

    include "../api/user.php";
    include "../api/wall.php";

    $text = '';
    $user = new user();
    $wall = new wall();

    // Выкладывание поста

    if(isset($_POST['do_post'])){
        $result = $wall->add($_SESSION['user']['token'], $_POST['text'], $_SESSION['user']['user_id']);
        if(isset($result['error'])){
            $text = $result['error'];
        }
        header("Location: feed.php");
        exit();
    }

    // Лайк

    if(isset($_GET['like'])){
        $result = $wall->like($_SESSION['user']['token'], $_GET['like']);
        if(isset($result['error'])){
            $text = $result['error'];
        }
        header("Location: feed.php?p={$_GET['p']}#post{$_GET['like']}");
        exit();
    }

    // Удаление поста

    if(isset($_GET['del'])){
        $result = $wall->delete($_SESSION['user']['token'], $_GET['del']);
        if(isset($result['error'])){
            $text = $result['error'];
        }
        header("Location: feed.php?p={$_GET['p']}");
        exit();
    }


    // Узнавание о пользователях со стены

    $data_wall = $wall->getglobal($_SESSION['user']['token'], (int)$_GET['p']);
    
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
?>

<?php require "../themes/{$_SESSION['theme']}/feed/feed.php";  ?>