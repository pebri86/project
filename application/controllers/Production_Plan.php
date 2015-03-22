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

	var $table_ord_name = array(1 => 'ProdOrdCera', 2 => 'ProdOrdCelam', 3 => 'ProdOrdCemor', 4 => 'ProdOrdVerbsar', 5 => 'ProdOrdMasinal', 6 => 'ProdOrdRikyet', 7 => 'ProdOrdAkhir');

	function __construct() {
		parent::__construct();
		$this -> load -> library('Datatables');
		$this -> load -> database();
		$this -> load -> helper('url');
		$this -> load -> model('BaganModel');
		$this -> load -> model('ProdOrdModel');
	}

	function index() {
		$data['content'] = $this -> load -> view('planner/production_plan', '', true);
		$this -> load -> view('base', $data);
	}

	function page($id) {
		$this -> load -> helper('url');
		$page['bagan_list'] = $this -> BaganModel -> get_list();
		$page['orgCode'] = $id;
		$page['orgName'] = $this -> BaganModel -> get_bagan_name($id);
		$data['content'] = $this -> load -> view('planner/production_plan', $page, true);
		$this -> load -> view('base', $data);
	}

	function datatable($table_id, $ord_submission, $year) {
		$sub_join = $ord_submission == "0" ? 'SubmissionPlan.SubmissionPlanID = ' . $this -> table_ord_name[$table_id] . '.SubmissionPlanID and SubmissionPlan.Year = '.$year : 'SubmissionPlan.SubmissionPlanID = ' . $this -> table_ord_name[$table_id] . '.SubmissionPlanID and SubmissionPlan.OrderNo = "' . $ord_submission . '" and SubmissionPlan.Year = '.$year;
		$this -> datatables -> select($this -> table_ord_name[$table_id] . '.*, Bagan.OrgCode, Bagan.OrgName, SubmissionPlan.DenomID, Denom.DenomCode, Denom.Note') -> from($this -> table_ord_name[$table_id]) -> join('Bagan', 'Bagan.OrgCode = ' . $this -> table_ord_name[$table_id] . '.OrgCode') -> join('SubmissionPlan', $sub_join) -> join('Denom', 'Denom.DenomID=SubmissionPlan.DenomID');
		echo $this -> datatables -> generate();
	}

	function update_data($table_id) {
		$data = array('ProdOrdID' => $this -> input -> post('ProdOrdID'),
			'OrderNo' => $this -> input -> post('OrderNo'),
			'ShtM1' => $this -> input -> post('ShtM1'),			
			'ShtM2' => $this -> input -> post('ShtM2'),
			'ShtM3' => $this -> input -> post('ShtM3'),
			'ShtM4' => $this -> input -> post('ShtM4'),
			'NoteM1' => $this -> input -> post('NoteM1'),
			'NoteM2' => $this -> input -> post('NoteM2'),
			'NoteM3' => $this -> input -> post('NoteM3'),
			'NoteM4' => $this -> input -> post('NoteM4'),
			'ShtAmnth' => $this -> input -> post('ShtAmnth'),
			'NoteAmnth' => $this -> input -> post('NoteAmnth')
		);
		$this -> ProdOrdModel -> set_table_name($this -> table_ord_name[$table_id]);
		if ($this -> ProdOrdModel -> update($data)) {
			$response["error"] = false;
		} else { $response["error"] = true;
		}
		echo json_encode($response);
	}

}

// END Controller Class

/* End of file Production_Plan.php */
/* Location: ./application/controllers/Production_Plan.php */
