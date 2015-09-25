<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
	
	class blog_model extends CI_Model{
		
		function __construct(){
			parent::__construct();
			$this->load->library('session');
		}
		
		function findUser($data){
			$user = $this->mongo_db->get_where('users',$data);			
			return $user;
		}
		
		function getPosts(){			
			$posts = $this->mongo_db->order_by(array('posted_on' => 'DESC'))->get('posts');
			return $posts;
		}
		
		function savePost($data){
			$id = $this->mongo_db->insert('posts',$data);
		}
		
		function getPost($id){
			$post = $this->mongo_db->get_where('posts', array('_id' => new MongoId($id)));
			return $post[0];
		}
		
		function saveComment($id,$comment){
			$post = $this->mongo_db->get_where('posts', array('_id' => new MongoId($id)));
			$comments = (isset($post[0]['comments'])) ? $post[0]['comments']: array();
			
			$comment = array(
							'name' => $comment['name'],
							'email' => $comment['email'],
							'comment' => $comment['comment'],
							'commented_on' => new MongoDate()								
							);
							
			array_push($comments,$comment);
			
			$this->mongo_db->where(array('_id'=> new MongoId($id)))->set(array('comments' => $comments))->update('posts');				
		}
		
		function editPost($id,$data){
			$this->mongo_db->where(array('_id'=> new MongoId($id)))->set($data)->update('posts');
		}
		
		function deletePost($id){
			$this->mongo_db->where(array('_id'=> new MongoId($id)))->delete('posts');
		}
		
		function isLoggedin(){
			if(empty($this->session->userdata('username')))
				return false;
			else {
				return true;
			}
		}
	}
?>