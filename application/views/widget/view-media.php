<?php $input = array("a", "b", "c", "d", "e"); ?>
<?php print_r(array_splice($input, 0, count($input)-1 )); ?>
<?php //print_r(array_slice($input,4)); ?>
<div id="media-wrapper" class="media-wrapper">
	<div class="media-inner" id="media_inner">
		<div class="media-user" id="media_user">
	        <h2><a href="javascript:;" onclick="toggleUserTooltip();"><?php print $media->data->user->username ?></a><b></b></h2>

		    <span class="img img-inset user-avatar" style="background-image: url(<?php print $media->data->user->profile_picture ?>);">
		        <img src="<?php print $media->data->user->profile_picture ?>">
		        <b></b>
		    </span>


            <div class="user-tooltip" id="user_tooltip">
                <div class="user-tooltip-inner">
                    <p class="user-fullname"><strong><?php print $creator->full_name ?></strong></p>
                    <p class="user-bio"><?php print $creator->bio ?></p>
                    <p class="user-url"><a href="<?php print $creator->website ?>" rel="nofollow"><?php print $creator->website ?></a></p>
                    <ul class="user-stats">
                        <li><span class="number-statistic"><?php print $creator->counts->media ?></span> photos</li>
                        <li><span class="number-statistic"><?php print $creator->counts->followed_by ?> </span> followers</li>
                        <li><span class="number-statistic"><?php print $creator->counts->follows ?> </span> following</li>
                    </ul>
                    <?php if($this->session->userdata('instagram-token')) : ?>
                    <span id="following">
                        <span id="follow-indicator" style="display: none; ">
                        	<div style="width: 18px; height: 18px; position: absolute; margin-top: -9px; margin-left: 6px; -webkit-animation: spin8 0.8s linear infinite; ">
                        	</div>
                        </span>
                        <span id="unfollow" class="btn btn-mini following-true ">Following</span>
                        <span id="follow" class="btn btn-mini following-false hide">Follow</span>
                        <span id="requested" class="btn btn-mini requested hide">Requested</span>
                    </span>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</div>