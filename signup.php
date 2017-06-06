<?php
error_reporting(0);
include("connection.php");
include("nav.php");
extract($_POST);
if(isset($signup))
{
	if($id_pass==$id_con_pass)
	{
         $id_first_name=mysqli_real_escape_string($link,htmlentities(trim($id_first_name)));
	     $id_last_name=mysqli_real_escape_string($link,htmlentities(trim($id_last_name)));
		 $id_email=mysqli_real_escape_string($link,htmlentities(trim($id_email)));
		 $id_pass=md5(mysqli_real_escape_string($link,htmlentities(trim($id_pass))));
         if(mysqli_query($link,"insert into users values('$id_first_name','$id_last_name','$id_email','$id_pass','$id_phone')"))
	        {   
			    echo '<script>alert("Congratulations! You are successfully registered");</script>';
			    header("location:index.php");
		     }
		    else
		      {
		       $msg="Error! Enter the correct details.";	
		      }
	}
	      else
	         {
	           $msg="Re-type Correct Password";	
	         }
}
?>
<html>
<head>
<script language="javascript">
$(document).ready(function()
{
	$("#id_email").blur(function()
	{
		$("#msgbox").removeClass().addClass('messagebox').text('Checking...').fadeIn("slow");
	
		$.post("user_availability.php",{id_email:$(this).val() } ,function(data)
        {
			//$("#msgbox").html(data);
		 if(data=='no') //if username not avaiable
		  {
		  	$("#msgbox").fadeTo(200,0.1,function() //start fading the messagebox
			{ 
			  //add message and change the class of the box and start fading
			  $(this).html('<font color="red">User with this name already exists.</font>').addClass('messageboxerror').fadeTo(900,1);
			});		
          }
		  else if(data=='okay') //if username not avaiable
		  {
		  	$("#msgbox").fadeTo(200,0.1,function() //start fading the messagebox
			{ 
			  //add message and change the class of the box and start fading
			  $(this).html('<font color="red">This field cant be empty</font>').addClass('messageboxerror').fadeTo(900,1);
			});		
          }
		  
		  
		  else
		  {
		  	$("#msgbox").fadeTo(200,0.1,function()  //start fading the messagebox
			{ 
			  //add message and change the class of the box and start fading
			  $(this).html('<font color="green">Username Available... </font>').addClass('messageboxok').fadeTo(900,1);	
			});
		  }
				
        });
 
	});
});
</script>
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
    <SCRIPT language="JavaScript">
<!--
pic1 = new Image(16, 16); 
pic1.src="images/icon_tick.gif";

pic2 = new Image(16, 16); 
pic2.src="images/icon_error.gif";
//-->
</SCRIPT>
    <SCRIPT LANGUAGE="JavaScript">
