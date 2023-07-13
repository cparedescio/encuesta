<!DOCTYPE html>
<html lang="en">

<?php 
  ob_start();
  require_once('includes/load.php');
  if(!isset($_SESSION['user_id'])) { 
  $session->msg('d'," No a iniciado seccion");
redirect('Login.php', false);}
  echo "el nombre es : ".$_SESSION['user_id'];
  if(isset($_POST['add_user'])){

   $req_fields = array('q1','q2','q3','q4','q5','q6','q7','q8','q9','q10','q12','q13','q14','q16','q17','q18','q20','q21','q22','q23','q24');
   validate_fields($req_fields);
 
   if(empty($errors)){
	 $q1 =(int)$db->escape($_POST['q1']);
	 $q2 =(int)$db->escape($_POST['q2']);
	 $q3 =(int)$db->escape($_POST['q3']);
	 $q4 =(int)$db->escape($_POST['q4']);
	 $q5 =(int)$db->escape($_POST['q5']);
	 $q6 =(int)$db->escape($_POST['q6']);
	 $q7 =(int)$db->escape($_POST['q7']);
	 $q8 =(int)$db->escape($_POST['q8']);
	 $q9 =(int)$db->escape($_POST['q9']);
	 $q10 =(int)$db->escape($_POST['q10']);
	 $q12 =(int)$db->escape($_POST['q12']);
	 $q13 =(int)$db->escape($_POST['q13']);
	 $q14 =(int)$db->escape($_POST['q14']);
	 $q16 =(int)$db->escape($_POST['q16']);
	 $q17 =(int)$db->escape($_POST['q17']);
	 $q18 =(int)$db->escape($_POST['q18']);
	 $q20 =(int)$db->escape($_POST['q20']);
	 $q21 =(int)$db->escape($_POST['q21']);
	 $q22 =(int)$db->escape($_POST['q22']);
	 $q23 =(int)$db->escape($_POST['q23']);
	 $q24 =(int)$db->escape($_POST['q24']);
     $username   = $_SESSION['user_id'];

        $query = "INSERT INTO preguntas (";
        $query .="username,q1,q2,q3,q4,q5,q6,q7,q8,q9,q10,q11,q12,q13,q14,q15,q16,q17,q18,q19,q20,q21";
        $query .=") VALUES (";
        $query .="'{$username}','{$q1}','{$q2}','{$q3}','{$q4}','{$q5}','{$q6}','{$q7}','{$q8}','{$q9}','{$q10}','{$q12}','{$q13}','{$q14}','{$q16}'";
        $query .=",'{$q17}','{$q18}','{$q20}','{$q21}','{$q22}','{$q23}','{$q24}');";

  $A1= (($q1+$q2+$q3+$q4)/12)*100;
  $A2= (($q1+$q5+$q6+$q7)/12)*100;
  $A3= (($q1+$q8+$q9)/9)*100;
  $A4= (($q10+$q1+$q8+$q9)/12)*100;
  $A5= (($q1+$q12+$q13+$q14)/12)*100;
  $A6= (($q1+$q16+$q17+$q18)/12)*100;
  $A7= (($q1+$q20+$q21+$q22)/12)*100;
  $A8= (($q1+$q23+$q20+$q18)/12)*100;
  $A9= (($q1+$q20+$q18+$q24)/12)*100;

        if($db->query($query)){
          //sucess
          $session->msg('s'," Cuenta de usuario ha sido creada");
          redirect("grafica.php?A1=".$A1."&A2=".$A2."&A3=".$A3."&A4=".$A4."&A5=".$A5."&A6=".$A6."&A7=".$A7."&A8=".$A8."&A9=".$A9, false);
        } else {
          //failed
          $session->msg('d',' No se pudo crear la cuenta.');
          redirect('index.php', false);
        }
   } else {
     $session->msg("d", $errors);
      redirect('index.php',false);
   }
 }



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
 <?php echo display_msg($msg); ?>
 
    <div class="pagetitle">
      <h1></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item active"><a href="index.html">Home</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
	<form method="post" action="index.php" class="clearfix">
<label>FUNDAMENTAL TECHNOLOGIES
I. INDUSTRIAL INTERNET OF THINGS (IIoT)</label>
    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col">
          <div class="row">
            <div >

              <div class="card info-card customers-card">
                <div class="card-body">
				  <legend >
