<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<link href="stylesheets/col.css" rel="stylesheet" type="text/css" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="icon" href="pir.jpg" type="image/x-icon" />
		<title>Δήμος Πειραιά</title>	
		<script src='https://www.google.com/recaptcha/api.js'></script>
		
	<style>
	div.a 
	{
    opacity: 0.6;
	font-size:70%	
	}   
	</style>
	
	</head>
<body>
	<div style="background-color:#F1F6F8; border-radius: 20px; box-shadow: 10px 10px 5px #797D92; padding: 5px 5px 20px 5px; width: 900px; margin-left: auto; margin-right: auto; text-align: left; ">
	<h1>Δήμος Πειραιάς</h1>
<?php
session_start();
if(isset($_SESSION['error']) ){
	// προστασία απο Session_Hijacking
	// H session_regenerate_id() δημιουργεί διαφορετικό id σε κάθε αίτηση και διαφορετικό αρχείο
	session_regenerate_id(true);
	$error=$_SESSION['error'];
} 
else
{
header('location: piraeus.php');
exit();
}			// Ανάλογα με την τιμη του $_SESSION['error'] εμφάνίζεται το αντίστοιχο λάθος...
			// το session καταστρέφεται και γίνεται ανακατεύθυνση στη σελίδα piraeus.php

			if ($error == 1) {
				echo '<h4>-- Λάθος στην εισαγωγή του ονόματος</h4>';
				session_destroy();
				echo'<a href="piraeus.php" style="font-weight:bold">Επιστροφή στην αρχική σελίδα</a>';
				exit();			
			}	
			if ($error == 2) {
				echo'<h4>-- Λάθος στην εισαγωγή του επωνύμου</h4>';
				session_destroy();
				echo'<a href="piraeus.php" style="font-weight:bold">Επιστροφή στην αρχική σελίδα</a>';
				exit();
			}			
			if ($error == 3) {
				echo'<h4>-- Λάθος στην εισαγωγή του email</h4>';				
				session_destroy();
				echo'<a href="piraeus.php" style="font-weight:bold">Επιστροφή στην αρχική σελίδα</a>';
				exit();
			}	
			if ($error == 4) {
				echo'<h4>-- Λάθος στην εισαγωγή του τηλεφώνου</h4>';				
				session_destroy();
				echo'<a href="piraeus.php" style="font-weight:bold">Επιστροφή στην αρχική σελίδα</a>';
				exit();
			}	
			if ($error == 5) {
				echo'<h4>-- Λάθος στην εισαγωγή της διεύθυνσης</h4>';				
				session_destroy();
				echo'<a href="piraeus.php" style="font-weight:bold">Επιστροφή στην αρχική σελίδα</a>';
				exit();
			}	
			if ($error == 6) {
				echo'<h4>-- Λάθος στην εισαγωγή του αριθμού διεύθυνσης</h4>';				
				session_destroy();
				echo'<a href="piraeus.php" style="font-weight:bold">Επιστροφή στην αρχική σελίδα</a>';
				exit();
			}	
			if ($error == 7) {
				echo'<h4>-- Λάθος στην εισαγωγή του ταχυδρομικού κώδικα</h4>';				
				session_destroy();
				echo'<a href="piraeus.php" style="font-weight:bold">Επιστροφή στην αρχική σελίδα</a>';
				exit();
			}				
			if ($error == 8) {
				echo'<h4>-- Λάθος στην εισαγωγή της περιγραφής του προβλήματος</h4>';				
				session_destroy();
				echo'<a href="piraeus.php" style="font-weight:bold">Επιστροφή στην αρχική σελίδα</a>';
				exit();
			}				



?>			
<form name="loginform" id="loginform" method="post" action="piraeus.php">
<input type="hidden" name="email" value="<?php echo $fill['email'];?>">	
<button name="submit" style="width:90px;height:30px; box-shadow: 3px 3px 3px #888888;" type="submit" value="">Epistrofi</button> 
</form>
	</div>			
</body>
</html>
			