<!doctype html>
<html lang="en-NZ">
<head> 
	<!-- NOTES: 
		- Link to paste in browser: localhost/CSI_WEB_BUILD/index.php
	-->
	<title>PHP Build</title>
	<meta charset="utf-8">
	<meta name="author" content="Corey J Christensen">
	<meta name="description" content="Building a website using HTML, CSS, and PHP.">
	<meta name="keywords" content="HTML, CSS, PHP, XAMPP, MySQL, website build, databases">
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
        <div id="bold"><h1>Music Database</h1></div>
                <nav id='links'>
                        <ul>
                                <li><a href="index.php">Albums</a></li>
                                <li><a href="query2.php">Artists</a></li>
                                <li><a href="query3.php">Songs</a></li>
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
                                
                                        
                                                
                                        <div class="query_items"><p><?php echo $output['album'];?><?php echo $output['album']; ?><?php echo $output['album']; ?><?php echo $output['title']; ?></p></div>
                                                
                                        
                                        <?php
                                        } 
                                  ?>
                                </div>
        </div>

</div>
</body>
</html>