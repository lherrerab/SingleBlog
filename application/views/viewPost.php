<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $post['title']; ?></title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/blog.css" />		
	</head>
	<body>
		<div class="blog-masthead">
      		<div class="container">
       		 	<nav class="blog-nav">
          			<a class="blog-nav-item" href="<?php echo site_url('blog'); ?>">Home</a>
          			<?php if(empty($_SESSION['username'])): ?>
          				<a class="blog-nav-item" href="<?php echo site_url('login'); ?>">Login</a>
          			<?php else: ?>
          				<a class="blog-nav-item" href="<?php echo site_url('blog/viewDashboard'); ?>">Dashboard</a>
          				<a class="blog-nav-item" href="<?php echo site_url('blog/addPost'); ?>">New post</a>
          				<a class="blog-nav-item pull-right" href="<?php echo site_url('login/logout') ;?>">Logout</a>      				
          			<?php endif; ?>	          			
        		</nav>
      		</div>
    	</div>
		<div class="container">
			<div class="blog-header">
        		<h1 class="blog-title"><?php echo $header;?></h1>
        		<p class="lead blog-description"><?php echo $subtitle; ?></p>
      		</div>
			<div class="col-sm-8 blog-main">
				<div class="blog-post">
					<h2 class="blog-post-title"><?php echo $post['title']; ?></h2>
					<p class="blog-post-meta"><small> Posted on: <span><?php print date('F j/ Y, g:i a', $post['posted_on']->sec); ?></span></small></p>
					<p><?php echo $post['body']; ?></p>
				</div>
				<div class="well">
					<h4>Leave your comment</h4>
					<form action="<?php echo site_url('blog/saveComment'); ?>" method="post">
						<h6>Name</h6>
						<input  class="form-control" type="text" name="cname"/>
						<br />
						<h6>Write your comment</h6>
						<textarea class="form-control" name="comment" rows="5"></textarea><br />
						<input type="hidden" name="postId" value="<?php echo $post['_id']; ?>" />
						<input class="btn btn-primary" type="submit" name="bsubmit" value="Submit" />
					</form>
				</div>
				<div class="media">
					<?php if(!empty($post['comments'])): ?>	
						<h3>Comments</h3>										
						<?php foreach ($post['comments'] as $comment):?>
							<div class="media">
								<h4 class="media-heading">
									<?php echo $comment['name']; ?> 
									<small><?php echo date('F j/ Y, g:i a', $comment['commented_on']->sec); ?></small>
								</h4>
								<p><?php echo $comment['comment'];?></p>								
							</div>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>	
				<br />			
			</div>			
		</div>
		<div class="blog-footer"></div>	
	</body>
</html>