<div>
    <!-- Аватарка пользователя -->
    <img style="float: left; margin-right: 8px;" src="
        <?php if(isset($user_ids[$i]['img50'])): ?>
            <?php echo($user_ids[$i]['img50']) ?>
        <?php else: ?>
            ../themes/std/imgs/blankimg.jpg
        <?php endif; ?>
    " width="50px"> 
    
    <div class="post_block1">

        <!-- Пользователь -->

        <b>
            <a href="user.php?id=<?php echo($user_ids[$i]['id']) ?>">
                <?php echo(htmlspecialchars($user_ids[$i]['username'])) ?>
            </a>
        </b>

        <!-- Действия с комментарием -->

        <?php if($user_ids[$i]['id'] == $_SESSION['user']['user_id'] or $_SESSION['user']['priv'] >= 2): ?>
            <div style="float: right;">
                <a href="<?php echo('?id=' .$_GET['id']. '&del=' .$data['id']) ?>">
                    <img src="../themes/std/imgs/del.gif">
                </a>
            </div>
        <?php endif; ?><br>

        <!-- Дата комментария -->
        <span>
            <?php echo(date(lang_date, $data['date'])) ?>
        </span>

    </div>

    <!-- Текст комментария -->
    <p>
        <?php echo(htmlspecialchars($data['text'])) ?>
    </p>
</div>