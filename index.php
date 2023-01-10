<?php
include 'config/config.php'; 
session_start();
$isLogin=false;
if (!isset($_SESSION['makaryoid'])){
   $isLogin=false;
} else{
    $makaryoid = $_SESSION['makaryoid'];
    $isLogin=true;
}

$sql = "SELECT `name` FROM `makaryo_category` WHERE 1";
    $result = $conn->query($sql);
    $job_category = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $job_category[] = $row['name'];
            
        }
    }
    $i=0;
    $jobs = array();
    $sql = "SELECT `id`, `title`, `hangout`, `email`, `skype`, `city`, `state`, `country`, `description`, `rating`, `verified`, `availability`, `experience`, `age_min`, `age_max`, `skills`, `company`, `education`, `language`, `photo`, `date_start`, `date_end`, `category`, `compensation`, `address`, `makaryoid` FROM `makaryo_job` LIMIT 8";
    $result = $conn->query($sql);
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
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Basic Page Needs==================================================-->
    <title>Makaryo - Job Portal Indonesia | Amoeba</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- CSS==================================================-->
    <link rel="stylesheet" href="assets/plugins/css/plugins.css">
    <link href="assets/css/styles.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" id="jssDefault" href="assets/css/colors/sea-blue-style .css"> </head>

<body>
    <div class="Loader"></div>
    <div class="wrapper">
        <nav class="navbar navbar-default navbar-fixed navbar-transparent white bootsnav">
            <div class="container">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu"><i class="fa fa-bars"></i></button>
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php"><img src="assets/img/logo-makaryo-white.png" width="50%" class="logo logo-display" alt=""><img src="assets/img/logo-makaryo-white-new.png" width="50%" class="logo logo-scrolled" alt=""></a>
                </div>
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <?php if($isLogin==false){ ?>
                        <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                            <li><a href="signup.php"><i class="fa fa-pencil" aria-hidden="true"></i>SignUp</a></li>
                            <li class="left-br"><a href="login.php" class="signin">Sign In Now</a></li>
                        </ul>
                        <?php } else {?>
                        <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                            <li class="dropdown megamenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-pencil" aria-hidden="true"></i> Browse</a>
                            <ul class="dropdown-menu megamenu-content" role="menu">
                                    <li>
                                        <div class="row">
                                            <div class="col-menu col-md-12">
                                                <!-- <h6 class="title">Main Pages</h6> -->
                                                <div class="content">
                                                    <ul class="menu-col">
                                                        <li><a href="search.php">Search Job</a></li>
                                                        <li><a href="search.php">Job in Grid </a></li>
                                                        <li><a href="my-apply.php">Applied Job </a></li>
                                                        <li><a href="profil.php">Resume </a></li>
                                                    </ul>
                                                </div>
                                            </div><!-- end col-3 -->
                                            
                                        </div><!-- end row -->
                                    </li>
                                </ul>
                            </li>

                            <li class="dropdown megamenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-sign-in" aria-hidden="true"></i> Hire</a>
                            <ul class="dropdown-menu megamenu-content" role="menu">
                                    <li>
                                        <div class="row">
                                            <div class="col-menu col-md-12">
                                                <!-- <h6 class="title">Main Pages</h6> -->
                                                <div class="content">
                                                    <ul class="menu-col">
                                                        <li><a href="create-job.php">Create Job</a></li>
                                                        <li><a href="manage-job.php">Manage Job </a></li>
                                                        <li><a href="candidate.php">Job Candidate </a></li>
                                                    </ul>
                                                </div>
                                            </div><!-- end col-3 -->
                                            
                                        </div><!-- end row -->
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown megamenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Hi, <?php echo $makaryoid; ?></a>
                            <ul class="dropdown-menu megamenu-content" role="menu">
                                    <li>
                                        <div class="row">
                                            <div class="col-menu col-md-12">
                                                <!-- <h6 class="title">Menu</h6> -->
                                                <div class="content">
                                                    <ul class="menu-col">
                                                        <li><a href="profil.php">Profil</a></li>
                                                        <li><a href="logout.php">Logout</a></li>
                                                        
                                                    </ul>
                                                </div>
                                            </div><!-- end col-3 -->
                                            
                                        </div><!-- end row -->
                                    </li>
                                </ul>
                        </ul>
                        <?php } ?>
                   
                </div>
            </div>
        </nav>
        <div class="clearfix"></div>
        <div class="home-three-banner" style="background-image:url(assets/img/bn3.jpg);">
            <div class="container">
                <div class="simple-banner-caption">
                    <div class="col-md-8 col-sm-10 banner-text">
                        <h1>Your way to get the <span> perfect Job </span></h1>
                        <p>Makaryo help jobseekers get jobs that are in accordance with their skills and competencies. We help you find your way to get the perfect job</p>
                        <form class="bt-form" id="homesearch" action="search.php" method="get">
                            <div class="col-md-6 col-sm-6">
                                <input type="text" name="Keyword" class="form-control" placeholder="Keyword, Skills, Designations">
                            </div>
                            <div class="col-md-6 col-sm-6">
                               <!--  <select id="choose-city" class="form-control">
                                    <option>Choose City</option>
                                    <option>Makassar</option>
                                    <option>Pare-pare</option>
                                    <option>Kendari</option>
                                    <option>Manado</option>
                                    <option>Palu</option>
                                    <option>Maluku</option>
                                </select> -->
                                <select id="choose-city" class="form-control" name="category">
                                    <option value="">Choose Category</option>
                                    <?php for($i=0;$i<count($job_category);$i++){
                                        echo '<option value="'.$job_category[$i].'">'.$job_category[$i].'</option>';
                                    }?>
                                </select>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" class="form-control" name='company' placeholder="Companies">
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" class="form-control" name='location' placeholder="Locations">
                            </div>
                            <br>
                            <div class="col-md-4 col-sm-5">
                                <button type="submit" class="btn btn-primary">Search Job</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="main-heading">
                            <p>200 New Jobs</p>
                            <h2>New Jobs <span>for You</span></h2></div>
                    </div>
                </div>
                <div class="row extra-mrg">
                    <?php for($i=0;$i<count($jobs);$i++){?>
                    <div class="col-md-3 col-sm-6">
                        <div class="grid-view brows-job-list">
                            <div class="brows-job-company-img"><img src="<?php echo $jobs[$i]['photo']; ?>" class="img-responsive" alt="" /></div>
                            <div class="brows-job-position">
                                <h3><a href="job.php?jobid=<?php echo $jobs[$i]['id']; ?>"><?php echo $jobs[$i]['title']; ?></a></h3>
                                <p><span><?php echo $jobs[$i]['company']; ?></span></p>
                            </div>
                            <div class="job-position"><span class="job-num"><?php echo $jobs[$i]['age_min'].' - '.$jobs[$i]['age_max'].' years old'; ?></span></div>
                            <div class="brows-job-type"><span class="
                                <?php if($jobs[$i]['availability']=='Part Time') echo 'part-time'; 
                                else if($jobs[$i]['availability']=='Full Time') echo 'full-time'; 
                                else if($jobs[$i]['availability']=='Internship') echo 'enternship'; 
                                else echo 'freelanc';
                                ?>">

                                <?php echo $jobs[$i]['availability']; ?></span></div>
                            <ul class="grid-view-caption">
                                <li>
                                    <div class="brows-job-location">
                                        <p><i class="fa fa-map-marker"></i><?php echo $jobs[$i]['city']; ?></p>
                                    </div>
                                </li>
                                <li>
                                    <p><span class="brows-job-sallery"><i class="fa fa-money"></i><?php echo $jobs[$i]['compensation']; ?></span></p>
                                </li>
                            </ul><?php if($i<4) echo '<span class="tg-themetag tg-featuretag">Premium</span>';?>
                        </div>
                    </div>
                    <?php } ?>
                    
                    <!-- <div class="col-md-3 col-sm-6">
                        <div class="grid-view brows-job-list">
                            <div class="brows-job-company-img"><img src="assets/img/com-2.jpg" class="img-responsive" alt="" /></div>
                            <div class="brows-job-position">
                                <h3><a href="job-detail.html">Web Developer</a></h3>
                                <p><span>Google</span></p>
                            </div>
                            <div class="job-position"><span class="job-num">5 Position</span></div>
                            <div class="brows-job-type"><span class="freelanc">Freelancer</span></div>
                            <ul class="grid-view-caption">
                                <li>
                                    <div class="brows-job-location">
                                        <p><i class="fa fa-map-marker"></i>QBL Park, C40</p>
                                    </div>
                                </li>
                                <li>
                                    <p><span class="brows-job-sallery"><i class="fa fa-money"></i>$110 - 200</span></p>
                                </li>
                            </ul><span class="tg-themetag tg-featuretag">Premium</span></div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="grid-view brows-job-list">
                            <div class="brows-job-company-img"><img src="assets/img/com-3.jpg" class="img-responsive" alt="" /></div>
                            <div class="brows-job-position">
                                <h3><a href="job-detail.html">Web Developer</a></h3>
                                <p><span>Google</span></p>
                            </div>
                            <div class="job-position"><span class="job-num">5 Position</span></div>
                            <div class="brows-job-type"><span class="enternship">Enternship</span></div>
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
                    <div class="col-md-3 col-sm-6">
                        <div class="grid-view brows-job-list">
                            <div class="brows-job-company-img"><img src="assets/img/com-4.jpg" class="img-responsive" alt="" /></div>
                            <div class="brows-job-position">
                                <h3><a href="job-detail.html">Web Developer</a></h3>
                                <p><span>Google</span></p>
                            </div>
                            <div class="job-position"><span class="job-num">5 Position</span></div>
                            <div class="brows-job-type"><span class="full-time">Full Time</span></div>
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
                    <div class="col-md-3 col-sm-6">
                        <div class="grid-view brows-job-list">
                            <div class="brows-job-company-img"><img src="assets/img/com-5.jpg" class="img-responsive" alt="" /></div>
                            <div class="brows-job-position">
                                <h3><a href="job-detail.html">Web Developer</a></h3>
                                <p><span>Google</span></p>
                            </div>
                            <div class="job-position"><span class="job-num">5 Position</span></div>
                            <div class="brows-job-type"><span class="part-time">Part Time</span></div>
                            <ul class="grid-view-caption">
                                <li>
                                    <div class="brows-job-location">
                                        <p><i class="fa fa-map-marker"></i>QBL Park, C40</p>
                                    </div>
                                </li>
                                <li>
                                    <p><span class="brows-job-sallery"><i class="fa fa-money"></i>$110 - 200</span></p>
                                </li>
                            </ul><span class="tg-themetag tg-featuretag">Premium</span></div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="grid-view brows-job-list">
                            <div class="brows-job-company-img"><img src="assets/img/com-6.jpg" class="img-responsive" alt="" /></div>
                            <div class="brows-job-position">
                                <h3><a href="job-detail.html">Web Developer</a></h3>
                                <p><span>Google</span></p>
                            </div>
                            <div class="job-position"><span class="job-num">5 Position</span></div>
                            <div class="brows-job-type"><span class="full-time">Full Time</span></div>
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
                    <div class="col-md-3 col-sm-6">
                        <div class="grid-view brows-job-list">
                            <div class="brows-job-company-img"><img src="assets/img/com-7.jpg" class="img-responsive" alt="" /></div>
                            <div class="brows-job-position">
                                <h3><a href="job-detail.html">Web Developer</a></h3>
                                <p><span>Google</span></p>
                            </div>
                            <div class="job-position"><span class="job-num">5 Position</span></div>
                            <div class="brows-job-type"><span class="freelanc">Freelancer</span></div>
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
                    <div class="col-md-3 col-sm-6">
                        <div class="grid-view brows-job-list">
                            <div class="brows-job-company-img"><img src="assets/img/com-1.jpg" class="img-responsive" alt="" /></div>
                            <div class="brows-job-position">
                                <h3><a href="job-detail.html">Web Developer</a></h3>
                                <p><span>Google</span></p>
                            </div>
                            <div class="job-position"><span class="job-num">5 Position</span></div>
                            <div class="brows-job-type"><span class="enternship">Enternship</span></div>
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
            </div>
        </section>
        <div class="clearfix"></div>
        <section class="video-sec dark" id="video" style="background-image:url(assets/img/banner-10.jpg);">
            <div class="container">
                <div class="row">
                    <div class="main-heading">
                        <p>Best For Your Projects</p>
                        <h2>Watch Our <span>video</span></h2></div>
                </div>
                <div class="video-part"><a target="blank" href="https://www.youtube.com/watch?v=UK5pkA-mGbE" class="video-btn"><i class="fa fa-play"></i></a></div>
            </div>
        </section>
        <section class="wp-process home-three">
            <div class="container">
                <div class="row">
                    <div class="main-heading">
                        <p>How We Work</p>
                        <h2>Our Work <span>Process</span></h2></div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="work-process">
                        <div class="work-process-icon"><span class="icon-search"></span></div>
                        <div class="work-process-caption">
                            <h4>Search Job</h4>
                            <p>Search Job Criteria that you like from City, Location, Specification and Salary. The best for your perfect Job</p>
                        </div>
                    </div>
                    <div class="work-process">
                        <div class="work-process-icon"><span class="icon-mobile"></span></div>
                        <div class="work-process-caption">
                            <h4>Find Job</h4>
                            <p>Find Job Criteria that you like from City, Location, Specification and Salary. The best for your perfect Job</p>
                        </div>
                    </div>
                    <div class="work-process">
                        <div class="work-process-icon"><span class="icon-profile-male"></span></div>
                        <div class="work-process-caption">
                            <h4>Hire Employee</h4>
                            <p>Hire Employee from Criteria that you like from City, Location, Specification and Salary. The best for your perfect Job</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 hidden-sm"><img src="assets/img/wp-iphone.png" class="img-responsive" alt="" /></div>
                <div class="col-md-4 col-sm-6">
                    <div class="work-process">
                        <div class="work-process-icon"><span class="icon-layers"></span></div>
                        <div class="work-process-caption">
                            <h4>Start Work</h4>
                            <p>Start Work that you like from City, Location, Specification and Salary. The best for your perfect Job</p>
                        </div>
                    </div>
                    <div class="work-process">
                        <div class="work-process-icon"><span class="icon-wallet"></span></div>
                        <div class="work-process-caption">
                            <h4>Pay Money</h4>
                            <p>Pay Money for Criteria that you like from City, Location, Specification and Salary. The best for your perfect Job</p>
                        </div>
                    </div>
                    <div class="work-process">
                        <div class="work-process-icon"><span class="icon-happy"></span></div>
                        <div class="work-process-caption">
                            <h4>Happy</h4>
                            <p>Happy Criteria that you like from City, Location, Specification and Salary. The best for your perfect Job</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="clearfix"></div>
        <section class="call-to-act">
            <div class="container-fluid">
                <div class="col-md-6 col-sm-6 no-padd bl-dark">
                    <div class="call-to-act-caption">
                        <h2>For Company</h2>
                        <h3>More than thousand Freelance criteria that you like from City, Location, Specification and Salary. The best for your perfect Job</h3><a href="#" class="btn bat-call-to-act">Hire Us</a></div>
                </div>
                <div class="col-md-6 col-sm-6 no-padd gr-dark">
                    <div class="call-to-act-caption">
                        <h2>For Freelance</h2>
                        <h3>More than thousand Job criteria that you like from City, Location, Specification and Salary. The best for your perfect Job</h3><a href="#" class="btn bat-call-to-act">Join Us</a></div>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                
                <div class="row" data-aos="fade-up">
                    <div class="col-md-12">
                        <div class="main-heading">
                            <p>Hire Experts</p>
                            <h2>Hire Experts <span>Team</span></h2>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="grid-slide">
                        
                        <!-- Single Freelancer -->
                        <div class="grid-slide-box">
                            <div class="top-candidate-wrap">
                                <div class="top-candidate-box">
                                    <span class="tpc-status">Available</span>
                                    <h4 class="flc-rate">$17/hr</h4>
                                    <div class="tp-candidate-inner-box">
                                        <div class="top-candidate-box-thumb">
                                            <img src="assets/img/nahda.jpg" class="img-responsive img-circle" alt="" />
                                        </div>
                                        <div class="top-candidate-box-detail">
                                            <h4>Nahda Rizqi M.</h4>
                                            <span class="desination">App Designer</span>
                                        </div>
                                    </div>
                                    <div class="top-candidate-box-extra">
                                        <ul>
                                            <li>Php</li>
                                            <li>Android</li>
                                            <li>Html</li>
                                            <li class="more-skill bg-primary">+3</li>
                                        </ul>
                                        <p>Chief Executive Officer Makaryo.</p>
                                    </div>
                                </div>
                                <a href="premium-candidate-detail.html" class="btn btn-paid-candidate bt-1">View Detail</a>
                            </div>
                        </div>
                        
                        <!-- Single Freelancer -->
                        <div class="grid-slide-box">
                            <div class="top-candidate-wrap">
                                <div class="top-candidate-box">
                                    <span class="tpc-status bg-warning">At Work</span>
                                    <h4 class="flc-rate">$19/hr</h4>
                                    <div class="tp-candidate-inner-box">
                                        <div class="top-candidate-box-thumb">
                                            <img src="assets/img/ghulam.jpg" class="img-responsive img-circle" alt="" />
                                        </div>
                                        <div class="top-candidate-box-detail">
                                            <h4>Ghulam Maulana R.</h4>
                                            <span class="desination">Software Developer</span>
                                        </div>
                                    </div>
                                    <div class="top-candidate-box-extra">
                                        <ul>
                                            <li>Php</li>
                                            <li>Android</li>
                                            <li>Html</li>
                                            <li class="more-skill bg-primary">+3</li>
                                        </ul>
                                        <p>Chief Technology Officer Makaryo.</p>
                                    </div>
                                </div>
                                <a href="premium-candidate-detail.html" class="btn btn-paid-candidate bt-1">View Detail</a>
                            </div>
                        </div>
                        
                        <!-- Single Freelancer -->
                        <div class="grid-slide-box">
                            <div class="top-candidate-wrap">
                                <div class="top-candidate-box">
                                    <span class="tpc-status bg-danger">No Available</span>
                                    <h4 class="flc-rate">$15/hr</h4>
                                    <div class="tp-candidate-inner-box">
                                        <div class="top-candidate-box-thumb">
                                            <img src="assets/img/sarah.jpg" class="img-responsive img-circle" alt="" />
                                        </div>
                                        <div class="top-candidate-box-detail">
                                            <h4>Sarah Karimah</h4>
                                            <span class="desination">SEO Expert</span>
                                        </div>
                                    </div>
                                    <div class="top-candidate-box-extra">
                                        <ul>
                                            <li>Php</li>
                                            <li>Android</li>
                                            <li>Html</li>
                                            <li class="more-skill bg-primary">+3</li>
                                        </ul>
                                        <p>Chief Marketing Officer Makaryo..</p>
                                    </div>
                                </div>
                                <a href="premium-candidate-detail.html" class="btn btn-paid-candidate bt-1">View Detail</a>
                            </div>
                        </div>
                        
                    
                    </div>
                </div>
                
            </div>
        </section>
        <div class="clearfix"></div>
        <!-- Download app Section Start -->
        <section class="download-app inverse-bg" style="background:url(assets/img/geometric-bg.jpg),linear-gradient(135deg,#35434e 0%,#35434e 100%)!important">
            <div class="container text-center">
                <div class="row">
                    <div class="col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1">
                        <div class="app-content">
                            <h2>Download Our Best Apps</h2>
                            <p>If you have high mobility in your life, please download Makaryo on your phone.</p>
                            <a href="#" class="btn call-btn"><i class="fa fa-apple"></i>iPhone Store</a>
                            <a href="#" class="btn call-btn"><i class="fa fa-android"></i>Google Store</a>
                        </div>
                    </div>
                </div>
                <!--/row-->
            </div>
        </section>
        <div class="clearfix"></div>
        <!-- Download app Section End -->
        
        <!-- Footer Section Start -->
        <footer class="footer light-footer">
            <div class="row lg-menu">
                <div class="container">
                    <div class="col-md-4 col-sm-4"><img src="assets/img/logo-makaryo.png" width="50%" class="img-responsive" alt="" /> </div> 
                    <div class="col-md-4 col-sm-4"><br><p>Copyright Makaryo © 2019. All Rights Reserved </p> </div>
                    <div class="col-md-4 co-sm-4 pull-right">
                        <ul class="footer-social">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                   <!--Start of Tawk.to Script-->
