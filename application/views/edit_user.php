<html>
<head>
	<title>Edit User [Admin]</title>
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
					<li class="pull-left"><h4>Edit User #<?= $user['id'] ?></h4></li>
					<li class="pull-right"><a href="/dashboard/admin"><button class="btn btn-md btn-primary">Return to Dashboard</button></a></li>
				</ul>
			</div>
			<div class="col-lg-2"></div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-2"></div>
			<div class="col-lg-4">
				<?= $this->session->flashdata("errors") ?>
				<form class="form" role="form" action="/updateinfo/<?= $user['id'] ?>" method="post">
				<h4 class="form-heading">Edit Information</h4>
				<div class="form-group">
					<input type="text" name="email" class="form-control"
					value="<?= $user['email'] ?>">
				</div>
				<div class="form-group">
					<input type="text" name="first_name" class="form-control" value="<?= $user['first_name'] ?>">
				</div>
				<div class="form-group">
					<input type="text" name="last_name" class="form-control" value="<?= $user['last_name'] ?>">
				</div>
				<div class="form-group">
					<label for="level">User Level:</label>
					<select name="user_level" class="form-control" id="level">
						<option value="1">Normal</option>
						<option value="9">Admin</option>
					</select>
				</div>
				<button class="btn btn-md btn-success pull-right">Save</button>
			</form>
		</div>
		<div class="col-lg-4">
			<form class="form" role="form" action="/updatepass/<?= $user['id'] ?>" method="post">
				<h4 class="form-heading">Change Password</h4>
				<div class="form-group">
					<input type="password" name="password" class="form-control">
				</div>
				<div class="form-group">
					<input type="password" name="c_password" class="form-control">
				</div>
				<button class="btn btn-md btn-success pull-right">Update Password</button>
			</form>
		</div>
		<div class="col-lg-2"></div>
	</div>
</body>
</html>