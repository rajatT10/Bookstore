<?php
error_reporting(0);
include("connection.php");
session_start();
$sid=$_SESSION['sid'];
include("nav.php");
	extract($_POST);
	$m_id=uniqid();
	$product_id=$_GET['pid'];
	mysqli_query($link,"update ads set views=views+1 where pro_id='$product_id'");
	
	$arr=mysqli_fetch_array(mysqli_query($link,"select * from ads where pro_id='$product_id'"));
	extract($arr);
	
	$arr2=mysqli_fetch_array(mysqli_query($link,"select * from users where email='$user_id'"));
	extract($arr2);
	
	 if(isset($send)&&(!empty ($message)))
	 {
		if($email==$user_id)
		{
			if(mysqli_query($link,"insert into inbox values('$m_id','$sid','$user_id','$message','$date')")) 
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
?>
<html>
<head>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<link rel="stylesheet" href="css/style.css" type="text/css" />
<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>
<br>
<br>
<h2 class="text-center">Product Details</h2>
<hr>
<div class="container">
  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
    <?php include("attach_slider.php");?>
  </div>
  <div class="col-lg-8 col-md-8 col-sm-6 col-xs-6">
    <div> 
      <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#about" aria-controls="about" role="tab" data-toggle="tab">About</a></li>
        <li role="presentation"><a href="#seller" aria-controls="seller" role="tab" data-toggle="tab">Seller Details</a></li>
        <li role="presentation"><a href="#product" aria-controls="product" role="tab" data-toggle="tab">Product Details</a></li>
        <li role="presentation"><a href="#description" aria-controls="description" role="tab" data-toggle="tab">Description</a></li>
        <li role="presentation"><a href="#mail" aria-controls="mail" role="tab" data-toggle="tab">Send Mail</a></li>
      </ul>
      <!-- Tab panes -->
      <div class="tab-content" style="margin-left:25px;">
        <div role="tabpanel" class="tab-pane active" id="about"></br>
          <span class="label label-default">Title:</span><b>
          <h1><?php echo $title;?></h1>
          </b></br>
          <span class="label label-default">Author:</span>
          <h4><?php echo $author;?></h4>
        </div>
        <div role="tabpanel" class="tab-pane" id="seller">
          <h3><?php echo $fname." ".$lname;?></h3>
          </br>
          <span class="glyphicon glyphicon-earphone"><?php echo $contact;?></span></div>
        <div role="tabpanel" class="tab-pane" id="product"></br>
          <b><span class="label label-default">Product Id:</span></b>
          <h3><b><?php echo $pro_id;?></b></h3>
          </br>
          <b><span class="label label-default">Rs.</span></b><?php echo $price;?></br>
          <b><span class="label label-default">Category:</span></b><?php echo $category;?></br>
          <b><span class="label label-default">Condition:</span></b><?php echo $condition;?></div>
        <div role="tabpanel" class="tab-pane" id="description"></br>
          <h4><?php echo $description;?></h4>
        </div>
        <div  role="tabpanel" class="col-sm-12 panel-body tab-pane" id="mail">
          <p></span></p>
          <form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data" name="form1">
            <div class="panel-heading col-sm-9">
              <div class="form-group">
                <div class="col-sm-12">
                  <textarea type="text" class="form-control" id="message" placeholder="Send your query" name="message" autofocus ></textarea>
                </div>
              </div>
            </div>
            <div class="panel-heading col-sm-3" align="center">
              <?php if($sid!=""){?>
              <input type="submit" class="btn btn-success" id="send" name="send" value="Send Mail">
              <?php } else {?>
              <h2 class="text-center" align="center"> 
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Post Ads</button>
                <!-- Modal -->
                <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-alert"></span>You must Signin first.<a href="index#signin" class="alert-link"><h5><i>Click Here</i></h5></a> </div>
                </div>
              </h2>
              <?php }?>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<hr>
<h2 class="text-center">Suggested Ads</h2>
<hr>
<div class="col-md-12">
  <?php include("suggested.php"); ?>
</div>
<div class="col-md-12">
  <?php include("footer.php"); ?>
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
</body>
</html>