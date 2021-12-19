<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap-3.1.1.min.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href='//fonts.googleapis.com/css?family=Roboto:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<!----font-Awesome----->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!----font-Awesome----->

<nav class="navbar navbar-default" role="navigation">
	<div class="container">
	    <div class="navbar-header">
	        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">eJob Portal</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
	        </button>
	        <a class="navbar-brand" href="index.php"><img src="images/logo.png" alt=""></a>
	    </div>
	    <!--/.navbar-header-->
	    <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1" style="height: 1px;">
	        <ul class="nav navbar-nav">
		
				  
<?php 

error_reporting(0);

session_start();
$type=$_SESSION['type'];
if(isset($_SESSION['type'])){
if($type == 1){
   echo '
    <li><a href="index.php">Home</a></li>
    <li><a href="jobs.php">Add Jobs</a></li>
	<li><a href="seekers.php">Job Seekers</a></li>
	<li><a href="viewapplications.php">View Application</a></li>
	<li><a href="myjobs.php">My Jobs</a></li>
	<li><a href="categories.php">Job Categories</a></li>
	<li><a href="profile.php">Profile</a></li>
	<li><a href="logout.php">Logout</a></li>
	
   ';
}else if($type == 2){
 echo '
	<li><a href="index.php">Home</a></li>
	<li><a href="appliedjobs.php">Applied Job</a></li>
	<li><a href="viewjobs.php">View Jobs</a></li>
	<li><a href="profile.php">Profile</a></li>
	<li><a href="logout.php">Logout</a></li>
 ';
}else if($type == 3){
	echo '
	   <li><a href="index.php">Home</a></li>
	   <li><a href="categories.php">Job Categories</a></li>  
	   <li><a href="seekers.php">Job Seekers</a></li>
	   <li><a href="employers.php">Employers</a></li>
	   <li><a href="viewjobs.php">View Jobs</a></li>
	   <li><a href="logout.php">Logout</a></li>
	';
   }
}
else{
	echo '
		 <li><a href="index.php">Home</a></li>
		 <li><a href="viewjobs.php">View Jobs</a></li>
		 <li><a href="login.php">Login</a></li>
		 <li><a href="register.php">Register</a></li>
		';
	 }

?>
			         	
	        </ul>
	    </div>
	    <div class="clearfix"> </div>
	  </div>
	    <!--/.navbar-collapse-->
	</nav>