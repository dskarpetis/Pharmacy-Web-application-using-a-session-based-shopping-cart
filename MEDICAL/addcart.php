<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<link href="../stylesheets/col.css" rel="stylesheet" type="text/css" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Προσθήκη προϊόντος</title>
	</head>
	<body>
		<?php
		//συνδεση με βάση δεδομένων
		include_once("dbconnection.php");
		
		//έλεγχος πιστοποιησης χρήστη
		if(!(isset($_SESSION['valid'])) || ($_SESSION['valid']!='1'))
		{
			header('location:login.php');
			exit();
		}

		else{
			
			$userid=$_SESSION['userid'];
			$product_id=$_SESSION['product_id'];
			$pname=$_SESSION['pname'];
			$code=$_SESSION['code'];
			$cost=$_SESSION['cost'];
			$fpa=$_SESSION['fpa'];
			if (!is_numeric($_POST['quantity'])){
				echo'<h1>Λάθος τιμή quantity</h1>';
				header('Refresh: 2;url=showproducts.php');
				exit();
			}	
            if (!($_POST['quantity']>0) || !($_POST['quantity']<6)) {
				echo'<h1>Λάθος τιμή quantity</h1>';
				header('Refresh: 2;url=showproducts.php');
				exit();				
			}
			
			$quantity=$_POST['quantity'];
			
			// Δημιουργία πίνακα array_cart με κλειδία όλα τα στοιχεία  που
			// θα περάσουν στο cart
			$array_cart=array($userid, $product_id, $code, $pname, $cost, $quantity, $fpa);
        

			// Έλεγχος αν υπαρχει ο πινακας 'cart_items' στο session 
			if(!isset($_SESSION['cart_items'])){
				// Δημιουργία του πίνακα $_SESSION['cart_items']
				$_SESSION['cart_items'] = array();
			}

			// Ελεγχος αν υπάρχει στον πινακα (καλάθι) το όνομα του συγκεκριμένου προϊόντος
			$str='';
			foreach ($_SESSION['cart_items'] as $key => $value) {
				$str.=$value[3];
			}
			
			if (strpos($str,$pname) !== false) {
			// Αν υπάρχει εμφανίζεται το αντίστοιχο μηνυμα και στη συνχεια μεταφερομαστε στη σελίδα με
			// τα προϊόντα
				echo'<h1>Το προϊον που επιλέξατε υπάρχει στο καλάθι</h1>';
					header('Refresh: 2;url=showproducts.php');
			}
			 
			// Αν δεν εμφανίζεται το αντίστοιχο μηνυμα και στη συνχεια στον πινακα $_SESSION['cart_items']
			// εισάγουμε τον πίνακα $array_cart με όλα τα στοιχεία.
			// Τέλος οδηγούμαστε  στη σελίδα εμφάνισης του καλαθιού
			else
				{
				array_push($_SESSION['cart_items'], $array_cart);
				echo'<h1>Προσθήκη προϊόντος επιτυχής</h1>';
				header('Refresh: 2;url=showcart.php');

			}			
							
		}
		?>
	</body>
</html>	