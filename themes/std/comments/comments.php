<!DOCTYPE html>
<html>
<head>
    <?php include "../themes/{$style}/parts/head.php" ?>
    <title><?php echo(lang_comments) ?></title>
    <script src="../themes/std/js.js"></script>
</head>
<body>
    <?php include "../themes/{$style}/parts/header.php" ?>

    <div class="page">
        <?php include "../themes/{$style}/parts/comments_post.php" ?>

        <h1 align="center" class="block_name">
            <?php echo(lang_comments) ?>
        </h1>

        <form action="" method="post" enctype="multipart/form-data"  class="post_block">
            <textarea name="text" style="width: 100%;"></textarea>
            <button type="submit" name="do_post">
                <?php echo(lang_post) ?>
            </button>
            <p>
                <?php echo($text) ?>
            </p>
        </form>

        <?php $i = 0; foreach($data_wall['comments'] as $data): ?>
            <?php include "../themes/{$style}/parts/comment.php" ?>
        <?php $i++; endforeach; ?>
    </div>

    <?php include "../themes/{$style}/parts/footer.php" ?>
</body>
</html>