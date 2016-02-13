<?php
include_once("dbconnection.php");
if(!(isset($_SESSION['valid'])) || ($_SESSION['valid']!='1'))
	{
	header('location:login.php');
	exit();
	}
else
{
//κλείνω το session
session_destroy();
//κλείνω την βάση δεδομένων
mysql_close($dbcon);
//Ανακατευθυνση στο login
header('location: login.php');
exit();}
?>
