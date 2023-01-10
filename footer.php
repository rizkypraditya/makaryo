			<!-- Footer Section Start -->
			<footer class="footer">
				<div class="row lg-menu">
					<div class="container">
						<div class="col-md-4 col-sm-4">
							<img src="assets/img/logo-makaryo-white.png" width="30%" class="img-responsive" alt="" /> 
						</div>
						<div class="col-md-4 col-sm-4">
							<!-- <br> -->
							<p>Copyright Makaryo © 2019. All Rights Reserved </p> 
						</div>
						<div class="col-md-4 co-sm-4 pull-right">
							<ul>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-instagram"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
				<!-- <div class="row copyright">
					<div class="container">
						<p>Copyright Makaryo © 2019. All Rights Reserved </p>
					</div>
				</div> -->
			</footer>
			<div class="clearfix"></div>
			<!-- Footer Section End -->
			
			<!-- Sign Up Window Code -->
			<div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-body">
							<div class="tab" role="tabpanel">
							<!-- Nav tabs -->
							<ul class="nav nav-tabs" role="tablist">
								<li role="presentation" class="active"><a href="#login" role="tab" data-toggle="tab">Sign In</a></li>
								<li role="presentation"><a href="#register" role="tab" data-toggle="tab">Sign Up</a></li>
							</ul>
							<!-- Tab panes -->
							<div class="tab-content" id="myModalLabel2">
								<div role="tabpanel" class="tab-pane fade in active" id="login">
									<img src="assets/img/logo-makaryo-short.png" class="img-responsive" alt="" />
									<div class="subscribe wow fadeInUp">
										<form id="login" action="action.php" class="form-inline" method="post">
											<div class="col-sm-12">
												<div class="form-group">
													<input type="text" class="form-control" name="user" placeholder="Useraname" required>
													<input type="password" class="form-control" name="pass" placeholder="Password" required>
													<input type="hidden" name="action" size="50" value="login" />
													<input type="hidden" name="page" size="50" value="<?php echo basename($_SERVER['REQUEST_URI']) ;?>" />
													<div class="center">
													<button type="submit" id="login-btn" class="submit-btn"> Login </button>
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>

								<div role="tabpanel" class="tab-pane fade" id="register">
								<img src="assets/img/logo-makaryo-short.png" class="img-responsive" alt="" />
									<form class="form-inline" id="signup" action="action.php" method="post">
											<div class="col-sm-12">
												<div class="form-group">
													<input type="email" class="form-control" name="mail" placeholder="Your Email" required>
													<input type="text" class="form-control" name="user" placeholder="Useraname" required>
													<input type="password" class="form-control" id="pass" name="pass" placeholder="Password" onkeyup='check();' required>
													<input type="password" class="form-control" id="conf" name="conf" placeholder="Confirm Password" onkeyup='check();'>
													<input type="hidden" name="action" size="50" value="signup" />
													<div class="center">
													<button type="submit" id="subscribe" class="submit-btn"> Create Account </button>
													</div>
												</div>
											</div>
										</form>
								</div>
							</div>
							</div>
						</div>
						</div>
				</div>
			</div>   
			<!-- End Sign Up Window -->
			
			<!-- Job Alert Code -->
			<div class="modal fade" id="job-alert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-body padd-top-40">
							<div class="dapply-job-form">
								<form class="form-inline" method="post">
									<div class="col-sm-12">
										<div class="form-group">
											<input type="text"  name="name" class="form-control" placeholder="Your Name" required="">
											<input type="email"  name="email" class="form-control" placeholder="Your Email" required="">
											<div class="center">
											<button type="submit" id="subscribe" class="submit-btn"> Submit Now </button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>   
			<!-- End Job Alert -->
			<div id="filter-sidebar" class="filter-sidebar">
				<a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="ti-close"></i></a>
				<div class="show-hide-sidebar">
								
					<!-- Search Job -->
					<div class="sidebar-widgets">
					
						<div class="ur-detail-wrap">
							<div class="ur-detail-wrap-header">
								<h4>Search Job Here</h4>
							</div>
							<div class="ur-detail-wrap-body">
								<form>
									<div class="form-group">
										<label>Keyword</label>
										<input type="text" class="form-control">
									</div>
									<div class="form-group">
										<label>Location</label>
										<input type="text" class="form-control">
									</div>
									<div class="form-group">
										<label>Category</label>
										<select id="choose-category" class="form-control">
											<option>Choose Category</option>
											<option>Banking Job</option>
											<option>IT / Software</option>
											<option>Medical & Hospital</option>
											<option>Networking</option>
											<option>Automotive</option>
											<option>Business Development</option>
										</select>
									</div>
									<button type="submit" class="btn btn-primary full-width">Find Jobs</button>
								</form>
							</div>
						</div>
						
					</div>
					<!-- /Search Job -->
				
					<!-- Top Designation -->
					<div class="sidebar-widgets">
						<div class="ur-detail-wrap">
						
							<div class="ur-detail-wrap-header">
								<h4>Top Designation</h4>
							</div>
							<div class="ur-detail-wrap-body">
								<ul class="advance-list">
									<li>
										<span class="custom-checkbox">
											<input type="checkbox" id="aw">
											<label for="aw"></label>
										</span>
										Project Manager
										<span class="pull-right">102</span>
									</li>
									<li>
										<span class="custom-checkbox">
											<input type="checkbox" id="dd">
											<label for="dd"></label>
										</span>
										Business Executive
										<span class="pull-right">78</span>
									</li>
									<li>
										<span class="custom-checkbox">
											<input type="checkbox" id="er">
											<label for="er"></label>
										</span>
										Supervisor
										<span class="pull-right">12</span>
									</li>
									<li>
										<span class="custom-checkbox">
											<input type="checkbox" id="tr">
											<label for="tr"></label>
										</span>
										Team Leader
										<span class="pull-right">85</span>
									</li>
								</ul>
							</div>
						
						</div>
					</div>
					<!-- /Top Designation -->
				
					<!-- Experince -->
					<div class="sidebar-widgets">
						<div class="ur-detail-wrap">
						
							<div class="ur-detail-wrap-header">
								<h4>Experince</h4>
							</div>
							<div class="ur-detail-wrap-body">
								<ul class="advance-list">
									<li>
										<span class="custom-checkbox">
											<input type="checkbox" id="uy">
											<label for="uy"></label>
										</span>
										0 - 1 Year
										<span class="pull-right">102</span>
									</li>
									<li>
										<span class="custom-checkbox">
											<input type="checkbox" id="io">
											<label for="io"></label>
										</span>
										1 - 2 Year
										<span class="pull-right">78</span>
									</li>
									<li>
										<span class="custom-checkbox">
											<input type="checkbox" id="lo">
											<label for="lo"></label>
										</span>
										2 - 4 Year
										<span class="pull-right">12</span>
									</li>
									<li>
										<span class="custom-checkbox">
											<input type="checkbox" id="kj">
											<label for="kj"></label>
										</span>
										4 - 6 Year
										<span class="pull-right">85</span>
									</li>
								</ul>
							</div>
						
						</div>
					</div>
					<!-- /Experince -->
				
					<!-- Job Type -->
					<div class="sidebar-widgets">
						<div class="ur-detail-wrap">
						
							<div class="ur-detail-wrap-header">
								<h4>Job Type</h4>
							</div>
							<div class="ur-detail-wrap-body">
								<ul class="advance-list">
									<li>
										<span class="custom-checkbox">
											<input type="checkbox" id="1">
											<label for="1"></label>
										</span>
										Full Time
										<span class="pull-right">102</span>
									</li>
									<li>
										<span class="custom-checkbox">
											<input type="checkbox" id="2">
											<label for="2"></label>
										</span>
										Part Time
										<span class="pull-right">78</span>
									</li>
									<li>
										<span class="custom-checkbox">
											<input type="checkbox" id="3">
											<label for="3"></label>
										</span>
										Internship
										<span class="pull-right">12</span>
									</li>
									<li>
										<span class="custom-checkbox">
											<input type="checkbox" id="4">
											<label for="4"></label>
										</span>
										Freelancer
										<span class="pull-right">85</span>
									</li>
								</ul>
							</div>
						
						</div>
					</div>
					<!-- /Job Type -->
				
					<!-- Location -->
					<div class="sidebar-widgets">
						<div class="ur-detail-wrap">
						
							<div class="ur-detail-wrap-header">
								<h4>Popular Locations</h4>
							</div>
							<div class="ur-detail-wrap-body">
								<ul class="advance-list">
									<li>
										<span class="custom-checkbox">
											<input type="checkbox" id="1">
											<label for="1"></label>
										</span>
										Mohali
										<span class="pull-right">102</span>
									</li>
									
									<li>
										<span class="custom-checkbox">
											<input type="checkbox" id="2">
											<label for="2"></label>
										</span>
										Chandigarh
										<span class="pull-right">78</span>
									</li>
									
									<li>
										<span class="custom-checkbox">
											<input type="checkbox" id="3">
											<label for="3"></label>
										</span>
										Chennai
										<span class="pull-right">12</span>
									</li>
									
									<li>
										<span class="custom-checkbox">
											<input type="checkbox" id="4">
											<label for="4"></label>
										</span>
										Delhi
										<span class="pull-right">85</span>
									</li>
								</ul>
							</div>
						
						</div>
					</div>
					<!-- /Popular Locations -->
				
					<!-- Compensation -->
					<div class="sidebar-widgets">
						<div class="ur-detail-wrap">
						
							<div class="ur-detail-wrap-header">
								<h4>Compensation</h4>
							</div>
							<div class="ur-detail-wrap-body">
								<ul class="advance-list">
									<li>
										<span class="custom-checkbox">
											<input type="checkbox" id="1">
											<label for="1"></label>
										</span>
										Under $10,000
										<span class="pull-right">102</span>
									</li>
									<li>
										<span class="custom-checkbox">
											<input type="checkbox" id="2">
											<label for="2"></label>
										</span>
										$10,000 - $15,000
										<span class="pull-right">78</span>
									</li>
									<li>
										<span class="custom-checkbox">
											<input type="checkbox" id="3">
											<label for="3"></label>
										</span>
										$15,000 - $20,000
										<span class="pull-right">12</span>
									</li>
									<li>
										<span class="custom-checkbox">
											<input type="checkbox" id="4">
											<label for="4"></label>
										</span>
										$20,000 - $30,000
										<span class="pull-right">85</span>
									</li>
								</ul>
							</div>
						
						</div>
					</div>
					<!-- /Compensation -->
				</div>
			</div>
			
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
			<!-- Date dropper js-->
			<script src="assets/plugins/date-dropper/datedropper.js"></script>
			
			<!-- Custom Js -->
			<script src="assets/js/custom.js"></script>
			
			<script>
				$('#company-dob').dateDropper();
				$('#date-start').dateDropper();
				$('#date-end').dateDropper();
			</script>
			<script src="assets/js/jQuery.style.switcher.js"></script>
			<script type="text/javascript">
				$(document).ready(function() {
					$('#styleOptions').styleSwitcher();
				});
			</script>

			<script>
				function openNav() {
				  document.getElementById("filter-sidebar").style.width = "320px";
				}

				function closeNav() {
				  document.getElementById("filter-sidebar").style.width = "0";
				}
			</script>
			
			
		</div>
	</body>
</html>