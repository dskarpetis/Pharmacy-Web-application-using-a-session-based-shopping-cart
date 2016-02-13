<?php
	//συνδεση με βάση δεδομένων
	include_once("dbconnection.php");
	
	//έλεγχος πιστοποιησης χρήστη
	if(!(isset($_SESSION['valid'])) || ($_SESSION['valid']!='1'))
	{
		header('location:login.php');
		exit();
	}
?>
<?php
	// δεχόμαστε και αποθηκεύουμε στη μεταβλητή string τα στοιχεία
	// του καλαθιού τα οποίο θα εκτυπωσουμε στο αρχείο .txt
	$string = $_POST["string"];
	$userid=$_SESSION['userid'];

// Αν υπάρχει το sesion cart items και δεν είναι άδειο αποθηκεύουμε 
// τα session στις παρακάτω μεταβλητές
if(isset($_SESSION['cart_items']) && !empty($_SESSION['cart_items'])) {
	
	$array_cart=$_SESSION['cart_items'];
	$product_id=$_SESSION['product_id'];
	$totalfpa = $_POST["totalfpa"];
	$sum = $_POST["sum"];	
	$itemstotal = $_POST["itemstotal"];		
	$afm=$_SESSION['afm'];
	$now = new DateTime();

// Στη μεταβλητη $timedate αποθηκεύεται η τρέχων ημερομηνία και ώρα
$now->setTimezone(new DateTimeZone('Europe/Athens')); 
$timedate=$now->format('d-m-Y_H-i-s');
// Στη μεταβλητή $filestring αποθηκεύουμε εναν συνδυασμό του αφμ του φαρμακοποιού
// με την τρέχων ημερομηνία και ώρα
$filestring=$afm.'_'.$timedate;

					// Δημιουργία και αποθήκευση του αρχείου με όνομα  $filestring
					$file = fopen("c:\\xampp\\htdocs\\MEDICAL\\ $filestring.txt", "w") or exit("An error occurred!");
	
					// Στην $str1 αποθηκεύου οτι θα εκτυπωθει στο αρχείο
					$str1=$string."ΣΥΝΟΛΙΚΗ ΠΟΣΟΤΗΤΑ: \t".$itemstotal."\n"."ΣΥΝΟΛΟ ΧΩΡΙΣ ΦΠΑ: \t".$sum."\n"."ΣΥΝΟΛΟ ΜΕ ΦΠΑ: \t\t".$totalfpa;
					
					// εγγραφή στο αρχείο
					fwrite($file,$str1);

		fclose($file);
	// καθαρισμός καλαθιού	
	unset($_SESSION['cart_items']);	
	echo '<h1>H παραγγελία σας ολοκληρώθηκε</h1>';
	// ανακατεύθυνση στο καλαθι προϊόντων
	header('Refresh: 2;url=showcart.php');

}
else {
	// Όταν δεν έχουν προστεθεί προιόντα στο καλάθι
	echo '<h1>Δεν έχετε προϊόντα στο καλάθι</h1>';
	header('Refresh: 2;url=showproducts.php');
	
}
?>