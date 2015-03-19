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

	function __construct() {
		// Call the Model constructor
		parent::__construct();
	}

	function get_all_record() {
		$query = $this -> db -> get('SubmissionReal');
		return $query -> result();
	}

	function insert($data) {
		$this -> db -> insert('SubmissionReal', $data);
	}

	function update($data) {
		$this -> db -> update('SubmissionReal', $data, array('SubmissionRealID' => $data['SubmissionRealID']));
	}

}

// END Model Class

/* End of file SubmissionRealModel.php */
/* Location: ./application/models/SubmissionRealModel.php */
