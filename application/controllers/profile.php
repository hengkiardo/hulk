<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		// Set the instagram library access token variable
		$this->instagram_api->access_token = $this->session->userdata('instagram-token');
		$this->load->helper('date');
		$this->load->helper('functions');
	}
	
	function index()
	{
		$username = $this->uri->segment(1);

		$rv = $this->instagram_api->userSearch($username);

		if(isset($rv->data[0]) ) :
		
			$user_id = $rv->data[0]->id;

			$data['user_info'] = $this->instagram_api->getUser($user_id);

			$data['user_recent_data'] = $this->instagram_api->getUserRecent($user_id);

			//print_r($data['user_info']);

			$data['main_view'] = 'user/user-profile';
		
			$this->load->view('master_template', $data);

		else :
		
			$data['main_view'] = 'user-not-found';

			$this->load->view('master_template', $data);
		
		endif;
	}
}