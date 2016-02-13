<!DOCTYPE html>
<html> 
<head>
<meta charset="UTF-8">
</head>
<link rel="icon" href="pir.jpg" type="image/x-icon" />
<body>

<?php


// grab recaptcha library
require_once "recaptchalib.php";

// your secret key
$secret = "6LfGIhMTAAAAALTU4YtnSvchliWQE5mdDmZXMP2c";
 
// empty response
$response = null;
 
// check secret key
$reCaptcha = new ReCaptcha($secret);

// if submitted check response
if ($_POST["g-recaptcha-response"]) {
    $response = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
}

if ($response != null && $response->success) {
// Απολύμανση και επικύρωση δεδομένων για προστασία από XSS επιθέσεις	

	$validTags = array("name"=>"xname", "surname"=>"xsurname", "email"=>"xemail", "phoneNumber"=>"xphoneNumber", "address"=>"xaddress", "addressNumber"=>"xaddressNumber", "postCode"=>"xpostCode", "description"=>"xdescription", "g-recaptcha-response"=>"recaptcha");
	$validMethod = "POST";
	$errMsg = "";


	function isValidRequest()
	{
	  global $validTags;
	  global $validMethod;   
	  global $errMsg;  
	  global $error;

	$patternChar = 		'/^[\x{0386}-\x{03CE}\x]{3,}+$/u';			// μόνο  ελληνική χαρακτήρες με μήκος τουλάχιστον 3
	$patternNumb = 		'/^[6][9][0-9]{8}$/';							// μόνο  αριθμητική χαρακτηρες που ξεκινούν απο 69 και έχουν μήκος 10
	$patternAddrNumb = 	'/^[1-9][0-9]{0,2}$/';						// μόνο  αριθμητική χαρακτηρες που ο 1ος είναι διάφορος του 0 και μήκος μέχρι 3
	$patternPostCode = 	'/^[1][8][0-9]{3}$/';						// μόνο  αριθμητική χαρακτηρες που ο 1ος και 2ος ειναι 18 και μήκος 5
	$patternDesc =		'/^[\x{0386}-\x{03CE}\s\.\,\;\']{10,}+$/u';	// μόνο  ελληνική χαρακτήρες με μήκος τουλάχιστον 10


	
					
	function test_input($data) {
    $data = trim($data);			// διαγραφή whitespace χαρακτήρων
    $data = stripslashes($data);	// αφαιρεί τα slashes
    $data = htmlspecialchars($data);// αφαιρεί τα HTML tags
    return $data;
	}
	  
	  switch($_SERVER['REQUEST_METHOD'])
	  {
		   case "GET" :
		   {
			   $cnt = count($_GET);  break;
		   }
	  
		   case "POST" :
		   {
			   $cnt = count($_POST); break;
		   }
		   default:
			   $cnt = -1;
	  }
	  
	  if($validMethod != $_SERVER['REQUEST_METHOD'])
	  {
		  $errMsg = "Λάθος στην μέθοδο της αίτησης.";           
		  return false;
	  }
	  
	  if($cnt != count($validTags))
	  {
		  echo $cnt;
		  $errMsg = "Λάθος στο πλήθος των παραμέτρων της αίτησης.";
		  return false;
	  }
	  
	   foreach($validTags as  $key => $value)   
	   {
		  if(isset($_REQUEST[$key]))
		  {
			 global ${$key};  
			 ${$key} = $_REQUEST[$key];
			 
			 switch($value) 
			 {
			   case "xname" :
			   {
				   
				   $_xname = filter_var(${$key}, FILTER_SANITIZE_STRING);
				   if(!filter_var($_xname) || !preg_match($patternChar, $_xname) ){    
						$error=1;
						return false; 
				   }

				   break;
			   }//end xname
			   case "xsurname" :
			   {
				   $_xsurname = filter_var(${$key}, FILTER_SANITIZE_STRING);
				   if(!filter_var($_xsurname) || !preg_match($patternChar, $_xsurname) ){
					   $error=2;
					   return false; 
				   }
				   break;
			   }//end xsurname
			   case "xemail" :
			   {
				   $_xemail = filter_var(${$key}, FILTER_SANITIZE_STRING);
				   if(!filter_var($_xemail) ||  !filter_var(($_xemail), FILTER_VALIDATE_EMAIL) ){
					   $error=3;
					   return false; 
				   }
				   break;
			   }//end xemail
			   case "xphoneNumber" :
			   {

				   
				   $_xphoneNumber = filter_var(${$key}, FILTER_SANITIZE_STRING);			   
				   if(!filter_var($_xphoneNumber) || !preg_match($patternNumb, $_xphoneNumber) ){
					   $error=4;
					   return false; 
				   }
				   break;
			   }//end xphoneNumber
			   case "xaddress" :
			   {
				  
				   $_xaddress = filter_var(${$key}, FILTER_SANITIZE_STRING);			   
				   if(!filter_var($_xaddress) || !preg_match($patternChar, $_xaddress) ){
					   $error=5;
					   return false; 
				   }
				   break;
			   }//end xaddress
			   case "xaddressNumber" :
			   {
				   $_xaddressNumber = filter_var(${$key}, FILTER_SANITIZE_STRING);
				   if(!filter_var($_xaddressNumber) || !preg_match($patternAddrNumb, $_xaddressNumber) ){
					   $error=6;
					   return false; 
				   }
				   break;
			   }//end xaddressNumber
			   case "xpostCode" :
			   {
				   $_xpostCode = filter_var(${$key}, FILTER_SANITIZE_STRING);			   
				   if(!filter_var($_xpostCode) || !preg_match($patternPostCode, $_xpostCode) ){
					   $error=7;
					   return false; 
				   }
				   break;
			   }//end xpostCode
			   case "xdescription" : 
			   {
				   $_xdescription = filter_var(${$key}, FILTER_SANITIZE_STRING);			   
				   if(!filter_var($_xdescription) || !preg_match($patternDesc, $_xdescription) ){
					   $error=8;
					   return false; 
				   }
				   break;
			   }//end xdescription		   
			 }//end swicth
		  }//end if
		  
		  else
		  {
			 $errMsg = "Το πεδίο δεν είναι αποδεκτό.";           
			 return false; 
		  }
	   }
	   return true;
	}

	if(!isValidRequest())
	{
		// αν υπάρξει καποιο λαθος κατα την εισαγωγη δεδομένων
		// δημιουργειται ένα session['error'] με τιμη ιση με το αντιστοιχο 
		// κωδικό λάθους
		echo $errMsg;
		session_start();
		if(!isset($_SESSION['error'])){
			$_SESSION['error'] = $error;		
			// ανακατεύθυνση στη σελιδα error.php οπου εμφανίζεται το αντίστοιχο λάθος
			header('location: error.php');
			die();
		}

	}
	else
	{
			// σύνδεση με βάση δεδομένων
			$dbcon = mysql_connect("127.0.0.1:3306","piradmin","1234");
			if (!$dbcon)
			{
			die('No db connection: ' . mysql_error());
			}

			mysql_select_db("pirdb",$dbcon);//επιλογη της βάση pirdb
			mysql_query("SET NAMES 'utf8'");
			mysql_query("SET CHARACTER SET 'utf8'");
			
			// η προστασία απο sql injection γινετε με χρηση της stored procedures isValidForm
			
			mysql_query("SET @uname = " . "'" . mysql_real_escape_string($name) . "'");
			mysql_query("SET @usurname = " . "'" . mysql_real_escape_string($surname) . "'");			
			mysql_query("SET @uemail = " . "'" . mysql_real_escape_string($email) . "'");			
			mysql_query("SET @uphoneNumber = " . "'" . mysql_real_escape_string($phoneNumber) . "'");			
			mysql_query("SET @uaddress = " . "'" . mysql_real_escape_string($address) . "'");			
			mysql_query("SET @uaddressNumber = " . "'" . mysql_real_escape_string($addressNumber) . "'");			
			mysql_query("SET @upostCode = " . "'" . mysql_real_escape_string($postCode) . "'");	
			mysql_query("SET @udescription = " . "'" . mysql_real_escape_string($description) . "'");			

			$result = mysql_query("CALL isValidForm(@uname,@usurname,@uemail,@uphoneNumber,@uaddress,@uaddressNumber,@upostCode,@udescription);");
			
			if (!$result)
			{
				die('No db connection : ' . mysql_error());
			}
			//$dbcon->close();
			mysql_close($dbcon);
			echo "Καταχώρηση Επιτυχής";
			header('Refresh: 3;url=piraeus.php');
			
	}	
}

else 
{
	echo "Not a valid captcha";
} 

?>
</body>
</html>