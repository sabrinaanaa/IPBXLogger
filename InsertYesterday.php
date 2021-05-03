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
/*$query = sprintf("SELECT * from Log");
$query1 = sprintf("SELECT * from Log where ID = '1'");
$result = $result = mysqli_query($con,$query);
$result1 = mysqli_query($con,$query1);*/
   $lines = file("./IPBXLog.log");
   $yesterday = date('d/m/y',strtotime("-1 days"));
   /*$yesterday = "28/02/21";*/
   /*
   $day= substr($today,0,2);
   $rest =substr
   $yesterday= $day-1;
   $result= $yesterday."".

	*/
echo $yesterday;
	
    ?>
<table class="tutorial-table" width="100%" border="1" cellspacing="0">
 <tr>
          <td bgcolor="#696969" class=""><strong>Date</strong></td>
            <td bgcolor="#696969" class=""><strong>Time</strong></td>
            
			<td bgcolor="#696969" class=""><strong>from</strong></td>
            <td bgcolor="#696969" class=""><strong>to</strong></td>
            <td bgcolor="#696969" class=""><strong>duration</strong></td>
	
		
			
        
        </tr>
<?php

 
	
	 
	  foreach ($lines as $line_num => $line)
		{ $string = $line;
			$len = strlen($string);
		 $date =substr($string,0,8);
		 $time =substr($string,9,5);
		  $from =substr($string,17,5);
		  $to =substr($string,26,24);
		  $dur0 =substr($string,57,8);
		  $duration ='';
			if(strlen(trim($dur0))>6){
		   $dur1=substr($dur0,0,5);
		   $dur2=substr($dur0,6,8);
			$duration=$dur1.":".$dur2;}
		if ($len == 82 && strpos($date,'/',2) == True ){if($date == $yesterday){
			
		echo "<tr><td bgcolor='#696969' class=''><strong></strong>".$date."</td><td bgcolor='#696969' class=''><strong></strong>".$time."</td><td bgcolor='#696969' class=''><strong></strong>".$from.
		"</td><td bgcolor='#696969' class=''><strong></strong>".$to."</td><td bgcolor='#696969' class=''><strong></strong>".$duration."</td></tr>";	
	   $query = "INSERT INTO `log2021`  (`Date`, `Time`, `NrFrom`, `NrTo`, `Duration`) VALUES ('$date','$time','$from','$to','$duration');";
			  $result = mysqli_query($con,$query);
	  
		}
		}}
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
        
	   
	mysqli_close($con);
   
	
    ?>
    </table>
	<br>
	<button onclick="window.print()">Imprimer</button>
</body>

</html>