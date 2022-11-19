<?php

 include_once('inc/header.php');


 // select category 
    $query = "SELECT * FROM categories ORDER BY id DESC";
    $categories = $db->select($query);
 // select category 

 if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $name = $_POST['name'];
    $status = $_POST['status'];

    $query = "INSERT INTO categories(`name`,`status`) VALUES ('$name','$status')";
    $insert = $db->insert($query);

    if ($insert) {
        echo "<div class='alert alert-success' role='alert'>
          Category Insert Successfully
        </div>";

        ?>
        <script>
            setTimeout(function(){
                window.location.href = "category_list.php";
            },2000);
        </script>
   <?php } else{
        echo "<div class='alert alert-danger' role='alert'>
          Category Insert Fail!
        </div>";
   }
     
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
                      <h5 class="mb-0">Add Post</h5>
                    </div>
                    <div class="card-body">
                      <form method="POST">
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="title">Post Title</label>
                          <div class="col-sm-10">
                            <input type="text" name="title" class="form-control" id="title" placeholder="Post Title" />
                          </div>
                        </div>


                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="category">Category</label>
                          <div class="col-sm-10">
                            <select name="category" id="category" class="form-control">
                                <option value=""> Select Category</option>
                                <?php 
                                  while ($category = $categories->fetch_assoc()) { ?>
                                      <option value="<?php echo $category['id'] ?>"> <?php echo $category['name'] ?></option>
                                 <?php }
                                 ?>
                                
                            </select>
                          </div>
                        </div>


                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="photo">Photo</label>
                          <div class="col-sm-10">
                            <input type="file" name="title" class="form-control" id="photo" />
                          </div>
                        </div>


                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="details">Photo</label>
                          <div class="col-sm-10">
                            <textarea name="details" id="details" cols="30" rows="10"></textarea>
                          </div>
                        </div>


                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="status">Message</label>
                          <div class="col-sm-10">
                            <select name="status" id="status" class="form-control">
                                <option value="1"> Active</option>
                                <option value="0"> InActive</option>
                            </select>
                          </div>
                        </div>

                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Insert</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->
            <!-- / Content -->
   }
<?php include_once('inc/footer.php') ?>

