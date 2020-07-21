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
	
	<!-- Stylesheets linked to this website. -->
	<link rel="stylesheet" href="style-2.css">
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
                                    <li><a href="query3.php">Clothing</a></li>
                                    <li><a href="query4.php">Not Clothing</a></li>
                                </ul>
                        </nav>
                </nav>
                <div id='main'>
					<div id='querybox'>
					<?php 
						$query = ("SELECT pn.prodName, m.cost, c.category,pi.productImageLocation,c.desName,pn.description, g.gender
FROM main AS m 
INNER JOIN prodName AS pn ON m.prodNameFK = pn.prodNamePK
INNER JOIN catDes AS c ON m.categoryFK = c.category_PK
INNER JOIN gender AS g ON m.genderFK = g.genderPK
INNER JOIN prodImage AS pi ON m.prodFileNameFK = pi.prodImagePK
WHERE c.category='Clothes'
ORDER BY g.gender DESC, m.cost DESC");
								
						$result = mysqli_query($con, $query);
							
                                                
                                                
						while($output=mysqli_fetch_array($result))
						{
					?>
                                                
                                                        <div class="headings2">
                                                                <div><p><img src="<?php echo $output['productImageLocation']; ?>" alt="Error" width="150" height="150"></p></div>
                                                                <div><p><?php echo $output['prodName'];?><br>$<?php echo $output['cost']; ?><br><?php echo $output['desName']; ?><h3><?php echo $output['description']; ?></h3></p></div>
                                                                
                                                        </div>
                                                
                                                <?php
                                                } 
                                                ?>
                                        
					</div>
                </div>
      
        </div>
</body>
</html>