<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div id="main" class="container">
    <div id="main-post" role="main" style="display: none;">
        <article class="post" style="padding-top: 20px;">
            <h2 style="font-weight: normal;"> <?php $this->title() ?></h2>
            <p class="text-right">
                <small><?php _e('Category: '); ?><?php $this->category(', '); ?></small><br>
                <small><?php _e('Tag: '); ?><?php $this->tags(', ', true, 'none'); ?></small><br>
                <small>Written by <a itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a> with ♥ on <time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date('F j, Y'); ?></time></small>
            </p>
        
            <div class="post-content" itemprop="articleBody">
                <?php $this->content(); ?>
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
</div>

<?php $this->need('footer.php'); ?>
