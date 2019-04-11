<html>
<head>
<title>Statio code To Name</title>
<script>
//seat

var url="http://api.railwayapi.com/name_to_code/station/delhi/apikey/rf6tdams/";
	 	 var ctonHttpRequest = new XMLHttpRequest();
	 ctonHttpRequest.onreadystatechange = function() {
		 if(ctonHttpRequest.readyState ==4 && ctonHttpRequest.status == 200) {
			 
			 var jsonResponse = JSON.parse(ctonHttpRequest.responseText);
	         console.log(jsonResponse);		 
             displayCtonResults(jsonResponse);
		 }
	 };
	ctonHttpRequest.open("GET", url, true);
	ctonHttpRequest.send(); 
	
	
		 	function displayCtonResults(jsonResponse) 
	{
		document.getElementById("tname").innerHTML = jsonResponse.train_name;
	}

	</script>

</head>

<body>
<h1>NAME:- <label id="tname"> </label></h1>
</body>
</html>