<head>
	<title>Bootstrap carousel</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />	
	<!-- Start WOWSlider.com HEAD section --> <!-- add to the <head> of your page -->
	<link rel="stylesheet" type="text/css" href="sliderjs/style.css" />
	<script type="text/javascript" src="sliderjs/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->
</head>
	<!-- Start WOWSlider.com BODY section --> <!-- add to the <body> of your page -->
	<div id="wowslider-container1" style="border:ridge;">
	<div class="ws_images"><ul>
		<?php 
		$query="select * from images where pro_id='$product_id'";
		$select=mysqli_query($link,$query);
		if(mysqli_num_rows($select)>0)
		{
			while($arr=mysqli_fetch_array($select))
			{
				$i=0;
		        extract($arr);
		?>
        <li><img src="attach/<?php echo $product_id; ?>/<?php echo $file_name;?>" id="wows1_<?php echo $i;?>"/></li>
	<?php 
	$i++;
	}
	}else {?><li><img src="img/7.png"></li>
    <?php }?>
    </ul></div>
	<div class="ws_bullets"><div>
		<a href="#"><span>1</span></a>
		<a href="#"><span>2</span></a>
		<a href="#"><span>3</span></a>
	</div></div><div class="ws_script" style="position:absolute;left:-99%"></div>
	<div class="ws_shadow"></div>
	</div>	
	<script type="text/javascript" src="sliderjs/wowslider.js"></script>
	<script type="text/javascript" src="sliderjs/script.js"></script>
	<!-- End WOWSlider.com BODY section -->