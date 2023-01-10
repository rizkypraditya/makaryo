<?php include "header.php";?>

<?php
if($_GET && !empty($_GET['makaryoid'])){
	$jobid = $_GET['jobid'];
	$candidateid = $_GET['makaryoid'];
} else {
	header( 'Location: http://'.$_SERVER['SERVER_NAME'].'/makassar/makaryo/manage-job.php' );
}
	$sql = "SELECT `first_name`, `last_name`, `email`, `phone`, `postal`, `address`, `skype`, `organization`, `city`, `state`, `country`, `photo`, `about` FROM `makaryo_user` WHERE `id` = '$candidateid'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$first_name = $row['first_name'];
			$last_name = $row['last_name'];
			$email = $row['email'];
			$phone = $row['phone'];
			$postal = $row['postal'];
			$address = $row['address'];
			$skype = $row['skype'];
			$organization = $row['organization'];
			$city = $row['city'];
			$state = $row['state'];
			$country = $row['country'];
			$about = $row['about'];
			if($photo<>'') $photo = 'data:image/jpeg;base64,'.base64_encode($row['photo']).' ';
			else $photo = 'assets/img/default-photo.png';
	}
}


	$ket = '';
	$sql = "SELECT `ket` FROM `makaryo_apply` WHERE jobid='$jobid' AND makaryoid='$candidateid'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$ket=$row['ket'];
		}
	}
