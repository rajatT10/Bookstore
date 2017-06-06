<div class="container">
  <div class="row">
  <?php if($sid==""){?>
    <div class="col-lg-9 col-md-12">
    <?php } else{?>
    <div class="col-lg-12 col-md-12">
	<?php }?>
      <div class="row">
        <?php
		$sel=mysqli_query($link,"select * from ads where user_id<>'$sid' order by views desc limit 0,9");
	if(mysqli_num_rows($sel)>0)
	{
		while($arr=mysqli_fetch_array($sel))
		{
			extract($arr);
			extract(mysqli_fetch_array(mysqli_query($link,"select file_name from images where pro_id='$pro_id' limit 0,1")));
	?>
        <?php if($sid==""){?>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
        <?php }else {?>
        <div class="col-md-3 col-lg-3 col-sm-4 col-xs-4">
		<?php }?>
          <div class="thumbnail" style="border:none;">
            <div class="media-object-default" style="border: ridge;">
              <div class="media">
                <div class="media-center" style="margin-top:5px;"><a><img class="media-object" src="attach/<?php echo $pro_id;?>/<?php echo $file_name;?>" alt="placeholder image"></a></div>
                <div class="caption">
                  <h3 class="media-heading" align="center" style=" color: #030251;"><b><?php echo $title;?></b></h3>
                  <p align="center" style=" color: #030251;"><b><?php echo $author;?></b></p>
                  <p align="center" style=" color: #030251;"><b>Rs. </b><?php echo $price;?></p>
                   <marquee behavior="alternate">Views <span class="glyphicon glyphicon-eye-open"><font style=" color: #147E34;"><?php echo " ".$views;?></font></span></marquee>
                  </div>
                  <p class="text-center"><a href="view_product.php?pid=<?php echo $pro_id;?>" class="btn btn-success" role="button">View</a></p>
              </div>
            </div>
          </div>
        </div>
        <?php  } }   
         ?>
      </div>
    </div>
    <?php if($sid=="") {include("signin_box.php");}?>
    </div>
  </div>
</div>
