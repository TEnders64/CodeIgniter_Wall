<html>
<head>
	<title>User Removal</title>
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
				<li class="active"><a href="#">Dashboard</a></li>
				<li><a href="/users/edit">Profile</a></li>
			</ul>
			<div class="col-lg-4"></div>
			<ul class="nav navbar-nav col-lg-1">
				<li><a href="/logout">Log off</a></li>
			</ul>
			<div class="col-lg-2"></div>
		</div>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-lg-2"></div>
			<div class="col-lg-4">
				<h2>Are you sure you want to delete this person?</h2>
				<h4><?= $user['first_name'] . " " . $user['last_name'] ?></h4>
				<h4><?= $user['email'] ?></h4>
				<h4><?= $user['description'] ?></h4>
				<form class="form" action="/delete/<?= $user['id'] ?>" method="post">
					<button type="submit" class="btn btn-md btn-danger">Yes</button>
				</form>
				<a href="/dashboard/admin"><button type="submit" class="btn btn-md btn-info">Cancel</button></a>
			</div>
			<div class="col-lg-6"></div>
		</div>
	</div>
</body>
</html>