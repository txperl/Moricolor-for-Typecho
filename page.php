<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div id="main" class="container">
	<div id="main-page" role="main" style="display: none;">
    	<article>
      		<blockquote class="pull-right">
        		<h6><?php $this->title() ?></h6>
      		</blockquote>
      		<div class="clearfix"></div>
        	<div class="post-content" itemprop="articleBody">
            	<?php $this->content(); ?>
        	</div>
    	</article>
	</div>
</div>
<?php $this->need('footer.php'); ?>