A1. The company have computer and networks infrastructure.
</legend>
                <fieldset class="row">
                  <div >
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="q1" value="0" >
                      <label class="form-check-label" for="q1">
L0. The company has no infrastructure.
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="q1"value="1">
                      <label class="form-check-label" for="q1">
L1. The company has a small infrastructure.
                      </label>
                    </div>
                    <div class="form-check disabled">
                      <input class="form-check-input" type="radio" name="q1" value="2" >
                      <label class="form-check-label" for="q1">
L2. The company has a medium infrastructure.
                      </label>
                    </div>
                    <div class="form-check disabled">
                      <input class="form-check-input" type="radio" name="q1" value="3">
                      <label class="form-check-label" for="q1">
L3. The company has complete infrastructure.
                      </label>
                  </div>
                </fieldset>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->
          <div class="row">
            <div >

              <div class="card info-card customers-card">
                <div class="card-body">
				  <legend >
A2. The company have implemented programmable logic controllers (PLC’s) and human-machine
interfaces (HMI’s).
</legend>
                <fieldset class="row">
                  <div >
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="q2" value="0">
                      <label class="form-check-label" for="q2">
L0. The company has no PLC’s and HMI’s.
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="q2"value="1">
                      <label class="form-check-label" for="q2">
L1. The company has isolated PLC’s and HMI’s.
                      </label>
                    </div>
                    <div class="form-check disabled">
                      <input class="form-check-input" type="radio" name="q2" value="2" >
                      <label class="form-check-label" for="q2">
L2. The company has interconnected PLC’s and HMI’s.
                      </label>
                    </div>
                    <div class="form-check disabled">
                      <input class="form-check-input" type="radio" name="q2" value="3">
                      <label class="form-check-label" for="q2">
L3. The company is completely automated.
                      </label>
                  </div>
                </fieldset>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->
          <div class="row">
            <div >

              <div class="card info-card customers-card">
                <div class="card-body">
				  <legend >
A3. The company have implemented supervisory control and data acquisition system (SCADA).
</legend>
                <fieldset class="row">
                  <div >
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="q3" value="0" >
                      <label class="form-check-label" for="q3">
 L0. The company has no SCADA system.
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="q3"value="1">
                      <label class="form-check-label" for="q3">
 L1. The company has a small SCADA system.
                      </label>
                    </div>
                    <div class="form-check disabled">
                      <input class="form-check-input" type="radio" name="q3" value="2" >
                      <label class="form-check-label" for="q3">
 L2. The company has a medium SCADA system.
                      </label>
                    </div>
                    <div class="form-check disabled">
                      <input class="form-check-input" type="radio" name="q3" value="3">
                      <label class="form-check-label" for="q3">
L3. The company has complete SCADA system.
                       </label>
                  </div>
                </fieldset>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->
          <div class="row">
            <div >

              <div class="card info-card customers-card">
                <div class="card-body">
				  <legend >
A4. The company have used OLE (object link environment) for process control (OPC) data
connectivity technologies.
</legend>
                <fieldset class="row">
                  <div >
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="q4" value="0">
                      <label class="form-check-label" for="q4">
 L0. The company has no used OPC.
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="q4"value="1">
                      <label class="form-check-label" for="q4">
 L1. The company has field buses for data connectivity.
                      </label>
                    </div>
                    <div class="form-check disabled">
                      <input class="form-check-input" type="radio" name="q4" value="2" >
                      <label class="form-check-label" for="q4">
 L2. The company has industrial Ethernet networks.
                      </label>
                    </div>
                    <div class="form-check disabled">
                      <input class="form-check-input" type="radio" name="q4" value="3">
                      <label class="form-check-label" for="q4">
 L3. The company has completely implemented OPC data connectivity.
                      </label>
                  </div>
                </fieldset>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->
<label>II. CYBER PHYSICAL SYSTEMS &amp; DIGITAL TWINS.</label>

          <div class="row">
            <div >

              <div class="card info-card customers-card">
                <div class="card-body">
				  <legend >
