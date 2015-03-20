<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * BaganModel extend from CodeIgniter Model Class
 *
 * @package		CodeIgniter
 * @subpackage	Model
 * @category	Model
 * @author		Fuji Pebri
 * @copyright	Copyright (c) 2015 Perum Peruri.
 */

class BaganModel extends CI_Model {
	
	function __construct() {
		parent::__construct();
		$this->load->database(); 
	}

	function get_list() {
		$query = $this -> db ->get('Bagan');
		return $query->result();
	}
	
	function get_bagan($id) {
		$query = $this -> db ->get_where('Bagan', array('OrgCode' => $id));
		return $query->result();
	}
	
	function get_bagan_name($id) {
		$query = $this -> db ->get_where('Bagan', array('OrgCode' => $id));
		$data = $query->row();
		return $data -> OrgName;
	}
}

// END Model Class

/* End of file BaganModel.php */
/* Location: ./application/models/BaganModel.php */
