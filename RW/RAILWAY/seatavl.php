<html>
<head>

<title>Available seat</title>
<script>
//seat

var url="http://api.railwayapi.com/check_seat/train/12462/source/ju/dest/dli/date/05-02-2017/class/SL/quota/LD/apikey/rf6tdams/";
	 	 var seatHttpRequest = new XMLHttpRequest();
	 seatHttpRequest.onreadystatechange = function() {
		 if(seatHttpRequest.readyState ==4 && seatHttpRequest.status == 200) {
			 
			 var jsonResponse = JSON.parse(seatHttpRequest.responseText);
	         console.log(jsonResponse);		 
             displaySeatResults(jsonResponse);
		 }
	 };
	seatHttpRequest.open("GET", url, true);
	seatHttpRequest.send(); 
	
	
		 	function displaySeatResults(jsonResponse) 
	{
		document.getElementById("tname").innerHTML = jsonResponse.train_name;
		document.getElementById("tno").innerHTML = jsonResponse.train_number;
		document.getElementById("fl").innerHTML = jsonResponse.failure_rate;
	}

	</script>
    
</head>

<body>
<h1>TRAIN NAME:- <label id="tname"> </label></h1>
<br>
<h1>TRAIN NUMBER:- <label id="tno"> </label></h1>
<br>
<h1>FAILURE RATE:- <label id="fl"> </label></h1>

</body>
</html>
