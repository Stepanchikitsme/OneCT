<br>
<div style="max-width: 640px; margin: auto; text-align: center;">
    <div>
        <?php foreach ($footer_links as $name => $link): ?>
            <a href="<?php echo($link) ?>" class="link"><?php echo($name) ?></a> 
        <?php endforeach; ?>
    </div>
    
    <p>php: <?php echo(phpversion()); ?> | MySQL: <?php echo($db->query('SELECT VERSION()')->fetchColumn()); ?></p>

    <p> | 
        <?php foreach ($links as $name => $link): ?>
            <a href="<?php echo($link) ?>"><?php echo($name) ?></a> |
        <?php endforeach; ?>
    </p>
</div>