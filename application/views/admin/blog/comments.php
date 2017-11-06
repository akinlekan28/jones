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

<!-- <div class="banner">
    <h2>
        <a href="<?php echo site_url('admin/index')?>">Home</a> / <?php echo $page_title ?>/ <?php echo $page_info ?>
        <i class="fa fa-angle-right"></i>
        <?php foreach($page_links as $link => $title) : ?>
            <span><a href="<?php echo site_url($link)?>"><?php echo $title ?></a></span>
        <?php endforeach ?>
    </h2>
</div> -->
<div class="blank">
    <div class="blank-page col-md-12">
    <h4 class="text-center">View and Delete Blog comments</h4>
    <br>
        <div class="content table-responsive table-full-width">
            <table id="example" class="table table-striped datatable-example">
                <thead>
                <th>S/N</th>
                <th>Post Title</th>
                <th>Name</th>
                <th>Comment</th>
                <th>Date Added</th>
                <th>Action</th>
                </thead>
                <tbody>
                <?php
                $sn = 1;
                foreach($comments as $comment):?>
                    <tr>
                        <td><?php echo $sn ?></td>
                        <td><?php echo $comment->getPostName(); ?></td>
                        <td><?php echo $comment->name; ?></td>
                        <td><?php echo $comment->message; ?></td>
                        <td><?php echo $comment->date_added; ?></td>
                        <td><a href="#" data="<?php echo $comment->comment_id; ?>" class="delete"><i class="fa fa-trash" style="color: #EB5E28;"></i></a></td>
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
        var comment_id = $(this).attr('data');
        delete_comment(comment_id);
    });

    function delete_comment(comment_id){
        swal({
                title: "Are you sure?",
                text: "This Comment Would be removed from the blog post!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, Delete It!",
                cancelButtonText: "No, Cancel Delete!",
                closeOnConfirm: false,
                closeOnCancel: true
            },
            function() {
                var link = 'deleteComment/'+comment_id;
                $.ajax({
                    url: link,
                    type: 'DELETE',
                })
                    .done(function(data){
                            swal("Deleted" , "Comment Removed" , "success")
                        },
                        function(){
                            location.reload();
                        })
                    .error(function(data){
                        swal("Oops" , "Error Deleting Comment")
                    });
            });
    }

</script>


<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>