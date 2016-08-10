<script type="text/javascript">
	$('.current').html("Group Menu")
	
	</script>
<section id="main" class="column">
		<!--<article class="module width_full">
			<header><h3>Stats</h3></header>
			<div class="module_content">
				<article class="stats_graph">
					<p><h2>Welcome to AFO Body Repair System.</h2></p>
					<br /><br /><br /><p>Regards,</p><p>Digital Information Solution™</p>
				</article>
				
				<article class="stats_overview">
				<h3 style="margin-left:10px;">Info</h3>
				<br /><br /><br /><br /><br /><br /><br />
				 	<div class="overview_today">
						<p class="overview_day">Today</p>
						<p class="overview_count">1,876</p>
						<p class="overview_type">Hits</p>
						<p class="overview_count">2,103</p>
						<p class="overview_type">Views</p>
					</div>
					<div class="overview_previous">
						<p class="overview_day">Yesterday</p>
						<p class="overview_count">1,646</p>
						<p class="overview_type">Hits</p>
						<p class="overview_count">2,054</p>
						<p class="overview_type">Views</p>
					</div>
				</article>
				<div class="clear"></div>
			</div>
		</article> --><!-- end of stats article -->
		<?php 
		if(isset($Items))
		{ 
		if($isAdd == 1)
		eecho '<button class="btn btn-add" onclick="addGroupUser()" style="margin-bottom:15px;"><i class="icon-plus"></i> Add User</button>';
		
		echo '
		<br />
		<div id="phpGrid">
			<table class="table table-striped table-bordered" id="tableGroupUser" cellspacing="0" width="98%">
                  <thead>
                    <tr>
                      <th>GROUP USER</th>
                      <th>MENU DASHBOARD</th>
                      <th>MENU USER</th>
                      <th>MENU GROUP USER</th>
                      <th>MENU TAMBAH DATA</th>
                      <th>MENU EDIT DATA</th>
                      <th>MENU KATEGORI</th>
                      <th>MENU FORMULA</th>
                      <th>MENU VARIABEL</th>
                      <th>ACTION</th>
                    </tr>
                  </thead>
                  <tbody>';
                  
                 /*   foreach ($Items as $row) {
                            echo '<tr>';
                            echo '<td>'. $row->ItemName . '</td>';
                            echo '<td>'. $row->Description . '</td>';
                            echo '<td>'. $row->Price . '</td>';
							echo '<td><a href="javascript:void()" onclick="edit(' . "'" . $row->ItemName  . "'" . ')">edit</a></td>';
                            echo '</tr>';
                   } */
				   /* echo '<tr>';
                   echo '<td>ItemName</td>';
                   echo '<td>Description</td>';
                   echo '<td>Price</td>';
				   echo '<td>Action</td>';
                   echo '</tr>'; */
                   
                  
            echo    '</tbody>
            </table>
		</div>';
		} ?>
		
		
		
		<!-- Bootstrap modal -->
  <div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="btnclose2"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Item Form</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal">
          <input type="hidden" value="" name="keyvalue"/>
		  <input type="hidden" value="reff_users" name="tablename"/>
		  <input type="hidden" value="" name="columnname"/>
          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">GROUP USER</label>
              <div class="col-md-9">
                <!--<select name="groupid" id="groupid" class="form-control">
				</select>-->
				<input type="text"  name="groupid" id="groupid" class="form-control"/>
              </div>
            </div>
			<div class="form-group">
			<h2>HAK AKSES MENU</h2>
			</div>
            <div class="form-group">
              <label class="control-label col-md-3">DASHBOARD</label>
              <div class="col-md-9">
                <input type="checkbox" name="isViewDashboard" id="isView" style="margin-top:8px;"><label class="control-label col-md-3">View</label>
				<input type="checkbox" name="isAddDashboard" id="isAdd" style="margin-top:8px;"><label class="control-label col-md-3">Add</label>
				<input type="checkbox" name="isUpdateDashboard" id="isUpdate" style="margin-top:8px;"><label class="control-label col-md-3">Edit</label>
				<input type="checkbox" name="isDeleteDashboard" id="isDelete" style="margin-top:8px;"><label class="control-label col-md-3">Delete</label>
              </div>
            </div>
			<div class="form-group">
              <label class="control-label col-md-3">USER</label>
              <div class="col-md-9">
                <input type="checkbox" name="isViewUser" id="isView" style="margin-top:8px;"><label class="control-label col-md-3">View</label>
				<input type="checkbox" name="isAddUser" id="isAdd" style="margin-top:8px;"><label class="control-label col-md-3">Add</label>
				<input type="checkbox" name="isUpdateUser" id="isUpdate" style="margin-top:8px;"><label class="control-label col-md-3">Edit</label>
				<input type="checkbox" name="isDeleteUser" id="isDelete" style="margin-top:8px;"><label class="control-label col-md-3">Delete</label>
              </div>
            </div>
			<div class="form-group">
              <label class="control-label col-md-3">GROUP USER</label>
              <div class="col-md-9">
                <input type="checkbox" name="isViewGroupuser" id="isView" style="margin-top:8px;"><label class="control-label col-md-3">View</label>
				<input type="checkbox" name="isAddGroupuser" id="isAdd" style="margin-top:8px;"><label class="control-label col-md-3">Add</label>
				<input type="checkbox" name="isUpdateGroupuser" id="isUpdate" style="margin-top:8px;"><label class="control-label col-md-3">Edit</label>
				<input type="checkbox" name="isDeleteGroupuser" id="isDelete" style="margin-top:8px;"><label class="control-label col-md-3">Delete</label>
              </div>
            </div>
			<div class="form-group">
              <label class="control-label col-md-3">TAMBAH DATA</label>
              <div class="col-md-9">
                <input type="checkbox" name="isViewTambahData" id="isView" style="margin-top:8px;"><label class="control-label col-md-3">View</label>
				<input type="checkbox" name="isAddTambahData" id="isAdd" style="margin-top:8px;"><label class="control-label col-md-3">Add</label>
				<input type="checkbox" name="isUpdateTambahData" id="isUpdate" style="margin-top:8px;"><label class="control-label col-md-3">Edit</label>
				<input type="checkbox" name="isDeleteTambahData" id="isDelete" style="margin-top:8px;"><label class="control-label col-md-3">Delete</label>
              </div>
            </div>
			<div class="form-group">
              <label class="control-label col-md-3">EDIT DATA</label>
              <div class="col-md-9">
                <input type="checkbox" name="isViewEditData" id="isView" style="margin-top:8px;"><label class="control-label col-md-3">View</label>
				<input type="checkbox" name="isAddEditData" id="isAdd" style="margin-top:8px;"><label class="control-label col-md-3">Add</label>
				<input type="checkbox" name="isUpdateEditData" id="isUpdate" style="margin-top:8px;"><label class="control-label col-md-3">Edit</label>
				<input type="checkbox" name="isDeleteEditData" id="isDelete" style="margin-top:8px;"><label class="control-label col-md-3">Delete</label>
              </div>
            </div>
			<div class="form-group">
              <label class="control-label col-md-3">KATEGORI</label>
              <div class="col-md-9">
                <input type="checkbox" name="isViewKategori" id="isView" style="margin-top:8px;"><label class="control-label col-md-3">View</label>
				<input type="checkbox" name="isAddKategori" id="isAdd" style="margin-top:8px;"><label class="control-label col-md-3">Add</label>
				<input type="checkbox" name="isUpdateKategori" id="isUpdate" style="margin-top:8px;"><label class="control-label col-md-3">Edit</label>
				<input type="checkbox" name="isDeleteKategori" id="isDelete" style="margin-top:8px;"><label class="control-label col-md-3">Delete</label>
              </div>
            </div>
			<div class="form-group">
              <label class="control-label col-md-3">FORMULA</label>
              <div class="col-md-9">
                <input type="checkbox" name="isViewFormula" id="isView" style="margin-top:8px;"><label class="control-label col-md-3">View</label>
				<input type="checkbox" name="isAddFormula" id="isAdd" style="margin-top:8px;"><label class="control-label col-md-3">Add</label>
				<input type="checkbox" name="isUpdateFormula" id="isUpdate" style="margin-top:8px;"><label class="control-label col-md-3">Edit</label>
				<input type="checkbox" name="isDeleteFormula" id="isDelete" style="margin-top:8px;"><label class="control-label col-md-3">Delete</label>
              </div>
            </div>
			<div class="form-group">
              <label class="control-label col-md-3">VARIABEL</label>
              <div class="col-md-9">
                <input type="checkbox" name="isViewVariabel" id="isView" style="margin-top:8px;"><label class="control-label col-md-3">View</label>
				<input type="checkbox" name="isAddVariabel" id="isAdd" style="margin-top:8px;"><label class="control-label col-md-3">Add</label>
				<input type="checkbox" name="isUpdateVariabel" id="isUpdate" style="margin-top:8px;"><label class="control-label col-md-3">Edit</label>
				<input type="checkbox" name="isDeleteVariabel" id="isDelete" style="margin-top:8px;"><label class="control-label col-md-3">Delete</label>
              </div>
            </div>
          </div>
        </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="btnSave" onclick="saveGroupUser()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
			<button type="button" class="btn btn-danger" id="btnclose" style="display: none;" data-dismiss="modal">Close</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal -->
		
		<div class="spacer"></div>
	</section>