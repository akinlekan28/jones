<div class="page-header-section">
      <div class="container">
        <div class="row">
          <div class="page-header-area">
            <div class="page-header-content">
              <h2 class="text-center">Blog Category</h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    <section id="blog" class="section">
      <div class="container">
        <div class="row">    
            <?php foreach($blogcategories as $blogcategory):?>      
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <!-- Blog Item Starts -->
            <div class="blog-item-wrapper wow fadeIn" data-wow-delay="0.3s">
              <div class="blog-item-img">
                <a href="<?php echo site_url("home/singlepost/{$blogcategory->slug_title}")?>">
                  <img src="<?php echo base_url($blogcategory->post_pictures)?>" alt="post-img" class="img-responsive" style="width:100%; height:200;">
                </a>   
              </div>
              <div class="blog-item-text">
                <h3 class="small-title"><a href="<?php echo site_url("home/singlepost/{$blogcategory->slug_title}")?>"><?php echo $blogcategory->post_title?></a></h3>
                <p>
                  <?php echo word_limiter($blogcategory->post_description, 12)?>
                </p>
                <div class="blog-one-footer">
                  <a href="<?php echo site_url("home/singlepost/{$blogcategory->slug_title}")?>">Read More</a>
                  <!-- <i class="icon-bubbles"></i>  Comments                 -->
                </div>
              </div>
            </div><!-- Blog Item Wrapper Ends-->
            &nbsp;
          </div>
<?php endforeach;?>
      </div>
    </section>  