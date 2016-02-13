<?php
// Ληψη των τιμών απο login form
// Μετατροπη των κεφαλαίων γραμμάτων του email σε πεζά
$mail=strtolower(trim($_POST['email']));
$pass=trim($_POST['pass']);
// Έλεγχος αν η μεταβλητή $mail είναι σε μορφή email
if(!(filter_var($mail, FILTER_VALIDATE_EMAIL))) {
echo"Λαθος μορφη email";
header("Location: loginerror.php");		
exit();
}
?>
<?php
	//συνδεση με βάση δεδομένων
	include_once("dbconnection.php");			
		if(($mail==!null)&&($pass==!null)){
				//ελεγχος αν υπαρχει ο χρηστης στη βαση
				$userCheck="SELECT * FROM `pharmacists` WHERE email=\"$mail\" AND password=\"$pass\"" ;
				if(!($dbResult=mysql_query($userCheck,$dbcon))){
					echo"An error Has Occured".mysqlerror();
					}
				else{
					$dbcheck=mysql_fetch_array($dbResult);
						if($dbcheck[1]==$mail){
						$_SESSION['valid']=1;
						$_SESSION['afm']=$dbcheck[4];
						$_SESSION['userid']=$dbcheck[0];

						header("Location: showproducts.php");
						}
						else
						{
						header("Location: loginerror.php");
						}
				}
		}
		else
		{
				header("Location: loginerror.php");					
		}
?>