A1. The company have implemented supervisory control and data acquisition system (SCADA)
using PLC’s and HMI’s.
</legend>
                <fieldset class="row">
                  <div >
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="q5" value="0" >
                      <label class="form-check-label" for="q5">
 L0. The company has no SCADA system.
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="q5"value="1">
                      <label class="form-check-label" for="q5">
 L1. The company has a small SCADA system.
                      </label>
                    </div>
                    <div class="form-check disabled">
                      <input class="form-check-input" type="radio" name="q5" value="2" >
                      <label class="form-check-label" for="q5">
 L2. The company has a medium SCADA system.
                      </label>
                    </div>
                    <div class="form-check disabled">
                      <input class="form-check-input" type="radio" name="q5" value="3">
                      <label class="form-check-label" for="q5">
 L3. The company has complete SCADA system.
                      </label>
                  </div>
                </fieldset>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->
          <div class="row">
            <div >

              <div class="card info-card customers-card">
                <div class="card-body">
				  <legend >
A2. The company has Automated Storage/Retrieval Systems (AS/AR).
</legend>
                <fieldset class="row">
                  <div >
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="q6" value="0" >
                      <label class="form-check-label" for="q6">
 L0. The company has no AS/AR system.
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="q6"value="1">
                      <label class="form-check-label" for="q6">
 L1. The company has a small AS/AR system.
                      </label>
                    </div>
                    <div class="form-check disabled">
                      <input class="form-check-input" type="radio" name="q6" value="2" >
                      <label class="form-check-label" for="q6">
 L2. The company has a medium AS/AR system.
                      </label>
                    </div>
                    <div class="form-check disabled">
                      <input class="form-check-input" type="radio" name="q6" value="3">
                      <label class="form-check-label" for="q6">
 L3. The company has complete AS/AR system.
                      </label>
                  </div>
                </fieldset>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->
          <div class="row">
            <div >

              <div class="card info-card customers-card">
                <div class="card-body">
				  <legend >
A3. The company has material handling systems (MHS) or material transport systems (MTS).

</legend>
                <fieldset class="row">
                  <div >
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="q7" value="0" >
                      <label class="form-check-label" for="q7">
 L0. The company has no MHS or MTS systems.
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="q7"value="1">
                      <label class="form-check-label" for="q7">
 L1. The company has a small MHS or MTS systems.
                      </label>
                    </div>
                    <div class="form-check disabled">
                      <input class="form-check-input" type="radio" name="q7" value="2" >
                      <label class="form-check-label" for="q7">
 L2. The company has a medium MHS or MTS systems.
                      </label>
                    </div>
                    <div class="form-check disabled">
                      <input class="form-check-input" type="radio" name="q7" value="3">
                      <label class="form-check-label" for="q7">
 L3. The company has complete MHS or MTS systems.
                      </label>
                  </div>
                </fieldset>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->
<label>III. ADVANCED 3D SIMULATION</label>
          <div class="row">
            <div >

              <div class="card info-card customers-card">
                <div class="card-body">
				  <legend >
A1. The company uses a CAD/CAM/CAE design environment.
</legend>
                <fieldset class="row">
                  <div >
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="q8" value="0" >
                      <label class="form-check-label" for="q8">
 L0. The company has no CAD/CAM/CAE tools.
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="q8"value="1">
                      <label class="form-check-label" for="q8">
 L1. The company uses only CAD tools.
                      </label>
                    </div>
                    <div class="form-check disabled">
                      <input class="form-check-input" type="radio" name="q8" value="2" >
                      <label class="form-check-label" for="q8">
 L2. The company uses CAD and CAM tools.
                      </label>
                    </div>
                    <div class="form-check disabled">
                      <input class="form-check-input" type="radio" name="q8" value="3">
                      <label class="form-check-label" for="q8">
 L3. The company uses CAD/CAM/CAE tools.
                      </label>
                  </div>
                </fieldset>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->
          <div class="row">
            <div >

              <div class="card info-card customers-card">
                <div class="card-body">
				  <legend >
A2. The company has Computerized Numerical Control (CNC).
</legend>
                <fieldset class="row">
                  <div >
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="q9" value="0" >
                      <label class="form-check-label" for="q9">
L0. The company has no CNC system.
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="q9" value="1">
                      <label class="form-check-label" for="q9">
