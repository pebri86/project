<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * Production_Plan extend from CodeIgniter Controller Class
 *
 * @package		CodeIgniter
 * @subpackage	Controller
 * @category	Controller
 * @author		Fuji Pebri
 * @copyright	Copyright (c) 2015 Perum Peruri.
 */

class Production_Plan extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	function index() {
		$this->load->helper('url');
		$data['content'] = $this->load->view('planner/production_plan','',true);
		$this->load->view('base',$data);
	}
}

// END Controller Class

/* End of file Production_Plan.php */
/* Location: ./application/controllers/Production_Plan.php */
