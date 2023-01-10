<?php
session_start();
// $_SESSION["lock"] = $_SESSION["niks"];
//echo $_SESSION["lock"];
unset ($_SESSION["makaryoid"]);

header( 'Location: http://'.$_SERVER['SERVER_NAME'].'/makassar/makaryo/index.php' );
?>
