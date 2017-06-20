<html>
<head>
<title>Pie Chart</title>

<?php
$user = "root"; $pswrd = ""; $db = "ote";
$con = mysql_connect("localhost",$user,$pswrd,$db);
if(!$con)
{
	die("connection failed:". mysql_error());
}
if(!mysql_select_db("ote")){
	die("Can't select database." . mysql_error());
}
$candis="SELECT * FROM `candidates`";
$candque=mysql_query($candis);
$i = 1;
while($row = mysql_fetch_array($candque))
{
	$candname[$i] = $row[1]; 
	$candscore[$i] = $row[2];
	$i++;
}

?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load("current", {packages:["corechart"]});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
	  var cs1 = parseInt("<?php echo $candscore[1]; ?>");
	  var cs2 = parseInt("<?php echo $candscore[2]; ?>");
	  var cs3 = parseInt("<?php echo $candscore[3]; ?>");
	  var cs4 = parseInt("<?php echo $candscore[4]; ?>");
        var data = google.visualization.arrayToDataTable([
          ['Candidate Name', 'Total Score'],
		  ['Akshaya' , cs1 ],
		  ['Navanith' , cs2 ],
		  ['Sanjay' , cs3 ],
		  ['Swedha' , cs4 ]
        ]);
        var options = {
          title: 'Candidates Winning Pie Chart',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
</script>
</head>
<body><center>
<div id="piechart_3d" style="width: 900px; height: 500px;"></div>
</center></body>
</html>