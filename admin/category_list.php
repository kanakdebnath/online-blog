<?php 

include_once('inc/header.php');

$query = "SELECT * FROM categories ORDER BY id DESC";
$categories = $db->select($query);


// for delete category 
    if (isset($_GET['delid'])) {

        $id = $_GET['delid'];
        $d_query = $db->delete($id, 'categories');

       if ($d_query) {
        echo "<div class='alert alert-success' role='alert'>
          Category Delete Successfully
        </div>";

        ?>
        <script>
            setTimeout(function(){
                window.location.href = "category_list.php";
            },2000);
        </script>
   <?php } else{
        echo "<div class='alert alert-danger' role='alert'>
          Category Delete Fail!
        </div>";
   }

        
    }
// for delete category 

 ?>
            <!-- Content -->
 <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Home /</span> Categories</h4>


              <!-- Responsive Table -->
              <div class="card">
                <h5 class="card-header">Category List</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr class="text-nowrap">
                        <th>#</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Create Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>

                        <?php 
                            if ($categories) {
                                $i = 0;
                                while($result = $categories->fetch_assoc() ){ 
                                        $i++;
                                    ?>
                                    
                                    <tr>
                                        <th scope="row"><?php echo $i ?></th>
                                        <td><?php echo $result['name']; ?></td>
                                        <td>

                                            <?php 
                                                $status = $result['status'];
                                                if ($status == 1) { ?>
                                                    <span  class="badge bg-success">Active</span>
                                               <?php }else{ ?>
                                                    <span class="badge bg-danger">InActive</span>
                                               <?php }
                                             ?>
                                                
                                            </td>
                                        <td><?php echo $result['created_at']; ?></td>
                                        <td>
                                            <span  class="badge bg-info"><a href="edit_category.php?id=<?php echo $result['id'] ?>">Edit</a></span> ||

                                            <span  class="badge bg-danger"><a onClick=" return confirm('Are your sure you want to delete?')" href="?delid=<?php echo $result['id'] ?>">Delete</a></span>

                                        </td>
                                    </tr>

                             <?php   }
                                
                            }
                         ?>

                      
                      
                    </tbody>
                  </table>
                </div>
              </div>
              <!--/ Responsive Table -->
            </div>
            <!-- / Content -->
            <!-- / Content -->
<?php include_once('inc/footer.php') ?>


