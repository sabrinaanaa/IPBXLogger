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
    $lines = file("./IPBXLog.log");
$today = date('d/m/y',time());
$yesterday = date('d/m/y',strtotime("-1 days"));
$j=0;
$linenr=1;

	
    
    ?>

<form method="get" action="Interne1.php">
			   
<input type="date" id="dateSel" name="dateSel" value="<?php echo $yesterday; ?>" placeholder="dd-mm-yy" />

<button type="submit">Afficher</button>
</form>


<table class="tutorial-table" width="100%" border="1" cellspacing="0">
 <tr>
           <td bgcolor="#696969" class="" ><strong>Nr</strong></div></td>
		   <td bgcolor="#696969" class="" ><strong>Date</strong></div></td>
            <td bgcolor="#696969" class=""><strong>Time</strong></td>
            
			<td bgcolor="#696969" class=""><strong>From</strong></td>
            			
			
            <td bgcolor="#696969" class=""><strong>To</strong></td>
		
        
        </tr>
<?php

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
			if (trim($duration) ===''){
				$bgcolor = $j % 2 === 0 ? "#DCDCDC" : "#A9A9A9";
		echo "<tr bgcolor=".$bgcolor." id='".$j."'><td style='width:2%'>".$linenr."</td><td style='width:6%' class=''><strong></strong>".$date."</td><td style='width:4%'class=''><strong></strong>".$time."</td><td class=''><strong></strong>".$from.
		"</td><td class=''><strong></strong>".$to."</td></tr>";	
	 
	   
	   
	  
	  
	    $j++; 
		$linenr++;
	   }
	   
	   
	   
		}
		}}
	
	
    
    ?>
	
    </table>
	<input type="hidden" id="last" value="<?php echo $linenr;?>"></input>
	<?php $linenr=$linenr-1; echo "On a ".$linenr." Appels Internes Aujourd hui";?>
	
<?php include ("footer.php"); ?>