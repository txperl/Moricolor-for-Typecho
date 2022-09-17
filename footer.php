<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!-- jQuery (necessary for Flat UI's JavaScript plugins) -->
<script src="<?php $this->options->themeUrl('js/vendor/jquery.min.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('js/zoom-js/js/zoom.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('js/vendor/bootstrap.js'); ?>"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<!-- <script src="<?php $this->options->themeUrl('js/vendor/video.js'); ?>"></script> -->
<script src="<?php $this->options->themeUrl('js/flat-ui.min.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('js/prism.js'); ?>"></script>
<script type="text/javascript">
  function getHitokoto() {
    $.ajax({
      url: "https://v1.hitokoto.cn/",
      async: true,
      success: function(rep) {
        $("#hitokoto").html("Hitokoto&nbsp; · &nbsp;&nbsp;" + rep.hitokoto);
      },
      error: function(err) {
        $("#hitokoto").html("Hitokoto&nbsp; · &nbsp;&nbsp;哒哒哒！");
      }
    });
  }

  $(document).ready(function() {
    $("#main-index").fadeIn(800);
    $("#main-archive").fadeIn(800);
    $("#main-post").fadeIn(500);
    $("#postnav").fadeIn(800);
    $("#main-page").fadeIn(500);
    $("#pagenav").fadeIn(800);
    $("#bottomtools").fadeIn(1200);
    if (window.location.hash != '') {
      var i = window.location.hash.indexOf('#comment');
      var ii = window.location.hash.indexOf('#respond-post');
      if (i != '-1' || ii != '-1') {
        $("#comments").fadeIn(1000);
      }
    }
    $("#thatsi").fadeIn(1300);
    $("#footer").css('display', 'block');
    <?php if ($this->is('post')) : ?>
      // 锚点平滑滚动
      $('a[href*=#],area[href*=#]').click(function() {
        $body = (window.opera) ? (document.compatMode == "CSS1Compat" ? $('html') : $('body')) : $('html,body'); //Opera BUG fixed
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname && location.search == this.search) {
          var $target = $(this.hash);
          $target = $target.length && $target || $('[name=' + this.hash.slice(1) + ']');
          if ($target.length) {
            var targetOffset = $target.offset().top;
            $('html,body').animate({
                scrollTop: targetOffset
              },
              1000);
            return false;
          }
        }
      });
      // end
    <?php endif; ?>
  });

  $("#outcomment").click(function() {
    $("#comments").fadeIn(1000);
  });

  $("#comment_go").click(function() {
    $("#comments").fadeIn(1000);
  });

  $("#tor_show").click(function() {
    if ($("#postTor").attr('style') == 'display: none;') {
      $("#postTor").fadeIn(400);
      $("#postTor").css('display', 'inline-block');
    } else {
      $("#postTor").fadeOut(400);
    }
  });

  $(function() {
    $('[data-toggle=tooltip]').tooltip();
  });

  function actCopyLink() {
    const input = document.createElement("input");
    input.readOnly = 'readonly';
    input.value = this.location.href;
    document.body.appendChild(input);
    input.select();
    input.setSelectionRange(0, input.value.length);
    document.execCommand('Copy');
    document.body.removeChild(input);
  }
</script>

<?php if ($GLOBALS['beta_MoriGarden'] == 'on') : ?>
  <script>
    $(function() {
      $("#getT").click(function() {
        $('#thatsi').html("<center><small>loading...</small></center>");
        $.post('<?php $this->options->themeUrl('./MoriGarden/getThatsi.php'); ?>', {
          'value': 'done'
        }, function(data) {
          if (data != '')
            $('#thatsi').html(data).css('display', 'none');
          $("#thatsi").fadeIn(400);
        });
      });
    });
  </script>
<?php endif; ?>

<?php
if ($this->is('post') or $this->is('page')) {
  if ($GLOBALS['style_CommentShow'] == 'on') {
    echo '<script>$("#comments").fadeIn(1000);</script>';
  }
}
?>

<?php
if ($this->is('index')) {
  if ($GLOBALS['bottomTools_hitokoto'] == 'on') {
    echo '<script>getHitokoto();</script>';
  }
}
?>

<footer id="footer" class="container" style="background:rgba(255, 255, 255, 0);display:none;">
  <hr>
  <div style="text-align:center;padding-bottom:9px;">
    <p>&copy; <?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>.
      <?php _e('Using <a target="_blank" href="http://www.typecho.org">Typecho</a> & <a target="_blank" href="https://github.com/txperl/Moricolor-for-Typecho">Moricolor</a>'); ?>.</p>
  </div>
</footer>
<?php $this->footer(); ?>
</body>

</html>