L1. The company has a CNC system only for maintenance.
                      </label>
                    </div>
                    <div class="form-check disabled">
                      <input class="form-check-input" type="radio" name="q9" value="2" >
                      <label class="form-check-label" for="q9">
L2. The company has a CNC system for production.
                      </label>
                    </div>
                    <div class="form-check disabled">
                      <input class="form-check-input" type="radio" name="q9" value="3">
                      <label class="form-check-label" for="q9">
L3. The company has a CNC system integrated in a manufacturing cell.
                      </label>
                  </div>
                </fieldset>

                    </div>
                  </div>

                </div>
              </div>
</label>IV. ADDITIVE MANUFACTURING (3D PRINTING)</label>
              <div class="card info-card customers-card">
                <div class="card-body">
				  <legend >
A1. The company has a 3D Priting.
</legend>
                <fieldset class="row">
                  <div >
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="q10" value="0" >
                      <label class="form-check-label" for="q10">
 L0. The company  has  no a 3d printing.
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="q10"value="1">
                      <label class="form-check-label" for="q10">
 L1. The company has at least a 3D Printing.
                      </label>
                    </div>
                    <div class="form-check disabled">
                      <input class="form-check-input" type="radio" name="q10" value="2" >
                      <label class="form-check-label" for="q10">
 L2.  The company has 3D Printing and has a provider.
                      </label>
                    </div>
                    <div class="form-check disabled">
                      <input class="form-check-input" type="radio" name="q10" value="3">
                      <label class="form-check-label" for="q10">
 L3. The company has offered the service or has a provider.
                      </label>
                  </div>
                </fieldset>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->
          <div class="row">
            <div >


<label>V. AUTONOMOUS AND COLLABORATIVE ROBOTS</label>
              </div>

            </div><!-- End Customers Card -->
          <div class="row">
            <div >

              <div class="card info-card customers-card">
                <div class="card-body">
				  <legend >
A1. The company have implemented programmable logic controllers (PLC’s) and human-machine
interfaces (HMI’s).
</legend>
                <fieldset class="row">
                  <div >
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="q12" value="0" >
                      <label class="form-check-label" for="q12">
 L0. The company has no PLC’s and HMI’s.
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="q12"value="1">
                      <label class="form-check-label" for="q12">
 L1. The company has isolated PLC’s and HMI’s.
                      </label>
                    </div>
                    <div class="form-check disabled">
                      <input class="form-check-input" type="radio" name="q12" value="2" >
                      <label class="form-check-label" for="q12">
 L2. The company has interconnected PLC’s and HMI’s.
                      </label>
                    </div>
                    <div class="form-check disabled">
                      <input class="form-check-input" type="radio" name="q12" value="3">
                      <label class="form-check-label" for="q12">
 L3. The company is completely automated.
                      </label>
                  </div>
                </fieldset>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->
          <div class="row">
            <div >

              <div class="card info-card customers-card">
                <div class="card-body">
				  <legend >
A3. Industrial Robots

</legend>
                <fieldset class="row">
                  <div >
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="q13" value="0" >
                      <label class="form-check-label" for="q13">
 L0. The company has no Industrial Robots.
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="q13"value="1">
                      <label class="form-check-label" for="q13">
 L1. The company has a stand-alone Industrial Robots.
                      </label>
                    </div>
                    <div class="form-check disabled">
                      <input class="form-check-input" type="radio" name="q13" value="2" >
                      <label class="form-check-label" for="q13">
 L2. The company has an interfaced Industrial Robots.
                      </label>
                    </div>
                    <div class="form-check disabled">
                      <input class="form-check-input" type="radio" name="q13" value="3">
                      <label class="form-check-label" for="q13">
 L3. The company has manufacturing cell with Industrial Robots.
                      </label>
                  </div>
                </fieldset>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->
          <div class="row">
            <div >

              <div class="card info-card customers-card">
                <div class="card-body">
				  <legend >

A4. Automated Guided Vehicles (AGVs)
</legend>
                <fieldset class="row">
                  <div >
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="q14" value="0" >
                      <label class="form-check-label" for="q14">
 L0. The company has no AGVs.
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="q14"value="1">
                      <label class="form-check-label" for="q14">
 L1. The company has a stand-alone AGVs.
                      </label>
                    </div>
                    <div class="form-check disabled">
                      <input class="form-check-input" type="radio" name="q14" value="2" >
                      <label class="form-check-label" for="q14">
 L2. The company has an interfaced AGVs.
                      </label>
                    </div>
                    <div class="form-check disabled">
                      <input class="form-check-input" type="radio" name="q14" value="3">
                      <label class="form-check-label" for="q14">
 L3. The company has manufacturing lines supplied by AGVs.
                      </label>
                  </div>
                </fieldset>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->
