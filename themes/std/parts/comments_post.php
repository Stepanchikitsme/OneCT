<!-- Аватарка пользователя -->

<img style="float: left; margin-right: 8px;" src="
    <?php if(isset($user_post[0]['img50'])): ?>
        <?php echo($user_post[0]['img50']) ?>
    <?php else: ?>
        ../themes/std/imgs/blankimg.jpg
    <?php endif; ?>
" width="50px"> 

<!-- Имя пользователя -->

<div class="post_block1">

    <b>
        <?php echo(htmlspecialchars($user_post[1]['username'])) ?>
    </b><br>

    <!-- Дата поста -->

    <span>
        <?php echo(date(lang_date, $data_wall['post']['date'])) ?>
    </span><br>

    <!-- Какой пользователей выложил -->

    <b>
        <?php echo(lang_by) ?>: 
        <a href="<?php echo('user.php?id=' .$user_post[0]['id']) ?>">
            <?php echo(htmlspecialchars($user_post[0]['username'])) ?>
        </a>
    </b><br>

</div>

<!-- Изображение поста -->

<?php if(isset($data_wall['post']['image'])): ?>
    <img src="<?php echo($data_wall['post']['image']) ?>" width="100%">
<?php endif; ?>

<!-- -->

<p>
    <?php echo(htmlspecialchars($data_wall['post']['text'])) ?>
</p>