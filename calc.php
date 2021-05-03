<?php
	   
	$SecondPrice = 0.00333;	
	$SecondPriceFr = 0.015;
	$SecondPriceAl = 0.030;
	$SecondPriceAn = 0.045;
	$SecondPriceSw = 0.060;
	$SecondPriceIt = 0.090;
	$SecondPriceMag = 0.015;
	
	$IndFr = "0033";
	$IndAl = "0049";
	$IndAn = "0044";
	$IndSw = "0041";
	$IndIt = "0039";
	$IndMag =  "0021"; 
	
	   
	   
			
		$nbrsub= substr($to,0,4);			
			
		$seconds = substr($duration,6,8);
        $minutes = substr($duration,3,-3);
        $hours = substr($duration,0,2);
      if (strncmp($nbrsub, $IndFr,4) == 0){$res = ceil((($seconds+($minutes*60)+($hours*3600))*$SecondPriceFr));}
	  if (strncmp($nbrsub, $IndAl,4) == 0){$res = ceil((($seconds+($minutes*60)+($hours*3600))*$SecondPriceAl));}
	  if (strncmp($nbrsub, $IndAn,4) == 0){$res = ceil((($seconds+($minutes*60)+($hours*3600))*$SecondPriceAn));}
	  if (strncmp($nbrsub, $IndSw,4) == 0){$res = ceil((($seconds+($minutes*60)+($hours*3600))*$SecondPriceSw));}
	  if (strncmp($nbrsub, $IndIt,4) == 0){$res = ceil((($seconds+($minutes*60)+($hours*3600))*$SecondPriceIt));}
	  if (strncmp($nbrsub, $IndMag,4) == 0){$res = ceil((($seconds+($minutes*60)+($hours*3600))*$SecondPriceMag));}
	  if ($nbrsub !== $IndFr && $nbrsub !== $IndAl && $nbrsub !== $IndAn && $nbrsub !== $IndSw && $nbrsub !== $IndIt && $nbrsub !== $IndMag)
	  {$res = (($seconds+($minutes*60)+($hours*3600))*$SecondPrice);}
	  
		
			$res1 = number_format($res, 3, '.','');
			$somme = number_format($somme, 3, '.','');
			$somme = $somme + $res1;
			
			
			?>
			
			