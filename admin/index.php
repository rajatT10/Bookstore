<?php
error_reporting(0);
include("connection.php");
extract($_POST);
if(isset($signin))
{
	$select=mysqli_query($link,"select * from admin where admin_id='$inputEmail'");
	$arr=mysqli_fetch_array($select);
	extract($arr);
	$inputPassword=md5($inputPassword);
	if(($inputEmail==$admin_id)&&($inputPassword==$admin_pass))
	{
		session_start();
		$_SESSION['admin']=$inputEmail;
		//For Cookies
		setcookie("email",$inputEmail,time()+3600);
		setcookie("pass",$inputPassword,time()+3600);
	    header("location:home.php");	
		}
		else{
			$msg=$admin_id;
			$msg="Please fill correct details";
			}
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../favicon.ico">

    <title>Admin Login</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/signin.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<script>
function cook()
    {
	if("<?php echo $_COOKIE['email'];?>"!=null)
	{
	   if(document.form1.inputEmail.value=="<?php echo $_COOKIE['email'];?>")
	   {
		 document.form1.inputPassword.value="<?php echo $_COOKIE['pass'];?>" ; 
	   }
	   else
	   {
		   document.form1.inputPassword.value="";
	   }

	   }
    }
    </script>
  </head>

  <body>

    <div class="container">

      <form class="form-signin" method="post" enctype="multipart/form-data">
        <h2 class="form-signin-heading">Please sign in</h2>
        <h4><?php echo $msg;?></h4>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required onChange="cook()">
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me" id="remember-me"> Remember me
          </label>
        </div>
        <input class="btn btn-lg btn-primary btn-block" type="submit" id="signin" name="signin" value="Signin">
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
