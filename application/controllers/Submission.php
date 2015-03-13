<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * Submission extend from CodeIgniter Controller Class
 *
 * @package		CodeIgniter
 * @subpackage	Controller
 * @category	Controller
 * @author		Fuji Pebri
 * @copyright	Copyright (c) 2015 Perum Peruri.
 */

class Submission extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	function index() {
		$this->load->helper('url');
		$data['content'] = $this->load->view('planner/submission','',true);
		$this->load->view('base',$data);
	}
}

// END Controller Class

/* End of file Submission.php */
/* Location: ./application/controllers/Submission.php */
