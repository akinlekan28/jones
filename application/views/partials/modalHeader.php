<?php
/**
 * Created by PhpStorm.
 * User: Olalekan
 * Date: 16/10/2017
 * Time: 8:19 PM
 */
?>
<link href="<?php echo base_url()?>adminassets/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="<?php echo base_url(); ?>adminassets/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="<?php echo base_url()?>adminassets/css/style.css" rel='stylesheet' type='text/css' />
<link href="<?php echo base_url()?>adminassets/css/font-awesome.css" rel="stylesheet">
<link href="<?php echo base_url();?>adminassets/css/sweetalert.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url()?>adminassets/js/jquery.min.js"> </script>
<script src="<?php echo base_url()?>adminassets/js/bootstrap.min.js"> </script>

<!-- Mainly scripts -->
<script src="<?php echo base_url()?>adminassets/js/jquery.metisMenu.js"></script>
<script src="<?php echo base_url()?>adminassets/js/jquery.slimscroll.min.js"></script>
<!-- Custom and plugin javascript -->
<link href="<?php echo base_url()?>adminassets/css/custom.css" rel="stylesheet">
<script src="<?php echo base_url()?>adminassets/js/custom.js"></script>
<script src="<?php echo base_url()?>adminassets/js/screenfull.js"></script>
<script>
    $(function () {
        $('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

        if (!screenfull.enabled) {
            return false;
        }



        $('#toggle').click(function () {
            screenfull.toggle($('#container')[0]);
        });



    });
</script>
