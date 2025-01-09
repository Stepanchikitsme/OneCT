<!DOCTYPE html>
<html>
<head>
    <?php include "../themes/{$style}/parts/head.php" ?>
    <title><?php echo(lang_settings) ?></title>
    <script src="../themes/std/js.js"></script>
</head>
<body>
    <?php include "../themes/{$style}/parts/header.php" ?>

    <div class="page">
        <p><?php echo(lang_2fa_text) ?></p>
        <img width="300px" style="background: white;" src="<?php echo($qrimg) ?>"><br>
        <p><?php echo(lang_your_secret) ?>: <?php echo($secret) ?></p>
        <p><?php echo(lang_code) ?>:</p>
        <form action="" method="post">
            <input type="text" name="code">
            <button type="submit" name="do_2fa"><?php echo(lang_bind) ?></button>
        </form>
    </div><br>

    <?php include "../themes/{$style}/parts/footer.php" ?>
</body>
</html>