<form action="" method="post" enctype="multipart/form-data" class="post_block">
    <textarea name="text" style="width: 100%;"></textarea>
    <a href="javascript:openmenu('file_form');" style="float:right;">
        <?php echo(lang_attach) ?>
    </a>

    <button type="submit" name="do_post">
        <?php echo(lang_post) ?>
    </button><br>    

    <div class="file_form" style="display: none;">
        <p><?php echo(lang_img) ?>: </p>
        <input type="file" name="file">
    </div>

    <p>
        <?php echo($text) ?>
    </p>
</form>