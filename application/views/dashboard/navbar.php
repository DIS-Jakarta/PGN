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
	<!--<div><img src="<? echo site_url();?>static/images/pgnnotext.png" width="35px" style="float:left;margin-left:15px;margin-right:15px;margin-top:5px;"></div>-->
	<ul class="mainnav">
        <li class="active"><a href="<?php echo site_url() ?>"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
        <li><a href="' . site_url() . 'Users"><i class="icon-user-md"></i><span>Manajemen User</span> </a> </li>
        <li><a href="#"><i class="icon-copy"></i><span>Manajemen Data</span> </a></li>
        <li><a href="#"><i class="icon-beaker"></i><span>Manajemen Formula</span> </a> </li>
        <!--<li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-long-arrow-down"></i><span>Drops</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="icons.html">Icons</a></li>
            <li><a href="faq.html">FAQ</a></li>
            <li><a href="pricing.html">Pricing Plans</a></li>
            <li><a href="login.html">Login</a></li>
            <li><a href="signup.html">Signup</a></li>
            <li><a href="error.html">404</a></li>
          </ul>
        </li>-->
      </ul>
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner --> 
</div>
<!-- /subnavbar -->
';
	  }?>