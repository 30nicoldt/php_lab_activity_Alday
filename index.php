<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User Management System</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div class="container mt-5">
		<h2 class="text-center mb-5">User Management System</h2>

		<div class="row">
			<div class="col-md-4">
				<h4>Add New User</h4>

				<?php
					include 'dbcon.php';

					if (isset($_POST['btnsubmit'])) {
						$name = $_POST['name'];
						$email = $_POST['email'];

						$query = "INSERT INTO users (`name`,`email`)VALUES('$name','$email')";
						$result = $conn->query($query);

						if ($result) {
							echo "New Record inserted successfully!";
						}else{
							echo "Error: ". $conn->error;
						}
					}
				?>

				<form method="post">
					<label>Full Name</label>
					<input type="text" class="form-control" placeholder="Enter Full Name" name="name" required>
					<br>
					<label>Email Address</label>
					<input type="email" class="form-control" placeholder="Enter Email Address" name="email" required>
					<br>
					<button type="submit" class="btn btn-primary w-100" name="btnsubmit">Submit</button>
				</form>
			</div>

			<div class="col-md-8">
				<h4>Registered Users</h4>
				<table class="table table-bordered table-striped table-sm">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Email</th>
							<th>Joined</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$sql_query = "SELECT * FROM users ORDER BY id DESC";
							$result = $conn->query($sql_query);

							if ($result->num_rows > 0) {
								foreach ($result as $row) {
						?>
							<tr>
								<td><?=$row['id']?></td>
								<td><?=$row['name']?></td>
								<td><?=$row['email']?></td>
								<td><?=$row['created_at']?></td>
								<td>
									<a class="btn btn-success btn-sm" href="edit.php?id=<?=$row['id']?>">Edit</a>
									<a class="btn btn-danger btn-sm" href="delete.php?id=<?=$row['id']?>">Delete</a>
								</td>
							</tr>
						<?php
								}
							} else {
								echo "<tr><td colspan='5' class='text-center'>No data found</td></tr>";
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>
