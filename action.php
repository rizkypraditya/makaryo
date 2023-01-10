<?php
include 'config/config.php'; 

if($_POST && !empty($_POST['action'])){
	if($_POST['action']=="login"){
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		$page = $_POST['page'];

		$sql = "SELECT `first_name` FROM `makaryo_user` WHERE `id`='$user' AND `password`='$pass'";
			$result = $conn->query($sql);
			
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					$name = $row['first_name'];
				}
				session_start();
				$_SESSION["makaryoid"] = $user;
				// unset ($_SESSION["lock"]);
				// print_r($name);
				if($name<>''){
					header( 'Location: http://'.$_SERVER['SERVER_NAME'].'/makassar/makaryo/'.$page );
				} else{
					header( 'Location: http://'.$_SERVER['SERVER_NAME'].'/makassar/makaryo/profil.php?status=new' );
				}
			
			} else {
				header( 'Location: http://'.$_SERVER['SERVER_NAME'].'/makassar/makaryo/login.php?status=false&page='.$page);
			}
		
		
	} else if($_POST['action']=="signup"){
		$mail = $_POST['mail'];
		$user = $_POST['user'];
		$pass = $_POST['pass'];

		$sql = "SELECT `first_name` FROM `makaryo_user` WHERE `id`='$user'";
			$result = $conn->query($sql);
			
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					$name = $row['name'];
				}

				header( 'Location: http://'.$_SERVER['SERVER_NAME'].'/makassar/makaryo/signup.php?status=false');
				// while($row = $result->fetch_assoc()) {
				// 	$id_rapat = $row['id'];
				// }
			
			} else {
				$sql = "INSERT INTO `makaryo_user`(`id`, `email`, `password`) VALUES ('$user','$mail','$pass')";
			$conn->query($sql);
				session_start();
				$_SESSION["makaryoid"] = $user;
				header( 'Location: http://'.$_SERVER['SERVER_NAME'].'/makassar/makaryo/profil.php?status=new' );
			}
		
		
	} else if($_POST['action']=="updateprofil"){
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$postal = $_POST['postal'];
		$address = $_POST['address'];
		$skype = $_POST['skype'];
		$organization = $_POST['organization'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$country = $_POST['country'];
		$about = $_POST['about'];
		$makaryoid = $_POST['makaryoid'];
		$skills=$_POST['skills'];
		$skills=array_diff( $skills, array('choose'));
		$skills=implode(",",$skills);

		$sql = "UPDATE `makaryo_user` SET 
		`first_name`='$first_name',
		`last_name`='$last_name',
		`email`='$email',
		`phone`='$phone',
		`postal`='$postal',
		`address`='$address',
		`skype`='$skype',
		`organization`='$organization',
		`city`='$city',
		`state`='$state',
		`country`='$country',
		`keahlian`='$skills',
		`about`='$about' WHERE `id`='$makaryoid'";
			$conn->query($sql);

				header( 'Location: http://'.$_SERVER['SERVER_NAME'].'/makassar/makaryo/profil.php?status=new');

	} else if($_POST['action']=="createjob"){
		$title=$_POST['title'];
		$hangout=$_POST['hangout'];
		$email=$_POST['email'];
		$skype=$_POST['skype'];
		$city=$_POST['city'];
		$state=$_POST['state'];
		$country=$_POST['country'];
		$description=$_POST['description'];
		$rating=$_POST['rating'];
		$verified=$_POST['verified'];
		$availability=$_POST['availability'];
		$experience=$_POST['experience'];
		$age_min=$_POST['age_min'];
		$age_max=$_POST['age_max'];
		$skills=implode(",",$_POST['skills']);
		$company=$_POST['company'];
		$education=$_POST['education'];
		$language=$_POST['language'];
		// $photo=$_POST['photo'];
		$photo = addslashes (file_get_contents($_FILES['photo']['tmp_name']));
		// $photo=1;
		// $date_start=$_POST['date_start'];
		$date_start=date('Y-m-d', strtotime($_POST['date_start']));
		// $date_end=$_POST['date_end'];
		$date_end=date('Y-m-d', strtotime($_POST['date_end']));
		$category=$_POST['category'];
		$compensation=$_POST['compensation'];
		$address=$_POST['address'];
		$makaryoid=$_POST['makaryoid'];

		
		if($makaryoid<>''){
			$sql = "INSERT INTO `makaryo_job`(`title`, `hangout`, `email`, `skype`, `city`, `state`, `country`, `description`, `rating`, `verified`, `availability`, `experience`, `age_min`, `age_max`, `skills`, `company`, `education`, `language`, `photo`, `date_start`, `date_end`, `category`, `compensation`, `address`, `makaryoid`) VALUES ('$title','$hangout','$email','$skype','$city','$state','$country','$description','$rating','$verified','$availability','$experience','$age_min','$age_max','$skills','$company','$education','$language','$photo','$date_start','$date_end','$category','$compensation','$address','$makaryoid')";
			$conn->query($sql);
		// echo $sql;	
		// print_r($_POST);

				header( 'Location: http://'.$_SERVER['SERVER_NAME'].'/makassar/makaryo/manage-job.php');
		} else {
			header( 'Location: http://'.$_SERVER['SERVER_NAME'].'/makassar/makaryo/login.php');
		}

	} else if($_POST['action']=="updatejob"){
		$title=$_POST['title'];
		$hangout=$_POST['hangout'];
		$email=$_POST['email'];
		$skype=$_POST['skype'];
		$city=$_POST['city'];
		$state=$_POST['state'];
		$country=$_POST['country'];
		$description=$_POST['description'];
		$rating=$_POST['rating'];
		$verified=$_POST['verified'];
		$availability=$_POST['availability'];
		$experience=$_POST['experience'];
		$age_min=$_POST['age_min'];
		$age_max=$_POST['age_max'];
		$skills=implode(",",$_POST['skills']);
		$company=$_POST['company'];
		$education=$_POST['education'];
		$language=$_POST['language'];
		// $photo=$_POST['photo'];
		$photo = '';
		if (isset($_FILES['photo'])) $photo = addslashes (file_get_contents($_FILES['photo']['tmp_name']));
		// $photo=1;
		// $date_start=$_POST['date_start'];
		$date_start=date('Y-m-d', strtotime($_POST['date_start']));
		// $date_end=$_POST['date_end'];
		$date_end=date('Y-m-d', strtotime($_POST['date_end']));
		$category=$_POST['category'];
		$compensation=$_POST['compensation'];
		$address=$_POST['address'];
		$jobid=$_POST['jobid'];

		
		if($photo<>''){
			$sql = "UPDATE `makaryo_job` SET `title`='$title',`hangout`='$hangout',`email`='$email',`skype`='$skype',`city`='$city',`state`='$state',`country`='$country',`description`='$description',`rating`='$rating',`verified`='$verified',`availability`='$availability',`experience`='$experience',`age_min`='$age_min',`age_max`='$age_max',`skills`='$skills',`company`='$company',`education`='$education',`language`='$language',`photo`='$photo',`date_start`='$date_start',`date_end`='$date_end',`category`='$category',`compensation`='$compensation',`address`='$address' WHERE `id`='$jobid'";
			$conn->query($sql);
		// echo $sql;	
		// print_r($_POST);
		} else {
			$sql = "UPDATE `makaryo_job` SET `title`='$title',`hangout`='$hangout',`email`='$email',`skype`='$skype',`city`='$city',`state`='$state',`country`='$country',`description`='$description',`rating`='$rating',`verified`='$verified',`availability`='$availability',`experience`='$experience',`age_min`='$age_min',`age_max`='$age_max',`skills`='$skills',`company`='$company',`education`='$education',`language`='$language',`date_start`='$date_start',`date_end`='$date_end',`category`='$category',`compensation`='$compensation',`address`='$address' WHERE `id`='$jobid'";
			// echo $sql;	
			$conn->query($sql);
		}

		header( 'Location: http://'.$_SERVER['SERVER_NAME'].'/makassar/makaryo/manage-job.php');
	} else {
		// print_r($_POST);
	}
} else {
	header( 'Location: http://'.$_SERVER['SERVER_NAME'].'/makassar/makaryo/index.php' );
}
?>