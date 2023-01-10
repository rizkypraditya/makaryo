<?php
	date_default_timezone_set('Asia/Makassar');

	session_start();
	if (!isset($_SESSION['codeid'])){

	} else {
		echo "<script type='text/javascript'>window.top.location='http://10.144.1.77/makassar/makaryo/index.php';</script>"; exit;
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
    
    <!-- Custom style -->
    <link href="assets/css/styles.css" rel="stylesheet">
	<link type="text/css" rel="stylesheet" id="jssDefault" href="assets/css/colors/sea-blue-style .css">
    
	</head>
	<body class="simple-bg-screen" style="background-image:url(assets/img/banner-10.jpg);">
		<div class="Loader"></div>
		<div class="wrapper">  
			
			<!-- Title Header Start -->
			<section class="login-screen-sec">
				<div class="container">
					<div class="login-screen">
						<a href="index.html"><img src="assets/img/logo-makaryo-short.png" class="img-responsive" alt=""></a>
						<?php if($_GET['status']=="false"){ ?>
				<!-- Success Alert -->
					                <!--===================================================-->
					                <div class="alert alert-danger">
					                    <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
					                    <strong>Failed !</strong> Username & Password doesn't match.
					                </div>
				<?php } ?>
						<form id="login" action="action.php" method="post">
							<input type="text" class="form-control" name="user" placeholder="Useraname" required>
							<input type="password" class="form-control" name="pass" placeholder="Password" required>
							<input type="hidden" name="action" size="50" value="login" />
							<button class="btn btn-login" type="submit">Login</button>
							<span>You Have No Account? <a href="signup.php"> Create An Account</a></span>
							<!-- <span><a href="lost-password.html"> Forget Password</a></span> -->
						</form>
					</div>
				</div>
			</section>
			
			
			<!-- Scripts
			================================================== -->
			<script type="text/javascript" src="assets/plugins/js/jquery.min.js"></script>
			<script type="text/javascript" src="assets/plugins/js/viewportchecker.js"></script>
			<script type="text/javascript" src="assets/plugins/js/bootstrap.min.js"></script>
			<script type="text/javascript" src="assets/plugins/js/bootsnav.js"></script>
			<script type="text/javascript" src="assets/plugins/js/select2.min.js"></script>
			<script type="text/javascript" src="assets/plugins/js/wysihtml5-0.3.0.js"></script>
			<script type="text/javascript" src="assets/plugins/js/bootstrap-wysihtml5.js"></script>
			<script type="text/javascript" src="assets/plugins/js/datedropper.min.js"></script>
			<script type="text/javascript" src="assets/plugins/js/dropzone.js"></script>
			<script type="text/javascript" src="assets/plugins/js/loader.js"></script>
			<script type="text/javascript" src="assets/plugins/js/owl.carousel.min.js"></script>
			<script type="text/javascript" src="assets/plugins/js/slick.min.js"></script>
			<script type="text/javascript" src="assets/plugins/js/gmap3.min.js"></script>
			<script type="text/javascript" src="assets/plugins/js/jquery.easy-autocomplete.min.js"></script>
			
			<!-- Custom Js -->
			<script src="assets/js/custom.js"></script>
			<script src="assets/js/jQuery.style.switcher.js"></script>
			<script type="text/javascript">
				$(document).ready(function() {
					$('#styleOptions').styleSwitcher();
				});
			</script>
			<script>
				function openRightMenu() {
					document.getElementById("rightMenu").style.display = "block";
				}

				function closeRightMenu() {
					document.getElementById("rightMenu").style.display = "none";
				}
			</script>
		</div>
	</body>
</html>