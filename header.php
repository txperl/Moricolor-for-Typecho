<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<?php
require_once 'config.php';
require_once 'functions.php';
echo '<style>';
echo "\n";
if ($GLOBALS['style_Color'][0] != 'Mori') {
  $stColor = change_color($GLOBALS['style_Color']);
  echo $stColor;
}
if ($GLOBALS['style_FontWeight'][0] != '' || $GLOBALS['style_FontWeight'][0] != 'normal') {
  $stFontWeight = change_fontweight($GLOBALS['style_FontWeight']);
  echo $stFontWeight;
}
if ($GLOBALS['style_BGPic'] != '') {
  echo 'body{background: #fafafa;}body::before {background: url(' . $GLOBALS['style_BGPic'] . ') center/cover no-repeat;}';
  echo "\n";
}
if ($GLOBALS['style_TextIndent'] == 'on') {
  echo '.post-content p,.post-content li{text-indent: 2em;}';
  echo "\n";
}
echo '</style>';
echo "\n";
$index_img = $GLOBALS['index_Image'];
?>

<head>
  <meta charset="<?php $this->options->charset(); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
  <meta name="renderer" content="webkit">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title><?php $this->archiveTitle(array(
            'category'  =>  _t('%s'),
            'search'    =>  _t('%s'),
            'tag'       =>  _t('%s'),
            'author'    =>  _t('%s')
          ), '', ' - '); ?><?php $this->options->title(); ?></title>

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
    <script src="<?php $this->options->themeUrl('js/beta.js'); ?>"></script>
    <!-- pjax实现 -->
    <script src="<?php $this->options->themeUrl('js/jquery.pjax.js'); ?>"></script>
    <!-- nprogress进度条 -->
    <script src="<?php $this->options->themeUrl('js/nprogress.js'); ?>"></script>
    <link href="<?php $this->options->themeUrl('css/nprogress.css'); ?>" rel="stylesheet">
    <!-- 黑幕 -->
    <link href="<?php $this->options->themeUrl('./css/beta.css'); ?>" rel="stylesheet">
    <!-- 预加载 -->
    <script src="//instant.page/5.1.0" type="module" integrity="sha384-by67kQnR+pyfy8yWP4kPO12fHKRLHZPfEsiSXR8u2IKcTdxD805MGUXBzVPnkLHw"></script>
    <!-- 网站LOGO -->
    <link rel="shortcut icon" href="/usr/themes/Moricolor-for-Typecho/logo.ico" type="image/x-icon" />
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
</head>

<body>
<div id="all">
  <header>
    <?php if (!$this->is('post')) : ?>
      <div class="container" id="main">
        <a id="logo" href="<?php $this->options->siteUrl(); ?>">
          <?php if ($this->options->logoUrl) : ?>
            <img src="<?php $this->options->logoUrl() ?>" alt="<?php $this->options->title() ?>" />
          <?php endif; ?>
          <h1 style="color: #34495e;"><?php $this->options->title() ?></h1>
        </a>
        <p class="description"><?php $this->options->description() ?></p>
        <hr>
      </div>
    <?php endif; ?>

  </header>

  <!-- 返回顶部 -->
  <?php if ($GLOBALS['beta_MoreFunctions'] == 'on') : ?>
    <button onclick="topFunction()" id="totop">^</button>
    <script>
      window.onscroll = function() {scrollFunction()};

      function scrollFunction() {
        if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
          document.getElementById("totop").style.display = "block";
        } else {
          document.getElementById("totop").style.display = "none";
        }
      }

      function topFunction() {
        window.scrollTo({
          top: 0,
          behavior: 'smooth',
        });
      }
    </script>
  <?php endif; ?>