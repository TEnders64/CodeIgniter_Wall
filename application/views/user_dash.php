<html>
<head>
	<title>User Dashboard</title>
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
			<h4 class="label label-success text-center"><?= $this->session->flashdata("success") ?></h4>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-2"></div>
			<div class="col-lg-8">
				<ul>
					<li class="pull-left"><h4>Manage Users</h4></li>
				</ul>
			</div>
			<div class="col-lg-2"></div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-2"></div>
			<div class="col-lg-8">
				<table class="table table-striped table-condensed table-hover">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Email</th>
							<th>Created_At</th>
							<th>User-Level</th>
						</tr>
					</thead>
					<tbody>
		<?php 			foreach($users as $user){?>
						<tr>
							<td><?= $user['id'] ?></td>
							<td><a href="/users/show/<?= $user['id'] ?> "><?= $user['full_name'] ?></a></td>
							<td><?= $user['email'] ?></td>
							<td><?= $user['created_at'] ?></td>
							<td><?= $user['user_level'] ?></td>
						</tr>
		<?php } ?>
					</tbody>
				</table>
			</div>
			<div class="col-lg-2"></div>
			</div>
		</div>
	</div>
</body>
</html>