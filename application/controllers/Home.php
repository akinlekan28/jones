<?php

/**
 * Created by PhpStorm.
 * User: Olalekan
 * Date: 05/10/2017
 * Time: 9:12 PM
 */
class Home extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model(array(
            'blog',
            'category',
            'comment',
            'users',
            'product',
        ));

    }
    public function index()
    {

        $data['categories'] = $this->category->getAll('', array('is_delete' => 0));
        $this->viewengine->_output('homepage', $data);
    }

    public function blog( $comment = NULL)
    {
        $data['blogPosts'] = $this->blog->getAll('', array('is_delete' => 0), '','','','','post_id');
        $data['categories'] = $this->category->getAll('', array('is_delete' => 0));
        $data['comment'] = $this->comment->count('', array('is_delete' => 0, 'post_id' => $comment));
        $this->viewengine->_output(['admin/blog/bloghome'], $data);
    }

    public function blog_post($slug = NULL)
    {
        $categoryId = $this->blog->getOne('',array('is_delete' => 0, 'slug_title' => $slug));
        if($categoryId->category_id)
        {
            $category = $categoryId->category_id;
            $postId = $categoryId->post_id;
        }
        else {
            return NULL;
        }

        if($this->input->post())
        {
            $post = $this->input->post();
            $clean = $this->security->xss_clean($post);

            $values = array(
                'name' => $clean['name'],
                'email' => $clean['email'],
                'message' => $clean['message'],
                'post_id' =>$postId,
                'date_added' => date("Y-m-d H:m:s"),
            );
            $success = $this->comment->insert($values);
            if($success)
            {
                $data['response'] = TRUE;

            }
            else {
                $data['response'] = FALSE;

            }
        }

        $data['popularPosts'] = $this->blog->getAll('', array('is_delete' => 0),'', '4', 'count(category_id) DESC', 'category_id');
        $data['comments'] = $this->comment->getAll('', array('is_delete' => 0, 'post_id' => $postId));
        $data['similarPosts'] = $this->blog->getAll('', array('is_delete' => 0, 'category_id' => $category, 'post_id !=' => $postId), '', '3', '', '', 'post_id');
        $data['categories'] = $this->category->getAll('', array('is_delete' => 0));
        $data['post'] = $categoryId;
        $this->viewengine->_output(['admin/blog/singlepost'], $data);
    }

    public function blog_category($categorySlug = NULL)
    {
    
        $category = $this->category->getOne('', array('is_delete' => 0, 'category_slug' => $categorySlug));
        if($category->category_id) {
            $category_id = $category->category_id;
        }
        else {
            return;
        }
        
        $data['categories'] = $this->category->getAll('', array('is_delete' => 0));
        $data['blogcategories'] = $this->blog->getAll('', array('is_delete' => 0, 'category_id' => $category_id));
       
        $this->viewengine->_output(['admin/blog/blogcategory'], $data);
    }

    public function product_category($categorySlug = NULL)
    {
    
        $category = $this->category->getOne('', array('is_delete' => 0, 'category_slug' => $categorySlug));
        if($category->category_id) {
            $category_id = $category->category_id;
        }
        else {
            return;
        }
        
        $data['categories'] = $this->category->getAll('', array('is_delete' => 0));
        $data['productcategories'] = $this->product->getAll('', array('is_delete' => 0, 'category_id' => $category_id));
       
        $this->viewengine->_output(['admin/product/productcategory'], $data);
    }

    public function contactus()
    {
        
        $data['categories'] = $this->category->getAll('', array('is_delete' => 0));
        $this->viewengine->_output(['contact'], $data);
    }
}