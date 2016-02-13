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
// Εισάγουμε στον πίνακα array_cart το Session cart items
$array_cart=$_SESSION['cart_items'];
// Παίρνουμε το 5ο κλειδι του πίνακα και το αποθηκεύουμε στη $quantity
$quantity=$array_cart[$cid][5];
// Ελέγχουμε αν είναι μικρότερο του 5
if ($quantity<5){
	// Αυξάνουμε κατα 1 τη ποσότητα	
    $quantity=$quantity+1;
	// Εισάγουμε στο 5ο κλειδί του πίνακα τη νέα ποσότητα	
    $array_cart[$cid][5]=$quantity;
	// Τέλος περνάμε στο session cart items τον νέο πίνακα	
    $_SESSION['cart_items']=  array_values($array_cart);
}
// Ανακατεύθυνση στη σελίδα του καλαθιού 
header('location: showcart.php');
?>
