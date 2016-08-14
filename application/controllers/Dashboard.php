<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	
	 function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Europe/Lisbon');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('user','',TRUE);
		//$this->load->model('Content','',TRUE);
		
		if($this->session->userdata('logged_in'))
	   {
		 $session_data = $this->session->userdata('logged_in');
		 $this->data['userid'] = $session_data['userid'];
		 $this->data['groupid'] = $session_data['groupid'];
		 $this->data['full_name'] = $session_data['full_name'];
		 $this->data['address'] = $session_data['address'];
		 $this->data['phone_number'] = $session_data['phone_number'];
		 $this->data['email_address'] = $session_data['email_address'];
		 $this->data['is_login'] = $session_data['is_login'];
		 $this->data['logged_in'] = $session_data['logged_in'];
		 
		 $this->data2['menuDashboard'] = $this->user->getMenu($this->data['groupid'],1);
		}
	   
	}
	
	function index()
	{
		 if($this->session->userdata('logged_in'))
	   {
		$this->data2['menu_dashboard'] = "class=\"active\"";
		$this->data2['menu_user'] = "class=\"dropdown\"";
		$this->data2['menu_data'] = "class=\"dropdown\"";
		$this->data2['menu_formula'] = "class=\"dropdown\"";
		$this->load->view('dashboard/header', $this->data);
		$this->load->view('dashboard/navbar', $this->data2);
		$this->load->view('dashboard/contentdefault');
		$this->load->view('dashboard/footer');
	   }
	   else
	   {
		$this->load->view('dashboard/header');
		$this->load->view('dashboard/navbar');
		$this->load->view('dashboard/login');
		$this->load->view('dashboard/footer');
	   }
	}
	
	function verifylogin()
	{
		//This method will have the credentials validation
	   $this->load->library('form_validation');
	 
	   $this->form_validation->set_rules('userid', 'Userid', 'trim|required|xss_clean');
	   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
	   
	   if($this->check_database(MD5($this->input->post('password'))))
	   {
		   
	   }
		   
	   redirect('Dashboard', 'index');
	}
	
	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('Dashboard', 'index');
	}
	
	function check_database($password)
	{
	
   //Field validation succeeded.  Validate against database
   $userid = $this->input->post('userid');
   $result = $this->user->login($userid, $password);
	
   if($result)
   {
		 $sess_array = array();
		 foreach($result as $row)
		 {
		   $sess_array = array(
			 'userid' => $row->userid,
			 'groupid' => $row->groupid,
			 'full_name' => $row->full_name,
			 'address' => $row->address,
			 'phone_number' => $row->phone_number,
			 'email_address' => $row->email_address,
			 'is_login' => $row->is_login,
			 'logged_in' => TRUE,
			 'divisionid' => $row->divisionid
		   );
		   
		   //echo '<script type="text/javascript">alert("logged_in : ' . $sess_array['is_login'] . '")</script>';
		 
		   if($sess_array['is_login'] == 1)
		   {
		   echo 'gagal login';
		   redirect('Dashboard', 'index');
		   }
		   else
		   {
			echo 'sukses login';
		   $this->session->set_userdata('logged_in', $sess_array);
		   
		   }
		 }
	   }
	   else
	   {
		   echo 'salah password';
		   redirect('Dashboard', 'index');
	   }
	}
}