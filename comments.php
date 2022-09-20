<?php
//代码参考 Theme Quark http://sunhua.me/Quark.html
function threadedComments($comments, $options)
{
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';
        } else {
            $commentClass .= ' comment-by-user';
        }
    }
    $commentLevelClass = $comments->levels > 0 ? ' comment-child' : ' comment-parent';
    if ($comments->url) {
        $author = '<a href="' . $comments->url . '"' . '" target="_blank"' . ' rel="external nofollow">' . $comments->author . '</a>';
    } else {
        $author = $comments->author;
    }
?>
    <li id="li-<?php $comments->theId(); ?>" class="comment-body<?php
                                                                if ($comments->levels > 0) {
                                                                    echo ' comment-child';
                                                                    $comments->levelsAlt(' comment-level-odd', ' comment-level-even');
                                                                } else {
                                                                    echo ' comment-parent';
                                                                }
                                                                $comments->alt(' comment-odd', ' comment-even');
                                                                echo $commentClass;
                                                                ?>">
        <div id="<?php $comments->theId(); ?>">
            <?php $avatar = 'https://secure.gravatar.com/avatar/' . md5(strtolower($comments->mail)) . '?s=80&r=X&d='; ?>
            <img class="avatar" src="<?php echo $avatar ?>" alt="<?php echo $comments->author; ?>" />
            <div class="comment_main">
                <?php $comments->content(); ?>
                <div class="comment_meta">
                    <span class="comment_author"><?php echo $author ?></span> <span class="comment_time"><?php $comments->date(); ?></span><span class="comment_reply"><?php $comments->reply(); ?></span>
                </div>
            </div>
        </div>
        <?php if ($comments->children) { ?><div class="comment-children"><?php $comments->threadedComments($options); ?></div><?php } ?>
    </li>
<?php } ?>
<style type="text/css">
    .gen {
        margin: 1rem 0 0 0
    }

    .hide {
        display: none;
    }

    .gen .page-navigator {
        margin: 3.75rem 0 3rem 0
    }

    .response {
        margin: 2rem 0;
        padding-top: 1em;
    }

    .hinfo {
        display: none;
    }

    .gen a {
        color: #aaa
    }

    .comment-list {
        padding-left: 0;
        list-style-type: none;
        margin: 0;
    }

    .avatar {
        display: block;
        float: left;
        width: 40px;
        height: 40px;
        margin: 1.4rem 1rem 0 0;
        border-radius: 50%
    }

    .comment_main {
        overflow: hidden;
        padding: 1rem 0;
        border-bottom: 1px dotted #e0e0e0;
    }

    .comment_main p {
        margin: 0;
        font-size: 15px;
    }

    .ccomment_reply,
    .comment_meta {
        font-size: .766rem;
        margin-top: 1rem;
        color: #aaa
    }

    .comment_reply {
        float: right;
        display: none
    }

    .comment_main:hover .comment_reply {
        display: block
    }

    .comment_author {
        padding: .1rem .25rem;
        border-radius: .25rem;
        background: #eee;
        font-size: 10px;
    }

    .ccomment_reply {
        text-align: right;
    }

    .comment_reply a:before,
    .comment_time:before {
        margin: 0 .5rem
    }

    .comment-parent>.comment-children {
        margin-left: 1rem;
        padding-left: 40px
    }

    .comment-child .comment-children {
        margin-left: 2em;
    }

    .tbox {
        padding: 0 0 15px 0px;
    }

    @media only screen and (max-width:767px) {
        .comment-parent .comment-children {
            margin-left: 0;
            padding-left: 0
        }
    }
</style>

