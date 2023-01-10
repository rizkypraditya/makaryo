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

	echo $sql;

	?>