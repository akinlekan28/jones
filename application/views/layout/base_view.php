<?php
/**
 * Created by PhpStorm.
 * User: Olalekan
 * Date: 05/10/2017
 * Time: 9:44 PM
 */
?>
<style>
    .active {
        background-color: #9c3 !important;
        color: #ffffff !important;
    }
</style>
<?php $this->load->view('partials/header'); ?>

<?php if (is_array($view_url)): ?>
    <?php foreach ($view_url as $inner_view): ?>
        <?php $this->load->view($inner_view); ?>
    <?php endforeach; ?>
<?php else: $this->load->view($view_url); ?>
<?php endif; ?>

<?php $this->load->view('partials/footer'); ?>

<script>
    $(document).ready(function() {
        var url = window.location;
        $('ul.nav a[href="'+ url +'"]').parent().addClass('active');
        $('ul.nav a').filter(function() {
            return this.href == url;
        }).parent().addClass('active');
    });
</script>
