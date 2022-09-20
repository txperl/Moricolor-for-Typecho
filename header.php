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
</head>

<body>
<div id="all">
  <button onclick="topFunction()" id="totop">^</button>
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