<?php
$user="root";$password="";$database="ote";
$conn = mysql_connect("localhost",$user,$password,$database);
if(!$conn){die("connection failed:". mysql_error());}
if(!mysql_select_db("ote")){die("Can't select database." . mysql_error());}
$quer = "select vID from voters";
$query=mysql_query($quer);
if($query)
$no_of_voters = mysql_num_rows($query);
$quer1 = "select vID from voters where allowance = '1' ";
$query1=mysql_query($quer1);
if($query1)
$no_of_all = mysql_num_rows($query1);
if($no_of_voters == $no_of_all)
header("location: pg5resultlogin.html");
else
	header("location: pg1 login.html");
?>