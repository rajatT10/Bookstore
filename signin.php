<?php
include("connection.php");
error_reporting(0);
extract($_POST);
if(isset($login))
{
	if(!empty($id_email) && !empty($id_pass))
	{
		$pa=$id_pass;
		$id_pass=md5($id_pass);
		$sel=mysqli_query($link,"select email,pass from users where email='$id_email'");
		$arr=mysqli_fetch_array($sel);
		if($id_email==$arr['email'] && $id_pass==$arr['pass'])
		{
			session_start();
			$_SESSION['sid']=$arr['email'];
			// for cookie
			if(isset($checkbox))
			{
				setcookie("email",$id_email,time()+3600);
				setcookie("pass",$pa,time()+3600);				
			}
			header("location:index.php");
		}
		else
		{
			echo "<script>alert('Please fill correct email and password'); window.history.go(-1);</script>";
		}
	}
	else
	{
		echo "<script>alert('Please fill blank fields'); window.history.go(-1);</script>";
	}
}
?>
<head>
<script language="javascript" type="text/javascript">
    function signup()
	{
		window.location="signup.php";
	}
    function cook()
    {
	if("<?php echo $_COOKIE['email'];?>"!=null)
	{
	   if(document.form1.id_email.value=="<?php echo $_COOKIE['email'];?>")
	   {
		 document.form1.id_pass.value="<?php echo $_COOKIE['pass'];?>" ; 
	   }
	   else
	   {
		   document.form1.id_pass.value="";
	   }

	   }
    }
    </script>
</head>