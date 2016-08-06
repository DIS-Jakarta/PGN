<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	
	
	 function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Europe/Lisbon');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
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
		   $this->data2['menu_dashboard'] = "";
		$this->data2['menu_user'] = "class=\"dropdown active\"";
		$this->data2['menu_data'] = "class=\"dropdown\"";
		$this->data2['menu_formula'] = "class=\"dropdown\"";
		$this->load->view('dashboard/header', $this->data);
		$this->load->view('dashboard/navbar', $this->data2);
		$this->load->view('dashboard/contentuser');
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
}