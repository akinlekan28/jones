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
            'order'
        ));

    }
    public function index()
    {

        $data['categories'] = $this->category->getAll('', array('is_delete' => 0));
        $this->viewengine->_output('homepage', $data);
    }

    public function blog()
    {
        $config['base_url'] = site_url('home/blog');
        $config['total_rows'] = $this->db->count_all('blog');
        $config['per_page'] = 3;
        $config['attributes'] = array('class' => 'pagination-links');

        $this->pagination->initialize($config);

        $data['result'] = $this->blog->getPosts($config['per_page'],$this->uri->segment(3));
        $data['categories'] = $this->category->getAll('', array('is_delete' => 0));
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

        $data['popularPosts'] = $this->blog->getAll('', array('is_delete' => 0),'', '4', 'count(post_views) asc', 'category_id');
        $data['comments'] = $this->comment->getAll('', array('is_delete' => 0, 'post_id' => $postId));
        $data['similarPosts'] = $this->blog->getAll('', array('is_delete' => 0, 'category_id' => $category, 'post_id !=' => $postId), '', '3', '', '', 'post_id');
        $data['categories'] = $this->category->getAll('', array('is_delete' => 0));
        $data['post'] = $categoryId;
        $this->blog->add_count($slug);
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
        if($this->input->post()) {
            $post = $this->input->post();

            $this->load->library('email');

            $name = $post['name'];
            $email = $post['email'];
            $message = $post['message'];
            $subject = $post['subject'];
            $receiver = 'support@edtel.com.ng';

            $config['protocol'] = 'smtp';
            $config['smtp_host'] = 'ssl://scp27.hosting.reg.ru';
            $config['smtp_port'] = '465';
            $config['smtp_user'] = 'support@edtel.com.ng';
            $config['smtp_pass'] = 'checkmate12';
            $config['mailtype'] = 'html';
            $config['charset'] = 'iso-8859-1';
            $config['wordwrap'] = TRUE;
            $config['newline'] = "\r\n";

            $this->email->initialize($config);

            $this->email->from($email, $name);
            $this->email->to($receiver);
            $this->email->subject($subject);
            $this->email->message($message);
            if ($this->email->send()) {
                $data['response'] = TRUE;
            }
            else {
                $data['response'] = FALSE;
            }

        }
        $data['categories'] = $this->category->getAll('', array('is_delete' => 0));
        $this->viewengine->_output(['contact'], $data);
    }

    public function product_details($productSlug = NULL)
    {
        $product = $this->product->getOne('', array('is_delete' => 0, 'product_slug' => $productSlug));
        if($product->product_id) {
            $product_id = $product->product_id;
            $product_name = $product->product_name;
            $sku = $product->sku;
            $price = $product->product_price;
        }
        else {
            return;
        }

        if ($this->input->post('order'))
        {
            $post = $this->input->post();
            $clean = $this->security->xss_clean($post);

            $value = array(
                'product_id' => $product_id,
                'name' => $clean['name'],
                'address' => $clean['address'],
                'phone' => $clean['phone'],
                'quantity' => $clean['quantity'],
                'sku' => $sku,
                'price' => $price,
                'date_added' => date("Y-m-d H:m:s"),
            );
            $success = $this->order->insert($value);

            if($success)
            {
                $data['response'] = TRUE;

                $this->load->library('email');
                $name = $post['name'];
                $email = 'newOrder@edtel.com.ng';
                $message = $clean['name'] . '' . $clean['address'] . '' . $clean['phone'] . '' .  $product_name .  ''  . $clean['quantity'] . '' . $sku . '' . $price ;
                $subject = "New Order Alert";
                $receiver = 'support@edtel.com.ng';

                $config['protocol'] = 'smtp';
                $config['smtp_host'] = 'ssl://scp27.hosting.reg.ru';
                $config['smtp_port'] = '465';
                $config['smtp_user'] = 'support@edtel.com.ng';
                $config['smtp_pass'] = 'checkmate12';
                $config['mailtype'] = 'html';
                $config['charset'] = 'iso-8859-1';
                $config['wordwrap'] = TRUE;
                $config['newline'] = "\r\n";

                $this->email->initialize($config);

                $this->email->from($email, $name);
                $this->email->to($receiver);
                $this->email->subject($subject);
                $this->email->message($message);

                $this->email->send();

            }
            else {
                $data['response'] = FALSE;
            }
        }

        $data['categories'] = $this->category->getAll('', array('is_delete' => 0));
        $data['product'] = $product;
        
        $this->viewengine->_output(['admin/product/singleproduct'], $data);
    }
}