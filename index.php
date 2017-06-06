<head>
<!-- Start WOWSlider.com HEAD section -->
<link rel="stylesheet" type="text/css" href="engine1/style.css" />
<script type="text/javascript" src="engine1/jquery.js"></script>
<!-- End WOWSlider.com HEAD section -->
</head>
<body  style="margin:auto">
<br>
<br>
<br>
<br>
<br>
<!-- Start WOWSlider.com BODY section -->
<div id="wowslider-container1">
  <div class="ws_images">
    <ul>
      <li><img src="data1/images/first.jpg" alt="Buy.Sell.Earn" title="Buy.Sell.Earn" id="wows1_0"/></li>
      <li><img src="data1/images/second.jpg" alt="slider" title="Easy navigation.Interactive UI" id="wows1_1"/></a></li>
      <li><img src="data1/images/127.0.0.1_wallpaper.png" alt="Post Free/Premium Ads." title="Post Free/Premium Ads." id="wows1_2"/></li>
    </ul>
  </div>
  <div class="ws_bullets">
    <div> <a href="#" title="Buy.Sell.Earn"><span><img src="data1/tooltips/first.jpg" alt="Buy.Sell.Earn"/>1</span></a> <a href="#" title="Easy navigation.Interactive UI"><span><img src="data1/tooltips/second.jpg" alt="Easy navigation.Interactive UI"/>2</span></a> <a href="#" title="Post Free/Premium Ads."><span><img src="data1/tooltips/127.0.0.1_wallpaper.png" alt="Post Free/Premium Ads."/>3</span></a> </div>
  </div>
  <div class="ws_script" style="position:absolute;left:-99%"></div>
  <div class="ws_shadow"></div>
</div>
<script type="text/javascript" src="engine1/wowslider.js"></script> 
<script type="text/javascript" src="engine1/script.js"></script> 
<!-- End WOWSlider.com BODY section -->
<?php
error_reporting(0);
include_once("connection.php");
session_start();
$sid=$_SESSION['sid'];
include_once("nav.php");
if($sid=="")
{	
?>
<h2 class="text-center" align="center"> 
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Post Ads</button>
  <!-- Modal -->
  <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-alert"></span>You must Signin first.<a href="index#signin" class="alert-link">
      <h5><i>Click Here</i></h5>
      </a> </div>
  </div>
</h2>
<?php
} 
else {
?>
<h2 class="text-center" align="center"> 
  <!-- Button trigger modal --> 
  <script src="js/jquery.js"></script> 
  <script>
 $(document).ready(function()
  {
     $("#a").click(function()
	 {
		$(".log1").toggle(); 
	 }
	 
	 ) 
  });
</script>
  <button type="button" class="btn btn-success" id="a">Post Ads</button>
</h2>
<?php include("post.php");
}?>
<hr  id="signin">
<h2 class="text-center">TRENDING PRODUCTS</h2>
<hr>
<!--The classified ads will be displayed here-->
<section>
<?php include("trending_product.php");?>
  </section>
  <section>
    <?php include("new_products.php");?>
  </section>
  <br>
  <div class="col-md-12">
    <?php include("footer.php");?>
</div>
<script src="js/jquery-1.11.2.min.js"></script> 
<script src="js/bootstrap.min.js"></script>
</body>