<label>VI. VERTICAL AND HORIZONTAL INTEGRATION</label>

          <div class="row">
            <div >

              <div class="card info-card customers-card">
                <div class="card-body">
				  <legend >
A1. Manufacturing Execution System (MES)
</legend>
                <fieldset class="row">
                  <div >
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="q16" value="0" >
                      <label class="form-check-label" for="q16">
 L0. The company has no MES system.
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="q16"value="1">
                      <label class="form-check-label" for="q16">
 L1. The company has a small MES system.
                      </label>
                    </div>
                    <div class="form-check disabled">
                      <input class="form-check-input" type="radio" name="q16" value="2" >
                      <label class="form-check-label" for="q16">
 L2. The company has a medium MES system.
                      </label>
                    </div>
                    <div class="form-check disabled">
                      <input class="form-check-input" type="radio" name="q16" value="3">
                      <label class="form-check-label" for="q16">
 L3. The company has complete MES system.
                      </label>
                  </div>
                </fieldset>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->
          <div class="row">
            <div >

              <div class="card info-card customers-card">
                <div class="card-body">
				  <legend >
A2. The company have implemented a basic enterprise resource planner system (ERP).
</legend>
                <fieldset class="row">
                  <div >
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="q17" value="0" >
                      <label class="form-check-label" for="q17">
 L0. The company has no ERP system.
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="q17"value="1">
                      <label class="form-check-label" for="q17">
 L1. The company has a small ERP system.
                      </label>
                    </div>
                    <div class="form-check disabled">
                      <input class="form-check-input" type="radio" name="q17" value="2" >
                      <label class="form-check-label" for="q17">
 L2. The company has a medium ERP system.
                      </label>
                    </div>
                    <div class="form-check disabled">
                      <input class="form-check-input" type="radio" name="q17" value="3">
                      <label class="form-check-label" for="q17">
 L3. The company has complete ERP system.
                      </label>
                  </div>
                </fieldset>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->
          <div class="row">
            <div >

              <div class="card info-card customers-card">
                <div class="card-body">
				  <legend >
A3. Enterprise and control systems integration (ISA-95 or equivalent)
</legend>
                <fieldset class="row">
                  <div >
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="q18" value="0" >
                      <label class="form-check-label" for="q18">
 L0. The company has no implemented ISA-95.
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="q18"value="1">
                      <label class="form-check-label" for="q18">
 L1. The company has a partial implementation of ISA-95.
                      </label>
                    </div>
                    <div class="form-check disabled">
                      <input class="form-check-input" type="radio" name="q18" value="2" >
                      <label class="form-check-label" for="q18">
 L2. The company has an advanced implementation of ISA-95.
                      </label>
                    </div>
                    <div class="form-check disabled">
                      <input class="form-check-input" type="radio" name="q18" value="3">
                      <label class="form-check-label" for="q18">
 L3. The company has complete implementation of ISA-95.
                      </label>
                  </div>
                </fieldset>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->
<label>VII. BIG DATA (DATA ANALITICS)</label>
  <!-- End Customers Card -->
          <div class="row">
            <div >

              <div class="card info-card customers-card">
                <div class="card-body">
				  <legend >
A1. The company should have all its data/information organized and maintained in secured data
base systems.
</legend>
                <fieldset class="row">
                  <div >
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="q20" value="0" >
                      <label class="form-check-label" for="q20">
 L0. The company does not have its information in secured data base systems.
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="q20"value="1">
                      <label class="form-check-label" for="q20">
 L1. The company has some information in secured data base systems.
                      </label>
                    </div>
                    <div class="form-check disabled">
                      <input class="form-check-input" type="radio" name="q20" value="2" >
                      <label class="form-check-label" for="q20">
 L2. The company has a large part of its information in secured data base systems.
                      </label>
                    </div>
                    <div class="form-check disabled">
                      <input class="form-check-input" type="radio" name="q20" value="3">
                      <label class="form-check-label" for="q20">
 L3. The company has all of its information in secured data base systems.
                      </label>
                  </div>
                </fieldset>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->
          <div class="row">
            <div >

              <div class="card info-card customers-card">
                <div class="card-body">
				  <legend >
