<?php
	include("config/connection.php");
	$sel="select * from contactus where ID=1";
	$exe=mysqli_query($con,$sel);
	$fetch=mysqli_fetch_array($exe);
?>

<html>
<head>
<title>ContectUs</title>
	<link href="css/style.css" rel="stylesheet" />
</head>

<body>
	<div class="myweb">
    	<?php  include("header.php");
			   include("menubar.php");
			   include("marq.php");
			   include("slider.php");
		 ?>
    
    	<div class="main">

        	<?php include("mleft.php"); ?>
            <div>              
            <div class="mright">
            	<h1>Contect Details:- </h1>
                <div class="curow">
                	<div class="culable">Contact Person</div>
                    <div class="cuinfo"><?php echo $fetch['CPerson']?></div>
                </div>
                
                <div class="curow">
                	<div class="culable">Mobile No. </div>
                    <div class="cuinfo"><?php echo $fetch['CMNo']?></div>
                </div>
                <div class="curow">
                	<div class="culable">Land Line No.</div>
                    <div class="cuinfo"><?php echo $fetch['CBPhone']?></div>
                </div>
                <div class="curow">
                	<div class="culable">Email ID</div>
                    <div class="cuinfo"><?php echo $fetch['Email']?></div>
                </div>
                <div class="curow ht100">
                	<div class="culable ht90">Address</div>
                    <div class="cuinfo ht90" style="overflow:auto;"><?php echo $fetch['Address']?></div>
                </div>                
                <div class="curow">
                	<div class="culable">Web Site</div>
                    <div class="cuinfo">www.railweather.com</div>
                </div>
            </div>
    	</div>
    
    	<?php include("footer.php"); ?>
	</div>
	
</body>
</html>
