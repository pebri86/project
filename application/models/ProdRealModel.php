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
 * ProdRealModel extend from CodeIgniter Model Class
 *
 * @package		CodeIgniter
 * @subpackage	Model
 * @category	Model
 * @author		Fuji Pebri
 */

class ProdRealModel extends CI_Model {
	var $table = '';

	function __construct() {
		// Call the Model constructor
		parent::__construct();
	}
	
	function set_table_name($table){
		$this->table = $table;
	}

	function get_all_record() {
		$query = $this -> db -> get($this->table);
		return $query -> result();
	}

	function insert($data) {
		$this -> db -> insert($this->table, $data);
	}

	function update() {		
		$this -> db -> update($this->table, $data, array('ProdRealID' => $data['ProdRealID']));
	}

}

// END Model Class

/* End of file ProdRealModel.php */
/* Location: ./application/models/ProdRealModel.php */
