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
		$this -> load -> library('Datatables');
		$this -> load -> database();
		$this -> load -> helper('url');
		$this -> load -> model('BaganModel');
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

	function datatable($table_id, $ord_submission) {
		$table_ord_name = array(1 => 'ProdOrdCera', 2 => 'ProdOrdCelam', 3 => 'ProdOrdCemor', 4 => 'ProdOrdVerbsar', 5 => 'ProdOrdMasinal', 6 => 'ProdOrdRikyet', 7 => 'ProdOrdAkhir');
		$sub_join = $ord_submission == "0" ? 'SubmissionPlan.SubmissionPlanID = ' . $table_ord_name[$table_id] . '.SubmissionPlanID' : 'SubmissionPlan.SubmissionPlanID = ' . $table_ord_name[$table_id] . '.SubmissionPlanID and SubmissionPlan.OrderNo = "' .$ord_submission. '"';
		$this -> datatables -> select($table_ord_name[$table_id] . '.*, Bagan.OrgCode, Bagan.OrgName, SubmissionPlan.DenomID, Denom.DenomCode') 
		-> from($table_ord_name[$table_id]) 
		-> join('Bagan', 'Bagan.OrgCode = ' . $table_ord_name[$table_id] . '.OrgCode') 
		-> join('SubmissionPlan', $sub_join)
		-> join('Denom','Denom.DenomID=SubmissionPlan.DenomID');
		echo $this -> datatables -> generate();
	}

}

// END Controller Class

/* End of file Production_Plan.php */
/* Location: ./application/controllers/Production_Plan.php */
