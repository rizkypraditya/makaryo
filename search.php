<?php include "header.php";?>
<?php

	$keyword = $_GET['keyword'];
	$location = $_GET['location'];
	$category = $_GET['category'];
	// $education = $_GET['education'];
	// $experience = $_GET['experience'];
	// $availability = $_GET['availability'];
	// $language = $_GET['language'];
	// $compensation = $_GET['compensation'];

	$sql = "SELECT `id`, `title`, `hangout`, `email`, `skype`, `city`, `state`, `country`, `description`, `rating`, `verified`, `availability`, `experience`, `age_min`, `age_max`, `skills`, `company`, `education`, `language`, `photo`, `date_start`, `date_end`, `category`, `compensation`, `address`, `makaryoid` FROM `makaryo_job` WHERE 1 ";

		$sqlT='';
	if($keyword<>'') $sqlT .= "`title` LIKE '%$keyword%' OR `description` LIKE '%$keyword%' OR ";
	if($sqlT<>'') {

		$sqlT=substr($sqlT, 0, -4);
		$sqlT='AND ('.$sqlT.') ';

	}
	$sql .= $sqlT;
	$sqlT='';
	if($location<>'') $sqlT .= "`city` LIKE '%$location%' OR `state` LIKE '%$location%' OR `country` LIKE '%$location%' OR ";
	if($sqlT<>'') {

		$sqlT=substr($sqlT, 0, -4);
		$sqlT='AND ('.$sqlT.') ';

	}
	$sql .= $sqlT;
	$sqlT='';
	if($category<>'') $sqlT .= "`category` = '$category' OR ";
	if($sqlT<>'') {

		$sqlT=substr($sqlT, 0, -4);
		$sqlT='AND ('.$sqlT.') ';

	}
	$sql .= $sqlT;
	$sqlT='';
	for($i=0;$i<count($_GET['education']);$i++){
		$sqlT .= "`education` = '".$_GET['education'][$i]."' OR ";
	}
	if($sqlT<>'') {

		$sqlT=substr($sqlT, 0, -4);
		$sqlT='AND ('.$sqlT.') ';

	}
	$sql .= $sqlT;
	$sqlT='';
	for($i=0;$i<count($_GET['experience']);$i++){
		$sqlT .= "`experience` = '".$_GET['experience'][$i]."' OR ";
	}
	if($sqlT<>'') {

		$sqlT=substr($sqlT, 0, -4);
		$sqlT='AND ('.$sqlT.') ';

	}
	$sql .= $sqlT;
	$sqlT='';
	for($i=0;$i<count($_GET['availability']);$i++){
		$sqlT .= "`availability` = '".$_GET['availability'][$i]."' OR ";
	}
	if($sqlT<>'') {

		$sqlT=substr($sqlT, 0, -4);
		$sqlT='AND ('.$sqlT.') ';

	}
	$sql .= $sqlT;
	$sqlT='';
	for($i=0;$i<count($_GET['language']);$i++){
		$sqlT .= "`language` = '".$_GET['language'][$i]."' OR ";
	}
	if($sqlT<>'') {

		$sqlT=substr($sqlT, 0, -4);
		$sqlT='AND ('.$sqlT.') ';

	}
	$sql .= $sqlT;
	$sqlT='';
	for($i=0;$i<count($_GET['compensation']);$i++){
		$sqlT .= "`compensation` = '".$_GET['compensation'][$i]."' OR ";
	}
	if($sqlT<>'') {

		$sqlT=substr($sqlT, 0, -4);
		$sqlT='AND ('.$sqlT.') ';

	}
	$sql .= $sqlT;
	$result = $conn->query($sql);
	$jobs = array();
	$i=0;
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$jobs[$i]['id']=$row['id'];
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
			$i++;
		}
	}

