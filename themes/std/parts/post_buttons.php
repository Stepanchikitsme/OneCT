<?php if((int)$_GET['p'] >= 1): ?>
    <a style="float: left;" href="<?php echo('?id=' .(int)$_GET['id']. '&p=' .(int)$_GET['p'] - 1); ?>">
        <?php echo(lang_back) ?>
    </a>
<?php endif; ?>
<?php if(count($data_wall) >= 10): ?>
    <a style="float: right;" href="<?php echo('?id=' .(int)$_GET['id']. '&p=' .(int)$_GET['p'] + 1) ?>">
        <?php echo(lang_forward) ?>
    </a>
<?php endif; ?><br>
