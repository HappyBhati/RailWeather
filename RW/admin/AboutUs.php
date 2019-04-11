<?php
include("../config/connection.php");

session_start();
if($_SESSION['ADMIN']=="")
{
echo'<script> window.location="index.php" </script>';	
}


$sel="select * from about where ID=1";
$exesel=mysqli_query($con,$sel);
$fetchsel=mysqli_fetch_array($exesel);

if(isset($_POST['Submit'])=="Update")
{
$upd="update about set abtxt='".$_POST['txt']."', Aheading='".$_POST['heading']."' where ID=1";
mysqli_query($con,$upd) or die("Update Query Failed");	
}

?>

<html>
<head>
<title>AboutUs</title>
<link href="css/style.css" rel="stylesheet">
</head>

<body>
<div class="outer">
	
    <?php include("header.php"); ?>
    
	<?php include("menubar.php"); ?>  
      
    <div class="main">
      <form method="post">
    	<div class="mainrow">
        	<div class="mleft">Heading</div>
            <div class="mright">
            	<input type="text" name="heading" value="<?php echo $fetchsel['Aheading']; ?>" style="height:30px; width:300px; font-size:20px;">
            </div>
        </div>
    	<div class="mainrow" style="height:150px">
        	<div class="mleft">Text For AboutUs Page</div>
            <div class="mright" style="height:150px">
            	<textarea name="txt" style="height:150px; width:580px;"><?php echo $fetchsel['abtxt'] ?></textarea>
            </div>
        </div>
        <input type="submit" value="Update" name="Submit" style="height:30px; width:90px; font-size:20px; margin:5px 0 0 330px;">		
      </form>
    </div>
	
    <?php include("footer.php");?>    
    
</div>
</body>
</html>
