<?php

/**
 * Created by PhpStorm.
 * User: Olalekan
 * Date: 12/11/2017
 * Time: 4:16 PM
 */
class Order extends MY_Model
{
    public $order_id;

    public $name;

    public $product_id;

    public $price;

    public $address;

    public $phone;

    public $product_price;

    public $sku;

    public $quantity;

    public $date_added;

    public $is_delete;

    protected $primary = 'order_id';

    protected $table = 'order';

    public $columns = array(

        'order_id'=> array(
            'type' => 'INT',
            'constraint' => 11,
            'unsigned' => TRUE,
            'auto_increment'=> TRUE,
        ),

        'product_id' =>array(
            'type' => 'INT',
            'constraint'=> 11,
            'null' => FALSE,
        ),

        'name' =>array(
            'type' => 'VARCHAR',
            'constraint'=> 300,
            'null' => FALSE,
        ),

        'address' =>array(
            'type' => 'VARCHAR',
            'constraint'=> 300,
            'null' => FALSE,
        ),

        'phone' =>array(
            'type' => 'VARCHAR',
            'constraint'=> 20,
            'null' => FALSE,
        ),

        'quantity' =>array(
            'type' => 'INT',
            'constraint'=> 20,
            'null' => FALSE,
        ),

        'price' =>array(
            'type' => 'VARCHAR',
            'constraint' => 11,
            'null' => FALSE,
        ),

        'sku' =>array(
            'type' => 'VARCHAR',
            'constraint' => 11,
            'null' => FALSE,
        ),

        'date_added' => array(
            'type' => 'DATE',
            'null' => FALSE
        ),

        'is_delete' => array(
            'type' => 'INT',
            'constraint' => 11,
            'default' => 0,
        ),

    );

    public function getProduct($product_id = NULL)
    {
        if ($product_id) {
            $product = $this->product->getOne('', array('is_delete' => 0, 'product_id' => $product_id));
            if ($product->product_id) {
                return $product->product_name;
            } else {
                return NULL;
            }
        } else {
            $product = $this->product->getOne('', array('is_delete' => 0, 'product_id' => $this->product_id));
            if ($product->product_id) {
                return $product->product_name;
            } else {
                return NULL;
            }
        }
    }

}