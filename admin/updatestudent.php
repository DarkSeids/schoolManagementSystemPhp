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

?>
<table align="center" style="color: black">
<form action="updatestudent.php" method="post">
	
		<tr>
			<th>Enter Standerd</th>
	<td><input type="number" name="standerd" placeholder="enter Standerd" required=""></td>
	
		<th>Enter Student Name</th>
		<td>
	<input type="text" name="stuname" placeholder="Enter Student Name" required=""></td> 
	<td><input type="submit" name="submit" value="search"></td>
</tr>
</form>
</table>
<table style="color: black; width: 70%; line-height: 30px;" align="center" border="1">
	<tr style="background-color: #000; color: white;">
		<th>Number</th>
		<th>Image</th>
		<th>Name</th>
		<th>Rollno</th>
		<th>Edit</th>
	</tr>
<?php
if (isset($_POST['submit'])) {
   include('../dbcon.php');

   $standerd = $_POST['standerd'];
   $name = $_POST['stuname'];

   $sql ="SELECT * FROM `student` WHERE `standerd`='$standerd' AND `name` LIKE '%$name%'";
   $run = mysqli_query($con,$sql);
   if (mysqli_num_rows($run)<1) {
   	echo "<tr><td colspan='5'>No records found</td></tr>";
   }
   else{
   	$count=0;
   	while ($data = mysqli_fetch_assoc($run)) {
   		$count++;
   		?>
   		<tr>
		<td><?php echo $count;?></td>
		<td><img style="height: 10%; width: 20%;" src="../dataimg/<?php echo $data['image'];?>"/></td>
		<td><?php echo $data['name'];?></td>
		<td><?php echo $data['rollno'];?></td>
		<td><a href="updateform.php?sid = <?php echo $data['id']; ?>">Edit</td>
	</tr> <?php
   	}
   }
}
?>
</table>

