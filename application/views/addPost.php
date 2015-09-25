<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $title; ?></title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/blog.css" />
	</head>
	
	<body>
		<div class="blog-masthead">
      		<div class="container">
       		 	<nav class="blog-nav">
       		 		<a class="blog-nav-item" href="<?php echo site_url('blog'); ?>">Home</a>
          			<a class="blog-nav-item" href="<?php echo site_url('blog/viewDashboard'); ?>">Dashboard</a>
          			<a class="blog-nav-item active" href="#">New post</a>
          			<a class="blog-nav-item pull-right" href="<?php echo site_url('login/logout') ;?>">Logout</a>  
        		</nav>
      		</div>
    	</div>
		<div class="container">
			<div class="blog-header">
        		<h1 class="blog-title"><?php echo $header;?></h1>
        		<p class="lead blog-description"><?php echo $subtitle; ?></p>
      		</div>
			<div class="well">
				<h3>Create New Post</h3>								
				<form action="<?php echo site_url('blog/savePost'); ?>" method="post">
					<h4>Title</h4>
					<p><input class="form-control" type="text" id="title" name="title" /></p>
					<h4>Body</h4>
					<textarea class="form-control" name="body" rows="20"></textarea><br />
					<p><input class="btn btn-primary" type="submit" name="bsubmit" value="Add Post" /></p>
				</form>				
			</div>
		</div>
	</body>
</html>