//WHERE FOR

	$sql = "SELECT `name` FROM `makaryo_category` WHERE 1";
	$result = $conn->query($sql);
	$job_category = array();
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$job_category[] = $row['name'];
			
		}
	}

	$sql = "SELECT `name` FROM `makaryo_skill` WHERE 1";
	$result = $conn->query($sql);
	$job_skill = array();
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$job_skill[] = $row['name'];
			
		}
	}

	$sql = "SELECT `name` FROM `makaryo_language` WHERE 1";
	$result = $conn->query($sql);
	$job_language = array();
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$job_language[] = $row['name'];
			
		}
	}

	$sql = "SELECT `name` FROM `makaryo_availability` WHERE 1";
	$result = $conn->query($sql);
	$job_availability = array();
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$job_availability[] = $row['name'];
			
		}
	}

	$sql = "SELECT `name` FROM `makaryo_education` WHERE 1";
	$result = $conn->query($sql);
	$job_education = array();
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$job_education[] = $row['name'];
			
		}
	}

	$sql = "SELECT `name` FROM `makaryo_compensation` WHERE 1";
	$result = $conn->query($sql);
	$job_compensation = array();
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$job_compensation[] = $row['name'];
			
		}
	}

	$sql = "SELECT `name` FROM `makaryo_experience` WHERE 1";
	$result = $conn->query($sql);
	$job_experience = array();
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$job_experience[] = $row['name'];
			
		}
	}
