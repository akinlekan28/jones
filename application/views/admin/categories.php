<?php
/**
 * Created by PhpStorm.
 * User: Olalekan
 * Date: 12/10/2017
 * Time: 1:29 AM
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
    <div class="blank-page col-md-7 col-md-offset-2">
        <form method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Category Name</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="category_name" placeholder="Category Name">
                <p><?php echo form_error('category_name')?></p>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Category Description</label>
                <textarea class="form-control" name="category_description" placeholder="Category Description" rols="30" cols="15"></textarea>
                <p><?php echo form_error('category_description')?></p>
            </div>

            <button type="submit" class="btn btn-success col-md-offset-5">Add Category</button>
        </form>
    </div>
</div>


