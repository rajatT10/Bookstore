<?php
include("connection.php");
session_start();
$sid=$_SESSION['sid'];
extract($_POST);
$sel=mysqli_query($link,"select * from ads where user_id='$sid'");
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
    <div class="alert alert-info" align="center"><strong><span class="glyphicon glyphicon-edit">
      <h4>Manage your ads</h4>
      </span></strong></div>
    <?php
	if(mysqli_num_rows($sel)>0)
	{
		$i=0;//To diffrentiate each box
		while($arr=mysqli_fetch_array($sel))
		{	
			extract($arr);
	?>
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
      <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingOne">
          <h4 class="panel-title"> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i;?>" aria-expanded="true" aria-controls="collapse<?php echo $i;?>">
            <h3><?php echo $title;?>
              <h5><?php echo $author;?></h5>
            </h3>
            </a> </h4>
        </div>
        <div id="collapse<?php echo $i;?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
          <div class="panel-body" align="left" style="border:dashed;">
              <div class="panel-body" style="border:dashed; width:80%; float:left;" align="left">
              <h4><?php echo $description;?></h4>
              <a href="reply.php"><span class="glyphicon glyphicon-share" data-toggle="tooltip" data-placement="left" title="Reply"></span></a> <a href="delete.php?m_d=<?php echo $pro_id;?>"><span class="glyphicon glyphicon-trash" data-toggle="tooltip" data-placement="left" title="Delete"></span></a> 
              <?php echo $date;?>
              </div>
              <div class="panel-body" style="border:dashed; width:20%; height:auto; float:left;" align="right">
               <?php include("attach_slider_2.php");?>
              </div>
              </div>
          </div>
        </div>
      </div>
    <?php $i++;} }
else
	{
		?>
    <table width="50%" class="table table-hover">
      <tr>
        <td colspan="6" align="center">No mails</td>
      </tr>
    </table>
    <?php
	}
?>
  </div>
</div>
</body></html>