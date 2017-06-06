<?php
include("connection.php");
session_start();
$sid=$_SESSION['sid'];
-$mm_id=$_GET['m_d'];
if($sid=="")
{ 
header("location:signin.php");
}
else
{
mysqli_query($link,"delete from inbox where mail_id='$mm_id'");
header("location:mails.php");
	}
?>