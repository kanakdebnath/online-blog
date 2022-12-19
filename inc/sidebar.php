<?php 


// for Body section 
$query2 = "SELECT *, posts.id as pid, categories.id as cid FROM posts
          INNER JOIN categories ON posts.category_id = categories.id WHERE posts.status = 1 ORDER BY posts.id DESC LIMIT 3";
$recent_posts = $db->select($query2);


// <!-- get category --> 

$query = "SELECT *FROM categories
           WHERE status = 1 ORDER BY id DESC LIMIT 6";
$categories = $db->select($query); 

 ?>
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

                        <li><a href="post-details.php?slug=<?php echo $result2['slug'] ?>">
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
                        <?php 

                            foreach ($categories as  $value) { ?>
                              <li><a href="category-post.php?cid=<?php echo base64_encode($value['id']) ?>">- <?php echo $value['name'] ?></a></li>
                           <?php }
                         ?>
                        
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