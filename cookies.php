// for cookie
			if(isset($checkbox))
			{
				setcookie("email",$id_pass,time()+3600);
				setcookie("pass",$pa,time()+3600);				
			}
            
            
            //script
            <script>
function cook()
{
	if("<?php echo $_COOKIE['email'];?>"!=null)
	{
	   if(document.form1.id.value=="<?php echo $_COOKIE['email'];?>")
	   {
		 document.form1.pass.value="<?php echo $_COOKIE['pass'];?>" ; 
	   }
	   else
	   {
		   document.form1.pass.value="";
	   }

	}
}
</script>