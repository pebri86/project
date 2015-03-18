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
		$this->load->library('Datatables');
        $this->load->database();
		$this -> load -> helper('url');
		$this -> load -> model('DenomModel');
		$this -> load -> model('SubmissionPlanModel');
		$this -> load -> model('SubmissionRealModel');
		$this -> load -> model('ProdOrdModel');
		$this -> load -> model('ProdRealModel');
	}

	function index() {	
		$denom['denom_list'] = $this -> DenomModel -> get_list();
		$data['content'] = $this -> load -> view('planner/submission', $denom, true);
		$this -> load -> view('base', $data);
	}

	function update_data() {
		
	}
	
	function add_data() {
		for($i = 1; $i <= 12; $i++){
			$data = array( 'Year' => $this -> input -> post('Year'),
			'DenomID' => $this -> input -> post('DenomID'),
			'Mnth' => $i);
			$this -> SubmissionPlanModel -> insert($data);
		}
	}

	function datatable($year, $denom) {
		$this -> datatables -> select('SubmissionPlanID,Year,DenomID,OrderNo,Mnth,M1,M2,M3,M4,Amnth') -> unset_column('SubmissionPlanID,Year,DenomID') -> from('SubmissionPlan');
		$this -> datatables -> where("Year = $year and DenomID = $denom");
		echo $this -> datatables -> generate();
	}

}

// END Controller Class

/* End of file Submission.php */
/* Location: ./application/controllers/Submission.php */
