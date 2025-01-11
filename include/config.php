<?php
    require_once 'db.php';

    session_start();

    $url = 'http://' .$_SERVER['HTTP_HOST'] /* . '/newct' */;
    $sitename = 'OneCt';
    $siteadmintg = '@dibof228';
    $style = 'std';
    $antispam = 60;
    $lang = "ru";
    $links = array(
        'Telegram' => 'https://t.me/openone_channel',
        'Github' => 'https://github.com/OpenOneorg/onect',
        'API' => 'https://github.com/OpenOneorg/OneCT/wiki/API'
    );

    // Выполнение конфига

    $db = new PDO("mysql:host=" .$dbconn['server']. ";dbname=" .$dbconn['db'],
        $dbconn['user'],
        $dbconn['pass']
    );

    $db->exec("set names utf8mb4");

    if($db == false){
        die('Ошибка подключение базы данных');
    }

    if(!isset($_SESSION['theme'])){
        $_SESSION['theme'] = $style;
    }
    
    if(!isset($_SESSION['lang'])){
        $_SESSION['lang'] = $lang;
    }

    include "../lang/{$_SESSION['lang']}/lang.php";

    if(isset($_SESSION['user']['token'])){
        $side_menu = array(
            lang_home => 'index.php',
            lang_feed => 'feed.php',
            lang_search => 'search.php',
            lang_settings => 'settings.php'
        );

        if($_SESSION['user']['priv'] == 3){
            $side_menu[lang_admin_panel] = '../admin';
        }
    } else {
        $side_menu = array(
            lang_login => 'login.php',
            lang_reg => 'reg.php'
        );
    }

    $footer_links = array(
        lang_terms => 'index.php?page=terms',
        lang_authors => 'index.php?page=authors'
    )
?>
