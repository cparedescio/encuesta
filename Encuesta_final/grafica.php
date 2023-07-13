<!DOCTYPE html>
<html lang="en">

<?php 
  ob_start();
  require_once('includes/load.php');
  if(!isset($_SESSION['user_id'])) { 
  $session->msg('d'," No a iniciado seccion");
redirect('Login.php', false);}
  echo display_msg($msg);   
    $A1= $_GET["A1"];
    $A2= $_GET["A2"];
    $A3= $_GET["A3"];
    $A4= $_GET["A4"];
    $A5= $_GET["A5"];
    $A6= $_GET["A6"];
    $A7= $_GET["A7"];
    $A8= $_GET["A8"];
    $A9= $_GET["A9"];
	$DR= ($A1+$A2+$A3+$A4+$A5+$A6+$A7+$A8+$A9)/9;
	$DR2= pow((pow($A1,2)+pow($A2,2)+pow($A3,2)+pow($A4,2)+pow($A5,2)+pow($A6,2)+pow($A7,2)+pow($A8,2)+pow($A9,2)),.5)/9;
	

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
        <a class="nav-link " href="index.html">
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
              <h5 class="card-title">Resultado</h5>

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
                        label: 'Datos',
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
                      elements: {
                        line: {
                          borderWidth: 3
                        }
                      }
                    }
                  });
                });
				
	          </script>";
			  ?>
	              <button type="button"  onclick="regresar()" class="btn btn-primary">RETURN </button>

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
    <th>technologies</th>
    <th>Value</th>
    <th>Panini</th>
    <th>Proposed</th>
  </tr>
<?php			  echo "
  <tr>
<td>INDUSTRIAL INTERNET OF THINGS</td>
<td>".$A1."%<td>
<td>".$DR."<td>
<td>".$DR2."<td>
  </tr>
  <tr>
<td>CYBER PHYSICAL SYSTEMS & DIGITAL TWINS.</td>
<td>".$A2."%<td>
  </tr>
  <tr>
<td>ADVANCED 3D SIMULATION</td>
<td>".$A3."%<td>
  </tr>
  </tr>
<td>ADDITIVE MANUFACTURING (3D PRINTING)</td>
<td>".$A4."%<td>
  </tr>
  </tr>
<td>AUTONOMOUS AND COLLABORATIVE ROBOTS</td>
<td>".$A5."%<td>
  </tr>
  </tr>
<td>VERTICAL AND HORIZONTAL INTEGRATION</td>
<td>".$A6."%<td>
  </tr>
  </tr>
<td>BIG DATA (DATA ANALITICS)</td>
<td>".$A7."%<td>
  </tr>
  </tr>
<td>CLOUD COMPUTING</td>
<td>".$A8."%<td>
  </tr>
  </tr>
<td>CYBERSECURITY</td>
<td>".$A9."%<td>
  </tr>
</table>";
?>
</div>
</div>
</div>
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
