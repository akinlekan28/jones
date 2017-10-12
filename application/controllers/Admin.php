<?php

/**
 * Created by PhpStorm.
 * User: Olalekan
 * Date: 10/10/2017
 * Time: 4:10 AM
 */
class Admin extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model(
          'category'
        );

    }

    public function index()
    {}

    public function addProductCategory()
    {
        $data = [];
        if($this->input->post() && $this->form_validation->run('addcat'))
        {
            $post = $this->input->post();
            $clean = $this->security->xss_clean($post);

            $values = array(
                'category_name' => $clean['category_name'],
                'category_description' => $clean['category_description'],
                'date_added' => date("Y-m-d H:m:s"),
                'user_id' => $this->current_user->user_id,
            );
            $success = $this->category->insert($values);
            if($success)
            {
                $data['response'] = TRUE;
                $dat['messaage'] = 'Category information Added Successfully';
            }
            else {
                $data['response'] = FALSE;
                $data['message'] = 'Error Adding Category Information';
            }
        }

        $this->adminview->_output(['admin/categories'], $data);
    }

    public function addProduct()
    {}

    public function deleteProductCategory($category_id)
    {}

    public function allProducts()
    {}
}