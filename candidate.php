<?php include "header.php";?>
<?php
if($_GET && !empty($_GET['jobid'])){
	$jobid = $_GET['jobid'];
} else {
	header( 'Location: http://'.$_SERVER['SERVER_NAME'].'/makassar/makaryo/manage-job.php' );
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

	
	$sql = "SELECT `makaryoid`, `first_name`, `midle_name`, `last_name`, `email`, `phone`, `postal`, `address`, `skype`, `organization`, `city`, `state`, `country`, `password`, `photo`, `about` FROM makaryo_apply JOIN makaryo_user ON makaryo_apply.makaryoid = makaryo_user.id WHERE jobid = '$jobid'";
	$result = $conn->query($sql);
	$candidate = array();
	$i=0;
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$candidate[$i]['first_name'] = $row['first_name'];
			$candidate[$i]['last_name'] = $row['last_name'];
			$candidate[$i]['email'] = $row['email'];
			$candidate[$i]['phone'] = $row['phone'];
			$candidate[$i]['postal'] = $row['postal'];
			$candidate[$i]['address'] = $row['address'];
			$candidate[$i]['skype'] = $row['skype'];
			$candidate[$i]['organization'] = $row['organization'];
			$candidate[$i]['city'] = $row['city'];
			$candidate[$i]['state'] = $row['state'];
			$candidate[$i]['country'] = $row['country'];
			$candidate[$i]['about'] = $row['about'];
			$candidate[$i]['makaryoid'] = $row['makaryoid'];
			if($photo<>'') $candidate[$i]['photo'] = 'data:image/jpeg;base64,'.base64_encode($row['photo']).' ';
			else $candidate[$i]['photo'] = 'assets/img/default-photo.png';
			$i++;
		}
	}


?>
			<div class="clearfix"></div>
			
			<<!-- Title Header Start -->
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
			
			<!-- Accordion Design Start -->
			<section class="accordion">
				<div class="container">
					
					<!-- search filter -->
					<div class="row extra-mrg">
						<div class="wrap-search-filter">
							<form>
								<div class="col-md-3 col-sm-3">
									<input type="text" class="form-control" placeholder="Anywhere...">
								</div>
								<div class="col-md-3 col-sm-3">
									<input type="text" class="form-control" placeholder="Keyword. Design, Seo..">
								</div>
								<div class="col-md-3 col-sm-3">
									<select class="form-control" id="j-category">
										<option value="">&nbsp;</option>
										<option value="1">Information Technology</option>
										<option value="2">Mechanical</option>
										<option value="3">Hardware</option>
										<option value="4">Hospitality & Tourism</option>
										<option value="5">Education & Training</option>
										<option value="6">Government & Public</option>
										<option value="7">Architecture</option>
									</select>

								</div>
								<div class="col-md-3 col-sm-3">
									<button type="submit" class="btn btn-primary full-width">Filter</button>
								</div>
							</form>
						</div>
					</div>
					<!-- search filter End -->
					
					<!-- Paid Candidate Start -->
					<div class="row">
						
						<?php for($i=0;$i<count($candidate);$i++){ ?>
							<!-- Single paid-candidater -->
						<div class="col-md-4 col-sm-6">
							<div class="paid-candidate-container">
								<div class="paid-candidate-box">
									<div class="dropdown">
										<div class="btn-group fl-right">
											<button type="button" class="btn-trans" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<i class="fa fa-gear"></i>
											</button>
											<div class="dropdown-menu pull-right animated flipInX">
												<a href="#">Shortlist</a>
												<!-- <a href="#">Send Message</a> -->
												<a href="#">Dislike</a>
											</div>
										</div>
									</div>
									<div class="paid-candidate-inner--box">
										<div class="paid-candidate-box-thumb">
											<img src="<?php echo $candidate[$i]['photo']; ?>" class="img-responsive img-circle" alt="" />
										</div>
										<div class="paid-candidate-box-detail">
											<h4><?php echo $candidate[$i]['first_name'].' '.$candidate[$i]['last_name']; ?></h4>
											<span class="desination"><?php echo $candidate[$i]['organization']; ?></span>
										</div>
									</div>
									<div class="paid-candidate-box-extra">
										<ul>
											<li>Php</li>
											<li>Android</li>
											<li>Html</li>
											<li class="more-skill bg-primary">+3</li>
										</ul>

										<p><?php echo substr($candidate[$i]['about'], 0, 75).'...'; ?></p>
									</div>
									<div class="row">
									<div class="col-md-6">
									<div class="skype-button rectangle" data-contact-id="live:rizky.praditya" data-color="#35434e" data-text="Contact"></div>
									</div>
									<div class="col-md-6">
						                <div class="g-hangout" data-render="createhangout"
						                                        data-invites="[{id: 'rizky.praditya@gmail.com', invite_type: 'EMAIL'}]">
										</div>
									
									</div>
									</div>
								<a href="candidate-detail.php?jobid=<?php echo $jobid; ?>&makaryoid=<?php echo $candidate[$i]['makaryoid']; ?>" class="btn btn-paid-candidate bt-1">View Detail</a>
							</div>
						</div>
						<?php }?>
						
						
						
						
						<!-- Single Freelancer -->
						<div class="col-md-12 col-sm-12">
							<div class="text-center">
								<a href="#" class="btn btn-primary">Load More</a>
							</div>
						</div>
						
					</div>
						
				</div>
			</section>
			<!-- Accordion Design End -->
			
<?php include "footer.php";?>
<script src="https://swc.cdn.skype.com/sdk/v1/sdk.min.js"></script>
<script type="text/javascript" src="https://apis.google.com/js/platform.js"></script>