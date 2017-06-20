<html>
<head>
<title>Results</title>
<style type="text/css">
#grad {
  background: radial-gradient(#FF9900, #FF9933, #FF9966, #FF9999, #FF99CC, #FF99FF); 
}</style>
</head>
<body><div id="grad"><center>
<font size="150%" face="forte"><u>OtE</u></font><br><br><br><br><br><b>
<table border="1" height="50%" width="50%">
<thead>
<tr>
<th><font face="forte" size="4">Position</font></th>
<th><font face="forte" size="4">Candidate Name</font></th>
<th><font face="forte" size="4">Score</font></th>
</tr>
</thead>
<tbody>
<?php
$user="root";$password="";$database="ote";
$conn = mysql_connect("localhost",$user,$password,$database);
if(!$conn){die("connection failed:". mysql_error());}
if(!mysql_select_db("ote")){die("Can't select database." . mysql_error());}
$query = "select * from candidates ORDER BY Score DESC";
$exec = mysql_query($query);
$i = 1;
while($row = mysql_fetch_array($exec))
{
echo "<tr><td align='center'><font size='4' face='forte'>" . $i . "</font></td><td align='center'><font size='4' face='forte'>" . $row[1] . "</font></td><td align='center'><font size='4' face='forte'>" . $row[2] . "</font></td></tr>";
$i++;
}
?>
</tbody>
</table><br><br><br>
<a href="pg6 piechart.php">View Pie Chart</a>
<br><br><br>
<a href="pg0.html">Exit</a>
<br><br><br><br><br><br><br><br></b>
</center></div></body>
</html>