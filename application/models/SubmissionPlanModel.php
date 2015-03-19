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

	function insert($data) {
		$this -> db -> insert('SubmissionPlan', $data); 
	}

	function update($data) {
		$this -> db -> update('SubmissionPlan', $data, array('SubmissionPlanID' => $data['SubmissionPlanID']));
	}

}

// END Model Class

/* End of file SubmissionPlanModel.php */
/* Location: ./application/models/SubmissionPlanModel.php */
