<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Hulkstagram</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/widget.css" />
  <script src="<?php echo base_url(); ?>assets/js/libs/modernizr-2.5.3.min.js"></script>
</head>
<body>
  <div id="content">
    <?php //print_r($pictures) ?>
    <section class="slider">
        <div class="flexslider">
          <ul class="slides">
            <?php foreach($pictures as $key => $files) : ?>
              <?php foreach ($files as $q => $file) : ?>
              <li>
                <a href="<?php echo base_url(); ?>widget/view/?id=<?php print $file->id ?>" style="margin:0 <?php print $options[7] ?>px <?php print $options[7] ?>px 0" target="_blank" class="<?php print $options[6] ?>-border">
                  <?php if($options[2] > 600 || $options[2] > 300) : ?>
                    <img src="<?php print $file->standard_resolution->url ?>" style="width:<?php print $options[2] ?>px;?>px;">
                  <?php elseif($options[2] < 300) : ?>
                    <img src="<?php print $file->low_resolution->url ?>" style="width:<?php print $options[2] ?>px;?>px;">
                  <?php else : ?>
                    <img src="<?php print $file->thumbnail->url ?>" style="width:<?php print $options[2] ?>px;?>px;">
                  <?php endif ?>
                </a>
              </li>
              <?php endforeach ?>
            <?php endforeach ?>
          </ul>
        </div>
      </section>
  </div>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/jquery.flexslider-min.js"></script>
  <?php $this->load->view('include/ga'); ?>
  <script type="text/javascript">
  $(window).load(function() {
    $('.flexslider').flexslider({
      animation: "slide",
      controlNav: false, 
    });
  });
  </script>
</body>
</html>
