<?php include "header.php";?>
<?php 
if($_GET && !empty($_GET['jobid'])){
	$jobid = $_GET['jobid'];
} else {
	header( 'Location: http://'.$_SERVER['SERVER_NAME'].'/makassar/makaryo/index.php' );
}
	?>
<?php

	$sql = "SELECT `title`, `hangout`, `email`, `skype`, `city`, `state`, `country`, `description`, `rating`, `verified`, `availability`, `experience`, `age_min`, `age_max`, `skills`, `company`, `education`, `language`, `photo`, `date_start`, `date_end`, `category`, `compensation`, `address` FROM `makaryo_job` WHERE id = '$jobid'";
	$result = $conn->query($sql);
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
			$skills=explode(",",$row['skills']);
			$company=$row['company'];
			$education=$row['education'];
			$language=$row['language'];
			$date_start=date('m/d/Y', strtotime($row['date_start']));
			$date_end=date('m/d/Y', strtotime($row['date_end']));
			$category=$row['category'];
			$compensation=$row['compensation'];
			$address=$row['address'];
			// print_r($result);
			
		}
	}

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
			
			<!-- Header Title Start -->
			<section class="inner-header-title blank">
				<div class="container">
					
				</div>
			</section>
			<div class="clearfix"></div>
			<!-- Header Title End -->
			
			<!-- General Detail Start -->
			<div class="detail-desc section">
				<div class="container">
					<div class="ur-detail-wrap create-kit padd-bot-0">
						<div class="row">
							<div class="detail-pic js">
								<div class="box">
									<input type="file" name="upload-pic[]" id="upload-pic" class="inputfile" />
									<label for="upload-pic"><i class="fa fa-upload" aria-hidden="true"></i><span></span></label>
								</div>
							</div>
						</div>
						
						<section class="full-detail">
				<div class="container">
					<form id="updatejob" action="action.php" method="post" enctype='multipart/form-data'>
					<div class="row bottom-mrg extra-mrg">
						<!-- <form> -->
							<h2 class="detail-title">Company Information</h2>
							
							<div class="col-md-5 col-sm-6">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-flag"></i></span>
									<input type="text" class="form-control" name="company" placeholder="Company Name" value="<?php echo $company; ?>" required>
								</div>	
							</div>
							<div class="col-md-1 col-sm-6"></div>
							<div class="col-md-5 col-sm-6">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-pencil"></i></span>
									<input type="file" file accept="image/*" name="photo" class="form-control" placeholder="Company Photo">
								</div>	
							</div>
							<div class="col-md-1 col-sm-6"></div>
							<div class="col-md-5 col-sm-6">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
									<input type="text" class="form-control" name="email" required placeholder="Company Email" value="<?php echo $email; ?>">
								</div>	
							</div>
							<div class="col-md-1 col-sm-6"></div>
							<div class="col-md-5 col-sm-6">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
									<input type="text" class="form-control" placeholder="City" value="<?php echo $city; ?>" name="city" required >
								</div>	
							</div>
							<div class="col-md-1 col-sm-6"></div>
							<div class="col-md-5 col-sm-6">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-globe"></i></span>
									<input type="text" class="form-control" placeholder="State" value="<?php echo $state; ?>" name="state" required >
								</div>	
							</div>
							<div class="col-md-1 col-sm-6"></div>
							<div class="col-md-5 col-sm-6">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-globe"></i></span>
									<input type="text" class="form-control" placeholder="Country" value="<?php echo $country; ?>" name="country" required >
								</div>	
							</div>
							
							
						<!-- </form> -->
					</div>
					
					<div class="row bottom-mrg extra-mrg">
						<!-- <form> -->
							<h2 class="detail-title">Job Information</h2>
							
							<div class="col-md-5 col-sm-6">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-facebook"></i></span>
									<input type="text" class="form-control" placeholder="Job Title" name="title" value="<?php echo $title; ?>" required >
								</div>
							</div>
							<div class="col-md-1 col-sm-6"></div>
							<div class="col-md-5 col-sm-6">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-google-plus"></i></span>
									<input type="text" class="form-control" placeholder="Google Hangout" value="<?php echo $hangout; ?>" name="hangout" required >
								
								</div>	
							</div>
							<div class="col-md-1 col-sm-6"></div>
							<div class="col-md-5 col-sm-6">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-twitter"></i></span>
									<!-- <input type="text" class="form-control" placeholder="Category" name="category" required > -->
									<select id="category" name="category" class="form-control" required>
                                    <?php for($i=0;$i<count($job_category);$i++){
                                    	if($job_category[$i]==$category){
	                                    	echo '<option value="'.$job_category[$i].'" selected>'.$job_category[$i].'</option>';
	                                    } else {
	                                    	echo '<option value="'.$job_category[$i].'">'.$job_category[$i].'</option>';
	                                    }
                                    }?>
                                    
                                	</select>
								</div>	
							</div>
							<div class="col-md-1 col-sm-6"></div>
							<div class="col-md-5 col-sm-6">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-instagram"></i></span>
									<input type="text" class="form-control" placeholder="Skype" value="<?php echo $skype; ?>" name="skype" required >
								</div>	
							</div>
							<div class="col-md-1 col-sm-6"></div>
							<div class="col-md-5 col-sm-6">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-linkedin"></i></span>
									<!-- <input type="text" class="form-control" placeholder="Language" name="language" required > -->
									<select id="language" name="language" class="form-control" required>
                                    <!-- <option value="">Language</option> -->
                                    <?php for($i=0;$i<count($job_language);$i++){
                                    	// echo '<option value="'.$job_language[$i].'">'.$job_language[$i].'</option>';
                                    	if($job_language[$i]==$language){
	                                    	echo '<option value="'.$job_language[$i].'" selected>'.$job_language[$i].'</option>';
	                                    } else {
	                                    	echo '<option value="'.$job_language[$i].'">'.$job_language[$i].'</option>';
	                                    }
                                    }?>
                                    
                                	</select>
								</div>	
							</div>
							<div class="col-md-1 col-sm-6"></div>
							<div class="col-md-2 col-sm-6">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-dribbble"></i></span>
									<!-- <input type="date" class="form-control" placeholder="Date End" name="date_end" required > -->
									<input type="text" id="date-start" name="date_start" data-lang="en" data-large-mode="true" data-min-year="2017" data-max-year="2020" data-disabled-days="08/17/2017,08/18/2017" data-id="datedropper-0" data-theme="my-style" class="form-control" readonly="" value="<?php echo $date_start; ?>">
								</div>	
							</div>
							<div class="col-md-1 col-sm-6"> <div class="input-group">
									<span class="input-group-addon">to</span>
								</div>	 </div>
							<div class="col-md-2 col-sm-6">
								<div class="input-group">
									<!-- <input type="date" class="form-control" placeholder="Date Start" name="date_start" required > -->
									<input type="text" id="date-end" name="date_end" data-lang="en" data-large-mode="true" data-min-year="2017" data-max-year="2020" data-disabled-days="08/17/2017,08/18/2017" data-id="datedropper-0" data-theme="my-style" class="form-control" readonly="" value="<?php echo $date_end; ?>">
								</div>	
							</div>
						<!-- </form> -->
					</div>

					<div class="row bottom-mrg extra-mrg">
						<!-- <form> -->
							<h2 class="detail-title">Job Requirement</h2>
							
							<div class="col-md-5 col-sm-6">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-flag"></i></span>
									<!-- <input type="text" class="form-control" placeholder="Job Availability" name="availability" required > -->
									<select id="availability" name="availability" class="form-control" required>
                                    <!-- <option value="">Availability</option> -->
                                    <?php for($i=0;$i<count($job_availability);$i++){
                                    	// echo '<option value="'.$job_availability[$i].'">'.$job_availability[$i].'</option>';
                                    	if($job_availability[$i]==$availability){
	                                    	echo '<option value="'.$job_availability[$i].'" selected>'.$job_availability[$i].'</option>';
	                                    } else {
	                                    	echo '<option value="'.$job_availability[$i].'">'.$job_availability[$i].'</option>';
	                                    }

                                    }?>
                                    
                                	</select>
								</div>	
							</div>
							<div class="col-md-1 col-sm-6"></div>
							<div class="col-md-5 col-sm-6">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-pencil"></i></span>
									<!-- <input type="text" class="form-control" placeholder="Education" name="education" required > -->
									<select id="education" name="education" class="form-control" required>
                                    <!-- <option value="">Education</option> -->
                                    <?php for($i=0;$i<count($job_education);$i++){
                                    	// echo '<option value="'.$job_education[$i].'">'.$job_education[$i].'</option>';
                                    	if($job_education[$i]==$education){
	                                    	echo '<option value="'.$job_education[$i].'" selected>'.$job_education[$i].'</option>';
	                                    } else {
	                                    	echo '<option value="'.$job_education[$i].'">'.$job_education[$i].'</option>';
	                                    }
                                    }?>
                                    
                                	</select>
								</div>	
							</div>
							<div class="col-md-1 col-sm-6"></div>
							<div class="col-md-2 col-sm-6">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
									<input type="text" class="form-control" placeholder="Minimum Age" value="<?php echo $age_min; ?>" name="age_min" required >
								</div>	
							</div>
							<div class="col-md-1 col-sm-6"> <div class="input-group">
									<span class="input-group-addon">to</span>
								</div>	 </div>
							<div class="col-md-2 col-sm-6">
								<div class="input-group">
									
									<input type="text" class="form-control" placeholder="Maximum Age" value="<?php echo $age_max; ?>" name="age_max" required >
								</div>	
							</div>
							<div class="col-md-1 col-sm-6"></div>
							<div class="col-md-5 col-sm-6">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
									<!-- <input type="text" class="form-control" placeholder="Experience" name="experience" required > -->
									<select id="experience" name="experience" class="form-control" required>
                                    <!-- <option value="">Experience</option> -->
                                    <?php for($i=0;$i<count($job_experience);$i++){
                                    	// echo '<option value="'.$job_experience[$i].'">'.$job_experience[$i].'</option>';
                                    	if($job_experience[$i]==$experience){
	                                    	echo '<option value="'.$job_experience[$i].'" selected>'.$job_experience[$i].'</option>';
	                                    } else {
	                                    	echo '<option value="'.$job_experience[$i].'">'.$job_experience[$i].'</option>';
	                                    }
                                    }?>
                                    
                                	</select>
								</div>	
							</div>
							<div class="col-md-1 col-sm-6"></div>
							<div class="col-md-5 col-sm-6">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-globe"></i></span>
									<!-- <input type="text" class="form-control" placeholder="skills" name="skills" required > -->
									<select id="choose-city" name="skills[]" class="form-control" multiple required>
                                    <?php for($i=0;$i<count($job_skill);$i++){
                                    	// echo '<option value="'.$job_skill[$i].'">'.$job_skill[$i].'</option>';
                                    	if(in_array($job_skill[$i], $skills)){
	                                    	echo '<option value="'.$job_skill[$i].'" selected>'.$job_skill[$i].'</option>';
	                                    } else {
	                                    	echo '<option value="'.$job_skill[$i].'">'.$job_skill[$i].'</option>';
	                                    }
                                    }?>
                                    
                                	</select>
								</div>	
							</div>
							<div class="col-md-1 col-sm-6"></div>
							<div class="col-md-5 col-sm-6">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-globe"></i></span>
									<!-- <input type="text" class="form-control" placeholder="Compensation" name="compensation" required > -->
									<select id="compensation" name="compensation" class="form-control" required>
                                    <!-- <option value="">Compensation</option> -->
                                    <?php for($i=0;$i<count($job_compensation);$i++){
                                    	// echo '<option value="'.$job_compensation[$i].'">'.$job_compensation[$i].'</option>';
                                    	if($job_compensation[$i]==$compensation){
	                                    	echo '<option value="'.$job_compensation[$i].'" selected>'.$job_compensation[$i].'</option>';
	                                    } else {
	                                    	echo '<option value="'.$job_compensation[$i].'">'.$job_compensation[$i].'</option>';
	                                    }
                                    }?>
                                    
                                	</select>
								</div>	
							</div>
							
						<!-- </form> -->
					</div>
					
					<div class="row bottom-mrg extra-mrg">
						<!-- <form> -->
							<h2 class="detail-title">Job Description</h2>
							<div class="col-md-11 col-sm-11">
								<textarea class="form-control textarea" placeholder="About Company" name="description"><?php echo $description; ?></textarea>
								<input type="hidden" name="action" size="50" value="updatejob" />
								<input type="hidden" name="jobid" size="50" value="<?php echo $jobid; ?>" />
							</div>	
							<div class="col-md-11 col-sm-11">
								<button class="btn btn-success btn-primary small-btn">Update your Job</button>	
							</div>	
						<!-- </form> -->
					</div>
				</form>
				</div>
			</section>
					
						<div class="row no-padd">
							<div class="detail pannel-footer">
								<div class="col-md-12 col-sm-12">
									<div class="detail-pannel-footer-btn pull-right">
										<!-- <a href="#" class="footer-btn choose-cover">Choose Cover Image</a> -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- General Detail End -->
			
			


<?php include "footer.php";?>