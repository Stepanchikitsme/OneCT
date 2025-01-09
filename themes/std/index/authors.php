<!DOCTYPE html>
<html>
<head>
    <?php include "../themes/{$style}/parts/head.php" ?>
    <title><?php echo(lang_authors) ?></title>
    <script src="../themes/std/js.js"></script>
</head>
<body>
    <?php include "../themes/{$style}/parts/header.php" ?>

    <div class="page">
            <p><?php echo(lang_authors_text1) ?></p><br>
            
            <a href="https://github.com/dibof228">
                <img src="https://avatars.githubusercontent.com/u/85364286?v=4" width="100px" style="float: left; margin-right: 8px;">
                <h2>dibof228 (Github)</h2>
            </a><br><br><br>

            <p><?php echo(lang_authors_text2) ?></p><br>

            <?php while($list = $data->fetch(PDO::FETCH_ASSOC)): ?>
                <?php $list['username'] = $list['name'] ?>
                <?php include "../themes/{$style}/parts/search_user.php" ?>
            <?php endwhile; ?>

            <p><?php echo(lang_authors_text3) ?></p>
        </div><br>

    <?php include "../themes/{$style}/parts/footer.php" ?>
</body>
</html>