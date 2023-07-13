<!DOCTYPE html>
<html lang="en">

<?php 
  require_once('includes/load.php');
//  if (!$session->isUserLoggedIn(true)) { redirect('login.php', false);}
//  echo display_msg("el nombre es : ".$_SESSION['user_id']);

  if(isset($_POST['add_user'])){

   $req_fields = array('name','company','country', 'q1','q2','q3','q4','q5','q6','q7','q8','q9','q12','q13','q14','q16','q17','q18','q20','q21','q22');
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

	 $q12 =(int)$db->escape($_POST['q12']);
	 $q13 =(int)$db->escape($_POST['q13']);
	 $q14 =(int)$db->escape($_POST['q14']);
	 $q16 =(int)$db->escape($_POST['q16']);
	 $q17 =(int)$db->escape($_POST['q17']);
	 $q18 =(int)$db->escape($_POST['q18']);
	 $q20 =(int)$db->escape($_POST['q20']);
	 $q21 =(int)$db->escape($_POST['q21']);
	 $q22 =(int)$db->escape($_POST['q22']);
     $name   = $_POST['name'];
     $company   = $_POST['company'];
     $country   = $_POST['country'];
     $email   = $_POST['email'];

        $query = "INSERT INTO preguntas (";
        $query .="name,company,country,email,q1,q2,q3,q4,q5,q6,q7,q8,q9,q11,q12,q13,q14,q15,q16,q17,q18,q19";
        $query .=") VALUES (";
        $query .="'{$name}','{$company}','{$country}','{$email}','{$q1}','{$q2}','{$q3}','{$q4}','{$q5}','{$q6}','{$q7}','{$q8}','{$q9}','{$q12}','{$q13}','{$q14}','{$q16}'";
        $query .=",'{$q17}','{$q18}','{$q20}','{$q21}','{$q22}');";

  $A1= (($q1+$q2+$q3+$q4)/12)*100;
  $A2= (($q1+$q5+$q6+$q7)/12)*100;
  $A3= (($q1+$q8+$q9)/9)*100;
  $A4= (($q1+$q8+$q9)/9)*100;
  $A5= (($q1+$q12+$q13+$q14)/12)*100;
  $A6= (($q1+$q16+$q17+$q18)/12)*100;
  $A7= (($q1+$q20+$q21+$q22)/12)*100;
  $A8= (($q1+$q20+$q17)/9)*100;
  $A9= (($q1+$q20+$q17)/9)*100;
$T1="A1:L".($q1)."A2:L".($q2)."A3:L".($q3)."A4:L".($q4);
$T2="A1:L".($q1)."A2:L".($q5)."A3:L".($q6)."A4:L".($q7);
$T3="A1:L".($q1)."A2:L".($q8)."A3:L".($q9);
$T4="A1:L".($q1)."A2:L".($q8)."A3:L".($q9);
$T5="A1:L".($q1)."A2:L".($q12)."A3:L".($q13)."A4:L".($q14);
$T6="A1:L".($q1)."A2:L".($q16)."A3:L".($q17)."A4:L".($q18);
$T7="A1:L".($q1)."A2:L".($q20)."A3:L".($q21)."A4:L".($q22);
$T8="A1:L".($q1)."A2:L".($q20)."A3:L".($q17);
$T9="A1:L".($q1)."A2:L".($q20)."A3:L".($q17);

        if($db->query($query)){
          //sucess
          $session->msg('s'," Cuenta de usuario ha sido creada");
          redirect("grafica.php?A1=".$A1."&A2=".$A2."&A3=".$A3."&A4=".$A4."&A5=".$A5."&A6=".$A6."&A7=".$A7."&A8=".$A8."&A9=".$A9."&T1=".$T1."&T2=".$T2."&T3=".$T3."&T4=".$T4."&T5=".$T5."&T6=".$T6."&T7=".$T7."&T8=".$T8."&T9=".$T9, false);
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

  <title>Degree of automation and digitalization for implementation of I4.0 technologies.</title>
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
  <link href="assets/css/style.css" rel="stylesheet">
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
          <span>Home </span>
        </a>
      </li><!-- End Dashboard Nav -->

        <a class="nav-link " href="logout.php">
      <li class="nav-heading">Salir</li>
        </a>
    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">
 <?php echo display_msg($msg); ?>
 
    <div class="pagetitle">
      <h1></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item active"><a href="index.php">Home</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
	<form method="post" action="index.php" class="clearfix">
    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col">
          <div class="row">
            <div >

              <div class="card info-card customers-card">
                <div class="card-body">
				  <legend >
DATA
</legend>
                <fieldset class="row">
                  <div >
                    <div class="form-check">
                      <label class="form-check-label" for="name">
Name:                      </label>
                      <input class="input" type="text" name="name">
                    </div>
                    <div class="form-check">
<label class="form-check-label" for="company">
Company:
                      </label>                
				<input class="input" type="text" name="company">
                      
                    </div>
                    <div class="form-check disabled">
                      <label class="form-check-label" for="country">
					  Country:
                      </label><input class="input" type="text" name="country" >
                      
                    </div>
                    <div class="form-check disabled">
                      <label class="form-check-label" for="email">
					  Email:
                      </label>
                      <input class="input" type="text" name="email">
                  </div>
                </fieldset>

                    </div>
                  </div>
				  <a href="aviso_privasidad.php" class="btn btn-primary"> Notice of Privacy </a>

                </div>
              </div>

            </div><!-- End Customers Card -->


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

              </div>

            </div><!-- End Customers Card -->
          <div class="row">
				  <legend >
This section is completed from previous questions
				  </legend >
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
A3. Enterprise and control systems integration (vertical integration)
</legend>
                <fieldset class="row">
                  <div >
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="q18" value="0" >
                      <label class="form-check-label" for="q18">
 L0. The company has no implemented SCADA/MES/ERP integration.
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="q18"value="1">
                      <label class="form-check-label" for="q18">
 L1. The company has a partial implementation of SCADA/MES/ERP integration.
                      </label>
                    </div>
                    <div class="form-check disabled">
                      <input class="form-check-input" type="radio" name="q18" value="2" >
                      <label class="form-check-label" for="q18">
 L2. The company has an advanced implementation of SCADA/MES/ERP integration.
                      </label>
                    </div>
                    <div class="form-check disabled">
                      <input class="form-check-input" type="radio" name="q18" value="3">
                      <label class="form-check-label" for="q18">
 L3. The company has complete implementation of SCADA/MES/ERP integration.
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
				  <legend >
This section is completed from previous questions
				  </legend >

              </div>

            </div><!-- End Customers Card -->

</div>
<label>IX. CYBERSECURITY</label>
              
          <div class="row">
				  <legend >
This section is completed from previous questions
				  </legend >

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
	