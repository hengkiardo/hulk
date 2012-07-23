<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('ezsql_codeigniter');
		$this->ezsql = new ezSQL_codeigniter;

		$this->instagram_api->access_token = $this->session->userdata('instagram-token');
	}
	function index()
	{
		//global $db;
		//$db->get_var("SELECT CURDATE()");
		//$db->debug();
		// Get popular media using the client id call
		$data['popular_media'] = $this->instagram_api->getPopularMedia();
		//print_r($data);

		$data['user_feed'] = $this->instagram_api->getUser($this->session->userdata('instagram-user-id'));
		//print_r($data['user_feed']);

		$data['main_view'] = 'welcome_message';
		//var_dump($data);
		
		//$this->load->vars($data);
		
		$this->load->view('template', $data);


	}
}