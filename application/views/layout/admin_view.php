<?php
/**
 * Created by PhpStorm.
 * User: Olalekan
 * Date: 12/10/2017
 * Time: 1:40 AM
 */
?>
<?php $this->load->view('partials/admin_header'); ?>

<?php if (is_array($view_url)): ?>
    <?php foreach ($view_url as $inner_view): ?>
        <?php $this->load->view($inner_view); ?>
    <?php endforeach; ?>
<?php else: $this->load->view($view_url); ?>
<?php endif; ?>

<?php $this->load->view('partials/admin_footer'); ?>
