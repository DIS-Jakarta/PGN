<div class="main" style="border-bottom:0px;padding-top:20px;padding-bottom:0;">
  <div class="main-inner">
    <div class="container">
      <div class="row" style="padding-bottom:60px;">
	  <?php 
		if(isset($Items))
		{  
		
		if($isAdd == "1")
		{
		echo '<button class="btn btn-add" onclick="add()" style="margin-bottom:15px;"><i class="icon-plus"></i> Add User</button>';
		}
	
		echo '
		<br />
		<div id="phpGrid">
			<table class="table table-striped table-bordered" id="table" cellspacing="0" width="98%">
                  <thead>
                    <tr>
                      <th>USERID</th>
                      <th>PASSWORD</th>
                      <th>GROUP USER</th>
                      <th>NAMA LENGKAP</th>
                      <th>ALAMAT</th>
                      <th>NO. TELEPON</th>
                      <th>ALAMAT EMAIL</th>
					  <th>REGION</th>
                      <th>ACTIVE</th>
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
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>
<!-- /main -->

<!-- Bootstrap modal -->
  <div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="btnclose2"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">User Form</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal">
          <input type="hidden" value="" name="keyvalue"/>
		  <input type="hidden" value="reff_users" name="tablename"/>
		  <input type="hidden" value="" name="columnname"/>
          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">USERID</label>
              <div class="col-md-9">
                <input name="userid" placeholder="Userid" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">PASSWORD</label>
              <div class="col-md-9">
                <input name="password" placeholder="Password" class="form-control" type="password">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">GROUP USER</label>
              <div class="col-md-9" >
				<select name="groupid" id="groupid" class="form-control">
				</select>
              </div>
            </div>
			<div class="form-group">
              <label class="control-label col-md-3">NAMA LENGKAP</label>
              <div class="col-md-9">
                <input name="full_name" placeholder="Nama Lengkap" class="form-control" type="text">
              </div>
            </div>
			<div class="form-group">
              <label class="control-label col-md-3">ALAMAT</label>
              <div class="col-md-9">
                <input name="address" placeholder="Alamat" class="form-control" type="text">
              </div>
            </div>
			<div class="form-group">
              <label class="control-label col-md-3">NO. TELEPON</label>
              <div class="col-md-9">
                <input name="phone_number" placeholder="NO. TELEPON" class="form-control" type="text">
              </div>
            </div>
			<div class="form-group">
              <label class="control-label col-md-3">ALAMAT EMAIL</label>
              <div class="col-md-9">
                <input name="email_address" placeholder="ALAMAT EMAIL" class="form-control" type="text">
              </div>
            </div>
			<div class="form-group">
              <label class="control-label col-md-3">REGION</label>
              <div class="col-md-9">
                <select name="regionid" id="regionid" class="form-control">
				</select>
              </div>
            </div>
			<div class="form-group">
              <label class="control-label col-md-3">ACTIVE</label>
              <div class="col-md-9">
                <input type="checkbox" name="active" id="active">
                </select>
              </div>
            </div>
          </div>
        </form>
          </div>
          <div class="modal-footer">
		  <img src="<?php echo site_url()?>/static/images/spinner.gif" style="max-height:50px;display:none;margin-right:-20px;" id="loadinganimated" />
            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-danger" id="btnclose" style="display: none;" data-dismiss="modal">Close</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal -->