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
    opacity: 0.75;
	font-size:80%	
	}   
	</style>
	
	</head>
<body>
	<div style="background-color:#F1F6F8; border-radius: 20px; box-shadow: 10px 10px 5px #797D92; padding: 5px 5px 20px 5px; width: 900px; margin-left: auto; margin-right: auto; text-align: left; ">


		<form name="loginform" id="loginform" method="post" action="confirm.php">
			<table border=1 >
				<tr><h1>Δήμος Πειραιά</h1></tr>		
				<tr>
						<td>Όνομα: </td>
						<td><input type="text" name="name" value=""  style="width: 175px;"/></td>						
						<td>Επώνυμο: </td>
						<td><input type="text" name="surname" value=""  style="width: 175px;"/></td>
				</tr>								
				<tr>
						<td>Email: </td>
						<td><input type="email" name="email" value=""  style="width: 175px;"/></td>						
						<td>Κινητό: </td>
						<td><input type="text" name="phoneNumber" value=""  style="width: 175px;"/></td>
				</tr>		
			</table>
			<br>
			<table border=1 >
				<tr><h2>Πληροφορίες για το περιστατικό</h2></tr>	
				<tr>
						<td>Διεύθυνση: </td>
						<td><input type="text" name="address" value=""  style="width: 175px;"/></td>					
						<td>Αριθμός: </td>
						<td><input type="text" name="addressNumber" value=""  style="width: 175px;"/></td>							
						<td>TK: </td>
						<td><input type="text" name="postCode" value=""  style="width: 175px;"/></td>
				</tr>						
				<tr>
						<td colspan="6"><textarea style="overflow:auto;resize:none" rows="6" cols="100" name="description" placeholder="Πληκτρολογήστε εδώ πληροφορίες...."></textarea></td>	
			
				</tr>				
			</table>
			<br>
					    <div class="g-recaptcha" data-sitekey="6LfGIhMTAAAAAHAWJCXKWBLzsYyNb21F6SOPD1_S"></div>
						<input type="submit" value="Αποθήκευση">
						</form>		
			         
					 <div class="a">
                <br>* Όλα τα πεδία πρέπει να συμπληρωθούν υποχρεωτικά στην ελληνική γλώσσα<br> 
					<div>    
	</div>			
</body>
</html>
			