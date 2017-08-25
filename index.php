<?php
/**
 * 一片森林，一座木屋，如世外桃源般，静谧、安逸。森林的气息，如梦境般，让人神往。
 * 如同她的名字一样，给人以一种自然、恬静的文字阅读体验。
 * 本项目属于 ProjectNatureSimple
 * @package Moricolor
 * @author Trii Hsia 
 * @version Chapter I
 * @link https://yumoe.com/
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
$i=0;
?>

<div id="main" class="container">
  <div id="main-index" style="display: none;">
  <?php $totalpages=ceil($this->getTotal() / $this->parameter->pageSize); ?>
  <?php if($this->is('index') && $this->_currentPage == 1){echo '<h4>記事</h4>';} ?>
  <?php if($this->is('index') && $this->_currentPage != 1){echo '<h4>記事 · '.$this->_currentPage.' / '.$totalpages.'</h4>';} ?>
	<?php while($this->next()): ?>
    <?php
    require 'config.php';
    $i=$i+1;
    $num_qp=$GLOBALS['index_QuickPreview'];
    if ($i<=$num_qp) {
      $collapse='collapse in';
    } else {
      $collapse='collapse';
    }
    ?>
        <article>
      <dl class="dl-horizontal">
        <dt>
        <a style="color:#34495e;" data-toggle="collapse" href="#<?php echo $i ?>" aria-expanded="false" aria-controls="<?php $this->title() ?>">
        <time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date('M j, Y'); ?></time>
        </a>
        </dt>
        <dd><a itemtype="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></span></dd>
        <dd class="<?php echo $collapse ?>" id="<?php echo $i ?>">
        <?php
          if ($GLOBALS['index_QuickPreview_Img']=='on') {
            img_postthumb($this->cid);
          } else {
            img_postthumb($this->cid,2);
          }
        ?>
        <small><?php $this->excerpt(200,' ······'); ?></small>
        </dd>
      </dl>
        </article>
	<?php endwhile; ?>
  </div>

  <div id="pagenav" class="text-center" style="display: none;">
    <ul class="pager">
      <li class="previous">
        <?php 
              $this->pageLink('<span><i class="fui-arrow-left"></i></span>','next');
              if($this->is('index') && $this->_currentPage == $totalpages){echo '<a title="没有惹" data-toggle="tooltip"><span><i class="fui-arrow-left"></i></span></a>';}
        ?>
      </li>

    <!-- Make dropdown appear above pagination -->
    <li class="pagination-dropdown dropup">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <span class="fui-list"></span>
      </a>
      <!-- Dropdown menu -->
      <ul class="dropdown-menu dropdown-menu-inverse" style="margin-bottom:15px;">
        <?php if($GLOBALS['tools_Pages_if']=='on'): ?>
          <?php
            $pages=$GLOBALS['tools_Pages'];
            $titles=array_keys($GLOBALS['tools_Pages']);
            for ($i=0; $i < count($pages); $i++) { 
              echo '<li><a href="'.$pages[$titles[$i]].'">'.$titles[$i].'</a></li>';
            }
          ?>
        <?php else: ?>
          <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
          <?php while($pages->next()): ?>
            <li><a href="<?php $pages->permalink(); ?>"><?php $pages->title(); ?></a></li>
          <?php endwhile; ?>
        <?php endif; ?>
      </ul>
    </li>

      <li class="next">
        <?php 
            $this->pageLink('<span><i class="fui-arrow-right"></i></span>');
            if($this->is('index') && $this->_currentPage == 1){echo '<a title="没有惹" data-toggle="tooltip"><span><i class="fui-arrow-right"></i></span></a>';}
        ?>
      </li>
    </ul>
  </div>

  <div id="bottomtools" style="display: none;">
  <?php
  $ifrun=$GLOBALS['bottomTools'];
    if ($ifrun=='on') {
      echo '<h6>(ฅ´ω`ฅ)</h6><small><ul>';
      echo '<section class="bottomtool">';
      //
        //一言
        if ($GLOBALS['bottomTools_hitokoto']=='on') {
          echo '<div id="hitokoto">一言 Hitokoto</div>';
        }
        //分类
        if ($GLOBALS['bottomTools_category']=='on') {
          echo '<span style="padding-right: 1px;">Category</span> · &nbsp;';
            $this->widget('Widget_Metas_Category_List')
                ->parse('<a style="color:#95A5A6;" href="{permalink}"> &{name} </a>&nbsp; · &nbsp;');
          echo '<br>';
        }
        //标签
        if ($GLOBALS['bottomTools_tag']=='on') {
          echo '<span>Tag</span> · &nbsp;';
          $this->widget('Widget_Metas_Tag_Cloud')->to($tags);
            while($tags->next()):
              echo '<a href="'. $tags->permalink .'" style="color:#95A5A6;">'. $tags->name .'</a>&nbsp; · &nbsp;';
            endwhile;
          echo '<br>';
        }
        //页面
        if ($GLOBALS['bottomTools_page']=='on') {
          echo '<span>Page</span> · &nbsp;';
          $this->widget('Widget_Contents_Page_List')->to($pages);
            while($pages->next()):
              echo '<a href="'. $pages->permalink .'" style="color:#95A5A6;">'. $pages->title .'</a>&nbsp; · &nbsp;';
            endwhile;
          echo '<br>';
        }
      echo '</section>';
      echo '</ul>';
      //
        //搜索
        if ($GLOBALS['bottomTools_search']=='on') {
          echo '<form method="post">';
          echo '<input autocomplete="off" name="s" type="text" class="form-control input-sm" placeholder="Search anything here~" />';
          echo '</form>';
        }
      echo '</small>';
    }
  ?>
  </div>
</div>
  <?php if($GLOBALS['beta_MoriGarden']=='on'): ?>
  <div id="thatsi" style="display:none;margin-top: 20px;"><center><a style="color:#34495e;" href="javascript:void(0)"><i id="getT" class="zmdi zmdi-chevron-down zmdi-hc-2x"></i></a></center></div>
  <?php endif; ?>
<?php $this->need('footer.php'); ?>
