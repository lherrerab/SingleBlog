<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title><?php echo $title; ?></title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/blog.css" />
	</head>
	<body>
		 <div class="blog-masthead">
      		<div class="container">
       		 	<nav class="blog-nav">
          			<a class="blog-nav-item active" href="#">Home</a>
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
				<?php if(!empty($posts)): ?>	
					<?php foreach($posts as $post): ?>
						<div class="blog-post">
							<h2 class="blog-post-title"><?php echo $post['title']; ?></h2>
							<p class="blog-post-meta">Posted on: <span><?php print date('F j/ Y, g:i a', $post['posted_on']->sec); ?></span></p>
							<p><?php echo substr($post['body'], 0,200) . '...'; ?></p>							
							<a href="<?php echo site_url('blog/viewPost?id='.$post['_id']); ?>">Read More</a>
						</div>
					<?php endforeach; ?>
				<?php else: ?>
					<span><?php echo 'This blog is currently empty.'; ?></span><br />					
				<?php endif; ?>		
			</div>
		</div>
	</body>
</html>