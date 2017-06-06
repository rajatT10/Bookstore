<?php 
include("connection.php");
$sel=mysqli_query($link,"select * from ads where category='$category' or author='$author' or title='$title' and pro_id<>'$product_id'");
?>
<div class="container">
  <div class="row">
    <?php
	if(mysqli_num_rows($sel)>0)
	{
		while($arr=mysqli_fetch_array($sel))
		{
			extract($arr);
	?>
    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
      <div class="thumbnail">
        <div class="media-object-default">
          <div class="media">
            <div class="media-center"><a><img class="media-object" src="attach/<?php echo $pro_id;?>/<?php echo $att;?>" alt="placeholder image"></a></div>
            <div class="caption">
              <h3 class="media-heading"><b><?php echo $title;?></b></h3>
              <b><?php echo $author;?></b></br>
              <b>Rs. </b><?php echo $price;?> </div>
            <p class="text-center"><a href="view_product.php?pid=<?php echo $pro_id;?>" class="btn btn-success" role="button">View</a></p>
          </div>
        </div>
      </div>
    </div>
    <?php  } }
		 else
		 {   
         ?>
    <h3 class="text-center" style="color:red; font-family:Consolas, 'Andale Mono', 'Lucida Console', 'Lucida Sans Typewriter', Monaco, 'Courier New', monospace;">No similar ads found</h3>
    <?php }?>
  </div>
</div>
<hr>
