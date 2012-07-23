	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  	<script>window.jQuery || document.write('<script src="<?php echo base_url(); ?>assets/js/libs/jquery-1.7.1.min.js"><\/script>')</script>

	<script src="<?php echo base_url(); ?>assets/js/jquery.easing-1.3.pack.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery.mousewheel-3.0.4.pack.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery.fancybox-1.3.4.pack.js"></script>

	<script>
	$(document).ready(function() {
		$("a[rel=fancybox_group]").fancybox({
			'transitionIn'		: 'elastic',
			'transitionOut'		: 'elastic',
			'titlePosition' 	: 'over',
			'titleFormat'       : function(title, currentArray, currentIndex, currentOpts) {
			    return '<span id="fancybox-title-over">Image ' +  (currentIndex + 1) + ' / ' + currentArray.length + ' ' + title + '</span>';
			}
		});

	});
	</script>