<?php

/*$page = $_SERVER['PHP_SELF'];
$sec = "666";*/
?>

<html>
<head>

</head>
<body>



<?php


$host='localhost';
$user='root';
$pass='';
$db='ipbxlog';
$con = mysqli_connect($host,$user,$pass,$db);
/*$yesterday = date('d/m/y',strtotime("-1 days"));*/
$yesterday = date('d/m/y',strtotime("-1 days"));
/*$yesterday = "28/02/21";*/
/*for ($i=1;$i<12;$i++){
	if($i<10){
	$date= "0".$i."/09/20";
	}
	
	if ($i>9){
	$date= $i."/09/20";	
	}
*/


$query = sprintf("SELECT * from `log2021` where Date= '$yesterday' AND trim(Duration)<>'' AND trim(NrTo)<>'<I>'"); 
$result = mysqli_query($con,$query);

	

  

	
    ?>

		
			
       
<?php
 $somme=0; 
 while ( $row1 = mysqli_fetch_assoc($result))
 {
		$to = $row1['NrTo'];
		$duration =$row1['Duration'];
		 include ("calc.php");
	
	
		
	 
	 
}	 
	 
	 $query2 = sprintf("Insert INTO `Somme` (`Date`, `Somme`) VALUES ('$yesterday','$somme');");
	 $result = mysqli_query($con,$query2);
        
	   echo "Date: ".$yesterday."&nbsp&nbsp&nbspSomme= ".$somme."<br>";

	mysqli_close($con);
 
	
    ?>
    
	
</body>

</html>