<?php

$page = $_SERVER['PHP_SELF'];
$sec = "999";
?>

<?php include ("head.php"); ?>
</head>
<body>
<?php include ("top.php"); ?>
  
  <!-- Side -->
  <div class="container-fluid">
  <div class="row">
    <?php include ("side.php"); ?>
	
<?php include ("center.php"); ?>

<div class="container">  
 <h1><center><a href="./index.php">Rapport PBX</a></center></h1>
  <p><center>Made By Naanaa Sabri:</center></p> 
</div>





<?php

$date = substr($_GET['dateSel'],0,10);
$day = substr($date,8,2);
$month = substr($date,5,2);
$year = substr($date,2,2);
$today = $day."/".$month."/".$year;
$host='localhost';
$user='root';
$pass='';
$db='ipbxlog';
$con = mysqli_connect($host,$user,$pass,$db);
$query2 = sprintf("SELECT * from `log2019` where Date= '$today'");
$query3 = sprintf("SELECT * from `log2020` where Date= '$today'");
$query4 = sprintf("SELECT * from `log2021` where Date= '$today'");

		if ($year == 19){
		$result3 = mysqli_query($con,$query2);
		}
		if ($year == 20){
		$result3 = mysqli_query($con,$query3);
	    }
		if ($year == 21){
		$result3 = mysqli_query($con,$query4);
	    }


   

$j=0;
	
	
    
    ?>
	


<form method="get" action="Interne.php">
	<button type="submit">Retour Aujoud hui</button>
	</form>

<form method="get" action="Interne1.php">			   
<input type="date" id="dateSel" name="dateSel">
<button type="submit">Afficher</button>
</form>

<table class="tutorial-table" width="100%" border="1" cellspacing="0">
 <tr>
           <td bgcolor="#696969" class=""><strong>Date</strong></td>
            <td bgcolor="#696969" class=""><strong>Time</strong></td>
            
			<td bgcolor="#696969" class=""><strong>From</strong></td>
            			
			
            <td bgcolor="#696969" class=""><strong>To</strong></td>
		
        
        </tr>
<?php

    while ( $row2 = mysqli_fetch_assoc($result3))
		{
			if(trim($row2['NrTo'])!=='<I>' &&  trim($row2['Duration']) ==''){ 
		
		
		
				$bgcolor = $j % 2 === 0 ? "#DCDCDC" : "#A9A9A9";
		echo "<tr bgcolor=".$bgcolor."><td class=''><strong></strong>";
		echo $row2['Date'];
		echo "</td><td class=''><strong></strong>".$row2['Time']."</td><td class=''><strong></strong>".$row2['NrFrom'].
		"</td><td class=''><strong></strong>".$row2['NrTo']."</td></tr>";	
	 
	   
	   
	  
	  
	    $j++; 
		}}
	
	
   mysqli_close($con); 
    ?>
    </table>
	<?php include ("footer.php"); ?>