<html>
<head>
	<title><?= $user['first_name'] ?>'s Wall</title>
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
				<li><a href="/dashboard">Dashboard</a></li>
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
				<h4><?= $user['first_name'] . " " . $user['last_name'] ?></h4>
				<table class="table table-striped table-hover table-condensed">
					<tr>
						<td>Registered at:</td>
						<td><?= $user['created_at'] ?></td>
					</tr>
					<tr>
						<td>User ID:</td>
						<td><?= $user['id'] ?></td>
					</tr>
					<tr>
						<td>Email address:</td>
						<td><?= $user['email'] ?></td>
					</tr>
					<tr>
						<td>Description:</td>
						<td><?= $user['description'] ?></td>
					</tr>
				</table>
			</div>
			<div class="col-lg-6"></div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-lg-2"></div>
			<div class="col-lg-8">
				<h4>Leave a message for <?= $user['first_name'] ?></h4>
				<form class="form" action="/create_post/<?= $user['id'] ?>/<?= $this->session->userdata('id') ?>" method="post">
					<div class="form-group">
						<textarea class="form-control" rows="3" name="content"></textarea>
					</div>
					<button type="submit" class="btn btn-md btn-success pull-right">Post</button>
				</form>
			</div>
			<div class="col-lg-2"></div>
		</div>
	</div>
<?php 	foreach ($posts as $post){?>
	<div class="container">
		<div class="row">
			<div class="col-lg-2"></div>
			<div class="col-lg-8">
				<h5><a href="/users/show/<?= $post['author'] ?>"><?= $post['full_name'] ?></a> wrote at <?= $post['created_at'] ?> : </h5>
				<p><?= $post['content'] ?></p>
			</div>
			<div class="col-lg-2"></div>
		</div>
	</div>
<?php  		foreach ($post['comments'] as $comment){?>
	<div class="container">
		<div class="row">
			<div class="col-lg-3"></div>
			<div class="col-lg-7">
				<h5><a href="/users/show/<?= $comment['author'] ?>"><?= $comment['full_name'] ?></a> wrote at <?= $comment['created_at'] ?> : </h5>
				<p><?= $comment['content'] ?></p>
			</div>
			<div class="col-lg-2"></div>
		</div>
	</div>
<?php } ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-3"></div>
			<div class="col-lg-7">
				<form class="form" action="/create_comment/<?= $post['id'] ?>/<?= $this->session->userdata('id') ?>/<?= $user['id'] ?>" method="post">
					<div class="form-group">
						<textarea class="form-control" rows="2" name="content" placeholder="Write a message"></textarea>
					</div>
					<button type="submit" class="btn btn-md btn-success pull-right">Comment</button>
				</form>
			</div>
		</div>
	</div>
<?php } ?>
</body>
</html>