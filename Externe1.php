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
$con1 = mysqli_connect($host,$user,$pass,$db);
$query2 = sprintf("SELECT * from `log2019` where Date= '$today' AND trim(Duration)<>'' AND trim(NrTo)<>'<I>'");
$query3 = sprintf("SELECT * from `log2020` where Date= '$today' AND trim(Duration)<>'' AND trim(NrTo)<>'<I>'");
$query4 = sprintf("SELECT * from `log2021` where Date= '$today' AND trim(Duration)<>'' AND trim(NrTo)<>'<I>'");
		
		if ($year == 19){
		$result3 = mysqli_query($con1,$query2);
		}
		if ($year == 20){
		$result3 = mysqli_query($con1,$query3);
	    }
		if ($year == 21){
		$result3 = mysqli_query($con1,$query4);
	    }



$host='localhost';
$user='root';
$pass='';
$db='PhoneBook';
$con = mysqli_connect($host,$user,$pass,$db);
$query = sprintf("SELECT * from Contacts");
$query1 = sprintf("SELECT * from Contacts where ID = '1'");
$result = mysqli_query($con,$query);
$result1 = mysqli_query($con,$query1);

	
$j=0;
	
   
	
	
	
    ?>
	
	<form method="get" action="Externe.php">
	<button type="submit">Retour Aujoud hui</button>
	</form>
	
	<form method="get" action="Externe1.php">
			   
<input type="date" id="dateSel" name="dateSel" placeholder="dd-mm-yy">
<button type="submit">Afficher</button>
</form>
	
<table class="tutorial-table" width="100%" border="1" cellspacing="0">
 <tr>
           <td bgcolor="#696969" class=""><strong>Date</strong></td>
            <td bgcolor="#696969" class=""><strong>Time</strong></td>
            
			<td bgcolor="#696969" class=""><strong>From</strong></td>
           
            <td bgcolor="#696969" class=""><strong>To</strong></td>
			
			
            <td bgcolor="#696969" class=""><strong>Ring Duration</strong></td>
			<td bgcolor="#696969" class=""><strong>Price</strong></td>
			<td bgcolor="#696969" class=""><strong>Contact Name</strong></td>
			<td bgcolor="#696969" class=""><strong>Print</strong></td>
			
        
        </tr>
<?php
$class ="";
 $somme = 0;
    while ( $row1 = mysqli_fetch_assoc($result3))
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
			   date=<?php echo $row1['Date']?>&time=<?php echo $row1['Time']?>&nbrs=<?php echo $row1['NrFrom']?>&nbr=<?php echo $row1['NrTo']?>&dur=<?php echo $row1['Duration']?>&prix=<?php echo $res?>"><button>Imprimer</button></form></td>
			 
	   
	   
	   
	   
	  </tr>
	  <?php
	    $j++; 
		}
		

	 mysqli_close($con1); 
	 mysqli_close($con);
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
	
    </table>
	<?php include ("footer.php"); ?>