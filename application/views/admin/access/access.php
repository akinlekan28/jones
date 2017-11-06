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
<div class="blank-page col-md-12">
<h4 class="text-center">Change User Access Level</h4>
</div>
    <div class="blank-page col-md-5">
        <form method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">User Name</label>
                <select class="form-control" name="user_id">
                    <option value="">Select</option>
                    <?php foreach ($users as $user):?>
                    <option value="<?php echo $user->user_id?>"><?php echo $user->firstname . " ". $user->lastname?></option>
                    <?php endforeach;?>
                </select>
                <p><?php echo form_error('user_id')?></p>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Access Level</label>
                <select class="form-control" name="privilege">
                    <option value="">Select</option>
                    <option value="Admin">Admin</option>
                    <option value="Staff">Staff</option>
                </select>
                <p><?php echo form_error('privilege')?></p>
            </div>

            <button type="submit" class="btn btn-success col-md-offset-3">Change Access Level</button>
        </form>
    </div>
    <div class="blank-page col-md-7">
        <div class="content table-responsive table-full-width">
            <table id="example" class="table table-striped datatable-example">
                <thead>
                <th>S/N</th>
                <th>Name</th>
                <th>Privilege</th>
                <th>Action</th>
                </thead>
                <tbody>
                <?php
                $sn = 1;
                foreach($users as $user):?>
                    <tr>
                        <td><?php echo $sn ?></td>
                        <td><?php echo $user->firstname . " ". $user->lastname?></td>
                        <td><?php echo $user->privilege; ?></td>
                        <td><?php if($u->user_id == $user->user_id):?>
                            <a href="#" hidden data="<?php echo $user->user_id; ?>" class="delete"><i class="fa fa-trash" style="color: #EB5E28;"></i></a>
                            <?php else: ?>
                            <a href="#" data="<?php echo $user->user_id; ?>" class="delete"><i class="fa fa-trash" style="color: #EB5E28;"></i></a>
                            <?php endif;?>
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
        var user_id = $(this).attr('data');
        deleteUser(user_id);
    });

    function deleteUser(user_id){
        swal({
                title: "Are you sure?",
                text: "You will not be able to recover this User Information!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, Delete It!",
                cancelButtonText: "No, Cancel Delete!",
                closeOnConfirm: false,
                closeOnCancel: true
            },
            function() {
                var link = 'deleteUser/'+user_id;
                $.ajax({
                    url: link,
                    type: 'DELETE',
                })
                    .done(function(data){
                            swal("Deleted" , "User Removed" , "success")
                        },
                        function(){
                            location.reload();
                        })
                    .error(function(data){
                        swal("Oops" , "Error Removing User")
                    });
            });
    }

</script>


<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>