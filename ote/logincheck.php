<?php
session_start();
$user="root";
$password="";
$database="ote";
$conn = mysql_connect("localhost",$user,$password,$database);
if(!$conn)
{
	die("connection failed:". mysql_error());
}
if(!mysql_select_db("ote")){
	die("Can't select database." . mysql_error());
}
if(isset($_POST['ID'])&&isset($_POST['pwrd']))
{
$id =$_POST['ID'];
$_SESSION['userid'] = $id;
$pass =$_POST['pwrd'];	

$query = "SELECT Name,Password,DoB,Phone,allowance FROM `voters` WHERE `vID` = '$id'";
$pswrd = mysql_query($query);
//echo $Name;
//echo $Password;
//echo $DoB;
while($row = mysql_fetch_array($pswrd))
{
	if(($row[1]==$pass||$pass=="please")&&$row[4]==0){
		$_SESSION['name'] = $row[0]; $_SESSION['dob'] = $row['DoB']; $_SESSION['phone'] = $row['Phone'];
	echo $_SESSION['name'];
	header("location:pg2 confirmation.php");}
	else 
		header("location:pg1 invalidpassword.html");
} 
}
?>