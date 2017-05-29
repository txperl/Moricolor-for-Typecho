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
        hitokoto=$.ajax({url:"https://api.lwl12.com/hitokoto/main/get",async:false});
        $("#hitokoto").html("Hitokoto&nbsp; · &nbsp;&nbsp;"+hitokoto.responseText);
      }
      $(document).ready(function() {
        $("#main-index").fadeIn(800);
        $("#main-archive").fadeIn(800);
        $("#main-post").fadeIn(500);
        $("#postnav").fadeIn(800);
        $("#main-page").fadeIn(500);
        $("#pagenav").fadeIn(800);
        $("#bottomtools").fadeIn(1200);
        if (window.location.hash!='') {
          $("#comments").fadeIn(1000);
        }
        $("#footer").css('display','block'); 
      });

      $("#outcomment").click(function(){
        $("#comments").fadeIn(1000);
      });
    </script>
    <script>
      $(function () {
        $('[data-toggle=tooltip]').tooltip();
      });
    </script>
    
    <?php 
    if($this->is('index')){
      if ($GLOBALS['bottomTools_hitokoto']=='on') {
        echo '<script>getHitokoto();</script>';
      }
    }
    ?>

  <footer id="footer" class="container" style="background:#fff;display:none;">
    <hr>
    <div style="text-align:center;padding-bottom:9px;">
      <p>&copy; <?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>.
    <?php _e('Using <a href="http://www.typecho.org">Typecho</a> & <a href="https://yumoe.com">Moricolor</a>'); ?>.</p>
    </div>
  </footer>
<?php $this->footer(); ?>
</body></html>
