
<?php
	include("../config/connection.php");

if (isset($_POST['del'])=="Delete")
{
    $tot= count($_POST['chk']);
	for($a=0; $a<$tot; $a++)
	{
	 $del="delete from enquery where ID='".$_POST['chk'][$a]."'";
	  mysqli_query ($del);
	  
	}
}


if(isset($_POST['but'])=='search')
{
	$where="where fname like '%".$_POST['search']."%'";
}	

	
$start=0;       //Starting position
$end=5;	       // No of record
if(isset($_GET['page'])){
$next=$_GET['page']+1;
$prev=$_GET['page']-1;
$start=$_GET['page']* $end;
}
	
	
	$sel="select * from enquery $where order by ID asc limit $start,$end";
	$exe=mysqli_query($con,$sel);
?>

<html>
<head>
<title>Enquery</title>
<link href="css/style.css" rel="stylesheet">
</head>

<body>
<div class="outer">
	
    <?php include("header.php"); ?>
    
	<?php include("menubar.php"); ?>  
      
    <div class="main">
    	<form action="enquery.php" method="post">
        
<div class="search"><input type="text" name="search" placeholder="Search Name" class="s1"><input type="submit" name="but" value="Search" class="but"></div>
        
        
    	<div class="tbl">
        	<div class="viewrow">
            	<div class="viewrow">
<div class="col"><input type="submit" name="del" value="Delete" onClick="del()"></div>
<div class="ttl" style="font-size:28px;padding-top:0px;height:30px;">Name</div>
<div class="col" style="font-size:28px;padding-top:0px;height:30px;">Gender</div>
<div class="ttl" style="font-size:28px;padding-top:0px;height:30px;">Mobile</div>
<div class="desc" style="font-size:28px;padding-top:0px;height:30px;">Email</div>
<div class="col" style="font-size:28px;padding-top:0px;height:30px;">City</div>
<div class="ttl" style="font-size:28px;padding-top:0px;height:30px;">Enquery</div>
                </div>
            </div>
            <?php while($fetch=mysqli_fetch_array($exe)) 
					{?>
			<div class="viewrow">
            	<div class="viewrow">
<div class="col"><input type="checkbox" name="chk[]" value="<?php echo $fetch['ID'];?>"></div>
<div class="ttl" style="font-size:20px"><?php echo $fetch['fname'], $fetch['lname']?></div>
<div class="col"><?php echo $fetch['gender']?></div>
<div class="ttl"><?php echo $fetch['contact']?></div>
<div class="desc" style="font-size:20px"><?php echo $fetch['email']?></div>
<div class="col"><?php echo $fetch['city']?></div>
<div class="ttl" style="font-size:20px; overflow:auto;overflow-style:marquee-line;"><?php echo $fetch['enq']?></div>  
                </div>
            </div>
            <?php }?>
		</div>
        
  
  
        
<div class="search">

<?php if($_GET['page']==0) 
				{
	      		  echo 'First Prev';
				 }
			else
			{
?>
			<a href="enquery.php?page=0">First</a>
			<a href="enquery.php?page=<?php echo $prev;?>">Prev</a>
        <?php } ?>
        			
			<?php
			$sel_pag="select * from enquery $where" or die ("987654321");
			$exe_pag=mysqli_query($con,$sel_pag) or die ("Search Did'nt match");
			$tot_rec=mysqli_num_rows($exe_pag);
			 
			$final_tot=ceil($tot_rec/$end);
			for($aa=0; $aa<$final_tot; $aa++)
			{
			?>
			<a href="enquery.php?page=<?php echo $aa;?>"><?php echo $aa+1;?></a>
			<?php
			}
			?>

	<?php 
	 if($_GET['page']==$final_tot-1)
	 {
	
	?>
	Next Last
	<?php 
	}
	else
	{
	?>
			<a href="enquery.php?page=<?php echo $next;?>">Next</a>
			<a href="enquery.php?page=<?php echo $final_tot-1;?>">Last</a>
<?php } 

if($tot_rec==0)
{
	echo "No record found";
}

?>

</div>        

        
        
        
        </form>
   	</div>
    <?php include("footer.php");?>    
    
</div>
</body>
</html>
