<?php
/**
 * Created by PhpStorm.
 * User: Olalekan
 * Date: 12/10/2017
 * Time: 1:40 AM
 */
?>
<div class="modal fade in text-xs-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel1"></h4>
            </div>
            <div class="modal-body">
                <iframe id="modal-frame" width="100%"  style="height: 400px" src=""></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
    @media screen and (min-width: 768px){
        .modal-dialog {
            width: 1000px;
            padding-top: 30px;
            padding-bottom: 30px;
        }
    }

</style>
<?php $this->load->view('partials/admin_header'); ?>

<?php if (is_array($view_url)): ?>
    <?php foreach ($view_url as $inner_view): ?>
        <?php $this->load->view($inner_view); ?>
    <?php endforeach; ?>
<?php else: $this->load->view($view_url); ?>
<?php endif; ?>

<?php $this->load->view('partials/admin_footer'); ?>

<script>
    $(document).ready(function () {
        $('.btn-form-modal').click(function(e){
            e.preventDefault();
            // get the url to open
            var url = $(this).attr('href');
            if(url){
                console.log("Launching modal and changing the iframe url to "+url);
                $('#modal-frame').attr('src' , url);
                $('#default').modal();
            }
        });
    });
</script>
