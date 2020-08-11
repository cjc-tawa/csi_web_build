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
                <div id="bold"><center><h1>Kool-Kiwiana</h1></center></div>
                        <nav id='links'>
                                <ul>
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="query2.php">Category</a></li>
                                    
                                </ul>
                        </nav>
                </nav>
                <div id='main'>
					
					<div id='querybox'>
					<?php 
						$query = ("SELECT s.title, a.album, art.artist, g.genre, s.duration, s.size
                                                FROM songs as s
                                                JOIN albums as a ON s.album_id = a.album_id
                                                JOIN artists as art ON s.artist_id = art.artist_id
                                                JOIN album_to_genre a2g ON a.album_id = a2g.album_id
                                                JOIN genres g ON a2g.genre_id = g.genre_id
                                                WHERE 1
                                                ORDER BY g.genre ASC, art.artist ASC");
								
						$result = mysqli_query($con, $query);
					

                                                while($output=mysqli_fetch_array($result))
                                                                {
                                                        ?>
                                                        
                                                        <div class="headings2">
                                                                <div><p><img src="<?php echo $output['productImageLocation']; ?>" alt="Error" width="150" height="150"></p></div>
                                                                <div><p><?php echo $output['prodName'];?><br>$<?php echo $output['cost']; ?><br><?php echo $output['category']; ?><h3><?php echo $output['description']; ?></h3></p></div>
                                                                
                                                        </div>
                                                        <?php
                                                        } 
                                                        ?>
                                                </div>
                                        </div>
				</div>
      
                </div>
        </body>
</html>