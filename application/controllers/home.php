<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('ezsql_codeigniter');
		$this->load->helper('date');
		$this->load->helper('functions');
		$this->ezsql = new ezSQL_codeigniter;

		$this->instagram_api->access_token = $this->session->userdata('instagram-token');
	}
	function index()
	{
		$data['popular_media'] = $this->instagram_api->getPopularMedia();

		$data['user_feed'] = $this->instagram_api->getUser($this->session->userdata('instagram-user-id'));

		$data['main_view'] = 'welcome_message';
		
		$this->load->view('master_template', $data);
	}

	function in(){
		if(isset($_GET['h']) && $_GET['h'] != '') {			
			$params = explode('|', base64_decode($_GET['h']) ) ;
		}else if(isset($_GET['u']) && $_GET['u'] != ''){
			$params = explode('|', base64_decode($_GET['u']) ) ;
		}
		if(empty($this->instagram_api->access_token)){

		}
		$data['recent_tags_media'] = $this->instagram_api->tagsRecentClientId($params[0], 40);
		
		//print_r($params);
		print_r($data);
	}

}