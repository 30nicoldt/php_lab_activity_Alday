<?php
include 'dbcon.php';

if (isset($_GET['id'])) {
	$id = $_GET['id'];

	if (isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
		$query = $conn->query("DELETE FROM users WHERE id = '$id'");

		if ($query) {
			echo "Deleted Successfully!";
			echo "<br><br><a href='index.php'>Back to Home</a>";
		} else {
			echo "Error: " . $conn->error;
		}
	} else {
?>

<h2>Delete User</h2>
<p>Are you sure you want to delete this record?</p>

<a href="delete.php?id=<?=$id?>&confirm=yes">Yes, Delete</a>
<a href="index.php">No, Cancel</a>

<?php
	}
} else {
	header("Location: index.php");
	exit;
}
?>
