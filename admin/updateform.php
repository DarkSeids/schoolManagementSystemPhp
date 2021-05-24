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
include('../dbcon.php');

$sid = isset($_REQUEST['sid']);
$sql = "SELECT * FROM `student` WHERE `id` = '$sid'";
$run = mysqli_query($con,$sql);
while ($data = mysqli_fetch_assoc($run)) {
	
	$id = $data['id'];
	$rollno = $data['rollno'];
	$name = $data['name'];



	if (isset($_POST['update'])) {

		$rollno =  $_POST['rollno'];
		$name = $_POST['name'];
		$city = $_POST['city'];
		$pcont = $_POST['pcont'];
		$standerd =$_POST['standerd'];
		$image = $_POST['image'];

		$query = "UPDATE student SET rollno = '{$rollno}', name = '{$name}', city = '{$city}', pcont = '{$pcont}', image = '{$image}' WHERE id = $sid "; 

		$update_student = mysqli_query($con,$sql);
		if (!$update_student) {
			die("Query Failed" . mysqly_error($con));

		}

		header("location : updatestudent.php;" );

		
	}
}

?>

<form method="post" action="updateform.php" enctype="multipart/form-data">
	<table align="center" border="1" style="width: 70%; margin-top: 40px; line-height: 30px; color: black;">
		<tr>
			<th>Roll no</th>

			<td><input type="text" name="rollno" value="" required=""></td>
		</tr>
		<tr>
			<th>Full Name</th>
			<td><input type="text" name="name" value="<?php echo $data['name']; ?>" required=""></td>
		</tr>
		<tr>
			<th>City</th>
			<td><input type="text" name="city" value="<?php echo $data['city']; ?>" required=""></td>
		</tr>
		<tr>
			<th>Parents Contact No</th>
			<td><input type="text" name="pcon" value="<?php echo $data['pcont']; ?>" required=""></td>
		</tr>
		<tr>
			<th>Standerd</th>
			<td><input type="number" name="std" value="<?php echo $data['standerd']; ?>" required=""></td>
		</tr>
		<tr>
			<th>Image</th>
			<td><input type="file" name="simg" required=""></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" name="update" value="update"></td>
		</tr>
	</table>
</form>

