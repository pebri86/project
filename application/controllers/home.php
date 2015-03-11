<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Homepage for index controller after login page
	 * 
	 */
	public function index()
	{
		$this->load->helper('url');
		$data['content'] = $this->load->view('home','',true);
		$this->load->view('base',$data);
	}
}

/* End of file home.php */
/* Location: ./application/controllers/welcome.php */