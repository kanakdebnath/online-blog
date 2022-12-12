<?php
  include_once('inc/header.php');


// slider post 
$query = "SELECT *, posts.id as pid, categories.id as cid FROM posts
          INNER JOIN categories ON posts.category_id = categories.id ORDER BY posts.id DESC LIMIT 6";
$posts = $db->select($query);



// for Body section 
$query1 = "SELECT *, posts.id as pid, categories.id as cid FROM posts
          INNER JOIN categories ON posts.category_id = categories.id WHERE posts.status = 1 ORDER BY posts.id DESC LIMIT 3";
$posts1 = $db->select($query1);


?>

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="main-banner header-text">
      <div class="container-fluid">
        <div class="owl-banner owl-carousel">
          <?php 
              if ($posts) {
                
                while($result = $posts->fetch_assoc() ){  ?>
                  
                  <div class="item">
                  <img src="admin/<?php echo $result['photo']; ?>" alt="">
                  <div class="item-content">
                    <div class="main-content">
                      <div class="meta-category">
                        
                        <span><a href="category-post.php?cid=<?php echo base64_encode($result['cid']) ?>">
                          <?php echo $result['name']; ?>
                        </a></span>
                      </div>
                      <a href="post-details.php?id=<?php echo base64_encode($result['pid']) ?>"><h4><?php echo $result['title']; ?></h4></a>
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
                    </div>
                  </div>
                </div>

             <?php  } 
             }
           ?>
          
        </div>
      </div>
    </div>
    <!-- Banner Ends Here -->


    <section class="blog-posts">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="all-blog-posts">
              <div class="row">
                <?php 
              if ($posts1) {
                
                while($result1 = $posts1->fetch_assoc() ){  ?>

                <div class="col-lg-12">
                  <div class="blog-post">
                    <div class="blog-thumb">
                      <img src="admin/<?php echo $result1['photo']; ?>" alt="">
                    </div>
                    <div class="down-content">
                      <span><a href="category-post.php?cid=<?php echo base64_encode($result1['cid']) ?>"><?php echo $result1['name']; ?></a></span>
                      <a href="post-details.php?id=<?php echo base64_encode($result1['pid']) ?>"><h4><?php echo $result1['title']; ?></h4></a>
                      <ul class="post-info">
                        <li><a href="#">Admin</a></li>
                        <li><a href="#">
                          <?php
                              $date=date_create($result1['created_at']);
                              echo date_format($date,"d M,Y");
                            ?>
                        </a></li>
                        <li><a href="#">12 Comments</a></li>
                      </ul>
                      <p><?php echo $result1['details']; ?></p>
                      <div class="post-options">
                        <div class="row">
                          <div class="col-6">
                            <ul class="post-tags">
                              <li><i class="fa fa-tags"></i></li>
                              <li><a href="#">Beauty</a>,</li>
                              <li><a href="#">Nature</a></li>
                            </ul>
                          </div>
                          <div class="col-6">
                            <ul class="post-share">
                              <li><i class="fa fa-share-alt"></i></li>
                              <li><a href="#">Facebook</a>,</li>
                              <li><a href="#"> Twitter</a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <?php  } 
             }
           ?>


                <div class="col-lg-12">
                  <div class="main-button">
                    <a href="blog.php">View All Posts</a>
                  </div>
                </div>
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