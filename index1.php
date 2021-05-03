<?php
$page = $_SERVER['PHP_SELF'];
$sec = "999";

$date = substr($_GET['dateSel'],0,10);
$day = substr($date,8,2);
$month = substr($date,5,2);
$year = substr($date,2,2);
$today = $day."/".$month."/".$year;


$month1 = $month."/".$year;

$host='localhost';
$user='root';
$pass='';
$db='PhoneBook';
$db1='IPBXLOG';
$con = mysqli_connect($host,$user,$pass,$db);
$con1 = mysqli_connect($host,$user,$pass,$db1);
$query = sprintf("SELECT * from Contacts");
$query1 = sprintf("SELECT * from Contacts where ID = '1'");

$query2 = sprintf("SELECT * from Somme where substr(`Date`,4,8) = '$month1'");
$result = mysqli_query($con,$query);
$result1 = mysqli_query($con,$query1);

$result2 = mysqli_query($con1,$query2);

$dataPoints = array();
$labels = array();
$total=0;
	
 /*while ($row1 = mysqli_fetch_assoc($result2))
 { array_push($dataPoints,array("y" => $row1['Somme'], "label" => $row1['Date']));
$total=$total+$row1['Somme'];*/
while ($row1 = mysqli_fetch_assoc($result2))
 { array_push($dataPoints,array($row1['Somme']));
array_push($labels,array($row1['Date']));

$total=$total+$row1['Somme'];


	 

             
   }
?>

  <?php include ("head.php"); ?>
<script>
    window.onload = function () {
     var total = <?php echo json_encode($total); ?>;
	
    var chart = new CanvasJS.Chart("chartContainer", {
    	title: {
    		text: "Prix Communications\n   Total Mois = "+total+""
    	},
    	axisY: {
    		title: "Prix en Dinars"
    	},
    	data: [{
    		type: "line",
    		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
    	}]
    });
    chart.render();
     
    }
    </script> 


 </head>
  <body>
  

<?php

$query4 = sprintf("SELECT * from `log2019` where Date= '$today'");
$query5 = sprintf("SELECT * from `log2020` where Date= '$today'");
$query6 = sprintf("SELECT * from `log2021` where Date= '$today'");

$sql4 = sprintf("SELECT * from `log2019` where Date= '$today' AND trim(Duration)<>'' AND trim(NrTo)<>'<I>'");
$sql5 = sprintf("SELECT * from `log2020` where Date= '$today' AND trim(Duration)<>'' AND trim(NrTo)<>'<I>'");
$sql6 = sprintf("SELECT * from `log2021` where Date= '$today' AND trim(Duration)<>'' AND trim(NrTo)<>'<I>'");

		if ($year == 19){
		$result3 = mysqli_query($con1,$query4);
		$result4 = mysqli_query($con1,$sql4);
		}
		if ($year == 20){
		$result3 = mysqli_query($con1,$query5);
		$result4 = mysqli_query($con1,$sql5);
	    }
		if ($year == 21){
		$result3 = mysqli_query($con1,$query6);
		$result4 = mysqli_query($con1,$sql6);
		}
   $id=0;

	

$j=0;
$linenr=1;	
   
	
	
	 
	 
	 
	 $k=0;

    
    ?>

  
 <?php include ("top.php"); ?>
  
  <!-- Side -->
  <div class="container-fluid">
  <div class="row">
   <?php include ("side.php"); ?>
   
<?php include ("center.php"); echo "<center>Prix Communications<br>   Total Mois = ".$total."</center>";?>

	 <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> 
 <!--  <div id="chartContainer" style="height: 370px; width: 100%;"></div>
   <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script> -->
	 

<h2>Interne</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Date</th>
              <th>Time</th>
              <th>From</th>
              <th>To</th>
             
            </tr>
          </thead>
          <tbody>
            
           
		 <?php

 while ( $row2 = mysqli_fetch_assoc($result3))
		{
  
			if(trim($row2['NrTo'])!=='<I>' &&  trim($row2['Duration']) =='' && $k < 39){ 
		
		
		
				$bgcolor = $j % 2 === 0 ? "#DCDCDC" : "#A9A9A9";
		echo "<tr bgcolor=".$bgcolor."><td class=''><strong></strong>";
		echo $row2['Date'];
		echo "</td><td class=''><strong></strong>".$row2['Time']."</td><td class=''><strong></strong>".$row2['NrFrom'].
		"</td><td class=''><strong></strong>".$row2['NrTo']."</td></tr>";	
	 
	   
	   
	  
	    $k++;
	    $j++; 
		}}   
   
   
		?>
		   </tbody>
        </table> 
  </div>
		<br>
		<h2>Externe</h2>
      <div class="table-responsive" id="PRT99">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Date</th>
              <th>Time</th>
              <th>From</th>
              <th>To</th>
              <th>Ring Duration</th>
              <th>Price</th>
              <th>Contact Name</th>
              <th class = "noprint">Print</th>
            </tr>
          </thead>
          <tbody>
		  <?php
	$class ="";
	$somme = 0;	
    while ( $row1 = mysqli_fetch_assoc($result4))
		{ 	
				
				$bgcolor = $j % 2 === 0 ? "#DCDCDC" : "#A9A9A9";
		echo "<tr bgcolor=".$bgcolor."><td class=''><strong></strong>".$row1['Date']."</td><td class=''><strong></strong>".$row1['Time']."</td><td class=''><strong></strong>".$row1['NrFrom'].
		"</td><td class=''><strong></strong>".$row1['NrTo']."</td><td class=''><strong></strong>".$row1['Duration']."</td>";	
	 
	   
			
		$to = $row1['NrTo'];
		$duration =$row1['Duration'];
		 include ("calc.php");
			
		
			?>
			
			<td bgcolor="red" class="<?php echo $class; ?>"><?php echo $res1; ?></td>
			
			<?php
	   $tel = substr($row1['NrTo'],0,8);
	   ?>
	   
	   <?php
	   $query3 = sprintf("SELECT * from Contacts where Numero= '$tel'");

		$result2 = mysqli_query($con,$query3);
	   $row2 = mysqli_fetch_assoc($result2);
		   
		   
		   
			   ?>
			   <td class="<?php echo $class; ?>"><?php echo $row2['Nom']; ?></td>
			   <td class="<?php echo $class; ?>"><form method="post" action="print.php?
			   date=<?php echo $row1['Date']?>&time=<?php echo $row1['Time']?>&nbrs=<?php echo $row1['NrFrom']?>&nbr=<?php echo $row1['NrTo']?>&dur=<?php echo $row1['Duration']?>&prix=<?php echo $res?>"><button class= "noprint">Imprimer</button></form></td>
			 
	   
	   
	   
	   
	  </tr>
	  <?php
	    $j++; 
		}
	
    mysqli_close($con);
	mysqli_close($con1);
    ?>  
		   
		   
		   <tr>
           <td bgcolor="#696969" class=""><strong></strong></td>
            <td bgcolor="#696969" class=""><strong></strong></td>
            
			<td bgcolor="#696969" class=""><strong></strong></td>
           
            <td bgcolor="#696969" class=""><strong></strong></td>
			
			
            <td bgcolor="#696969" class=""><strong>Total</strong></td>
			<td bgcolor="#696969" class=""><strong><?php echo $somme;?></strong></td>
			<td bgcolor="#696969" class=""><strong></strong></td>
			<td bgcolor="#696969" class=""><strong></strong></td>
			
        
        </tr>
         </tbody>
        </table>
	
	
  
      </div>
   <?php include ("footer.php"); ?>