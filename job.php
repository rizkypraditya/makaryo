<?php include "header.php";?>
<?php
if($_GET && !empty($_GET['jobid'])){
	$jobid = $_GET['jobid'];
} else {
	header( 'Location: http://'.$_SERVER['SERVER_NAME'].'/makassar/makaryo/search.php' );
}
$sql = "SELECT `title`, `hangout`, `email`, `skype`, `city`, `state`, `country`, `description`, `rating`, `verified`, `availability`, `experience`, `age_min`, `age_max`, `skills`, `company`, `education`, `language`, `photo`, `date_start`, `date_end`, `category`, `compensation`, `address`, `makaryoid` FROM `makaryo_job` WHERE `id`='$jobid' ";
	$result = $conn->query($sql);
	$jobs = array();
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$title=$row['title'];
			$hangout=$row['hangout'];
			$email=$row['email'];
			$skype=$row['skype'];
			$city=$row['city'];
			$state=$row['state'];
			$country=$row['country'];
			$description=$row['description'];
			$rating=$row['rating'];
			$verified=$row['verified'];
			$availability=$row['availability'];
			$experience=$row['experience'];
			$age_min=$row['age_min'];
			$age_max=$row['age_max'];
			// $skills=explode(",",$row['skills']);
			$skills=$row['skills'];
			$photo='data:image/jpeg;base64,'.base64_encode($row['photo']).' ';
			$company=$row['company'];
			$education=$row['education'];
			$language=$row['language'];
			$date_start=date('m/d/Y', strtotime($row['date_start']));
			$date_end=date('m/d/Y', strtotime($row['date_end']));
			$category=$row['category'];
			$compensation=$row['compensation'];
			$address=$row['address'];
		}
	}

	$isApply = false;
	$ket = '';
	$sql = "SELECT `ket` FROM `makaryo_apply` WHERE jobid='$jobid' AND makaryoid='$makaryoid'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$isApply = true;
		while($row = $result->fetch_assoc()) {
			$ket=$row['ket'];
		}
	}

