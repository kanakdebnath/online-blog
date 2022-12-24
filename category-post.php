<?php
  include_once('inc/header.php');


  // for pagination 

  $post_per_page = 2;
      if (isset($_GET["page"])) {
        $page = $_GET["page"];
      }else{
        $page = 1;  
      }
  $start_form = ($page-1) * $post_per_page;


  // for pagination 


  if ($_GET['cid']) {

  $id = base64_decode($_GET['cid']);

  $query = "SELECT *, posts.id as pid, categories.id as cid FROM posts
          INNER JOIN categories ON posts.category_id = categories.id where posts.category_id = '$id' limit $start_form, $post_per_page";
  $posts = $db->select($query);



  $query1 = "SELECT *, posts.id as pid, categories.id as cid FROM posts
          INNER JOIN categories ON posts.category_id = categories.id where posts.category_id = '$id'";
  $posts1 = $db->select($query1);
  $total_rows = mysqli_num_rows($posts1);
  $total_pages = ceil($total_rows/$post_per_page);


  $query = "SELECT * FROM categories WHERE id = $id";
  $categorie = $db->select($query);

}

?>

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="heading-page header-text">
      <section class="page-heading">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="text-content">
                <h4>Category Posts</h4>
                <?php foreach ($categorie as $value): ?>
                  <h2><?php echo $value['name'] ?></h2>
                  
                <?php endforeach ?>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    
 


    <section class="blog-posts grid-system">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="all-blog-posts">
              <div class="row">

                <?php 
                if ($posts) {
                  
                  foreach ($posts as $result) { ?>

                    <div class="col-lg-6">
                  <div class="blog-post">
                    <div class="blog-thumb">
                      <img src="admin/<?php echo $result['photo']; ?>" alt="">
                    </div>
                    <div class="down-content">
                      <a href="category-post.php?cid=<?php echo base64_encode($result['cid']) ?>">
                        <span><?php echo $result['name']; ?></span>
                      </a> 
                      <a href="post-details.php?slug=<?php echo $result['slug'] ?>"><h4><?php echo $result['title']; ?></h4></a>
                      <ul class="post-info">
                        <li><a href="#">Admin</a></li>
                        <li><a href="#">
                        <?php
                              $date=date_create($result['created_at']);
                              echo date_format($date,"d M,Y");
                            ?>
                              
                            </a></li>
                        <li><a href="#">12 Comments</a></li>
                      </ul>
                      <p>Nullam nibh mi, tincidunt sed sapien ut, rutrum hendrerit velit. Integer auctor a mauris sit amet eleifend.</p>
                      <div class="post-options">
                        <div class="row">
                          <div class="col-lg-12">
                            <ul class="post-tags">
                              <li><i class="fa fa-tags"></i></li>
                              <li><a href="#">Best Templates</a>,</li>
                              <li><a href="#">TemplateMo</a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>


                     
               <?php  } ?>

                <div class="col-lg-12">
                  <ul class="page-numbers">
                    <li><a href="category-post.php?cid=<?php echo $_GET['cid'] ?>&page=1"><i class="fa fa-angle-double-left"></i></a></li>
                    <?php 
                      for ($i=1; $i <= $total_pages; $i++) { 
                        echo "<li><a href='category-post.php?cid=".$_GET['cid']."&page=".$i."'>".$i."</a></li>";
                      }

                     ?>
                    <li><a href="category-post.php?cid=<?php echo $_GET['cid'] ?>&page=<?php echo $total_pages ?>"><i class="fa fa-angle-double-right"></i></a></li>
                  </ul>
                </div>

               <?php  }else{ ?>

                <h2 class="text-danger text-center">This Category Hasen't Any Posts</h2>

              <?php  }

                ?>

                



                
              </div>
            </div>
          </div>
          <?php  include_once('inc/sidebar.php'); ?>
        </div>
      </div>
    </section>

   
  <?php 
    include_once('inc/footer.php');
   ?>