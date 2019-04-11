<?php
include("../config/connection.php");


$sel="select * from contactus where ID=1";
$exesel=mysqli_query($con,$sel);
$fetchsel=mysqli_fetch_array($exesel);


if($_POST['submit']=="Update")
{
$upd="update contactus set CPerson='".$_POST['fname']."', CMNo='".$_POST['mno']."', CBPhone='".$_POST['bpno']."', Email='".$_POST['uemail']."', Address='".$_POST['add']."'where ID=1";
mysqli_query($con,$upd) or die(" Update Query Failed");	
}

?>
<html>
<head>
<title>ContactUs</title>
<link href="css/style.css" rel="stylesheet">
</head>

<body>
<div class="outer">
	
    <?php include("header.php"); ?>
    
	<?php include("menubar.php"); ?>  
      
    <div class="main"> 
    	<form method="POST">
        	<div class="row">
        		<div class="label">Contact Persion:-</div>
            	<div class="info">
            	<input type="text" name="fname" value="<?php echo $fetchsel['CPerson'];?>" placeholder="Enter Your Name" style="height:30px; width:300px; font-size:18px;">
            	</div>
        	</div>
            <div class="row">
        		<div class="label">Mobile No:-</div>
            	<div class="info">
            	<input type="text" name="mno" value="<?php echo $fetchsel['CMNo'];?>" placeholder="Enter Mobile No." style="height:30px; width:300px; font-size:18px;">
            	</div>
        	</div>
            <div class="row">
        		<div class="label">Basic Phone:-</div>
            	<div class="info">
            	<input type="text" name="bpno" value="<?php echo $fetchsel['CBPhone'];?>" placeholder="Enter Basic Phone No." style="height:30px; width:300px; font-size:18px;">
            	</div>
        	</div>
            <div class="row">
        		<div class="label">Email Address:-</div>
            	<div class="info">
            	<input type="email" name="uemail" value="<?php echo $fetchsel['Email'];?>" placeholder="Enter Email" style="height:30px; width:300px; font-size:18px;">
            	</div>
        	</div>
            <div class="row" style="height:100px;">
        		<div class="label">Address:-</div>
            	<div class="info">
            	<textarea name="add" value="<?php echo $fetchsel['Address'] ?>" style="height:100px; width:300px; font-size:18px;"></textarea>
            	</div>
        	</div>
            <input type="submit" value="Update" name="submit" style="height:30px; width:90px;  font-size:18px; margin:30px 10 0px 430px;">
        </form>
    </div>
	
    <?php include("footer.php");?>    
    
</div>
</body>
</html>
