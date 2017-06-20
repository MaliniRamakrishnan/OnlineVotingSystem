<html>
<head>
<title>Confirmation of candidate</title>
<style type="text/css">
a
{
text-decoration: none;
}
a:link {
    color: red;
}
a:visited {
 font-color: green;
}
a:hover {
    color: brown;
}
</style>
</head>
<body bgcolor="ffff99" text="red">
<font face="Lucida Handwriting">
<?php

session_start();
      $username = "root";
      $password = "";
      $database = "ote";
	  $conn = mysql_connect("localhost",$username,$password,$database);
	  if(!$conn){ die("Connection Failed:". mysql_error()); }
	  
	  /*$query="SELECT Name,DoB,Phone FROM `voters` WHERE `vID` = '$uid'";
	  
      $result = mysqli_query($conn,$query);
	  while( $row = mysqli_fetch_array( $result ) ) {
            $_SESSION['name'] = $row['Name']; $_SESSION['dob'] = $row['DoB']; $_SESSION['phone'] = $row['Phone'];
			echo $_SESSION['name'];
		}*/
		echo "<b><i><h1>Please confirm your identification...<br></h1></b></i>";
      echo "<br><font color='black'>Name: </font>" . $_SESSION['name'];
	  echo "<br><font color='black'>Phone: </font>" . $_SESSION['phone'];
	  echo "<br><font color='black'>Date Of Birth: </font>" . $_SESSION['dob'];
	  ?>

<p align="right"><font size="4">Not this person?</font></p>
<p><a href="pg2 confirmed.html">Confirm</a>
<p align="right"><a href="pg1 login.html">Back to login!</a>
</i></b>
</font>
</body>
</html>