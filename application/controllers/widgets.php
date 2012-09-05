<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Widgets extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('ezsql_codeigniter');
		$this->ezsql = new ezSQL_codeigniter;

		$this->instagram_api->access_token = $this->session->userdata('instagram-token');
	}
	function index(){
		$data['main_view'] = 'widget/create';

		$this->load->view('master_template',$data);
	}

	function view($media_id){

		$rv = $this->instagram_api->getMedia($media_id);

		$creator = $this->instagram_api->getUser($rv->data->user->id);

		$data['main_view'] = 'widget/view-media';

		$data['media'] = $rv;
		
		$data['creator'] = $creator->data;

		$this->load->view('master_template',$data);
	}
}