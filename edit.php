<?php
include 'dbcon.php';

$id = $_GET['id'];

$query = $conn->query("SELECT * FROM users WHERE id = $id");
foreach ($query as $row) {
?>
<form method="post">
	<input type="text" placeholder="Enter Full Name" value="<?=$row['name']?>" name="name" required>
	<input type="email" placeholder="Enter Email Address" value="<?=$row['email']?>" name="email" required>
	<button type="submit" name="btnsubmit">Submit</button>
</form>
<?php
}
?>

<?php
	include 'db_connect.php';

	if (isset($_POST['name'])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$id = $_GET['id'];

		$query = "UPDATE users SET name = '$name', email = '$email' WHERE id = '$id'";
		$result = $conn->query($query);

		if ($result) {
			echo "Record Updated successfully!";
		} else {
			echo "Error: " . $conn->error;
		}
	}
?>
