<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Blog extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('blog_model');
			$this->load->library('session');
		}
		
		public function index()
		{
			$data['title'] = "My Personal Blog";
			$data['header'] = "My Personal Blog";
			$data['subtitle'] = "My Official Blog where I write my experiences";
			$data['posts'] = $this->blog_model->getPosts();			
			$this->load->view('blog_view',$data); 			
		}
		
		public function addPost()
		{
			if($this->blog_model->isLoggedin()){
				$data['title'] = "Create a new post";
				$data['header'] = "My Personal Blog";
				$data['subtitle'] = "My Official Blog where I write my experiences";			
				$this->load->view('addPost',$data);
			}
			else{
				redirect('login');
			}
		}
		
		public function savePost()
		{
			$this->form_validation->set_rules('title','The field title is required','required');
			$this->form_validation->set_rules('body','The field body is required','required');
						
			if($this->form_validation->run() == FALSE)
			{
				$this->addPost();
			} 
			else
			{
				$data = array(
							'title' => $this->input->post('title'),
							'body' => $this->input->post('body'),
							'posted_on' => new MongoDate()
							);							
				$this->blog_model->savePost($data);					
				redirect("/blog/");							
			}
		}
		
		public function viewPost()
		{
			$id = $this->input->get('id');
			$data['title'] = "My Personal Blog";
			$data['header'] = "My Personal Blog";
			$data['subtitle'] = "My Official Blog where I write my experiences";
			$data['post'] = $this->blog_model->getPost($id);	
			$this->load->view('viewPost',$data);
		}
		
		public function saveComment()
		{
			$id = $this->input->post('postId');
			$this->form_validation->set_rules('cname','The field title is required','required');
			
			if($this->form_validation->run() == FALSE)
			{
				redirect("/blog/viewPost?id=". $id);
			} 
			else
			{				
				$data = array(
								'name' => $this->input->post('cname'),
								'email' => $this->input->post('cemail'),
								'comment' => $this->input->post('comment'),
								'commented_on' => new MongoDate()
							);							
				$this->blog_model->saveComment($id,$data);					
				redirect("/blog/viewPost?id=". $id);						
			}
		}
		
		public function viewDashBoard()
		{
			if($this->blog_model->isLoggedin())
			{
				$data['title'] = "My Personal Blog";
				$data['header'] = "Dashboard";
				$data['posts'] = $this->blog_model->getPosts();
				$this->load->view('viewDashboard',$data);
			}
			else
			{
				redirect('login');
			}			
		}
		
		public function editPost()
		{
			if($this->blog_model->isLoggedin())
			{
				$id = $this->input->get('id');
				$data['title'] = "Edit Post";
				$data['header'] = "My Personal Blog";
				$data['subtitle'] = "My Official Blog where I write my experiences";
				$data['post'] = $this->blog_model->getPost($id);	
				$this->load->view('editPost',$data);
			}
			else
			{
				redirect('login');
			}
		}
		
		public function updatePost()
		{
			$id = $this->input->post('postId');
			$this->form_validation->set_rules('title','The field title is required','required');
			$this->form_validation->set_rules('body','The field body is required','required');
			
			if($this->form_validation->run() == FALSE)
			{
				redirect("/blog/editPost?id=". $id);
			} 
			else
			{
				$data = array(
								'title' => $this->input->post('title'),
								'body' => $this->input->post('body'),
								'posted_on' => new MongoDate()
							);							
				$this->blog_model->editPost($id,$data);	
				
				redirect("/blog/viewDashboard");							
			}			
		}
		
		public function deletePost()
		{			
			$id = $this->input->get('id');
			$this->blog_model->deletePost($id);
			redirect("/blog/viewDashboard");
		}
	}
?>