<div id="comments" class="gen" style="display: none;">
    <?php $this->comments()->to($comments); ?>
    <?php if ($this->allow('comment')) : ?>
        <?php if ($comments->have()) : ?>
            <hr>
            <div class="comment-num"><h6><?php $this->commentsNum(_t('暂无评论'), _t('仅有 1 条评论'), _t('已有 %d 条评论')); ?></h6></div>
            <?php $comments->listComments(); ?>
            <div style="text-align: center;margin-top: 20px;">
                <?php $comments->pageNav('← Previous', 'Newer →', 1, '...', array('wrapTag' => 'ul', 'wrapClass' => 'pagination-plain', 'itemTag' => 'li', 'prevClass' => 'previous', 'nextClass' => 'next', 'currentClass' => 'active')); ?>
            </div>
        <?php endif; ?>
        <div id="<?php $this->respondId(); ?>" class="respond">
            <div class="ccomment_reply">
                <?php $comments->cancelReply(); ?>
            </div>
            <hr>
            <h6 class="response">说点什么？</h6>
            <form method="post" action="<?php $this->commentUrl() ?>" id="comment_form" role="form">
                <?php if ($this->user->hasLogin()) : ?>
                    <p>已登入<a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout">退出 &raquo;</a></p>
                <?php else : ?>
                    <?php if ($this->remember('author', true) != "" && $this->remember('mail', true) != "") : ?>
                        <span>欢迎 <?php $this->remember('author'); ?> 的到来 | <small style="cursor: pointer;" onclick="editinfo();"> 编辑</small></span>
                        <div id="ainfo" class="ainfo hinfo">
                        <?php else : ?>
                            <div class="ainfo">
                            <?php endif; ?>
                            <div class="tbox">
                                <input style="margin-bottom: 5px;" type="text" name="author" maxlength="12" id="author" class="form-control input-sm flat" placeholder="称呼" value="<?php $this->remember('author'); ?>" required>
                                <input style="margin-bottom: 5px;" type="email" name="mail" id="mail" class="form-control input-sm flat" placeholder="邮箱" value="<?php $this->remember('mail'); ?>" <?php if ($this->options->commentsRequireMail) : ?> required<?php endif; ?>>
                                <input style="margin-bottom: 5px;" type="url" name="url" id="url" class="form-control input-sm flat" placeholder="https://" value="<?php $this->remember('url'); ?>" <?php if ($this->options->commentsRequireURL) : ?> required<?php endif; ?>>
                            </div>
                            </div>
                        <?php endif; ?>
                        <div class="tbox">
                            <textarea rows="3" name="text" id="textarea" class="form-control flat" onkeydown="if(event.ctrlKey&&event.keyCode==13){document.getElementById('csubmit').click();return false};" placeholder="写下您对此的评论吧~" required><?php $this->remember('text', false); ?></textarea>
                        </div>
                        <center><button type="submit" class="btn btn-embossed btn-primary" id="csubmit">提交评论 (Ctrl + Enter)</button></center>
                        <?php $security = $this->widget('Widget_Security'); ?>
                        <input type="hidden" name="_" value="<?php echo $security->getToken($this->request->getReferer()) ?>">
            </form>
            <script type="text/javascript">
                function editinfo() {
                    $("#ainfo").fadeIn(800);
                }
            </script>
        </div>
    <?php else : ?>
        <hr>
        <center>
            <h6 class="response">_(:3 」∠)_</h6>
        </center>
        <center>(抱歉)</center>
        <center>这里不能评论哦</center>
        <br>
    <?php endif; ?>
</div>

<script>
function ac() {
        $body = $('html,body');
        var g = '.comment-list',
            h = '.comment-num',
            i = '.comment_reply a',
            j = '#textarea',
            k = '',
            l = '';
        c();
        $('#comment_form').submit(function() {
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: $(this).serializeArray(),
                error: function() {
                    alert("提交失败，请检查网络并重试或者联系管理员。");
                    return false
                },
                success: function(d) {
                    if (!$(g, d).length) {
                        alert("您输入的内容不符合规则或者回复太频繁，请修改内容或者稍等片刻。");
                        return false
                    } else {
                        k = $(g, d).html().match(/id=\"?comment-\d+/g).join().match(/\d+/g).sort(function(a, b) {
                            return a - b
                        }).pop();
                        if ($('.page-navigator .prev').length && l == "") {
                            k = ''
                        }
                        if (l) {
                            d = $('#li-comment-' + k, d).hide();
                            if ($('#' + l).find(".comment-children").length <= 0) {
                                $('#' + l).append("<div class='comment-children'><ol class='comment-list'><\/ol><\/div>")
                            }
                            if (k) $('#' + l + " .comment-children .comment-list").prepend(d);
                            l = ''
                        } else {
                            d = $('#li-comment-' + k, d).hide();
                            if (!$(g).length) $('#comments').prepend("<h6>已有 <span class='comment-num'>0<\/span> 条评论<\/h6><ol class='comment-list'><\/ol>");
                            $(g).prepend(d)
                        }
                        $('#li-comment-' + k).fadeIn();
                        var f;
                        $(h).length ? (f = parseInt($(h).text().match(/\d+/)), $(h).html($(h).html().replace(f, f + 1))) : 0;
                        TypechoComment.cancelReply();
                        $(j).val('');
                        $(i + ', #cancel-comment-reply-link').off('click');
                        c();
                        if (k) {
                            $body.animate({
                                scrollTop: $('#li-comment-' + k).offset().top - 50
                            }, 300)
                        } else {
                            $body.animate({
                                scrollTop: $('#comments').offset().top - 50
                            }, 300)
                        }
                    }
                }
            });
            return false
        });

        function c() {
            $(i).click(function() {
                l = $(this).parent().parent().parent().attr("id")
            });
            $('#cancel-comment-reply-link').click(function() {
                l = ''
            })
        }
    }
    ac();
    if (document.getElementById("token")) {
        var protoken = document.getElementById("token").value.replace('Token', "")
    }
</script>