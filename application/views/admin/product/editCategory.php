<?php
/**
 * Created by PhpStorm.
 * User: Olalekan
 * Date: 16/10/2017
 * Time: 5:10 PM
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
<div class="blank">
<div class="blank-page col-md-6">
    <form method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">Category Name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="category_name" value="<?php echo $category->category_name ?>">
            <p><?php echo form_error('category_name')?></p>
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Category Description</label>
            <textarea class="form-control" name="category_description" rols="30" cols="15"><?php echo $category->category_description ?></textarea>
            <p><?php echo form_error('category_description')?></p>
        </div>

        <button type="submit" class="btn btn-success">Add Category</button>
    </form>
</div>
</div>

<?php $this->load->view('partials/modalFooter'); ?>