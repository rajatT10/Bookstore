<?php
include("connection.php");
session_start();
$sid=$_SESSION['sid'];
extract($_POST);
$sel=mysqli_query($link,"select * from inbox where too='$sid'");
include("nav.php");
?>
</br>
</br>
<div class="col-sm-12 panel">
<div class="col-sm-2">
<form method="post" enctype="multipart/form-data"> 
<ul class="nav nav-pills nav-stacked">
  <li role="presentation" class="active"><a href="mails.php">Inbox</a></li>
  <li role="presentation"><a href="mails.php">Outbox</a></li>
  <li role="presentation"><a href="mails.php">Draft</a></li>
</ul>
</form>
</div>
<div class=" col-sm-10" align="center">
<div class="alert alert-info" align="center"><strong><span class="glyphicon glyphicon-envelope"><h4>Mails</h4></span></strong></div>
<?php
	if(mysqli_num_rows($sel)>0)
	{
		while($arr=mysqli_fetch_array($sel))
		{
			extract($arr);
			$sel2=mysqli_query($link,"select fname,lname from users where email='$from'");
			$arr2=mysqli_fetch_array($sel2);
	        extract($arr2);
	?>
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <h3><?php 
		  echo $fname." ".$lname;?></h3>
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body" align="left">
        <h4><?php echo $message;?></h4>
        <div class="panel-body" align="center">
        <a href="reply.php"><span class="glyphicon glyphicon-share" data-toggle="tooltip" data-placement="left" title="Reply"></span></a>
        <a href="delete.php?m_d=<?php echo $mail_id;?>"><span class="glyphicon glyphicon-trash" data-toggle="tooltip" data-placement="left" title="Delete"></span></a>
      </div>
      <div class="panel-body" align="center"><?php echo $date;?></div>
      </div>
    </div>
  </div>
</div>
<?php } }
else
	{
		?>
        <table width="50%" class="table table-hover">
     <tr><td colspan="6" align="center">No mails</td></tr></table>   
        <?php
	}
?>

</div>
</div>
</body>
</html>