?>
			<div class="clearfix"></div>
			
			<!-- Title Header Start -->
			<section class="inner-header-title" style="background-image:url(assets/img/banner-10.jpg);">
				<div class="container">
					<h1>Advance Search</h1>
				</div>
			</section>
			<div class="clearfix"></div>
			<!-- Title Header End -->
			
			<section class="advance-search">
				<div class="container">
					<div class="row">
					
						<div class="col-md-4 col-sm-12">
							<div class="full-sidebar-wrap">
								
								<a href="javascript:void(0)" onclick="openNav()" class="btn btn-dark full-width mrg-bot-20 hidden-lg hidden-md hidden-xl"><i class="ti-filter mrg-r-5"></i>Filter Search</a>
								
								<!-- Job Alert -->
								<a href="#" class="btn btn-info full-width mrg-bot-20" data-toggle="modal" data-target="#">Find your Job here!</a>
								<!-- /Job Alert -->
								
								<div class="show-hide-sidebar hidden-xs hidden-sm">
								
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
														<input type="text" name='keyword' value="<?php echo $_GET['keyword']; ?>" class="form-control">
													</div>
													<div class="form-group">
														<label>Location</label>
														<input type="text" name='location' value="<?php echo $_GET['location']; ?>" class="form-control">
													</div>
													<div class="form-group">
														<label>Category</label>
														<select id="choose-category" class="form-control" name="category">
															<option value="">Category</option>
						                                    <?php for($i=0;$i<count($job_category);$i++){
						                                    	if($job_category[$i]==$_GET['$category']){
						                                    	echo '<option value="'.$job_category[$i].'" selected>'.$job_category[$i].'</option>';
						                                    	} else {
						                                    		echo '<option value="'.$job_category[$i].'">'.$job_category[$i].'</option>';
						                                    	}
						                                    }?>
														</select>
														 <?php 
				                                    for($i=0;$i<count($_GET['education']);$i++){
				                                    	echo '<input type="hidden" name="education[]" value="'.$_GET['education'][$i].'"?>';
				                                    } for($i=0;$i<count($_GET['experience']);$i++){
				                                    	echo '<input type="hidden" name="experience[]" value="'.$_GET['experience'][$i].'"?>';
				                                    } for($i=0;$i<count($_GET['availability']);$i++){
				                                    	echo '<input type="hidden" name="availability[]" value="'.$_GET['availability'][$i].'"?>';
				                                    } for($i=0;$i<count($_GET['language']);$i++){
				                                    	echo '<input type="hidden" name="language[]" value="'.$_GET['language'][$i].'"?>';
				                                    } for($i=0;$i<count($_GET['compensation']);$i++){
				                                    	echo '<input type="hidden" name="compensation[]" value="'.$_GET['compensation'][$i].'"?>';
				                                    }
				                                    ?>
				                                   
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
											<form method="get" action="search.php">
											<div class="ur-detail-wrap-body">
												<ul class="advance-list">
													 <?php 
				                                    for($i=0;$i<count($_GET['experience']);$i++){
				                                    	echo '<input type="hidden" name="experience[]" value="'.$_GET['experience'][$i].'"?>';
				                                    } for($i=0;$i<count($_GET['availability']);$i++){
				                                    	echo '<input type="hidden" name="availability[]" value="'.$_GET['availability'][$i].'"?>';
				                                    } for($i=0;$i<count($_GET['language']);$i++){
				                                    	echo '<input type="hidden" name="language[]" value="'.$_GET['language'][$i].'"?>';
				                                    } for($i=0;$i<count($_GET['compensation']);$i++){
				                                    	echo '<input type="hidden" name="compensation[]" value="'.$_GET['compensation'][$i].'"?>';
				                                    } 
				                                    ?>
				                                    <input type="hidden" name="keyword" value="<?php echo $_GET['keyword']; ?>">
				                                    <input type="hidden" name="location" value="<?php echo $_GET['location']; ?>">
				                                    <input type="hidden" name="category" value="<?php echo $_GET['category']; ?>">
													<?php for($i=0;$i<count($job_education);$i++){?>
				                                    	<li>
															<span class="custom-checkbox">
																<input type="checkbox" id="<?php echo 'd'.$i; ?>" name="education[]" value="<?php echo $job_education[$i]; ?>" <?php if(in_array($job_education[$i], $_GET['education'])) echo "checked"; ?>>
																<label for="<?php echo 'd'.$i; ?>" ></label>
															</span>
															<?php echo $job_education[$i]; ?>
															<span class="pull-right">0</span>
														</li>
				                                    <?php }?>
													<!-- <li>
														<span class="custom-checkbox">
															<input id="cekall" type="checkbox" id="aw" onclick="return yousendit();">
															<label for="aw"></label>
														</span>
														Project Manager
														<span class="pull-right">102</span>
													</li> -->
													
												</ul>
											</div>
										<button type="submit" class="btn btn-primary full-width">Filter Education</button>
									</form>
										</div>
									</div>
									<!-- /Top Designation -->
								
									<!-- Experince -->
									<div class="sidebar-widgets">
										<div class="ur-detail-wrap">
										
											<div class="ur-detail-wrap-header">
												<h4>Experince</h4>
											</div>
											<form method="get" action="search.php">
											<div class="ur-detail-wrap-body">
												<ul class="advance-list">
													 <?php 
				                                    for($i=0;$i<count($_GET['education']);$i++){
				                                    	echo '<input type="hidden" name="education[]" value="'.$_GET['education'][$i].'"?>';
				                                    } for($i=0;$i<count($_GET['availability']);$i++){
				                                    	echo '<input type="hidden" name="availability[]" value="'.$_GET['availability'][$i].'"?>';
				                                    } for($i=0;$i<count($_GET['language']);$i++){
				                                    	echo '<input type="hidden" name="language[]" value="'.$_GET['language'][$i].'"?>';
				                                    } for($i=0;$i<count($_GET['compensation']);$i++){
				                                    	echo '<input type="hidden" name="compensation[]" value="'.$_GET['compensation'][$i].'"?>';
				                                    } 
				                                    ?>
				                                    <input type="hidden" name="keyword" value="<?php echo $_GET['keyword']; ?>">
				                                    <input type="hidden" name="location" value="<?php echo $_GET['location']; ?>">
				                                    <input type="hidden" name="category" value="<?php echo $_GET['category']; ?>">
													<?php for($i=0;$i<count($job_experience);$i++){?>
				                                    	<li>
															<span class="custom-checkbox">
																<input type="checkbox" id="<?php echo 'e'.$i; ?>" name="experience[]" value="<?php echo $job_experience[$i]; ?>" <?php if(in_array($job_experience[$i], $_GET['experience'])) echo "checked"; ?>>
																<label for="<?php echo 'e'.$i; ?>"></label>
															</span>
															<?php echo $job_experience[$i]; ?>
															<span class="pull-right">0</span>
														</li>
				                                    <?php }?>
												</ul>
											</div>
										<button type="submit" class="btn btn-primary full-width">Filter Experience</button>
									</form>
										</div>
									</div>
									<!-- /Experince -->
								
									<!-- Job Type -->
									<div class="sidebar-widgets">
										<div class="ur-detail-wrap">
										
											<div class="ur-detail-wrap-header">
												<h4>Job Type</h4>
											</div>
											<form method="get" action="search.php">
											<div class="ur-detail-wrap-body">
												<ul class="advance-list">
													 <?php 
				                                    for($i=0;$i<count($_GET['education']);$i++){
				                                    	echo '<input type="hidden" name="education[]" value="'.$_GET['education'][$i].'"?>';
				                                    } for($i=0;$i<count($_GET['experience']);$i++){
				                                    	echo '<input type="hidden" name="experience[]" value="'.$_GET['experience'][$i].'"?>';
				                                    } for($i=0;$i<count($_GET['language']);$i++){
				                                    	echo '<input type="hidden" name="language[]" value="'.$_GET['language'][$i].'"?>';
				                                    } for($i=0;$i<count($_GET['compensation']);$i++){
				                                    	echo '<input type="hidden" name="compensation[]" value="'.$_GET['compensation'][$i].'"?>';
				                                    } 
				                                    ?>
				                                    <input type="hidden" name="keyword" value="<?php echo $_GET['keyword']; ?>">
				                                    <input type="hidden" name="location" value="<?php echo $_GET['location']; ?>">
				                                    <input type="hidden" name="category" value="<?php echo $_GET['category']; ?>">
													<?php for($i=0;$i<count($job_availability);$i++){?>
				                                    	<li>
															<span class="custom-checkbox">
																<input type="checkbox" id="<?php echo 'a'.$i; ?>" name="availability[]" value="<?php echo $job_availability[$i]; ?>" <?php if(in_array($job_availability[$i], $_GET['availability'])) echo "checked"; ?>>
																<label for="<?php echo 'a'.$i; ?>"></label>
															</span>
															<?php echo $job_availability[$i]; ?>
															<span class="pull-right">0</span>
														</li>
				                                    <?php }?>
													
												</ul>
											</div>
										<button type="submit" class="btn btn-primary full-width">Filter Availability</button>
									</form>
										</div>
									</div>
									<!-- /Job Type -->
								
									<!-- Location -->
									<div class="sidebar-widgets">
										<div class="ur-detail-wrap">
										
											<div class="ur-detail-wrap-header">
												<h4>Popular Language</h4>
											</div>
											<form method="get" action="search.php">
											<div class="ur-detail-wrap-body">
												<ul class="advance-list">
													 <?php 
				                                    for($i=0;$i<count($_GET['education']);$i++){
				                                    	echo '<input type="hidden" name="education[]" value="'.$_GET['education'][$i].'"?>';
				                                    } for($i=0;$i<count($_GET['experience']);$i++){
				                                    	echo '<input type="hidden" name="experience[]" value="'.$_GET['experience'][$i].'"?>';
				                                    } for($i=0;$i<count($_GET['availability']);$i++){
				                                    	echo '<input type="hidden" name="availability[]" value="'.$_GET['availability'][$i].'"?>';
				                                    } for($i=0;$i<count($_GET['compensation']);$i++){
				                                    	echo '<input type="hidden" name="compensation[]" value="'.$_GET['compensation'][$i].'"?>';
				                                    } 
				                                    ?>
				                                    <input type="hidden" name="keyword" value="<?php echo $_GET['keyword']; ?>">
				                                    <input type="hidden" name="location" value="<?php echo $_GET['location']; ?>">
				                                    <input type="hidden" name="category" value="<?php echo $_GET['category']; ?>">
													<?php for($i=0;$i<count($job_language);$i++){?>
				                                    	<li>
															<span class="custom-checkbox">
																<input type="checkbox" id="<?php echo 'l'.$i; ?>" name="language[]" value="<?php echo $job_language[$i]; ?>" <?php if(in_array($job_language[$i], $_GET['language'])) echo "checked"; ?>>
																<label for="<?php echo 'l'.$i; ?>"></label>
															</span>
															<?php echo $job_language[$i]; ?>
															<span class="pull-right">0</span>
														</li>
				                                    <?php }?>
													
												</ul>
											</div>
										<button type="submit" class="btn btn-primary full-width">Filter Language</button>
									</form>
										</div>
									</div>
									<!-- /Popular Locations -->
								
									<!-- Compensation -->
									<div class="sidebar-widgets">
										<div class="ur-detail-wrap">
										
											<div class="ur-detail-wrap-header">
												<h4>Compensation</h4>
											</div>
											<form method="get" action="search.php">
											<div class="ur-detail-wrap-body">
												<ul class="advance-list">
													 <?php 
				                                    for($i=0;$i<count($_GET['education']);$i++){
				                                    	echo '<input type="hidden" name="education[]" value="'.$_GET['education'][$i].'"?>';
				                                    } for($i=0;$i<count($_GET['experience']);$i++){
				                                    	echo '<input type="hidden" name="experience[]" value="'.$_GET['experience'][$i].'"?>';
				                                    } for($i=0;$i<count($_GET['availability']);$i++){
				                                    	echo '<input type="hidden" name="availability[]" value="'.$_GET['availability'][$i].'"?>';
				                                    } for($i=0;$i<count($_GET['language']);$i++){
				                                    	echo '<input type="hidden" name="language[]" value="'.$_GET['language'][$i].'"?>';
				                                    }
				                                    ?>
				                                    <input type="hidden" name="keyword" value="<?php echo $_GET['keyword']; ?>">
				                                    <input type="hidden" name="location" value="<?php echo $_GET['location']; ?>">
				                                    <input type="hidden" name="category" value="<?php echo $_GET['category']; ?>">
													<?php for($i=0;$i<count($job_compensation);$i++){?>
				                                    	<li>
															<span class="custom-checkbox">
																<input type="checkbox" id="<?php echo 'c'.$i; ?>" name="compensation[]" value="<?php echo $job_compensation[$i]; ?>" <?php if(in_array($job_compensation[$i], $_GET['compensation'])) echo "checked"; ?>>
																<label for="<?php echo 'c'.$i; ?>"></label>
															</span>
															<?php echo $job_compensation[$i]; ?>
															<span class="pull-right">0</span>
														</li>
				                                    <?php }?>
				                                   
													
												</ul>
											</div>
											<button type="submit" class="btn btn-primary full-width">Filter Compensation</button>
									</form>
										</div>
									</div>
									<!-- /Compensation -->
								</div>
								
							</div>
						</div>
					
						<div class="col-md-8 col-sm-12">
							
							<!--Browse Job In Grid-->
							<div class="row mrg-0">
							<?php for($i=0;$i<count($jobs);$i++){?>
								<div class="col-md-6 col-sm-6">
									<div class="grid-view brows-job-list">
										<div class="brows-job-company-img">
											<img src="<?php echo $jobs[$i]['photo']; ?>" class="img-responsive" alt="" />
										</div>
										<div class="brows-job-position">
											<h3><a href="job.php?jobid=<?php echo $jobs[$i]['id']; ?>"><?php echo $jobs[$i]['title']; ?></a></h3>
											<p><span><?php echo $jobs[$i]['company']; ?></span></p>
										</div>
										<div class="job-position">
											<span class="job-num"><?php echo $jobs[$i]['age_min'].' - '.$jobs[$i]['age_max'].' years old'; ?></span>
										</div>
										<div class="brows-job-type">
											<span class="full-time"><?php echo $jobs[$i]['availability']; ?></span>
										</div>
										<ul class="grid-view-caption">
											<li>
												<div class="brows-job-location">
													<p><i class="fa fa-map-marker"></i><?php echo $jobs[$i]['city']; ?></p>
												</div>
											</li>
											<li>
												<p><span class="brows-job-sallery"><i class="fa fa-money"></i><?php echo $jobs[$i]['compensation']; ?></span></p>
											</li>
										</ul>
										<span class="tg-themetag tg-featuretag">Premium</span>
									</div>
								</div>
								<?php } ?>
								<!-- <div class="col-md-6 col-sm-6">
									<div class="grid-view brows-job-list">
										<div class="brows-job-company-img">
											<img src="assets/img/com-2.jpg" class="img-responsive" alt="" />
										</div>
										<div class="brows-job-position">
											<h3><a href="job-detail.html">Web Developer</a></h3>
											<p><span>Google</span></p>
										</div>
										<div class="job-position">
											<span class="job-num">5 Position</span>
										</div>
										<div class="brows-job-type">
											<span class="part-time">Part Time</span>
										</div>
										<ul class="grid-view-caption">
											<li>
												<div class="brows-job-location">
													<p><i class="fa fa-map-marker"></i>QBL Park, C40</p>
												</div>
											</li>
											<li>
												<p><span class="brows-job-sallery"><i class="fa fa-money"></i>$110 - 200</span></p>
											</li>
										</ul>
									</div>
								</div> -->
								
								<!-- <div class="col-md-6 col-sm-6">
									<div class="grid-view brows-job-list">
										<div class="brows-job-company-img">
											<img src="assets/img/com-3.jpg" class="img-responsive" alt="" />
										</div>
										<div class="brows-job-position">
											<h3><a href="job-detail.html">Web Developer</a></h3>
											<p><span>Google</span></p>
										</div>
										<div class="job-position">
											<span class="job-num">5 Position</span>
										</div>
										<div class="brows-job-type">
											<span class="freelanc">Freelancer</span>
										</div>
										<ul class="grid-view-caption">
											<li>
												<div class="brows-job-location">
													<p><i class="fa fa-map-marker"></i>QBL Park, C40</p>
												</div>
											</li>
											<li>
												<p><span class="brows-job-sallery"><i class="fa fa-money"></i>$110 - 200</span></p>
											</li>
										</ul>
										<span class="tg-themetag tg-featuretag">Premium</span>
									</div>
								</div>
								
								<div class="col-md-6 col-sm-6">
									<div class="grid-view brows-job-list">
										<div class="brows-job-company-img">
											<img src="assets/img/com-4.jpg" class="img-responsive" alt="" />
										</div>
										<div class="brows-job-position">
											<h3><a href="job-detail.html">Web Developer</a></h3>
											<p><span>Google</span></p>
										</div>
										<div class="job-position">
											<span class="job-num">5 Position</span>
										</div>
										<div class="brows-job-type">
											<span class="enternship">Enternship</span>
										</div>
										<ul class="grid-view-caption">
											<li>
												<div class="brows-job-location">
													<p><i class="fa fa-map-marker"></i>QBL Park, C40</p>
												</div>
											</li>
											<li>
												<p><span class="brows-job-sallery"><i class="fa fa-money"></i>$110 - 200</span></p>
											</li>
										</ul>
									</div>
								</div>
								
								<div class="col-md-6 col-sm-6">
									<div class="grid-view brows-job-list">
										<div class="brows-job-company-img">
											<img src="assets/img/com-1.jpg" class="img-responsive" alt="" />
										</div>
										<div class="brows-job-position">
											<h3><a href="job-detail.html">Web Developer</a></h3>
											<p><span>Google</span></p>
										</div>
										<div class="job-position">
											<span class="job-num">5 Position</span>
										</div>
										<div class="brows-job-type">
											<span class="full-time">Full Time</span>
										</div>
										<ul class="grid-view-caption">
											<li>
												<div class="brows-job-location">
													<p><i class="fa fa-map-marker"></i>QBL Park, C40</p>
												</div>
											</li>
											<li>
												<p><span class="brows-job-sallery"><i class="fa fa-money"></i>$110 - 200</span></p>
											</li>
										</ul>
									</div>
								</div>
								
								<div class="col-md-6 col-sm-6">
									<div class="grid-view brows-job-list">
										<div class="brows-job-company-img">
											<img src="assets/img/com-6.jpg" class="img-responsive" alt="" />
										</div>
										<div class="brows-job-position">
											<h3><a href="job-detail.html">Web Developer</a></h3>
											<p><span>Google</span></p>
										</div>
										<div class="job-position">
											<span class="job-num">5 Position</span>
										</div>
										<div class="brows-job-type">
											<span class="part-time">Part Time</span>
										</div>
										<ul class="grid-view-caption">
											<li>
												<div class="brows-job-location">
													<p><i class="fa fa-map-marker"></i>QBL Park, C40</p>
												</div>
											</li>
											<li>
												<p><span class="brows-job-sallery"><i class="fa fa-money"></i>$110 - 200</span></p>
											</li>
										</ul>
										<span class="tg-themetag tg-featuretag">Premium</span>
									</div>
								</div>
								
								<div class="col-md-6 col-sm-6">
									<div class="grid-view brows-job-list">
										<div class="brows-job-company-img">
											<img src="assets/img/com-7.jpg" class="img-responsive" alt="" />
										</div>
										<div class="brows-job-position">
											<h3><a href="job-detail.html">Web Developer</a></h3>
											<p><span>Google</span></p>
										</div>
										<div class="job-position">
											<span class="job-num">5 Position</span>
										</div>
										<div class="brows-job-type">
											<span class="full-time">Full Time</span>
										</div>
										<ul class="grid-view-caption">
											<li>
												<div class="brows-job-location">
													<p><i class="fa fa-map-marker"></i>QBL Park, C40</p>
												</div>
											</li>
											<li>
												<p><span class="brows-job-sallery"><i class="fa fa-money"></i>$110 - 200</span></p>
											</li>
										</ul>
									</div>
								</div>
								
								<div class="col-md-6 col-sm-6">
									<div class="grid-view brows-job-list">
										<div class="brows-job-company-img">
											<img src="assets/img/com-1.jpg" class="img-responsive" alt="" />
										</div>
										<div class="brows-job-position">
											<h3><a href="job-detail.html">Web Developer</a></h3>
											<p><span>Google</span></p>
										</div>
										<div class="job-position">
											<span class="job-num">5 Position</span>
										</div>
										<div class="brows-job-type">
											<span class="freelanc">Freelancer</span>
										</div>
										<ul class="grid-view-caption">
											<li>
												<div class="brows-job-location">
													<p><i class="fa fa-map-marker"></i>QBL Park, C40</p>
												</div>
											</li>
											<li>
												<p><span class="brows-job-sallery"><i class="fa fa-money"></i>$110 - 200</span></p>
											</li>
										</ul>
									</div>
								</div>
								
								<div class="col-md-6 col-sm-6">
									<div class="grid-view brows-job-list">
										<div class="brows-job-company-img">
											<img src="assets/img/com-2.jpg" class="img-responsive" alt="" />
										</div>
										<div class="brows-job-position">
											<h3><a href="job-detail.html">Web Developer</a></h3>
											<p><span>Google</span></p>
										</div>
										<div class="job-position">
											<span class="job-num">5 Position</span>
										</div>
										<div class="brows-job-type">
											<span class="full-time">Full Time</span>
										</div>
										<ul class="grid-view-caption">
											<li>
												<div class="brows-job-location">
													<p><i class="fa fa-map-marker"></i>QBL Park, C40</p>
												</div>
											</li>
											<li>
												<p><span class="brows-job-sallery"><i class="fa fa-money"></i>$110 - 200</span></p>
											</li>
										</ul>
									</div>
								</div>
								
								<div class="col-md-6 col-sm-6">
									<div class="grid-view brows-job-list">
										<div class="brows-job-company-img">
											<img src="assets/img/com-3.jpg" class="img-responsive" alt="" />
										</div>
										<div class="brows-job-position">
											<h3><a href="job-detail.html">Web Developer</a></h3>
											<p><span>Google</span></p>
										</div>
										<div class="job-position">
											<span class="job-num">5 Position</span>
										</div>
										<div class="brows-job-type">
											<span class="enternship">Enternship</span>
										</div>
										<ul class="grid-view-caption">
											<li>
												<div class="brows-job-location">
													<p><i class="fa fa-map-marker"></i>QBL Park, C40</p>
												</div>
											</li>
											<li>
												<p><span class="brows-job-sallery"><i class="fa fa-money"></i>$110 - 200</span></p>
											</li>
										</ul>
									</div>
								</div>
								
								<div class="col-md-6 col-sm-6">
									<div class="grid-view brows-job-list">
										<div class="brows-job-company-img">
											<img src="assets/img/com-5.jpg" class="img-responsive" alt="" />
										</div>
										<div class="brows-job-position">
											<h3><a href="job-detail.html">Web Developer</a></h3>
											<p><span>Google</span></p>
										</div>
										<div class="job-position">
											<span class="job-num">5 Position</span>
										</div>
										<div class="brows-job-type">
											<span class="part-time">Part Time</span>
										</div>
										<ul class="grid-view-caption">
											<li>
												<div class="brows-job-location">
													<p><i class="fa fa-map-marker"></i>QBL Park, C40</p>
												</div>
											</li>
											<li>
												<p><span class="brows-job-sallery"><i class="fa fa-money"></i>$110 - 200</span></p>
											</li>
										</ul>
									</div>
								</div>
								
								<div class="col-md-6 col-sm-6">
									<div class="grid-view brows-job-list">
										<div class="brows-job-company-img">
											<img src="assets/img/com-1.jpg" class="img-responsive" alt="" />
										</div>
										<div class="brows-job-position">
											<h3><a href="job-detail.html">Web Developer</a></h3>
											<p><span>Google</span></p>
										</div>
										<div class="job-position">
											<span class="job-num">5 Position</span>
										</div>
										<div class="brows-job-type">
											<span class="full-time">Full Time</span>
										</div>
										<ul class="grid-view-caption">
											<li>
												<div class="brows-job-location">
													<p><i class="fa fa-map-marker"></i>QBL Park, C40</p>
												</div>
											</li>
											<li>
												<p><span class="brows-job-sallery"><i class="fa fa-money"></i>$110 - 200</span></p>
											</li>
										</ul>
									</div>
								</div>
								
								<div class="col-md-6 col-sm-6">
									<div class="grid-view brows-job-list">
										<div class="brows-job-company-img">
											<img src="assets/img/com-2.jpg" class="img-responsive" alt="" />
										</div>
										<div class="brows-job-position">
											<h3><a href="job-detail.html">Web Developer</a></h3>
											<p><span>Google</span></p>
										</div>
										<div class="job-position">
											<span class="job-num">5 Position</span>
										</div>
										<div class="brows-job-type">
											<span class="enternship">Enternship</span>
										</div>
										<ul class="grid-view-caption">
											<li>
												<div class="brows-job-location">
													<p><i class="fa fa-map-marker"></i>QBL Park, C40</p>
												</div>
											</li>
											<li>
												<p><span class="brows-job-sallery"><i class="fa fa-money"></i>$110 - 200</span></p>
											</li>
										</ul>
									</div>
								</div>
								
								<div class="col-md-6 col-sm-6">
									<div class="grid-view brows-job-list">
										<div class="brows-job-company-img">
											<img src="assets/img/com-6.jpg" class="img-responsive" alt="" />
										</div>
										<div class="brows-job-position">
											<h3><a href="job-detail.html">Web Developer</a></h3>
											<p><span>Google</span></p>
										</div>
										<div class="job-position">
											<span class="job-num">5 Position</span>
										</div>
										<div class="brows-job-type">
											<span class="part-time">Part Time</span>
										</div>
										<ul class="grid-view-caption">
											<li>
												<div class="brows-job-location">
													<p><i class="fa fa-map-marker"></i>QBL Park, C40</p>
												</div>
											</li>
											<li>
												<p><span class="brows-job-sallery"><i class="fa fa-money"></i>$110 - 200</span></p>
											</li>
										</ul>
									</div>
								</div> -->
								
							</div>
							<!--/.Browse Job In Grid-->
							
							<div class="row mrg-0">
								<ul class="pagination">
									<li><a href="#"><i class="ti-arrow-left"></i></a></li>
									<li class="active"><a href="#">1</a></li>
									<li><a href="#">2</a></li>
									<li><a href="#">3</a></li> 
									<li><a href="#">4</a></li> 
									<li><a href="#"><i class="fa fa-ellipsis-h"></i></a></li> 
									<li><a href="#"><i class="ti-arrow-right"></i></a></li> 
								</ul>
							</div>
							
						</div>
						
					</div>
				</div>
			</section>
			<script>
// function yousendit(){
//     if(document.getElementById('d0').checked){
//     	<?php
// 			$b = array_diff( $_GET['education'],array('High School'));
// 			$a = $_GET;
// 			unset($a['education']);
// 			array_push($a, $b);
//     	?>
//         window.location='search.php?<?php// echo http_build_query($a); ?>';
//         return false;
//     }
//     return true;

// }
</script>
<?php include "footer.php";?>