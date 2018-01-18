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
            'blog',
            'users',
            'comment',
            'order'
        ));
        $this->_secure();
    }

    public function index()
    {
        $data['products'] = $this->product->count(array('is_delete' => 0));
        $data['categories'] = $this->category->count(array('is_delete' => 0));
        $data['posts'] = $this->blog->count(array('is_delete' => 0));
        $data['users'] = $this->users->getAll('', array('is_delete' => 0));
        $data['comments'] = $this->comment->count('', array('is_delete' => 0));
        $this->adminview->_output(['admin/dashboard'], $data);
    }

    public function deleteUser($user_id)
    {
        $user = $this->users->getOne('', array('user_id' => $user_id, 'is_delete' => 0));
        
                if(!$user->user_id)
                {
                    echo json_encode(0);
                }
                elseif($user->user_id)
                {
                    $value = array(
                        'is_delete' => 1
                    );
        
                    $success = $user->update($value , $user_id);
        
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

    public function addProductCategory()
    {
        if($this->input->post() && $this->form_validation->run('addcat'))
        {
            $post = $this->input->post();
            $clean = $this->security->xss_clean($post);

            $values = array(
                'category_name' => $clean['category_name'],
                'category_description' => $clean['category_description'],
                'category_slug' => slug($clean['category_name']),
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
        $this->load->helper("string_helper");
        $randomString = generateRandomString(4);

        if($this->input->post() && $this->form_validation->run('product'))
        {
            $post = $this->input->post();
            $clean = $this->security->xss_clean($post);

            $config['upload_path'] = './uploads/product';
            $config['allowed_types'] = 'jpg|png|gif';
            $config['overwrite'] = TRUE;
            $config['max_size']  = 20000;
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
                    'product_weight' => $clean['product_weight'],
                    'product_price' => number_format($clean['product_price'] , 0 , '.' , ','),
                    'sku' => $randomString,
                    'category_id' => $clean['category_id'],
                    'date_added' => date("Y-m-d H:m:s"),
                    'product_slug' => slug($clean['product_name']),
                    'user_id' => $this->current_user->user_id,
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

        $data['sku'] = $randomString;
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
                'category_slug' => slug($clean['category_name']),
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
        $singleProduct = $this->product->getOne('', array('product_id' => $product_id, 'is_delete' => 0));

        if(!$singleProduct->product_id){
            $data['title'] = "No Record Found";
            $data['message'] = "Content Does not Exits or it has been Deleted!";
            $this->load->view('error/404' , $data);

            return;
        }
        else {
            $singleProductCategory = $singleProduct->category_id;

            if ($this->input->post() && $this->form_validation->run('product')) {
                $post = $this->input->post();
                $clean = $this->security->xss_clean($post);

                $config['upload_path'] = './uploads/product';
                $config['allowed_types'] = 'jpg|png|gif';
                $config['overwrite'] = TRUE;
                $config['max_size'] = 10000;
                $config['max_width'] = 0;
                $config['max_height'] = 0;
                $config['file_name'] = $clean['product_model'];

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('product_pictures')) {

                    $data['response'] = FALSE;
                    $data['message'] = $this->upload->display_errors();
                } else {

                    $values = array(
                        'product_name' => $clean['product_name'],
                        'product_model' => $clean['product_model'],
                        'product_description' => $clean['product_description'],
                        'product_pictures' => 'uploads/product/' . $this->upload->data('file_name'),
                        'product_weight' => $clean['product_weight'],
                        'product_price' =>  number_format($clean['product_price'] , '0' , '.' , ','),
                        'category_id' => $clean['category_id'],
                        'product_slug' => slug($clean['product_name']),
                        'date_edited' => date("Y-m-d H:m:s"),
                    'user_id' => $this->current_user->user_id,
                    );

                    $success = $singleProduct->update($values, $product_id);

                    if ($success) {
                        $data['response'] = TRUE;
                        $data['message'] = "Blog post Successfully Updated";
                    } else {
                        $data['response'] = FALSE;
                        $data['message'] = "Error Updating blog post";
                    }
                }
            }
        }

        $data['categories'] = $this->category->getAll('', array('is_delete' => 0, 'category_id !=' => $singleProductCategory), '', '', 'category_id');
        $data['product'] = $singleProduct;
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
            $config['max_size']  = 20000;
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
                    'slug_title' => slug($clean['post_title']),
                   'user_id' => $this->current_user->user_id,
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
            $blogpostCategoryId = $blogpost->category_id;

            if ($this->input->post() && $this->form_validation->run('blogpost')) {
                $post = $this->input->post();
                $clean = $this->security->xss_clean($post);

                $config['upload_path'] = './uploads/blog';
                $config['allowed_types'] = 'jpg|png|gif';
                $config['overwrite'] = TRUE;
                $config['max_size'] = 20000;
                $config['max_width'] = 0;
                $config['max_height'] = 0;
                $config['file_name'] = $clean['post_title'];

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('post_pictures')) {

                    $data['response'] = FALSE;
                    $data['message'] = $this->upload->display_errors();
                } else {

                    $values = array(
                        'post_title' => $clean['post_title'],
                        'category_id' => $clean['category_id'],
                        'post_description' => $clean['post_description'],
                        'post_pictures' => 'uploads/blog/'.$this->upload->data('file_name'),
                        'date_edited' => date("Y-m-d H:m:s"),
                        'slug_title' => slug($clean['post_title']),
                        'user_id' => $this->current_user->user_id,
                    );

                    $success = $blogpost->update($values, $blogpost_id);

                    if ($success) {
                        $data['response'] = TRUE;
                        $data['message'] = "Blog post Successfully Updated";
                    } else {
                        $data['response'] = FALSE;
                        $data['message'] = "Error Updating blog post";
                    }
                }
            }
        }

        $data['categories'] = $this->category->getAll('', array('is_delete' => 0, 'category_id !=' => $blogpostCategoryId), '', '', 'category_id');
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

    public function viewcomments()
    {
        
        $data['comments'] = $this->comment->getAll('', array('is_delete' => 0));
        $this->adminview->_output(['admin/blog/comments'], $data);
    }

    public function deleteComment($comment_id)
    {
        $comment = $this->comment->getOne('', array('comment_id' => $comment_id, 'is_delete' => 0));

        if(!$comment->comment_id)
        {
            echo json_encode(0);
        }
        elseif($comment->comment_id)
        {
            $value = array(
                'is_delete' => 1
            );

            $success = $comment->update($value , $comment_id);

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

    public function access()
    {
        if(!$this->current_user->is(array('Admin')))
        {
            $data['title'] = "Access Denied";
            $data['message'] = 'You do not have permission to visit this page!';

            $this->load->view('errors/404' , $data);

            return;
        }

        if ($this->input->post() && $this->form_validation->run('access'))
        {
            $post = $this->input->post();
            $clean = $this->security->xss_clean($post);
            $user = $clean['user_id'];

            $value = array(
                'privilege' => $clean['privilege']
            );

            if($this->current_user->privilege == "Admin")
            {
                $success = $this->users->update($value, $user);

                if($success) {
                    $data['response'] = TRUE;
                    $data['message'] = "User Access level updated Successfully";
                }else {
                    $data['response'] = FALSE;
                    $data['message'] = "Error Updating User Access Level";
                }
            }

        }
        $data['users'] = $this->users->getAll('', array('is_delete' => 0, 'user_id !=' => $this->current_user->user_id));
        $this->adminview->_output(['admin/access/access'], $data);
    }

    public function orders(){
         if(!$this->current_user->is(array('Admin')))
        {
            $data['title'] = "Access Denied";
            $data['message'] = 'You do not have permission to visit this page!';

            $this->load->view('errors/404' , $data);

            return;
        }

        $data['orders'] = $this->order->getAll('', array(''), '', '', '', '', 'order_id');

        $this->adminview->_output(['admin/product/orders'], $data);
    }

    public function orderDelivered($order_id){
    
        $order = $this->order->getOne('', array('order_id' => $order_id, 'is_delete' => 0));

        if(!$order->order_id)
        {
            echo json_encode(0);
        }
        elseif($order->order_id)
        {
            $value = array(
                'is_delete' => 1
            );

            $success = $order->update($value , $order_id);

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