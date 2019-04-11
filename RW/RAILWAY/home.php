
<html>
<head>
<title>Indian Railway</title>
<link href="css/Style.css" rel="stylesheet">

<script>
	


//Get Live running status of Train.
var url="http://api.railwayapi.com/live/train/<?php echo $_GET['tno']?>/doj/<?php echo $_GET['date']?>/apikey/rf6tdams/";
	 	 var liveHttpRequest = new XMLHttpRequest();
	 liveHttpRequest.onreadystatechange = function() {
		 if(liveHttpRequest.readyState ==4 && liveHttpRequest.status == 200) {
			 
			 var jsonResponse = JSON.parse(liveHttpRequest.responseText);
	         console.log(jsonResponse);		 
             displayLiveResults(jsonResponse);
		 }
	 };
	liveHttpRequest.open("GET", url, true);
	liveHttpRequest.send(); 
//Route
var url="http://api.railwayapi.com/route/train/<?php echo $_GET['tno']?>/apikey/rf6tdams/";
	 	 var currentHttpRequest = new XMLHttpRequest();
	 currentHttpRequest.onreadystatechange = function() {
		 if(currentHttpRequest.readyState ==4 && currentHttpRequest.status == 200) {
			 
			 var jsonResponse = JSON.parse(currentHttpRequest.responseText);
	         console.log(jsonResponse);		 
             displayCurrentResults(jsonResponse);
		 }
	 };
	currentHttpRequest.open("GET", url, true);
	currentHttpRequest.send(); 
	 
	 
	 
	 
	 //live
	 function displayLiveResults(jsonResponse)
	 
	 {
		 
		 document.getElementById("status").innerHTML = jsonResponse.position;
		 var route=jsonResponse.route.length;
	 var content="";
	 var stationName;
	 var stationCode;
	 var schArr;
	 var schDep;
	 var actArr;
	 var actDep;
	 var lateTime;
content=content+"<table border='1'>";

content=content+"<tr class='live'><label id='tno'></label>-<label id='tname'></label></tr>";
content=content+"<br>";
content=content+"<tr class='live'><label id='status'> </label></tr>";
content=content+"<tr>";
content=content+"<td>Station code </td><td>Schedule Arrival Time </td><td>Estimeted Arrival Time </td><td>Schedule Departure Time </td><td>Estimeted Departure Time</td><td>Delay hh:mm co</td></tr>";

	 
	 for(var a=0;a<route;a++)
	 {
	  stationName=jsonResponse.route[a].station_.name;
	  stationCode=jsonResponse.route[a].station_.code;
	  schArr=jsonResponse.route[a].scharr;
	  schDep=jsonResponse.route[a].schdep;
	  actArr=jsonResponse.route[a].actarr;
	  actDep=jsonResponse.route[a].actdep;
	  lateTime=jsonResponse.route[a].latemin;
	  //alert("hello");
		 content=content+"<tr>";
		 
			content=content+"<td>"+stationCode+" - "+stationName+"</td>";
			content=content+"<td>"+schArr+"</td>";
			content=content+"<td>"+actArr+"</td>";
			content=content+"<td>"+schDep+"</td>";
			content=content+"<td>"+actDep+"</td>";
			content=content+"<td>"+lateTime+"</td>";	
		 content=content+"</tr>";
		 }
		// content=content+"</table>";
		 content=content+"</table>";
	 	document.getElementById("abc").innerHTML=content;
	  
		 
	 }
	 
	 
	 
	 //route
	 	function displayCurrentResults(jsonResponse) 
	{
		document.getElementById("tname").innerHTML = jsonResponse.train.name;
		document.getElementById("tno").innerHTML = jsonResponse.train.number;
	}
						
		
</script>
</head>

<body onLoad="dateis();">
<div class="outer"> WELCOME TO INDIAN RAILWAY
<br>

<div class="live"> 

<center>

<table border="1">
<h1>
<tr class="live"><label id="tno"></label>-<label id="tname"></label></tr>
<br>
<tr class="live"><label id="status"> </label></tr>
</h1>
<span id="abc"></span>


</table>







</center>
</div>
</div>
</body>
</html>
