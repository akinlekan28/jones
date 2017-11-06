<?php
/**
 * Created by PhpStorm.
 * User: Olalekan
 * Date: 16/10/2017
 * Time: 8:38 PM
 */
?>
<?php if(isset($response)):?>
    <?php if($response == TRUE):?>
        <script type="text/javascript">
            $(document).ready(function(){
                swal({
                    title: "Success",
                    text: <?php echo json_encode($message)?>,
                    type: "success",
                })
            });
        </script>
    <?php elseif($response == FALSE):?>
        <script>
            var message = <?php echo json_encode($message)?>;
            $(document).ready(function(){
                swal({
                    title: "Success",
                    text: <?php echo json_encode($message)?>,
                    type: "danger",
                })
            });
        </script>
    <?php endif?>
<?php endif?>

<link href="<?php echo base_url()?>assets/summernote/summernote.css" rel="stylesheet" />
<link href="<?php echo base_url()?>assets/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

<div class="banner">
    <h2>
        <a href="<?php echo site_url('admin/index')?>">Home</a> / <?php echo $page_title ?>/ <?php echo $page_info ?>
        <i class="fa fa-angle-right"></i>
        <?php foreach($page_links as $link => $title) : ?>
            <span><a href="<?php echo site_url($link)?>"><?php echo $title ?></a></span>
        <?php endforeach ?>
    </h2>
</div>
<div class="blank">
    <div class="blank-page col-md-12">
        <div class="col-md-8 col-md-offset-2">

            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1">Product Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="product_name" placeholder="Product Name">
                    <p><?php echo form_error('product_name')?></p>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Product Model</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="product_model" placeholder="Product Model">
                    <p><?php echo form_error('product_model')?></p>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Product Category</label>
                   <select class="form-control" name="category_id">
                       <option value=""></option>
                       <?php foreach ($categories as $category):?>
                       <option value="<?php echo $category->category_id?>"><?php echo $category->category_name?></option>
                       <?php endforeach;?>
                   </select>
                    <p><?php echo form_error('category_id')?></p>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Product Weight</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" name="product_weight" placeholder="Product Weight">
                    <p><?php echo form_error('product_weight')?></p>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Product Description</label>
                    <textarea class="summernote" name="product_description"></textarea>
                    <p><?php echo form_error('product_description')?></p>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Pictures</label>
                    <input type="file" class="form-control" id="exampleInputEmail1" name="product_pictures">
                </div>

                <button type="submit" class="btn btn-success col-md-offset-5">Add Product</button>
            </form>
        </div>
        </div>
    </div>
<script src="<?php echo base_url()?>assets/summernote/summernote.min.js"></script>
<script src="<?php echo base_url()?>assets/select2/js/select2.min.js" type="text/javascript"></script>

<script>

    jQuery(document).ready(function(){

        $('.summernote').summernote({
            height: 240,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: false                 // set focus to editable area after initializing summernote
        });
        // Select2
        $(".select2").select2();

        $(".select2-limiting").select2({
            maximumSelectionLength: 2
        });
    });
</script>