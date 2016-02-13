<?php
require_once('config.php');
// δημιουργία αντικειμένου της κλασης configuration
// η οποία βρίσκεται στο αρχέιο config.php
$item = new configuration;
// Σύνδεση με βάση δεδομένων
$dbcon = mysql_connect($item->getserver(), $item->getusername(), $item->getpassword());
$page_rows=$item->getitemnumber();
if (!$dbcon)
{
die('No db connection: ' . mysql_error());
}

mysql_select_db("medical",$dbcon);
mysql_query("SET NAMES 'utf8'");
mysql_query("SET CHARACTER SET 'utf8'");
//καθε φορα που γινετε συνδεση με τη βαση ξεκινα το session
session_start();
?>