<?php
  include_once('inc/header.php');


// slider post 
$query = "SELECT posts.*, categories.* FROM posts
          INNER JOIN categories ON posts.category_id = categories.id ORDER BY posts.id DESC LIMIT 6";
$posts = $db->select($query);


// for Body section 
$query1 = "SELECT posts.*, categories.* FROM posts
          INNER JOIN categories ON posts.category_id = categories.id WHERE posts.status = 1 ORDER BY posts.id DESC LIMIT 3";
$posts1 = $db->select($query1);



// for Body section 
$query2 = "SELECT posts.*, categories.* FROM posts
          INNER JOIN categories ON posts.category_id = categories.id WHERE posts.status = 1 ORDER BY posts.id DESC LIMIT 3";
$recent_posts = $db->select($query2);

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
                        
                        <span><a href="#">
                          <?php echo $result['name']; ?>
                        </a></span>
                      </div>
                      <a href="post-details.php?id=<?php echo base64_encode($result['id']) ?>"><h4><?php echo $result['title']; ?></h4></a>
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
                      <span><?php echo $result1['name']; ?></span>
                      <a href="post-details.php?id=<?php echo base64_encode($result1['id']) ?>"><h4><?php echo $result1['title']; ?></h4></a>
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
          <div class="col-lg-4">
            <div class="sidebar">
              <div class="row">
                <div class="col-lg-12">
                  <div class="sidebar-item search">
                    <form id="search_form" name="gs" method="GET" action="#">
                      <input type="text" name="q" class="searchText" placeholder="type to search..." autocomplete="on">
                    </form>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="sidebar-item recent-posts">
                    <div class="sidebar-heading">
                      <h2>Recent Posts</h2>
                    </div>
                    <div class="content">
                      <ul>
                         <?php 
                          if ($recent_posts) {
                
                          while($result2 = $recent_posts->fetch_assoc() ){  ?>

                        <li><a href="post-details.php?id=<?php echo base64_encode($result2['id']) ?>">
                          <h5><?php echo $result2['title']; ?></h5>
                          <span>

                            <?php
                              $date=date_create($result2['created_at']);
                              echo date_format($date,"d M,Y");
                            ?>
                          </span>
                        </a></li>

                        <?php  } 
                           }
                         ?>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="sidebar-item categories">
                    <div class="sidebar-heading">
                      <h2>Categories</h2>
                    </div>
                    <div class="content">
                      <ul>
                        <li><a href="#">- Nature Lifestyle</a></li>
                        <li><a href="#">- Awesome Layouts</a></li>
                        <li><a href="#">- Creative Ideas</a></li>
                        <li><a href="#">- Responsive Templates</a></li>
                        <li><a href="#">- HTML5 / CSS3 Templates</a></li>
                        <li><a href="#">- Creative &amp; Unique</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="sidebar-item tags">
                    <div class="sidebar-heading">
                      <h2>Tag Clouds</h2>
                    </div>
                    <div class="content">
                      <ul>
                        <li><a href="#">Lifestyle</a></li>
                        <li><a href="#">Creative</a></li>
                        <li><a href="#">HTML5</a></li>
                        <li><a href="#">Inspiration</a></li>
                        <li><a href="#">Motivation</a></li>
                        <li><a href="#">PSD</a></li>
                        <li><a href="#">Responsive</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  <?php 
    include_once('inc/footer.php');
   ?>