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
		$this->load->model('Content','',TRUE);
		
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
	
	public function User()
	{	
		 if($this->session->userdata('logged_in'))
	   { 
	   
	   $this->data['tablename'] = "reff_users"; 
	   $this->data['menuid'] = "1";
	   $data3['isAdd'] = $this->canAdd($this->data['groupid'],$this->data['menuid']);
	   //log_message('info', ' isAdd : ' . $data3['isAdd']);
	   $query = "SELECT * FROM reff_tablekey WHERE tablename = '" . $this->data['tablename'] . "'" ;
	   $tablestructure = $this->Content->select2($query);
	   foreach( $tablestructure as $tablestructurep )
	   {
		   $this->data['fields'] = $tablestructurep->fields; 
		   $this->data['keyfields'] = $tablestructurep->keyfields; 
		   if($tablestructurep->Condition != null)
		   $this->data['condition'] = $tablestructurep->Condition; 
	   }
		 $data3['Items'] = $this->Content->select($this->data['tablename'],null,null,$this->data['keyfields']);
		$this->data2['menu_dashboard'] = "";
		$this->data2['menu_user'] = "class=\"dropdown active\"";
		$this->data2['menu_data'] = "class=\"dropdown\"";
		$this->data2['menu_formula'] = "class=\"dropdown\"";
		$this->load->view('dashboard/header', $this->data);
		$this->load->view('dashboard/navbar', $this->data2);
		$this->load->view('dashboard/contentuser', $data3);
		$this->load->view('dashboard/footer');
	   } 
	   else
	   {
		echo '<script type="text/javascript">alert("Harap login terlebih dahulu."); </script>';
		 //If no session, redirect to login page
	    $this->load->view('dashboard/header');
		$this->load->view('dashboard/navbar');
		$this->load->view('dashboard/contentdefault');
		$this->load->view('dashboard/footer');
	   } 	
	}
	
	public function Groupuser()
	{	
		 if($this->session->userdata('logged_in'))
	   { 
		$this->data['tablename'] = "reff_groupmenu"; 
		$this->data['menuid'] = "2";
		$data3['isAdd'] = $this->canAdd($this->data['groupid'],$this->data['menuid']);
		$query = "SELECT * FROM reff_tablekey WHERE tablename = '" . $this->data['tablename'] . "'" ;
	   // $tablestructure = $this->Content->select2($query);
	   // foreach( $tablestructure as $tablestructurep )
	   // {
		   // $this->data['fields'] = $tablestructurep->fields; 
		   // $this->data['keyfields'] = $tablestructurep->keyfields; 
		   // if($tablestructurep->Condition != null)
		   // $this->data['condition'] = $tablestructurep->Condition; 
	   // }
		 // $data3['Items'] = $this->Content->select($this->data['tablename'],"groupid","groupid != '1'",$this->data['keyfields']);
		$this->data2['menu_dashboard'] = "";
		$this->data2['menu_user'] = "class=\"dropdown active\"";
		$this->data2['menu_data'] = "class=\"dropdown\"";
		$this->data2['menu_formula'] = "class=\"dropdown\"";
		
		$this->load->view('dashboard/header', $this->data);
		$this->load->view('dashboard/navbar', $this->data2);
		$this->load->view('dashboard/contentgroupuser', $data3);
		$this->load->view('dashboard/footergroupuser');
	   } 
	   else
	   {
		echo '<script type="text/javascript">alert("Please Login to see this menu."); </script>';
		 //If no session, redirect to login page
		$this->load->view('dashboard/header');
		$this->load->view('dashboard/navbar');
		$this->load->view('dashboard/contentdefault');
		$this->load->view('dashboard/footer');
	   } 	
	}
	
	private function canAdd($groupid,$menuid)
	{
		$isAdds = 0;
		$querymenu = $this->Content->select2("SELECT isAdd FROM reff_groupmenu WHERE groupid = '" . $groupid . "' AND menuid = '" .$menuid . "'" );
		foreach($querymenu as $querymenup)
		{
			$isAdds = $querymenup->isAdd;
		}
		return $isAdds;
	}
}