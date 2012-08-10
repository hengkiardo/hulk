<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sl extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('ezsql_codeigniter');
		$this->ezsql = new ezSQL_codeigniter;

		$this->instagram_api->access_token = $this->session->userdata('instagram-token');
	}
	function index()
	{
		if(isset($_GET['h']) && $_GET['h'] != '') {			
			$params = explode('|', base64_decode($_GET['h']) ) ;
		}else if(isset($_GET['u']) && $_GET['u'] != ''){
			$params = explode('|', base64_decode($_GET['u']) ) ;
		}
	
		print_r($params);
		$data['recent_tags_media'] = $this->instagram_api->tagsRecentClientId($params[0], 20);
		
		//print_r($data);
	}

}