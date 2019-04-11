<?php 
	include("config/connection.php");
	
	if(isset($_GET['Submit'])=="Submit")
	{
		$ins="INSERT INTO enquery (`ID`, `fname`, `lname`, `gender`, `contact`, `email`, `city`, `state`,`country`,`enq`) VALUES (NULL, '".$_GET['Fname']."', '".$_GET['Lname']."', '".$_GET['r']."', '".$_GET['no']."', '".$_GET['uemail']."', '".$_GET['city']."','".$_GET['state']."','".$_GET['contry']."','".$_GET['enquery']."')";
		
		mysqli_query($con,$ins);
		
		echo"<script>alert('Successfull Submitted')</script>";
	}

?>
<html>
<head>
<title>Enquery</title>
	<link href="css/style.css" rel="stylesheet" />
</head>

<body>
	<div class="myweb">
    	<?php	include("header.php");
			   	include("menubar.php");
			   
				include("slider.php");
		?>

    
    	<div class="main">
	
        	<?php include("mleft.php"); ?>
            <div>              
            <div class="mright">
            	<h2>Please enter your personal details :-</h2>
                <form method="GET">
                <div class="curow">
                	<div class="culable">Gender</div>
                    <div class="cuinfo">
                    	<input type="radio" name="r" value="M"> Male 
                    	<input type="radio" name="r" value="F">Female
                    </div>
                </div>
                <div class="curow">
                	<div class="culable">First Name</div>
                    <div class="cuinfo"><input type="text" name="Fname" class="input" 					                     placeholder="Enter First Name"></div>
                </div>
                <div class="curow">
                	<div class="culable">Last Name</div>
                    <div class="cuinfo"><input type="text" name="Lname"class="input" 					                     placeholder="Enter Last Name"></div>
                </div>
                
                <div class="curow">
                	<div class="culable">Contect No</div>
                    <div class="cuinfo"><input type="text" name="no" class="input" 					                     placeholder="Enter Contect No."></div>
                </div>
                
                <div class="curow">
                	<div class="culable">Email</div>
                    <div class="cuinfo"><input type="email" name="uemail" class="input"                         placeholder="Enter Your Email"</div>
                    </div>
                </div>
                
                <div class="curow ht100">
                	<div class="culable ht90">Address</div>
                    <div class="cuinfo ht90" ><textarea name="address" class="textarea" placeholder=                     "Enter Your Address"></textarea></div>
                </div>
                
                <div class="curow">
                	<div class="culable">Zip/ Postal Code</div>
                    <div class="cuinfo"><input type="text" name="pin"class="input"></div>
                </div>

                <div class="curow">
                	<div class="culable">City</div>
                    <div class="cuinfo">
                    <input type="text" name="city"class="input"> 
                    </div>
                </div>


                <div class="curow">
                	<div class="culable">State</div>
                    <div class="cuinfo">
                    	<input type="text" name="state"class="input">
                    </div>
                </div>
                

                <div class="curow">
                	<div class="culable">Country</div>
                    <div class="cuinfo">
                    	<select name="contry" class="input">
                        <option value="Afghanistan">Afghanistan</option>
						<option value="Albania">Albania</option>
						<option value="Algeria">Algeria</option>
						<option value="Andorra">Andorra</option>
						<option value="Angola">Angola</option>
                        <option value="Iceland">Iceland</option>
						<option value="India" selected>India</option>
						<option value="Indonesia">Indonesia</option>
						<option value="Iran">Iran</option>
						<option value="Iraq">Iraq</option>
                        <option value="Japan">Japan</option>
                    	</select>
                    </div>
                </div>







                
                <div class="curow ht100">
                	<div class="culable ht90">Enquery</div>
                    <div class="cuinfo ht90" ><textarea name="enquery" class="textarea" placeholder=                     ""></textarea></div>
                </div>
                <div class="curow">
                	<input type="submit" name="Submit" value="Submit" class="sub">									                    <input type="reset" value="Start Again" class="stag">
                </div>
                </form>
            </div>
    	</div>
    
    	<?php include("footer.php"); ?>
	</div>
	
</body>
</html>
