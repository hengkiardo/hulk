<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authorize extends CI_Controller {

	function __construct()
	{		
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
	}

	function index()
	{
		
		if(isset($_GET['code']) && $_GET['code'] != '') {
			$data = array();

			$auth_response = $this->instagram_api->authorize($_GET['code']);
			//var_dump($auth_response);
			
			if(isset($auth_response) && !empty($auth_response)){
				// Set up session variables containing some useful Instagram data
				$this->session->set_userdata('instagram-token', $auth_response->access_token);
				$this->session->set_userdata('instagram-username', $auth_response->user->username);
				$this->session->set_userdata('instagram-profile-picture', $auth_response->user->profile_picture);
				$this->session->set_userdata('instagram-user-id', $auth_response->user->id);
				$this->session->set_userdata('instagram-full-name', $auth_response->user->full_name);

				$data['id'] = $auth_response->user->id;

				if(isset($data['id'])){
					header('Location:'. base_url().'home/');
				}	
			}else{
				header('Location:'. base_url().'home/');
			}
			

		} else {
			
			// There was no GET variable so redirect back to the homepage
			redirect('/home','Location', 300);
			
		}
	}
}