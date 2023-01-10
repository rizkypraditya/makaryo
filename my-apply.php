<?php include "header.php"; ?>
<?php
$sql = "SELECT `jobid`, `ket`,`title`, `hangout`, `email`, `skype`, `city`, `state`, `country`, `description`, `rating`, `verified`, `availability`, `experience`, `age_min`, `age_max`, `skills`, `company`, `education`, `language`, `photo`, `date_start`, `date_end`, `category`, `compensation`, `address` FROM `makaryo_job` JOIN makaryo_apply ON makaryo_job.id = makaryo_apply.jobid WHERE makaryo_apply.makaryoid='$makaryoid'";
$result = $conn->query($sql);
	$jobs = array();
	$i=0;
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$jobs[$i]['jobid']=$row['jobid'];
			$jobs[$i]['title']=$row['title'];
			$jobs[$i]['hangout']=$row['hangout'];
			$jobs[$i]['email']=$row['email'];
			$jobs[$i]['skype']=$row['skype'];
			$jobs[$i]['city']=$row['city'];
			$jobs[$i]['state']=$row['state'];
			$jobs[$i]['country']=$row['country'];
			$jobs[$i]['description']=$row['description'];
			$jobs[$i]['rating']=$row['rating'];
			$jobs[$i]['verified']=$row['verified'];
			$jobs[$i]['availability']=$row['availability'];
			$jobs[$i]['experience']=$row['experience'];
			$jobs[$i]['age_min']=$row['age_min'];
			$jobs[$i]['age_max']=$row['age_max'];
			$jobs[$i]['skills']=explode(",",$row['skills']);
			$jobs[$i]['photo'] = 'data:image/jpeg;base64,'.base64_encode($row['photo']).' ';
			$jobs[$i]['company']=$row['company'];
			$jobs[$i]['education']=$row['education'];
			$jobs[$i]['language']=$row['language'];
			$jobs[$i]['date_start']=date('m/d/Y', strtotime($row['date_start']));
			$jobs[$i]['date_end']=date('m/d/Y', strtotime($row['date_end']));
			$jobs[$i]['category']=$row['category'];
			$jobs[$i]['compensation']=$row['compensation'];
			$jobs[$i]['address']=$row['address'];
			$jobs[$i]['ket']=$row['ket'];
			$i++;
		}
	}

