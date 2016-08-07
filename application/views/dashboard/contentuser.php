<div class="main" style="border-bottom:0px;padding-top:20px;padding-bottom:0;">
  <div class="main-inner">
    <div class="container">
      <div class="row" style="padding-bottom:60px;">
	  <?php 
		if(isset($Items))
		{  echo '
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