
<html>
<head>
<title>Indian Railway</title>
<link href="css/Style.css" rel="stylesheet">
<script>

//PNR STATUS
var url="http://api.railwayapi.com/pnr_status/pnr/<?php echo $_GET['cid']?>/apikey/0z55gv1m/";
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
		
		document.getElementById("tna").innerHTML = jsonResponse.train_name;
		document.getElementById("tno").innerHTML = jsonResponse.train_num;
		document.getElementById("scode").innerHTML = jsonResponse.from_station.code;
		document.getElementById("sname").innerHTML = jsonResponse.from_station.name;
		document.getElementById("dcode").innerHTML = jsonResponse.reservation_upto.code;
		document.getElementById("dname").innerHTML = jsonResponse.reservation_upto.name;
		document.getElementById("bp").innerHTML = jsonResponse.boarding_point.code;
	    document.getElementById("date").innerHTML = jsonResponse.doj;
		document.getElementById("cl").innerHTML = jsonResponse.class;
		document.getElementById("chart").innerHTML = jsonResponse.chart_prepared;
		
		document.getElementById("pno").innerHTML = jsonResponse.passengers["0"].no;
				document.getElementById("pnoa").innerHTML = jsonResponse.passengers["1"].no;
				document.getElementById("stcode").innerHTML = jsonResponse.to_station.code;
				document.getElementById("stname").innerHTML = jsonResponse.to_station.name;
		
		
	    document.getElementById("bstatus").innerHTML = jsonResponse.passengers["0"].booking_status;
	    document.getElementById("coach").innerHTML = jsonResponse.passengers["0"].coach_position;
		document.getElementById("curstatus").innerHTML = jsonResponse.passengers["0"].current_status;
		document.getElementById("bstatusa").innerHTML = jsonResponse.passengers["1"].booking_status;
	    document.getElementById("coacha").innerHTML = jsonResponse.passengers["1"].coach_position;
		document.getElementById("curstatusa").innerHTML = jsonResponse.passengers["1"].current_status;
document.getElementById("bstatusb").innerHTML = jsonResponse.passengers["2"].booking_status;
	    document.getElementById("coachb").innerHTML = jsonResponse.passengers["2"].coach_position;
		document.getElementById("curstatusb").innerHTML = jsonResponse.passengers["2"].current_status;
document.getElementById("bstatusc").innerHTML = jsonResponse.passengers["3"].booking_status;
	    document.getElementById("coachc").innerHTML = jsonResponse.passengers["3"].coach_position;
		document.getElementById("curstatusc").innerHTML = jsonResponse.passengers["3"].current_status;
document.getElementById("bstatusd").innerHTML = jsonResponse.passengers["4"].booking_status;
	    document.getElementById("coachd").innerHTML = jsonResponse.passengers["4"].coach_position;
		document.getElementById("curstatusd").innerHTML = jsonResponse.passengers["4"].current_status;
document.getElementById("bstatuse").innerHTML = jsonResponse.passengers["5"].booking_status;
	    document.getElementById("coache").innerHTML = jsonResponse.passengers["5"].coach_position;
		document.getElementById("curstatuse").innerHTML = jsonResponse.passengers["5"].current_status;

				document.getElementById("pnob").innerHTML = jsonResponse.passengers["2"].no;
				document.getElementById("pnoc").innerHTML = jsonResponse.passengers["3"].no;
				document.getElementById("pnod").innerHTML = jsonResponse.passengers["4"].no;
				document.getElementById("pnoe").innerHTML = jsonResponse.passengers["5"].no;
				document.getElementById("pnof").innerHTML = jsonResponse.passengers["6"].no;
				
	 }
</script>
</head>

<body>
<center>
<h1>Passenger Current Status Enquiry </h1>


<h2>You Queried For : PNR Number:<?php echo $_GET['cid']?></h2>


<br>

<table border='1'>

<tr><td>Train Number:</td><td>Train Name:</td><td>Boarding Date<br>(dd-mm-yyyy):</td><td>From:</td><td>To:</td><td>Reserved Upto:</td><td>Boarding Point</td><td>Class</td></tr>
<tr><td><label id="tno"></label></td><td><label id="tna"></label></td><td><label id="date"></label></td><td><label id="scode"></label>
<br><label id="sname"></label>
</td><td><label id="stcode"></label><br><label id="stname"></label></td><td><label id="dcode"></label><br><label id="dname"></label></td><td><label id="bp"></label></td><td><label id="cl"></label></td></tr>
</table>
<br>
<br>
<br>
<br>
<table border="1">
<tr><td>Charting Status:-</td><td><h1><label id="chart"></label><h1></td></tr>
	</table>

<br>
<br>
<table border="1"> 
<tr><td>S.No</td><td>Booking Status<br>(Coach No,Berth No,Quota)</td><td>*Current Status<br>(coach No,Berth No)</td></tr>
<tr><td><label id="pno"></label></td><td><label id="bstatus"></label>,
<label id="coach"></label>

</td><td><label id="curstatus"></label></td></tr>
<tr><td><label id="pnoa"></label></td><td><label id="bstatusa"></label>,
<label id="coacha"></label>
</td><td><label id="curstatusa"></label></td></tr>
<tr><td><label id="pnob"></label></td><td><label id="bstatusb"></label>,
<label id="coachb"></label>
</td><td><label id="curstatusb"></label></td></tr>
<tr><td><label id="pnoc"></label></td><td><label id="bstatusc"></label>,
<label id="coachc"></label>
</td><td><label id="curstatusc"></label></td></tr>
<tr><td><label id="pnod"></label></td><td><label id="bstatusd"></label>,
<label id="coachd"></label>
</td><td><label id="curstatusd"></label></td></tr>
<tr><td><label id="pnoe"></label></td><td><label id="bstatuse"></label>,
<label id="coache"></label>
</td><td><label id="curstatuse"></label></td></tr>
<tr><td><label id="pnof"></label></td><td><label id="bstatusf"></label>,
<label id="coachf"></label>
</td><td><label id="curstatusf"></label></td></tr>
</table>

</table>
</div>
</body>
</center>
</html>