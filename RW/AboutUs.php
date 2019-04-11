<?php
	include("config/connection.php");
	$sel="select * from about where id=1";
	$exe=mysqli_query($con,$sel);
	$fetch=mysqli_fetch_array($exe);
	
	$selw="select * from whywe";
	$exew=mysqli_query($con,$selw);
?>
<html>
<head>
	<title>My About</title>
	<link href="css/style.css" rel="stylesheet" />
</head>

<body>
	<div class="myweb">
	    	<?php
			  include("header.php");
			  include("menubar.php");
			  
			  include("slider.php");
		 	?>  
        
    
    	<div class="main">
			<?php include("mleft.php"); ?>
            <div>              
            <div class="mright">
            	<h1><?php echo $fetch['Aheading'] ?></h1>
                <p><?php echo $fetch['abtxt']?></p>
                
                            </div>
    	</div>
    
    	<?php include("footer.php"); ?>
	</div>
</body>
</html>
