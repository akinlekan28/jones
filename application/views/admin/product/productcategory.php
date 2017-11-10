<section id="blog" class="section">
    <!-- Container Starts -->
    <div class="container">
        <h1 class="section-title wow fadeInUpQuick">
            Product Category Listing
        </h1>
        <p class="section-subcontent" style="font-size:17px;">Our products are displayed with the most recent coming first and based on the category selected.</p>
        <!-- Row Starts -->
        <div class="row">
            <?php foreach($productcategories as $productcategory):?>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <!-- Blog Item Starts -->
                    <div class="blog-item-wrapper wow fadeIn" data-wow-delay="0.3s">
                        <div class="blog-item-img">
                            <a href="<?php echo site_url("home/product_details/{$productcategory->product_slug}")?>">
                                <img src="<?php echo base_url($productcategory->product_pictures)?>" alt="post-img" class="img-responsive" style="width:100%; height:200;">
                            </a>
                        </div>
                        <div class="blog-item-text">
                            <h3 class="small-title"><a href="<?php echo site_url("home/product_details/{$productcategory->product_slug}")?>"><?php echo $productcategory->product_name?></a></h3>
                            <p>
                                <?php echo word_limiter($productcategory->product_description, 12)?>
                            </p>
                            <div class="blog-one-footer">
                                <a href="<?php echo site_url("home/product_details/{$productcategory->product_slug}")?>"> View product details</a>
                                &nbsp;&nbsp;<i class="fa fa-money"></i>  <?php echo $productcategory->product_price?>
                            </div>
                        </div>
                    </div><!-- Blog Item Wrapper Ends-->
                    &nbsp;
                </div>
            <?php endforeach;?>

        </div><!-- Row Ends -->
    </div><!-- Container Ends -->
</section>