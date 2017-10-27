<section class="classic-blog-section section-padding">
      <div class="container">
        <div class="row">
          <!-- BLog Article Section -->
          <div class="col-md-9 wow fadeInUp" data-wow-delay="0.3s">
            <!-- Single Blog Post -->
            <article class="blog-post-wrapper">
              <!-- Author Info -->
              <header class="author-info">
                <div class="tag-posted-in">
                  <ul class="list-unstyled">
                    <li><i class="fa fa-tag"></i> <a href="#"><?php echo $post->getCategory();?></a></li>
                  </ul>
                </div>
                <div class="author-posted">
                  <div class="media">
                    <div class="media-left">
                      <a href="#"><img class="img-circle img-responsive" src="assets/img/blog/avatar/avatar1.jpg" alt=""></a>
                    </div>
                    <div class="media-body">
                      <span class="author-name"><b><?php echo $post->user_id?></b></span><br>
                      <span class="published-time"><i class="fa fa-calendar"></i><?php echo $post->date_added?></span>
                    </div>
                  </div>
                </div>
              </header>
              <!-- Featured Content -->
              <section class="featured-wrapper">
                <a href="#">
                  <img src="<?php echo base_url($post->post_pictures)?>" alt="">
                </a>
              </section>
              <br>
              <!-- Post Content -->
              <section class="blog-post-content">
                <div>
                  <h2 class="blog-post-title text-center"><?php echo $post->post_title?></h2>
                </div>
                <div class="blog-post clearfix">

                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum facere ipsam tempora adipisci! Eius obcaecati tempora sed quibusdam, incidunt iusto veniam id non numquam debitis facilis, odio deleniti atque accusamus voluptates dolorem a nemo sapiente recusandae. Earum maxime sint quisquam placeat harum suscipit doloremque, deserunt.</p>
                </div>
              </section>
            </article>
        
            <!-- About Author -->
            <section class="about-author-section mt-10">
                <div class="media wow fadeIn" data-wow-delay="0.3s">
                  <div class="media-left">
                    <a href="#"><img class="img-circle img-responsive" src="assets/img/blog/avatar/avatarBig1.jpg" alt=""></a>
                  </div>
                  <div class="media-body">
                    <h4>About Writter</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis cumque, quo omnis rem eum ipsam qui. Tempore perspiciatis unde architecto quia, enim consectetur accusamus quasi omnis voluptatibus aliquid rem mollitia incidunt quibusdam eum, sit magnam, repellendus minima nihil iusto vitae ratione dicta, iste. Vitae, architecto.</p>
                  </div>
                </div>
                <!-- <div class="author-footer text-sm-center">
                  <a class="wow bounceIn" data-wow-delay="0.4s" href="#"><i class="fa fa-facebook icon-box icon-sm"></i></a>
                  <a class="wow bounceIn" data-wow-delay="0.5s" href="#"><i class="fa fa-twitter icon-box icon-sm"></i></a>
                  <a class="wow bounceIn" data-wow-delay="0.6s" href="#"><i class="fa fa-google-plus icon-box icon-sm"></i></a>
                  <a class="wow bounceIn" data-wow-delay="0.7s" href="#"><i class="fa fa-github icon-box icon-sm"></i></a>
                  <a class="wow bounceIn" data-wow-delay="0.8s" href="#"><i class="fa fa-dribbble icon-box icon-sm"></i></a>
                  <a class="wow bounceIn" data-wow-delay="0.9s" href="#"><i class="fa fa-behance icon-box icon-sm"></i></a>
                </div> -->
            </section>

            <div class="similar-post mt-30 clearfix">
              <h3 class="small-title mb-40 wow fadeIn" data-wow-delay="0.3s">Similar Post</h3>
              <div class="row">
                <div class="col-md-3 wow fadeIn" data-wow-delay="0.4s">
                  <a href="#"><img src="assets/img/blog/home-items/img4.jpg" alt="" class="img-responsive"></a>
                  <a href="#"><h2>Scetch Fundamental</h2></a>
                </div>
                
              </div>
            </div>
            
            <div class="comments-area clearfix mt-50 wow fadeInUp" data-wow-delay="0.3s">
              <h3 class="small-title"><i class="fa fa-comment"></i> Comments</h3>
              <ul class="media-left comment-list mt-30">
