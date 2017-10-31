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
    <div class="blank-page col-md-5">
        <form method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Category Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="category_name" placeholder="Category Name">
                <p><?php echo form_error('category_name')?></p>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Category Description</label>
                <textarea class="form-control" name="category_description" placeholder="Category Description" rols="30" cols="15"></textarea>
                <p><?php echo form_error('category_description')?></p>
            </div>

            <button type="submit" class="btn btn-success col-md-offset-4">Add Category</button>
        </form>
    </div>
    <div class="blank-page col-md-7">
        <div class="content table-responsive table-full-width">
            <table id="example" class="table table-striped datatable-example">
                <thead>
                <th>S/N</th>
                <th>Category Name</th>
                <th>Description</th>
                <th>Action</th>
                </thead>
                <tbody>
                <?php
                $sn = 1;
                foreach($categories as $category):?>
                    <tr>
                        <td><?php echo $sn ?></td>
                        <td><?php echo $category->category_name; ?></td>
                        <td><?php echo $category->category_description; ?></td>
                        <td><a href="#" data="<?php echo $category->category_id; ?>" class="delete"><i class="fa fa-trash" style="color: #EB5E28;"></i></a> <a href="<?php echo site_url("admin/editProductCategory/{$category->category_id}")?>" class="btn-form-modal" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Edit" data-target="#default" ><i class="fa fa-edit text-success"></i></a> </td>
                    </tr>
                    <?php $sn ++;
                endforeach?>
                </tbody>
            </table>

        </div>
    </div>
</div>

<script>
    $('.delete').click(function (){
        var category_id = $(this).attr('data');
        delete_category(category_id);
    });

    function delete_category(category_id){
        swal({
                title: "Are you sure?",
                text: "You will not be able to recover this Product Category!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, Delete It!",
                cancelButtonText: "No, Cancel Delete!",
                closeOnConfirm: false,
                closeOnCancel: true
            },
            function() {
                var link = 'deleteProductCategory/'+category_id;
                $.ajax({
                    url: link,
                    type: 'DELETE',
                })
                    .done(function(data){
                            swal("Deleted" , "Product Removed" , "success")
                        },
                        function(){
                            location.reload();
                        })
                    .error(function(data){
                        swal("Oops" , "Error Deleting Product Category")
                    });
            });
    }

</script>


<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>