    <div id="<?php echo('post'. $data['id']) ?>">
        <!-- Аватарка пользователя -->

        <img style="float: left; margin-right: 8px;" src="
            <?php if(isset($user_ids[$i]['img50'])): ?>
                <?php echo($user_ids[$i]['img50']) ?>
            <?php else: ?>
                ../themes/std/imgs/blankimg.jpg
            <?php endif; ?>
        " width="50px"> 

        <div class="post_block1">

        <!-- Имя пользователя -->

            <b>
                <?php echo(htmlspecialchars($from_ids[$i]['username'])) ?>
            </b>

            <!-- Текст закрепления -->

            <span>
                <?php if($data['is_pin'] == true) echo(lang_pin) ?>
            </span><br>

            <!-- Кнопки действий -->

            <?php if($_GET['id'] == $_SESSION['user']['user_id'] or $from_ids[$i]['id'] == $_SESSION['user']['user_id'] or $_SESSION['user']['priv'] >= 2): ?>
                <div style="float: right;">
                    <a href="<?php echo('?id=' .$_GET['id']. '&del=' .$data['id']) ?>">
                        <img src="../themes/std/imgs/del.gif">
                    </a>
                    
                    <a href="<?php echo('?id=' .$_GET['id']. '&pin=' .$data['id']) ?>">
                        <img src="../themes/std/imgs/pin.gif">
                    </a>
                </div>
            <?php endif; ?>

            <!-- Дата поста -->

            <span>
                <?php echo(date(lang_date, $data['date'])) ?>
            </span><br>

            <!-- Выкладыватель поста -->

            <b>
                <?php echo(lang_by) ?>: 
                <a href="<?php echo('user.php?id=' .$user_ids[$i]['id']) ?>">
                    <?php echo(htmlspecialchars($user_ids[$i]['username'])) ?>
                </a>
            </b><br>

        </div>

        <!-- Картинка поста -->

        <?php if(isset($data['image'])): ?>
            <img src="<?php echo($data['image']) ?>" width="100%">
        <?php endif; ?>

        <!-- Текст поста -->

        <p>
            <?php echo(htmlspecialchars($data['text'])) ?>
        </p>

        <!-- Лайки -->
        
        <a href="<?php echo('?id=' .$_GET['id']. '&p=' .$_GET['p']. '&like=' .$data['id']) ?>" style="float: right;">
            <?php if($data['liked'] == true): ?>
                <img src="/themes/std/imgs/like_sel.gif">
            <?php else: ?>
                <img src="/themes/std/imgs/like.gif">
            <?php endif; ?>

            <?php echo($data['likes']) ?>
        </a>

        <!-- Кнопка с комментариями -->
        
        <a href="<?php echo('comments.php?id=' .$data['id']) ?>">
            <?php echo(lang_comments) ?> 
            (<?php echo($data['comments']) ?>)
        </a><br><br>
    </div>