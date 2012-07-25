<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tools extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('ezsql_codeigniter');
		$this->ezsql = new ezSQL_codeigniter;

		$this->instagram_api->access_token = $this->session->userdata('instagram-token');
	}
	function index()
	{
		
	}
	function widget()
	{
		$data['main_view'] = 'widget/create';

		$this->load->view('template',$data);
	}
}