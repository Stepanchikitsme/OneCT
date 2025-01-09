<?php 
    require_once '../include/config.php';
    
    if($_SESSION['user']['priv'] != 3){
        header("Location: ../index.php");
    }
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="adminer.css">
</head>
<body>
    <div id="content">
        <form action="panel.php" method="post">
            <input type="hidden" name="auth[driver]" value="server">
            <input type="hidden" name="auth[username]" value="<?php echo($dbconn['user']); ?>">
            <input type="hidden" name="auth[password]" value="<?php echo($dbconn['pass']); ?>">
            <p>Это раняя админ панель, в котором есть ссылка только на <input type="submit" value="Adminer"> с функцией редактирования данных ДБ и всё (@cat_flopper не слей сука ДБ)</p>
        </form>
    </div>
    <div id="menu">
        <h1><a target="_blank" rel="noreferrer noopener" id="h1"><?php echo($sitename); ?> Admin panel</a></h1>
    </div>    
</body>
</html>