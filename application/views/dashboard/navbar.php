<div class="navbar navbar-fixed-top" >
  <div class="navbar-inner" style="background-color:#00a5e9 !important;">
    <div class="container" style="padding-top:5px;width:100%;"> 
	<!--<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a>
					<a class="brand" href="index.html">Bootstrap Admin Template </a>--> 
      <!--<div class="nav-collapse"> --> 
	  <?if(isset($full_name))
	  {?>
	  <div style="float:right;margin-right:5px;color:white;">Selamat datang <i class="icon-user-md"></i> <? echo $full_name ?>, <a style="text-decoration:underline;color:white;font-weight:700;" href="<?php echo site_url() ?>Dashboard/logout">logout</a></div>
	  <?}?>
        <!--<ul class="nav pull-right">
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-cog"></i> Account <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="javascript:;">Settings</a></li>
              <li><a href="javascript:;">Help</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-user"></i> EGrappler.com <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="javascript:;">Profile</a></li>
              <li><a href="javascript:;">Logout</a></li>
            </ul>
          </li>
        </ul>-->
      <!--</div> --> 
      <!--/.nav-collapse --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /navbar-inner --> 
</div>
<?if(isset($full_name))
	  {
      echo '
<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container" style="margin-left:0;width:100%;position:relative;">
	<!--<div><img src="' . site_url() . 'static/images/pgnnotext.png" width="35px" style="float:left;margin-left:15px;margin-right:15px;margin-top:5px;"></div>-->
	<ul class="mainnav">
        <li id="menu-dashboard" ' . $menu_dashboard . ' ><a href="' . site_url() . '"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
        <li id="menu-user" ' . $menu_user . ' ><a href="javascript:;" id="dropdown-toggle" ><i class="icon-user-md"></i><span>Manajemen User</span> </a> 
		          <ul class="dropdown-menu">
            <li><a href="#">User</a></li>
            <li><a href="#">Group User</a></li>
			</ul>
			</li>
        <li id="menu-data" ' . $menu_data . ' ><a href="javascript:;" id="dropdown-toggle2" ><i class="icon-copy"></i><span>Manajemen Data</span> </a>
		          <ul class="dropdown-menu2">
            <li><a href="#">Data</a></li>
			</ul>
			</li>
        <li id="menu-formula" ' . $menu_formula . ' ><a href="javascript:;" id="dropdown-toggle3" ><i class="icon-beaker"></i><span>Manajemen Formula</span> </a> 
		          <ul class="dropdown-menu3">
            <li><a href="#">Kategori</a></li>
            <li><a href="#">Variable</a></li>
            <li><a href="#">Formula</a></li>
			</ul>
			</li>
      </ul>
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner --> 
</div>
<!-- /subnavbar -->
';
	  }?>