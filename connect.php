<!-- NOTES: 
	- Link to paste in browser: localhost/teacher/connect.php
-->

<?php
	$con = mysqli_connect('localhost', 'root', '', 'music_database');
	if (mysqli_connect_errno())
	{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
?>

