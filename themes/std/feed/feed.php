<!DOCTYPE html>
<html>
<head>
    <?php include "../themes/{$style}/parts/head.php" ?>
    <title><?php echo(lang_feed) ?></title>
    <script src="../themes/std/js.js"></script>
</head>
<body>
    <?php include "../themes/{$style}/parts/header.php" ?>
    
    <div class="page">
        <?php include "../themes/{$style}/parts/posting.php" ?>            

        <?php $i = 0; foreach($data_wall as $data): ?>
            <?php include "../themes/{$style}/parts/post.php" ?>
        <?php $i++; endforeach; ?>

        <?php include "../themes/{$style}/parts/post_buttons.php" ?>
    </div>
    
    <?php include "../themes/{$style}/parts/footer.php" ?>
</body>
</html>