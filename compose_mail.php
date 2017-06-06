<?php
include("connection.php");
error_reporting(0);
session_start();
$date=date("d-m-y h-i-s a"); 
$sid=$_SESSION['sid'];
$pid2=$_GET['product_id'];
extract($_POST);
if(isset($send))
{
	//To get the details of the user_email of the user,posted the ad
$id_mail=uniqid();
$pro_owner=mysqli_query($link,"select user_id from ads where pro_id='$pid2' ");

//To get the detail of the ad poster
$reciver_id=mysqli_query($link,"select * from users where email='$pro_owner' ");

if($email==$user_id)
{
	if(mysqli_query($link,"insert into inbox values('$id_mail','$sid','$reciver_id','$message','$date')")) 
	{
        echo "<script> alert('Mail sent successfully.')</script>";	
		}
		else {
			echo "<script> alert('Mail not sent.')</script>";
			}
	}
else
{
	echo "<script> alert('User no more exist.')</script>";
	}
}
include("header.php");
?>
    <hr>
  </div>
  </div>
  </div>
  <div class="container col-sm-4">
  <ul class="nav nav-pills nav-stacked">
  <li role="presentation" class="active"><a href="mails.php">Inbox</a></li>
  <li role="presentation"><a href="#">Outbox</a></li>
  <li role="presentation"><a href="#">Draft</a></li>
</ul>
  </div>
  <div class="container col-sm-8">
  <div class="alert alert-info" align="center"><strong><span class="glyphicon glyphicon-pencil"><h4>Compose<?php echo $pid2;?></h4></span></strong></div>
  <form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data" name="form1">
<div class="form-group">
<label for="subject" class="col-sm-2 control-label">Message:</label>
<div class="col-sm-8">
<textarea type="text" class="form-control" id="message" placeholder="Type your message" name="message"></textarea>
</div>
</div>
<div class="form-group" align="center">
<input type="submit" name="send" id="send" value="Send" class="btn btn-success">
<input type="reset" name="reset" id="reset" value="Discard" class="btn btn-danger">
</div>
</form>
  </div>
</body>
</html>  