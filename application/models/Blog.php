<?php

/**
 * Created by PhpStorm.
 * User: Olalekan
 * Date: 23/10/2017
 * Time: 11:50 AM
 */
class Blog extends MY_Model
{
    public $post_id;

    public $post_title;

    public $category_id;

    public $post_description;

    public $slug_title;

    public $post_pictures;

    public $date_added;

    public $date_edited;

    public $user_id;

    public $is_delete;

    protected $primary = 'post_id';

    protected $table = 'blog';


    public $columns = array(

        'post_id'=> array(
            'type' => 'INT',
            'constraint' => 11,
            'unsigned' => TRUE,
            'auto_increment'=> TRUE,
        ),

        'post_title' =>array(
            'type' => 'VARCHAR',
            'constraint'=> 300,
            'null' => FALSE,
        ),

        'post_description' =>array(
            'type' => 'VARCHAR',
            'constraint'=> 300,
            'null' => FALSE,
        ),

        'post_pictures' =>array(
            'type' => 'VARCHAR',
            'constraint'=> 500,
            'null' => FALSE,
        ),

        'category_id' =>array(
            'type' => 'INT',
            'constraint' => 11,
            'null' => FALSE,
        ),

        'slug_title' =>array(
            'type' => 'VARCHAR',
            'constraint' => 350,
            'null' => FALSE
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

    public function getAuthor($user_id = NULL)
    {
        if ($user_id) {
            $user = $this->users->getOne('', array('is_delete' => 0, 'user_id' => $user_id));
            if ($user->user_id) {
                return $user->firstname . " " . $user->lastname;
            } else {
                return NULL;
            }
        } else {
            $user = $this->users->getOne('', array('is_delete' => 0, 'user_id' => $this->user_id));
            if ($user->user_id) {
                return $user->firstname . " " . $user->lastname;
            } else {
                return NULL;
            }
        }
    }

}