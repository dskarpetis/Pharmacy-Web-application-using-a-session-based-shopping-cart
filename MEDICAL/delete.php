<?php
include_once("dbconnection.php");
//έλεγχος αν ειναι πιστοποιημένος χρήστης
if(!(isset($_SESSION['valid'])) || ($_SESSION['valid']!='1'))
{
	header('location:login.php');
	exit();
}
$userid=$_SESSION['userid'];
// Παίρνουμε το id της εγγραφης του προϊόντος
$_SESSION['cid']=$_GET['cid'];
$cid=$_SESSION['cid'];
$array_cart=$_SESSION['cart_items']; 
// Διγράφουμε το προϊόν απο τον πίνακα
unset($array_cart[$cid]);
$_SESSION['cart_items']=  array_values($array_cart);
// Εμφάνιση σελίδας καλαθιού
header('location: showcart.php');
?>