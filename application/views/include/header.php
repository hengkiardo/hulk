<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Instagram</title>
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/hulk.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />
  <script src="<?php echo base_url(); ?>assets/js/modernizr-2.5.3.min.js"></script>
  <!-- IE only scripts -->
  <!--[if lt IE 9]>
  <script src="<?php echo base_url(); ?>assets/js/html5.js" type="text/javascript"></script>
  <![endif]-->
</head>
<body>
  <header>
    <nav class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <h1 class="brand">Hulkstagram</h1>
          <?php if($this->session->userdata('instagram-token')) { ?>
            <h2>Users</h2>
            <ul>
              <li><?php echo anchor('/user/profile/', 'Your profile'); ?></li>
              <li><?php echo anchor('/user/feed/', 'Your feed'); ?></li>
              <li><?php echo anchor('/user/recent/', 'Your recent media'); ?></li>
              <li><?php echo anchor('/user/search/', 'Search users'); ?></li>
              <li><?php echo anchor('/user/follows/', 'Who you follow'); ?></li>
              <li><?php echo anchor('/user/followed-by/', 'Who follows you'); ?></li>
              <li><?php echo anchor('/user/requested-by/', 'Requested by'); ?></li>
              <li><?php echo anchor('/user/relationship/', 'Relationship'); ?></li>
            </ul>
            
            <h2>Media</h2>
            
            <ul>
              <li><?php echo anchor('/media/item/', 'See a media item'); ?></li>
              <li><?php echo anchor('/media/search/', 'Search for media'); ?></li>
              <li><?php echo anchor('/media/popular/', 'Popular media'); ?></li>
              <li><?php echo anchor('/media/comments/', 'Comments about a media item'); ?></li>
              <li><?php echo anchor('/media/likes/', 'Likes for a media item'); ?></li>
            </ul>
            <!--
            <h2>Tags</h2>
            
            <ul>
              <li><?php echo anchor('/tags/details/', 'Tag details'); ?></li>
              <li><?php echo anchor('/tags/recent/', 'Recent tags'); ?></li>
              <li><?php echo anchor('/tags/search/', 'Search tags'); ?></li>
            </ul>
            
            <h2>Locations</h2>
            
            <ul>
              <li><?php echo anchor('/locations/details/', 'Location data'); ?></li>
              <li><?php echo anchor('/locations/recent/', 'Recent locations'); ?></li>
              <li><?php echo anchor('/locations/search/', 'Search locations'); ?></li>
            </ul>
            -->
          <?php } else { ?>
            <div class="right" id="connect-block">
              <span>To see all of the functions please</span>
              <a class="btn-connect" href="<?php echo $this->instagram_api->instagramLogin() ?>">
                Connect you instagram
              </a>
            </div>
            <div class="clearfix"></div>
          <?php } ?>
        </div>
      </div>
    </nav>

  </header>

