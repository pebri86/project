<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Login Controller
	 * 
	 */
	public function index()
	{
		$this->load->helper('url');
		$this->load->view('login');
	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */