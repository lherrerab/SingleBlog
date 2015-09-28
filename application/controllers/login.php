<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	require_once('blog.php');
	
    	class Login extends CI_Controller
    	{
    	
    		function __construct()
    		{
			parent::__construct();
			$this->load->model('blog_model');			
		}
		
		public function index(){
			if ($this->blog_model->isLoggedin()) 
			{
				redirect('blog/viewDashboard'); 
			}		
			$this->load->view('login');			
		}
		
		public function checkCredentials()
		{
			$data = array(
					"username" => $this->input->post('username'),
					"password" => md5($this->input->post('password'))
				);								
			$user = $this->blog_model->findUser($data);	
		
			if(empty($user))
			{
				$data['msgLogin'] = "Username/Password incorrect";
				$this->load->view('login',$data);
			}		
			else
			{				
				$this->session->set_userdata($user[0]);
				redirect('blog/viewDashboard');
				}
			}
		
		public function logout()
		{
			$this->session->sess_destroy();
			redirect("/blog/");
		}
				
    	}
?>
