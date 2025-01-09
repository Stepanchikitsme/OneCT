<!DOCTYPE html>
<html>
<head>
    <?php include "../themes/{$style}/parts/head.php" ?>
    <title><?php echo(lang_change_avatar) ?></title>
    <script src="../themes/std/js.js"></script>
</head>
<body>
    <?php include "../themes/{$style}/parts/header.php" ?>

    <div class="page">
        <form action="" method="post" enctype="multipart/form-data">
            <p>
                <p><?php echo(lang_avatar) ?>: </p>
                <input type="file" name="file">
            </p>

            <button type="submit" name="do_change">
                <?php echo(lang_change) ?>
            </button>
        </form>
    </div>

    <?php include "../themes/{$style}/parts/footer.php" ?>
</body>
</html>