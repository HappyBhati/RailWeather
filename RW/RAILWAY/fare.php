
<html>
<head>
<title>Indian Railway</title>
<link href="css/Style1.css" rel="stylesheet">
<script>

//FARE
var url="http://api.railwayapi.com//fare/train/<?php echo $_GET['cid']?>/source/ju/dest/dli/age/18/quota/PT/doj/20-05-2017/apikey/rf6tdams/";
	 	 var pnrHttpRequest = new XMLHttpRequest();
	 pnrHttpRequest.onreadystatechange = function() {
		 if(pnrHttpRequest.readyState ==4 && pnrHttpRequest.status == 200) {
			 
			 var jsonResponse = JSON.parse(pnrHttpRequest.responseText);
	         console.log(jsonResponse);		 
             displayPnrResults(jsonResponse);
		 }
	 };
	pnrHttpRequest.open("GET", url, true);
	pnrHttpRequest.send(); 
	 
	 
	 
	 //STATUS CALL
	 function displayPnrResults(jsonResponse)
	 {
		 //status
		
		document.getElementById("tna").innerHTML = jsonResponse.train.name;
		document.getElementById("tna1").innerHTML = jsonResponse.train.name;
		document.getElementById("tno").innerHTML = jsonResponse.train.number;
		document.getElementById("to").innerHTML = jsonResponse.to.code;
		document.getElementById("ton").innerHTML = jsonResponse.to.name;
		document.getElementById("from").innerHTML = jsonResponse.from.code;
		document.getElementById("fromn").innerHTML = jsonResponse.from.name;
	    
		document.getElementById("qt").innerHTML = jsonResponse.quota.code;
		document.getElementById("qtc").innerHTML = jsonResponse.quota.name;
		document.getElementById("ac").innerHTML = jsonResponse.fare["0"].code;
		document.getElementById("af").innerHTML = jsonResponse.fare["0"].fare;
		document.getElementById("an").innerHTML = jsonResponse.fare["0"].name;
		document.getElementById("bc").innerHTML = jsonResponse.fare["1"].code;
		document.getElementById("bf").innerHTML = jsonResponse.fare["1"].fare;
		document.getElementById("bn").innerHTML = jsonResponse.fare["1"].name;
		document.getElementById("bc").innerHTML = jsonResponse.fare["2"].code;
		document.getElementById("bf").innerHTML = jsonResponse.fare["2"].fare;
		document.getElementById("bn").innerHTML = jsonResponse.fare["2"].name;
		document.getElementById("dc").innerHTML = jsonResponse.fare["3"].code;
		document.getElementById("df").innerHTML = jsonResponse.fare["3"].fare;
		document.getElementById("dn").innerHTML = jsonResponse.fare["3"].name;
		
	 }
</script>
</head>

<body>
<center>
<h1>FARE ENQUIRY</h1>


<h2>You Queried For :<label id="tna"></label>

<br>
<br>


<table border='1'>

<tr><td>Train Number:</td><td>Train Name:</td><td>Boarding Date<br>(dd-mm-yyyy):</td><td>Departure from:</td><td>Arrival To:</td><td>Quota:</td></tr>
<tr><td><label id="tno"></label></td><td><label id="tna1"></label></td><td>20-05-2017</td><td><label id="from"></label><br><label id="fromn"></label></td><td><label id="to"></label><br><label id="ton"></label></td><td><label id="qt"></label><br><label id="qtc"></label></td></tr>
</table>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<table border='1'>
<tr><td>Class:</td><td>Name:</td><td>Fare:</td></tr>
<tr><td><label id="ac"></label></td><td><label id="an"></label></td><td><label id="af"></label></td></tr>
<tr><td><label id="bc"></label></td><td><label id="bn"></label></td><td><label id="bf"></label></td></tr>
<tr><td><label id="cc"></label></td><td><label id="cn"></label></td><td><label id="cf"></label></td></tr>
<tr><td><label id="dc"></label></td><td><label id="dn"></label></td><td><label id="df"></label></td></tr>

</table>	



</div>

</body>
</center>
</html>