<!--                <li class="media">-->
<!--                  <div class="media-left">-->
<!--                    <a href="#"><img class="img-responsive img-circle" src="assets/img/blog/comment_avatar/avatar1.jpg" alt=""></a>-->
<!--                  </div>-->
<!--                  <div class="media-body">-->
<!--                    <div class="commentor-info">-->
<!--                      <div class="comment-author">-->
<!--                        <a href="#">Al Amin Khan</a>-->
<!--                        <span class="published-time"><i class="fa fa-calendar"></i> 18 hrs ago</span>-->
<!--                      </div>-->
<!--                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos fuga, et maiores, veniam ipsa quod soluta nam, deleniti assumenda magnam sint sapiente voluptatem commodi eos.</p>-->
<!--                    </div>-->
<!--                    <div class="media reply">-->
<!--                      <div class="media-body">-->
<!--                        <div class="commentor-info">-->
<!--                          <div class="comment-author">-->
<!--                            <a href="#">Saifuddin</a>-->
<!--                            <span class="published-time"><i class="fa fa-calendar"></i> 18 hrs ago</span>-->
<!--                          </div>-->
<!--                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos fuga, et maiores, veniam ipsa quod soluta nam, deleniti assumenda magnam sint sapiente voluptatem commodi eos.</p>-->
<!--                        </div>-->
<!--                      </div>-->
<!--                      <div class="media-right">-->
<!--                        <a href="#"><img class="img-responsive img-circle" src="assets/img/blog/comment_avatar/avatar2.jpg" alt=""></a>-->
<!--                      </div>-->
<!--                    </div>-->
<!--                  </div>-->
<!--                </li>-->
                <li class="media">
                  <div class="media-left">
                    <a href="#"><img class="img-responsive img-circle" src="assets/img/blog/comment_avatar/avatar3.jpg" alt=""></a>
                  </div>
                  <div class="media-body">
                    <div class="commentor-info">
                      <div class="comment-author">
                        <a href="#">Shovon Ali</a>
                        <span class="published-time"><i class="fa fa-calendar"></i> 5 hrs ago</span>
                      </div>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos fuga, et maiores, veniam ipsa quod soluta nam, deleniti assumenda magnam sint sapiente voluptatem commodi eos.</p>
                      <a href="#">Reply</a>
                    </div>
                  </div>
                </li>
<!--                <li class="media">-->
<!--                  <div class="media-left">-->
<!--                    <a href="#"><img class="img-responsive img-circle" src="assets/img/blog/comment_avatar/avatar4.jpg" alt=""></a>-->
<!--                  </div>-->
<!--                  <div class="media-body">-->
<!--                    <div class="commentor-info">-->
<!--                      <div class="comment-author">-->
<!--                        <a href="#">Jon Doe</a>-->
<!--                        <span class="published-time"><i class="fa fa-calendar"></i> 1 Day ago</span>-->
<!--                      </div>-->
<!--                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos fuga, et maiores, veniam ipsa quod soluta nam, deleniti assumenda magnam sint sapiente voluptatem commodi eos.</p>-->
<!--                      <a href="#">Reply</a>-->
<!--                    </div>-->
<!--                  </div>-->
<!--                </li>-->
              </ul>
              <div class="new-comment mt-50">
                <h3 class="small-title">Post new Comment</h3>
                <form class="mt-30">
                  <div class="row">
                    <div class="col-md-4 ">
                      <div class="form-group">
                        <label class="sr-only" for="username">Name</label>
                        <input type="text" placeholder="Full Name" id="username" required="" class="form-control">
                      </div>
                    </div><!-- /.col-md-4  -->
                    <div class="col-md-8 ">
                      <div class="form-group">
                        <label class="sr-only" for="useremail">Email</label>
                        <input type="email" placeholder="Email Address" id="useremail" required="" class="form-control">
                      </div>
                    </div><!-- /.col-md-4  -->
