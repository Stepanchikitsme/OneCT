<!DOCTYPE html>
<html>
<head>
    <?php include "../themes/{$style}/parts/head.php" ?>
    <title><?php echo(lang_login) ?></title>
    <script src="../themes/std/js.js"></script>
</head>
<body>
    <?php include "../themes/{$style}/parts/header.php" ?>

    <div class="page">
        <form action="" method="post">
            <p>
                <p><?php echo(lang_email) ?>:</p>
                <input type="email" name="email">
            </p>
            
            <p>
                <p><?php echo(lang_pass) ?>:</p>
                <input type="password" name="pass">
            </p>
            
            <p>
                <p><?php echo(lang_2fa_if) ?>:</p>
                <input type="text" name="code">
            </p>

            <p>
                <button type="submit" name="login"><?php echo(lang_login) ?></button>
            </p>
        </form>
		<p><?php echo($text) ?></p>
    </div>

    <?php include "../themes/{$style}/parts/footer.php" ?>
</body>
</html>