<?php
/**
 * Created by PhpStorm.
 * User: Olalekan
 * Date: 24/10/2017
 * Time: 4:36 PM
 */
?>

<?php $this->load->view('partials/modalHeader'); ?>
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

<div class="blank">
    <div class="blank-page col-md-6">
        <h4 class="text-center">Edit Blog Post</h4>
        <br>

        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleInputEmail1">Post Title</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="post_title" value="<?php echo $post->post_title?>">
                <p><?php echo form_error('post_title')?></p>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Featured Product Category</label>
                <select class="form-control" name="category_id">
                    <option value="<?php echo $post->category_id?>"><?php echo $post->getCategory()?></option>
                    <?php foreach ($categories as $category):?>
                        <option value="<?php echo $category->category_id?>"><?php echo $category->category_name?></option>
                    <?php endforeach;?>
                </select>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Post Description</label>
                <textarea class="summernote" name="post_description"><?php echo $post->post_description?></textarea>
                <p><?php echo form_error('post_description')?></p>
            </div>

            <div class="form-group">
                <label for="eventRegInput1">Current Picture</label> &nbsp;
                <img src="<?php echo base_url($post->post_pictures)?>" style="height:120; width:170;">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Pictures</label>
                <input type="file" class="form-control" id="exampleInputEmail1" name="post_pictures">
            </div>

            <button type="submit" class="btn btn-success col-md-offset-5">Edit Post</button>
        </form>
    </div>
</div>

<?php $this->load->view('partials/modalFooter'); ?>

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