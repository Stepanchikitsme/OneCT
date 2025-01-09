<?php if((int)$_GET['p'] >= 1): ?>
    <a style="float: left;" href="<?php echo('?q=' .(int)$_GET['p']. '&p=' .(int)$_GET['p'] - 1); ?>">
        <?php echo(lang_back) ?>
    </a>
<?php elseif(count($data) >= 50): ?>
    <a style="float: right;" href="<?php echo('?q=' .(int)$_GET['p']. '&p=' .(int)$_GET['p'] + 1) ?>">
        <?php echo(lang_forward) ?>
    </a>
<?php endif; ?><br>