<?php 

include_once('inc/header.php');

$query = "SELECT * FROM posts ORDER BY id DESC";
$posts = $db->select($query);


// for delete category 
    if (isset($_GET['delid'])) {

        $id = $_GET['delid'];
        $d_query = $db->delete($id, 'posts');

       if ($d_query) {
        echo "<div class='alert alert-success' role='alert'>
          Post Delete Successfully
        </div>";

        ?>
        <script>
            setTimeout(function(){
                window.location.href = "post_list.php";
            },2000);
        </script>
   <?php } else{
        echo "<div class='alert alert-danger' role='alert'>
          Post Delete Fail!
        </div>";
   }

        
    }
// for delete category 

 ?>
            <!-- Content -->
 <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Home /</span> Posts</h4>


              <!-- Responsive Table -->
              <div class="card">
                <h5 class="card-header">Post List</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table" id="example">
                    <thead>
                      <tr class="text-nowrap">
                        <th>#</th>
                        <th>Title</th>
                        <th>Category </th>
                        <th>Photo </th>
                        <th>Status</th>
                        <th>Create Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>

                        <?php 
                            if ($posts) {
                                $i = 0;
                                while($result = $posts->fetch_assoc() ){ 
                                        $i++;
                                    ?>
                                    
                                    <tr>
                                        <th scope="row"><?php echo $i ?></th>
                                        <td><?php echo $result['title']; ?></td>

                                        <?php 
                                        $cate_name = '';
                                        $cate_id = $result['category_id'];

                                        $query = "SELECT * FROM categories WHERE id = $cate_id  ORDER BY id DESC";
                                        $category = $db->select($query);

                                        if ($category) {
                                          while ( $result1 = $category->fetch_assoc() ) {
                                            $cate_name =  $result1['name'];
                                          }
                                        }

                                         ?>



                                        <td><?php echo $cate_name; ?></td>
                                        <td><img src="<?php echo $result['photo']; ?>" width='120' height='80'></td>
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
                                            <span  class="badge bg-info"><a href="edit_post.php?id=<?php echo base64_encode($result['id']) ?>">Edit</a></span> ||

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


