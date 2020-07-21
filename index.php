<!doctype html>
<html lang="en-NZ">
<head> 
	<!-- NOTES: 
		- Link to paste in browser: localhost/teacher/index.php
	-->
	<title>PHP Build</title>
	<meta charset="utf-8">
	<meta name="author" content="Corey J Christensen">
	<meta name="description" content="Building a website using HTML, CSS, and PHP.">
	<meta name="keywords" content="HTML, CSS, PHP, XAMPP, MySQL, website build, NCEA, databases">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- Fonts imported using Google Fonts. -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
	
	<!-- Stylesheets linked to this website. -->
	<link rel="stylesheet" href="style.css">
</head>
<body>
<div id="wrapper">
        <?php
        require_once("connect.php");
        ?>
        <nav id="navbar">
        <div id="bold"><center><h1>Music Database</h1></center></div>
                <nav id='links'>
                        <ul>
                                <li><a href="index.php">Home</a></li>
                                <li><a href="query2.php">Other query</a></li>
                                <!--<li><a href="query3.php">Clothing</a></li>-->
                                <!--<li><a href="query4.php">Not Clothing</a></li>-->
                        </ul>
                </nav>
        </nav>
        <div id='main'>
                                <div id='querybox'>
                                <?php 
                                        $query = ("SELECT s.title, a.album
                                        FROM songs as s
                                        JOIN albums as a ON s.album_id = a.album_id
                                        ORDER BY s.title");
                                                        
                                        $result = mysqli_query($con, $query);
                                                        
                                        while($output=mysqli_fetch_array($result))
                                        {
                                ?>
                                
                                        <div class="headings2">
                                                
                                                <div><p><?php echo $output['album'];?><br>$<?php echo $output['album']; ?><br><?php echo $output['album']; ?><h3><?php echo $output['title']; ?></h3></p></div>
                                                
                                        </div>
                                        <?php
                                        } 
                                  ?>
                                </div>
        </div>

</div>
</body>
</html>