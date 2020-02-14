<!DOCTYPE html>
<html>
<head >
		<title>WEATHER MONIORING</title>
		<script>
window.onload = function () {
 
var dataPoints = [];
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	backgroundColor: "rgba(225,150,150,0.0)",
	title:{
		text: "Temperature All Day"
	},
	axisX: {
		title: "time",
		includeZero: false
	},
	axisY: {
	    title: "temp",
	    includeZero: false
	},
	data: [{
		type: "line",
		toolTipContent: "{y}  °C",
		dataPoints: dataPoints
	}]
});
 
$.get("check.csv", getDataPointsFromCSV);
 
//CSV Format
//Year,Volume
function getDataPointsFromCSV(csv) {
	var csvLines = points = [];
	csvLines = csv.split(/[\r?\n|\r|\n]+/);
	for (var i = 0; i < csvLines.length; i++) {
		if (csvLines[i].length > 0) {
			points = csvLines[i].split(",");
			dataPoints.push({
				label: points[0],
				y: parseFloat(points[1])
			});
		}
	}
	chart.render();
}
 
}

</script>
</head>
<body >
    <style type="text/css">
  body{
    background-image: url(back.jpg)  ;
    background-size: cover;
    height: 100%;
    overflow: hidden;
    background-repeat: no-repeat;
    background-color: #175F86 ;
  }
  
  h1{ 
	position: absolute;
	font-size: 50px;
	color: white;
	top: 70%;
	left: 2%;
	background-color:	rgba(121,204,248,.5);
	border-radius: 20px;
    border: 2px solid #175F86;
    padding: 20px; 

	
	
}
div{
    
	
	
}

</style>
	<h1 id ="auto"></h1>

	
<script type="text/javascript" src="jquery-1.9.0.min.js"></script>
<script >

$(document).ready( function(){
$('#auto').load('load.php');
refresh();
});

function refresh()
{
	setTimeout( function() {
	  $('#auto').load('load.php');
	  refresh();
	},5000);
}
</script>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>