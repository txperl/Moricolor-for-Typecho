<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

    <div class="container">

        <div class="error-page">
            <h2 >╮(๑•́ ₃•̀๑)╭</h2>
            <br>
            <h3 class="post-title" style="text-align: center;">404 - <?php _e('页面未找到'); ?></h3>
            <br><br>
            <form method="post">
                <p><input type="text" placeholder="此地址下的内容已经消失了，要不你可以搜索一下...？" name="s" autocomplete="off" class="form-control" /></p>
            </form>
        </div>

    </div><!-- end #content-->
	<?php $this->need('footer.php'); ?>
