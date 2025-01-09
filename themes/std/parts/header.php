<!-- Хэдер -->
<div class="clearfix header">
    <a style="float: left;">
        <?php echo($sitename) ?>
    </a>
    
    <a href="javascript:openmenu('side');" id="openmenu" class="header_link">
        <?php echo(lang_menu) ?>
    </a>

    <?php if(isset($_SESSION['user']['token'])): ?>
        <a href="logout.php" class="header_link">
            <?php echo(lang_logout) ?>
        </a>
    <?php endif; ?>
    
    <?php foreach($site_header as $side_name => $side_link): ?>
        <a class="header_link" href="<?php echo($side_link) ?>">
            <?php echo($side_name) ?>
        </a>
    <?php endforeach; ?>
</div>

<!-- Сайдбар -->

<div class="side">
    <?php foreach($side_menu as $side_name => $side_link): ?>
        <a class="href" href="<?php echo($side_link) ?>">
            <?php echo($side_name) ?>
        </a><br>
    <?php endforeach; ?><hr>
</div>