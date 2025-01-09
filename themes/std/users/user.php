<!DOCTYPE html>
<html>
<head>
    <?php include "../themes/{$style}/parts/head.php" ?>
    <title>
        <?php echo(htmlspecialchars($data_user[0]['username'])) ?>
    </title>
    <script src="../themes/std/js.js"></script>
</head>
<body>
    <?php include "../themes/{$style}/parts/header.php" ?>
    
    <div class="page">
        <!-- Аватарка пользователя -->

        <img src="
            <?php if(isset($data_user[0]['img100'])): ?>
                <?php echo($data_user[0]['img100']) ?>
            <?php else: ?>
                ../themes/std/imgs/blankimg.jpg
            <?php endif; ?>
        " width="100px" style="float: left; margin-right: 8px;">

        <!-- Имя пользователя -->

        <h2>
            <?php echo(htmlspecialchars($data_user[0]['username'])) ?> 
            <?php if($data_user[0]['privilege'] >= 1): ?>
                <img src="../themes/std/imgs/verif.gif">
            <?php endif; ?>
        </h2>

        <!-- Описание пользователя -->

        <p>
            <?php echo(lang_desc) ?> : 
            <?php echo(htmlspecialchars($data_user[0]['description'])) ?>
        </p><br>

        <h1 align="center" class="block_name">
            <?php echo(lang_wall) ?> 
        </h1>

        <!-- Блок для постинга -->

        <?php 
            if($_GET['id'] == $_SESSION['user']['user_id'] or $data_user[0]['openwall'] == true)
                include "../themes/{$style}/parts/posting.php"
        ?>            

        <!-- Посты -->

        <?php $i = 0; foreach($data_wall as $data): ?>
            <?php include "../themes/{$style}/parts/post.php" ?>
        <?php $i++; endforeach; ?>

        <!-- Кнопки страниц -->

        <?php include "../themes/{$style}/parts/post_buttons.php" ?>
    </div>
    
    <?php include "../themes/{$style}/parts/footer.php" ?>
</body>
</html>