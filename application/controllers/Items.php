<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Items extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('Content','',TRUE);
	}
	
	public function select()
	{
		$jointable="";
		$joinfield = "";
		$joinon="";
		$_jointable="";
		$_joinfield = "";
		$_joinon="";
		$session_data = $this->session->userdata('logged_in');
		$data = array();
		$column = explode(',',$_POST['fields']);
		$no = $_POST['start'];
		//log_message('info', print_r($_POST["columns"]["0"]["search"[""value]]);
		$condition = $_POST['condition'];

		for ( $i=0 ; $i<count($_POST["columns"]) ; $i++ )
		{
			$_jointable="";
			$_joinfield = "";
			
			if ( $_POST["columns"][$i]["search"]["value"] != "")
			{
				
				if ( $condition == "" )
				{
					$condition = " ";
				}
				else
				{
					$condition .= " AND ";
				}
				
				$query = "SELECT * FROM reff_table WHERE maintable = '" . $_POST['tablename'] . "' AND refffield = '" . $column[$i] . "'";
					$countrows = $this->Content->countrows($query);
					if($countrows > 0)
					{
						$reff = $this->Content->select2($query);
						foreach($reff as $reffp)
						{
							if($joinfield == "")
							{
								$joinfield = $reffp->fieldjointable;
								$_joinfield = $reffp->fieldjointable;
							}
							else
								$joinfield .= "," . $reffp->fieldjointable;
							
							if($jointable == "")
							{
								$jointable = $reffp->jointable;
								$_jointable = $reffp->jointable;
							}
							else
								$jointable .= $reffp->jointable;
						//. ' ON ' . $_POST['tablename'] . '.' . $reffp->fieldjointable . ' = ' . $reffp->jointable . '.' . $reffp->fieldjointable ;
						if($joinon == "")
							$joinon = $_POST['tablename'] . '.' . $column[$i] . ' = ' . $reffp->jointable . '.' . $column[$i];
						else
							$joinon .= "," . $_POST['tablename'] . '.' . $column[$i] . ' = ' . $reffp->jointable . '.' . $column[$i];
						}
					}
				if($_jointable != "")
					$condition .= $_jointable . '.' . $_joinfield ." LIKE '%".mysql_real_escape_string($_POST["columns"][$i]["search"]["value"])."%' ";
				else
					$condition .= $column[$i]." LIKE '%".mysql_real_escape_string($_POST["columns"][$i]["search"]["value"])."%' ";
			}
		}
		
		$out = $this->Content->get_datatables($_POST['tablename'],$column,$condition,$jointable,$joinon);
		
		$keyfields = explode(',',$_POST['keyfields']);
		$menu = $this->Content->select2("SELECT isView,isUpdate,isDelete FROM reff_groupmenu WHERE menuid = '" . $_POST['menuid'] . "' AND groupid = '" . $session_data['groupid'] . "'");
		
		foreach ($menu as $menup) 
		{
			$isView = $menup->isView;
			$isUpdate = $menup->isUpdate;
			$isDelete = $menup->isDelete;
		}
		//log_message('info', "update : " . $isUpdate . " delete : " . $isDelete );
		foreach ($out as $outp) 
		{
			$keyvalue = "";
			$no++;
			$row = array();
			for($i = 0;$i < count($column);$i++)
			{
				if($column[$i] == "password")
					$row[] = "********";
				else if($column[$i] == "active")
				{
					if($outp->$column[$i] == "1")
					$row[] = "ya";
					else
					$row[] = "tidak";
				}
				else if(substr($column[$i],0,2) == "is")
				{
					if($outp->$column[$i] == "1")
					$row[] = "ya";
					else
					$row[] = "tidak";
				}
				else if(strpos(strtolower($column[$i]), 'tgl') !== FALSE || strpos(strtolower($column[$i]), 'tanggal') !== FALSE)
				{
					$date = strtotime($outp->$column[$i]);
					$row[] = date('d/m/Y',$date);
				}
				else if(strpos($column[$i],"Price") !== FALSE)
				{
					$row[] = "Rp. " . number_format($outp->$column[$i],0,',','.');
				}
				else
				{
					$query = "SELECT * FROM reff_table WHERE maintable = '" . $_POST['tablename'] . "' AND refffield = '" . $column[$i] . "'";
					$countrows = $this->Content->countrows($query);
					if($countrows > 0)
					{
						$reff = $this->Content->select2($query);
						foreach($reff as $reffp)
						{
							$reff2 = $this->Content->select2($reffp->reffquery . " WHERE " . $reffp->refffield . " = '" . $outp->$column[$i] . "'");
								foreach($reff2 as $reffp2)
								{
									$row[] = $reffp2->description;
								}
						}
					}
					else
					$row[] = $outp->$column[$i];
					
					for($c = 0;$c < count($keyfields);$c++)
					{
						if($column[$i] == $keyfields[$c])
						{
							if($keyvalue == "")
							$keyvalue .= $outp->$column[$i];
							else
							$keyvalue .= "," . $outp->$column[$i];
						}
					}
				}
			}
			
			$ViewEditdelete = "";
			if($isView == "1"){
			$ViewEditdelete = '<td><a class="btn btn-sm btn-success" style="margin:3px;display:inline-block;width:50px;" href="javascript:void()" onclick="view(' . "'" . $_POST['tablename'] . "'" . ',' . "'" . $_POST['keyfields'] . "'" . ',' . "'" . $keyvalue  . "'" . ');">
			<i class="icon-eye-open">Lihat</i></a>';
			}
			if($isUpdate == "1"){
			$ViewEditdelete .= '<td><a class="btn btn-sm btn-primary" style="margin:3px;display:inline-block;width:50px;" href="javascript:void()" onclick="edit(' . "'" . $_POST['tablename'] . "'" . ',' . "'" . $_POST['keyfields'] . "'" . ',' . "'" . $keyvalue  . "'" . ');">
			<i class="icon-edit">Ubah</i></a>';
			}
			if($isDelete == "1"){
			$ViewEditdelete .= '<a class="btn btn-sm btn-danger" href="javascript:void()" style="margin:3px;display:inline-block;width:50px;" title="Hapus" onclick="delete_it(' . "'" . $_POST['tablename'] . "'" . ',' . "'" . $_POST['keyfields'] . "'" . ',' . "'" . $keyvalue  . "'" . ')"><i class="icon-remove-sign">Hapus</i></a></td>
			';
			}
			$row[] = $ViewEditdelete;
			
			$data[] = $row;
		}
		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->Content->count_all($_POST['tablename']),
						"recordsFiltered" => $this->Content->count_filtered($_POST['tablename'],$column),
						"data" => $data,
				);
				
		//log_message('ERROR', print_r()) );
		echo json_encode($output);
	}

	public function insert()
	{
		$column = explode(",",$this->input->post('columnname'));
		$values = array();
		 for($i=0;$i < count($column);$i++)
		{	if($column[$i] == "password")
				$values[$column[$i]] = MD5($this->input->post($column[$i]));
			else if(strpos($column[$i],"Price") !== FALSE)
			{
				$values[$column[$i]] = str_replace(".","",$this->input->post($column[$i]));
			}
			else
				$values[$column[$i]] = $this->input->post($column[$i]);
		} 
		$insert = $this->Content->save($this->input->post('tablename'), $values);
		echo json_encode(array("status" => TRUE));
	}
	
	public function update()
	{
		$column = explode(",",$this->input->post('columnname'));
		$keyvalues = explode(",",$this->input->post('keyvalue'));
		$key = array();
		$keys = array();
		$queryfindkey = "SELECT * FROM reff_tablekey WHERE tablename = '" . $this->input->post('tablename') . "'";
		$findkey = $this->Content->select2($queryfindkey);
		foreach($findkey as $findkeyp)
		{
			$key = explode(",",$findkeyp->keyfields);
		}
		
		$values = array();
		 for($i=0;$i < count($column);$i++)
		{
			if($column[$i] == "password")
			{
				if(!($this->input->post($column[$i]) == null))
					$values[$column[$i]] = MD5($this->input->post($column[$i]));
			}
			else if(strpos($column[$i],"Price") !== FALSE)
			{
				$values[$column[$i]] = str_replace(".","",$this->input->post($column[$i]));
			}
			else
			{
				$values[$column[$i]] = $this->input->post($column[$i]);
				
						for($k=0;$k < count($key);$k++)
						{
							
							if($column[$i] == $key[$k])
							{								
								$keys[$column[$i]] = $keyvalues[$k];
								
								//log_message('info', ' keys ' . $keys[$column[$i]]);
							}
						}
				
			}
		} 
		$this->Content->update($this->input->post('tablename'),$keys, $values);
		echo json_encode(array("status" => TRUE));
	}
	
	public function edit()
	{
		$data = $this->Content->get_by_id($_POST['tablename'],$_POST['keyfields'],$_POST['keyvalue'],null);
		// if(array_key_exists('Price',$data))
		// {
			// $data->Price = number_format($data->Price,0,',','.');
		// }
		foreach($data as $key=>$value)
		{
		if(stristr($key,'Price')!==FALSE)
			$data->$key = number_format($data->$key,0,',','.');
		}
	
		
		//log_message('info', print_r($data,true));
		echo json_encode($data);
	}
	
	public function delete()
	{
		$this->Content->delete($_POST['tablename'],$_POST['keyfields'],$_POST['keyvalue']);
		echo json_encode(array("status" => TRUE));
	}
	
	
	public function fillddl()
	{
		$option = '';
		$query = "SELECT * FROM reff_table WHERE maintable = '" . $_POST['tablename'] . "' AND refffield = '" . $_POST['reff_column'] . "'";
		$countrows = $this->Content->countrows($query);
		if($countrows > 0)
		{
			$reff = $this->Content->select2($query);
						foreach($reff as $reffp)
						{
							$reff2 = $this->Content->select2($reffp->reffqueryedit);
							foreach($reff2 as $reffp2)
							{
								$option .= '<option value="'. $reffp2->$_POST['reff_column'] .'">'. $reffp2->description .'</option>';
							}
						}
		}
		
		$reffvalue = "";
		if(isset($_POST['reff_value']))
		{ 
		$reffvalue = $_POST['reff_value']; 
		}

		
		if(count($option) > 0)
		{
		 $response = array(
        'success' => TRUE,
        'options' => $option,
		'reffvalue' => $reffvalue
		);
		}
		else
		{
			$response = array(
        'success' => false
		);
		}
		
		
		echo json_encode($response);
	}
	
	public function selectwquery()
	{
		$response = array(
        'success' => false
		);
		
		if($_POST['method'] == "update")
		{
			$databefore = 0;
			//log_message('info',print_r('id : ' . $_POST['id'],true));
			$out = $this->Content->select2("select Quantity from trans_stock where Id ='" . $_POST['id'] . "'");
			foreach($out as $outs)
			{
				$databefore = $outs->Quantity;
			}
			//log_message('info',print_r('databefore : ' . $databefore,true));
			$abs = $_POST['Quantity'] - $databefore;
			$_POST['query'] = str_replace($_POST['Quantity'],$abs, $_POST['query']);
			//log_message('info', print_r($_POST['query'],true));
		}
		else if ($_POST['method'] == "delete")
		{
			$Quantity = "";
			$Jenis = "";
			$ItemName = "";
			$out = $this->Content->select2("select Quantity,Jenis,ItemName from trans_stock where Id ='" . $_POST['id'] . "'");
			foreach($out as $outs)
			{
				$Quantity = $outs->Quantity;
				$Jenis = $outs->Jenis;
				$ItemName = $outs->ItemName;
			}
			
				if($Jenis == "barang masuk")
				{
					$Jenis = " - ";
				}
				else
				{
					$Jenis = " + ";
				}
				
				$_POST['query'] = str_replace("{__ITEMNAME__}",$ItemName, $_POST['query']);
				$_POST['query'] = str_replace("{__JENIS__}",$Jenis, $_POST['query']);
				$_POST['query'] = str_replace("{__JUMLAHSTOK__}",$Quantity, $_POST['query']);
				log_message('info', print_r($_POST['query'],true));
		}
	
			$countrows = $this->Content->countrows($_POST['query']);
			if($countrows > 0)
			{
				$out= $this->Content->selectwquery($_POST['query']);
				foreach($out as $outp)
				{
					$keys["ItemName"] = $_POST['keys'];
					$values["Quantity"] = $outp->datas;
					$this->Content->update("reff_items",$keys, $values);
					$response = array(
					'success' => TRUE
					);
				}
			}
		echo json_encode($response);
	}
	

	public function selectreturnvalquery()
	{
		log_message('info', print_r("query : " . $_POST["Query"],true));
		$response = array(
		'success' => FALSE);
		try
		{
			$out = $this->Content->select2($_POST["Query"]);
			$countrows = $this->Content->countrows($_POST["Query"]);
			if($countrows > 0)
			{
				foreach($out as $outs)
				{
					$response = array(
					'success' => TRUE,
					$_POST["fieldname"] => $outs->$_POST["fieldname"]
					);
				}
			}
		}
		catch (Exception $e) {
			log_message('info', print_r($e->getMessage(),true));
		}
		echo json_encode($response);
	}
	
	public function savestokbarang()
	{
		try
		{
			$dataerror = "";
			$error = FALSE;
			$databeforesave = array();
			$dbs = array();
			$data = json_decode(stripslashes($_POST['data']),true);
			log_message('info', print_r($data,true));
			$response = array(
			'success' => FALSE);
			foreach($data as $item)
			{
				$databeforesave[$item["ItemName"]] = $item["Quantity"];
				foreach($databeforesave as $key => $databs)
				{
					log_message('info', print_r("key databs : " . $databs,true));
					log_message('info', print_r("key databs : " . $key,true));
					if(array_key_exists($key,$dbs));
					{
						array_push($dbs,$key,($dbs[$key] + $databs));
						//= $dbs[key($databeforesave)] + $databs;
					}
					
					if(!(array_key_exists($key,$dbs)))
					{
						array_push($dbs,$key,$databs);
					}
				}
			}
			
			log_message('info', print_r("dbs data : " . print_r($dbs),true));
			
			foreach($dbs as $dbsave)
			{
				if($_POST['jenis'] == "barang keluar")
				{
					$querysave = "select 1 from reff_items where IFNULL(Quantity,0) - "  . $dbsave[key($dbsave)] . " > 0 and ItemName = '" . key($dbsave) . "'";
					if($this->Content->countrows() > 0)
					{
						$this->Content->updatewquery("Update reff_items set Quantity = Quantity - " . $dbsave[key($dbsave)] . " where ItemName = '" . key($dbsave) . "'");
						$out = $this->Content->select2("select max(id) + 1 as 'Id' from trans_stock");
						foreach($out as $outs)
						{
						$item['Id'] = $outs->Id;
						}
						$item['Tgl_Barang_Masuk'] = date('Y-m-d H:i:s');
						$insert = $this->Content->save('trans_stock', $item);
						
					}
					else
					{
						$error = TRUE;
						if($dataerror == "")
							$dataerror = key($dbsave);
						else
							$dataerror = "," . key($dbsave);
					}
				}
				else
				{
					$this->Content->updatewquery("Update reff_items set Quantity = Quantity + " . $dbsave[key($dbsave)] . " where ItemName = '" . key($dbsave) . "'");
					$out = $this->Content->select2("select max(id) + 1 as 'Id' from trans_stock");
					foreach($out as $outs)
					{
					$item['Id'] = $outs->Id;
					}
					$item['Tgl_Barang_Masuk'] = date('Y-m-d H:i:s');
					$insert = $this->Content->save('trans_stock', $item);
				}
			}
			
			$response = array(
			'success' => $error,
			'dataerror' => $dataerror);
			
			// if($_POST['jenis'] == "barang masuk")
			// {
				// $this->Content->updatewquery("Update reff_items set Quantity = Quantity + " . $item["Quantity"] .
				// " where ItemName = '" . $item["ItemName"] . "'");
			// }
			// else
			// {
				// $this->Content->updatewquery("Update reff_items set Quantity = Quantity - " . $item["Quantity"] .
				// " where ItemName = '" . $item["ItemName"] . "'");
			// }
			// $out = $this->Content->select2("select max(id) + 1 as 'Id' from trans_stock");
			// foreach($out as $outs)
			// {
			// $item['Id'] = $outs->Id;
			// }
			// $item['Tgl_Barang_Masuk'] = date('Y-m-d H:i:s');
			// $insert = $this->Content->save('trans_stock', $item);
			// $response = array(
			// 'success' => TRUE);
		}
		catch (Exception $e){
			$response = array(
			'success' => FALSE);
		}
		echo json_encode($response);
	}
	
	public function selectGroupUser()
	{
		$session_data = $this->session->userdata('logged_in');
		// $_POST['keyfields'] = 'groupid,menuid';
				// $_POST['menuid'] = '2';
		$out = $this->Content->select2('SELECT * FROM  `vw_group_user`');
		//log_message('ERROR', 'woiii sampe woiii' );
		$keyfields = explode(',',$_POST['keyfields']);
		$menu = $this->Content->select2("SELECT isView,isUpdate,isDelete FROM reff_groupmenu WHERE menuid = '" . $_POST['menuid'] . "' AND groupid = '" . $session_data['groupid'] . "'");
		$keyvalue = "";
		$column = "";
		foreach ($menu as $menup) 
		{
			$isView = $menup->isView;
			$isUpdate = $menup->isUpdate;
			$isDelete = $menup->isDelete;
		}
		
		foreach ($out as $outp) 
		{ 
			$menucrud = "";
			$row = array();
			$row[] = $outp->GroupName;
			$_menu = $this->Content->select2('SELECT menu_desc FROM reff_menu');
			foreach($_menu as $_menup)
			{
			$menucrud = $this->crudfunction($_menup->menu_desc,$outp);
			$row[] = $menucrud;
			}
			
		$ViewEditdelete = "";
			if($isView == "1"){
			$ViewEditdelete = '<td><a class="btn btn-sm btn-success" style="margin:3px;display:inline-block;width:50px;" href="javascript:void()" onclick="view(' . "'" . $_POST['tablename'] . "'" . ',' . "'" . $_POST['keyfields'] . "'" . ',' . "'" . $keyvalue  . "'" . ');">
			<i class="icon-eye-open">Lihat</i></a>';
			}
			if($isUpdate == "1"){
			$ViewEditdelete .= '<td><a class="btn btn-sm btn-primary" style="margin:3px;display:inline-block;width:50px;" href="javascript:void()" onclick="edit(' . "'" . $_POST['tablename'] . "'" . ',' . "'" . $_POST['keyfields'] . "'" . ',' . "'" . $keyvalue  . "'" . ');">
			<i class="icon-edit">Ubah</i></a>';
			}
			if($isDelete == "1"){
			$ViewEditdelete .= '<a class="btn btn-sm btn-danger" href="javascript:void()" style="margin:3px;display:inline-block;width:50px;" title="Hapus" onclick="delete_it(' . "'" . $_POST['tablename'] . "'" . ',' . "'" . $_POST['keyfields'] . "'" . ',' . "'" . $keyvalue  . "'" . ')"><i class="icon-remove-sign">Hapus</i></a></td>
			';
			}
			$row[] = $ViewEditdelete;
			
			$data[] = $row;
		}
		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->Content->count_all($_POST['tablename']),
						"recordsFiltered" => $this->Content->count_filtered($_POST['tablename'],$column),
						"data" => $data,
				);
				
		//log_message('ERROR', print_r()) );
		echo json_encode($output);
	}
	
	private function crudfunction($menuname,$outp)
	{
		
		$menucrud = "";
		$checked = "";
		$View = 'View' . $menuname;
		$Add = 'Add' . $menuname;
		$Update = 'Update' . $menuname;
		$Delete = 'Delete' . $menuname;
			
		$menucrud = '<input type="checkbox" name="IsView' . $menuname . '" value="1" disabled="disabled" '; 
		if($outp->$View == '1')
			$menucrud .= ' checked="checked" /> View';
		else 
			$menucrud .= ' /> View';
		$menucrud .= '</br>';
		
		$menucrud .= '<input type="checkbox" name="IsAdd' . $menuname . '" value="1" disabled="disabled" '; 
		if($outp->$Add == '1')
			$menucrud .= ' checked="checked" /> Add';
		else 
			$menucrud .= ' /> Add';
		$menucrud .= '</br>';
		
		$menucrud .= '<input type="checkbox" name="IsUpdate' . $menuname . '" value="1" disabled="disabled" '; 
		if($outp->$Update == '1')
			$menucrud .= ' checked="checked" /> Edit';
		else 
			$menucrud .= ' /> Edit';
		$menucrud .= '</br>';
		
		$menucrud .= '<input type="checkbox" name="IsDelete' . $menuname . '" value="1" disabled="disabled" '; 
		if($outp->$Delete == '1')
			$menucrud .= ' checked="checked" /> Delete';
		else 
			$menucrud .= ' /> Delete';
		$menucrud .= '</br>';
		
		return $menucrud;
	}
	

}