<?php
 if(isset($_REQUEST['submit']))
if($_REQUEST['submit']=="Submit")
{
$x=$_REQUEST['cid'];
?>
<script> window.location="fare.php?cid=<?php echo $x; ?>" </script>
<?php } ?>
<html>
<head>
<title>Home</title>
<link href="css/blink.css" rel="stylesheet"/>

<style>
.outer
{
	background-color:rgba(0,0,0,.5);
	width:1400px;
	height:100%;
	background-color:#00F;
	text-align:center;
	font-size:20px;
	font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
}
.homebg
{
	background-color:rgba(0,0,0,.5);
 width:1400px;
 text-align:center;
 padding-top:60px;
 height:100%;
 background-image:url(images/bg.jpg);
 background-size:100% 100%;
 font-size:40px;
 font-family:"Comic Sans MS", cursive;
 color:#FFF;
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

</style>
</head>
<body>

<div class="outer">   
<form>
    <div class="homebg">Welcome To Indian Railway <blink>!</blink>
     <br><br><br><br><br><br><br><br>
    <input type="text" placeholder="            Enter Train No. " name="cid" style="border-color:#FFF;                                                   background-color:transparent;
font-size:20px;
color:#FFF; font-weight: bold;"> 

<input type="submit" name="submit" value="Submit" style=" background-color:transparent; color:#FFF; border-color:#FFF; font-size:20px;"> 

</form>
</div>
</body>
</html>
