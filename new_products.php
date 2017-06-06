<div class="container">
    <div class="row">
      <div class="col-lg-6">
        <h3>Recent Entries</h3>
        <hr>
        <div class="row">
        <?php
		$query="select * from ads order by date desc limit 0,9"; 
		$select=mysqli_query($link,$query);
		if(mysqli_num_rows($select)>0)
		{
			while($arr=mysqli_fetch_array($select))
			{
			extract($arr);
		?>  
          <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <div class="thumbnail" style="border: hidden;">
            <div class="media-object-default">
              <div class="media">
                <div class="media-center" style="margin-top:5px;"><a href="view_product.php?pid=<?php echo $pro_id;?>"><img class="media-object" src="attach/<?php echo $pro_id;?>/<?php echo $file_name;?>" alt="placeholder image"></a></div>
              </div>
            </div>
          </div>
          </div>      
        <?php }}?>
        </div>
       <hr>
      </div>
      <div class="col-lg-6">
        <h3>Our Services</h3>
        <hr>
        <ul id="myTab1" class="nav nav-tabs">
          <li class="active"> <a href="#home1" data-toggle="tab"> Tab Panel 1 </a> </li>
          <li><a href="#pane2" data-toggle="tab">Tab Panel 2</a></li>
          <li> <a href="#pane3" data-toggle="tab">Tab Panel 3</a> </li>
        </ul>
        <div id="myTabContent1" class="tab-content">
          <div class="tab-pane fade in active" id="home1">
            <p class="text-center"><img src="../../../../Users/Rajat Tiwari/AppData/Roaming/Adobe/Dreamweaver CC 2015/en_US/Configuration/Temp/Assets/eam1509.tmp/images/3b536b.gif" alt=""></p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus maxime aut ea impedit voluptates aperiam dolor laborum officiis autem aspernatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, alias, repudiandae sunt illo consequatur aperiam doloribus nesciunt ut deserunt ipsa est tempora nihil. Totam eveniet aperiam debitis fugit ipsa doloremque. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio sequi dolorem suscipit assumenda molestiae voluptatem qui consequuntur magni? Deleniti, corporis.</p>
          </div>
          <div class="tab-pane fade" id="pane2">
            <p class="text-center"><img src="../../../../Users/Rajat Tiwari/AppData/Roaming/Adobe/Dreamweaver CC 2015/en_US/Configuration/Temp/Assets/eam1509.tmp/images/9b59b6.gif" alt=""></p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus maxime aut ea impedit voluptates aperiam dolor laborum officiis autem aspernatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, alias, repudiandae sunt illo consequatur aperiam doloribus nesciunt ut deserunt ipsa est tempora nihil. Totam eveniet aperiam debitis fugit ipsa doloremque. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio sequi dolorem suscipit assumenda molestiae voluptatem qui consequuntur magni? Deleniti, corporis.</p>
          </div>
          <div class="tab-pane fade" id="pane3">
            <p class="text-center"><img src="../../../../Users/Rajat Tiwari/AppData/Roaming/Adobe/Dreamweaver CC 2015/en_US/Configuration/Temp/Assets/eam1509.tmp/images/16a085.gif" alt=""></p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus maxime aut ea impedit voluptates aperiam dolor laborum officiis autem aspernatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, alias, repudiandae sunt illo consequatur aperiam doloribus nesciunt ut deserunt ipsa est tempora nihil. Totam eveniet aperiam debitis fugit ipsa doloremque. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio sequi dolorem suscipit assumenda molestiae voluptatem qui consequuntur magni? Deleniti, corporis.</p>
          </div>
        </div>
      </div>
    </div>
  </div>