<!-- <script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5d275a8222d70e36c2a54d74/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script> -->

<!-- <script type="text/javascript" src="https://apis.google.com/js/platform.js"></script>
                <div class="g-hangout" data-render="createhangout"
                                        data-invites="[{id: 'radityarezki@gmail.com', invite_type: 'EMAIL'}]">
</div> -->
<!--End of Tawk.to Script-->

<!-- <div class="skype-button bubble" data-contact-id="live:rizky.praditya" data-color="#35434e"></div> -->
<!-- <script src="https://swc.cdn.skype.com/sdk/v1/sdk.min.js"></script> -->

                </div>
            </div>
            <!-- <div class="row copyright">
                <div class="container">
                    <p>Copyright Makaryo © 2019. All Rights Reserved </p>
                </div>
            </div> -->
        </footer>
        <div class="clearfix"></div>
        <div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="tab" role="tabpanel">
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#login" role="tab" data-toggle="tab">Sign In</a></li>
                                <li role="presentation"><a href="#register" role="tab" data-toggle="tab">Sign Up</a></li>
                            </ul>
                            <div class="tab-content" id="myModalLabel2">
                                <div role="tabpanel" class="tab-pane fade in active" id="login"><img src="assets/img/logo-makaryo-short.png" class="img-responsive" alt="" />
                                    <div class="subscribe wow fadeInUp">
                                        <form class="form-inline" method="post">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <input type="email" name="email" class="form-control" placeholder="Username" required="">
                                                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                                                    <div class="center">
                                                        <button type="submit" id="login-btn" class="submit-btn"> Login </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="register"><img src="assets/img/logo-makaryo-short.png" class="img-responsive" alt="" />
                                    <form class="form-inline" method="post">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <input type="text" name="email" class="form-control" placeholder="Your Name" required="">
                                                <input type="email" name="email" class="form-control" placeholder="Your Email" required="">
                                                <input type="email" name="email" class="form-control" placeholder="Username" required="">
                                                <input type="password" name="password" class="form-control" placeholder="Password" required="">
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
        
        <!-- Scripts==================================================-->
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