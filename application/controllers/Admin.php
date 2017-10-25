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
        $this->load->model(array(
          'category',
            'product',
            'blog'
        ));

    }

    public function index()
    {}

    public function addProductCategory()
    {
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

        $data['categories'] = $this->category->getAll('', array('is_delete' => 0), '','','','category_id');
        $this->adminview->_output(['admin/product/categories'], $data);
    }

    public function addProduct()
    {
        $data = [];
        if($this->input->post() && $this->form_validation->run('product'))
        {
            $post = $this->input->post();
            $clean = $this->security->xss_clean($post);

            $config['upload_path'] = './uploads/product';
            $config['allowed_types'] = 'jpg|png|gif';
            $config['overwrite'] = TRUE;
            $config['max_size']  = 10000;
            $config['max_width'] = 0;
            $config['max_height'] = 0;
            $config['file_name'] = $clean['product_model'];

            $this->load->library('upload', $config);

            if(!$this->upload->do_upload('product_pictures'))
            {

                $data['response'] = FALSE;
                $data['message'] = $this->upload->display_errors();
            }
            else {

                $values = array(
                    'product_name' => $clean['product_name'],
                    'product_model' => $clean['product_model'],
                    'product_description' => $clean['product_description'],
                    'product_pictures' => 'uploads/product/' . $this->upload->data('file_name'),
                    'category_id' => $clean['category_id'],
                    'date_added' => date("Y-m-d H:m:s"),
//                    'user_id' => $this->current_user->user_id,
                );

                $success = $this->product->insert($values);

                if($success){
                    $data['response'] = TRUE;
                    $data['message'] = "Product Information Successfully Added";
                }
                else{
                    $data['response'] = FALSE;
                    $data['message'] = "Error Adding Product Information Type";
                }
            }
        }

        $data['categories'] = $this->category->getAll('', array('is_delete' => 0), '', '', 'category_id');
        $this->adminview->_output(['admin/product/addproduct'], $data);
    }

    public function editProductCategory($category_id)
    {
        $category = $this->category->getOne('', array('category_id' => $category_id, 'is_delete' => 0));

        if($this->input->post() && $this->form_validation->run('addcat'))
        {
            $post = $this->input->post();
            $clean = $this->security->xss_clean($post);

            $values = array(
                'category_name' => $clean['category_name'],
                'category_description' => $clean['category_description'],
            );
            $success = $this->category->update($values, $category_id);
            if($success)
            {
                $data['response'] = TRUE;
                $data['message'] = 'Category Details Successfully Updated';
            }
            else
            {
                $data['response'] = FALSE;
                $data['message'] = 'Error Updating Category Details';
            }
        }
        $data['category'] = $category;
        $this->load->view('admin/product/editCategory', $data);
    }

    public function deleteProductCategory($category_id)
    {
        $product_category = $this->category->getOne('', array('category_id' => $category_id, 'is_delete' => 0));

        if(!$product_category->category_id)
        {
            echo json_encode(0);
        }
        elseif($product_category->category_id)
        {
            $value = array(
                'is_delete' => 1
            );

            $success = $product_category->update($value , $category_id);

            if($success)
            {
                echo json_encode(1);
            }
            else
            {
                echo json_encode(0);

            }
        }
    }

    public function allProduct()
    {
        $data['products'] = $this->product->getAll('', array('is_delete' => 0), '', '', 'product_id');
        $this->adminview->_output(['admin/product/viewProducts'], $data);
    }

    public function editProduct($product_id)
    {
        $product = $this->product->getOne('', array('product_id' => $product_id, 'is_delete' => 0));

        if(!$product->product_id){
            $data['title'] = "No Record Found";
            $data['message'] = "Content Does not Exits or it has been Deleted!";
            $this->load->view('error/404' , $data);

            return;
        }
        else{

            if($this->input->post() && $this->form_validation->run('product')){

                $post = $this->input->post();

                $clean = $this->security->xss_clean($post);

                $config['upload_path'] = './uploads/product';
                $config['allowed_types'] = 'jpg|png|gif';
                $config['overwrite'] = TRUE;
                $config['max_size']  = 10000;
                $config['max_width'] = 0;
                $config['max_height'] = 0;
                $config['file_name'] = $clean['product_model'];

                $this->load->library('upload', $config);

                if(!$this->upload->do_upload('product_pictures'))
                {

                    $data['response'] = FALSE;
                    $data['message'] = $this->upload->display_errors();
                }
                else{

                    $values = array(
                        'product_name' => $clean['product_name'],
                        'product_model' => $clean['product_model'],
                        'product_description' => $clean['product_description'],
                        'product_pictures' => 'uploads/product/' . $this->upload->data('file_name'),
                        'category_id' => $clean['category_id'],
                        'date_edited' => date("Y-m-d H:m:s"),
//                        'user_id' => $this->current_user->user_id,
                    );

                    $success = $product->update($values , $product_id);
                    if($success){
                        $data['response'] = TRUE;
                        $data['message'] = "Product Information Updated";
                    }
                    else{
                        $data['response'] = FALSE;
                        $data['message'] = "Error Updating Product";
                    }
                }
            }
        }

        $data['product'] = $product;
        $this->load->view('admin/product/editProduct', $data);
    }

    public function deleteProduct($product_id)
    {
        $product = $this->product->getOne('', array('product_id' => $product_id, 'is_delete' => 0));

        if(!$product->product_id)
        {
            echo json_encode(0);
        }
        elseif($product->product_id)
        {
            $value = array(
                'is_delete' => 1
            );

            $success = $product->update($value , $product_id);

            if($success)
            {
                echo json_encode(1);
            }
            else
            {
                echo json_encode(0);

            }
        }
    }

    public function createPost()
    {

        if($this->input->post() && $this->form_validation->run('blogpost')){
            $post = $this->input->post();

            $clean = $this->security->xss_clean($post);

            $config['upload_path'] = './uploads/blog';
            $config['allowed_types'] = '*';
            $config['overwrite'] = TRUE;
            $config['max_size']  = 10000;
            $config['max_width'] = 0;
            $config['max_height'] = 0;
            $config['file_name'] = $clean['post_title'];

            $this->load->library('upload', $config);

            if(!$this->upload->do_upload('post_pictures'))
            {

                $data['response'] = FALSE;
                $data['message'] = $this->upload->display_errors();
            }
            else{

                $value = array(
                    'post_title' => $clean['post_title'],
                    'category_id' => $clean['category_id'],
                    'post_description' => $clean['post_description'],
                    'post_pictures' => 'uploads/blog/'.$this->upload->data('file_name'),
                    'date_added' => date("Y-m-d H:m:s"),
//                    'user_id' => $this->current_user->user_id,
                );

                $success = $this->blog->insert($value);

                if($success){
                    $data['response'] = TRUE;
                    $data['message'] = "Blog Post successfully Published";
                }
                else{
                    $data['response'] = FALSE;
                    $data['message'] = "Error Publishing Blog Post";
                }

            }

        }

        $data['categories'] = $this->category->getAll('' , array('is_delete' => 0));
        $this->adminview->_output(['admin/blog/createpost'] , $data);
    }

    public function editPost($blogpost_id)
    {
        $blogpost = $this->blog->getOne('', array('post_id' => $blogpost_id, 'is_delete' => 0));

        if(!$blogpost->post_id){
            $data['title'] = "No Record Found";
            $data['message'] = "Content Does not Exits or it has been Deleted!";
            $this->load->view('error/404' , $data);

            return;
        }
        else {

            if ($this->input->post() && $this->form_validation->run('blogpost')) {
                $post = $this->input->post();
                $clean = $this->security->xss_clean($post);

                $config['upload_path'] = './uploads/blog';
                $config['allowed_types'] = 'jpg|png|gif';
                $config['overwrite'] = TRUE;
                $config['max_size'] = 10000;
                $config['max_width'] = 0;
                $config['max_height'] = 0;
                $config['file_name'] = $clean['post_title'];

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('product_pictures')) {

                    $data['response'] = FALSE;
                    $data['message'] = $this->upload->display_errors();
                } else {

                    $values = array(
                        'post_title' => $clean['post_title'],
                        'product_model' => $clean['product_model'],
                        'post_description' => $clean['post_description'],
                        'product_pictures' => 'uploads/blog/' . $this->upload->data('file_name'),
                        'category_id' => $clean['category_id'],
                        'date_added' => date("Y-m-d H:m:s"),
//                    'user_id' => $this->current_user->user_id,
                    );

                    $success = $this->product->insert($values);

                    if ($success) {
                        $data['response'] = TRUE;
                        $data['message'] = "Product Information Successfully Added";
                    } else {
                        $data['response'] = FALSE;
                        $data['message'] = "Error Adding Product Information Type";
                    }
                }
            }
        }

        $data['categories'] = $this->category->getAll('', array('is_delete' => 0), '', '', 'category_id');
        $data['post'] = $blogpost;
        $this->load->view('admin/blog/editPost', $data);
    }

    public function allPost()
    {
        $data['posts'] = $this->blog->getAll('', array('is_delete' => 0), '', '', 'post_id');
        $this->adminview->_output(['admin/blog/viewPosts'], $data);
    }

    public function deletePost($post_id)
    {
        $post = $this->blog->getOne('', array('post_id' => $post_id, 'is_delete' => 0));

        if(!$post->post_id)
        {
            echo json_encode(0);
        }
        elseif($post->post_id)
        {
            $value = array(
                'is_delete' => 1
            );

            $success = $post->update($value , $post_id);

            if($success)
            {
                echo json_encode(1);
            }
            else
            {
                echo json_encode(0);

            }
        }
    }
}