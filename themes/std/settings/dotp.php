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
        <form method="post">
            <p>
                <p><?php echo(lang_repeat_pass) ?>:</p>
                <input type="password" name="pass">
            </p>
            <p>
                <button type="submit" name="do_unbind">
                    <?php echo(lang_unbind) ?>
                </button>
            </p>
            </form>
            <p><?php echo($error) ?></p>
    </div><br>

    <?php include "../themes/{$style}/parts/footer.php" ?>
</body>
</html>