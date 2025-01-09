<?php
    require_once '../include/config.php';
    include '../include/web/user.php';

    include "../api/search.php";

    $search = new search();

    $data = $search->user($_GET['q'], $_GET['p']);
?>

<?php require "../themes/{$_SESSION['theme']}/search/search.php";  ?>