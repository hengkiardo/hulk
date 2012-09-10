<section id="content-mansory" class="main-content">
	<div class="item-media profile">
		<div class="small-profile clearfix">
			<img src="<?php print $user_info->data->profile_picture ?>" height="50" width="50" class="profile-pic">
			<div class="username"><?php print $user_info->data->username ?></div>
			<div class="fullname"><?php print $user_info->data->full_name ?></div>
		</div>
		<div class="bio">
			<div class="line"><?php print $user_info->data->bio ?></div>
			<a target="_blank" href="<?php print $user_info->data->website ?>"><?php print $user_info->data->website ?></a>
		</div>
		<div class="stats clearfix">
			<div class="stat stat-photos">
				<span><?php print $user_info->data->counts->media ?></span>
				<div class="stat-desc">photos</div>
			</div>
			<div class="stat stat-followers" data-original-title="">
				<span><?php print $user_info->data->counts->followed_by ?></span>
				<div class="stat-desc">followers</div>
			</div>
			<div class="stat last stat-following" data-original-title="">
				<span><?php print $user_info->data->counts->follows ?></span>
				<div class="stat-desc">following</div>
			</div>
			<a href="#" class="btn btn-success btn-following">Following</a>
		</div>
	</div>


	<?php if(is_object($user_recent_data)) : ?> 
		<?php foreach($user_recent_data as $media_data) : ?>
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
								<i class="icon-comments"></i><?php print $media->comments->count ?></span>
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
								$comments = array_slice($media->comments->data, 3); 
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