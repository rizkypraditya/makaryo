<?php include "config/config.php";?>
<?php
if($_GET && !empty($_GET['action'])){
	$action = $_GET['action'];
	$jobid = $_GET['jobid'];
	$makaryoid = $_GET['makaryoid'];

	if($action=='apply'){
		$sql = "INSERT INTO `makaryo_apply`(`jobid`, `makaryoid`, `waktu`) VALUES ('$jobid','$makaryoid',now())";
		$conn->query($sql);
		header( 'Location: http://'.$_SERVER['SERVER_NAME'].'/makassar/makaryo/job.php?jobid='.$jobid );

	} else if($action=='cancel'){
		$sql = "DELETE FROM `makaryo_apply` WHERE `jobid`='$jobid' AND `makaryoid`='$makaryoid'";
		$conn->query($sql);
		header( 'Location: http://'.$_SERVER['SERVER_NAME'].'/makassar/makaryo/job.php?jobid='.$jobid );

	} else if($action=='shortlist'){
		$sql = "UPDATE `makaryo_apply` SET `ket`='shortlist' WHERE `jobid`='$jobid' AND `makaryoid`='$makaryoid'";
		$conn->query($sql);
		header( 'Location: http://'.$_SERVER['SERVER_NAME'].'/makassar/makaryo/candidate-detail.php?jobid='.$jobid.'&makaryoid='.$makaryoid );

	} else if($action=='unshort'){
		$sql = "UPDATE `makaryo_apply` SET `ket`='' WHERE `jobid`='$jobid' AND `makaryoid`='$makaryoid'";
		$conn->query($sql);
		header( 'Location: http://'.$_SERVER['SERVER_NAME'].'/makassar/makaryo/candidate-detail.php?jobid='.$jobid.'&makaryoid='.$makaryoid );

	}
	echo $sql;
	
} else {
	header( 'Location: http://'.$_SERVER['SERVER_NAME'].'/makassar/makaryo/search.php' );
}