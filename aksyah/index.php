<?php require_once "config.php"; ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>My Website</title>
  </head>
  <body>
    <h1>Welcome to My Website</h1>
    
    
    <a href="index.php">Home</a> |
    <a href="index.php?page=<?php echo base64_encode('page1');?>">Page 1</a> |
    <a href="index.php?page=<?php echo base64_encode('page2');?>">Page 2</a> |
    <a href="index.php?page=<?php echo base64_encode('page3');?>">Page 3</a>
    
    <hr/>
    <img src="ilham.jpeg" alt="" style="width: 200px;">
    <h3>Direktur</h3>
    
    <?php 
	
	$whitelist = array('page1','page2','page3');
    
    if (isset($_GET['page'])) 
    {   
        $halaman=base64_decode(filter_var($_GET['page'],FILTER_SANITIZE_STRING));
        if (!in_array($halaman,$whitelist)) {
			die('Invalid Page !');
		} else {			
			include 'pages/'.$halaman.'.php'; 
		}
    } 
    else 
    {
        echo "<p>This is the front page.</p>";
    }
    
    ?>
    
  </body>
</html>


