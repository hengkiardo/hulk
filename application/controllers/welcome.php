<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('ezsql_codeigniter');
		$this->ezsql = new ezSQL_codeigniter;
	}
	
	function index()
	{
		global $db;
		$db->get_var("SELECT CURDATE()");
		$db->debug();
		$this->load->view('welcome_message');
	}
	function test()
	{
		$this->ezsql->get_var("SELECT CURDATE()");
		$this->ezsql->debug();
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */