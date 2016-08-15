<div class="footer-absolute" style="background-color:#00a5e9;">Copyright @ PGN 2016</div>
<!-- /extra -->
<!-- Le javascript
================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.js"></script>
<script src="<?php echo site_url() ?>static/js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript">
	var $j = jQuery.noConflict(true);
	</script>
<script src="<?php echo site_url() ?>static/js/excanvas.min.js"></script> 
<script src="<?php echo site_url() ?>static/js/chart.min.js" type="text/javascript"></script> 
<script src="<?php echo site_url() ?>static/js/bootstrap.js"></script>
<script type="text/javascript" src="<? echo site_url();?>static/js/jquery.equalHeight.js"></script>
<script src="<? echo site_url();?>static/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="<? echo site_url();?>static/js/dataTables.bootstrap.js" type="text/javascript"></script>
<script src="<? echo site_url();?>static/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<? echo site_url();?>static/js/jquery.maskMoney.min.js" type="text/javascript"></script>
<script src="<? echo site_url();?>static/js/dataTables.fixedColumns.min.js" type="text/javascript"></script>
<script src="<? echo site_url();?>static/js/jquery.tabletojson.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.12/api/fnSetFilteringDelay.js" type="text/javascript"></script>
<script language="javascript" type="text/javascript" src="<?php echo site_url() ?>static/js/full-calendar/fullcalendar.min.js"></script>
 
<script src="<?php echo site_url() ?>static/js/base.js"></script> 
<script>     

	  function clickmenu(x)
	  {
		  $('menu-dashboard').removeClass("active");
		  $('menu-user').removeClass("active");
		  $('menu-data').removeClass("active");
		  $('menu-formula').removeClass("active");
		  
		  $('#' + x).addClass("active");
		  
	  }
	  
	  $('#dropdown-toggle').hover(function(){
	  $('.dropdown-menu').css('display','inline-block')}, function() {
    $('.dropdown-menu').css( 'display','none' );;
	})
	
	  $('#dropdown-toggle2').hover(function(){
	  $('.dropdown-menu2').css('display','inline-block')}, function() {
    $('.dropdown-menu2').css( 'display','none' );;
	})
	
	  $('#dropdown-toggle3').hover(function(){
	  $('.dropdown-menu3').css('display','inline-block')}, function() {
    $('.dropdown-menu3').css( 'display','none' );;
	})

	$('.dropdown-menu').hover(function(){
	  $('.dropdown-menu').css('display','inline-block')}, function() {
    $('.dropdown-menu').css( 'display','none' );;
	})  
	
	$('.dropdown-menu2').hover(function(){
	  $('.dropdown-menu2').css('display','inline-block')}, function() {
    $('.dropdown-menu2').css( 'display','none' );;
	})  
	
	$('.dropdown-menu3').hover(function(){
	  $('.dropdown-menu3').css('display','inline-block')}, function() {
    $('.dropdown-menu3').css( 'display','none' );;
	})  
	
	$(document).ajaxStop(function()
	{
		$('#loadinganimated').css('display','none');
		$('#btnSave').prop('disabled',false);
	});
	
	function reload_table()
    {
      table.ajax.reload(null,false); //reload datatable ajax 
    }
	  
	
	// special for group user AJAX 
	
	 var table = $('#tableGroupUser').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('Items/selectGroupUser')?>",
            "type": "POST",
			<?php 
			if(isset($tablename)){
			echo '
			"data": {
			"tablename" : "' . $tablename . '"
			},';
			}
			?>			
        },

        // Set column definition initialisation properties.

		fixedHeader: true,
		scrollY:        340,
		scrollCollapse: true,
		fixedColumns: true,
		scrollX:        true,
		"columnDefs": [
        { 
          "targets": [ -1 ], //last column
          "orderable": false, //set not orderable
		  <?php 
		  // if(isset($tablename))
		  // {
			  // if($tablename == "reff_itemss"){
				// echo '"visible" : false,';
			  // }
		  // }?>
        }
		
        ]
		
      });
	
	  // function addGroupUser()
    // {
      // save_method = 'add';
      // $('#form')[0].reset(); // reset form on modals
	  // $('[name="tablename"]').val("<?php if(isset($tablename)){echo $tablename;} ?>");
	  // $('[name="columnname"]').val("<?php  if(isset($fields)){echo $fields;} ?>");
      // $('#modal_form').modal('show'); // show bootstrap modal
	  // // fill data for special case invoice
	  // try{
	  // fillInvoiceData();
	  // }
	  // catch (err){}
	  // // end of fill data invoice
	  // <?php
	  // if(isset($fields))
	  // {
		  // $col = explode(",",$fields);
		  // for($i=0;$i < count($col);$i++)
		  // {
			  // echo '
					// $(\'#loadinganimated\').css(\'display\',\'inline\');
					// $(\'#btnSave\').prop(\'disabled\',true);
						// $.ajax({
						// url : "' . site_url('Items/fillddl') . '",
						// type: "POST",
						// "data": {
						// "tablename" : "' . $tablename . '",
						// "reff_column" : "' . $col[$i] . '"
						// },
						// dataType: "JSON",
						// success: function(data)
						// {
							// if(data.success)
							// {				
							// $("' . '#' . $col[$i] . '").html(data.options);
							// }
						// },
						// error: function (jqXHR, textStatus, errorThrown)
						// {
							
						// }
					// });';
		  // }
	  // }
	  // ?>
	  
	  // $('#modal_form input').prop('readonly', false);
	  
	  
      // $('#modal_form select').prop('disabled', false);
      // $('#modal_form :checkbox').prop('disabled', false);
	  // $('#modal_form button').show();
      // $('#btnclose').hide();
      // $('#btnclose2').show();
	  // $('#btnPrint').show();
	  // $('#btnPrint2').show();
	  // $('#btnPrint3').show();
	  // $('#btndetail').show();
	  // $('#btnAdddetail').show();
      // $('.modal-title').text('Add <?php if(isset($title)) { echo $title; } ?>'); // Set Title to Bootstrap modal title
    // }
	
	// function saveGroupUser()
    // {

      // var url;
      // if(save_method == 'add') 
      // {
          // url = "<?php echo site_url('Items/insert')?>";
      // }
      // else
      // {
        // url = "<?php echo site_url('Items/update')?>";
      // }
		// $('#loadinganimated').css('display','inline');
		// $('#btnSave').prop('disabled',true);
       // // ajax adding data to database
          // $.ajax({
            // url : url,
            // type: "POST",
            // data: $('#form').serialize(),
            // dataType: "JSON",
            // success: function(data)
            // {
               // // if success close modal and reload ajax table
			    // alert('Data berhasil disimpan');
			   // <?php 
			   // if(isset($tablename))
			   // {
				   // if(($tablename) == "trans_invoice")
				   // {
					   // echo "$('#btndetail').prop(\"disabled\", false);";
					   // echo "$('#btnPrint').prop(\"disabled\", false);";
					   // echo "$('#btnPrint2').prop(\"disabled\", false);";
					   // echo "$('#btnPrint3').prop(\"disabled\", false);";
					   // echo "save_method = 'edit';$('#keyvalue').val($('#invoiceId').val() + ',' + $('#SPKId').val() );";
				   // }
				   // else 
				   // {
					   // echo "$('#modal_form').modal('hide');";
				   // }
			   // }
			   // ?>
               // reload_table();
            // },
            // error: function (jqXHR, textStatus, errorThrown)
            // {
                // alert('Terjadi kesalahan pada sistem. Mohon menghubungi adminsitrator');
            // }
        // });
	// }
	
	
	// function viewGroupUser(tablename,keyfields,keyvalue)
    // {
      // save_method = 'view';
      // $('#form')[0].reset(); // reset form on modals

      // // Ajax Load data from ajax
      // $.ajax({
        // url : "<?php echo site_url('Items/edit')?>",
        // type: "POST",
        // dataType: "JSON",
		// "data": {
			// "tablename" : tablename,
			// "keyfields" : keyfields,
			// "keyvalue" : keyvalue
			// },
			
        // success: function(data)
        // {
           // <?php 
			// if(isset($fields)){
			// $column = explode(",",$fields);
			// for($i=0;$i < count($column);$i++)
			// {
				// // tambahkan blank password
				// if(!($column[$i] == "password"))
				// {	
					// /* if(isset($refftable))
					// {
						// if(!($column[$i] == $refffield))
						// {
							// echo " $('[name=" . '"' . $column[$i] . '"' . "]').val(data." . $column[$i] . ");";
						// }
					// }
					// else
					// */	
					// if(strpos($column[$i],"price") == true)
							// echo " $('[name=" . '"' . $column[$i] . '"' . "]').val(data." . $column[$i] . ");"; 
					// else
						// echo " $('[name=" . '"' . $column[$i] . '"' . "]').val(data." . $column[$i] . ");"; 
					
					// echo '
						// $.ajax({
						// url : "' . site_url('Items/fillddl') . '",
						// type: "POST",
						// "data": {
						// "tablename" : tablename,
						// "reff_column" : "' . $column[$i] . '",
						// "reff_value" : data.' . $column[$i] . '
						// },
						// dataType: "JSON",
						// success: function(data)
						// {
							// if(data.success)
							// {				
							// $("' . '#' . $column[$i] . '").html(data.options);
							// $("' . '#' . $column[$i] . '").val(data.reffvalue);
							// }
						// },
						// error: function (jqXHR, textStatus, errorThrown)
						// {
							
						// }
					// });';
				// }
				// if($column[$i] == "active")
				// {
					
					// echo 'if(data.active == "1"){
						// $("#active").prop("checked",true);
					// }
					// else{
						// $("#active").prop("checked",false);
					// }';
				// }
				// if(substr($column[$i],0,2) == "is")
				// {
					
					// echo 'if(data.' . $column[$i] . ' == "1"){
						// $("#' . $column[$i] . '").prop("checked",true);
					// }
					// else{
						// $("#' . $column[$i] . '").prop("checked",false);
					// }';
				// }
				
				
				// if($column[$i] == "password")
					// echo "$('[name=" . '"' . $column[$i] . '"' . "]').attr(\"placeholder\", \"Leave blank if don't change password\");";
				
			// }
			// }?>
            // $('[name="keyvalue"]').val(keyvalue);
			// $('[name="tablename"]').val(tablename);
			// $('[name="columnname"]').val('<?php if(isset($fields)){ echo $fields; } ?>');
            
            // $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            // $('#modal_form input').prop('readonly', true);
            // $('#modal_form select').prop('disabled', true);
            // $('#modal_form :checkbox').prop('disabled', true);
            // $('#modal_form button').hide();
            // $('#btnAdddetail').hide();
            // $('#btnclose').show();
            // $('#btnclose2').show();
			// $('#btnPrint').show();
			// $('#btnPrint2').show();
			// $('#btnPrint3').show();
			// $('#btndetail').show();
            // $('.modal-title').text('Edit <?php if(isset($title)){ echo $title; } ?>'); // Set title to Bootstrap modal title
            // <?php 
			// if(isset($tablename))
			// {
				// if(($tablename) == "trans_invoice")
			   // {
				   // echo "$('#btndetail').prop(\"disabled\", false);";
				   // echo "$('#btnPrint').prop(\"disabled\", false);";
				   // echo "$('#btnPrint2').prop(\"disabled\", false);";
				   // echo "$('#btnPrint3').prop(\"disabled\", false);";
			   // }
			// }
			// ?>
        // },
        // error: function (jqXHR, textStatus, errorThrown)
        // {
            // alert('Terjadi kesalahan pada sistem. Mohon menghubungi adminsitrator');
        // }
    // });
    // }
	
	
	// function editGroupUser(tablename,keyfields,keyvalue)
    // {
      // save_method = 'update';
      // $('#form')[0].reset(); // reset form on modals
		// $('#loadinganimated').css('display','inline');
		// $('#btnSave').prop('disabled',true);
      // // Ajax Load data from ajax
      // $.ajax({
        // url : "<?php echo site_url('Items/edit')?>",
        // type: "POST",
        // dataType: "JSON",
		// "data": {
			// "tablename" : tablename,
			// "keyfields" : keyfields,
			// "keyvalue" : keyvalue
			// },
			
        // success: function(data)
        // {
           // <?php 
			// if(isset($fields)){
			// $column = explode(",",$fields);
			// for($i=0;$i < count($column);$i++)
			// {
				// // tambahkan blank password
				// if(!($column[$i] == "password"))
				// {	
					// /* if(isset($refftable))
					// {
						// if(!($column[$i] == $refffield))
						// {
							// echo " $('[name=" . '"' . $column[$i] . '"' . "]').val(data." . $column[$i] . ");";
						// }
					// }
					// else
					// */	
					// if(strpos($column[$i],"price") == true)
							// echo " $('[name=" . '"' . $column[$i] . '"' . "]').val(data." . $column[$i] . ");"; 
					// else
						// echo " $('[name=" . '"' . $column[$i] . '"' . "]').val(data." . $column[$i] . ");"; 
					
					// echo '
						// $.ajax({
						// url : "' . site_url('Items/fillddl') . '",
						// type: "POST",
						// "data": {
						// "tablename" : tablename,
						// "reff_column" : "' . $column[$i] . '",
						// "reff_value" : data.' . $column[$i] . '
						// },
						// dataType: "JSON",
						// success: function(data)
						// {
							// if(data.success)
							// {				
							// $("' . '#' . $column[$i] . '").html(data.options);
							// $("' . '#' . $column[$i] . '").val(data.reffvalue);
							// }
						// },
						// error: function (jqXHR, textStatus, errorThrown)
						// {
							
						// }
					// });';
				// }
				// if($column[$i] == "active")
				// {
					
					// echo 'if(data.active == "1"){
						// $("#active").prop("checked",true);
					// }
					// else{
						// $("#active").prop("checked",false);
					// }';
				// }
				// if(substr($column[$i],0,2) == "is")
				// {
					
					// echo 'if(data.' . $column[$i] . ' == "1"){
						// $("#' . $column[$i] . '").prop("checked",true);
					// }
					// else{
						// $("#' . $column[$i] . '").prop("checked",false);
					// }';
				// }
				
				
				// if($column[$i] == "password")
					// echo "$('[name=" . '"' . $column[$i] . '"' . "]').attr(\"placeholder\", \"Leave blank if don't change password\");";
				
			// }
			// }?>
            // $('[name="keyvalue"]').val(keyvalue);
			// $('[name="tablename"]').val(tablename);
			// $('[name="columnname"]').val('<?php if(isset($fields)){ echo $fields; } ?>');
            // $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
			// $('#modal_form input').prop('readonly', false);
            // $('#modal_form select').prop('disabled', false);
            // $('#modal_form :checkbox').prop('disabled', false);
			// $('#modal_form button').show();
			// $('#btnclose').hide();
			// $('#btnAdddetail').show();
			// $('#btnclose2').show();
			// $('#btnPrint').show();
			// $('#btnPrint2').show();
			// $('#btnPrint3').show();
			// $('#btndetail').show();
            // $('.modal-title').text('Edit <?php if(isset($title)){ echo $title; } ?>'); // Set title to Bootstrap modal title
            				   // // special case for Invoice
			  // try{
			  // addInvoice();
			  // }
			  // catch (err){}
			  // // end of special case for Invoice

        // },
        // error: function (jqXHR, textStatus, errorThrown)
        // {
            // alert('Terjadi kesalahan pada sistem. Mohon menghubungi adminsitrator');
        // }
    // });
    // }
	
	// End of special for group user AJAX

    </script><!-- /Calendar -->
</body>
</html>