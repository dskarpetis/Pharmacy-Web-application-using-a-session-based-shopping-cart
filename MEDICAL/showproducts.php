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
		<title>Show products</title>
	</head>	
	
<body>
	<div style="background-color:#C1D9D0; border-radius: 20px; box-shadow: 10px 10px 5px #797D92; padding: 5px 5px 20px 5px; width: 600px; margin-left: auto; margin-right: auto; text-align: left; ">
	
	<div id="topcorner" align="right">
	<a href="showproducts.php" class="current" style="font-weight:bold">Προϊόντα</a>&nbsp&nbsp
	<a href="showcart.php" style="font-weight:bold">Καλάθι αγορών</a>&nbsp&nbsp
	<a href="logout.php" style="font-weight:bold">Αποσύνδεση</a>&nbsp&nbsp
	</div>
	
	<h1 style="color: #2B8890; font-family:Comic Sans MS; text-shadow: 1.5px 1.5px 1.5px #3EBAC6;" > <center>MEDICAL</center></h1>
	
	<center>
	<img src="images/pharmacy2.png" alt="Mountain View" style="width:125px;height:146px;">
	</center>
			
	<div id="content">
	<table  style="background-color:#B5CCD5; border-radius: 5px; box-shadow: 3px 3px 3px #888888; padding: 5px 40px 10px 40px; width: 450px; margin-left: auto; margin-right: auto; text-align: left;">
                <center>
                <tr>
                <td><center><b><u>A/A</u></b></center></td>
                <td><center><b><u>Ονομασία</u></b></center></td>
                <td><center><b><u>Τιμή</u></b></center></td>
	
					<?php
					//συνδεση με βάση δεδομένων
					include_once("dbconnection.php");
					// Ο συνολικός αριθμός εγγραφων απο πινακα medications
					$sqlRec = mysql_query("SELECT COUNT(idm) FROM medications");  
					$row = mysql_fetch_array($sqlRec); 
					$rows = $row[0]; 
					// Ο αριθμός αποτελεσμάτων που θα εμφανιστούν στη σελίδα καθοριζεται
					// απο το αρχείο config.php κατα τη σύνδεση με τη βάση
					// Ο αριθμός της τελευταίας σελίδας 
					$last = ceil($rows/$page_rows); 
					// Το $last δεν μπορεί να είναι μικρότερο του 1 
					if($last < 1){ 
						$last = 1; 
					} 
					$numberofpages = 1; 

					if(isset($_GET['pn'])){ 
						$numberofpages = preg_replace('#[^0-9]#', '', $_GET['pn']); 
					}
							// Ο αριθμός σελίδας δεν πρέπει να ειναι μεγαλυτερος απο τη τελευταία σελίδα or μικρότερος απο ένα
						if ($numberofpages < 1) { 
							$numberofpages = 1; 
						} 
						else if ($numberofpages > $last) {
							$numberofpages = $last; 
						} 
						$max = 'Limit ' .($numberofpages - 1) * $page_rows .',' .$page_rows; 
							
						$sqlRec = mysql_query("SELECT * FROM medications ORDER BY idm DESC $max"); 
						$pagecontrol = ''; 
						if($last != 1){ 
							// Εμφάνιση των αριθμών στο κάτω μέρος της σελίδας
							if ($numberofpages > 1) { 
								$previous = $numberofpages - 1; 
								$pagecontrol .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'">Προηγούμενη Σελίδα</a> &nbsp; &nbsp; '; 
								// Αριθμός σελίδων δίπλα απο την επιλεγμένη
								for($i = $numberofpages-4; $i < $numberofpages; $i++){ 
									if($i > 0){ 
										$pagecontrol .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a> &nbsp; '; 
									} 
								} 
							} 
							$pagecontrol .= ''.$numberofpages.' &nbsp; '; 
							// Αριθμός σελίδων δίπλα  απο την επιλεγμένη
								for($i = $numberofpages+1; $i <= $last; $i++){ 
									$pagecontrol .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a> &nbsp; '; 
									if($i >= $numberofpages+4){
										break; 
									} 
								} 
								if ($numberofpages != $last) { 
									$next = $numberofpages + 1; $pagecontrol .= ' &nbsp; &nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'">Επόμενη Σελίδα</a> '; 
								} 
							} 
								$countlist = '';	

//////////////////////////////////////////////////////////////////////////////////////////////
//ΕΜΦΑΝΙΣΗ ΦΑΡΑΜΑΚΩΝ ΑΠΟ ΠΙΝΑΚΑ mdeications							
								$counter=1;
								// Εμφάνιση εγγραφων απο την $max
								if(!($dbresult = mysql_query("SELECT * FROM medications ORDER BY idm ASC $max"))) {	
									echo "An error has occured : " . mysql_error();
								}
								else 
								{				
									while($dbrow = mysql_fetch_array($dbresult)){
									echo '<tr style="margin:4px;">';
									// Εμφάνιση Α/Α, Ονομα προϊόνοτος και  Τιμής χωρις φπα του προϊόντος απο την βάση δεδομένων  
									echo '<td valign="top" align="center" style="font-size:100%; font-weight:bold;">'.$dbrow[0].'.</td>';									
									echo '<td><center>';
									'"></a>';
									// Στέλνουμε το product id του προϊόντος  στη σελίδα productdetails.php
									echo '<a href="productdetails.php?product_id='.$dbrow[0].'">'.$dbrow[2].'</a>';
									echo '</center></td>';
									echo '<td><center>'.$dbrow[5].'</center></td>';									
									echo '</tr>';
									$counter++;
									}				
								}
					?>
				</center>
	</table>
								<div> 
								&nbsp
								<div align="right"><?php echo $pagecontrol; ?></div> 
								</div>
	</div>
</body>
</html>
			