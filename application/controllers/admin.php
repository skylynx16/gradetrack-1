<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {

	public function index()
	{
			header("Access-Control-Allow-Origin: *");
			$title['title'] = "Admin";

			$this->load->view('header', $title);
			$this->load->view('adminpage/adminnavbar');
			$this->load->view('adminpage/adminbody');
			$this->load->view('footer');
	}
}