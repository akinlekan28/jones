<?php

/**
 * Created by PhpStorm.
 * User: Olalekan
 * Date: 16/10/2017
 * Time: 9:27 PM
 */
class Product extends MY_Model
{
    public $product_id;

    public $product_name;

    public $product_model;

    public $product_description;

    public $product_pictures;

    public $category_id;

    public $product_slug;

    public $date_added;

    public $date_edited;

    public $user_id;

    public $is_delete;

    protected $primary = 'product_id';

    protected $table = 'product';

    public $columns = array(

        'product_id'=> array(
            'type' => 'INT',
            'constraint' => 11,
            'unsigned' => TRUE,
            'auto_increment'=> TRUE,
        ),

        'product_name' =>array(
            'type' => 'VARCHAR',
            'constraint'=> 300,
            'null' => FALSE,
        ),

        'product_model' =>array(
            'type' => 'VARCHAR',
            'constraint'=> 100,
            'null' => FALSE,
        ),

        'product_description' =>array(
            'type' => 'VARCHAR',
            'constraint'=> 300,
            'null' => FALSE,
        ),

        'product_pictures' =>array(
            'type' => 'VARCHAR',
            'constraint'=> 500,
            'null' => FALSE,
        ),

        'category_id' =>array(
            'type' => 'INT',
            'constraint' => 11,
            'null' => FALSE,
        ),

        'product_slug' =>array(
            'type' => 'VARCHAR',
            'constraint'=> 300,
            'null' => FALSE,
        ),

        'date_added' => array(
            'type' => 'DATE',
            'null' => FALSE
        ),

        'date_edited' => array(
            'type' => 'DATE',
            'null' => FALSE
        ),

        'user_id' =>array(
            'type' => 'INT',
            'constraint' => 11,
            'null' => FALSE,
        ),

        'is_delete' => array(
            'type' => 'INT',
            'constraint' => 11,
            'default' => 0,
        ),

    );

    public function getCategory($category_id = NULL)
    {
        if ($category_id) {
            $category = $this->category->getOne('', array('is_delete' => 0, 'category_id' => $category_id));
            if ($category->category_id) {
                return $category->category_name;
            } else {
                return NULL;
            }
        } else {
            $category = $this->category->getOne('', array('is_delete' => 0, 'category_id' => $this->category_id));
            if ($category->category_id) {
                return $category->category_name;
            } else {
                return NULL;
            }
        }
    }
}