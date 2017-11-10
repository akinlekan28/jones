<?php
/**
 * Created by PhpStorm.
 * User: Olalekan
 * Date: 06/11/2017
 * Time: 9:15 PM
 */
?>

<div class="page-header-section">
    <div class="container">
        <div class="row">
            <div class="page-header-area">
                <div class="page-header-content">
                    <h2 class="text-center">Product Details</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="section">
    <div class="container wow fadeIn" data-wow-delay="0.3s">
        <h1 class="section-title"><?php echo $product->product_name?></h1>
        <div class="row">
            <div class="col-md-6 about2-intro-image">
                <img src="<?php echo base_url($product->product_pictures)?>" style="width: 100%; height: 400px;" alt="">
            </div>
            <div class="col-md-6">
                <div id="default-tab" class="mt-10">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item"><a class="nav-link active" href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
                        <li class="nav-item"><a class="nav-link" href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Product Policy</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">
                        <?php echo $product->product_description?>
                            <p><h6>SKU: </h6><?php echo $product->sku?> </p>
                            <p><h6>Product Weight: </h6><?php echo $product->product_weight?> KG </p>
                            <p> <h6>Product Price: </h6><?php echo $product->product_price?> </p>
                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="messages">
                            <p>Repulsive questions contented him few extensive supported. Of remarkably thoroughly he appearance in. Supposing tolerably applauded or of be. Suffering unfeeling so objection agreeable allowance me of. Ask within entire season sex common far who family. As be valley warmth assure on. Park girl they rich hour new well way you. Face ye be me been room we sons fond.</p>
                            <p>Yourself required no at thoughts delicate landlord it be. Branched dashwood do is whatever it. Farther be chapter at visited married in it pressed. By distrusts procuring be oh frankness existence believing instantly if. Doubtful on an juvenile as of servants insisted</p>
                        </div>
                    </div>
                </div>
                <input type="submit" class="btn btn-success" name="order" value="Place Order">
            </div>
        </div>
    </div>
</section>
