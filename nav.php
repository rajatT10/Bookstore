<?php
$sid=$_SESSION['sid'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--[if lt IE 7]><html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7]><html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8]><html lang="en" class="no-js ie8"><![endif]-->
<!--[if gt IE 8]><!-->
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>MyBookStore</title>
<link rel="shortcut icon" href="favicon.ico">
<!-- Bootstrap -->
<link href="css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" href="css/styles.css" title="mainStyle">
<link href="rs-plugin/css/settings.css" rel="stylesheet" type="text/css">
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-1.11.2.min.js"></script>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<!--Start Pace loader -->
<script type="text/javascript" src="js/pace.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/pace3.css"/>
<!--End Pace Loader -->
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
<div class="container"> 
  <!-- Brand and toggle get grouped for better mobile display -->
  <div id="navbar" >
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background-color: #D05052;">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <a href="index.php"><img src="img/1.png" class="navbar-brand" href="index.php" width="200"></a> </div>
      <div class="collapse navbar-collapse" id="navbar-collapse-1">
        <ul class="nav navbar-nav">
        <?php if($sid==""){
			?>
          <li><a href="index.php"> <span class="glyphicon glyphicon-home"> </span></a></li>
          <?php }else {$no_of_mails=mysqli_num_rows(mysqli_query($link,"select * from inbox where too='$sid'"));?>
          <li><a href="mails.php"><span class="glyphicon glyphicon-envelope"></span><span class="badge"><?php echo ("$no_of_mails"); ?></span></a></li>
		  <?php }?>
          <li><a href="aboutus.php">About Us</a></li>
          <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Academics <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li class="kopie"><a href="#">CBSE</a></li>
              <li><a href="#">ICSE</a></li>
              <li><a href="#">12th</a></li>
              <li><a href="#">11th</a></li>
              <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">NCERT</a>
                <ul class="dropdown-menu">
                  <li class="kopie"><a href="#">10th</a></li>
                  <li><a href="#">9th</a></li>
                  <li><a href="#">8th</a></li>
                  <li><a href="#">7th</a></li>
                  <li><a href="#">6th</a></li>
                  <li><a href="#">less than 5th</a></li>
                </ul>
              </li>
              <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Entertainment</a>
                <ul class="dropdown-menu">
                  <li class="kopie"><a href="#">Action/Adventure</a></li>
                  <li><a href="#">Romantic</a></li>
                  <li><a href="#">Religious</a></li>
                  <li><a href="#">Comedy</a></li>
                  <li><a href="#">Magazines</a></li>
                  <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">References</a>
                    <ul class="dropdown-menu">
                      <li class="kopie"><a href="#">Law</a></li>
                      <li><a href="#">Society/Social Science</a></li>
                      <li><a href="#">Technology</a></li>
                      <li><a href="#">Politics</a></li>
                      <li><a href="#">History</a></li>
                    </ul>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Competitive <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li class="kopie"><a href="#">Civil Services</a></li>
              <li><a href="#">JEE MAINS/ADVANCED</a></li>
              <li><a href="#">UPSC</a></li>
              <li><a href="#">SSC</a></li>
              <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Defence Services</a>
                <ul class="dropdown-menu">
                  <li class="kopie"><a href="#">NDA/NA</a></li>
                  <li><a href="#">CDS</a></li>
                  <li><a href="#">AirForce/AFCAT</a></li>
                  <li><a href="#">Indian Army</a></li>
                  <li><a href="#">Indian Navy</a></li>
                </ul>
              </li>
              <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Engineering</a>
                <ul class="dropdown-menu">
                  <li class="kopie"><a href="#">GATE</a></li>
                  <li><a href="#">CAT</a></li>
                  <li><a href="#">GRE</a></li>
                  <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Govt. Vacancy</a>
                    <ul class="dropdown-menu">
                      <li class="kopie"><a href="#">SSC</a></li>
                      <li><a href="#">PSU</a></li>
                      <li><a href="#">Others</a></li>
                    </ul>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
        </ul>
        <form class="navbar-form navbar-right" role="search">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
          </div>
          <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
        </form>
        <?php if(($sid=="")&&($_SERVER['REQUEST_URI']!="/rajat/Online_BookStore/signup.php")){?>
        <div class="collapse navbar-collapse navbar-right" id="navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a href="signup.php">Sign Up</a></li>
            <li><a href="#signin">Sign In</a></li>
          </ul>
        </div>
        <?php } else if($_SERVER['REQUEST_URI']=="/rajat/Online_BookStore/signup.php") {?>
        <div class="collapse navbar-collapse navbar-right" id="navbar-collapse-1">
          <ul class="nav navbar-nav">
          <li class="active"><a href="index">Sign In</a></li>
          </ul>
        </div>
        <?php } else{?>
        <li class="dropdown collapse navbar-collapse navbar-right" >Signed in as:<br>
           <span class=" glyphicon glyphicon-user"></span><a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $sid;?><b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li class="kopie"><a href="#">Edit Profile</a></li>
            <li><a href="#">Edit your ads</a></li>
            <li><a href="my_ads.php">My ads</a></li>
            <li class="active"><a href="logout.php">Logout</a></li>
          </ul>
        </li>
        <?php }?>
      </div>
      <!-- /.container-fluid --> 
    </nav>
  </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.min.js"></script> 
</script> 
</br>
</br>
</body>
</html>
