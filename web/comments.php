<?php
    require_once '../include/config.php';
    include '../include/web/user.php';

    include "../api/user.php";
    include "../api/comments.php";

    $text = '';
    $user = new user();
    $wall = new comments();

    // Выкладывание поста

    if(isset($_POST['do_post'])){
        $result = $wall->add($_SESSION['user']['token'], $_POST['text'], $_GET['id']);
        if(isset($result['error'])){
            $text = $result['error'];
        }
    }

    // Удаление поста

    if(isset($_GET['del'])){
        $result = $wall->delete($_SESSION['user']['token'], $_GET['del']);
        if(isset($result['error'])){
            $text = $result['error'];
        }
        header("Location: comments.php?id={$_GET['id']}");
        exit();
    }
    
    $data_wall = $wall->get($_SESSION['user']['token'], $_GET['id'], $_GET['p']);

    // Проверка на существование комментах

    if($data_wall['post']['id_from'] == 0){
        header("Location: index.php");
    } else {
        // Узнавание о пользователях из комментов
        
        $user_ids = '';
        $i = 0;

        foreach($data_wall['comments'] as $data){
            $user_ids = $user_ids . (string)$data['user_id'] . ',';
            $i++;
        }

        $user_ids = $user->getuser($user_ids);
        $user_post = $user->getuser($data_wall['post']['user_id']. ',' .$data_wall['post']['id_from']);
    }
?>

<?php require "../themes/{$_SESSION['theme']}/comments/comments.php"; ?>