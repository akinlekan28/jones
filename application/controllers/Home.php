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
            'category'
        ));

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

    public function singlepost($slug = NULL)
    {
        $data['categories'] = $this->category->getAll('', array('is_delete' => 0));
        $data['post'] = $this->blog->getOne('',array('is_delete' => 0, 'slug_title' => $slug));
        $this->viewengine->_output(['admin/blog/singlepost'], $data);
    }
}