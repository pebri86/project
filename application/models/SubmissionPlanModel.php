<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * SubmissionPlanModel extend from CodeIgniter Model Class
 *
 * @package		CodeIgniter
 * @subpackage	Model
 * @category	Model
 * @author		Fuji Pebri
 * @copyright	Copyright (c) 2015 Perum Peruri.
 */

class SubmissionPlanModel extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}

	function get_record($Year) {
		$query = $this -> db ->get_where('SubmissionPlan', array('Year' => $Year));
		return $query -> result();
	}

	function init_data($data) {
		for ($i = 1; $i <= 12; $i++) {
			$data = array('Year' => $data['Year'], 'DenomID' => $data['DenomID'], 'Mnth' => $i);
			$this -> db -> insert('SubmissionPlan', $data);
		}
	}

	function insert($data) {
		$this -> db -> insert('SubmissionPlan', $data);
	}

	function update($data) {
		$this -> db -> update('SubmissionPlan', $this, array('SubmissionPlanID' => $data['SubmissionPlanID']));
	}

}

// END Model Class

/* End of file SubmissionPlanModel.php */
/* Location: ./application/models/SubmissionPlanModel.php */
