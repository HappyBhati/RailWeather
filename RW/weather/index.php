
<html>
<head>
	<title>weather home</title>
	<link href="css/style.css" rel="stylesheet"/>
	
	<!-- JQuery and jqPlot dependencies-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.jqplot.js"></script>
	<script type="text/javascript" src="js/jqplot.canvasTextRenderer.js"></script>
	<script type="text/javascript" src="js/jqplot.canvasAxisLabelRenderer.js"></script>
	<script type="text/javascript" src="js/jqplot.dateAxisRenderer.js"></script>
	<link rel="stylesheet" type="text/css" href="css/jquery.jqplot.css" />
</head>

<body>
<script>
	var chartData = [];
	var today = new Date();
	var chartStartTime = new Date(today.getFullYear(), today.getMonth(), today.getDate(), 14,     30, 00, 00);	
	// The chart is plotted from this time onwards
	var formattedStartTime = chartStartTime.getFullYear() + "-" + (chartStartTime.getMonth() + 1) + "-" + chartStartTime.getDate() + " " + chartStartTime.getHours() + ":" + chartStartTime. getMinutes();

     // get current data
	 var url="http://api.openweathermap.org/data/2.5/weather?q=<?php echo $_GET['cid']?>&units=metric&APPID=29c47807b2c9f6ddebf5d6e32a1a9d9d";
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



	// Get today's result for every three hours
	var url="http://api.openweathermap.org/data/2.5/forecast/city?q=<?php echo $_GET['cid']?>&cnt=9&units=metric&APPID=29c47807b2c9f6ddebf5d6e32a1a9d9d";
	
	var sixteenDayHttpRequest = new XMLHttpRequest();
	sixteenDayHttpRequest.onreadystatechange = function() 
	{
		if (sixteenDayHttpRequest.readyState == 4 && sixteenDayHttpRequest.status == 200) 
		{
	
			var jsonResponse = JSON.parse(sixteenDayHttpRequest.responseText);
			console.log(jsonResponse);
			displayTodayResults(jsonResponse);
		}
	};
	
	sixteenDayHttpRequest.open("GET", url, true);
	sixteenDayHttpRequest.send();

	// Get next seven day's results
	url = "http://api.openweathermap.org/data/2.5/forecast/daily?q=<?php echo $_GET['cid']?>&units=metric&APPID=21f36edffed33d35b43faf0cf9bcc979";
	
	var dailyHttpRequest = new XMLHttpRequest();
	dailyHttpRequest.onreadystatechange = function() 
	{
		if (dailyHttpRequest.readyState == 4 && dailyHttpRequest.status == 200) 
		{
			var jsonResponse = JSON.parse(dailyHttpRequest.responseText);
			console.log(jsonResponse);
			displaySevenDayResults(jsonResponse);
		}
	};
	
	dailyHttpRequest.open("GET", url, true);
	dailyHttpRequest.send();
	
	function displayCurrentResults(jsonResponse) 
	{
		document.getElementById("city").innerHTML = jsonResponse.name;
		document.getElementById("temprature").innerHTML = jsonResponse.main.temp;
		document.getElementById("img").src = "http://openweathermap.org/img/w/" + jsonResponse.weather[0].icon + ".png";
		document.getElementById("weather").innerHTML = jsonResponse.weather[0].description;
		
		
		document.getElementById("humidity").innerHTML = jsonResponse.main.humidity;
		document.getElementById("pressure").innerHTML = jsonResponse.main.pressure;
		document.getElementById("clouds").innerHTML = jsonResponse.clouds.all;

		document.getElementById("wind").innerHTML = jsonResponse.wind.speed;
		document.getElementById("country").innerHTML = jsonResponse.sys.country;
       
		}
	
	
	
	
	function displayTodayResults(jsonResponse) 
	{
		document.getElementById("temp9am").innerHTML = jsonResponse.list[0].main.temp;
		document.getElementById("temp12pm").innerHTML = jsonResponse.list[1].main.temp;
		document.getElementById("temp3pm").innerHTML = jsonResponse.list[2].main.temp;
		document.getElementById("temp6pm").innerHTML = jsonResponse.list[3].main.temp;
		document.getElementById("temp9pm").innerHTML = jsonResponse.list[4].main.temp;
		document.getElementById("temp12am").innerHTML = jsonResponse.list[5].main.temp;
		document.getElementById("temp3am").innerHTML = jsonResponse.list[6].main.temp;
		document.getElementById("temp6am").innerHTML = jsonResponse.list[7].main.temp;
		document.getElementById("temp9am_2").innerHTML = jsonResponse.list[8].main.temp;
		
		document.getElementById("img9am").src = "http://openweathermap.org/img/w/" + jsonResponse.list[0].weather[0].icon + ".png";
		document.getElementById("img12pm").src = "http://openweathermap.org/img/w/" + jsonResponse.list[1].weather[0].icon + ".png";
		document.getElementById("img3pm").src = "http://openweathermap.org/img/w/" + jsonResponse.list[2].weather[0].icon + ".png";
		document.getElementById("img6pm").src = "http://openweathermap.org/img/w/" + jsonResponse.list[3].weather[0].icon + ".png";
		document.getElementById("img9pm").src = "http://openweathermap.org/img/w/" + jsonResponse.list[4].weather[0].icon + ".png";
		document.getElementById("img12am").src = "http://openweathermap.org/img/w/" + jsonResponse.list[5].weather[0].icon + ".png";
		document.getElementById("img3am").src = "http://openweathermap.org/img/w/" + jsonResponse.list[6].weather[0].icon + ".png";
		document.getElementById("img6am").src = "http://openweathermap.org/img/w/" + jsonResponse.list[7].weather[0].icon + ".png";
		document.getElementById("img9am_2").src = "http://openweathermap.org/img/w/" + jsonResponse.list[8].weather[0].icon + ".png";
		
		for(i = 0; i < jsonResponse.list.length; ++i)
		{
			var nextTimeTick = new Date(chartStartTime.getTime() + (3 * 60 * 60000 * i));
			var formattedTime = nextTimeTick.getFullYear() + "-" + (nextTimeTick.getMonth() + 1) + "-" + nextTimeTick.getDate() + " " + nextTimeTick.getHours() + ":" + nextTimeTick.getMinutes();
			chartData.push([formattedTime, jsonResponse.list[i].main.temp]);
		}
		console.log("DATA: " + chartData);
		
		var plot1 = $.jqplot ('tempChart', [chartData], 
		{
			title: '',
			axesDefaults: 
			{
				labelRenderer: $.jqplot.CanvasAxisLabelRenderer,
				labelOptions:
				 {
						textColor: 'white'
				 },
				tickOptions: 
				{
					textColor: "white"
				}
			},
			seriesDefaults: 
			{
				rendererOptions:
				 {
					smooth: true
				}
			},
			axes: 
			{
				xaxis: 
				{
					label: "Time of day",
					renderer: $.jqplot.DateAxisRenderer,
					tickOptions: 
					{
						formatString: "%H:%M"
					},
					min: formattedStartTime,
					tickInterval: "3 hour",
					pad: 0
				},
				yaxis:
				 {
					label: "Temperature (\u2103)"
				 }
			},
			
			grid: {
				background: "transparent"
			}
			
			
		});
	}
	
	function displaySevenDayResults(jsonResponse) 
	{
		for(i = 0; i < 7; ++i){
			document.getElementById("day" + i).innerHTML = displayNextDate(i);
			document.getElementById("maxTempDay" + i).innerHTML = jsonResponse.list[i].temp.max;
			
			document.getElementById("minTempDay" + i).innerHTML = jsonResponse.list[i].temp.min;
		}
			//7 day image icon
		document.getElementById("img2").src = "http://openweathermap.org/img/w/" + jsonResponse.list[1].weather[0].icon + ".png";
		document.getElementById("img3").src = "http://openweathermap.org/img/w/" + jsonResponse.list[2].weather[0].icon + ".png";
		document.getElementById("img4").src = "http://openweathermap.org/img/w/" + jsonResponse.list[3].weather[0].icon + ".png";
		document.getElementById("img5").src = "http://openweathermap.org/img/w/" + jsonResponse.list[4].weather[0].icon + ".png";
		document.getElementById("img6").src = "http://openweathermap.org/img/w/" + jsonResponse.list[5].weather[0].icon + ".png";
		document.getElementById("img7").src = "http://openweathermap.org/img/w/" + jsonResponse.list[6].weather[0].icon + ".png";

		
		document.getElementById("weatherDescription0").innerHTML = jsonResponse.list[0].weather[0].description;
		document.getElementById("weatherDescription1").innerHTML = jsonResponse.list[1].weather[0].description;
		document.getElementById("weatherDescription2").innerHTML = jsonResponse.list[2].weather[0].description;
		document.getElementById("weatherDescription3").innerHTML = jsonResponse.list[3].weather[0].description;
		document.getElementById("weatherDescription4").innerHTML = jsonResponse.list[4].weather[0].description;
		document.getElementById("weatherDescription5").innerHTML = jsonResponse.list[5].weather[0].description;
		document.getElementById("weatherDescription6").innerHTML = jsonResponse.list[6].weather[0].description;

		
		
		
		document.getElementById("humidity2").innerHTML = jsonResponse.list[0].humidity;
		document.getElementById("pressure2").innerHTML = jsonResponse.list[0].pressure;
		document.getElementById("clouds2").innerHTML = jsonResponse.list[0].clouds;
		document.getElementById("temp_2_2").innerHTML = jsonResponse.list[0].temp.day;
		document.getElementById("morning").innerHTML = jsonResponse.list[0].temp.morn;
		document.getElementById("night").innerHTML = jsonResponse.list[0].temp.night;
		document.getElementById("wind2").innerHTML = jsonResponse.list[0].speed;
		
       		
		//if(typeof jsonResponse.list[0].rain != 'undefined')
		//{
			//document.getElementById("rainAmount").innerHTML = jsonResponse.list[0].rain;
		//}
		
	}
	
	// Display formatted date
	function displayNextDate(count){
		var nextDate = (today.getDate() + count) + "-" + (today.getMonth() + 1) + "-" + today.getFullYear();
		return nextDate;
	}
	
