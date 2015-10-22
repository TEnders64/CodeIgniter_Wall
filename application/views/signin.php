<html>
<head>
	<title>Signin Page</title>
	<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="col-lg-2"></div>
			<ul class="nav navbar-nav col-lg-2">
				<li><a class="navbar-brand" href="#">Test App</a></li>
				<li><a href="/">Home</a></li>
			</ul>
			<div class="col-lg-5"></div>
			<ul class="nav navbar-nav col-lg-1">
				<li class="active"><a href="#">Sign in</a></li>
			</ul>
			<div class="col-lg-2"></div>
		</div>
	</nav>
	<div class="row">
		<div class="col-lg-2"></div>
		<div class="col-lg-3">
			<?= $this->session->flashdata("login_error") ?>
			<?= $this->session->flashdata("access_denied") ?>
			<form class="form-signin" role="form" action="/verify" method="post">
				<h2 class="form-signin-heading">Sign in</h2>
				<div class="form-group">
					<input type="text" name="email" class="form-control" placeholder="Email Address" required autofocus>
				</div>
				<div class="form-group">
					<input type="password" name="password" class="form-control" placeholder="Password" required>
				</div>
				<button class="btn btn-lg btn-success pull-right">Sign In</button>
			</form>
		</div>
		<div class="col-lg-7"></div>
	</div>
	<div class="row">
		<div class="col-lg-2"></div>
		<div class="col-lg-3">
			<a href="/register" class="btn btn-link pull-right">Don't have an account? Register</a>
		</div>
		<div class="col-lg-7"></div>
	</div>
</body>
</html>