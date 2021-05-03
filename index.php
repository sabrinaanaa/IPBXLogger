<?php
$page = $_SERVER['PHP_SELF'];
$sec = "999";

/*
if (isset ($_REQUEST['id']))
{
	$file= $_REQUEST['id'];
if ($file == "garden")
{$handle = fopen("./garden.csv","r");}

if ($file == "orangers")
{$handle = fopen("./orangers.csv","r");}
}
if (!isset ($_REQUEST['id']))
{
	
$handle = fopen("./orangers.csv","r");
}
*/

$today = date('d/m/y',time());
$year= substr($today,6,2);

$month = substr($today,3,2)."/".$year;


/* $month = "09/20"; */
$host='localhost';
$user='root';
$pass='';
$db='PhoneBook';
$db1='IPBXLOG';
$con = mysqli_connect($host,$user,$pass,$db);
$con1 = mysqli_connect($host,$user,$pass,$db1);
$query = sprintf("SELECT * from Contacts");
$query1 = sprintf("SELECT * from Contacts where ID = '1'");

$query2 = sprintf("SELECT * from Somme where substr(`Date`,4,8) = '$month'");
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

<meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page ?>'">
 </head>
  <body>
  

<?php
    $lines = file("./IPBXLog.log");
$today = date('d/m/y',time());

$id=0;




	

$j=0;
$linenr=1;	
   
	
	 
	 	
	 
	 

    
    ?>

  
 <?php include ("top.php"); ?>
  
  <!-- Side -->
  <div class="container-fluid">
  <div class="row">
   <?php include ("side.php"); ?>
  
<?php include ("center.php"); echo "<center>Prix Communications<br>   Total Mois = ".$total."</center>";?>

 	 <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
 <!-- <div id="chartContainer" style="height: 370px; width: 100%;"></div> 
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

   
		 for ($i= max(0, count($lines)-21);$i < count($lines);$i++)
		{ 
		
		$string = $lines[$i];
			$len = strlen($string);
		 $date =substr($string,0,8);
		 $time =substr($string,9,5);
		  $from =substr($string,17,5);
		  $to =substr($string,26,24);
		   $duration =substr($string,57,8);
		if ($len == 82 && strpos($date,'/',2) == True ){
			if($date === $today){
			if (trim($duration) ===''){
				$bgcolor = $j % 2 === 0 ? "#DCDCDC" : "#A9A9A9";
		echo "<tr><td><div id='date".$id."'>".$date."</div></td><td><div id='time".$id."'>".$time."</div></td><td><div id='from".$id."'>".$from.
		"</div></td><td><div id='to".$id."'>".$to."</div></td></tr>";	
	 
	   
	   
	  
	   $id++;
	    $j++; 
	   }
		}
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
		  $somme = 0;
	foreach ($lines as $line_num => $line)
		{ 
		
		$string = $line;
			$len = strlen($string);
		 $date =substr($string,0,8);
		 $time =substr($string,9,5);
		  $from =substr($string,17,5);
		  $to =substr($string,26,24);
		   $duration =substr($string,57,8);
		if ($len == 82 && strpos($date,'/',2) == True ){
			if($date === $today){
			if (trim($duration) !=='' && trim($to) !=='<I>'){
				$bgcolor = $j % 2 === 0 ? "#DCDCDC" : "#A9A9A9";
		echo "<tr bgcolor=".$bgcolor."><td style='width:4%' class=''><strong></strong>".$date."</td><td style='width:6%' class=''><strong></strong>".$time."</td><td class=''><strong></strong>".$from.
		"</td><td class=''><strong></strong>".$to."</td><td class=''><strong></strong>".$duration."</td>";	
	 
	   
			
		
		 include ("calc.php");
		
			?>
			
			<td bgcolor="red" id="res<?phpecho $j;?>" class=""><?php echo $res1; ?></td>
			
			<?php
	   $tel = substr($to,0,8);
	   ?>
	   
	   <?php
	   $query3 = sprintf("SELECT * from Contacts where Numero= '$tel'");

		$result3 = mysqli_query($con,$query3);
	   $row2 = mysqli_fetch_assoc($result3);
		   
		   
		   
			   ?>
			   <td class=""><?php echo $row2['Nom']; ?></td>
			   <td class=""><form method="post" action="print.php?
			   date=<?php echo $date?>&time=<?php echo $time?>&nbrs=<?php echo $from?>&nbr=<?php echo substr($to,0,15)?>&dur=<?php echo $duration?>&prix=<?php echo $res?>"><button class= "noprint">Imprimer</button></form></td>
			 
	   
	   
	   
	   
	  </tr>
	  <?php
	    $j++; 
		$linenr++;
	   }
	   
		}
		}}
	
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