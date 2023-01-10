<?php
include 'config/config.php'; 
session_start();
$isLogin=false;
if (!isset($_SESSION['makaryoid'])){
   $isLogin=false;
} else{
    $makaryoid = $_SESSION['makaryoid'];
    $isLogin=true;
}

?>
<!doctype html>
<html lang="en">
<head>
	<!-- Basic Page Needs
	================================================== -->
	<title>Makaryo - Job Portal Indonesia | Amoeba</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
	================================================== -->
	<link rel="stylesheet" href="assets/plugins/css/plugins.css">
    <link href="assets/css/styles.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" id="jssDefault" href="assets/css/colors/sea-blue-style .css">
	
</head>

	<body>
		<div class="Loader"></div>
		<div class="wrapper">  
			
			<!-- Start Navigation -->
			<nav class="navbar navbar-default navbar-fixed navbar-light white bootsnav">

				<div class="container">            
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
						<i class="fa fa-bars"></i>
					</button>
					<!-- Start Header Navigation -->
					<div class="navbar-header">
						<a class="navbar-brand" href="index.php">
							<img src="assets/img/logo-makaryo-new.png" class="logo logo-scrolled" alt="">
						</a>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="navbar-menu">
						<ul class="nav navbar-nav navbar-left" data-in="fadeInDown" data-out="fadeOutUp">
							<li class="active">
								<form id='findjob' action='search.php' method='get'>
									<input type="text" name="keyword" class="form-control" placeholder="Find Job" value="<?php echo $_GET['keyword']; ?>">
								</form>
							</li>
							
						</ul>
						<?php if($isLogin==false){ ?>
						<ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
							<li><a href="signup.php"><i class="fa fa-pencil" aria-hidden="true"></i>SignUp</a></li>
							<li class="left-br"><a href="javascript:void(0)"  data-toggle="modal" data-target="#signup" class="signin">Sign In Now</a></li>
						</ul>
						<?php } else {?>
						<ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
							<li class="dropdown megamenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-pencil" aria-hidden="true"></i> Browse</a>
							<ul class="dropdown-menu megamenu-content" role="menu">
									<li>
										<div class="row">
											<div class="col-menu col-md-12">
												<!-- <h6 class="title">Main Pages</h6> -->
												<div class="content">
													<ul class="menu-col">
														<li><a href="search.php">Search Job</a></li>
														<li><a href="search.php">Job in Grid </a></li>
														<li><a href="my-apply.php">Applied Job </a></li>
														<li><a href="profil.php">Resume </a></li>
													</ul>
												</div>
											</div><!-- end col-3 -->
											
										</div><!-- end row -->
									</li>
								</ul>
							</li>

							<li class="dropdown megamenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-sign-in" aria-hidden="true"></i> Hire</a>
							<ul class="dropdown-menu megamenu-content" role="menu">
									<li>
										<div class="row">
											<div class="col-menu col-md-12">
												<!-- <h6 class="title">Main Pages</h6> -->
												<div class="content">
													<ul class="menu-col">
														<li><a href="create-job.php">Create Job</a></li>
														<li><a href="manage-job.php">Manage Job </a></li>
														<li><a href="candidate.php">Job Candidate </a></li>
													</ul>
												</div>
											</div><!-- end col-3 -->
											
										</div><!-- end row -->
									</li>
								</ul>
							</li>

							<li class="dropdown megamenu left-br"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Hi, <?php echo $makaryoid; ?></a>
							<ul class="dropdown-menu megamenu-content" role="menu">
									<li>
										<div class="row">
											<div class="col-menu col-md-12">
												<!-- <h6 class="title">Main Pages</h6> -->
												<div class="content">
													<ul class="menu-col">
														<li><a href="profil.php">Profil</a></li>
														<li><a href="logout.php">Logout</a></li>
														
													</ul>
												</div>
											</div><!-- end col-3 -->
											
										</div><!-- end row -->
									</li>
								</ul>
							</li>

							

						</ul>
						<?php } ?>
					</div><!-- /.navbar-collapse -->
				</div>   
			</nav>
			<!-- End Navigation -->