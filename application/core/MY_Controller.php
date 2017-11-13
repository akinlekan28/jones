<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MY_Controller
 *
 * @author Crystalhills
 */
class MY_Controller extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->page_id = strtolower($this->uri->rsegment(1)).'_'.strtolower($this->uri->rsegment(2));
        $this->output->enable_profiler(FALSE);

    }
    
    
    
    public $page_id; 



    public $current_user;
        /**
     *  Make a controller acton secure
     * 
     * @return void
     */
    protected function _secure()
    {
        // user already logged in?
        if($this->current_user && $this->current_user->user_id)
        {
            return;
        }
        
        $this->_current_user();
        
        if(!$this->current_user || !$this->current_user->user_id)
        {
            redirect('auth');
        }
        // user is logged in 
        //$this->current_user_role = $this->current_user->role ;
        
        
    }
    
    /**
     * Get crrent logged in user
     * @return User
     */
    protected function _current_user()
    {
        $id = $this->session->userdata("user_id");
        
        if($id)
        {
            $this->load->model('users');
            $this->current_user = $this->users->getOne('' , ['users.user_id' => $id]);
        }
    
        return $this->current_user;
    }

//    protected function _isAdmin()
//    {
//        $this->load->model('privileges');
//
//        $this->isAdmin = $this->privileges->getAll('', array('is_delete' => 0));
//
//        return $this->isAdmin;
//    }

    protected function _SendMail($email , $message)
    {
        
       $ci = & get_instance();
       $ci->load->library('email');

       $sender = "noreply@crystalhill.org";
       $subject = "Password Account Confirmation Link";


      $ci->email->from($sender);
      $ci->email->to($email);
      $ci->email->subject($subject);

      $ci->email->message($message);

      if($ci->email->send())
      {
            $data['hasError'] = true;
            $data['errorMsg'] =  "Email successfully Updated";
      }
      else
      {
           $data['hasError'] = false;
           $data['errorMsg'] = "Error in sending Email.";
      }

    }
}
