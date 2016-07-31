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
		$this->load->library('session');
		// $this->load->model('user','',TRUE);
		// $this->load->model('Content','',TRUE);
		
		// if($this->session->userdata('logged_in'))
	   // {
		 // $session_data = $this->session->userdata('logged_in');
		 // $this->data['userid'] = $session_data['userid'];
		 // $this->data['groupid'] = $session_data['groupid'];
		 // $this->data['full_name'] = $session_data['full_name'];
		 // $this->data['address'] = $session_data['address'];
		 // $this->data['phone_number'] = $session_data['phone_number'];
		 // $this->data['email_address'] = $session_data['email_address'];
		 // $this->data['is_login'] = $session_data['is_login'];
		 // $this->data['logged_in'] = $session_data['logged_in'];
		 
		 // $this->data2['menuStok'] = $this->user->getMenu($this->data['groupid'],1);
		 // $this->data2['menuUser'] = $this->user->getMenu($this->data['groupid'],2);
		 // $this->data2['menuGrupmenu'] = $this->user->getMenu($this->data['groupid'],3);
		 // $this->data2['menuItem'] = $this->user->getMenu($this->data['groupid'],4);
		 // $this->data2['menuGrup'] = $this->user->getMenu($this->data['groupid'],5);
		 // $this->data2['menuCekStok'] = $this->user->getMenu($this->data['groupid'],6);
		// }
	   
	}
	
	function index()
	{
		 if($this->session->userdata('logged_in'))
	   {
		$this->load->view('dashboard/header');
		$this->load->view('dashboard/navbar');
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
}