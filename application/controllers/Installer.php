<?php

/**
 * Created by PhpStorm.
 * User: Olalekan
 * Date: 14/10/2017
 * Time: 3:08 PM
 */
class Installer extends MY_Controller
{
    public function index()
    {
        $this->_createTables();
    }

    protected function _createDatabase()
    {
        $this->load->dbforge();

        $this->dbforge->create_database('jones');

        if($this->dbforge->create_database('jones'))
        {
            echo 'Database created!';
        }

    }
    public $privileges;

    protected function _createTables()
    {
        $this->load->dbforge();

        //Add Users Table
        $this->load->model('Users');
        $this->dbforge->add_field($this->Users->columns);
        $this->dbforge->add_key('user_id', TRUE);
        $this->dbforge->create_table('users', TRUE);

        //Add Privileges Table
        $this->load->model('Privileges');
        $this->dbforge->add_field($this->Privileges->columns);
        $this->dbforge->add_key('privilege_id', TRUE);
        $this->dbforge->create_table('privileges', TRUE);

        //Add Product Table
        $this->load->model('Product');
        $this->dbforge->add_field($this->Product->columns);
        $this->dbforge->add_key('product_id', TRUE);
        $this->dbforge->create_table('product', TRUE);

        //Add Category Table
        $this->load->model('Category');
        $this->dbforge->add_field($this->Category->columns);
        $this->dbforge->add_key('category_id', TRUE);
        $this->dbforge->create_table('category', TRUE);

        //Add  Tokens
        $this->load->model('Tokens');
        $this->dbforge->add_field($this->Tokens->columns);
        $this->dbforge->add_key('token_id', TRUE);
        $this->dbforge->create_table('tokens', TRUE);


        $this->_createPrivileges();

        echo 'Installed Successfully';
    }

    protected function _createPrivileges()
    {
        $this->load->model('privileges');

        $privileges = array(
            array('privilege_name' => 'Admin'  ,'privilege_info' => 'Full Access and Control, Can Edit and Delete account'),
            array('privilege_name' => 'Staff' ,'privilege_info' => 'Can Only View and Post Complaint')
        );

        foreach($privileges as $p)
        {
            $privilege = $this->privileges->getOne('', array('privilege_name' => $p['privilege_name']));

            if($privilege->privilege_id)
            {
                $this->privileges->update($p , $privilege->privilege_id);
            }
            elseif(!$privilege->privilege_id)
            {
                $privilege->insert($p);
            }

        }

    }
}