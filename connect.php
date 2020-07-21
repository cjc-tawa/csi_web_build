<!-- NOTES: 
	- Link to paste in browser: localhost/teacher/connect.php
		
	Database:
	- Server name: 3086896_cchristensen
	- Database name: 3086896_cchristensen
	- User name: 3086896_cchristensen
	- Password: dojustly01
-->

<?php
	$con = mysqli_connect('localhost', 'root', '', 'music_database');
	if (mysqli_connect_errno())
	{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
?>

