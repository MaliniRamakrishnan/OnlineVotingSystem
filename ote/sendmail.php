<?php
session_start();
require 'C:\xampp\htdocs\PHPMailer-master\PHPMailerAutoload.php';
$DB_HOST="localhost";
$DB_NAME="database name"; //SURYA
$DB_USER="root"; 
$DB_PASSWORD="";
$conn=mysql_connect($DB_HOST,$DB_USER,$DB_PASSWORD,$DB_NAME);
if (!$conn) {
    die("Connection failed: " . mysql_error());
} 
$con=mysql_connect($DB_HOST,$DB_USER,$DB_PASSWORD,$DB_NAME);
if (!$con) 
{
    die("Connection failed: " . mysql_error());
} 
if(!mysql_select_db("DBNAME"))//SURYA
{die("Can't select database." . mysql_error());}
$id=$_SESSION['userid'];//SURYA
$result="SELECT mailid,Name FROM `tablename` WHERE ID='$id'";//SURYA
$query= mysql_query($result);
	while($row = mysql_fetch_array($query))
	{
		$mail = new PHPMailer;
		$mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPDebug = 4;
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'sender@gmail.com';                 // SMTP username SURYA
        $mail->Password = 'senderpswd';                           // SMTP password SURYA
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;                                    // TCP port to connect to

        $mail->setFrom('sender@gmail.com', 'Subject'); //SURYA
        $mail->addAddress($row[0], $row[1]);     // Add a recipient  SURYA row[1] is name, row[0] is mail ID, see your db and change
        $mail->addReplyTo('sender mail', 'Sender username'); //SURYA

        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'subject'; //SURYA
        $mail->Body    = ''; //BODY SURYA
        $mail->AltBody = ''; //CHUMMA KUTTI BODY :D SURYA 
        if(!$mail->send()) 
		{
          echo 'Message could not be sent.';
		// <<OR>> header("TO WHICH PAGE AFTER FAILURE");  SURYA
        } 
        else 
		{
         echo "Message has been sent to " . $row[0] . ".Login to your mail and enter the password given. Click <a href='pg1 login.html'>here</a> to go back to Login page."; //CHUMMA DISPLAY PANI PATHUKO MAIL VARUDHA NU SURYA
        }
	}
if(!mysql_query($result))
{
 echo "Error: " . $result . "<br>" . mysql_error($con);
}

?>