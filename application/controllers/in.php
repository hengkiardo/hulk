<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class In extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('ezsql_codeigniter');
		$this->ezsql = new ezSQL_codeigniter;

		$this->instagram_api->access_token = $this->session->userdata('instagram-token');
	}
	function index()
	{
		$data = array();
		$media = array();

		if(isset($_GET['h']) && $_GET['h'] != '') {			
			$params = explode('|', base64_decode($_GET['h']) ) ;
			$limit = $params[3] * $params[4];
			$rv = $this->instagram_api->tagsRecentClientId($params[0], $limit );

		}else if(isset($_GET['u']) && $_GET['u'] != ''){
			$params = explode('|', base64_decode($_GET['u']) ) ;
			$limit = $params[3] * $params[4];
			//print_r($params);
			$userdata = $this->instagram_api->userSearchForWidget($params[0]);
			$rv = $this->instagram_api->getUserRecent($userdata->data[0]->id);
		}
		
		foreach ($rv->data as $key => $row) :
			$row->images->id = $row->id;
			$media[] = $row->images;
		endforeach;

		$media = array_splice($media, 0, $params[3]* $params[4] );

		$data['options'] = $params;
		$data['pictures'] = array_chunk($media, $params[3], true);
		$this->load->view('widget/no-slideshow', $data);
	}

}