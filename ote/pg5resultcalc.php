<?php
session_start();
$user="root";$password="";$database="ote";
$conn = mysql_connect("localhost",$user,$password,$database);
if(!$conn)
{
	die("connection failed:". mysql_error());
}
if(!mysql_select_db("ote")){
	die("Can't select database." . mysql_error());
}
$candis="SELECT cID FROM `candidates`";
$candque=mysql_query($candis);
while($row = mysql_fetch_array($candque))
{
	$sum = 0;
	$sumquery = "SELECT Score FROM `votedata` WHERE cID='$row[0]'";
	$scoreexec = mysql_query($sumquery);
	while($scorerow = mysql_fetch_array($scoreexec))
	{
		$sum = $sum + $scorerow[0];
	}
	$insertquery = "UPDATE candidates SET Score=$sum WHERE cID='$row[0]'";
	$execinsertquery = mysql_query($insertquery);
}
header("location:pg5 result.php");
?>