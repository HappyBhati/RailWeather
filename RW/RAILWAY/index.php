
<?php

if(isset($_REQUEST['submit']))
if($_REQUEST['submit']=="Submit")
{
$x=$_REQUEST['tno'];

?>
<script> window.location="home.php?tno=<?php echo $x; ?><?php echo $y; ?>" </script>

<?php } ?>


<html>
<head>
<title>Home</title>
<link href="css/blink.css" rel="stylesheet"/>

<style>
.outer
{
	width:1350px;
	
	background-image:url(images/bg.jpg);
	text-align:center;
	font-size:20px;
	font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
	
 background-size:100% 100%;
}
.demo{background:rgba(0,0,0,.6);}
.logo{background:rgba(0,0,0,.6);}
.homebg
{
 width:1350px;
 text-align:center;
 padding-top:60px;
 height:600px;
 font-size:40px;
 font-family:"Comic Sans MS", cursive;
 color:#fff;
}
blue
{
  color:#00F;
}
red
{
  color:#F00;
}
yellow
{
  color:#FF0;
}
green
{
  color:#0F0;
}

.header
{
 height:50px;
 width:1350px;
 border:thick;
 color:#fff;
 background-color:#000;
 

}
.logo
{
	
	width:50px;
	height:50px;
	text-align:center;
	color:#EEE;
	font-family:"Lucida Console", Monaco, monospace;
	
	float:left;
}
.menu
{
	
	width:150px;
	height:50px;
	text-align:center;
	color:#EEE;
	font-family:"Lucida Console", Monaco, monospace;

	float:left;
	background-color:#000;
}
w
{
	color:#EEE;
}


</style>
</head>
<body>


    	



<div class="outer">
<div class="demo">
<div class="header">

<div class="logo"><a href="../index.php"><img src="../images/003.JPG" width="50" height="50" alt="Image" title="Logo" /></div>
<div class="menu"><a href="index.php"><w>Live Train Status</w></a></div>
<div class="menu"><a href="pnr.php"><w>PNR<br> STATUS</w></a></div>
<div class="menu"><a href="FARE.php"><w>Fare<br> Enquiry</w></a></div>
</div>
<form action="home.php" method="get">

   
    <div class="homebg">Welcome To INDIAN RAILWAY <blink>!</blink>
     <br><br><br><br><br><br><br><br>
    <input type="text" placeholder="ENTER TRAIN NO " name="tno" style="border-color:#fff;background-color:transparent;font-size:20px;color:#FFF; font-weight: bold;">
	<select name="date" id="date">
    	<script>
		var d = new Date();
var year=d.getFullYear();
			var date=d.getDate();
			if(date<10)
			{date=""+0+date;
				}
			var month=d.getMonth()+1;
			if(month<10)
			{month=""+0+month;
				}
			var dates=""+year+month+date;
			//var yesdate=""+
			
			var Yesterday='<option value="'+dates+'">Yesterday</option>';
			var today='<option value="'+dates+'">Today</option>';
			//alert(today);
			document.write(today);
			//document.getElementById("dated").value=dates;
			alert(today);
		
        </script>
   
        
    </select>
    

<input type="submit" name="submit" value="Submit" style=" background-color:transparent; color:#fff; border-color:#fff; font-size:20px;"> 

</form>
</div>
</div>


</body>
</html>
