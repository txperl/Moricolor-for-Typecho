<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE html>
<?php
  require_once 'config.php';
  if ($GLOBALS['style_TextIndent'] == 'on') {
    echo '<style>';
      echo '.post-content p,.post-content li{text-indent: 2em;}';
    echo '</style>';
    echo "\n";
  }
?>
  <head>
    <meta charset="utf-8">
    <title><?php $this->archiveTitle(array(
            'category'  =>  _t('%s'),
            'search'    =>  _t('%s'),
            'tag'       =>  _t('%s'),
            'author'    =>  _t('%s')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $this->header('keywords=&generator=&template=&pingback=&xmlrpc=&wlw=&commentReply=&rss1=&rss2=&atom='); ?>

    <link href="<?php $this->options->themeUrl('./css/mori.css'); ?>" rel="stylesheet">
    <link href="<?php $this->options->themeUrl('./css/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php $this->options->themeUrl('./css/flat-ui.min.css'); ?>" rel="stylesheet">
    <link href="<?php $this->options->themeUrl('./css/prism.css'); ?>" rel="stylesheet">
    <link href="<?php $this->options->themeUrl('./fonts/md/css/material-design-iconic-font.min.css'); ?>" rel="stylesheet">
    <link href="<?php $this->options->themeUrl('./js/zoom-js/css/zoom.css'); ?>" rel="stylesheet">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="js/vendor/html5shiv.js"></script>
      <script src="js/vendor/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <header>
  <?php if (!$this->is('post')): ?>
    <div class="container" id="main">
        <a id="logo" href="<?php $this->options->siteUrl(); ?>">
          <?php if ($this->options->logoUrl): ?>
            <img src="<?php $this->options->logoUrl() ?>" alt="<?php $this->options->title() ?>" />
            <?php endif; ?>
            <h1 style="color: #34495e;"><?php $this->options->title() ?></h1>
        </a>
        <p class="description"><?php $this->options->description() ?></p>
        <hr>
    </div>
    <?php endif; ?>
  </header>
