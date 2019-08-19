<?php

require_once('vendor/jpgraph/jpgraph.php');

if(isset($_GET['n'])){
	$n = $_GET['n'];
} else {
	$n = 2;
}
if(isset($_GET['int'])){
	$deg = $_GET['int'];
} else {
	$deg = 10;
}

function calculateRho($theta){
	global $n;
	$lamda = 0.0005;
	$d = $lamda/4;
	$alpha = 0;
	$beta = 2*3.14/$lamda;
	$shi = (0.5*$beta*$d*cos($theta) + $alpha);
	if($n == 2){
		$rho = abs(cos($shi));
	} else {
		$rho = abs(cos($shi))*cos(2*$shi);
	}
	return $rho;
}

function unitRho($theta){
	global $n;
	$lamda = 0.0005;
	$d = $lamda/4;
	$alpha = 0;
	$beta = 2*3.14/$lamda;
	$shi = (0.5*$beta*$d*cos($theta) + $alpha);
	$rho = abs(cos($theta));
	return $rho;
}


?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Polar Plot for Array Antenna - Dipan Roy</title>
<style>
	table, th, td {
	  border: 1px solid black;
	}
	th, td {
	  padding: 3px;
	  text-align: center;
	}
</style>
<!-- Boot Strap -->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	
	
</head>

<body>
	<br />
	<center><h1>Polar Plot Data for Array Antenna (N = <?php echo $n ; ?>) </h1></center>
	<hr><br>
	<center>
	<form name="dataForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
		<p>Enter Interval Width : 
			<input type="number" name="int" placeholder="Interval (Default : 10)"></p>	
		<p>Enter Number of Elements (2 or 4): 
			<input type="number" name="n" placeholder="No. of Elements"></p>
		<input type="submit" name="getData" value="Get Data"><br>
	</form>
	</center>
	<hr><br>
	<center>
	<table>
		<tr>
			<th>Serial No.</th>
			<th>Angles (in Degrees)</th>
			<th>Unit Radiation</th>
			<th>Group Radiation</th>
			<th>Resultant Radiation</th>
		</tr>
		<?php
			for($d=0; $d<=360; $d += $deg) {
				echo "<tr>";
				echo "<td>".$d/$deg."</td>";
				echo "<td>".$d."</td>";
				$r1 = number_format((float)unitRho($d), 2, '.', '');
				echo "<td>".$r1."</td>";
				$res = number_format((float)calculateRho($d), 2, '.', '');
				echo "<td>".$res."</td>";
				
				echo "<td>".$r1*$res."</td>";
			}
		?>
		<tr>
			<td>Serial No.</td>
			<td>Angles (in Degrees)</td>
			<td>Unit Radiation</td>
			<td>Group Radiation</td>
			<td>Resultant Radiation</td>
		</tr>
	</table>
	</center>
	
	<br><hr>
	<center><h4>Designed by <strong>Dipan Roy</strong> | 2019 </h4></center>
	<center>Kalyani Government Engineering College</center><br>
</body>
</html>