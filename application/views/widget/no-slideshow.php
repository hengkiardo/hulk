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
  <div id="content" style="width:<?php print $options[8]+3 ?>px; height:<?php print $options[9] + 3 ?>px">
    <ul id="grid" style="background:#<?php print $options[5] ?>">
        <?php foreach($pictures as $key => $files) : ?>
        <li>
          <ul>
          <?php foreach ($files as $q => $file) : ?>
          <li>
            <a href="<?php echo base_url(); ?>widget/view/?id=<?php print $file->id ?>" style="margin:0 <?php print $options[7] ?>px <?php print $options[7] ?>px 0" target="_blank" class="<?php print $options[6] ?>-border">
              <img src="<?php print $file->thumbnail->url ?>" style="width:<?php print $options[2] ?>px; height:<?php print $options[2] ?>px;">
            </a>
          </li>
          <?php endforeach ?>
          </ul>
        </li>
        <?php endforeach ?>
    </ul>
  </div>
  <?php $this->load->view('include/ga'); ?>
</body>
</html>
