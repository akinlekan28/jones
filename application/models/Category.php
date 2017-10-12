<?php

/**
 * Created by PhpStorm.
 * User: Olalekan
 * Date: 12/10/2017
 * Time: 9:16 AM
 */
class Category extends MY_Model
{
    public $category_id;

    public $category_name;

    public $category_description;

    public $date_added;

    public $user_id;

    public $is_delete;

    protected $table = 'category';

    protected $primary = 'category_id';

    public $columns = array(

        'category_id'=> array(
            'type' => 'INT',
            'constraint' => 11,
            'unsigned' => TRUE,
            'auto_increment'=> TRUE,
        ),

        'category_name' =>array(
            'type' => 'VARCHAR',
            'constraint'=> 300,
            'null' => FALSE,
        ),

        '$category_description' =>array(
            'type' => 'VARCHAR',
            'constraint'=> 300,
            'null' => FALSE,
        ),

        'date_added' => array(
            'type' => 'VARCHAR',
            'constraint' => 300,
            'null' => FALSE
        ),

        'user_id' =>array(
            'type' => 'int',
            'constraint' => 11,
            'null' => FALSE,
        ),

        'is_delete' => array(
            'type' => 'INT',
            'constraint' => 11,
            'default' => 0,
        ),

    );
}