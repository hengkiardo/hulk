<section>
	<?php if(is_object($popular_media)) { ?> 
	
		<?php foreach($popular_media as $media_data) { ?>
		
			<?php if(is_array($media_data)) { ?>
			
		<ul class="image-list">
			
			<?php foreach($media_data as $media) { ?>
			
				<li class="item">
					<?php echo anchor($media->images->standard_resolution->url, img(array('src' => $media->images->thumbnail->url)), 'class="fancybox" rel="fancybox_group"'); ?>
				</li>
				
			<?php } ?>
			
		</ul>
		
		<?php } ?>
	

	<?php } ?>
	
<?php } ?>
	
</section>
