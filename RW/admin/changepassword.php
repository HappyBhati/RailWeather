<?php 
	include("../config/connection.php");
	
	$sel="select * from user";
	$exe=mysqli_query($con,$sel);
	$fetch=mysqli_fetch_array($exe);
	
	if(isset($_GET['submit'])=="Update")
	{
		if(isset($_GET['opass'])==$fetch['Upass'])
		{
			if(isset($_GET['npass'])==isset($_GET['cpass']))
		  	{
				$upd="update user set Upass='".$_GET['cpass']."' where ID='".$fetch['ID']."'";
				mysqli_query($con,$upd) or die("Update query failed");
				$msg="Password changed successfully";
				$cnt=1;
				
		  	}
		}
	}
?>

<html>
<head>
<title>changepassword</title>
<link href="css/style.css" rel="stylesheet">
</head>

<body>
<div class="outer">
	
    <?php include("header.php"); ?>
    
	<?php include("menubar.php"); ?>  
      
    <div class="main">
    	<form method="get">
        
        <?php 
		$cnt=0;
		
		if($cnt==1)
		{
			?>
          <div class="row"><?php echo $msg ?></div>
       	<?php } ?>
    		<div class="row">
        		<div class="label">Old Password</div>
            	<div class="info">
            		<input type="text" name="opass" placeholder="Enter old password" style="height:30px; width:300px; font-size:18px;">
            	</div>
        	</div>
            <div class="row">
        		<div class="label">New Password</div>
            	<div class="info">
            		<input type="password" name="npass" placeholder="Enter new password" style="height:30px; width:300px; font-size:18px;">
            	</div>
        	</div>
            <div class="row">
        		<div class="label">Conform Password</div>
            	<div class="info">
            		<input type="password" name="cpass" placeholder="Re-Enter new password" style="height:30px; width:300px; font-size:18px;">
            	</div>
        	</div>
<input type="submit" value="Update" name="submit" style="height:30px; width:90px;  font-size:18px; margin:30px 0 10px 430px;">
        </form>
   	</div>
	
    <?php include("footer.php");?>    
    
</div>
</body>
</html>
