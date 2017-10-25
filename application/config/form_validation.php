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

    'product' => array(
        array(
            'field' => 'product_name',
            'label' => 'Product Name',
            'rules' => 'required'
        ),

        array(
            'field' => 'product_model',
            'label' => 'Product Model',
            'rules' => 'required'
        ),

        array(
            'field' => 'product_description',
            'label' => 'Product Description',
            'rules' => 'required'
        ),

        array(
            'field' => 'category_id',
            'label' => 'Category Description',
            'rules' => 'required'
        ),
    ),

    'blogpost' => array(
        array(
            'field' => 'post_title',
            'label' => 'Post Title',
            'rules' => 'required'
        ),

        array(
            'field' => 'post_description',
            'label' => 'Product Description',
            'rules' => 'required'
        ),

    ),


);

$config['error_prefix'] = '<div class="badge" style="color: #ffffff;">';
$config['error_suffix'] = '</div>';
