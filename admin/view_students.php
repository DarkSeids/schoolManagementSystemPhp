<?php
session_start();
if (isset($_SESSION['uid'])) {
	
	echo "";
}

else {
	header('location: ../login.php');
}

?>

<?php

include('header.php');
include('titlehead.php');
include"../dbcon.php";

?>

<table style="color: black; width: 70%; line-height: 30px;" align="center" border="1">
	<thead>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>City</th>
			<th>Standerd</th>
			<th>Roll No</th>
			<th>Parents Contact</th>
			<th>Image</th>
			<th>Option</th>

		</tr>
	</thead>

	<tbody>
		<?php 
		$query = "SELECT * FROM student ";
		$select_student = mysqli_query($con, $query);

		while ($row = mysqli_fetch_assoc($select_student)) {
			$id = $row['id'];
			$name = $row['name'];
			$city = $row['city'];
			$standerd = $row['standerd'];
			$rollno = $row['rollno'];
			$pcont = $row['pcont'];
			$image = $row['image'];

			if ($select_student == TRUE) {
				

				?>

				<tr>
					<td><?php echo $id; ?></td>
					<td><?php echo $name; ?></td>
					<td><?php echo $city; ?></td>
					<td><?php echo $standerd; ?></td>
					<td><?php echo $rollno; ?></td>
					<td><?php echo $pcont; ?></td>
					<td><img width="100" src="../dataimg/<?php echo $image; ?>"></td>
				<?php echo "<td><a href='view_students.php?delete=$id'>Delete</a>"; ?>
				<?php echo "<td> <a href= 'update_student.php?update_student_id = $id'>Update </a>"; ?>
				</tr>
				<?php 
			}
		}


		?>
	</tbody>
</table>

<?php
if (isset($_GET['delete'])) {

	$student_id = $_GET['delete'];
	$query =  "DELETE FROM student WHERE $id = {$student_id}";
	$delete_student = mysqli_query($con, $query);
	if (!$delete_student) {
		die("Query Failed" . mysqli_error($con));
	}
	header("location:view_students.php");
}

?>