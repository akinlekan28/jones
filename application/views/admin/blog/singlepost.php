<script src="<?php echo base_url();?>assets/js/jquery-min.js"></script>
<script src="<?php echo base_url();?>adminassets/js/notify.min.js"></script>

<?php if(isset($response)):?>
    <?php if($response == TRUE):?>
        <script type="text/javascript">
            $(document).ready(function(){
                $.notify("Comment Successfully Submitted", "success");
            });
        </script>
    <?php elseif($response == FALSE):?>
        <script>
            $(document).ready(function(){
                $.notify("Error Submitting Comment", "error");
            });
        </script>
    <?php endif?>
<?php endif?>

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
                    <!-- <div class="media-left">
                      <a href="#"><img class="img-circle img-responsive" src="assets/img/blog/avatar/avatar1.jpg" alt=""></a>
                    </div> -->
                    <div class="media-body">
                      <span class="author-name"><b><?php echo $post->getAuthor()?></b></span><br>
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

                  <p><?php echo $post->post_description?></p>
                </div>
              </section>
            </article>
        
            <!-- About Author -->
            <section class="about-author-section mt-10">
                <div class="media wow fadeIn" data-wow-delay="0.3s">
                  <div class="media-left">
                    <a href="#"><img class="img-circle img-responsive" src="<?php echo base_url()?>/assets/img/jones.jpg" alt="" width="70px" height="70px"></a>
                  </div>
                  <div class="media-body">
                    <h4>About Writter</h4>
                    <p>JONES EDIANABASI UKO is the MD/CEO EDTEL Integrated System Solutions, Lagos, Nigeria. A leading Security, IT and Telecommunication solution provider. He is a UK Certified Professional in Health Safety and Environment (H.S.E.) from Novelle Institute. He is also a COMPTIA Certified Network Administrator (N+), a Nokia Certified IPRAN Engineer.</p>
                  </div>
                </div>
            </section>
            <div class="similar-post mt-30 clearfix">
              <h3 class="small-title mb-40 wow fadeIn" data-wow-delay="0.3s">Similar Post</h3>
              
              <div class="row">
              <?php foreach($similarPosts as $similarPost):?>
                <div class="col-md-3 wow fadeIn" data-wow-delay="0.4s">
                  <a href="<?php echo site_url("home/blog_post/{$similarPost->slug_title}")?>"><img src="<?php echo base_url($similarPost->post_pictures)?>" alt="" class="img-responsive" style="width:100%; height:150;"></a>
                  <a href="<?php echo site_url("home/blog_post/{$similarPost->slug_title}")?>"><h2><?php echo $similarPost->post_title?></h2></a>
                </div>    
                 <?php endforeach; ?>            
              </div>
            </div>
            <div class="comments-area clearfix mt-50 wow fadeInUp" data-wow-delay="0.3s">
              <h3 class="small-title"><i class="fa fa-comment"></i> Comments</h3>
              <?php foreach ($comments as $comment):?>
              <ul class="media-left comment-list mt-30">
                <li class="media">
                  <div class="media-body media-reply">
                    <div class="commentor-info">
                      <div class="comment-author">
                        <a href="#"><?php echo $comment->name?></a>
                        <span class="published-time"><i class="fa fa-calendar"></i><?php echo $comment->date_added?></span>
                      </div>
                      <p><?php echo $comment->message?></p>
                    </div>
                  </div>
                </li>
          <?php endforeach;?>

              </ul>
              <div class="new-comment mt-50">
                <h3 class="small-title">Post new Comment</h3>
                <form class="mt-30" method="post">
                  <div class="row">
                    <div class="col-md-4 ">
                      <div class="form-group">
                        <label class="sr-only" for="username">Name <span class="text-danger">*</span></label>
                        <input type="text" placeholder="Full Name" id="username" required="" class="form-control" name="name">
                          <p><?php echo form_error('name')?></p>
                      </div>
                    </div><!-- /.col-md-4  -->
                    <div class="col-md-8 ">
                      <div class="form-group">
                        <label class="sr-only" for="useremail">Email</label>
                        <input type="email" placeholder="Email Address" id="useremail" class="form-control" name="email">
                      </div>
                    </div><!-- /.col-md-4  -->

                  </div><!-- /.col-md-4  -->
                  <div class="form-group">
                    <label class="sr-only" for="usermessage">Message <span class="text-danger">*</span></label>
                    <textarea placeholder="Type here message" id="usermessage" rows="7" required="" class="form-control" name="message"></textarea>
                      <p><?php echo form_error('message')?></p>
                  </div> 
                  <button class="btn btn-common" type="submit" name="submit"><i class="fa fa-comment"></i> Post Comment</button>
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
           
              <!-- Recent Post Widgets -->
              <aside class="widget popular-post wow fadeInUp" data-wow-delay="0.3s">
                <h2 class="widget-title">Popular Post</h2>
                <ul>
                <?php foreach ($popularPosts as $popularPost):?>
                  <li>
                    <div class="media">
                      <div class="media-left">
                        <a href="<?php echo site_url("home/blog_post/{$popularPost->slug_title}")?>"><img class="img-responsive popular-thumb" src="<?php echo base_url($popularPost->post_pictures)?>" alt=""></a>
                      </div>
                      <div class="media-body">
                        <h4><a href="<?php echo site_url("home/blog_post/{$popularPost->slug_title}")?>"><?php echo $popularPost->post_title?></a></h4>
                        <span class="published-time"><i class="fa fa-calendar"></i> <?php echo $popularPost->date_added?></span>
                      </div>
                    </div>
                  </li>
          <?php endforeach;?>

                </ul>
              </aside>
              <!-- Subscribe Widget -->
              <aside class="widget subscribe-widget wow fadeInUp" data-wow-delay="0.3s">
                <h2 class="widget-title">Subscribe</h2>
                <div class="subscribe-area">
                  <p>Subscribe to our news letters to get regular updates and blog posts.</p>
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
                    <li><a href="<?php echo site_url("home/blog_category/{$category->category_slug}")?>"><?php echo $category->category_name?></a></li>
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