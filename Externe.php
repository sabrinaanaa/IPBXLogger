<?php

$page = $_SERVER['PHP_SELF'];
$sec = "999";
?>

<?php include ("head.php"); ?>
<meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page ?>'">
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
$host='localhost';
$user='root';
$pass='';
$db='PhoneBook';
$con = mysqli_connect($host,$user,$pass,$db);
$query = sprintf("SELECT * from Contacts");
$query1 = sprintf("SELECT * from Contacts where ID = '1'");
$result = mysqli_query($con,$query);
$result1 = mysqli_query($con,$query1);

	$today = date('d/m/y',time());
	/*$date = '26/08/20';*/
$j=0;
$linenr=1;	
    $lines = file("./IPBXLog.log");
	
	
	function printrow($arg_date, $arg_time, $arg_Nbr, $arg_dur, $arg_price)
	{printf("helo"); ;}
	
	
    ?>
	
	<form method="get" action="Externe1.php">
			   
<input type="date" id="dateSel" name="dateSel" placeholder="dd-mm-yy">
<button type="submit">Afficher</button>
</form>
<table class="tutorial-table" width="100%" border="1" cellspacing="0">
 <tr>
           <td bgcolor="#696969" class=""><strong>Nr</strong></td>
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

    /*while (($row = fgetcsv($fp, 99, " ")) !== false) {$count++;}*/
      
	  $class ="";
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
		echo "<tr bgcolor=".$bgcolor."><td style='width:2%'>".$linenr."</td><td style='width:4%' class=''><strong></strong>".$date."</td><td style='width:6%' class=''><strong></strong>".$time."</td><td class=''><strong></strong>".$from.
		"</td><td class=''><strong></strong>".$to."</td><td class=''><strong></strong>".$duration."</td>";	
	 
	   
	    include ("calc.php"); 
	   
		
			?>
			
			<td bgcolor="red" class="<?php echo $class; ?>"><?php echo $res1; ?></td>
			
			<?php
	   $tel = substr($to,0,8);
	   ?>
	   
	   <?php
	   $query3 = sprintf("SELECT * from Contacts where Numero= '$tel'");

		$result3 = mysqli_query($con,$query3);
	   $row2 = mysqli_fetch_assoc($result3);
		   
		   
		   
			   ?>
			   <td class="<?php echo $class; ?>"><?php echo $row2['Nom']; ?></td>
			   <td class="<?php echo $class; ?>"><form method="post" action="print.php?
			   date=<?php echo $date?>&time=<?php echo $time?>&nbrs=<?php echo $from?>&nbr=<?php echo substr($to,0,15)?>&dur=<?php echo $duration?>&prix=<?php echo $res?>"><button>Imprimer</button></form></td>
			 
	   
	   
	   
	   
	  </tr>
	  <?php
	    $j++; 
		$linenr++;
	   }
	   
		}
		}}

	
    ?>
	<tr>
           <td bgcolor="#696969" class=""><strong></strong></td>
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
	<input type="hidden" id="last" value="<?php echo $linenr;?>"></input>
	<?php $linenr=$linenr-1; echo "On a ".$linenr." Appels Externes Aujourd hui";?>
	
	<?php include ("footer.php"); ?>