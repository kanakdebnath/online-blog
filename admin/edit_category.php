<?php

 include_once('inc/header.php');

 if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $status = $_POST['status'];

    $query = "UPDATE categories SET 
              name = '$name',
              status = '$status',
              updated_at = now()
              WHERE id = '$id'";
    $update = $db->update($query);

    if ($update) {
        echo "<div class='alert alert-success' role='alert'>
          Category Update Successfully
        </div>";

        ?>
        <script>
            setTimeout(function(){
                window.location.href = "category_list.php";
            },2000);
        </script>
   <?php } else{
        echo "<div class='alert alert-danger' role='alert'>
          Category Update Fail!
        </div>";
   }
     
 }


if ($_GET['id']) {

  $id = $_GET['id'];
  
  $query = "SELECT * FROM categories WHERE id = $id";
  $categorie = $db->select($query);
}



 ?>

 

            <!-- Content -->
 <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Home/</span> Categories</h4>

              <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Edit Category</h5>
                    </div>
                    <div class="card-body">
                      <form method="POST">
                        <?php 

                          while ($result = $categorie->fetch_assoc()) { ?>
                              
                          <input type="hidden" name="id" value="<?php echo $result['id'] ?>">
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="category">Name</label>
                          <div class="col-sm-10">
                            <input type="text" value="<?php echo $result['name'] ?>" name="name" class="form-control" id="category" placeholder="Category Name" />
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="status">Message</label>
                          <div class="col-sm-10">
                            <select name="status" id="status" class="form-control">
                                <option <?php echo $result['status'] == '1'?'selected':'' ?> value="1"> Active</option>
                                <option <?php echo $result['status'] == '0'?'selected':'' ?> value="0"> InActive</option>
                            </select>
                          </div>
                        </div>

                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Update</button>
                          </div>
                        </div>

                       <?php }
                         ?>
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

