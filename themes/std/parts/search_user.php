<a href="user.php?id=<?php echo($list['id']); ?>">
    <!-- Аватарка -->
    <img src="
        <?php if(isset($list['img100'])): ?> 
            <?php echo($list['img100']) ?> 
        <?php else: ?> 
            ../themes/std/imgs/blankimg.jpg
        <?php endif; ?>
    " width="100px" style="float: left; margin-right: 8px;">

    <h1>   
        <!-- Имя пользоателя -->
        <?php echo(htmlspecialchars($list['username'])) ?>
        
        <!-- Галочка -->
        <?php if($list['privilege'] >= 1): ?>
            <img src="../themes/std/imgs/verif.gif">
        <?php endif; ?>
    </h1>
</a><br><br><br>