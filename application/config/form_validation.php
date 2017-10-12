<?php
/**
 * Created by PhpStorm.
 * User: Olalekan
 * Date: 19/09/2017
 * Time: 10:50 PM
 */

$config = array(

    'addcat' => array(
        array(
            'field' => 'category_name',
            'label' => 'Category Name',
            'rules' => 'required'
         ),

        array(
            'field' => 'category_description',
            'label' => 'Category Description',
            'rules' => 'required'
         ),
    ),


);

$config['error_prefix'] = '<div class="badge" style="color: #ffffff;">';
$config['error_suffix'] = '</div>';
