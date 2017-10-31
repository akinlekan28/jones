<style>
.bg-color {
	background-color: #1abc9c;
	color: #ffffff;
}
</style>

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
				<a href="index.html">Home</a>
				<i class="fa fa-angle-right"></i>
				<span>Dashboard</span>
				</h2>
		    </div>
		<!--//banner-->
		<!--content-->
<div class="blank">
    <div class="col-sm-12">
        <div class="blank-page col-sm-3 bg-color">
            <p style="color: #ffffff">Products</p> <?php echo $products ?>
        </div>
		<div class="blank-page col-sm-3 bg-color">
            <p style="color: #ffffff">Categories</p> <?php echo $categories ?>
        </div>
		<div class="blank-page col-sm-3 bg-color">
            <p style="color: #ffffff">Posts</p> <?php echo $posts ?>
        </div>
		<div class="blank-page col-sm-3 bg-color">
            <p style="color: #ffffff">Comments</p> 66
        </div>
    </div>
	<br><br><br>
	<div class="col-sm-12" >
	<br>
	<p class="text-center" style="font-size: 20px;">Users Table</p>
	<div class="content table-responsive table-full-width">
            <table id="example" class="table table-striped datatable-example " style="background-color: #3BB2D0; color:#ffffff;">
                <thead>
                <th style="color: #ffffff">S/N</th>
                <th style="color: #ffffff">Full Name</th>
                <th style="color: #ffffff">Email</th>
                <th style="color: #ffffff">Privilege</th>
                <th style="color: #ffffff">Date Registered</th>
                <th style="color: #ffffff">Action</th>
                </thead>
                <tbody>
                <?php
                $sn = 1;
                foreach($users as $user):?>
                    <tr>
                        <td><?php echo $sn ?></td>
                        <td><?php echo $user->firstname . " " . $user->lastname; ?></td>
						<td><?php echo $user->email; ?></td>
                        <td><?php echo $user->privilege; ?></td>
                        <td><?php echo $user->date_registered; ?></td>
                        <td> <?php if($u->user_id !== $user->user_id ):?>
						<a href="#" data="<?php echo $user->user_id; ?>" class="delete"><i class="fa fa-trash" style="color: #EB5E28;"></i></a>
		<?php else: ?>
		<p>No action needed for current user</p>
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
                var link = 'admin/deleteUser/'+user_id;
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