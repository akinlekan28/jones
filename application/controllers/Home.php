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
        $this->load->model('blog');

    }
    public function index()
    {

        $this->viewengine->_output('homepage');
    }

    public function blog()
    {
        $data['blogPosts'] = $this->blog->getAll('', array('is_delete' => 0), '','','','','post_id');

        $this->viewengine->_output(['admin/blog/bloghome'], $data);
    }
}