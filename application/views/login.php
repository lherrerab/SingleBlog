<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/signin.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/blog.css" />
	</head>
	<body>
		 <div class="blog-masthead">
      		<div class="container">
       		 	<nav class="blog-nav">
          			<a class="blog-nav-item" href="<?php echo site_url('blog')?>"/>Home</a>
          			<a class="blog-nav-item active" href="#">Login</a>
        		</nav>
      		</div>
    	</div>		
		<div class="container">
      		<form action="<?php echo site_url('login/checkCredentials'); ?>" method="post" class="form-signin">
        		<h2 class="form-signin-heading">Please sign in</h2>
        		<label for="inputUsername" class="sr-only">Username</label>
        		<input type="username" name="username" id="inputUsername" class="form-control" placeholder="Username" required autofocus>
        		<label for="inputPassword" class="sr-only">Password</label>
        		<input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        		<button class="btn btn-lg btn-primary btn-block" type="submit">Log in</button>
	    		<label><?php if(!empty($msgLogin)) echo $msgLogin; ?></label>
      		</form>
    	</div>
  	</body>
</html>		