<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		Fuji Pebri
 * @copyright	Copyright (c) 2015 Perum Peruri.
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * SubmissionPlanModel extend from CodeIgniter Model Class
 *
 * @package		CodeIgniter
 * @subpackage	Model
 * @category	Model
 * @author		Fuji Pebri
 */

class SubmissionPlanModel extends CI_Model {
	var $SubmissionPlanID = '';
	var $Year = '';
	var $DenomID = '';
	var $OrderNo = '';
	var $Mnth = '';
	var $M1 = '';
	var $M2 = '';
	var $M3 = '';
	var $M4 = '';
	var $Amnth = '';

	function __construct() {
		// Call the Model constructor
		parent::__construct();
	}

	function get_all_record() {
		$query = $this -> db -> get('SubmissionPlan');
		return $query -> result();
	}

	function insert() {
		$this -> SubmissionPlanID = $_POST['SubmissionPlanID'];
		$this -> Year = $_POST['Year'];
		$this -> DenomID = $_POST['DenomID'];
		$this -> OrderNo = $_POST['OrderNo'];
		$this -> Mnth = $_POST['Mnth'];
		$this -> M1 = $_POST['M1'];
		$this -> M2 = $_POST['M2'];
		$this -> M3 = $_POST['M3'];
		$this -> M4 = $_POST['M4'];
		$this -> Amnth = $_POST['Amnth'];

		$this -> db -> insert('SubmissionPlan', $this);
	}

	function update() {
		$this -> SubmissionPlanID = $_POST['SubmissionPlanID'];
		$this -> Year = $_POST['Year'];
		$this -> DenomID = $_POST['DenomID'];
		$this -> OrderNo = $_POST['OrderNo'];
		$this -> Mnth = $_POST['Mnth'];
		$this -> M1 = $_POST['M1'];
		$this -> M2 = $_POST['M2'];
		$this -> M3 = $_POST['M3'];
		$this -> M4 = $_POST['M4'];
		$this -> Amnth = $_POST['Amnth'];

		$this -> db -> update('SubmissionPlan', $this, array('SubmissionPlanID' => $_POST['SubmissionPlanID']));
	}

}

// END Model Class

/* End of file SubmissionPlanModel.php */
/* Location: ./application/models/SubmissionPlanModel.php */
