<?php include "header.php";?>
<?php
$sql = "SELECT id, title, city, state, country, company, photo, category, date_start, date_end FROM `makaryo_job` WHERE makaryoid = '$makaryoid'";
	$result = $conn->query($sql);
	$job = array();
	$i=0;
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$job[$i]['id'] = $row['id'];
			$job[$i]['title'] = $row['title'];
			$job[$i]['city'] = $row['city'];
			$job[$i]['state'] = $row['state'];
			$job[$i]['country'] = $row['country'];
			$job[$i]['company'] = $row['company'];
			$job[$i]['photo'] = 'data:image/jpeg;base64,'.base64_encode($row['photo']).' ';
			$job[$i]['category'] = $row['category'];
			$job[$i]['date_start'] = $row['date_start'];
			$job[$i]['date_end'] = $row['date_end'];
			$i++;
		}
	}

?>
<div class="clearfix"></div>
			
			<!-- Title Header Start -->
			<section class="inner-header-title" style="background-image:url(assets/img/banner-10.jpg);">
				<div class="container">
					<h1>Manage Job</h1>
				</div>
			</section>
			<div class="clearfix"></div>
			<!-- Title Header End -->
			
			<!-- Manage Company List Start -->
			<section class="manage-company gray">
				<div class="container">
				
					<!-- search filter -->
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="search-filter">
								<div class="col-md-4 col-sm-5">
									<div class="filter-form">
										<div class="input-group">
											<input type="text" class="form-control" placeholder="Search…">
											<span class="input-group-btn">
												<button type="button" class="btn btn-default">Go</button>
											</span>
										</div>
									</div>
								</div>
								<div class="col-md-8 col-sm-7">
									<div class="short-by pull-right">
										Short By
										<div class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <i class="fa fa-angle-down" aria-hidden="true"></i></a>
										<ul class="dropdown-menu">
											<li><a href="#">Short By Date</a></li>
											<li><a href="#">Short By Views</a></li>
											<li><a href="#">Short By Popular</a></li>
										</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- search filter End -->
					
					<div class="row">
						<div class="col-md-12">
							<?php for($i=0;$i<count($job);$i++){?>
								<article>
									<div class="mng-company">
										<div class="col-md-6 col-sm-6">
											<div class="item-fl-box">
												<div class="mng-company-pic">
													<img src="<?php echo $job[$i]['photo'];?>" class="img-responsive" alt="" />
												</div>
												<div class="mng-company-name">
													<h4><?php echo $job[$i]['company'];?> <span class="cmp-tagline">(<?php echo $job[$i]['title'];?>)</span></h4>
													<span class="cmp-time"><?php echo date('d F Y', strtotime($job[$i]['date_start'])).' - '.date('d F Y', strtotime($job[$i]['date_end']));?></span>
												</div>
											</div>
										</div>
										<div class="col-md-4 col-sm-4">
											<div class="mng-company-location">
												<p><i class="fa fa-map-marker"></i> <?php echo $job[$i]['city'].', '.$job[$i]['state'];?></p>
											</div>
										</div>
										<div class="col-md-2 col-sm-2">
											<div class="mng-company-action">
												<a href="candidate.php?jobid=<?php echo $job[$i]['id']; ?>" data-toggle="tooltip" title="Candidate"><i class="fa fa-user"></i></a>
												<a href="edit-job.php?jobid=<?php echo $job[$i]['id']; ?>" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>
												<a href="delete-job.php?jobid=<?php echo $job[$i]['id']; ?>" data-toggle="tooltip" title="Delete"><i class="fa fa-trash-o"></i></a>
											</div>
										</div>
									</div>
								</article>
							<?php }?>
							
							
							
							
						</div>
					</div>
					
					<div class="row">
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
			</section>
			<!-- Manage Company List End -->

			
<?php include "footer.php";?>