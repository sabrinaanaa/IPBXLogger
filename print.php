<html>
<head>
</head>
<body>
<image src="./img/logo.png"></image>

<?php
$date = $_GET['date'];
$time = $_GET['time'];

$nbrs = $_GET['nbrs'];
$nbr = $_GET['nbr'];
$dur = $_GET['dur'];
		$seconds = substr($dur,6,8);
        $minutes = substr($dur,3,-3);
        $hours = substr($dur,0,2);


$prix = $_GET['prix'];
$prix1 = number_format($prix, 3, '.','');
list($whole, $decimal) = explode('.', $prix1);

/*$whole = floor($prix);
$fraction = $prix - $whole;
list($whole, $decimal) = explode('.', $prix1);
printf("%.2f",$prix)
*/
		
echo "<br>";
echo "<br>";
echo "<br>";
echo "<b>Date:</b>&nbsp&nbsp&nbsp";echo $date;
echo "<br>";
echo "<br>";
echo "<b>Time:</b>&nbsp&nbsp&nbsp";echo $time;
echo "<br>";
echo "<br>";
echo "<b>Numero/Chambre Source:</b>&nbsp&nbsp&nbsp";echo $nbrs;
echo "<br>";
echo "<br>";
echo "<b>Numero:</b>&nbsp&nbsp&nbsp";echo $nbr;
echo "<br>";
echo "<br>";
echo "<b>Duration:</b>&nbsp&nbsp&nbsp";echo $hours."&nbspheures&nbsp&nbsp";echo $minutes."&nbspminutes&nbsp&nbspet&nbsp";echo $seconds."&nbspsecondes";
echo "<br>";
echo "<br>";
echo "<b>Prix:</b>&nbsp&nbsp&nbsp";echo $whole."&nbspDT ttc et&nbsp"; echo $decimal."&nbspMillimes";
echo "<br>";
echo "<br>";
echo "<br>";

?>
<button onclick="window.print()">Imprimer</button>



</body>
</html>
