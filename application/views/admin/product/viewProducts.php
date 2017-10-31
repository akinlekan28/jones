<?php
/**
 * Created by PhpStorm.
 * User: Olalekan
 * Date: 17/10/2017
 * Time: 12:36 AM
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
    <div class="blank-page col-md-12">
        <div class="content table-responsive table-full-width">
            <table id="example" class="table table-striped datatable-example">
                <thead>
                <th>S/N</th>
                <th>Product Picture</th>
                <th>Product Name</th>
                <th>Product Model</th>
                <th>Product Category</th>
                <th>Date Created</th>
                <th>Action</th>
                </thead>
                <tbody>
                <?php
                $sn = 1;
                foreach($products as $product):?>
                    <tr>
                        <td><?php echo $sn ?></td>
                        <td><img src="<?php echo base_url("$product->product_pictures")?>" style="height:100px; width:100px;"></td>
                        <td><?php echo $product->product_name; ?></td>
                        <td><?php echo $product->product_model; ?></td>
                        <td><?php echo $product->getCategory(); ?></td>
                        <td><?php echo $product->date_added; ?></td>
                        <td><a href="#" data="<?php echo $product->product_id; ?>" class="delete"><i class="fa fa-trash" style="color: #EB5E28;"></i></a> <a href="<?php echo site_url("admin/editProduct/{$product->product_id}")?>" class="btn-form-modal" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Edit" data-target="#default" ><i class="fa fa-edit text-success"></i></a> </td>
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
                text: "You will not be able to recover this Product Information!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, Delete It!",
                cancelButtonText: "No, Cancel Delete!",
                closeOnConfirm: false,
                closeOnCancel: true
            },
            function() {
                var link = 'deleteProduct/'+category_id;
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
                        swal("Oops" , "Error Deleting Product")
                    });
            });
    }

</script>


<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
