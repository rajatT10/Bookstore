<?php
session_start();	
$sid=$_SESSION['sid'];
if($sid=="")
{
	header("location:signin.php"); 
}
else
{
	include("nav_bar_index.php");
$att=$_FILES['att']['name']; //attachment
$dat=date("d-m-y h-i-s a"); //date
extract($_POST);
if(isset($post_ad)){ $ad_posted=0;
           $id_product=uniqid();
		   $id_title=mysqli_real_escape_string($link,htmlentities(trim($id_title)));
		   $id_auth=mysqli_real_escape_string($link,htmlentities(trim($id_auth)));
		   $id_price=mysqli_real_escape_string($link,htmlentities(trim($id_price)));
		   $id_phone=mysqli_real_escape_string($link,htmlentities(trim($id_phone)));
		   $id_desc=mysqli_real_escape_string($link,htmlentities(trim($id_desc)));
if(mysqli_query($link,"insert into ads values('$id_product','$sid','$id_title','$id_auth','$id_phone','$id_price','$dat', '$att','$category','$id_cond','$id_desc')"))
			{
				    $x=1; //if ad is successfully posted
					mkdir("attach/$id_product");
			        move_uploaded_file($_FILES['att']['tmp_name'],"attach/$id_product/$att");
					echo "<script> function redirect() { location.href='index.php';} 
					alert('Your ad is successfully posted.');
					setTimeout('redirect()',1000); </script>";		
					}
			else { $msg="Oops! Something went wrong. Try again.";}}
}
?>
    <body>
    </br>
    <h2 class="text-center"><span class="glyphicon-pencil">Post Ad</span></h2>
    <div class="row text-center">
      <div class="col-md-12">
        <div class="container">
          <div class="panel panel-primary dialog-panel">
            <div class="panel-heading">
              <h5></h5>
            </div>
           <div class="panel-body">
              <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" name="form1" id="form1">
                <div class="form-group">
                  <div class="col-md-2"> </div>
                </div>
                <div class="form-group">
                <label class="control-label col-md-2 col-md-offset-2" for="id_title">Book Title</label>
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="col-md-11">
                      <input class="form-control" id="id_title" name="id_title" placeholder="Enter Book Title" type="text" required>
                    </div>
                  </div>
                </div>
                <label class="control-label col-md-2 col-md-offset-2" for="id_auth">Author/Publication</label>
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="col-md-11">
                      <input class="form-control" id="id_auth" name="id_auth" placeholder="Enter Author/Publication" type="text" required>
                    </div>
                  </div>
                </div>
                <label class="control-label col-md-2 col-md-offset-2" for="id_image">Choose Images</label>
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="col-md-11">
                      <input id="att" name="att" type="file" multiple accept="image/*" required>
                    </div>
                  </div>
                </div>
                <label class="control-label col-md-2 col-md-offset-2" for="id_price">Expected Price</label>
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="col-md-11">
                      <input class="form-control" id="id_price" name="id_price" placeholder="Enter Expected Price" type="text" required>
                    </div>
                  </div>
                </div>
                <label class="control-label col-md-2 col-md-offset-2" for="id_phone">Contact Number</label>
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="col-md-11">
                      <input class="form-control" id="id_phone" name="id_phone" placeholder="Enter Contact Number" type="text" required>
                    </div>
                  </div>
                </div>
                <label class="control-label col-md-2 col-md-offset-2" for="id_cond">Category</label>
                <div class="col-md-5">
                  <div class="form-group">
                    <div class="col-md-11">
                      <select name="category">
                        <option value="CBSE">CBSE</option>
                        <option value="ICSE">ICSE</option>
                        <option value="10th">10th</option>
                        <option value="12th">12th</option>
                        <option value="Entertainment">Entertainment</option>
                        <option value="Competition">Competition</option>
                        <option value="Civil Services">Civil Services</option>
                        <option value="IIT/Mains">IIT/Mains</option>
                        <option value="SSC">SSC</option>
                        <option value="UPSC">UPSC</option>
                        <option value="Others">Others</option>
                      </select>
                    </div>
                  </div>
                </div>
                <label class="control-label col-md-2 col-md-offset-2" for="id_cond">Condition</label>
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="col-md-11">
                      <input class="radio-inline" id="id_cond" name="id_cond" value="Poor" type="radio">
                      Poor
                      <input class="radio-inline" id="id_cond" name="id_cond" value="Average" type="radio">
                      Average
                      <input class="radio-inline" id="id_cond" name="id_cond" value="Excellent" type="radio">
                      Excellent </div>
                  </div>
                </div>
                <label class="control-label col-md-2 col-md-offset-2" for="id_desc">Description</label>
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="col-md-11">
                <textarea rows="4" cols="57" name="id_desc" id="id_desc"></textarea>
                </div>
                </div>
                </div>
                <div class="form-group">
                  <div class="col-md-offset-4 col-md-3">
   <button class="btn-lg btn-primary" type="submit" id="post_ad" name="post_ad"><span class="glyphicon glyphicon-saved">Post</span></button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          </div>
          </div>
		<?php include("footer.php");?>