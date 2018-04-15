<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class main extends MY_Controller {

	function __construct() {
        parent::__construct();
		date_default_timezone_set('Asia/Manila');
	}//function __construct()

	public function index()
	{
		@$this->session->unset_userdata($key, $val);
		$this->session->sess_destroy();

		header("Access-Control-Allow-Origin: *");
		$title['title'] = "Welcome to GradeTrack!";

		$this->load->view('header', $title);
		$this->load->view('homepage/body');
		$this->load->view('homepage/login');
		$this->load->view('homepage/bottom');
		$this->load->view('footer');
	}

	public function register_as()
	{
		header("Access-Control-Allow-Origin: *");
		$title['title'] = "Registration";

		$this->load->view('header', $title);
		$this->load->view('navbar');
		$this->load->view('registration/reg_as');
		$this->load->view('footer');
	}

	public function register_as_prof()
	{
		header("Access-Control-Allow-Origin: *");
		$title['title'] = "Professor Registration";

		$this->load->view('header', $title);
		$this->load->view('navbar');
		$this->load->view('registration/reg_as_prof');
		$this->load->view('footer');
	}

	public function register_as_student()
	{
		header("Access-Control-Allow-Origin: *");
		$title['title'] = "Student Registration";

		$this->load->view('header', $title);
		$this->load->view('navbar');
		$this->load->view('registration/reg_as_student');
		$this->load->view('footer');
	}

	public function termsandconditions()
	{
		header("Access-Control-Allow-Origin: *");
		$title['title'] = "Terms and Conditions";

		$this->load->view('header', $title);
		$this->load->view('ghostnavbar');
		$this->load->view('homepage/termsandconditions');
		$this->load->view('footer');
	}

	public function create_password()
	{
		header("Access-Control-Allow-Origin: *");
		$title['title'] = "Create Password";

		$this->load->view('header', $title);
		$this->load->view('navbar');
		$this->load->view('registration/create_password');
		$this->load->view('footer');
	}

	public function forgot_password()
	{
		header("Access-Control-Allow-Origin: *");
		$title['title'] = "Forgot Password";

		$this->load->view('header', $title);
		$this->load->view('navbar');
		$this->load->view('homepage/forgot_password');
		$this->load->view('footer');
	}

	public function tokenerror()
	{
		$this->session->sess_destroy();

		$title['title'] = "Token Error";

        $this->load->view('header', $title);
        $this->load->view('navbar');
        echo '
        <div class="container">
           	<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
           			<p style="font-family: \'Century Gothic\', Arial; font-size: 2rem; text-align: center; border-radius: 20px; background-color: rgba(255,0,0,0.3); padding: 2rem;">
           			Token is invalid or expired. Please Register again.
           			</p>
           		</div>
				<div class="col-md-2"></div>
          	</div>
        </div>
        ';
        $this->load->view('footer');
    }

    public function token_error()
	{
		$this->session->sess_destroy();

		$title['title'] = "Token Error";

        $this->load->view('header', $title);
        $this->load->view('navbar');
        echo '
        <div class="container">
           	<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
           			<p style="font-family: \'Century Gothic\', Arial; font-size: 2rem; text-align: center; border-radius: 20px; background-color: rgba(255,0,0,0.3); padding: 2rem;">
           			Token is invalid or expired. Please request another password reset.
           			</p>
           		</div>
				<div class="col-md-2"></div>
          	</div>
        </div
        ';
        $this->load->view('footer');
    }

	/*****************************Student Validation***********************************/
	public function checkStudUserName() {
		if(!empty($_POST["StudUsername"])) {
			$StudUsername = $_POST["StudUsername"];
			$userInfo = $this->_getRecordsData($data = array('Username'), $tables = array('tblusers'), $fieldName = array('Username','isactive'), $where = array($StudUsername,1), 
				$join = null, $joinType = null, $sortBy = null, $sortOrder = null, $limit = null, 
				$fieldNameLike = null, $like = null, 
				$whereSpecial = null, $groupBy = null );

			if(empty($userInfo)) {//if username doesn't exist (success)
				echo 2;
			}
			else {//if username exists (fail)
				echo 1;
			}			
		}
		else
			echo 0;
	}

	public function checkStudEmail() {
		if(!empty($_POST["StudEmail"])) {
			$StudEmail = $_POST["StudEmail"];
			$userInfo = $this->_getRecordsData($data = array('Email'), $tables = array('tblusers'), $fieldName = array('Email','isactive'), $where = array($StudEmail, 1), 
				$join = null, $joinType = null, $sortBy = null, $sortOrder = null, $limit = null, 
				$fieldNameLike = null, $like = null, 
				$whereSpecial = null, $groupBy = null );

			if(empty($userInfo)) {//if email doesn't exist (success)
				echo 2;
			}
			else {//if email exists (fail)
				echo 1;
			}			
		}
		else
			echo 0;
	}

	public function checkStudNo() {
		if(!empty($_POST["StudNo"])) {
			$StudNo = $_POST["StudNo"];
			$userInfo = $this->_getRecordsData($data = array('StudNo'), $tables = array('tblstudentpersonaldata'), $fieldName = array('StudNo'), $where = array($StudNo), 
				$join = null, $joinType = null, $sortBy = null, $sortOrder = null, $limit = null, 
				$fieldNameLike = null, $like = null, 
				$whereSpecial = null, $groupBy = null );

			if(empty($userInfo)) {//if StudNo doesn't exist (fail)
				echo 1;
			}
			else {//if StudNo exists (success)
				echo 2;
			}			
		}
		else
			echo 0;
	}

	public function checkStudFName() {
		if(!empty($_POST["StudNo"]) && !empty($_POST["StudFName"])) {
			$StudNo = $_POST["StudNo"];
			$StudFName = $_POST["StudFName"];
			$userInfo = $this->_getRecordsData($data = array('*'), $tables = array('tblstudentpersonaldata'), $fieldName = array('StudNo','FName'), $where = array($StudNo , $StudFName), 
				$join = null, $joinType = null, $sortBy = null, $sortOrder = null, $limit = null, 
				$fieldNameLike = null, $like = null, 
				$whereSpecial = null, $groupBy = null );

			if(empty($userInfo)) {//if doesn't exist (fail)
				echo 1;
			}
			else {//if exists (success)
				echo 2;
			}			
		}
		else
			echo 0;
	}

	public function checkStudMName() {
		if(!empty($_POST["StudNo"]) && !empty($_POST["StudMName"])) {
			$StudNo = $_POST["StudNo"];
			$StudMName = $_POST["StudMName"];
			$userInfo = $this->_getRecordsData($data = array('*'), $tables = array('tblstudentpersonaldata'), $fieldName = array('StudNo','MName'), $where = array($StudNo , $StudMName), 
				$join = null, $joinType = null, $sortBy = null, $sortOrder = null, $limit = null, 
				$fieldNameLike = null, $like = null, 
				$whereSpecial = null, $groupBy = null );

			if(empty($userInfo)) {//if doesn't exist (fail)
				echo 1;
			}
			else {//if exists (success)
				echo 2;
			}			
		}
		else
			echo 0;
	}

	public function checkStudLName() {
		if(!empty($_POST["StudNo"]) && !empty($_POST["StudLName"])) {
			$StudNo = $_POST["StudNo"];
			$StudLName = $_POST["StudLName"];
			$userInfo = $this->_getRecordsData($data = array('*'), $tables = array('tblstudentpersonaldata'), $fieldName = array('StudNo','LName'), $where = array($StudNo , $StudLName), 
				$join = null, $joinType = null, $sortBy = null, $sortOrder = null, $limit = null, 
				$fieldNameLike = null, $like = null, 
				$whereSpecial = null, $groupBy = null );

			if(empty($userInfo)) {//if doesn't exist (fail)
				echo 1;
			}
			else {//if exists (success)
				echo 2;
			}			
		}
		else
			echo 0;
	}

	public function checkStudBDate() {
		if(!empty($_POST["StudNo"]) && !empty($_POST["StudBDate"])) {
			$StudNo = $_POST["StudNo"];
			$StudBDate = $_POST["StudBDate"];
			$userInfo = $this->_getRecordsData($data = array('*'), $tables = array('tblstudentpersonaldata'), $fieldName = array('StudNo','BDate'), $where = array($StudNo , $StudBDate), 
				$join = null, $joinType = null, $sortBy = null, $sortOrder = null, $limit = null, 
				$fieldNameLike = null, $like = null, 
				$whereSpecial = null, $groupBy = null );

			if(empty($userInfo)) {//if doesn't exist (fail)
				echo 1;
			}
			else {//if exists (success)
				echo 2;
			}			
		}
		else
			echo 0;
	}

	public function checkStudMobile() {
		if(!empty($_POST["StudNo"]) && !empty($_POST["StudMobile"])) {
			$StudNo = $_POST["StudNo"];
			$StudMobile = $_POST["StudMobile"];
			$userInfo = $this->_getRecordsData($data = array('*'), $tables = array('tblstudentpersonaldata'), $fieldName = array('StudNo','Mobile'), $where = array($StudNo , $StudMobile), 
				$join = null, $joinType = null, $sortBy = null, $sortOrder = null, $limit = null, 
				$fieldNameLike = null, $like = null, 
				$whereSpecial = null, $groupBy = null );

			if(empty($userInfo)) {//if doesn't exist (fail)
				echo 1;
			}
			else {//if exists (success)
				echo 2;
			}			
		}
		else
			echo 0;
	}

	public function checkStudCityAddr() {
		if(!empty($_POST["StudNo"]) && !empty($_POST["StudCityAddr"])) {
			$StudNo = $_POST["StudNo"];
			$StudCityAddr = $_POST["StudCityAddr"];
			$userInfo = $this->_getRecordsData($data = array('*'), $tables = array('tblstudentpersonaldata'), $fieldName = array('StudNo','CityAddr'), $where = array($StudNo , $StudCityAddr), 
				$join = null, $joinType = null, $sortBy = null, $sortOrder = null, $limit = null, 
				$fieldNameLike = null, $like = null, 
				$whereSpecial = null, $groupBy = null );

			if(empty($userInfo)) {//if doesn't exist (fail)
				echo 1;
			}
			else {//if exists (success)
				echo 2;
			}			
		}
		else
			echo 0;
	}

	public function checkStudGuardian() {
		if(!empty($_POST["StudNo"]) && !empty($_POST["StudGuardian"])) {
			$StudNo = $_POST["StudNo"];
			$StudGuardian = $_POST["StudGuardian"];
			$userInfo = $this->_getRecordsData($data = array('*'), $tables = array('tblstudentguardian'), $fieldName = array('StudNo','Guardian'), $where = array($StudNo , $StudGuardian), 
				$join = null, $joinType = null, $sortBy = null, $sortOrder = null, $limit = null, 
				$fieldNameLike = null, $like = null, 
				$whereSpecial = null, $groupBy = null );

			if(empty($userInfo)) {//if doesn't exist (fail)
				echo 1;
			}
			else {//if exists (success)
				echo 2;
			}			
		}
		else
			echo 0;
	}

	public function checkStudGuardianMobile() {
		if(!empty($_POST["StudNo"]) && !empty($_POST["StudGuardianMobile"])) {
			$StudNo = $_POST["StudNo"];
			$StudGuardianMobile = $_POST["StudGuardianMobile"];
			$userInfo = $this->_getRecordsData($data = array('*'), $tables = array('tblstudentguardian'), $fieldName = array('StudNo','Mobile'), $where = array($StudNo , $StudGuardianMobile), 
				$join = null, $joinType = null, $sortBy = null, $sortOrder = null, $limit = null, 
				$fieldNameLike = null, $like = null, 
				$whereSpecial = null, $groupBy = null );

			if(empty($userInfo)) {//if doesn't exist (fail)
				echo 1;
			}
			else {//if exists (success)
				echo 2;
			}			
		}
		else
			echo 0;
	}

	/***************************END OF STUDENT VALIDATION *****************************/

	/***************************** PROFESSOR VALIDATION ***********************************/
	public function checkProfUserName() {
		if(!empty($_POST["ProfUsername"])) {
			$ProfUsername = $_POST["ProfUsername"];
			$userInfo = $this->_getRecordsData($data = array('Username'), $tables = array('tblusers'), $fieldName = array('Username','isactive'), $where = array($ProfUsername, 1), 
				$join = null, $joinType = null, $sortBy = null, $sortOrder = null, $limit = null, 
				$fieldNameLike = null, $like = null, 
				$whereSpecial = null, $groupBy = null );

			if(empty($userInfo)) {//if username doesn't exist (success)
				echo 2;
			} else {
				echo 1;
			}			
		}
		else
			echo 0;
	}

	public function checkProfEmail() {
		if(!empty($_POST["ProfEmail"])) {
			$ProfEmail = $_POST["ProfEmail"];
			$userInfo = $this->_getRecordsData($data = array('Email'), $tables = array('tblusers'), $fieldName = array('Email','isactive'), $where = array($ProfEmail, 1), 
				$join = null, $joinType = null, $sortBy = null, $sortOrder = null, $limit = null, 
				$fieldNameLike = null, $like = null, 
				$whereSpecial = null, $groupBy = null );

			if(empty($userInfo)) {//if email doesn't exist (success)
				echo 2;
			}
			else {//if email exists (fail)
				echo 1;
			}			
		}
		else
			echo 0;
	}

	public function checkFCode() {
		if(!empty($_POST["FCode"])) {
			$FCode = $_POST["FCode"];
			$userInfo = $this->_getRecordsData($data = array('FCode'), $tables = array('tblfacultyprofile'), $fieldName = array('FCode'), $where = array($FCode), 
				$join = null, $joinType = null, $sortBy = null, $sortOrder = null, $limit = null, 
				$fieldNameLike = null, $like = null, 
				$whereSpecial = null, $groupBy = null );

			if(empty($userInfo)) {//if FCode doesn't exist (fail)
				echo 1;
			}
			else {//if FCode exists (success)
				echo 2;
			}			
		}
		else
			echo 0;
	}

	public function checkProfFName() {
		if(!empty($_POST["FCode"]) && !empty($_POST["ProfFName"])) {
			$FCode = $_POST["FCode"];
			$ProfFName = $_POST["ProfFName"];
			$userInfo = $this->_getRecordsData($data = array('*'), $tables = array('tblfacultyprofile'), $fieldName = array('FCode','FName'), $where = array($FCode , $ProfFName), 
				$join = null, $joinType = null, $sortBy = null, $sortOrder = null, $limit = null, 
				$fieldNameLike = null, $like = null, 
				$whereSpecial = null, $groupBy = null );

			if(empty($userInfo)) {//if doesn't exist (fail)
				echo 1;
			}
			else {//if exists (success)
				echo 2;
			}			
		}
		else
			echo 0;
	}

	public function checkProfMName() {
		if(!empty($_POST["FCode"]) && !empty($_POST["ProfMName"])) {
			$FCode = $_POST["FCode"];
			$ProfMName = $_POST["ProfMName"];
			$userInfo = $this->_getRecordsData($data = array('*'), $tables = array('tblfacultyprofile'), $fieldName = array('FCode','MName'), $where = array($FCode , $ProfMName), 
				$join = null, $joinType = null, $sortBy = null, $sortOrder = null, $limit = null, 
				$fieldNameLike = null, $like = null, 
				$whereSpecial = null, $groupBy = null );

			if(empty($userInfo)) {//if doesn't exist (fail)
				echo 1;
			}
			else {//if exists (success)
				echo 2;
			}			
		}
		else
			echo 0;
	}

	public function checkProfLName() {
		if(!empty($_POST["FCode"]) && !empty($_POST["ProfLName"])) {
			$FCode = $_POST["FCode"];
			$ProfLName = $_POST["ProfLName"];
			$userInfo = $this->_getRecordsData($data = array('*'), $tables = array('tblfacultyprofile'), $fieldName = array('FCode','LName'), $where = array($FCode , $ProfLName), 
				$join = null, $joinType = null, $sortBy = null, $sortOrder = null, $limit = null, 
				$fieldNameLike = null, $like = null, 
				$whereSpecial = null, $groupBy = null );

			if(empty($userInfo)) {//if doesn't exist (fail)
				echo 1;
			}
			else {//if exists (success)
				echo 2;
			}			
		}
		else
			echo 0;
	}

	public function checkProfBDate() {
		if(!empty($_POST["FCode"]) && !empty($_POST["ProfBDate"])) {
			$FCode = $_POST["FCode"];
			$ProfBDate = $_POST["ProfBDate"];
			$userInfo = $this->_getRecordsData($data = array('*'), $tables = array('tblfacultyprofile'), $fieldName = array('FCode','BDate'), $where = array($FCode , $ProfBDate), 
				$join = null, $joinType = null, $sortBy = null, $sortOrder = null, $limit = null, 
				$fieldNameLike = null, $like = null, 
				$whereSpecial = null, $groupBy = null );

			if(empty($userInfo)) {//if doesn't exist (fail)
				echo 1;
			}
			else {//if exists (success)
				echo 2;
			}			
		}
		else
			echo 0;
	}

	public function checkProfCityAddr() {
		if(!empty($_POST["FCode"]) && !empty($_POST["ProfCityAddr"])) {
			$FCode = $_POST["FCode"];
			$ProfCityAddr = $_POST["ProfCityAddr"];
			$userInfo = $this->_getRecordsData($data = array('*'), $tables = array('tblfacultyprofile'), $fieldName = array('FCode','CityAddr'), $where = array($FCode , $ProfCityAddr), 
				$join = null, $joinType = null, $sortBy = null, $sortOrder = null, $limit = null, 
				$fieldNameLike = null, $like = null, 
				$whereSpecial = null, $groupBy = null );

			if(empty($userInfo)) {//if doesn't exist (fail)
				echo 1;
			}
			else {//if exists (success)
				echo 2;
			}			
		}
		else
			echo 0;
	}

	/********************************END of PROFESSOR VALIDATION ************************************/

	/*******************************ADD PROFESSOR (CREATE TOKEN) ********************************/
	public function addprofessor()
	{
		$emailAddress = $this->input->post('ProfEmail');
		$userName = $this->input->post('ProfUsername');
		$lastName = $this->input->post('ProfLName');
		$middleName = $this->input->post('ProfMName');
		$firstName = $this->input->post('ProfFName');
		$birthDate = $this->input->post('ProfBDate');
		$fCode = $this->input->post('FCode');
		$cityAddr = $this->input->post('ProfCityAddr');

		$clean = $this->security->xss_clean($this->input->post(NULL, TRUE));

		$userEmployed = $this->_getRecordsData($data = array('*'), 
			$tables = array('tblfacultyprofile'), 
			$fieldName = array('LName', 'FName', 'MName', 'FCode', 'BDate', 'CityAddr'), 
			$where = array($clean['ProfLName'], $clean['ProfFName'], $clean['ProfMName'], $clean['FCode'], $clean['ProfBDate'], $clean['ProfCityAddr']), 
			$join = null, $joinType = null, $sortBy = null, $sortOrder = null, $limit = null, 
			$fieldNameLike = null, $like = null, 
			$whereSpecial = null, $groupBy = null );

		$ProfUsername = $this->_getRecordsData($data = array('Username'), $tables = array('tblusers'), $fieldName = array('Username','isactive'), $where = array($clean['ProfUsername'], 1), 
			$join = null, $joinType = null, $sortBy = null, $sortOrder = null, $limit = null, 
			$fieldNameLike = null, $like = null, 
			$whereSpecial = null, $groupBy = null );

		$ProfEmail = $this->_getRecordsData($data = array('Email'), $tables = array('tblusers'), $fieldName = array('Email','isactive'), $where = array($clean['ProfEmail'], 1), 
			$join = null, $joinType = null, $sortBy = null, $sortOrder = null, $limit = null, 
			$fieldNameLike = null, $like = null, 
			$whereSpecial = null, $groupBy = null );
		
		if(empty($ProfUsername) && empty($ProfEmail))		
		{	
			if(!empty($userEmployed)) {

			//insert records into database
			$data = null;
			$data = array(
				'Username' => $clean['ProfUsername'],
				'Email' => $clean['ProfEmail'],
				'IDCode' => $userEmployed[0]->FCode,
				'FName' => $userEmployed[0]->FName,
				'MName' => $userEmployed[0]->MName,
				'LName' => $userEmployed[0]->LName,
				'UserTypeID' => 1,
				'status' => "pending",
				'isactive' => 1
			);
			//insert record into database
	        $id = $this->_insertRecords($tableName = 'tblusers', $data);

	        //create token
	        $qstring = $this->_insertToken($id);

			//send confirmation email with token and link for setting password
			$url = site_url() . 'main/complete/token/' . $qstring;
			$link = '<a href="' . $url . '">' . $url . '</a>'; 
										
			$message = '';                     
			$message .= '<strong>Thank you for registering!</strong><br>';
			$message .= '<strong>To use GradeTrack and confirm your registration please click the link:</strong><br>' . $link;

			//echo $message;
			$this->_sendMail($toEmail = $this->input->post('ProfEmail'), $subject = "Confirm Registration as Professor", $message, $id);

			} else {
				$this->session->set_flashdata('ProfLName', $lastName);
				$this->session->set_flashdata('ProfMName', $middleName);
				$this->session->set_flashdata('ProfFName', $firstName);
				$this->session->set_flashdata('ProfBDate', $birthDate);
				$this->session->set_flashdata('FCode', $fCode);
				$this->session->set_flashdata('ProfCityAddr', $cityAddr);
				$this->session->set_flashdata('msg', "Some of the Personal Information you typed still doesn't match with your current records from the HR. Please double check the details you have typed.");
				redirect(base_url().'main/register_as_prof.html');
			}
		} else {
			$this->session->set_flashdata('msg', "Username or Password already exists.");
				redirect(base_url().'main/register_as_prof.html');
		}  
	}

/********************************** END OF ADD PROFESSOR (CREATE TOKEN) *********************************/

/************************************ ADD STUDENT (CREATE TOKEN) *****************************************/
	public function addstudent()
	{
		$emailAddress = $this->input->post('StudEmail');
		$userName = $this->input->post('StudUsername');
		$lastName = $this->input->post('StudLName');
		$middleName = $this->input->post('StudMName');
		$firstName = $this->input->post('StudFName');
		$birthDate = $this->input->post('StudBDate');
		$studentNumber = $this->input->post('StudNo');
		$cityAddr = $this->input->post('StudCityAddr');
		$studentMobile = $this->input->post('StudMobile');
		$guardianName = $this->input->post('StudGuardian');
		$guardianMobile = $this->input->post('StudGuardianMobile');

		$clean = $this->security->xss_clean($this->input->post(NULL, TRUE));

		$userEnrolled = $this->_getRecordsData($data = array('*'), 
			$tables = array('tblstudentpersonaldata'), 
			$fieldName = array('LName', 'FName', 'MName', 'StudNo', 'BDate', 'CityAddr', 'Mobile'), 
			$where = array($clean['StudLName'], $clean['StudFName'], $clean['StudMName'], $clean['StudNo'], $clean['StudBDate'], $clean['StudCityAddr'], $clean['StudMobile']), 
			$join = null, $joinType = null, $sortBy = null, $sortOrder = null, $limit = null, 
			$fieldNameLike = null, $like = null, 
			$whereSpecial = null, $groupBy = null );

		$guardianRecorded = $this->_getRecordsData($data = array('*'), 
			$tables = array('tblstudentguardian'), 
			$fieldName = array('StudNo', 'Guardian','Mobile'), 
			$where = array($clean['StudNo'], $clean['StudGuardian'], $clean['StudGuardianMobile']), 
			$join = null, $joinType = null, $sortBy = null, $sortOrder = null, $limit = null, 
			$fieldNameLike = null, $like = null, 
			$whereSpecial = null, $groupBy = null );

		$StudUsername = $this->_getRecordsData($data = array('Username'), $tables = array('tblusers'), $fieldName = array('Username','isactive'), $where = array($clean['StudUsername'],1), 
			$join = null, $joinType = null, $sortBy = null, $sortOrder = null, $limit = null, 
			$fieldNameLike = null, $like = null, 
			$whereSpecial = null, $groupBy = null );

		$StudEmail = $this->_getRecordsData($data = array('Email'), $tables = array('tblusers'), $fieldName = array('Email','isactive'), $where = array($clean['StudEmail'], 1), 
			$join = null, $joinType = null, $sortBy = null, $sortOrder = null, $limit = null, 
			$fieldNameLike = null, $like = null, 
			$whereSpecial = null, $groupBy = null );
		
		if(empty($StudUsername) && empty($StudEmail))		
		{
			if(!empty($userEnrolled) && !empty($guardianRecorded)) {

			//insert records into database
			$data = null;
			$data = array(
				'Username' => $clean['StudUsername'],
				'Email' => $clean['StudEmail'],
				'IDCode' => $userEnrolled[0]->StudNo,
				'FName' => $userEnrolled[0]->FName,
				'MName' =>$userEnrolled[0]->MName,
				'LName' => $userEnrolled[0]->LName,
				'UserTypeID' => 2,
				'status' => "pending",
				'isactive' => 1
			);
			$id = $this->_insertRecords($tableName = 'tblusers', $data);

			//create token
			$qstring = $this->_insertToken($id);

			//send confirmation email with token and link for setting password
			$url = site_url() . 'main/complete/token/' . $qstring;
			$link = '<a href="' . $url . '">' . $url . '</a>'; 
										
			$message = '';                     
			$message .= '<strong>Thank you for registering!</strong><br>';
			$message .= '<strong>To use GradeTrack and confirm your registration please click the link:</strong><br>' . $link;                          
			//echo $message;
			$this->_sendMail($toEmail = $this->input->post('StudEmail'), $subject = "Confirm Registration as Student", $message, $id);

			} else {
				$this->session->set_flashdata('StudEmail', $emailAddress);
				$this->session->set_flashdata('StudUsername', $userName);
				$this->session->set_flashdata('StudLName', $lastName);
				$this->session->set_flashdata('StudMName', $middleName);
				$this->session->set_flashdata('StudFName', $firstName);
				$this->session->set_flashdata('StudBDate', $birthDate);
				$this->session->set_flashdata('StudNo', $studentNumber);
				$this->session->set_flashdata('StudCityAddr', $cityAddr);
				$this->session->set_flashdata('StudMobile', $studentMobile);
				$this->session->set_flashdata('StudGuardian', $guardianName);
				$this->session->set_flashdata('StudGuardianMobile', $guardianMobile);
				$this->session->set_flashdata('msg', "Some of the Personal Information you typed still doesn't match with your current records from the Registrar. Please double check the details you have typed.");
				redirect(base_url().'main/register_as_student.html');
			}
		} else {
			$this->session->set_flashdata('msg', "Username or Password already exists.");
				redirect(base_url().'main/register_as_student.html');
		}     
	}
	/***************************************** END OF ADD STUDENT (CREATE TOKEN) *************************************/

	/***************************************COMPLETE ***************************************** */
	public function complete() {
		$token = $this->_base64urlDecode($this->uri->segment(4));       
		$cleanToken = $this->security->xss_clean($token);
		
		$userInfo = $this->_isTokenValid($cleanToken); //either false or array();    

		if(empty($userInfo)) {
			redirect(base_url().'main/tokenerror.html');
		}

		$data = array(
			'firstName'=> $userInfo[0]->FName, 
			'emailAddress;'=>$userInfo[0]->Email, 
			'userID'=>$userInfo[0]->UserID, 
			'userName'=>$userInfo[0]->Username, 
			'token'=>$this->_base64urlEncode($token)
		);


		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[30]|regex_match[/^[a-zA-Z0-9_@.-]+$/]', array('regex_match' => 'The Password field contains invalid characters.'));
		$this->form_validation->set_rules('passwordConfirmation', 'Password Confirmation', 'required|matches[password]');         

		if ($this->form_validation->run() == FALSE)
		{
			header("Access-Control-Allow-Origin: *");
			$title['title'] = "Create Password";

			$this->load->view('header', $title);
			$this->load->view('ghostnavbar');
			$this->load->view('registration/create_password',$data);
			$this->load->view('footer');

		} else {
			$post = $this->input->post(NULL, TRUE);
			$key = bin2hex($this->encryption->create_key(16));
			$cleanPost = $this->security->xss_clean($post);

			$hashed = $this->encryption->encrypt($cleanPost['password']);                
			$cleanPost['password'] = $hashed;
			unset($cleanPost['passwordConfirmation']);

			$UserUpdate = array(
				'password' => $cleanPost['password'],
				'status' => "confirmed",
				'lastLogin' => date('Y-m-d h:i:s A'),
				'isactive' => 1
			);
			$recordUpdated = $this->_updateRecords($tableName = 'tblusers', $fieldName = array('UserID'), $where = array($userInfo[0]->UserID), $UserUpdate);

			if(!$recordUpdated){
				error_log('Unable to updateUserInfo('.$userInfo[0]->UserID.')');
				return false;
			}

			$updatedUser = $this->_getRecordsData($data = array('*'), 
				$tables = array('tblusers'), 
				$fieldName = array('UserID'), 
				$where = array($userInfo[0]->UserID), 
				$join = null, $joinType = null, $sortBy = null, $sortOrder = null, $limit = null, 
				$fieldNameLike = null, $like = null, 
				$whereSpecial = null, $groupBy = null );

			if(!$updatedUser){
				$title['title'] = "Error";

	            $this->load->view('header', $title);
	            $this->load->view('navbar');
	            echo '
	            <div class="container">
	            	<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-8">
	            			<p style="font-family: \'Century Gothic\', Arial; font-size: 2rem; text-align: center; border-radius: 20px; background-color: rgba(255,0,0,0.3); padding: 2rem;">
	            			There was a problem in updating your record.
	            			</p>
	            		</div>
						<div class="col-md-2"></div>
	            	</div>
	            </div
	            ';
	            $this->load->view('footer'); 
			}

			unset($updatedUser[0]->Password);
			
			$this->session->set_flashdata('msgsuccess', "Account Registration complete!");
			
			foreach($updatedUser[0] as $key=>$val) {
				$this->session->set_userdata($key, $val);
			}
			
			if($userInfo[0]->UserTypeID==1)
            {
              	redirect(base_url().'main/professor_page.html');
            }
            if($userInfo[0]->UserTypeID==2)
            {
              	redirect(base_url().'main/student_page.html');
            }
		}
	}
	/*********************************END COMPLETE*********************************** */

	/********************************************** FORGOT PASSWORD ************************************************** */
	public function forgotPassword()
	{
		$emailAddress = $this->input->post('emailAddress');  
		$clean = $this->security->xss_clean($emailAddress);
		
		$getUserInfo = $this->_getRecordsData($data = array('*'), $tables = array('tblusers'), $fieldName = array('Email','isactive'), $where = array($clean,1),
			$join = null, $joinType = null, $sortBy = null, $sortOrder = null, $limit = null, $fieldNameLike = null, $like = null, $whereSpecial = null, $groupBy = null );

		if(empty($getUserInfo)){
			$this->session->set_flashdata('msg', "We can't seem to find your email address.");
			redirect(site_url().'main/forgot_password');
		}   
	
		if($getUserInfo[0]->status == 'pending'){ //if status is not approved
			$this->session->set_flashdata('msg', 'Your account is not yet in confirmed status. Please check your email and confirm.');
			redirect(site_url().'main/forgot_password');
		}

		//update db if password request has been made
        $UserUpdate = array(
            'passresetreq' => "pending"
        );
        $recordUpdated = $this->_updateRecords($tableName = 'tblusers', $fieldName = array('UserID'), $where = array($getUserInfo[0]->UserID), $UserUpdate);

        if(!$recordUpdated) { error_log('Unable to updateUserInfo('.$getUserInfo[0]->UserID.')'); }
			
		//build token 
		$qstring = $this->_insertToken($getUserInfo[0]->UserID);

		$url = site_url() . 'main/resetPassword/token/' . $qstring;
		$link = '<a href="' . $url . '">' . $url . '</a>'; 
			
		$message = '';                     
		$message .= '<strong>A password reset has been requested for this email account.</strong><br>';
		$message .= '<strong>Please click the link to continue:</strong> ' . $link;             
	
		//echo $message; //send this through mail
		$this->_sendMail2($toEmail = $clean, $subject = "Confirm Password Reset", $message);
		//exit;		
	}

/********************************************** END OF FORGOT PASSWORD ************************************************** */

/********************************************** RESET PASSWORD ************************************************** */
	public function resetPassword()
	{
		$token = $this->_base64urlDecode($this->uri->segment(4));         
		$cleanToken = $this->security->xss_clean($token);
		
		$userInfo = $this->_isTokenValid2($cleanToken); //either false or array();    
		
		if(empty($userInfo)) {
			redirect(base_url().'main/token_error.html'); 		
		}
		
		$data = array(
			'firstName'=> $userInfo[0]->FName, 
			'emailAddress'=>$userInfo[0]->Email, 
			'ID'=>$userInfo[0]->UserID, 
			'userName'=>$userInfo[0]->Username, 
			'token'=>$this->_base64urlEncode($token)
		);
		
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[30]|regex_match[/^[a-zA-Z0-9_@.-]+$/]', array('regex_match' => 'The Password field contains invalid characters.'));
		$this->form_validation->set_rules('passwordConfirmation', 'Password Confirmation', 'required|matches[password]');               
		
		if ($this->form_validation->run() == FALSE) { 
			header("Access-Control-Allow-Origin: *");
			$title['title'] = "Reset Password";

			$this->load->view('header', $title);
			$this->load->view('ghostnavbar');
			$this->load->view('homepage/reset_password', $data);
			$this->load->view('footer');

		}else{

			$post = $this->input->post(NULL, TRUE);
			$cleanPost = $this->security->xss_clean($post);
			$hashed = $this->encryption->encrypt($cleanPost['password']);                
			$cleanPost['password'] = $hashed;
			$cleanPost['ID'] = $userInfo[0]->UserID;
			
			unset($cleanPost['passwordConfirmation']);

			$tblusersUpdate = array(
				'password' => $cleanPost['password'],
				'lastLogin' => date('Y-m-d h:i:s A'),
				'passresetreq' => NULL
			);
			$recordUpdated = $this->_updateRecords($tableName = 'tblusers', $fieldName = array('UserID'), $where = array($userInfo[0]->UserID), $tblusersUpdate);

			if(!$recordUpdated){
				error_log('Unable to updateUserInfo('.$userInfo[0]->UserID.')');
				return false;
			}

			$updatedUser = $this->_getRecordsData($data = array('*'), 
				$tables = array('tblusers'), 
				$fieldName = array('UserID'), 
				$where = array($userInfo[0]->UserID), 
				$join = null, $joinType = null, $sortBy = null, $sortOrder = null, $limit = null, 
				$fieldNameLike = null, $like = null, 
				$whereSpecial = null, $groupBy = null );

			
				if(!$updatedUser){
                    $this->session->set_flashdata('msg', 'Password Reset Error.');
                }

                $this->session->set_flashdata('msgsuccess', 'Password Reset Success!');

                foreach($updatedUser[0] as $key=>$val) {
					$this->session->set_userdata($key, $val);
				}

                if($userInfo[0]->UserTypeID==1)
                {
                	redirect(base_url().'main/professor_page.html');
                }
                if($userInfo[0]->UserTypeID==2)
                {
                	redirect(base_url().'main/student_page.html');
                }
		}
	}
/********************************************** END OF RESET PASSWORD ************************************************** */

/*********************************LOGIN******************************************* */
	public function login()
	{
		if($this->session->userdata('Username') == '')
		{
			$this->form_validation->set_rules('username', 'Username', 'required');    
			$this->form_validation->set_rules('password', 'Password', 'required'); 
				
			if($this->form_validation->run() == FALSE)
			{
				header("Access-Control-Allow-Origin: *");
				$title['title'] = "Welcome to GradeTrack!";

				$this->load->view('header', $title);
				$this->load->view('homepage/body');
				$this->load->view('homepage/login');
				$this->load->view('footer');
			} 

			else
			{
				$post = $this->input->post();  
				$clean = $this->security->xss_clean($post);
			
				$getPassword = $this->_getRecordsData(
					$data = array('*'),
					$tables = array('tblusers'),
					$fieldName = array('Username'),
					$where = array($clean['username']), 
					$join = null, $joinType = null, $sortBy = null, $sortOrder = null, $limit = null, $fieldNameLike = null, $like = null, $whereSpecial = null, $groupBy = null );
			
				if(!empty($getPassword)) {
					$decryptedPassword = $this->encryption->decrypt($getPassword[0]->Password);
					//echo $decryptedPassword;
				
					if($decryptedPassword === $clean['password']) {
						foreach($getPassword[0] as $key=>$val){
							$this->session->set_userdata($key, $val);
						}

						$tblusersUpdate = array(
							'lastLogin' => date('Y-m-d h:i:s A'),
						);

						$recordUpdated = $this->_updateRecords($tableName = 'tblusers', $fieldName = array('UserID'), $where = array($getPassword[0]->UserID), $tblusersUpdate);
							
						if($getPassword[0]->UserTypeID == 1)
						{
							redirect(base_url().'main/professor_page.html');
						}
						if($getPassword[0]->UserTypeID == 2)
						{	
							redirect(base_url().'main/student_page.html');
						}
					}
					else
					{
						$this->session->set_flashdata('msg', 'Wrong Password.');
						redirect(base_url());
					}
							
				} 
				else
				{
					$this->session->set_flashdata('msg', 'Wrong Username.');
					redirect(base_url());
				}
			}
		}
		else
		{
			redirect(base_url());
		}
		
	}

	/************************************END LOGIN ******************************************** */

	/************************************LOGOUT ******************************************** */
	public function logout()
	{
		$this->session->unset_userdata($key, $val);
		$this->session->sess_destroy();
		redirect(base_url());
	}

	/************************************END LOGOUT ******************************************** */

	/************************************VIEWS AFTER LOGIN ******************************************** */
	public function professor_page()
	{
		if($this->session->userdata('Username') != '')
		{
			$data['subjects'] = $this->gt_model->getsubjectstaught($this->session->userdata('IDCode'));
			
			header("Access-Control-Allow-Origin: *");
			$title['title'] = "Professor";

			$this->load->view('header', $title);
			$this->load->view('profpage/profnavbar');
			$this->load->view('profpage/profbody', $data);
			$this->load->view('footer');
		}
		else
		{
			redirect(base_url());
		}
	}

	public function student_page()
	{
		if($this->session->userdata('Username') != '')
		{
			$data['subjects'] = $this->gt_model->getsubjectsenrolled($this->session->userdata('IDCode'));

			header("Access-Control-Allow-Origin: *");
			$title['title'] = "Student";

			$this->load->view('header', $title);
			$this->load->view('studentpage/studnavbar', $data);
			$this->load->view('studentpage/studentbody', $data);
			$this->load->view('footer');
		}
		else
		{
			redirect(base_url());
		}
	}
	/************************************VIEWS AFTER LOGIN ******************************************** */

	/****************************CREATE TABLE AND VIEW GRADES OF STUDENTS **************************** */
	public function createtable()
	{
		if($this->session->userdata('Username') != '')
		{
			$SubjCode = $this->uri->segment(3);
			$tblname = $this->gt_model->createtable($SubjCode);

			$getData = $this->_getRecordsData(
				$data = array('*'),
				$tables = array($tblname),
				$fieldName = null,
				$where = null, 
				$join = null, $joinType = null, $sortBy =  array('StudName'), $sortOrder = null, $limit = null, $fieldNameLike = null, $like = null, $whereSpecial = null, $groupBy = null );

			$data['rec_from_db'] = $getData;
			
			header("Access-Control-Allow-Origin: *");
			$title['title'] = "Grades";
			
			$this->load->view('header', $title);
			$this->load->view('profpage/profnavbar2');
			$this->load->view('profpage/profsubjview', $data);
			$this->load->view('footer');
		}
		else
		{
			redirect(base_url());
		}
	}
	/****************************END CREATE TABLE AND VIEW GRADES OF STUDENTS **************************** */	

	/************************************STUDENT VIEW GRADES ******************************************** */	
	public function studviewtable()
	{
		if($this->session->userdata('Username') != '')
		{
			$SubjCode = $this->uri->segment(3);
			$tblname = strtolower(str_replace(".","",str_replace("_","",$SubjCode)));

			if($this->db->table_exists('tbl'.$tblname))
			{
				$getData = $this->_getRecordsData(
				$data = array('*'),
				$tables = array('tbl'.$tblname),
				$fieldName = array('StudNo'), 
				$where = array($this->session->userdata('IDCode')), 
				$join = null, $joinType = null, $sortBy = null, $sortOrder = null, $limit = null, $fieldNameLike = null, $like = null, $whereSpecial = null, $groupBy = null );
			
				$data['rec_from_db'] = $getData;

				header("Access-Control-Allow-Origin: *");
				$title['title'] = "Grades";
					
				$this->load->view('header', $title);
				$this->load->view('studentpage/studnavbar2');
				$this->load->view('studentpage/studsubjview', $data);
				$this->load->view('footer');
			} else {
				$this->session->set_flashdata('msg', 'No grades to see yet.');
				redirect(base_url().'main/student_page.html');
			}
		}
		else
		{
			redirect(base_url());
		}
	}
	/************************************END STUDENT VIEW GRADES ******************************************** */	

	/************************************MIDTERM GRADE CONFIRMATION ******************************************** */	
	public function updateMidtermGradeConfirmation()
	{
		if(!empty($_POST["StudNo"])) {
			$StudNo = $_POST["StudNo"];
			$tblName =$_POST["tblName"];
			$tblmidtermconfirm = array(
				'MidtermGradeConfirmed' => 1,
			);

			$recordUpdated = $this->_updateRecords($tableName = 'tbl'.$tblName, $fieldName = array('StudNo'), $where = array($StudNo), $tblmidtermconfirm);

			if($recordUpdated) {//update succes
				echo 1;
			}
			else {//update fail
				echo 0;
			}			
		}
		else
			echo 0;
	}
	/************************************END MIDTERM GRADE CONFIRMATION ******************************************** */

	/************************************IMPORT ******************************************** */	
	public function import1()//Import Midterm Grades
	{
		require(APPPATH.'third_party/PHPExcel-1.8/Classes/PHPExcel.php');
		require(APPPATH.'third_party/PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

		$tblname = 'tbl'.str_replace(".","",str_replace("_","",$this->uri->segment(3)));

		if(isset($_FILES["file"]["name"]))
	  	{
	   		$path = $_FILES["file"]["tmp_name"];
	   		$object = PHPExcel_IOFactory::load($path);
	   		foreach($object->getWorksheetIterator() as $worksheet)
	   		{
	    		$highestRow = $worksheet->getHighestRow();
	    		$highestColumn = $worksheet->getHighestColumn();
	    		for($row=2; $row<=$highestRow; $row++)
	    		{
	     			$StudNo = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
	     			$StudName = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
	     			$PercMidtermGrade = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
	     			$data[] = array(
	      				'StudNo'  => $StudNo,
	      				'StudName'   => $StudName,
	      				'PercMidtermGrade'    => $PercMidtermGrade
	     			);
	    		}
	   		}
	   		$this->gt_model->customUpdateTable($tblname, $data);
	   		echo 'Data Imported Successfully!';
	  	}
	}

	public function import2()//Import Pre-Final Grades
	{
		require(APPPATH.'third_party/PHPExcel-1.8/Classes/PHPExcel.php');
		require(APPPATH.'third_party/PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

		$tblname = 'tbl'.str_replace(".","",str_replace("_","",$this->uri->segment(3)));

		if(isset($_FILES["file"]["name"]))
	  	{
	   		$path = $_FILES["file"]["tmp_name"];
	   		$object = PHPExcel_IOFactory::load($path);
	   		foreach($object->getWorksheetIterator() as $worksheet)
	   		{
	    		$highestRow = $worksheet->getHighestRow();
	    		$highestColumn = $worksheet->getHighestColumn();
	    		for($row=2; $row<=$highestRow; $row++)
	    		{
	     			$StudNo = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
	     			$StudName = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
	     			$PercPreFinalGrade = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
	     			$data[] = array(
	      				'StudNo'  => $StudNo,
	      				'StudName'   => $StudName,
	      				'PercPreFinalGrade'  => $PercPreFinalGrade
	     			);
	    		}
	   		}
	   		$this->gt_model->customUpdateTable($tblname, $data);
	   		echo 'Data Imported Successfully!';
	  	}
	}

	public function import3()//Import Final Grades
	{
		require(APPPATH.'third_party/PHPExcel-1.8/Classes/PHPExcel.php');
		require(APPPATH.'third_party/PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

		$tblname = 'tbl'.str_replace(".","",str_replace("_","",$this->uri->segment(3)));

		if(isset($_FILES["file"]["name"]))
	  	{
	   		$path = $_FILES["file"]["tmp_name"];
	   		$object = PHPExcel_IOFactory::load($path);
	   		foreach($object->getWorksheetIterator() as $worksheet)
	   		{
	    		$highestRow = $worksheet->getHighestRow();
	    		$highestColumn = $worksheet->getHighestColumn();
	    		for($row=2; $row<=$highestRow; $row++)
	    		{
	     			$StudNo = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
	     			$StudName = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
	     			$PercFinalGrade = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
	     			$data[] = array(
	      				'StudNo'  => $StudNo,
	      				'StudName'   => $StudName,
	      				'PercFinalGrade'   => $PercFinalGrade
	     			);
	    		}
	   		}
	   		$this->gt_model->customUpdateTable($tblname, $data);
	   		echo 'Data Imported Successfully!';
	  	}
	}

	public function import4()//Import Whole Template
	{
		require(APPPATH.'third_party/PHPExcel-1.8/Classes/PHPExcel.php');
		require(APPPATH.'third_party/PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

		$tblname = 'tbl'.str_replace(".","",str_replace("_","",$this->uri->segment(3)));

		if(isset($_FILES["file"]["name"]))
	  	{
	   		$path = $_FILES["file"]["tmp_name"];
	   		$object = PHPExcel_IOFactory::load($path);
	   		foreach($object->getWorksheetIterator() as $worksheet)
	   		{
	    		$highestRow = $worksheet->getHighestRow();
	    		$highestColumn = $worksheet->getHighestColumn();
	    		for($row=2; $row<=$highestRow; $row++)
	    		{
	     			$StudNo = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
	     			$StudName = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
	     			$PercMidtermGrade = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
	     			$PercPreFinalGrade = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
	     			$PercFinalGrade = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
	     			$data[] = array(
	      				'StudNo'  => $StudNo,
	      				'StudName'   => $StudName,
	      				'PercMidtermGrade'    => $PercMidtermGrade,
	      				'PercPreFinalGrade'  => $PercPreFinalGrade,
	      				'PercFinalGrade'   => $PercFinalGrade
	     			);
	    		}
	   		}
	   		$this->gt_model->customUpdateTable($tblname, $data);
	   		echo 'Data Imported Successfully!';
	  	}
	}
	/************************************END IMPORT ******************************************** */

	/************************************EXPORT ******************************************** */	
	public function export()
	{
		require(APPPATH.'third_party/PHPExcel-1.8/Classes/PHPExcel.php');
		require(APPPATH.'third_party/PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

		$object = new PHPExcel();

		$kindofexport = $this->uri->segment(3);
		$tblname = 'tbl'.str_replace(".","",str_replace("_","",$this->uri->segment(4)));

		$datatoexport = $this->_getRecordsData($data = array('*'), $tables = array($tblname), $fieldName = null, $where = null, $join = null, $joinType = null, $sortBy = array('StudName'), $sortOrder = null, $limit = null, $fieldNameLike = null, $like = null, $whereSpecial = null, $groupBy = null );

		if($kindofexport == 1)//Download Template for Midterm Grades
		{
			$object->setActiveSheetIndex(0);
			$object->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
	  		$object->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
	  		$object->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
	  		$object->getActiveSheet()->getProtection()->setPassword('gradetrack');
			$object->getActiveSheet()->getProtection()->setSheet(true);
			$object->getActiveSheet()->getStyle('C2:C100')->getProtection()->setLocked(PHPExcel_Style_Protection::PROTECTION_UNPROTECTED);

		  	$table_columns = array("Student No.", "Student Name", "Percentage Midterm Grade");

		  	$column = 0;

		  	foreach($table_columns as $field)
		  	{
		   		$object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
		   		$column++;
		  	}

		  	$excel_row = 2;

		  	foreach($datatoexport as $row)
		  	{
			   $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->StudNo);
			   $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->StudName);
			   $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->PercMidtermGrade);
			   $excel_row++;
		  	}

		  	$filename = "Midterm_Grades_Template_".$this->uri->segment(4).".xlsx";
			
			$object->getActiveSheet()->setTitle("Midterm_Grades");

			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="'.$filename.'"');
			header('Cache-Control: max-age=0');

			ob_clean();
			$writer = PHPExcel_IOFactory::createWriter($object, 'Excel2007');
			$writer->save('php://output');
			exit;
		}
		if($kindofexport == 2)//Download Template for Pre-Final Grades
		{
			$object->setActiveSheetIndex(0);
			$object->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
	  		$object->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
	  		$object->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
	  		$object->getActiveSheet()->getProtection()->setPassword('gradetrack');
			$object->getActiveSheet()->getProtection()->setSheet(true);
			$object->getActiveSheet()->getStyle('C2:C100')->getProtection()->setLocked(PHPExcel_Style_Protection::PROTECTION_UNPROTECTED);

		  	$table_columns = array("Student No.", "Student Name", "Percentage Pre-final Grade");

		  	$column = 0;

		  	foreach($table_columns as $field)
		  	{
		   		$object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
		   		$column++;
		  	}

		  	$excel_row = 2;

		  	foreach($datatoexport as $row)
		  	{
			   $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->StudNo);
			   $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->StudName);
			   $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->PercPreFinalGrade);
			   $excel_row++;
		  	}

		  	$filename = "Pre-final_Grades_Template_".$this->uri->segment(4).".xlsx";
			
			$object->getActiveSheet()->setTitle("Pre-final_Grades");

			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="'.$filename.'"');
			header('Cache-Control: max-age=0');

			ob_clean();
			$writer = PHPExcel_IOFactory::createWriter($object, 'Excel2007');
			$writer->save('php://output');
			exit;
		}
		if($kindofexport == 3)//Download Template for Final Grades
		{
			$object->setActiveSheetIndex(0);
			$object->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
	  		$object->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
	  		$object->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
	  		$object->getActiveSheet()->getProtection()->setPassword('gradetrack');
			$object->getActiveSheet()->getProtection()->setSheet(true);
			$object->getActiveSheet()->getStyle('C2:C100')->getProtection()->setLocked(PHPExcel_Style_Protection::PROTECTION_UNPROTECTED);

		  	$table_columns = array("Student No.", "Student Name", "Percentage Final Grade");

		  	$column = 0;

		  	foreach($table_columns as $field)
		  	{
		   		$object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
		   		$column++;
		  	}

		  	$excel_row = 2;

		  	foreach($datatoexport as $row)
		  	{
			   $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->StudNo);
			   $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->StudName);
			   $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->PercFinalGrade);
			   $excel_row++;
		  	}

		  	$filename = "Final_Grades_Template_".$this->uri->segment(4).".xlsx";
			
			$object->getActiveSheet()->setTitle("Final_Grades");

			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="'.$filename.'"');
			header('Cache-Control: max-age=0');

			ob_clean();
			$writer = PHPExcel_IOFactory::createWriter($object, 'Excel2007');
			$writer->save('php://output');
			exit;
		}
		if($kindofexport == 4)//Download Whole Template
		{
	  		$object->setActiveSheetIndex(0);
	  		$object->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
	  		$object->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
	  		$object->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
	  		$object->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
	  		$object->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
	  		$object->getActiveSheet()->getProtection()->setPassword('gradetrack');
			$object->getActiveSheet()->getProtection()->setSheet(true);
			$object->getActiveSheet()->getStyle('C2:E100')->getProtection()->setLocked(PHPExcel_Style_Protection::PROTECTION_UNPROTECTED);

		  	$table_columns = array("Student No.", "Student Name", "Percentage Midterm Grade", "Percentage Pre-Final Grade", "Percentage Final Grade");

		  	$column = 0;

		  	foreach($table_columns as $field)
		  	{
		   		$object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
		   		$column++;
		  	}

		  	$excel_row = 2;

		  	foreach($datatoexport as $row)
		  	{
			   $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->StudNo);
			   $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->StudName);
			   $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->PercMidtermGrade);
			   $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->PercPreFinalGrade);
			   $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->PercFinalGrade);
			   $excel_row++;
		  	}

		  	$filename = "All_Grades_Template_".$this->uri->segment(4).".xlsx";
			
			$object->getActiveSheet()->setTitle("All_Student_Grades");

			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="'.$filename.'"');
			header('Cache-Control: max-age=0');

			ob_clean();
			$writer = PHPExcel_IOFactory::createWriter($object, 'Excel2007');
			$writer->save('php://output');
			exit;
		}
	}
	/************************************END EXPORT ******************************************** */
}
