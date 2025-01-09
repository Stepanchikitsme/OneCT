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
                <p><?php echo(lang_name) ?>: </p>
                <input type="text" name="name" value="<?php echo($data['username']) ?>">
            </p>
            <p>
                <p><?php echo(lang_desc) ?>: </p>
                <textarea name="desc"><?php echo($data['description']) ?></textarea>
            </p>
            <p>
                <p><?php echo(lang_yes_post) ?>: </p>
                <select name="yespost">
					<option value="0"><?php echo(lang_cant) ?></option>
					<option value="1"><?php echo(lang_can) ?></option>
				</select>
            </p>
            <p>
                <p><?php echo(lang_lang) ?>: </p>
                <select name="language">
                    <?php foreach($langs as $lang_id => $lang_name): ?>
					    <option 
                            value="<?php echo($lang_id) ?>" 
                            <?php if($lang_id == $_SESSION['lang']) echo('selected') ?>>
                            <?php echo($lang_name) ?>
                        </option>
                    <?php endforeach; ?>
				</select>
            </p>
            <p>
                <p><?php echo(lang_style) ?>: </p>
                <select name="theme">
                    <?php foreach($themes as $theme_id => $theme_name): ?>
					    <option 
                            value="<?php echo($theme_id) ?>" 
                            <?php if($theme_id == $_SESSION['theme']) echo('selected') ?>>
                            <?php echo($theme_name) ?>
                        </option>
                    <?php endforeach; ?>
				</select>
            </p>
            <button type="submit" name="do_change"><?php echo(lang_change) ?></button>
        </form><br>

        <a href="?page=otp">
            <?php
                if($user_account['2fa'] == 1){
                    echo(lang_disable_2fa);
                } else{
                    echo(lang_enable_2fa);
                }
            ?>
        </a><br>

        <a href="?page=pass"><?php echo(lang_change_pass) ?></a>
    </div><br>

    <?php include "../themes/{$style}/parts/footer.php" ?>
</body>
</html>