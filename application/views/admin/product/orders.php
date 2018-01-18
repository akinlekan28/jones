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
                <th>Buyer Name</th>
                <th>Delivery Address</th>
                <th>Product name</th>
                <th>Quantity
                <th>Price</th>
                <th>SKU</th>
                <th>Date Ordered</th>
                <th>Status</th>
                </thead>
                <tbody>
                <?php
                $sn = 1;
                foreach($orders as $order):?>
                    <tr>
                        <td><?php echo $sn ?></td>
                        <td><?php echo $order->name; ?></td>
                        <td><?php echo $order->address; ?></td>
                        <td><?php echo $order->getProduct() ?></td>
                        <td><?php echo $order->quantity; ?></td>
                        <td>&nbsp;N<?php echo $order->price ?></td>
                        <td><?php echo $order->sku; ?></td>
                        <td><?php echo $order->date_added; ?></td>
                        <td><?php if($order->is_delete == 0): ?>
                                    <a href="#" data="<?php echo $order->order_id?>" class="delete"><span class="text-warning badge">Mark as Delivered</span></a>
                            <?php else:?>
                            <span class="text-success badge">Delivered</span>
                            <?php endif ?>
                        </td>
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
        var order_id = $(this).attr('data');
        approve_order(order_id);
    });

    function approve_order(order_id){
        swal({
                title: "Are you sure?",
                text: "You are trying to confirm delivery of this product!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#9c3",
                cancelButtonColor: "#bb0000",
                confirmButtonText: "Yes, It has been deliverd!",
                cancelButtonText: "No, Cancel!",
                closeOnConfirm: false,
                closeOnCancel: true
            },
            function() {
                var link = 'orderDelivered/'+order_id;
                $.ajax({
                    url: link,
                    type: 'DELETE',
                })
                    .done(function(data){
                            swal("Delivered" , "Product Marked as delivered" , "success")
                        },
                        function(){
                            location.reload();
                        })
                    .error(function(data){
                        swal("Oops" , "Error marking product as delivered")
                    });
            });
    }

</script>


<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
