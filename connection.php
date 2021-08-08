<?php
session_start();
$conn=mysqli_connect('localhost','root','','bustrack'); 
if(!$conn)
{
	echo "Not Connected";
}
?>