<!--
function checkField(field)
{
var okay = '<img src="img/icon_tick.gif" align="absmiddle">';

var icon_error = '<img src="img/icon_error.gif" align="absmiddle">';

// NAME
	
if(field.id == 'id_first_name')
{
	var name_exp=/^[a-zA-Z]{2,20}$/;
	if((field.value.length <2) || (field.value.length == 0))
	{
	var str = icon_error + '&nbsp;<font color="red">Error! The name should have at least 2 characters.</font>';
	}
	else if(!name_exp.test(field.value))
	{
		var str = icon_error + '&nbsp;<font color="red">Error! only alphabates allowed.</font>';
	}
	else
	{
	var str = okay + '&nbsp;<font color="green">Right</font>';
	}
}
if(field.id == 'id_last_name')
{
	var name_exp=/^[a-zA-Z]{2,20}$/;
	if((field.value.length <2) || (field.value.length == 0))
	{
	var str = icon_error + '&nbsp;<font color="red">Error! The name should have at least 2 characters.</font>';
	}
	else if(!name_exp.test(field.value))
	{
		var str = icon_error + '&nbsp;<font color="red">Error! only alphabates allowed.</font>';
	}
	else
	{
	var str = okay;
	}
}
    
// E-MAIL

if(field.id == 'id_email')
{
// http://javascript.about.com/library/blre.htm

emailRe = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*\.(\w{2,10})$/

	if (!emailRe.test(field.value))
	{
	var str = icon_error + '&nbsp;<font color="red">Error! You should enter a valid e-mail address.</font>';
	}
	else
	{
	var str = okay;
	}
}

// Phone

if(field.id == 'id_phone')
{
	if(field.value.length < 10)
	{
	var str = icon_error + '&nbsp;<font color="red">Enter 10 digit Contact No.</font>';
	}
	else
	{
	var str = okay;
	}
}
//Password
if(field.id == 'id_pass')
{
	if(field.value.length< 6)
	{ var str=icon_error+'&nbsp;<font color="red">Enter atleast 6 digit password</font>';
		}
		else { var str=okay;}
}
//Confirm Password
if(field.id == 'id_con_pass')
{
	if((document.getElementById('id_con_pass').value!=document.getElementById('id_pass').value)||(document.getElementById('id_con_pass').value==''))
	{ var str=icon_error+'&nbsp;<font color="red">Re-type correct password..</font>';
		}
		else { var str=okay;}
}

document.getElementById(field.id + "_status").innerHTML = str;

return false;
}
//-->
</SCRIPT>
<body>
<br>
<br>
<div class="col-md-12">
<h2 class="text-center" style="color:#12135C;">Registration</h2>
<div class="row text-center">
  <div class="col-md-12">
    <div class="container col-md-10" style="margin-left:100px; margin-right:100px;">
      <div class="panel panel-info dialog-panel">
        <div class="panel-heading">
           <h4><font color="#AB2022"><i><?php echo $msg;?></i></font></h4>
        </div>
        <div class="panel-body">
          <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" name="form" id="form">
            <!--First Name fieild-->
            <div class="form-group">
              <label class="control-label col-md-2 col-md-offset-2" for="id_title">Name</label>
              <div class="col-md-6">
                <div class="col-md-6">
                  <div class="form-group internal">
                    <input class="form-control" id="id_first_name" required name="id_first_name" placeholder="First Name" type="text" onBlur="checkField(document.form.id_first_name);">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group internal">
                    <input class="form-control" required id="id_last_name" name="id_last_name" placeholder="Last Name" type="text" onBlur="checkField(document.form.id_last_name);">
                  </div>
                </div>
              </div>
              <div class="col-md-2" id="id_last_name_status" ></div>
            </div>
            <!-- Email fieild-->
            <div class="form-group">
              <label class="control-label col-md-2 col-md-offset-2" for="id_email">Email Id</label>
              <div class="col-md-6">
                <div class="col-md-12">
                  <input class="form-control" required id="id_email" name="id_email" placeholder="E-mail" type="email" onBlur="checkField(document.form.id_email);">
                  <span id="msgbox" style="display:none"></span> </div>
              </div>
              <div class="col-md-2" id="id_email_status"></div>
            </div>
            <!--Password fieild-->
            <div class="form-group">
              <label class="control-label col-md-2 col-md-offset-2" for="id_email">Password</label>
              <div class="col-md-6">
                <div class="col-md-12" >
                  <input class="form-control" required id="id_pass" name="id_pass" placeholder="Password" type="password" onBlur="checkField(document.form.id_pass);">
                </div>
              </div>
              <div class="col-md-2" id="id_pass_status" ></div>
            </div>
            <!--Re-type Password fieild-->
            <div class="form-group">
              <label class="control-label col-md-2 col-md-offset-2" for="id_email">Re-type Password</label>
              <div class="col-md-6">
                <div class="col-md-12">
                  <input class="form-control" required id="id_con_pass" name="id_con_pass" placeholder="Re-type Password" type="password" onBlur="checkField(document.form.id_con_pass);">
                </div>
              </div>
              <div class="col-md-2" id="id_con_pass_status"></div>
            </div>
            <!--Phone fieild-->
            <div class="form-group">
              <label class="control-label col-md-2 col-md-offset-2" for="id_phone">Phone</label>
              <div class="col-md-6">
                <div class="col-md-12">
                  <input class="form-control" required id="id_phone" name="id_phone" placeholder="Phone Number" type="text" onBlur="checkField(document.form.id_phone);">
                </div>
              </div>
              <div class="col-md-2" id="id_phone_status"></div>
            </div>
            <div class="col-md-8"><div class="col-md-6"></div>
            <div class="form-group">
              <div class=" col-md-2">
                <button class="btn btn-primary" type="submit" id="signup" name="signup">Register</button>
              </div>
            </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 

<script src="http://code.jquery.com/jquery-1.7.1.min.js" type="text/javascript" language="javascript"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.min.js"></script>

<div class="col-md-12">
    <?php include("footer.php"); ?>
</div>
</body>
</html>