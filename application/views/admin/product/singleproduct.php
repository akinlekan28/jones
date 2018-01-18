<?php
/**
 * Created by PhpStorm.
 * User: Olalekan
 * Date: 06/11/2017
 * Time: 9:15 PM
 */
?>
<script src="<?php echo base_url();?>assets/js/jquery-min.js"></script>
<script src="<?php echo base_url();?>adminassets/js/notify.min.js"></script>

<?php if(isset($response)):?>
    <?php if($response == TRUE):?>
        <script type="text/javascript">
            $(document).ready(function(){
                $.notify("Order Successfully Placed", "success");
            });
        </script>
    <?php elseif($response == FALSE):?>
        <script>
            $(document).ready(function(){
                $.notify("Error Placing Order", "error");
            });
        </script>
    <?php endif?>
<?php endif?>

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
                            <p><h6>SKU: </h6><?php echo $product->sku?>
                            <p><h6>Product Weight: </h6><?php echo $product->product_weight?> KG
                            <p> <h6>Product Price: </h6><?php echo $product->product_price?>
                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="messages">
                            <p>Repulsive questions contented him few extensive supported. Of remarkably thoroughly he appearance in. Supposing tolerably applauded or of be. Suffering unfeeling so objection agreeable allowance me of. Ask within entire season sex common far who family. As be valley warmth assure on. Park girl they rich hour new well way you. Face ye be me been room we sons fond.</p>
                            <p>Yourself required no at thoughts delicate landlord it be. Branched dashwood do is whatever it. Farther be chapter at visited married in it pressed. By distrusts procuring be oh frankness existence believing instantly if. Doubtful on an juvenile as of servants insisted</p>
                        </div>
                    </div>
                </div>
                <br>
                <input type="submit" style="background-color:#9c3;" class="btn" value="Place Order" data-toggle="modal" data-target="#order">
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="order" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-md-center" style="color:#9c3;">Order Form</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form method="post">
                <div class="modal-body">
                    <div class="form-group>">
                        <label for="email">Full Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>

                    <div class="form-group>">
                        <label for="email">Phone Number</label>
                        <input type="text" class="form-control" name="phone" required>
                    </div>

                    <div class="form-group>">
                        <label for="email">Address</label>
                        <input type="text" class="form-control" name="address" required>
                    </div>

                    <div class="form-group>">
                        <label for="password">Quantity</label>
                        <input type="number" class="form-control" name="quantity" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <input type="submit" style="background-color:#9c3;" class="btn" name="order" value="Submit">  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>