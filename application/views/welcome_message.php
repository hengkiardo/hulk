<section id="content-mansory" class="main-content">
	<?php if(is_object($popular_media)) : ?> 
		<?php foreach($popular_media as $media_data) : ?>
			<?php if(is_array($media_data)) : ?>
				<?php foreach($media_data as $media) : ?>
					<div class="item-media" data-media-id="<?php $media->id ?>">
						<?php //print_r($media); ?>
						<div class="pic">
							<?php  echo anchor($media->images->standard_resolution->url, img(array('src' => $media->images->thumbnail->url)), 'class="fancybox" rel="fancybox_group"'); ?>
						</div>
						<?php if(!empty($media->caption->text)) : ?>
							<div class="text"><?php print convert_hastag($media->caption->text) ?></div>
						<?php endif ?>

						<div class="statistics">
							<span title="Like this photo" class="likescountspan">
								<i class="icon-heart"></i>
								<span class="count"><?php print $media->likes->count ?></span>
							</span>

							<span title="View all comments" class="commentscountspan">
								<i class="icon-comments"></i><?php print $media->comments->count ?>
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
								<?php if(!empty($media->location->name)) : ?>
									<span class="location"> <i class="icon-map-marker"></i> <?php print $media->location->name ?></span>
								<?php endif ?>
								<span title="1346834279" class="time">
									about <?php print display_time_ago($media->created_time) ?> ago
								</span>
							</p>
						</div>
						<?php if($media->comments->count > 0 ) : ?>
						<?php
							if($media->comments->count > 3):
								$comments = array_slice($media->comments->data, 2); 
							else :
								$comments = $media->comments->data;
							endif;
						?>
						<?php foreach ($comments as $key => $comment) : ?>
							<div data-comment-id="<?php print $comment->id ?>" class="convo comment clearfix">
								<a href="#/<?php print $comment->from->username ?>" title="<?php print $comment->from->full_name ?>" data-user-id="<?php print $comment->from->id ?>" class="lnk_user">
									<img src="<?php print $comment->from->profile_picture ?>">
								</a>
								<p>
									<a href="#/<?php print $comment->from->username ?>" title="<?php print $comment->from->full_name ?>" data-user-id="<?php print $comment->from->id ?>" class="lnk_user">
										<?php print $comment->from->username ?>
									</a>
									<span class="comment-text"><?php print convert_hastag($comment->text) ?></span>
									<span title="<?php print $comment->created_time ?>" class="time">
										<?php print timespan($comment->created_time, time() ) ?> ago
									</span>
								</p>
							</div>
						<?php endforeach ?>
						<?php endif ?>
					</div>
				<?php endforeach ?>
			<?php endif ?>
		<?php endforeach ?>
	<?php endif ?>
</section>
<div id="navigation" style="display: none">
	<a href="<?php echo base_url().'/popular/2'; ?>"></a>
</div>