?>
<div class="clearfix"></div>
			<!-- Title Header End -->
			
			<!-- Freelancer Detail Start -->
			<section>
				<div class="container">
					
					<div class="col-md-8 col-sm-8">
						<div class="container-detail-box">
						
							<div class="apply-job-header">
								<h4><?php echo $first_name.' '.$last_name?></h4>
								<a href="company-detail.html" class="cl-success"><span><i class="fa fa-building"></i><?php echo $organization; ?></span></a>
								<span><i class="fa fa-map-marker"></i><?php echo $city; ?></span>
							</div>
							
							<div class="apply-job-detail">
								<p><?php echo $about; ?></p>
							</div>
							
							<div class="apply-job-detail">
								<h5>Skills</h5>
								<ul class="skills">
									<li>Css3</li>
									<li>Html5</li>
									<li>Photoshop</li>
									<li>Wordpress</li>
									<li>PHP</li>
									<li>Java Script</li>
								</ul>
							</div>
							
							<div class="apply-job-detail">
								<h5>Language</h5>
								<ul class="language">
									<li><img class="flag" src="assets/img/gb.svg" alt="">English</li>
									<li><img class="flag" src="assets/img/gb.svg" alt="">Indonesia</li>
								</ul>
							</div>

							<div class='row'>
							<div class="col-md-4">
							<?php if($ket==''){?>
							<a href="apply.php?action=shortlist&jobid=<?php echo $jobid; ?>&makaryoid=<?php echo $candidateid; ?>" class="btn btn-success">Shortlist</a>
							<?php } else if($ket=='shortlist'){?>
							<a href="apply.php?action=unshort&jobid=<?php echo $jobid; ?>&makaryoid=<?php echo $candidateid; ?>" class="btn btn-warning">Cancel Shortlist</a>
							<?php } ?>
						</div>

							<div class="col-md-4">
									<div class="skype-button rectangle" data-contact-id="live:rizky.praditya" data-color="#35434e" data-text="Contact Him"></div>
								</div>
								<div class="col-md-4">
					                <div class="g-hangout" data-render="createhangout"
					                                        data-invites="[{id: 'rizky.praditya@gmail.com', invite_type: 'EMAIL'}]">
									</div>
								</div>
								<div class="skype-button bubble" data-contact-id="live:rizky.praditya" data-color="#35434e">
						</div>
					</div>

						</div>
						
						
						<!-- Similar Jobs -->
						<div class="container-detail-box">
						
							<div class="row">
								<div class="col-md-12">
									<h4>Review</h4>
								</div>
							</div>
							
							<div class="row">
								
								<!-- Single Review -->
								<div class="review-list">
									<div class="review-thumb">
										<img src="assets/img/client-1.jpg" class="img-responsive img-circle" alt="" />
									</div>
									<div class="review-detail">
										<h4>Daniel Luke<span>3 days ago</span></h4>
										<span class="re-designation">Web Developer</span>
										<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>
									</div>
								</div>
								
								<!-- Single Review -->
								<div class="review-list">
									<div class="review-thumb">
										<img src="assets/img/client-2.jpg" class="img-responsive img-circle" alt="" />
									</div>
									<div class="review-detail">
										<h4>Daniel Luke<span>3 days ago</span></h4>
										<span class="re-designation">Web Developer</span>
										<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>
									</div>
								</div>
								
								<!-- Single Review -->
								<div class="review-list">
									<div class="review-thumb">
										<img src="assets/img/client-3.jpg" class="img-responsive img-circle" alt="" />
									</div>
									<div class="review-detail">
										<h4>Daniel Luke<span>3 days ago</span></h4>
										<span class="re-designation">Web Developer</span>
										<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>
									</div>
								</div>
								
								<!-- Single Review -->
								<div class="review-list">
									<div class="review-thumb">
										<img src="assets/img/client-1.jpg" class="img-responsive img-circle" alt="" />
									</div>
									<div class="review-detail">
										<h4>Daniel Luke<span>3 days ago</span></h4>
										<span class="re-designation">Web Developer</span>
										<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>
									</div>
								</div>
								
							</div>
							
						</div>
					</div>
					
					<!-- Sidebar Start-->
					<div class="col-md-4 col-sm-4">
						
						<!-- Make An Offer -->
						<div class="sidebar-container">
							<div class="sidebar-box">
								<span class="sidebar-status">Available</span>
								<h4 class="flc-rate">$17/hr</h4>
								<div class="sidebar-inner-box">
									<div class="sidebar-box-thumb">
										<img src="<?php echo $photo; ?>" class="img-responsive img-circle" alt="" />
									</div>
									<div class="sidebar-box-detail">
										<h4><?php echo $first_name.' '.$last_name; ?></h4>
										<span class="desination"><?php echo $organization; ?></span>
									</div>
								</div>
								<div class="sidebar-box-extra">
									<ul>
										<li>Php</li>
										<li>Android</li>
										<li>Html</li>
										<li class="more-skill bg-primary">+3</li>
									</ul>
									<ul class="status-detail">
										<li class="br-1"><strong>$44/hr</strong>Hourly Rate</li>
										<li class="br-1"><strong>52 Jobs</strong>Done job</li>
										<li><strong>44</strong>Rehired</li>
									</ul>
								</div>
							</div>
							<a href="#" class="btn btn-sidebar bt-1 bg-success">Shortlist</a>
						</div>
						
						<!-- Website & Portfolio -->
						<div class="sidebar-wrapper">
							<div class="sidebar-box-header bb-1">
								<h4>Website & Portfolio</h4>
							</div>
						
							<ul class="block-list">
								<li><i class="fa fa-globe cl-success"></i>www.mysite.com</li>
								<li><i class="fa fa-briefcase cl-success"></i>Portfolio</li>
								<li><i class="fa fa-pencil cl-success"></i>My Blog</li>
							</ul>
						</div>
						
						<!-- Similar Profile -->
						<div class="sidebar-wrapper">
						
							<div class="sidebar-box-header bb-1">
								<h4>Similar Candidate</h4>
							</div>
						
							<div class="member-profile-list">
								<div class="member-profile-thumb">
									<a href="candidate-detail.html"><img src="assets/img/can-2.png" class="img-responsive img-circle" alt="" /></a>
								</div>
								<div class="member-profile-detail">
									<h4><a href="candidate-detail.html">Adam Crivatinly</a></h4>
									<span>Web Developer</span>
									<span class="cl-success">Freelancer</span>
								</div>
							</div>
							
							<div class="member-profile-list">
								<div class="member-profile-thumb">
									<a href="candidate-detail.html"><img src="assets/img/can-3.png" class="img-responsive img-circle" alt="" /></a>
								</div>
								<div class="member-profile-detail">
									<h4><a href="candidate-detail.html">Adam Crivatinly</a></h4>
									<span>Web Developer</span>
									<a href="candidate-detail.html"><span class="cl-success">Freelancer</span></a>
								</div>
							</div>
							
							<div class="member-profile-list">
								<div class="member-profile-thumb">
									<a href="candidate-detail.html"><img src="assets/img/can-1.png" class="img-responsive img-circle" alt="" /></a>
								</div>
								<div class="member-profile-detail">
									<h4><a href="candidate-detail.html">Adam Crivatinly</a></h4>
									<span>Web Developer</span>
									<a href="candidate-detail.html"><span class="cl-success">Freelancer</span></a>
								</div>
							</div>
							
						</div>
						
						<!-- Share This Job -->
						<div class="sidebar-wrapper">
							<div class="sidebar-box-header bb-1">
								<h4>Share This Job</h4>
							</div>
						
							<ul class="social-share">
								<li><a href="#" class="fb-share"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#" class="tw-share"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#" class="gp-share"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#" class="in-share"><i class="fa fa-instagram"></i></a></li>
								<li><a href="#" class="li-share"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#" class="be-share"><i class="fa fa-behance"></i></a></li>
							</ul>
						</div>
						
					</div>
					<!-- End Sidebar -->
					
				</div>
			</section>
			<!-- Freelancer Detail End -->


<?php include "footer.php";?>

<script src="https://swc.cdn.skype.com/sdk/v1/sdk.min.js"></script>
<script type="text/javascript" src="https://apis.google.com/js/platform.js"></script>