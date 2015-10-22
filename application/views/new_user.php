<html>
<head>
	<title>Registration</title>
	<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container">
			<div class="col-lg-2"></div>
			<ul class="nav navbar-nav col-lg-3">
				<li><a class="navbar-brand" href="#">Test App</a></li>
				<li><a href="/dashboard/admin">Dashboard</a></li>
				<li><a href="/users/edit">Profile</a></li>
			</ul>
			<div class="col-lg-4"></div>
			<ul class="nav navbar-nav col-lg-1">
				<li><a href="/logout">Log off</a></li>
			</ul>
			<div class="col-lg-2"></div>
		</div>
	</nav>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-2"></div>
			<div class="col-lg-8">
				<ul>
					<li class="pull-left"><h4>Add a New User</h4></li>
					<li class="pull-right"><a href="/dashboard/admin"><button class="btn btn-md btn-primary">Return to Dashboard</button></a></li>
				</ul>
			</div>
			<div class="col-lg-2"></div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-2"></div>
			<div class="col-lg-3">
				<?= $this->session->flashdata("errors") ?>
				<form class="form-signin" role="form" action="/create" method="post">
					<div class="form-group">
						<input type="text" name="email" class="form-control" placeholder="Email Address" required autofocus>
					</div>
					<div class="form-group">
						<input type="text" name="first_name" class="form-control" placeholder="First Name" required>
					</div>
					<div class="form-group">
						<input type="text" name="last_name" class="form-control" placeholder="Last Name" required>
					</div>
					<div class="form-group">
						<input type="password" name="password" class="form-control" placeholder="Password" required>
					</div>
					<div class="form-group">
						<input type="password" name="c_password" class="form-control" placeholder="Password Confirmation" required>
					</div>
					<button class="btn btn-lg btn-success pull-right">Create</button>
				</form>
			</div>
			<div class="col-lg-7"></div>
		</div>
	</div>
</body>
</html>