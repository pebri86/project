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
		$this -> load -> library('Datatables');
		$this -> load -> database();
		$this -> load -> helper('url');
		$this -> load -> model('DenomModel');
		$this -> load -> model('SubmissionPlanModel');
		$this -> load -> model('SubmissionRealModel');
		$this -> load -> model('ProdOrdModel');
		$this -> load -> model('ProdRealModel');
		$this -> load -> model('HCTSRealModel');
	}

	function index() {
		$denom['denom_list'] = $this -> DenomModel -> get_list();
		$data['content'] = $this -> load -> view('planner/submission', $denom, true);
		$this -> load -> view('base', $data);
	}

	function update_data() {
		$data = array('SubmissionPlanID' => $this -> input -> post('SubmissionPlanID'), 'OrderNo' => $this -> input -> post('OrderNo'), 'M1' => $this -> input -> post('M1'), 'M2' => $this -> input -> post('M2'), 'M3' => $this -> input -> post('M3'), 'M4' => $this -> input -> post('M4'), 'Amnth' => $this -> input -> post('Amnth'));
		if ($this -> SubmissionPlanModel -> update($data)) {
			$response["error"] = false;
		} else { $response["error"] = true;
		}
		echo json_encode($response);
	}

	function add_data() {
		$table_ord_name = array(1 => 'ProdOrdCera', 2 => 'ProdOrdCelam', 3 => 'ProdOrdCemor', 4 => 'ProdOrdVerbsar', 5 => 'ProdOrdMasinal', 6 => 'ProdOrdRikyet', 7 => 'ProdOrdAkhir');
		$table_real_name = array(1 => 'ProdRealCera', 2 => 'ProdRealCelam', 3 => 'ProdRealCemor', 4 => 'ProdRealVerbsar', 5 => 'ProdRealMasinal', 6 => 'ProdRealRikyet', 7 => 'ProdRealAkhir');
		$table_hcts_name = array(1 => 'HCTSRealCera', 2 => 'HCTSRealCelam', 3 => 'HCTSRealCemor', 4 => 'HCTSRealVerbsar', 5 => 'HCTSRealMasinal', 6 => 'HCTSRealRikyet', 7 => 'HCTSRealAkhir');
		for ($i = 1; $i <= 12; $i++) {
			$sub_plan_data = array('Year' => $this -> input -> post('Year'), 'DenomID' => $this -> input -> post('DenomID'), 'Mnth' => $i);
			$this -> SubmissionPlanModel -> insert($sub_plan_data);
			$pid = $this -> db -> insert_id();

			// prepare data for submission real table
			$sub_real_data = array('SubmissionPlanID' => $pid, 'Mnth' => $i);
			$this -> SubmissionRealModel -> insert($sub_real_data);
			for ($j = 1; $j <= 7; $j++) {

				// prepare data for prod ord table
				$prod_ord_data = array('SubmissionPlanID' => $pid, 'OrgCode' => $j, 'Mnth' => $i);
				$this -> ProdOrdModel -> set_table_name($table_ord_name[$j]);
				$this -> ProdOrdModel -> insert($prod_ord_data);
				$oid = $this -> db -> insert_id();

				// prepare data for prod real table
				$prod_real_data = array('ProdOrdID' => $oid, 'Mnth' => $i);
				$this -> ProdRealModel -> set_table_name($table_real_name[$j]);
				$this -> ProdRealModel -> insert($prod_real_data);

				// prepare data for hcts real table
				$hcts_real_data = array('ProdOrdID' => $oid, 'Mnth' => $i);
				$this -> HCTSRealModel -> set_table_name($table_hcts_name[$j]);
				$this -> HCTSRealModel -> insert($hcts_real_data);
			}
		}
		$response["error"] = false;
		echo json_encode($response);
	}

	function datatable($year, $denom) {
		$this -> datatables -> select('SubmissionPlanID,Year,DenomID,OrderNo,Mnth,M1,M2,M3,M4,Amnth') -> unset_column('SubmissionPlanID,Year,DenomID') -> from('SubmissionPlan');
		$this -> datatables -> where("Year = $year and DenomID = $denom");
		$this -> db -> order_by("SubmissionPlanId", "asc");
		echo $this -> datatables -> generate();
	}

	function get_order_list($year, $orgcode) {
		$table_ord_name = array(1 => 'ProdOrdCera', 2 => 'ProdOrdCelam', 3 => 'ProdOrdCemor', 4 => 'ProdOrdVerbsar', 5 => 'ProdOrdMasinal', 6 => 'ProdOrdRikyet', 7 => 'ProdOrdAkhir');
		$this -> db -> select('SubmissionPlan.OrderNo') -> from('SubmissionPlan') -> join($table_ord_name[$orgcode], 'SubmissionPlan.SubmissionPlanID = ' . $table_ord_name[$orgcode] . '.SubmissionPlanID and SubmissionPlan.Year =' . $year);
		$res = $this -> db -> get();
		$data = $res -> result();
		$response["data"] = array();
		foreach ($data as $order_list) {
			if ($order_list -> OrderNo != '') {
				array_push($response["data"], array('OrderNo' => $order_list -> OrderNo));
			}
		}
		echo json_encode($response);
	}

}

// END Controller Class

/* End of file Submission.php */
/* Location: ./application/controllers/Submission.php */
