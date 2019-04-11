<?php
session_start(); 

if($_SESSION['ADMIN']=="")
{
	echo'<script> window.location="index.php" </script>';	
}

include("../config/connection.php");

if(isset($_POST['Submit'])=="Update")
{
	$upd="update home set Htext='".$_POST['txt']."', Hheading='".$_POST['heading']."' where 															ID=1";
	mysqli_query($con,$upd) or die(" Update Query Failed");	
}

$sel="select * from home where ID=1";
$exesel=mysqli_query($con,$sel);
$fetchsel=mysqli_fetch_array($exesel);
?>


<html>
<head>
<title>Home</title>
<link href="css/style.css" rel="stylesheet">
</head>

<body>
<div class="outer">
	
    <?php include("header.php"); ?>
    
	<?php include("menubar.php"); ?>  
      
    <div class="main">
    	<div class="main">
      <form method="post">
      	<div class="mainrow">
        	<div class="mleft">Heading</div>
            <div class="mright">
            	<input type="text" name="heading" value="<?php echo $fetchsel['Hheading']; ?>"style="height:30px; width:300px; font-size:20px;">
            </div>
        </div>
    	<div class="mainrow" style="height:150px">
        	<div class="mleft">Text For Home Page</div>
            <div class="mright" style="height:150px">
            	<textarea name="txt" style="height:150px; width:580px;"><?php echo $fetchsel['Htext']; ?></textarea>
            </div>
        </div>
        <input type="submit" value="Update" name="Submit" style="height:30px; width:90px; font-size:20px; margin:5px 0 0 330px;">	
      </form>
    </div>   
    </div>
	
    <?php include("footer.php");?>    
    
</div>
</body>
</html>
