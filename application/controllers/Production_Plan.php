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
	}

	function index() {
		$this->load->helper('url');
		$data['content'] = $this->load->view('planner/production_plan','',true);
		$this->load->view('base',$data);
	}
	
	function page($id){
		$this->load->helper('url');
		$orgName='';
		switch($id){
			case 1 : $orgName='Cetak Rata';
			   break;
			case 2 : $orgName='Cetak Dalam';
			  break;
			case 3 : $orgName='Cetak Nomor';
			  break;
			case 4 : $orgName='Verifikasi Lembar Besar';
			  break;
			case 5 : $orgName='Penyelesaian Masinal';
			  break;
			case 6 : $orgName='Penyelesaian Darurat';
			  break;
			case 7 : $orgName='Produk Akhir';
			  break;
		}
		$page['orgName'] = $orgName;
		$data['content'] = $this->load->view('planner/production_plan',$page,true);
		$this->load->view('base',$data);
	}
}

// END Controller Class

/* End of file Production_Plan.php */
/* Location: ./application/controllers/Production_Plan.php */
