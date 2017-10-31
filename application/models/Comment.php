<?php

/**
 * Created by PhpStorm.
 * User: Olalekan
 * Date: 30/10/2017
 * Time: 6:15 AM
 */
class Comment extends MY_Model
{
    public $comment_id;

    public $post_id;

    public $name;

    public $email;

    public $message;

    public $date_added;

    public $is_delete;

    protected $table = 'comment';

    protected $primary = 'comment_id';

    public $columns = array(

        'comment_id'=> array(
            'type' => 'INT',
            'constraint' => 11,
            'unsigned' => TRUE,
            'auto_increment'=> TRUE,
        ),

        'post_id' =>array(
            'type' => 'INT',
            'constraint'=> 11,
            'null' => FALSE,
        ),

        'name' =>array(
            'type' => 'VARCHAR',
            'constraint'=> 100,
            'null' => FALSE,
        ),

        'email' =>array(
            'type' => 'VARCHAR',
            'constraint'=> 200,
        ),

        'message' =>array(
            'type' => 'VARCHAR',
            'constraint'=> 300,
            'null' => FALSE,
        ),

        'date_added' => array(
            'type' => 'DATE',
            'null' => FALSE,
        ),

        'is_delete' => array(
            'type' => 'INT',
            'constraint' => 11,
            'default' => 0,
        ),

    );
}