</script>
<body>
	<div id="contentDiv">
    <div class="htitle"> Foreacst</div>
		<div class="header">
			<div class="curtamp"><f1><label id="city"></label>,<label id="country"></label></f1><br>
            <iframe id="img" width="50" height="50" frameborder="0" style="border:0" allowfullscreen></iframe>
            <f1><label id="temprature"> </label>&deg;</f1>C<br><f><label id="weather"> </label>            </f>	
			</div>
            
		</div>
        <br>
        <div class="curdet"> Humidity:<label id="humidity"></label>%&nbsp;&nbsp;
Clouds:<label id="clouds"> </label>%<br>Pressure:<label id="pressure"> </label>hpa&nbsp;&nbsp;Wind:<label id="wind"></label>m/s</div>
		&nbsp;&nbsp;<f>Today</f>&nbsp;	(<label id="day0"></label>)
        <br><br>
		
			
		<div class="main2">
			<div class="m1"> 2:30pm
				<iframe id="img9am" width="80" height="80" frameborder="0" style="border:0" allowfullscreen></iframe>
				<label id="temp9am"></label> &deg;
			</div>
			<div class="m2"></div> 
			
			<div class="m3">5:30pm
				<iframe id="img12pm" width="80" height="80" frameborder="0" style="border:0" allowfullscreen></iframe>
				<label id="temp12pm"></label> &deg;
			</div>
			<div class="m4"></div> 
			
			<div class="m5"> 10:30pm
				<iframe id="img3pm" width="80" height="80" frameborder="0" style="border:0" allowfullscreen></iframe>
				<label id="temp3pm"></label> &deg;
			</div>
			<div class="m6"></div> 
			
			<div class="m7"> 1:30am
				<iframe id="img6pm" width="80" height="80" frameborder="0" style="border:0" allowfullscreen></iframe>
				<label id="temp6pm"></label> &deg;
			</div>
			<div class="m8"></div> 
			
			<div class="m9"> 4:30am
				<iframe id="img9pm" width="80" height="80" frameborder="0" style="border:0" allowfullscreen></iframe>
				<label id="temp9pm"></label> &deg;
			</div>
			<div class="m10"></div> 
			
			<div class="m11"> 7:30am
				<iframe id="img12am" width="80" height="80" frameborder="0" style="border:0" allowfullscreen></iframe>
				<label id="temp12am"></label> &deg;
			</div>
            <div class="m12"></div>
            
            <div class="m13"> 10:30am
				<iframe id="img3am" width="80" height="80" frameborder="0" style="border:0" allowfullscreen></iframe>
				<label id="temp3am"></label> &deg;
			</div>
            <div class="m14"></div>
            
            <div class="m15"> 1:30pm
				<iframe id="img6am" width="80" height="80" frameborder="0" style="border:0" allowfullscreen></iframe>
				<label id="temp6am"></label> &deg;
			</div>
            <div class="m16"></div>
            
            <div class="m17"> 4:30pm
				<iframe id="img9am_2" width="80" height="80" frameborder="0" style="border:0" allowfullscreen></iframe>
				<label id="temp9am_2"></label> &deg;<br>
			</div>
		</div>
		<div class="map">
		<div id="tempChart""></div>
        </div>
        <br>
        &nbsp;&nbsp;<f>Daily</f>
        <br><br>
        <div class="midle"> 
        <div class="mid1"> <label id="day1"></label><br><iframe id="img2" width="50" height="50" frameborder="0" style="border:0" allowfullscreen></iframe><br><label id="maxTempDay1"></label> &deg;&nbsp;&nbsp;<sm><label id="minTempDay1"></label>&deg;<br><label id="weatherDescription1"></label></sm></div>
        <div class="mid2"> </div>
        <div class="mid3"> <label id="day2"></label><br><iframe id="img3" width="50" height="50" frameborder="0" style="border:0" allowfullscreen></iframe><br><label id="maxTempDay2"></label> &deg;&nbsp;&nbsp;<sm><label id="minTempDay2"></label>&deg;<br><label id="weatherDescription2"></label></sm></div>
        <div class="mid4"> </div>
        <div class="mid5"> <label id="day3"></label><br><iframe id="img4" width="50" height="50" frameborder="0" style="border:0" allowfullscreen></iframe><br><label id="maxTempDay3"></label> &deg;&nbsp;&nbsp;<sm><label id="minTempDay3"></label>&deg;<br><label id="weatherDescription3"></label></sm></div>
        
        <div class="mid6"> </div>
        <div class="mid7"> <label id="day4"></label><br><iframe id="img5" width="50" height="50" frameborder="0" style="border:0" allowfullscreen></iframe><br><label id="maxTempDay4"></label> &deg;&nbsp;&nbsp;<sm><label id="minTempDay4"></label>&deg;<br><label id="weatherDescription4"></label></sm></div>
        <div class="mid8"> </div>
      <div class="mid9"> <label id="day5"></label><br><iframe id="img6" width="50" height="50" frameborder="0" style="border:0" allowfullscreen></iframe><br><label id="maxTempDay5"></label> &deg;&nbsp;&nbsp;<sm><label id="minTempDay5"></label>&deg;<br><label id="weatherDescription5"></label></sm></div>
        <div class="mid10"></div>
        <div class="mid11"> <label id="day6"></label><br><iframe id="img7" width="50" height="50" frameborder="0" style="border:0" allowfullscreen></iframe><br><label id="maxTempDay6"></label> &deg;&nbsp;&nbsp;<sm><label id="minTempDay6"></label>&deg;<br><label id="weatherDescription6"></label></sm></div>
        
        </div>
               
		<div class="main10">Day Details</div>
	<div class="couter">
    <div class="c1">
    <div class="bottom">
    <div class="circle1"> <label id="humidity2"></label>%<br><ht>Humidity</ht></div>
    <div class="circle2"> <label id="clouds2"> </label>%<br><ht>Clouds</ht></div>
    </div>
    
    <div class="bottom1">
    <div class="circle3"> <label id="pressure2"> </label>hpa<br><ht>Pressure</ht></div>
    <div class="circle4"> <label id="wind2"></label>m/s	<br><ht>Wind</ht></div>
    </div>
    </div>
    <div class="c2"><f>Today: <label id="weatherDescription0"></label> With Heat Index Of&nbsp; <label id="temp_2_2"></label>&deg;C<br>Maximum will be <label id="maxTempDay0"></label>&degC& Minimum will be <label id="minTempDay0"> </label>&degC</f>
    </div>
    <div class="c3"><br><br>Sunset:7:29pm &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sunrise:6:29am<br><br><br><br><br><br><br>&nbsp; Night:<label id="night"></label> &degC &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; morning:<label id="morning"></label>&degC
    
    </div>
   
   </div>
  </div>
	<script>
	// Function that executes itself when the above html is loaded.
	// Changes background
	(function(){
		if(today.getHours() >= 6 && today.getHours() < 18){
			document.getElementById("contentDiv").className = "outer-day";
		}
		else{
			document.getElementById("contentDiv").className = "outer-night";
		}
	})();
	</script>
</body>
</html>
