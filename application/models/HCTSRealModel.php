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
 * HCTSRealModel extend from CodeIgniter Model Class
 *
 * @package		CodeIgniter
 * @subpackage	Model
 * @category	Model
 * @author		Fuji Pebri
 */

class HCTSRealModel extends CI_Model {
	var $table = '';
	var $HCTSRealID = '';
	var $ProdOrdID = '';
	var $Mnth = '';
	var $ShtM1 = '';
	var $ShtM2 = '';
	var $ShtM3 = '';
	var $ShtM4 = '';
	var $NoteM1 = '';
	var $NoteM2 = '';
	var $NoteM3 = '';
	var $NoteM4 = '';
	var $Amnth = '';

	function __construct() {
		// Call the Model constructor
		parent::__construct();
	}
	
	function ProdRealModel($table){
		$this->table = $table;
	}

	function get_all_record() {
		$query = $this -> db -> get($this->table);
		return $query -> result();
	}

	function insert() {
		$this -> HCTSRealID = $_POST['HCTSRealID'];
		$this -> ProdOrdID = $_POST['ProdOrdID'];
		$this -> Mnth = $_POST['Mnth'];
		$this -> ShtM1 = $_POST['ShtM1'];
		$this -> ShtM2 = $_POST['ShtM2'];
		$this -> ShtM3 = $_POST['ShtM3'];
		$this -> ShtM4 = $_POST['ShtM4'];
		$this -> NoteM1 = $_POST['NoteM1'];
		$this -> NoteM2 = $_POST['NoteM2'];
		$this -> NoteM3 = $_POST['NoteM3'];
		$this -> NoteM4 = $_POST['NoteM4'];
		$this -> Amnth = $_POST['Amnth'];

		$this -> db -> insert($this->table, $this);
	}

	function update() {
		$this -> HCTSRealID = $_POST['HCTSRealID'];
		$this -> ProdOrdID = $_POST['ProdOrdID'];
		$this -> Mnth = $_POST['Mnth'];
		$this -> ShtM1 = $_POST['ShtM1'];
		$this -> ShtM2 = $_POST['ShtM2'];
		$this -> ShtM3 = $_POST['ShtM3'];
		$this -> ShtM4 = $_POST['ShtM4'];
		$this -> NoteM1 = $_POST['NoteM1'];
		$this -> NoteM2 = $_POST['NoteM2'];
		$this -> NoteM3 = $_POST['NoteM3'];
		$this -> NoteM4 = $_POST['NoteM4'];
		$this -> Amnth = $_POST['Amnth'];
		
		$this -> db -> update($this->table, $this, array('HCTSRealID' => $_POST['HCTSRealID']));
	}

}

// END Model Class

/* End of file HCTSRealModel.php */
/* Location: ./application/models/HCTSRealModel.php */
