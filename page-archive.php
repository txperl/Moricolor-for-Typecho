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

      <!-- 总分类&标签 -->
          <h6>Tags</h6>
          <div class="post-tags">
          <!-- 分类 -->
          <?php $this->widget('Widget_Metas_Category_List', 'sort=mid&ignoreZeroCount=1&desc=0&limit=30')->to($category); ?>
          <ul class="post-list">
          <?php while ($category->next()): ?>
            <a href="<?php $category->permalink(); ?>" rel="tag"><?php $category->name(); ?></a>
          <?php endwhile; ?>
          </ul>
          <!-- 标签 -->
          <?php $this->widget('Widget_Metas_Tag_Cloud', 'sort=mid&ignoreZeroCount=1&desc=0&limit=30')->to($tags); ?>
          <ul class="tags-list">
          <?php while ($tags->next()): ?>
            <a href="<?php $tags->permalink(); ?>" rel="tag"><?php $tags->name(); ?></a>
          <?php endwhile; ?>
          </ul>
          </div>
      <!-- 文章归档 -->
          <div clss="post-archive" itemprop="articleBody">
            <?php $this->widget('Widget_Contents_Post_Recent', 'pageSize=10000')->to($archives);
               $year=0; $mon=0; $i=0; $j=0; $a=0;
               $output = '<div id="archives">';
               while($archives->next()):
                $a=$a+1;
                if ($a==1) {
                  $collapse='collapse in';
                } else {
                  $collapse='collapse';
                }
                   $year_tmp = date('Y',$archives->created);
                   $mon_tmp = date('m',$archives->created);
                   $y=$year; $m=$mon;
                   if ($mon != $mon_tmp && $mon > 0) $output .= '</ul></li>';
                   if ($year != $year_tmp && $year > 0) $output .= '</ul>';
                   if ($year != $year_tmp) {
                       $output .='</section>';
                   }
                   if ($mon != $mon_tmp) {
                       $output .='</section>';
                   }
                   if ($year != $year_tmp) {
                       $year = $year_tmp;
                       $output .='<section id="year" style="overflow:hidden;">';
                       $output .= '<h5><a style="color:#34495e;" data-toggle="collapse" href="#'.$year.'" aria-expanded="false" aria-controls="'.$year.'">'. $year .'</a></h5>'; //输出年份
                       $output .= '<div class="'.$collapse.'" id="'.$year.'">';
                   }
                   if ($mon != $mon_tmp) {
                       $mon = $mon_tmp;
                       $output .='<section id="mon" style="overflow:hidden;">';
                       $output .= '<span style="text-align:right;"><h6>'. date('n',$archives->created) .'月</h6></span>'; //输出月份
                   }
                   $output .= '<div class="arc-t"><div class="arc-tile"><small><a href="'.$archives->permalink .'">'. $archives->title .'</a></small><br><span class="arc-date">'.date('M j, Y',$archives->created).'<span></div></div>'; //输出文章日期和标题
               endwhile;
               echo $output;
            ?>
          </div>
      </article>
  </div>
</div>

<?php $this->need('footer.php'); ?>
