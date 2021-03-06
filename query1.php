<?php
session_start();
if (isset($_SESSION["user_logged_in"])) {
        if ($_SESSION["user_logged_in"]==false){
                header("Location: http://localhost/CSI_WEB_BUILD/index.php");
        }
        else{
                
        }
}
else{
        header("Location: http://localhost/CSI_WEB_BUILD/index.php");
}
?>

<!doctype html>
<html lang="en-NZ">
<head> 
	<!-- NOTES: 
		- Link to paste in browser: localhost/CSI_WEB_BUILD/index.php
	-->
	
	<meta charset="utf-8">
	<meta name="author" content="Corey J Christensen">
	<meta name="description" content="Building a website using HTML, CSS, and PHP.">
	<meta name="keywords" content="HTML, CSS, PHP, XAMPP, MySQL, website build, databases">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Music Database</title>
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
                                <li><a href="query1.php">Albums</a></li>
                                <li><a href="query2.php">Artists</a></li>
                                <li><a href="logout.php">Log Out</a></li>
                                <?php
                                if (isset($_SESSION["admin_logged_in"])) {
                                ?>
                                <li><a href="admin.php">Admin</a></li>
                                <?php
                                }
                                ?>
                        </ul>
                </nav>
        </nav>
        <div id='main'>
                        <div class='querybox'>
                                <table>
                                <tr>
                                        <th>title</th>
                                        <th>album</th>
                                        <th>artist</th>
                                        <th>genre</th>
                                        <th>duration</th>
                                        <th>size</th>
                                </tr>
                                <?php 
                                        $query = ("SELECT s.title, a.album, art.artist, g.genre, s.duration, s.size
                                        FROM songs as s
                                        JOIN albums as a ON s.album_id = a.album_id
                                        JOIN artists as art ON s.artist_id = art.artist_id
                                        JOIN album_to_genre a2g ON a.album_id = a2g.album_id
                                        JOIN genres g ON a2g.genre_id = g.genre_id
                                        WHERE 1
                                        ORDER BY s.title DESC, art.artist DESC");
                                                        
                                        $result = mysqli_query($con, $query);
                                                        
                                        while($output=mysqli_fetch_array($result))
                                        {
                                ?>
                                
                                        
                                                
                                        <tr>
                                                <td><?php echo $output['title']; ?></td>
                                                <td><?php echo $output['album'];?></td>
                                                <td><?php echo $output['artist']; ?></td>
                                                <td><?php echo $output['genre']; ?></td>
                                                <td><?php echo $output['duration']; ?></td>
                                                <td><?php echo $output['size']; ?></td>
                                                
                                        <tr>

                                        
                                                
                                        
                                        <?php
                                        } 
                                ?>
                                </table>
                        </div>
                        
                                
        <div class="totaltime">Total duration: 13 hours 29 minutes 36 seconds</div>
        

</div>

</body>
</html>