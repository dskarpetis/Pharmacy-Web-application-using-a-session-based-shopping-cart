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
<style>
div {
    background-image:url('images/cart.gif');
    background-repeat:no-repeat;
    background-position:left top;
}
</style>	
	<link href="stylesheets/col.css" rel="stylesheet" type="text/css" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="icon" href="pharmacy2.png" type="image/x-icon" />
	<title>Show cart</title>
</head>
<body>

	<div style="background-color:#C1D9D0; border-radius: 20px; box-shadow: 10px 10px 5px #797D92; padding: 5px 5px 20px 5px; width: 800px; margin-left: auto; margin-right: auto; text-align: left; ">

	<div id="topcorner" align="right">
	<a href="showproducts.php" align="right" style="font-weight:bold">Προϊόντα</a>&nbsp&nbsp
	<a href="showcart.php" align="right" style="font-weight:bold">Καλάθι αγορών</a>&nbsp&nbsp
	<a href="logout.php" align="right" style="font-weight:bold">Αποσύνδεση</a>&nbsp&nbsp
	</div>

	<h1 style="color: #2B8890; font-family:Comic Sans MS; text-shadow: 1.5px 1.5px 1.5px #3EBAC6;" > <center>MEDICAL</center></h1>
	<center>
	<img src="images/pharmacy2.png" alt="pharmacy2 View" style="width:110px;height:130px;">
	</center>

<?php

$userid=$_SESSION['userid'];
$sum = 0;
$fpa = 0;
$totalfpa = 0;
$sump=0;				
$itemstotal = 0;
$string="";
	
	echo'<table border=2 style="background-color:#B5CCD5; border-radius: 5px; box-shadow: 3px 3px 3px #888888; padding: 5px 40px 10px 40px; width: 600px; margin-left: auto; margin-right: auto; text-align: left;"><tr>';
	echo '<center><tr><th align="center"> Κωδικός </th><th align="center"> Όνομα </th><th align="center"> Τιμή </th><th align="center"> Ποσότητα </th><th align="center"> Επιλογές </th></tr>';
	// Έλεγχος αν έχει δημιουργηθεί ο Session πίνακας $_SESSION['cart_items'] 
	if(isset($_SESSION['cart_items']) && !empty($_SESSION['cart_items'])) {
	$array_cart=$_SESSION['cart_items'];
	$product_id=$_SESSION['product_id'];
		// Εμφανίζούμε τα στοχεία του προϊόντος που έχουν εισαχθεί στο πίνακα $array_cart
		foreach ($array_cart as $key => $value) {
		echo '<tr><td align="center">'.$value[2].'</td>
		<td align="center">'.$value[3].'</td>
		<td align="center">'.$value[4].' &euro;</td>
		<td align="center">'.$value[5].'</td>';
		echo '<td align="center">		
					<a href=add.php?cid='.$key.'><img src="images/plus.png" alt="Add Product" width="25"></a>
					<a href=sub.php?cid='.$key.'><img src="images/minus.png" alt="Minus Product" width="25"></a>
					<a href=delete.php?cid='.$key.'><img src="images/delete.png" alt="Delete Product" width="25"></a>
			</td></tr>';
		// Σύνολικη τιμή προϊόντος(προϊόν x ποσότητα)			 
		$sump = $value[4] * $value[5];
		// Σύνολο χωρίς φπα
		$sum = $sum + $sump;
		// Σύνολο με φπα
		$totalfpa = $sum * ($value[6]/100+1);
		// Σύνολο προϊόντων
		$itemstotal = $itemstotal + $value[5];
		// Δημιουργία string το οποίο αποστέλλεται στην order.php
		$string.="ΚΩΔΚΟΣ: ".$value[2]."\t\t"."ΟΝΟΜΑΣΙΑ: ".$value[3]."\t\t"."ΤΙΜΗ ΧΩΡΙΣ ΦΠΑ: ".$value[4]."\t\t"."ΠΟΣΟΤΗΤΑ: ".$value[5]."\r\n";
		}
	}		
		echo '<tr><td colspan="2"¨align="center">Σύνολική ποσότητα</td><td></td><td align="center">'.$itemstotal.'</td><td></td></tr>';
		echo '<tr><td colspan="2"¨align="center">Σύνολο χωρίς ΦΠΑ</td><td align="center">'.number_format((float)$sum, 2, '.', '').' &euro;</td><td></td><td></td></tr>';
		echo '<tr><td colspan="2"¨align="center">Τελικό σύνολο με ΦΠΑ</td><td align="center">'.number_format((float)$totalfpa, 2, '.', '').' &euro;</td><td></td><td></td></tr>';
		echo '<form action="empty.php" method="POST"> 
			<input type="hidden" name="empty" value="php echo $userid;"><tr><td colspan="6" align="center"><input type="submit" value="Άδειασμα καλαθιού"></td></tr>
			</form>';
?>

		<form action="order.php" method="POST">
		<input type="hidden" name="string" value="<?php echo $string;?>">
		<input type="hidden" name="itemstotal" value="<?php echo $itemstotal;?>">	
		<input type="hidden" name="sum" value="<?php echo $sum;?>">	
		<input type="hidden" name="totalfpa" value="<?php echo $totalfpa;?>">		
		<tr><td colspan="6" align="center"><input type="submit" value="Τέλος παραγγελίας"></td></tr>
		</form>	
		
	</center>
	</table>	
</body>
</html>	