<!--                    <div class="col-md-4">-->
<!--                      <div class="form-group">-->
<!--                        <label class="sr-only" for="userurl">Website</label>-->
<!--                        <input type="text" placeholder="Your Website" id="userurl" required="" class="form-control">-->
<!--                      </div>-->
<!--                    </div>-->
                  </div><!-- /.col-md-4  -->
                  <div class="form-group">
                    <label class="sr-only" for="usermessage">Message</label>
                    <textarea placeholder="Type here message" id="usermessage" rows="7" required="" class="form-control"></textarea>
                  </div> 
                  <button class="btn btn-common" type="submit"><i class="fa fa-comment"></i> Post Comment</button>      
              </form>
              </div>
            </div>
          </div>
          <!-- End -->

          <!-- Blog Sidebar Section -->
          <div class="col-md-3">
            <div class="sidebar-area">
              <!-- Search Bar -->
              <aside class="widget search-bar wow fadeInUp" data-wow-delay="0.3s">
                <form>
                  <input type="text" placeholder="Search" class="form-control">
                  <button type="submit"><i class="fa fa-search"></i></button>
                </form>
              </aside>
              <!-- Text Widgets -->
              <aside class="widget text-widgets wow fadeInUp" data-wow-delay="0.3s">
                <h2 class="widget-title">Text Widget</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur dolorem fuga ad corrupti, ullam, eos natus, repellat officiis sit labore a aspernatur quisquam. In, unde.</p>
              </aside>
              <!-- Recent Post Widgets -->
              <aside class="widget popular-post wow fadeInUp" data-wow-delay="0.3s">
                <h2 class="widget-title">Popular Post</h2>
                <ul>
                  <li>
                    <div class="media">
                      <div class="media-left">
                        <a href="#"><img class="img-responsive" src="assets/img/blog/avatar/avatar1.jpg" alt=""></a>
                      </div>
                      <div class="media-body">
                        <h4><a href="#">Principles of UX Design</a></h4>
                        <span class="published-time"><i class="fa fa-calendar"></i> 18 hrs ago</span>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="media">
                      <div class="media-left">
                        <a href="#"><img class="img-responsive" src="assets/img/blog/avatar/avatar2.jpg" alt=""></a>
                      </div>
                      <div class="media-body">
                        <h4><a href="#">The unknown mystery of Momy</a></h4>
                        <span class="published-time"><i class="fa fa-calendar"></i> 5 Days ago</span>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="media">
                      <div class="media-left">
                        <a href="#"><img class="img-responsive" src="assets/img/blog/avatar/avatar3.jpg" alt=""></a>
                      </div>
                      <div class="media-body">
                        <h4><a href="#">IMDM top 250 Movies</a></h4>
                        <span class="published-time"><i class="fa fa-calendar"></i> 6 Days ago</span>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="media">
                      <div class="media-left">
                        <a href="#"><img class="img-responsive" src="assets/img/blog/avatar/avatar4.jpg" alt=""></a>
                      </div>
                      <div class="media-body">
                        <h4><a href="#">Meteor.JS Fundamentals</a></h4>
                        <span class="published-time"><i class="fa fa-calendar"></i> 7 Days ago</span>
                      </div>
                    </div>
                  </li>
                </ul>
              </aside>
              <!-- Subscribe Widget -->
              <aside class="widget subscribe-widget wow fadeInUp" data-wow-delay="0.3s">
                <h2 class="widget-title">Subscribe</h2>
                <div class="subscribe-area">
                  <p>Subscribe to our news latter to get regular update and blog posts.</p>
                  <form class="form-group">
                    <div class="input-group">
                      <input type="email" class="form-control input-block-level" placeholder="hello@youremail.com">
                    </div>
                    <button type="submit" class="mt-10 btn btn-common btn-block">Subscribe</button>
                  </form>
                </div>
              </aside>
              <!-- Tag Cloud -->
              <aside class="widget tag-cloud wow fadeInUp" data-wow-delay="0.3s">
                <h2 class="widget-title">Categories</h2>
                <div class="clearfix">
                  <ul>
                      <?php foreach($categories as $category):?>
                    <li><a href="<?php echo site_url("home/category/{$category->category_slug}")?>"><?php echo $category->category_name?></a></li>
<?php endforeach ?>
                </ul>
                </div>
              </aside>
            </div>
          </div>
          <!-- End -->
        </div>
      </div>
    </section>