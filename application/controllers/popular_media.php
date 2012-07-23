<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Popular_media extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
     	// Load the Instagram API language file
     	$this->codeigniter_instance =& get_instance();
     	// Load the Instagram API language file
     	$this->codeigniter_instance->load->config('Instagram_api');
     	//$this->load->config('Instagram_api');
	}

	function index()
	{
		
		echo '<h1>Popular media</h1>';
		var_dump($this->codeigniter_instance->config->item);
		
		$popular_media_request_url = 'https://api.instagram.com/v1/media/popular?client_id=' . INSTAGRAM_CLIENT_ID;
		
		$popular_media = $this->instagram_api->getPopularMedia();
		if($popular_media) :
		foreach($popular_media->data as $media) {
			
			$thumbnail_url	= $media->images->thumbnail->url;
			
			if(isset($media->caption->text)) {
				$image_caption	= $media->caption->text;
			} else {
				$image_caption	= 'Instagram CodeIgniter library by Ian Luckraft';
			}
			$image_width	= $media->images->thumbnail->width;
			$image_height	= $media->images->thumbnail->height;
			
			echo '<img src="' . $thumbnail_url . '" alt="' . $image_caption . '" width="' . $image_width . '" height="' . $image_height . '" />';
		
		}
		endif;
		
	}
}

/* End of file popular_media.php */
/* Location: ./application/controllers/popular_media.php */