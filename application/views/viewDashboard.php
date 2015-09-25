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
          			<a class="blog-nav-item active" href="#">Dashboard</a>
          			<a class="blog-nav-item" href="<?php echo site_url('blog/addPost'); ?>">New post</a>
          			<a class="blog-nav-item pull-right" href="<?php echo site_url('login/logout') ;?>">Logout</a> 
        		</nav>
      		</div>
    	</div>

		<div class="container">
			<div class="blog-header">
				<h1><?php echo $header; ?></h1>				
				<table class="table">
					<thead>
						<tr>
							<th width="55%">Title</th>
							<th width="20%">Posted_date</th>
							<th width="15%">Options</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($posts as $post): ?>
							<tr>
								<td><?php echo $post['title']; ?></td>
								<td><?php print date('F j/ Y, g:i a', $post['posted_on']->sec); ?></td>
								<td>
									<a href="<?php echo site_url('blog/viewPost?id='.$post['_id']);?>">Read</a>
									<a href="<?php echo site_url('blog/editPost?id='.$post['_id']);?>">Edit</a>
									<a href="#" onclick="if(confirm('Do you want to remove this post?')) 
										   window.location.href = 'deletePost?id=<?php echo $post['_id'];?>';"> Delete
									</a>
								</td>
							</tr>	
						<?php endforeach; ?>	
					</tbody>
				</table>
			</div>			
		</div>
	</body>
</html>