A2. Statistical Process Control (SPC)
</legend>
                <fieldset class="row">
                  <div >
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="q21" value="0" >
                      <label class="form-check-label" for="q21">
 L0. The company has no SPC.
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="q21"value="1">
                      <label class="form-check-label" for="q21">
 L1. The company has some few processes with SPC.
                      </label>
                    </div>
                    <div class="form-check disabled">
                      <input class="form-check-input" type="radio" name="q21" value="2" >
                      <label class="form-check-label" for="q21">
 L2. The company has only critical processes with SPC.
                      </label>
                    </div>
                    <div class="form-check disabled">
                      <input class="form-check-input" type="radio" name="q21" value="3">
                      <label class="form-check-label" for="q21">
 L3. The company has all its processes with SPC.
                      </label>
                  </div>
                </fieldset>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->
          <div class="row">
            <div >

              <div class="card info-card customers-card">
                <div class="card-body">
				  <legend >
A3. Fault Diagnosis Systems (FDS)
</legend>
                <fieldset class="row">
                  <div >
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="q22" value="0" >
                      <label class="form-check-label" for="q22">
 L0. The company has no FDS.
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="q22"value="1">
                      <label class="form-check-label" for="q22">
 L1. The company has some few processes with FDS.
                      </label>
                    </div>
                    <div class="form-check disabled">
                      <input class="form-check-input" type="radio" name="q22" value="2" >
                      <label class="form-check-label" for="q22">
 L2. The company has only critical processes with FDS.
                      </label>
                    </div>
                    <div class="form-check disabled">
                      <input class="form-check-input" type="radio" name="q22" value="3">
                      <label class="form-check-label" for="q22">
 L3. The company has all its processes with FDS.
                      </label>
                  </div>
                </fieldset>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->
          <div class="row">

<label>VIII. CLOUD COMPUTING</label>
              <div class="card info-card customers-card">
                <div class="card-body">
				  <legend >
A1. The company have service of cloud computing.</legend>
                <fieldset class="row">
                  <div >
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="q23" value="0" >
                      <label class="form-check-label" for="q23">
 L0. The company has no infrastructure.
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="q23"value="1">
                      <label class="form-check-label" for="q23">
 L1. The company has a service of cloud computing.
                      </label>
                    </div>
                    <div class="form-check disabled">
                      <input class="form-check-input" type="radio" name="q23" value="2" >
                      <label class="form-check-label" for="q23">
 L2. The company service is  esencial for the company.
                      </label>
                    </div>
                    <div class="form-check disabled">
                      <input class="form-check-input" type="radio" name="q23" value="3">
                      <label class="form-check-label" for="q23">
 L3. The company service is esencial for the company and the company can offer to consult.
                      </label>
                  </div>
                </fieldset>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

</div>
<label>IX. CYBERSECURITY</label>
              <div class="card info-card customers-card">
                <div class="card-body">
				  <legend >
A1. The company have Cybersecurity.</legend>
                <fieldset class="row">
                  <div >
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="q24" value="0" >
                      <label class="form-check-label" for="q24">
 L0. The company has no infrastructure.
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="q24"value="1">
                      <label class="form-check-label" for="q24">
 L1. The company has a small software and .
                      </label>
                    </div>
                    <div class="form-check disabled">
                      <input class="form-check-input" type="radio" name="q24" value="2" >
                      <label class="form-check-label" for="q24">
 L2. The company has a medium infrastructure.
                      </label>
                    </div>
                    <div class="form-check disabled">
                      <input class="form-check-input" type="radio" name="q24" value="3">
                      <label class="form-check-label" for="q24">
 L3. The company has complete infrastructure.
                      </label>
                  </div>
                </fieldset>

                    </div>
                  </div>

                </div>
              </div>
          <div class="row">
              <button type="submit" name="add_user"  class="btn btn-primary">Send</button>
</div>         
            <!-- Reports -->
			
  
      
          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
       
      

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

</html>