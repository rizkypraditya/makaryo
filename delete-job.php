<?php include "config/config.php";?>
<?php 
if($_GET && !empty($_GET['jobid'])){
	$jobid = $_GET['jobid'];

	$sql = "DELETE FROM `makaryo_job` WHERE `id`='$jobid'";
	$result = $conn->query($sql);
	header( 'Location: http://'.$_SERVER['SERVER_NAME'].'/makassar/makaryo/manage-job.php' );
} else {
	header( 'Location: http://'.$_SERVER['SERVER_NAME'].'/makassar/makaryo/index.php' );
}
	?>