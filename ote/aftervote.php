<?php
session_start();
$user="root";$password="";$database="ote";
$conn = mysql_connect("localhost",$user,$password,$database);
if(!$conn){die("connection failed:". mysql_error());}
if(!mysql_select_db("ote")){die("Can't select database." . mysql_error());}
$id = $_SESSION['userid'];
$score[1] = $_POST['score1'];
$score[2] = $_POST['score2'];
$score[3] = $_POST['score3'];
$score[4] = $_POST['score4'];
$sql = "select cID from candidates";
$que=mysql_query($sql);
$i = 1;
while($ro = mysql_fetch_array($que))
{
$sql = "INSERT INTO votedata(vID,cID,Score) VALUES('$id','$ro[0]','$score[$i]')";
$query=mysql_query($sql);
$i++;
if($query)
{
	$new_query = "update voters set allowance='1' where vID = '$id'";
	$update=mysql_query($new_query);
	if($update)
		header("location: pg4 done.html");
}
}
?>