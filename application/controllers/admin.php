<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('file');
		$this->load->helper('download');
		$this->load->library('zip');
	}
	public function index()
	{
			header("Access-Control-Allow-Origin: *");
			$title['title'] = "Admin";

			$this->load->view('header', $title);
			$this->load->view('adminpage/adminnavbar');
			$this->load->view('adminpage/adminbody');
			$this->load->view('footer');
	}
	public function database_backup(){
		$this->load->dbutil();
		$db_format = array('format'=>'zip','filename'=>'dbgradetrack_backup.sql');
		$backup =& $this->dbutil->backup($db_format);
		$dbname = 'backup-on-' .date('Y-m-d'). ' .zip';
		$save = 'resources/db_backup/'. $dbname;
		write_file($save,$backup);
		force_download($dbname,$backup);

	}
}