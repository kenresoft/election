<?php
session_start();
include 'includes/config.php';
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/vote-icon.png">
	<link rel="icon" type="image/png" href="assets/img/vote-icon.png">
	<title>
		Election - Home
	</title>
    <!-- custom.css -->
    <link rel="stylesheet" href="assets/css/custom.css">
    <!-- bootstrap.min.css -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<!-- font-awesome -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    
    <!-- AOS -->
    <link rel="stylesheet" href="assets/css/aos.css">
</head>

<body>
    <div class="jumbotron jumbotron-fluid" style="background-image: url(assets/img/elections-bg.jpg); 
	padding-top: 12%;">
        <div class="container text-center text-md-left">
            <header>
                <div class="row justify-content-between">
                    <div class="col-2">
                        <img src="assets/img/vote-icon.png" alt="logo">
                    </div>
                </div>
            </header>
            <h1 data-aos="fade" data-aos-easing="linear" data-aos-duration="1000" data-aos-once="true" class="display-3 text-white font-weight-bold my-5">
            	ELECTORAL<br>
            	SYSTEM
            </h1>
            <p data-aos="fade" data-aos-easing="linear" data-aos-duration="1000" data-aos-once="true" class="lead text-white my-4">
                A Database-driven website
                <br> Developed based on a Relational Database in SQL, using PHP 
            </p>
            <a href="registrations.php" data-aos="fade" data-aos-easing="linear" data-aos-duration="1000" data-aos-once="true" class="btn my-4 font-weight-bold atlas-cta cta-green">Get Started</a>
        </div>
    </div>
    
    <!-- AOS -->
    <script src="assets/js/aos.js"></script>
    <script>
      AOS.init({
      });
    </script>
</body>

</html>

<?php ?>