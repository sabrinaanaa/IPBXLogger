<!--
<br>
	<button onclick="window.print()">Print All</button>
	<br>
-->	
	<br>
	<button onclick="printContent('PRT99');">Print</button>
	<br>
	
	


	  </main>
  </div>
</div>
<!-- Footer -->
<footer class="page-footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-8 col-sm-12">
					<h6 class="text-uppercase font-weight-bold">Additional Information</h6>
					<p>Naanaa Sabri IT Manager</p>
					<p></p>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-12">
					<h6 class="text-uppercase font-weight-bold">Contact</h6>
					<p>8050 Hammamet
					<br/>naanaasabri@gmail.com
					<br/>25 014 457
					</p>
				</div>
			</div>
		</div>
		<div class="footer-copyright text-center">© 2021 Copyright: SN.com
		<p id="test"></p></div>
		
	</footer>
<!-- Icons -->
<script src=./bootstrap/js/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="./bootstrap/js/vendor/jquery.slim.min.js"><\/script>')</script>
	  <script src="./bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="./bootstrap/js/feather.min.js"></script>
        <script src="./bootstrap/js/Chart.min.js"></script>
        
		<!-- Chart -->
		<script>
		/* globals Chart:false, feather:false */

(function () {
  'use strict'

  feather.replace()
	var a = 305;
	var b = 105;
	var total = <?php echo json_encode($total); ?>;
	
  // Graphs
  var ctx = document.getElementById('myChart')
  // eslint-disable-next-line no-unused-vars
  var myChart = new Chart(ctx, {
  
	type: 'line',
    data: 
	
	/*[{
    		type: "line",
    		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
    	}]*/
	
	{
		 
      labels: <?php echo "[";
for ($i=0;$i<count($labels);$i++)
{echo "'";echo implode("",$labels[$i]);echo "'";
echo ",";}

echo "]"; ?>,
      datasets: [{
        data :<?php echo "[";
for ($i=0;$i<count($dataPoints);$i++)
{echo implode("",$dataPoints[$i]);
echo ",";}

echo "0]"; ?>
		
		
		,
		
        lineTension: 0,
        backgroundColor: 'transparent',
        borderColor: '#007bff',
        borderWidth: 4,
        pointBackgroundColor: '#007bff'
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: false
          }
        }]
      },
      legend: {
        display: false
      }
    }
  })

}()
)
		</script>

</body>

</html>