<!DOCTYPE html>
<html lang="en">
<head>


   <meta name="description" content="">
    <meta name="author" content="Made By Naanaa Sabri">
    <meta name="generator" content="">
  <title>Rapport PBX</title>


  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   
  
<link rel="apple-touch-icon" sizes="180x180" href="./img/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="./img/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="./img/favicon-16x16.png">
<link rel="manifest" href="./img/site.webmanifest">

<script src="jquery-3.3.1.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="main.js"></script>


<script>
 function printContent(el)
 {
	 var restorepage = $('body').html();
	 var printContent = $('#' + el).clone();
	 $('body').empty().html(printContent);
	 window.print();
	 $('body').html(restorepage);
 }
	 

 
 </script>




<script src="./MyScripts.js"></script>



<link rel="stylesheet" type="text/css" href="main.css">
<link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

@media print{
	.noprint{
visibility: hidden;
	}		
}

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
	
	
    <!-- Custom styles for this template -->
    <link href="./dashboard.css" rel="stylesheet">
 
