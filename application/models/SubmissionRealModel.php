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
 * SubmissionRealModel extend from CodeIgniter Model Class
 *
 * @package		CodeIgniter
 * @subpackage	Model
 * @category	Model
 * @author		Fuji Pebri
 */

class SubmissionRealModel extends CI_Model {
	var $SubmissionRealID = '';
	var $SubmissionPlanID = '';
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
		$query = $this -> db -> get('SubmissionReal');
		return $query -> result();
	}

	function insert() {
		$this -> SubmissionRealID = $_POST['SubmissionRealID'];
		$this -> SubmissionPlanID = $_POST['SubmissionPlanID'];
		$this -> Mnth = $_POST['Mnth'];
		$this -> M1 = $_POST['M1'];
		$this -> M2 = $_POST['M2'];
		$this -> M3 = $_POST['M3'];
		$this -> M4 = $_POST['M4'];
		$this -> Amnth = $_POST['Amnth'];

		$this -> db -> insert('SubmissionReal', $this);
	}

	function update() {
		$this -> SubmissionRealID = $_POST['SubmissionRealID'];
		$this -> SubmissionPlanID = $_POST['SubmissionPlanID'];
		$this -> Mnth = $_POST['Mnth'];
		$this -> M1 = $_POST['M1'];
		$this -> M2 = $_POST['M2'];
		$this -> M3 = $_POST['M3'];
		$this -> M4 = $_POST['M4'];
		$this -> Amnth = $_POST['Amnth'];

		$this -> db -> update('SubmissionReal', $this, array('SubmissionRealID' => $_POST['SubmissionRealID']));
	}

}

// END Model Class

/* End of file SubmissionRealModel.php */
/* Location: ./application/models/SubmissionRealModel.php */
