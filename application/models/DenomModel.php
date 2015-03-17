<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * DenomModel extend from CodeIgniter Model Class
 *
 * @package		CodeIgniter
 * @subpackage	Model
 * @category	Model
 * @author		Fuji Pebri
 * @copyright	Copyright (c) 2015 Perum Peruri.
 */

class DenomModel extends CI_Model {
	
	function __construct() {
		parent::__construct();
		$this->load->database(); 
	}

	function get_list() {
		$query = $this -> db ->get('Denom');
		return $query->result();
	}
}

// END Model Class

/* End of file DenomModel.php */
/* Location: ./application/models/DenomModel.php */
