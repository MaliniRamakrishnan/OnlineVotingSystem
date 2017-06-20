<?php
if($_POST['ruid']=="admin"&&$_POST['rpwd']=="admin")
	header("location: pg5resultcalc.php");
else
	echo "<h2>Invalid entries. Please click <a href='pg5resultlogin.html'>here</a> to re-enter login details and view results.</h2>";
?>