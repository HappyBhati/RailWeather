<?php

include("../config/connection.php");
if(isset($_POST['submit'])=="Login")
{
 $sel="select * from user where Uname='".$_POST['uname']."' and Upass='".$_POST['upass']."' ";
	 $exe=mysqli_query($con,$sel) or die("Select Query fail");
	 $fetch=mysqli_fetch_array($exe);
	 $tot=mysqli_num_rows($exe);

	 if($tot==1)
	 {
		 session_start();
		 $_SESSION['ADMIN']=$fetch['ID'];
		 
		 echo'<script> window.location="home.php"</script>';
 	 }
	 else
	 {
 		$msg="Invalid user name or password";
		$cnt=1;
	 }
}


?>


<html>
<head>
<title>LogIn</title>
<link href="css/style.css" rel="stylesheet">
</head>

<body>
<div class="outer">
    <?php include("header.php"); ?>  
    <div class="main">
    	<form method="post">
        	<div class="row">
        		<div class="label">User Name</div>
            	<div class="info">
            		<input type="text" name="uname" value="" placeholder="Enter user name" style="height:30px; width:300px; font-size:18px;">
            	</div>
        	</div>	
            <div class="row">
        		<div class="label">Enter Password</div>
            	<div class="info">
            		<input type="password" name="upass" value="" placeholder="Enter password" style="height:30px; width:300px; font-size:18px;">
            	</div>
        	</div>
            <input type="submit" value="Login" name="submit" style="height:30px; width:90px;  font-size:18px; margin:30px 0 10px 430px;"> 
<?php 
if(isset($msg))
{
echo $msg; }?>
    	
        </form> 
    </div>
	
    <?php include("footer.php");?>    
    
</div>
</body>
</html>
