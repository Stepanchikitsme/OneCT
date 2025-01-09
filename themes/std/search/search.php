<!DOCTYPE html>
<html>
<head>
    <?php include "../themes/{$style}/parts/head.php" ?>
    <title><?php echo(lang_search) ?></title>
    <script src="../themes/std/js.js"></script>
</head>
<body>
    <?php include "../themes/{$style}/parts/header.php" ?>

    <div class="page">
        <!-- Форма поиска -->

        <form action="" method="get">
            <input type="text" name="q" placeholder="<?php echo(lang_user_search) ?>" value="<?php echo($_GET['q']) ?>" class="search">
            <button type="submit"><?php echo(lang_search) ?></button>
        </form>

        <!-- Сами пользователи -->

        <?php $i = 0; foreach($data as $list): ?>
            <?php include "../themes/{$style}/parts/search_user.php" ?>
        <?php $i++; endforeach; ?>

        <!-- Навигация по страницам -->
        
        <?php include "../themes/{$style}/parts/search_buttons.php" ?>

    </div><br>

    <?php include "../themes/{$style}/parts/footer.php" ?>
</body>
</html>