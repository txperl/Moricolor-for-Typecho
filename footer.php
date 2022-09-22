<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

  <link href="<?php $this->options->themeUrl('./css/mori.css'); ?>" rel="stylesheet">
  <link href="<?php $this->options->themeUrl('./css/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
  <link href="<?php $this->options->themeUrl('./css/flat-ui.min.css'); ?>" rel="stylesheet">
  <link href="<?php $this->options->themeUrl('./css/prism.css'); ?>" rel="stylesheet">
  <link href="<?php $this->options->themeUrl('./fonts/md/css/material-design-iconic-font.min.css'); ?>" rel="stylesheet">
  <link href="<?php $this->options->themeUrl('./js/zoom-js/css/zoom.css'); ?>" rel="stylesheet">
  <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
  <!--[if lt IE 9]>
      <script src="<?php $this->options->themeUrl('./js/vendor/html5shiv.js'); ?>"></script>
      <script src="<?php $this->options->themeUrl('./js/vendor/respond.min.js'); ?>"></script>
    <![endif]-->
  <?php $this->header(); ?>
  <!-- JS置于此处，方便JS重载 -->
  <script src="<?php $this->options->themeUrl('js/vendor/jquery.min.js'); ?>"></script>
  <script src="<?php $this->options->themeUrl('js/zoom-js/js/zoom.js'); ?>"></script>
  <script src="<?php $this->options->themeUrl('js/vendor/bootstrap.js'); ?>"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <!-- <script src="<?php $this->options->themeUrl('js/vendor/video.js'); ?>"></script> -->
  <script src="<?php $this->options->themeUrl('js/flat-ui.min.js'); ?>"></script>
  <script src="<?php $this->options->themeUrl('js/prism.js'); ?>"></script>
  <?php if ($GLOBALS['beta_MoreFunctions'] == 'on') : ?>
    <!-- pjax实现 -->
    <script src="<?php $this->options->themeUrl('js/jquery.pjax.js'); ?>"></script>
    <script>
    $(document).pjax('a[target!=_blank]', '#all', {fragment:'#all', timeout: 50000}); 
    $(document).on('pjax:send', function() {
      NProgress.start(); // NProgress进度条
      if (window.aplayers) {
        for (let i = 0; i < window.aplayers.length; i++) {
            window.aplayers[i].destroy();
        }
        window.aplayers = [];
      }
    }).on('submit', 'form', 'post', function(event){
      $.pjax.submit(event, '#all',{fragment:'#all', timeout: 50000}); //为以上行动添加pjax支持
    }).on('pjax:complete', function() {
      NProgress.done();
      respondId = '<?php $this->respondId(); ?>';
      if (typeof MathJax !== 'undefined'){
        MathJax.Hub.Queue(["Typeset",MathJax.Hub]);
      } // MathJax重载
      if (typeof aplayers !== 'undefined'){
        for (var i = 0; i < aplayers.length; i++) {
          try {aplayers[i].destroy()} catch(e){}
        }
      } //APlayer重载
    });
    </script>
    <!-- nprogress进度条 -->
    <script src="<?php $this->options->themeUrl('js/nprogress.js'); ?>"></script>
    <link href="<?php $this->options->themeUrl('css/nprogress.css'); ?>" rel="stylesheet">
    <!-- 黑幕 -->
    <link href="<?php $this->options->themeUrl('./css/beta.css'); ?>" rel="stylesheet">
    <!-- 预加载 -->
    <script src="//instant.page/5.1.0" type="module" integrity="sha384-by67kQnR+pyfy8yWP4kPO12fHKRLHZPfEsiSXR8u2IKcTdxD805MGUXBzVPnkLHw"></script>
    <!-- MathJax渲染 -->
    <script async src="https://cdn.jsdelivr.net/npm/mathjax@2/MathJax.js"></script>
    <script type="text/x-mathjax-config">
		  MathJax.Hub.Config({
			  elements:["all"],
			  showProcessingMessages:false,
			  messageStyle:"none",
			  extensions:["tex2jax.js"],
			  jax:["input/TeX","output/HTML-CSS"],
			  tex2jax:{
				  inlineMath:[["$","$"],["\\(","\\)"]],
				  displayMath:[["$$","$$"],["\\[","\\]"]],
				  processEscapes:true
			  },
			  "HTML-CSS":{availableFonts:["TeX"]}
		  });
    </script>
  <?php endif; ?>

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

</div>
<footer id="footer" class="container" style="background:rgba(255, 255, 255, 0);display:none;">
  <hr>
  <div style="text-align:center;padding-bottom:9px;">
    <p>&copy; <?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>.
      <?php _e('Using <a target="_blank" href="http://www.typecho.org">Typecho</a> & <a target="_blank" href="https://github.com/txperl/Moricolor-for-Typecho">Moricolor</a>'); ?>.</p>
  </div>
    <!--APlayer-->
    <link href="<?php $this->options->themeUrl('./css/Aplayer.min.css'); ?>" rel="stylesheet">
    <div id="aplayer"></div>
    <script src="<?php $this->options->themeUrl('js/APlayer.min.js'); ?>"></script>
    <?php
      //展开设定
      if($this->options->hide === '1'){
        echo '<style>.aplayer.aplayer-fixed.aplayer-narrow .aplayer-body{left:-68px}.aplayer.aplayer-fixed.aplayer-narrow .aplayer-body:hover{left:0}</style>';
      }?>
    <script type="application/javascript">
    <?php $content = json_decode(file_get_contents(__DIR__ . '/aplayer.json'),true); $set = $content['settings']; echo 'const ap = new APlayer({container: document.getElementById(\'aplayer\'),lrcType:'.$set['lrc'].',autoplay:'.$set['autoplay'].',fixed:true,theme:\''.$set['theme'].'\',volume:'.$set['volume'].',order:\''.$set['order'].'\',audio:'.$content['data'].'});';?>
    </script>
</footer>
<?php $this->footer(); ?>
</body>

</html>