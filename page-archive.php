<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php
/**
 * 归档页面
 *
 * @package custom
 */
 $this->need('header.php'); ?>

<div id="main" class="container">
	<div id="main-page" role="main" style="display: none;">
    	<article>
      		<blockquote class="pull-right">
        		<h6><?php $this->title() ?></h6>
      		</blockquote>
      		
        	<div class="post-content" itemprop="articleBody">
            <?php $this->widget('Widget_Contents_Post_Recent', 'pageSize=10000')->to($archives);
               $year=0; $mon=0; $i=0; $j=0;
               $output = '<div id="archives">';
               while($archives->next()):
                   $year_tmp = date('Y',$archives->created);
                   $mon_tmp = date('m',$archives->created);
                   $y=$year; $m=$mon;
                   if ($mon != $mon_tmp && $mon > 0) $output .= '</ul></li>';
                   if ($year != $year_tmp && $year > 0) $output .= '</ul>';
                   if ($year != $year_tmp) {
                       $year = $year_tmp;
                       $output .= '<h4>'. $year .' 年</h4>'; //输出年份
                   }
                   if ($mon != $mon_tmp) {
                       $mon = $mon_tmp;
                       $output .= '<dl class="dl-horizontal"><dt>'. $mon .' 月</dt>'; //输出月份
                   }
                   $output .= '<dd>'.date('d日: ',$archives->created).'<a href="'.$archives->permalink .'">'. $archives->title .'</a></dd>'; //输出文章日期和标题
               endwhile;
               $output .= '</dl>';
               echo $output;
            ?>
        	</div>
    	</article>
	</div>
</div>
<?php $this->need('footer.php'); ?>
