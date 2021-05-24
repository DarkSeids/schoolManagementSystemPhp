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
<?php 
if (isset($_GET['update_student_id'])) {
$edit_student_id  = $_GET['update_student_id'];



$query = "SELECT * FROM student WHERE id = $edit_student_id ";
$select_student = mysqli_query($con, $query);

while ($row = mysqli_fetch_assoc($select_student)) {
	$id = $row['id'];
	$name = $row['name'];
	$city = $row['city'];
	$standerd = $row['standerd'];
	$rollno = $row['rollno'];
	$pcont = $row['pcont'];
	$image = $row['image'];

	if (isset($_POST['update_student'])) {
		$rollno = $_POST['rollno'];
		$name = $_POST['name'];
		$city = $_POST['city'];
		$pcont = $_POST['pcont'];
		$standerd = $_POST['standerd'];
		

		$query = "UPDATE student SET rollno = '{$rollno}', name = '{$name}', city = '{$city}', pcont = '{$pcont}', standerd = '{$standerd}' WHERE id = $edit_student_id ";

		$update_student = mysqli_query($con, $query);
		if (!$update_student) {
			die("Query Failed" . mysqli_eroor($con));

		}

		header("location : view_students.php");	

		
	

?>

<center><h3>Update Student Detail:</h3></center>

<form method="post" action="" enctype="multipart/form-data">
	<table align="center" border="1" style="width: 70%; margin-top: 40px; line-height: 30px; color: black;">
		<tr>
			<th>Roll no</th>
			<td><input type="text" value="<?php echo $rollno ?>" name="rollno" placeholder="Enter rollno" required=""></td>
		</tr>
		<tr>
			<th>Full Name</th>
			<td><input type="text" name="name" placeholder="Enter Full Name" required=""></td>
		</tr>
		<tr>
			<th>City</th>
			<td><input type="text" name="city" placeholder="Enter City" required=""></td>
		</tr>
		<tr>
			<th>Parents Contact No</th>
			<td><input type="text" name="pcon" placeholder="Enter the no of parents" required=""></td>
		</tr>
		<tr>
			<th>Standerd</th>
			<td><input type="number" name="std" placeholder="Enter Standerd" required=""></td>
		</tr>
		<tr>
			<th>Image</th>
			<td><input type="file" name="simg" required=""></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" name="update_student" value="update"></td>
		</tr>
	</table>
</form>

<?php 
}
}

}
?>