?>
<div class="clearfix"></div>
			
			<!-- Title Header Start -->
			<section class="inner-header-title no-br advance-header-title" style="background-image:url(assets/img/banner-10.jpg);">
				<div class="container">
					<h2 class="mrg-bot-5"><span>Work There.</span> <span class="cl-white">Find the dream job</span></h2>
					<p><span>704</span> new job in the last <span>7</span> days.</p>
				</div>
			</section>
			<div class="clearfix"></div>
			<!-- Title Header End -->
			
			<!-- bottom form section start -->
			<section class="bottom-search-form">
				<div class="container">
					<form class="bt-form">
						<div class="col-md-3 col-sm-6">
							<input type="text" class="form-control" placeholder="Skills, Designations, Keyword">
						</div>
						<div class="col-md-3 col-sm-6">
							<input type="text" class="form-control" placeholder="Searc By location">
						</div>
						<div class="col-md-3 col-sm-6">
							<select class="form-control">
							  <option>By Category</option>
							  <option>Information Technology</option>
							  <option>Mechanical</option>
							  <option>Hardware</option>
							</select>
						</div>
						<div class="col-md-3 col-sm-6">
							<button type="submit" class="btn btn-primary">Search Job</button>
						</div>
					</form>
				</div>
			</section>
			<!-- Bottom Search Form Section End -->
			
			<!-- ========== Begin: Brows job Category ===============  -->
			<section class="brows-job-category gray-bg">
				<div class="container">
					<div class="col-md-9 col-sm-12">
						<div class="full-card">
						
							<div class="card-header">
								<div class="row mrg-0">
									<div class="col-md-4 col-sm-4">
										<select class="selectpicker form-control" multiple title="Job Type">
										  <option>Full Time</option>
										  <option>Part Time</option>
										  <option>Freelancer</option>
										  <option>Internship</option>
										</select>
									</div>
									<div class="col-md-4 col-sm-4 small-padd">
										<select class="selectpicker form-control" multiple title="All Categories">
										  <option>Teacher Jobs</option>
										  <option>Consultant Jobs</option>
										  <option>IT Jobs</option>
										  <option>Sales Jobs</option>
										  <option>Graphic Designer Jobs</option>
										</select>
									</div>
									<div class="col-md-4 col-sm-4">
										<ol class="breadcrumb pull-right">
											<li><a href="#"><i class="fa fa-home"></i></a></li>
											<li><a href="#">Full Time</a></li>
											<li class="active">IT Jobs</li>
										</ol>
									</div>
								</div>
							</div>
							
							<div class="card-body">
							<?php for($i=0;$i<count($jobs);$i++) { ?>
								<article class="advance-search-job">
									<div class="row no-mrg">
										<div class="col-md-6 col-sm-6">
											<a href="new-job-detail.html" title="job Detail">
												<div class="advance-search-img-box">
													<img src="<?php echo $jobs[$i]['photo']; ?>" class="img-responsive" alt="">
												</div>
											</a>
											<div class="advance-search-caption">
												<a href="job.php?jobid=<?php echo $jobs[$i]['jobid']; ?>" title="Job Dtail"><h4><?php echo $jobs[$i]['title']; ?></h4></a>
												<span><?php echo $jobs[$i]['company']; ?></span>
											</div>
										</div>
										<div class="col-md-4 col-sm-4">
											<div class="advance-search-job-locat">
												<p><i class="fa fa-map-marker"></i><?php echo $jobs[$i]['city'].', '.$jobs[$i]['state']; ?></p>
											</div>
										</div>
										<div class="col-md-2 col-sm-2">
											<?php if($jobs[$i]['ket']==''){ ?>
											<a href="javascript:void(0)"  data-toggle="modal" data-target="#apply-job" class="btn advance-search" title="apply">Applied</a>
										<?php } else{ ?>
											<a href="#" class="btn applied advance-search" title="applied"><i class="fa fa-check" aria-hidden="true"></i>Hired</a>
										<?php } ?>
										</div>
									</div>
									<span class="tg-themetag tg-featuretag">Premium</span>
								</article>
								<?php } ?>
								
							</div>
						</div>
						
						<div class="row">
							<ul class="pagination">
								<li><a href="#">&laquo;</a></li>
								<li class="active"><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li> 
								<li><a href="#">4</a></li> 
								<li><a href="#"><i class="fa fa-ellipsis-h"></i></a></li> 
								<li><a href="#">&raquo;</a></li> 
							</ul>
						</div>
						
						<!-- Ad banner -->
						<!-- <div class="row">
							<div class="ad-banner">
								<img src="http://via.placeholder.com/728x90" class="img-responsive" alt="">
							</div>
						</div> -->
					</div>
					
					<!-- Sidebar Start -->
					<div class="col-md-3 col-sm-12">
						<div class="sidebar right-sidebar">
						
							<!-- <div class="side-widget">
								<h2 class="side-widget-title">Job Alert</h2>
								<div class="job-alert">
									<div class="widget-text">
										<form>
											<input type="text" name="keyword" class="form-control" placeholder="Job Keyword">
											<input type="email" name="email" class="form-control" placeholder="Email ID">
											<button type="submit" class="btn btn-alrt">Add Alert</button>
										</form>
									</div>
								</div>
							</div> -->
							<!-- 
							<div class="side-widget">
								<h2 class="side-widget-title">Advertisment</h2>
								<div class="widget-text padd-0">
									<div class="ad-banner">
										<img src="http://via.placeholder.com/320x285" class="img-responsive" alt="">
									</div>
								</div>
							</div> -->
							
							<div class="side-widget">
								<h2 class="side-widget-title">Compensation</h2>
								<div class="widget-text padd-0">
									<ul>
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
										<li>
											<span class="custom-checkbox">
												<input type="checkbox" id="5">
												<label for="5"></label>
											</span>
											$30,000 - $40,000
											<span class="pull-right">307</span>
										</li>
									</ul>
								</div>
							</div>
							
							<div class="side-widget">
								<h2 class="side-widget-title"><a href="#designation" data-toggle="collapse">Designation<i class="pull-right fa fa-angle-double-down" aria-hidden="true"></i></a></h2>
								<div class="widget-text padd-0 collapse" id="designation">
									<ul>
										<li>
											<span class="custom-checkbox">
												<input type="checkbox" id="1">
												<label for="1"></label>
											</span>
											Web Designer
											<span class="pull-right">102</span>
										</li>
										
										<li>
											<span class="custom-checkbox">
												<input type="checkbox" id="2">
												<label for="2"></label>
											</span>
											Php Developer
											<span class="pull-right">78</span>
										</li>
										
										<li>
											<span class="custom-checkbox">
												<input type="checkbox" id="3">
												<label for="3"></label>
											</span>
											Project Manager
											<span class="pull-right">12</span>
										</li>
										
										<li>
											<span class="custom-checkbox">
												<input type="checkbox" id="4">
												<label for="4"></label>
											</span>
											Human Resource
											<span class="pull-right">85</span>
										</li>
										
										<li>
											<span class="custom-checkbox">
												<input type="checkbox" id="5">
												<label for="5"></label>
											</span>
											CMS Developer
											<span class="pull-right">307</span>
										</li>
										
										<li>
											<span class="custom-checkbox">
												<input type="checkbox" id="6">
												<label for="6"></label>
											</span>
											App Developer
											<span class="pull-right">256</span>
										</li>
									</ul>
								</div>
							</div>
							
							<div class="side-widget">
								<h2 class="side-widget-title"><a href="#job-location" data-toggle="collapse">Location<i class="pull-right fa fa-angle-double-down" aria-hidden="true"></i></a></h2>
								<div class="widget-text padd-0 collapse" id="job-location">
									<ul>
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
										
										<li>
											<span class="custom-checkbox">
												<input type="checkbox" id="5">
												<label for="5"></label>
											</span>
											Noida
											<span class="pull-right">307</span>
										</li>
										
										<li>
											<span class="custom-checkbox">
												<input type="checkbox" id="6">
												<label for="6"></label>
											</span>
											Chhatisgarh
											<span class="pull-right">256</span>
										</li>
										
									</ul>
								</div>
							</div>
							
							<div class="side-widget">
								<h2 class="side-widget-title"><a href="#job-type" data-toggle="collapse">Job type<i class="pull-right fa fa-angle-double-down" aria-hidden="true"></i></a></h2>
								<div class="widget-text padd-0 collapse" id="job-type">
									<ul>
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
					</div>
					<!-- Sidebar End -->
					
				</div>
			</section>
			<!-- ========== Begin: Brows job Category End ===============  -->
			


<?php include "footer.php"; ?>