<?php
$sid=$_SESSION['sid'];
if($sid=="")
{
	header("location:signin"); 
}
else
{
$dat=date("d-m-y h-i-s a"); //date
extract($_POST);
if(isset($post_ad))
       {
	
           $id_product=uniqid();
		   $id_title=mysqli_real_escape_string($link,htmlentities(trim($id_title)));
		   $id_auth=mysqli_real_escape_string($link,htmlentities(trim($id_auth)));
		   $id_price=mysqli_real_escape_string($link,htmlentities(trim($id_price)));
		   $id_phone=mysqli_real_escape_string($link,htmlentities(trim($id_phone)));
		   $id_desc=mysqli_real_escape_string($link,htmlentities(trim($id_desc)));
if(mysqli_query($link,"insert into ads values('$id_product','$sid','$id_title','$id_auth','$id_phone','$id_price','$dat','$category','$id_cond','$id_desc',0)"))
			{	 
                $errors= array();
	            foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
		        $file_name = $key.$_FILES['files']['name'][$key];
		        $file_size =$_FILES['files']['size'][$key];
		        $file_tmp =$_FILES['files']['tmp_name'][$key];
		        $file_type=$_FILES['files']['type'][$key];	
                if($file_size > 2097152){
			    $errors[]='File size must be less than 2 MB';
                }		
                $query="INSERT into images (`pro_id`,`file_name`,`file_size`,`file_type`) VALUES('$id_product','$file_name','$file_size','$file_type'); ";
                $desired_dir="attach/$id_product";
                if(empty($errors)==true){
                if(is_dir($desired_dir)==false){
                mkdir("$desired_dir", 0700);		// Create directory if it does not exist
                }
                if(is_dir("$desired_dir/".$file_name)==false){
                move_uploaded_file($file_tmp,"attach/$id_product/".$file_name);
                }else{									//rename the file if another one exist
                $new_dir="attach/$id_product/".$file_name.time();
                 rename($file_tmp,$new_dir) ;				
                }
                mysqli_query($link,$query);			
                }else{
                print_r($errors);
        }
    }
	if(empty($error)){
		 echo "<script> function redirect() { location.href='index';} 
					alert('Your ad is successfully posted.');
					setTimeout('redirect()',1000); </script>";
	}		
					}
			else { $msg="Oops! Something went wrong. Try again.";
			}
		}
}
?>
<style>
.log1 {
	display: none;
}
</style>
<h2 class="text-center"></h2>
<div class="row text-center log1">
  <div class="col-lg-12 col-md-12 col-md-offset-12 col-lg-offset-0">
    <div class="container">
      <div class="panel panel-info dialog-panel">
        <div class="panel-heading">
          <h4>Post Ads</h4>
          <h4 class="text-center"><?php echo $msg;?></h4>
        </div>
        <div class="panel-body">
          <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" name="form1" id="form1">
            <div class="form-group">
              <div class="col-md-2"> </div>
            </div>
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
                  <input id="att" name="files[]" type="file" accept="image/*" multiple>
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
                <input class="btn btn-primary" type="submit" id="post_ad" name="post_ad" value="Post Now">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
