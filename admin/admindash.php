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
?>
<div class="admintitle" align="center">
	<h4><a href="logout.php" style="float: right; font-size:20px; color: #fff; margin-right: 30px">Logout</a></h4>
<h1>Welcome to admin dashboard</h1>

</div>
<br>


<div class="dashboard">
	<table align="center" style="width: 50%;">
	<tr>
		<td>1.</td>
		<td><a href="addstudent.php">Add Student Details</a></td>
	</tr>
	<tr>
		<td>2.</td>
		<td><a href="view_students.php">All students</a></td>
	</tr>
	<tr>
		<td>3.</td><td><a href="updatestudent.php">Search Student</a></td>
	</tr>
	<tr>
		<td>4.</td><td><a href="deletestudent.php">Delete student details</a></td>
	</tr>
</table>
</div>

</body>
</html>