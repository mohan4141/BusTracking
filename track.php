<?php 
require_once "connection.php";
$sno=$_GET['id'];
$query="SELECT * FROM busdetails WHERE sno='$sno';";
$run=mysqli_query($conn,$query);
if(mysqli_num_rows($run)>0)
{
	$row=mysqli_fetch_array($run);
	$sno=$row['sno'];
	$dname=$row['dname'];
	$phone=$row['phone'];
	$Splace=$row['Splace'];
	$Stime=$row['Stime'];
	$Dplace=$row['Dplace'];
	$Dtime=$row['Dtime'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Tracking Details</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
	<?php 
	if(isset($dname))
	{ ?>
	<div class="container">
		<div class="page-header" style="background: #cce6ff;">
			<br>
			<center>Bus Tracking Details</center>
			<br>
		</div>
		<br>
		<div style="border:solid 1px black;">
			<div><center><img src="bus.png" class="rounded-circle" width="200px" height="200px"></center></div>


			<center>Serial Number    : <?php echo $sno;?></center>
			<center>Driver Name      : <?php echo $dname;?></center>
			<center>Driver Number    : <?php echo $phone;?></center>
			<center>Staring Place    : <?php echo $Splace;?></center>
			<center>Starting Time    : <?php echo $Stime;?></center>
			<center>Destination      : <?php echo $Dplace;?></center>
			<center>Destination Time : <?php echo $Dtime;?></center>
		</div>
	</div>
<?php } else 
{
	echo "NO details Found";
}
?>
</body>
</html>