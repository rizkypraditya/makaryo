
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
			<section class="signup-screen-sec">
				<div class="container">
					<div class="signup-screen">
						<a href="index.html"><img src="assets/img/logo-makaryo-short.png" class="img-responsive" alt=""></a>
						<?php if($_GET['status']=="false"){ ?>
				<!-- Success Alert -->
					                <!--===================================================-->
					                <div class="alert alert-danger">
					                    <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
					                    <strong>Failed !</strong> Username already used.
					                </div>
						<?php } ?>
						<form id="signup" action="action.php" method="post">
							<input type="email" class="form-control" name="mail" placeholder="Your Email" required>
							<input type="text" class="form-control" name="user" placeholder="Useraname" required>
							<input type="password" class="form-control" id="pass" name="pass" placeholder="Password" onkeyup='check();' required>
							<input type="password" class="form-control" id="conf" name="conf" placeholder="Confirm Password" onkeyup='check();'>
							<input type="hidden" name="action" size="50" value="signup" />
							<button class="btn btn-login" type="submit" >Sign Up</button>
							<span>Have You Account? <a href="login.php"> Login</a></span>	

						</form>
					</div>
				</div>
			</section>
			
			
			<!-- Scripts
			================================================== -->
			<script type="text/javascript"> 
				var password = document.getElementById("pass")
				  , confirm_password = document.getElementById("conf");

				function validatePassword(){
				  if(password.value != confirm_password.value) {
				    confirm_password.setCustomValidity("Passwords Don't Match");
				  } else {
				    confirm_password.setCustomValidity('');
				  }
				}

				password.onchange = validatePassword;
				confirm_password.onkeyup = validatePassword;
			</script>
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