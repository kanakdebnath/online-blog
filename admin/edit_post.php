<?php

 include_once('inc/header.php');



 // select category 
    $query = "SELECT * FROM categories ORDER BY id DESC";
    $categories = $db->select($query);
 // select category 

 if ($_SERVER['REQUEST_METHOD'] == "POST") {



    $title = $_POST['title'];
    $category = $_POST['category'];
    $details = $_POST['details'];
    $status = $_POST['status'];
    $user_id = Session::get('userId');


    // phpto upload 

    $filename = $_FILES['photo']['name'];
    $tempname = $_FILES['photo']['tmp_name'];
    $folder = 'uploads/'. $filename;
    move_uploaded_file($tempname, $folder);


    $query = "INSERT INTO posts(title,category_id,user_id,status,details,photo) VALUES ('$title','$category','$user_id','$status','$details','$folder')";
    $insert = $db->insert($query);

    if ($insert) {
        echo "<div class='alert alert-success' role='alert'>
          Post Insert Successfully
        </div>";

        ?>
        <script>
            setTimeout(function(){
                window.location.href = "post_list.php";
            },2000);
        </script>
   <?php } else{
        echo "<div class='alert alert-danger' role='alert'>
          Post Insert Fail!
        </div>";
   }
     
 }



 if ($_GET['id']) {

  $id = base64_decode($_GET['id']);
  
  $query = "SELECT * FROM posts WHERE id = $id";
  $posts = $db->select($query);
}


 ?>

 

            <!-- Content -->
 <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Home/</span> Post</h4>

              <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Edit Post</h5>
                    </div>
                    <div class="card-body">

                      <?php 
                            if ($posts) {
                                while($result = $posts->fetch_assoc() ){ 
                                        
                                    ?>

                      <form method="POST" enctype='multipart/form-data'>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="title">Post Title</label>
                          <div class="col-sm-10">
                            <input type="text" value="<?php echo $result['title'] ?>" name="title" class="form-control" id="title" placeholder="Post Title" />
                          </div>
                        </div>


                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="category">Category</label>
                          <div class="col-sm-10">
                            <select name="category" id="category" class="form-control">
                                <option value=""> Select Category</option>
                                <?php 
                                  while ($category = $categories->fetch_assoc()) { ?>
                                      <option <?php echo $category['id'] == $result['category_id']? 'selected':'' ?> value="<?php echo $category['id'] ?>"> <?php echo $category['name'] ?></option>
                                 <?php }
                                 ?>
                                
                            </select>
                          </div>
                        </div>


                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="photo">Photo</label>
                          <div class="col-sm-10">
                            <input type="file" name="photo" class="form-control" id="photo" />
                          </div>
                        </div>


                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="details">Post Details</label>
                          <div class="col-sm-10">
                            <textarea name="details" id="details" class="form-control" cols="30" rows="10">
                              <?php echo $result['details'] ?>
                            </textarea>
                          </div>
                        </div>


                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="status">Status</label>
                          <div class="col-sm-10">
                            <select name="status" id="status" class="form-control">
                                <option <?php echo  $result['status'] ==  '1' ? 'selected':'' ?> value="1"> Active</option>
                                <option <?php echo  $result['status'] == '0' ? 'selected':'' ?> value="0"> InActive</option>
                            </select>
                          </div>
                        </div>

                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit"  class="btn btn-primary">Post</button>
                          </div>
                        </div>
                      </form>

                    <?php } } ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->
            <!-- / Content -->
   }
<?php include_once('inc/footer.php') ?>

