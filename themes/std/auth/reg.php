<!DOCTYPE html>
<html>
<head>
    <?php include "../themes/{$style}/parts/head.php" ?>
    <title><?php echo(lang_reg) ?></title>
    <script src="../themes/std/js.js"></script>
</head>
<body>
    <?php include "../themes/{$style}/parts/header.php" ?>

    <div class="page">
        <form action="" method="post">
            <p>
				<p><?php echo(lang_nickname) ?>:</p>
				<input type="text" name="username" maxlength="50">
			</p>
			<p>
				<p><?php echo(lang_email) ?>:</p>
				<input type="email" name="email">
			</p>
			<p>
				<p><?php echo(lang_pass) ?>:</p>
				<input type="password" name="pass" maxlength="20">
			</p>
			<p>
				<p><?php echo(lang_repeat_pass) ?>:</p>
				<input type="password" name="pass2">
			</p>
			<p>
				<p><?php echo(lang_captcha) ?>:</p>
				<img src="resources/captcha.php"><br>
				<input type="text" name="captcha">
			</p>
			<p>
				<button type="submit" name="do_signup">
                    <?php echo(lang_register) ?>
                </button>
			</p>
        </form>
		<p><?php echo($text) ?></p>
    </div>

    <?php include "../themes/{$style}/parts/footer.php" ?>
</body>
</html>