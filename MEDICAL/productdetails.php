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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<link href="stylesheets/col.css" rel="stylesheet" type="text/css" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="icon" href="pharmacy2.png" type="image/x-icon" />
		<title>Product details</title>
	</head>

<body>
<div style="background-color:#C1D9D0; border-radius: 20px; box-shadow: 10px 10px 5px #797D92; padding: 5px 5px 20px 5px; width: 900px; margin-left: auto; margin-right: auto; text-align: left; ">

<div id="topcorner" align="right">
	<a href="showproducts.php" style="font-weight:bold">Προϊόντα</a>&nbsp&nbsp
	<a href="showcart.php" style="font-weight:bold">Καλάθι αγορών</a>&nbsp&nbsp
	<a href="logout.php" style="font-weight:bold">Αποσύνδεση</a>&nbsp&nbsp
</div>

<h1 style="color: #2B8890; font-family:Comic Sans MS; text-shadow: 1.5px 1.5px 1.5px #3EBAC6;" > <center>MEDICAL</center></h1>

<center>
<img src="images/pharmacy2.png" alt="Mountain View" style="width:125px;height:146px;">
</center>

<form name="addcart" id="addcart" method="post" action="addcart.php">
<?php 
	// Λαμβάννουμε το product_id και το περνάμε σε ένα session με το ίδιο όνομα
	$_SESSION['product_id']=$_GET['product_id'];
	// Παίρνουμε τα στοιχεια του συγκρεκριμένου προϊόντος από τη βάση δεδομένων
	$dbpid='SELECT * FROM medications WHERE idm="'.$_GET['product_id'].'"';
		if(!($dbres = mysql_query($dbpid,$dbcon))) {
		echo"An error Has Occured".mysqlerror();
		}
		else
		{
			// Εμφανίζουμε τα στοιχεία του επιλεγμένου προϊόντος
			echo'<table border=2 style="background-color:#B5CCD5; border-radius: 5px; box-shadow: 3px 3px 3px #888888; padding: 5px 40px 10px 40px; width: 850px; margin-left: auto; margin-right: auto; text-align: left;"><tr>';
		
			while($dbrow=mysql_fetch_array($dbres)){
					// Δημιουργία Session για τα παρακάτω πεδία
					$_SESSION['pname']=$dbrow['pname'];
					$_SESSION['code']=$dbrow['code'];
					$_SESSION['cost']=$dbrow['cost'];
					$_SESSION['fpa']=$dbrow['fpa'];
					// Περιγραφή προϊόντος
					echo"<td>"."<b>Όνομα:</b></td><td> ".$dbrow[2]."</td></tr>";
					echo "<tr><td>"."<b>Περιεχόμενο:</b></td><td>  ".$dbrow[3]."</td></tr>";
					echo "<tr><td>"."<b>Περιγραφή:</b></td><td>  ".$dbrow[4]."</td></tr>";
					echo "<tr><td>"."<b>Τιμή χωρις Φ.π.α.:  </b></td><td>  ".$dbrow[5]." &euro;</td></tr>";
					echo "<tr><td>"."<b>Φ.π.α.:  </b></td><td>  ".$dbrow[6]." %</td></tr>";
					echo "<tr><td>"."<b>Κωδικός προιόντος:  </b></td><td>  ".$dbrow[1]."</td></tr>"; 
	?>		
					<tr><td><b>Ποσότητα:</b></td><td><select name="quantity">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
					</select></td></tr>
					<tr><td colspan="2" align="center"><input type="submit" value="Προσθήκη στο καλάθι"/></td></tr>
		
		<?php
			}
		echo"</table></form>";
		}
		?>		
</body>
</html>			