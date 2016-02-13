<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<link href="stylesheets/col.css" rel="stylesheet" type="text/css" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="icon" href="pharmacy2.png" type="image/x-icon" />
		<title>MEDICAL</title>	
	<style>
	div.a 
	{
    opacity: 0.6;
	font-size:70%	
	}   
	</style>
    <script>
    function validateForm()
    {
    
        var e = document.forms["loginform"]["email"].value;
        if ( e== null || e == "") {
        alert("Δεν συμπληρωσατε το πεδίο email");
        return false;
        }
        var f = document.forms["loginform"]["pass"].value;
        if (f == null || f == "") {
        alert("Δεν συμπληρωσατε το πεδίο κωδικός");
        return false; 
        }
    }
</script> 	
	
	</head>
<body>
	<div style="background-color:#C1D9D0; border-radius: 20px; box-shadow: 10px 10px 5px #797D92; padding: 5px 5px 20px 5px; width: 350px; margin-left: auto; margin-right: auto; text-align: left; ">
	<h1 style="color: #2B8890; font-family:Comic Sans MS; text-shadow: 1.5px 1.5px 1.5px #3EBAC6;" > <center>MEDICAL</center></h1>
	<center>
	<img src="images/pharmacy2.png" alt="Mountain View" style="width:125px;height:146px;">
	</center>
			<form name="loginform" id="loginform" method="post" action="loginconfirm.php" onsubmit="return validateForm()">
				Email <br><input type="email" name="email" id="email" maxlength="30" size="45"/><br>
				Password <br><input type="password" name="pass" id="pass" maxlength="8" size="45"/><br><br>
				<center>
				<button name="submit" style="width:90px;height:30px; box-shadow: 3px 3px 3px #888888;" type="submit" value="">Log-In</button> 
				</center>
			</form>			
	</div>			
</body>
</html>
			