?>
<div class="clearfix"></div>
			
			<!-- Title Header Start -->
			<section class="inner-header-page">
				<div class="container">
					
					<div class="col-md-8">
						<div class="left-side-container">
							<div class="freelance-image"><a href="company-detail.html"><img src="<?php echo $photo; ?>" class="img-responsive" alt=""></a></div>
							<div class="header-details">
								<h4><?php echo $title; ?></h4>
								<p><?php echo $company; ?></p>
								<ul>
									<li><a href="single-company-profile.html"><i class="fa fa-user"></i> 7 Vacancy</a></li>
									<li>
										<div class="star-rating" data-rating="4.2">
											<span class="fa fa-star fill"></span>
											<span class="fa fa-star fill"></span>
											<span class="fa fa-star fill"></span>
											<span class="fa fa-star fill"></span>
											<span class="fa fa-star-half fill"></span>
										</div>
									</li>
									<li><img class="flag" src="assets/img/gb.svg" alt=""> <?php echo $country; ?></li>
									<li><div class="verified-action">Verified</div></li>
								</ul>
							</div>
						</div>
					</div>
					
					<div class="col-md-4 bl-1 br-gary">
						<div class="right-side-detail">
							<ul>
								<li><span class="detail-info">Availability</span><?php echo $availability; ?></li>
								<li><span class="detail-info">Experience</span><?php echo $experience; ?></li>
								<li><span class="detail-info">Age</span><?php echo $age_min.' - '.$age_max.' yo'; ?></li>
							</ul>
							<ul class="social-info">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-instagram"></i></a></li>
								<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
							</ul>
						</div>
					</div>
					
				</div>
			</section>
			<div class="clearfix"></div>
			<!-- Title Header End -->
			
			<!-- Job Detail Start -->
			<section>
				<div class="container">
					
					<div class="col-md-8 col-sm-8">
						<div class="container-detail-box">
						
							<div class="apply-job-header">
								<h4><?php echo $title; ?></h4>
								<a href="company-detail.html" class="cl-success"><span><i class="fa fa-building"></i><?php echo $company; ?></span></a>
								<span><i class="fa fa-map-marker"></i><?php echo $city; ?></span>
							</div>
							
							<div class="apply-job-detail">
								<?php echo $description; ?>
							</div>
							
							<div class="apply-job-detail">
								<h5>Skills</h5>
								<ul class="skills">
									<?php echo '<li>'.str_replace(',', '</li><li>', $skills).'</li>'; ?>
									<!-- <li>Css3</li>
									<li>Html5</li>
									<li>Photoshop</li>
									<li>Wordpress</li>
									<li>PHP</li>
									<li>Java Script</li> -->
								</ul>
							</div>
							
							<div class="apply-job-detail">
								<h5>Requirements</h5>
								<ul class="job-requirements">
									<li><span>Availability</span> <?php echo $availability; ?></li>
									<li><span>Education</span> <?php echo $education; ?></li>
									<li><span>Age</span> <?php echo $age_min.' - '.$age_max.' yo'; ?></li>
									<li><span>Experience</span> <?php echo $experience; ?></li>
									<li><span>Language</span> <?php echo $language; ?></li>
								</ul>
							</div>
							
							<div class="row">
								<div class="col-md-4">
								<?php if(!$isApply){?>
									<?php if($makaryoid==''){?>
									<a href="javascript:void(0)"  data-toggle="modal" data-target="#signup" class="btn btn-success">Apply For This Job</a>
									</div>
									<?php } else{ ?>
									<a href="apply.php?action=apply&jobid=<?php echo $jobid; ?>&makaryoid=<?php echo $makaryoid; ?>" class="btn btn-success">Apply For This Job</a>
									</div>
								<?php } } else { 
									if($ket==''){?>
									<a href="apply.php?action=cancel&jobid=<?php echo $jobid; ?>&makaryoid=<?php echo $makaryoid; ?>" class="btn btn-warning">Cancel Appliance</a>
									</div>
								<?php } else if($ket=='shortlist'){ ?>
									<a href="#" class="btn btn-success">You're Hired for This Job</a>
									</div>
								<?php }?>

									<div class="col-md-3">
									<div class="skype-button rectangle" data-contact-id="live:rizky.praditya" data-color="#35434e"></div>
								</div>
								<div class="col-md-3">
					                <div class="g-hangout" data-render="createhangout"
					                                        data-invites="[{id: 'rizky.praditya@gmail.com', invite_type: 'EMAIL'}]">
									</div>
								</div>
								<div class="skype-button bubble" data-contact-id="live:rizky.praditya" data-color="#35434e"></div>
								<?php }?>
								
								
						</div>
							
						</div>
						
						<!-- Similar Jobs -->
						<div class="container-detail-box">
						
							<div class="row">
								<div class="col-md-12">
									<h4>Similar Jobs</h4>
								</div>
							</div>
							
							<div class="row">
								<div class="grid-slide-2">
									
									<!-- Single Freelancer & Premium job -->
									<div class="freelance-box">
										<div class="popular-jobs-container">
											<div class="popular-jobs-box">
												<span class="popular-jobs-status bg-success">hourly</span>
												<h4 class="flc-rate">$17/hr</h4>
												<div class="popular-jobs-box">
													<div class="popular-jobs-box-detail">
														<h4>Google Inc</h4>
														<span class="desination">Software Designer</span>
													</div>
												</div>
												<div class="popular-jobs-box-extra">
													<ul>
														<li>Php</li>
														<li>Android</li>
														<li>Html</li>
														<li class="more-skill bg-primary">+3</li>
													</ul>
													<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui.</p>
												</div>
											</div>
											<a href="new-job-detail.html" class="btn btn-popular-jobs bt-1">View Detail</a>
										</div>
									</div>
									
									<!-- Single Freelancer & Premium job -->
									<div class="freelance-box">
										<div class="popular-jobs-container">
											<div class="popular-jobs-box">
												<span class="popular-jobs-status bg-warning">Monthly</span>
												<h4 class="flc-rate">$570/Mo</h4>
												<div class="popular-jobs-box">
													<div class="popular-jobs-box-detail">
														<h4>Duff Beer</h4>
														<span class="desination">Marketting</span>
													</div>
												</div>
												<div class="popular-jobs-box-extra">
													<ul>
														<li>Php</li>
														<li>Android</li>
														<li>Html</li>
														<li class="more-skill bg-primary">+3</li>
													</ul>
													<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui.</p>
												</div>
											</div>
											<a href="new-job-detail.html" class="btn btn-popular-jobs bt-1">View Detail</a>
										</div>
									</div>
									
									<!-- Single Freelancer & Premium job -->
									<div class="freelance-box">
										<div class="popular-jobs-container">
											<div class="popular-jobs-box">
												<span class="popular-jobs-status bg-info">Weekly</span>
												<h4 class="flc-rate">$200/We</h4>
												<div class="popular-jobs-box">
													<div class="popular-jobs-box-detail">
														<h4>Cyberdyne Systems</h4>
														<span class="desination">Human Resource</span>
													</div>
												</div>
												<div class="popular-jobs-box-extra">
													<ul>
														<li>Php</li>
														<li>Android</li>
														<li>Html</li>
														<li class="more-skill bg-primary">+3</li>
													</ul>
													<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui.</p>
												</div>
											</div>
											<a href="new-job-detail.html" class="btn btn-popular-jobs bt-1">View Detail</a>
										</div>
									</div>
									
									<!-- Single Freelancer & Premium job -->
									<div class="freelance-box">
										<div class="popular-jobs-container">
											<div class="popular-jobs-box">
												<span class="popular-jobs-status bg-danger">Yearly</span>
												<h4 class="flc-rate">$2000/Pa</h4>
												<div class="popular-jobs-box">
													<div class="popular-jobs-box-detail">
														<h4>Wayne Enterprises</h4>
														<span class="desination">App Designer</span>
													</div>
												</div>
												<div class="popular-jobs-box-extra">
													<ul>
														<li>Php</li>
														<li>Android</li>
														<li>Html</li>
														<li class="more-skill bg-primary">+3</li>
													</ul>
													<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui.</p>
												</div>
											</div>
											<a href="new-job-detail.html" class="btn btn-popular-jobs bt-1">View Detail</a>
										</div>
									</div>
							
								</div>
							</div>
							
						</div>
					</div>
					
					<!-- Sidebar Start-->
					<div class="col-md-4 col-sm-4">
						
						<!-- Job Detail -->
						<div class="sidebar-container">
							<div class="sidebar-box">
								<span class="sidebar-status"><?php echo $availability; ?></span>
								<h4 class="flc-rate"><?php echo $compensation; ?></h4>
								<div class="sidebar-inner-box">
									<div class="sidebar-box-thumb">
										<img src="<?php echo $photo; ?>" class="img-responsive" alt="" />
									</div>
									<div class="sidebar-box-detail">
										<h4><?php echo $company; ?></h4>
										<span class="desination"><?php echo $title; ?></span>
									</div>
								</div>
								<div class="sidebar-box-extra">
									<ul>
										<?php echo '<li>'.str_replace(',', '</li><li>', $skills).'</li>'; ?>
										<li class="more-skill bg-primary">+3</li>
									</ul>
									<ul class="status-detail">
										<li class="br-1"><strong><?php echo $city; ?></strong>Location</li>
										<li class="br-1"><strong>748</strong>View</li>
										<li><strong>03</strong>Post</li>
									</ul>
								</div>
							</div>
							<?php if(!$isApply){?>
									<?php if($makaryoid==''){?>
									<a href="javascript:void(0)"  data-toggle="modal" data-target="#signup" class="btn btn-sidebar bt-1 bg-success">Apply For This Job</a>
									<?php } else { ?>
									<a href="apply.php?action=apply&jobid=<?php echo $jobid; ?>&makaryoid=<?php echo $makaryoid; ?>" class="btn btn-sidebar bt-1 bg-success">Apply For This Job</a>
								<?php }} else { 
									if($ket==''){ ?>
									<a href="apply.php?action=cancel&jobid=<?php echo $jobid; ?>&makaryoid=<?php echo $makaryoid; ?>" class="btn btn-sidebar bt-1 bg-warning">Cancel Appliance</a>
								<?php } else if($ket=='shortlist'){ ?>
									<a href="#" class="btn btn-sidebar bt-1 bg-success">You're Hired for This Job</a>
								<?php } } ?>
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
			<!-- Job Detail End -->


<?php include "footer.php";?>

<script src="https://swc.cdn.skype.com/sdk/v1/sdk.min.js"></script>
<script type="text/javascript" src="https://apis.google.com/js/platform.js"></script>