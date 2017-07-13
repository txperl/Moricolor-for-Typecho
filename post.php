<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div id="main" class="container">
    <div id="main-post" role="main" style="display: none;">
        <article class="post" style="padding-top: 20px;">
            <h2 style="font-weight: normal;"> <?php $this->title() ?></h2>
        <?php if($GLOBALS['style_TextBar']=='on'): ?>
            <div class="text-bar">
                <a id="tor_show" href="javascript:void(0)" class="fui-list-bulleted"></a>
                <a id="comment_go" href="#comments" class="fui-bubble"></a>
                <a href="<?php $this->options->siteUrl(); ?>" class="fui-home"></a>
                <a style="font-size: 30px;margin-left: 1px;">·</a>
                <a href="https://twitter.com/intent/tweet?url=<?php $this->permalink() ?>" target="_blank" rel="nofollow" data-placement="bottom" data-toggle="tooltip" title="Twitter" class="fui-twitter"></a>
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php $this->permalink() ?>" target="_blank" rel="nofollow" data-placement="bottom" data-toggle="tooltip" title="Facebook" class="fui-facebook"></a>
                <a href="https://plus.google.com/share?url=<?php $this->permalink() ?>" target="_blank" rel="nofollow"data-placement="bottom" data-toggle="tooltip" title="Google+" class="fui-google-plus"></a>
                <a href="http://service.weibo.com/share/share.php?url=<?php $this->permalink() ?>" target="_blank" rel="nofollow" data-placement="bottom" data-toggle="tooltip" title="Weibo" class="fui-bookmark"></a>
            </div>
        <?php endif; ?>
            <p class="text-right">
                <small><?php _e('Category: '); ?><?php $this->category(', '); ?></small><br>
                <small><?php _e('Tag: '); ?><?php $this->tags(', ', true, 'none'); ?></small><br>
                <small>Written by <a itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a> with ♥ on <time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date('F j, Y'); ?></time></small>
            </p>
        
            <div class="post-content" itemprop="articleBody">
                <?php parseContnet($this->content); ?>
            </div>
        </article>
    </div>

    <center>
    <div id="postnav" style="display: none;">
    <ul class="pager">  
        <li class="previous">
            <a href="<?php $this->options->siteUrl(); ?>">
                <span>
                &nbsp;
                <span class="fui-home"></span>
                </span>
            </a>
        </li>
        <li class="next" id="outcomment">
            <a href="javascript:void(0)">
                <span>
                <span class="fui-chat"></span>
                &nbsp;
                </span>
            </a>
        </li>

        <li class="previous">
            <?php $this->thePrev('%s','<a>Not left !!</a>'); ?>
        </li>

        <li class="next">
            <?php $this->theNext('%s','<a>Coming soon</a>'); ?>
        </li>
    </ul>
    </div>
    </center>
    <?php $this->need('comments.php'); ?>

    <div class="post-tor-content">
        <div class="post-tor" id="postTor" style="display: none;">
            <div class="torarc-t">
                <div class="torarc-tile">
                    <?php post_tor($this->content); ?>
                </div>
            </div>
        </div>
    </div>

</div>

<?php $this->need('footer.php'); ?>
