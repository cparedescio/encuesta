<!DOCTYPE html>
<html lang="en">

<?php 
  ob_start();
  require_once('includes/load.php');
  echo display_msg($msg);   
    $A1= number_format($_GET["A1"], 2, '.', '');
    $A2= number_format($_GET["A2"], 2, '.', '');
    $A3= number_format($_GET["A3"], 2, '.', '');
    $A4= number_format($_GET["A4"], 2, '.', '');
    $A5= number_format($_GET["A5"], 2, '.', '');
    $A6= number_format($_GET["A6"], 2, '.', '');
    $A7= number_format($_GET["A7"], 2, '.', '');
    $A8= number_format($_GET["A8"], 2, '.', '');
    $A9= number_format($_GET["A9"], 2, '.', '');
	$DR= ($A1+$A2+$A3+$A4+$A5+$A6+$A7+$A8+$A9)/9;
$T1= $_GET["T1"];
$T2= $_GET["T2"];
$T3= $_GET["T3"];
$T4= $_GET["T4"];
$T5= $_GET["T5"];
$T6= $_GET["T6"];
$T7= $_GET["T7"];
$T8= $_GET["T8"];
$T9= $_GET["T9"];
	

?>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Degree of automation and digitalization for implementation of
I4.0 technologies.</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.1.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">implementation i4.0</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->
    <div class="d-flex align-items-center justify-content-between">
 <span class="d-none d-lg-block">Degree of automation and digitalization for implementation of
I4.0 technologies.</span>
    </div><!-- End Logo -->
  
  
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

       


      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.php">
          <i class="bi bi-grid"></i>
          <span>Home</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-heading">Pages</li>

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item active"><a href="index.html">Home</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
	    <section class="section dashboard">
<div class="row">
			 <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Result</h5>

              <!-- Radar Chart -->
              <canvas id="radarChart" style="max-height: 400px;"></canvas>
	<?php
	echo "    <script>			
              document.addEventListener(\"DOMContentLoaded\", () => {
                  new Chart(document.querySelector('#radarChart'), {
                    type: 'radar',
                    data: {
                      labels: [
                        'INDUSTRIAL INTERNET OF THINGS',
                        'CYBER PHYSICAL SYSTEMS & DIGITAL TWINS.',
                        'ADVANCED 3D SIMULATION',
                        'ADDITIVE MANUFACTURING (3D PRINTING)',
                        'AUTONOMOUS AND COLLABORATIVE ROBOTS',
                        'VERTICAL AND HORIZONTAL INTEGRATION',
                        'BIG DATA (DATA ANALITICS)',
                        'CLOUD COMPUTING',
                        'CYBERSECURITY'
                      ],
                      datasets: [{
                        label: 'Data',
                        data: [".$A1.", ".$A2.", ".$A3.", ".$A4.", ".$A5.",".$A6.",".$A7.",".$A8.",".$A9."],
                        fill: true,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgb(255, 99, 132)',
                        pointBackgroundColor: 'rgb(255, 99, 132)',
                        pointBorderColor: '#fff',
                        pointHoverBackgroundColor: '#fff',
                        pointHoverBorderColor: 'rgb(255, 99, 132)'
                      }]
                    },
                    options: {
					scales: {
						r: {
						suggestedMin: 0,
						suggestedMax: 100
						}	
					}
                      
                    }
					
                  });
                });

 
				
	          </script>";
			  ?>
				  <?php
         echo "<a class='nav-link' href='prueba.php?A1=".$A1."&A2=".$A2."&A3=".$A3."&A4=".$A4."&A5=".$A5."&A6=".$A6."&A7=".$A7."&A8=".$A8."&A8=".$A9."&user=".$_SESSION['user_id']."'>
	              	              <button type='button'  onclick='regresar()' class='btn btn-primary'>RETURN </button>
";

?>
             </div>
          </div>
        </div>
        </div>
		<div class="row">

			 <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data</h5>
			  <table>
  <tr>
    <th>I4.0 Fundamental technology</th>
<th>Pre-requisites levels</th>
    <th>Degree of adoption</th>
  </tr>
<?php			  echo "
  <tr>
<td>INDUSTRIAL INTERNET OF THINGS (IIoT)</td>
<td>".$T1."</td>
<td>".$A1."%</td>
	</tr>
  <tr>
<td>CYBER PHYSICAL SYSTEMS & DIGITAL TWINS.</td>
<td>".$T2."</td>
<td>".$A2."%</td>
  </tr>
  <tr>
<td>ADVANCED 3D SIMULATION</td>
<td>".$T3."</td>
<td>".$A3."%</td>
  </tr>
  </tr>
<td>ADDITIVE MANUFACTURING (3D PRINTING)</td>
<td>".$T4."</td>
<td>".$A4."%</td>
  </tr>
  </tr>
<td>AUTONOMOUS AND COLLABORATIVE ROBOTS</td>
<td>".$T5."</td>
<td>".$A5."%</td>
  </tr>
  </tr>
<td>VERTICAL AND HORIZONTAL INTEGRATION</td>
<td>".$T6."</td>
<td>".$A6."%</td>
  </tr>
  </tr>
<td>BIG DATA (DATA ANALITICS)</td>
<td>".$T7."</td>
<td>".$A7."%</td>
  </tr>
  </tr>
<td>CLOUD COMPUTING</td>
<td>".$T8."</td>
<td>".$A8."%</td>
  </tr>
  </tr>
<td>CYBERSECURITY</td>
<td>".$T9."</td>
<td>".$A9."%</td>
  </tr>
</table>";
?>
</div>
</div>
</div>
		<div class="row">

			 <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">DAD- %</h5>
			  <table>
  <tr>
    <th>Degree of
automation and
digitization status
(DAD) -%
</th>
<th>Status</th>
    <th>Characteristics</th>
  </tr>
 
  <tr>
<td>0 ≤ DAD < 10 </td>
<td>
 Embryonic 
 </td>
 <td>
 The company has some superficial knowledge of a small number of
enabling technologies (if any).
</td>
  </tr>
<td>10 ≤ DAD < 25 </td>
<td>
 Initial 
 </td>
 <td>
 The company has some knowledge of some technologies but may not know
all of them.</td>
  </tr>
<td>25 ≤ DAD < 50 </td>
<td>
 Primary 
 </td>
 <td>
 The company has a good knowledge of all technologies, but not all of them
have already been adopted.
</td>
  </tr>
<td>50 ≤ DAD < 75 </td>
<td>
 Intermediate</td>
 <td>
 The company has full knowledge of all technologies and all them have
already begun to be adopted.
</td>
  </tr>
<td>75 ≤ DAD < 90 </td>
<td>
 Advanced</td>
 <td>
 The company has full knowledge of all technologies and all them have a
high degree of adoption.
</td>
  </tr>
<td>90 ≤ DAD < 100 </td>
<td>
 Ready </td><td>The company has practically all the enabling technologies in full degree of
maximum adoption.
</td>
 <td>
</td>
  </tr>
</table>
</div>
</div>
</div>
 <?php  
$DAD=($A1+$A2+$A3+$A4+$A5+$A6+$A7+$A8+$A9)/9;
    $DAD= number_format($DAD, 2, '.', '');

echo "DAD = ".$DAD."%"; ?>
        </div>

		    </section>
      </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>CIO</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
    </div>
  </footer><!-- End Footer -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
     <script>	
 function  regresar(){
 window.location.href = "index.php";
 }  
</script>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>
