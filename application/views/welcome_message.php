<section id="content-mansory" class="main-content">
	<?php if(is_object($popular_media)) : ?> 
		<?php foreach($popular_media as $media_data) : ?>
			<?php if(is_array($media_data)) : ?>
				<?php foreach($media_data as $media) : ?>
					<div class="item-media" data-media-id="<?php $media->id ?>">

						<div class="pic">
							<?php  echo anchor($media->images->standard_resolution->url, img(array('src' => $media->images->thumbnail->url)), 'class="fancybox" rel="fancybox_group"'); ?>
						</div>
						<?php if(!empty($media->caption->text)) : ?>
							<div class="text"><?php print convert_hastag($media->caption->text) ?></div>
						<?php endif ?>

						<div class="statistics">
							<span title="Like this photo" class="likescountspan">
								<i class="icon-heart"></i>
								<span class="count">2</span>
							</span>

							<span title="View all comments" class="commentscountspan">
								<i class="icon-comments"></i>4</span>
							</span>
						</div>

						<div class="convo attribution clearfix">
							<a href="#/<?php print $media->user->username ?>" title="<?php print $media->user->full_name ?>" data-user-id="<?php print $media->user->id ?>" class="lnk_user">
								<img src="<?php print $media->user->profile_picture ?>">
							</a>
							<p>
								<a href="#/<?php print $media->user->username ?>" title="<?php print $media->user->full_name ?>" data-user-id="<?php print $media->user->id ?>" class="lnk_user">
									<?php print $media->user->username ?>
								</a> 
								<?php if($media->location) : ?>
									<span class="location"> <i class="icon-map-marker"></i> </span>
								<?php endif ?>
								<span title="1346834279" class="time">
									about <?php print timespan($media->created_time, time() ) ?>ago
								</span>
							</p>
						</div>
					</div>
				<?php endforeach ?>
			<?php endif ?>
		<?php endforeach ?>
	<?php endif ?>
</section>
<nav id="page-nav">
  	<a href="<?php echo base_url() ?>"></a>
</nav>