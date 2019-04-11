<?php
	include("config/connection.php");
	$sel="select * from `home` where ID=1";
	//echo $sel;die;
	$exe=mysqli_query($con,$sel);
	$fetchh=mysqli_fetch_array($exe);
?>
<html>
<head>
<title>My Website</title>
	<link href="css/style.css" rel="stylesheet" />
</head>

<body>
	<div class="myweb">
    
    	<?php	include("header.php");
			   	include("menubar.php");
			   	
				include("slider.php");
		?>
         
    
    	<div class="main">

        	<?php include("mleft.php"); ?>
            <div>              
            <div class="mright">
            	<h1><?php echo $fetchh['Hheading'];?></h1>
                <p><?php echo $fetchh['Htext'];?></p>
            </div>
    	</div>
    
    	<?php include("footer.php"); ?>
	</div>
	
</body>
</html>
