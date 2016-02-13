<?php
include_once("dbconnection.php");
//έλεγχος αν ειναι πιστοποιημένος χρήστης
if(!(isset($_SESSION['valid'])) || ($_SESSION['valid']!='1'))
{
	header('location:login.php');
	exit();
}

// Παίρνουμε το id της εγγραφης του προϊόντος
$cid = isset($_GET['cid']) ? $_GET['cid'] : "";
// Καθαρισμός καλαθιού	
unset($_SESSION['cart_items']);
// Ανακατεύθυνση στη σελίδα του καλαθιού 
header('location: showcart.php');
?>

