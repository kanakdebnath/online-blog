<?php
  include_once('inc/header.php');

  // slider post 
$query = "SELECT *, posts.id as pid, categories.id as cid FROM posts
          INNER JOIN categories ON posts.category_id = categories.id ORDER BY posts.id DESC LIMIT 6";
$posts = $db->select($query);


?>

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="heading-page header-text">
      <section class="page-heading">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="text-content">
                <h4>Recent Posts</h4>
                <h2>Our Recent Blog Entries</h2>
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
                     
               <?php  }  } ?>

                



                <div class="col-lg-12">
                  <ul class="page-numbers">
                    <li><a href="#">1</a></li>
                    <li class="active"><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                  </ul>
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