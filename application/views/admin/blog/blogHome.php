<section id="blog" class="section">
      <!-- Container Starts -->
      <div class="container">  
        <h1 class="section-title wow fadeInUpQuick">
          Edtel's Amazing Blog
        </h1>
        <p class="section-subcontent" style="font-size:17px;">Always check to be better informed as we would be dishing out tutorials, manuals and free support.</p>     
        <!-- Row Starts -->
        <div class="row">    
            <?php foreach($blogPosts as $blogPost):?>      
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <!-- Blog Item Starts -->
            <div class="blog-item-wrapper wow fadeIn" data-wow-delay="0.3s">
              <div class="blog-item-img">
                <a href="<?php echo site_url("home/blog_post/{$blogPost->slug_title}")?>">
                  <img src="<?php echo base_url($blogPost->post_pictures)?>" alt="post-img" class="img-responsive" style="width:100%; height:200;">
                </a>   
              </div>
              <div class="blog-item-text">
                <h3 class="small-title"><a href="<?php echo site_url("home/blog_post/{$blogPost->slug_title}")?>"><?php echo $blogPost->post_title?></a></h3>
                <p>
                  <?php echo word_limiter($blogPost->post_description, 12)?>
                </p>
                <div class="blog-one-footer">
                  <a href="<?php echo site_url("home/blog_post/{$blogPost->slug_title}")?>">Read More</a>
                  <i class="icon-bubbles"></i> <?php echo $comment?> Comments 
                  <form method="get"> 
                  <input type="hidden" value=<?php echo $blogPost->post_id ?> name="comment"?>
                  </form>               
                </div>
              </div>
            </div><!-- Blog Item Wrapper Ends-->
            &nbsp;
          </div>
<?php endforeach;?>

</div><!-- Row Ends -->
      </div><!-- Container Ends -->
    </section>