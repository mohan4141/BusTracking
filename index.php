<?php
require_once "connection.php";
if(isset($_POST['submit']))
{
	$sno=$_POST['sno'];
	$dname=$_POST['dname'];
	$phone=$_POST['phone'];
	$Splace=$_POST['Splace'];
	$Stime=$_POST['Stime'];
	$Dplace=$_POST['Dplace'];
	$Dtime=$_POST['Dtime'];
	if(strlen($phone)!=10)
	{
		$error="Invalid Phone Number";
	}
	else
	{
		$query="INSERT INTO `busdetails`(`id`, `sno`, `dname`, `phone`, `Splace`, `Stime`, `Dplace`, `Dtime`) VALUES ('','$sno','$dname','$phone','$Splace','$Stime','$Dplace','$Dtime')";
		$run=mysqli_query($conn,$query);
		if($run)
		{
			$set=1;
			$url="https://localhost/BusTracker/track.php?id=$sno";
		}
		else
		{
			echo "Something Went Wrong";
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Bus Details</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="page-header" style="background: #cce6ff;">
			<br>
			<center>Bus Tracking Details</center>
			<br>
		</div>

		<?php
		if(isset($set))
		{?>

			<div class="bg-success">Your details are saved in our Database</div>

			<div><b >Save the QR Code</b></div>
			<img src="http://api.qrserver.com/v1/create-qr-code/?data=<?php echo $url;?>&size=[200]x[200]">
		<?php } else { ?>
		<div class="form-group">
			<form action="" method="POST">
				<?php 
					if(isset($error))
					{
						echo '<div class="bg-danger">Invalid Mobile Number</div>';
					}
				?>
				<label for="text">Serial Number</label>
				<input type="text" id="sno" name="sno" class="form-control" placeholder="Bus serial Number..." required=""><br>

				<label for="text">Driver Name</label>
				<input type="text" id="dname" name="dname" class="form-control" placeholder="Driver Name..." required=""><br>

				<label for="number">Driver Mobile</label>
				<input type="number" id="number" name="phone" class="form-control" placeholder="Driver Mobile Number..." required=""><br>

				<label for="text">Starting Place</label>
				<input type="text" id="startplace" name="Splace" class="form-control" placeholder="Starting Area..." required=""><br>

				<label for="Time">Starting Time</label>
				<input type="time" id="Stime" name="Stime" class="form-control" required=""><br>

				<label for="text">Destination</label>
				<input type="text" id="Dplace" name="Dplace" class="form-control" placeholder="Destination place..." required=""><br>

				<label for="Time">Destination Time</label>
				<input type="time" id="Dtime" name="Dtime" class="form-control" required=""><br>

				<button class="btn btn-primary" style="margin-top: 3px;" name="submit">Generate QR</button><br>
			</form>
		</div>
		<?php } ?>
	</div>
</body>
</html>