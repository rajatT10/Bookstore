<?php
$id_email=$_POST['id_email'];
include("connection.php");
$read="select * from users where email='$id_email'";
$get=mysqli_query($link,$read);
if(mysqli_num_rows($get)>0)
{
   echo "no";	
}
else
{
   echo "yes";	
}
?>