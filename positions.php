<?php
session_start();
include 'includes/config.php';
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/vote-icon.png">
  <link rel="icon" type="image/png" href="assets/img/vote-icon.png">
  <title>
  National Election - Electoral Positions
  </title>

  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/material-dashboard.css?v=3.0.2" rel="stylesheet" />
</head>

<body class="g-sidenav-show bg-gray-200" style="background-image: url('assets/img/elections-bg.jpg');">

<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <a class="navbar-brand m-0">
        <img src="assets/img/vote-icon.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 text-white">ELECTION INFO MENU</span>
      </a>
    </div>

    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
      <li class="nav-item">
          <a class="nav-link text-white" href="registrations.php">
            <span class="nav-link-text ms-1">Voter Registration</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="candidates.php">
            <span class="nav-link-text ms-1">All Candidates</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="electorates.php">
            <span class="nav-link-text ms-1">All Electorates</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="parties.php">
            <span class="nav-link-text ms-1">All Political Parties</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white active bg-gradient-info" href="positions.php">
            <span class="nav-link-text ms-1">All Positions</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="cast_vote.php">
            <span class="nav-link-text ms-1">Cast Your Vote Now</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="locations.php">
            <span class="nav-link-text ms-1">Available Locations</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="units.php">
            <span class="nav-link-text ms-1">Polling Units</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="votes.php">
            <span class="nav-link-text ms-1">Election Vote Counts</span>
          </a>
        </li>
      </ul>
    </div>
    
  </aside>

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

    <?php include 'includes/navbar.php'; ?>

    <div class="container-fluid py-4">

      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                <h4 class="text-white text-uppercase font-weight-bolder text-center mt-2 mb-0">OPEN CONTESTABLE ELECTORAL POSITIONS</h4><br />
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-secondary font-weight-bolder">Position Id</th>
                      <th class="text-secondary font-weight-bolder ps-1">Position Title</th>
       
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php
                  $query = mysqli_query($con, "SELECT * FROM positions");
                  $rowcount = mysqli_num_rows($query);
                  if ($rowcount == 0) {
                      ?>
                                      <tr>
                                      <?php
                  } else {
                      while ($row = mysqli_fetch_array($query)) {
                          ?>

                      <!-- ID -->
                      <td>
                      <div class="d-flex px-2">
                          <div>
                            <img src="assets/img/logo-jira.svg" class="avatar avatar-sm rounded-circle me-2" alt="spotify">
                          </div>
                          <div class="my-auto">
                            <p class="text-sm mb-0"><?php echo htmlentities($row['position_id']); ?></p>
                          </div>
                      </div>
                      </td>
                      <!-- Name -->
                      <td>
                        <p class="text-sm mb-0"><?php echo htmlentities($row['position_name']); ?></p>
                      </td>
                      
                      <td class="align-middle">
                        <button class="btn btn-link text-secondary mb-0">
                          <i class="fa fa-ellipsis-v text-xs"></i>
                        </button>
                      </td>
                    </tr>
                    <?php }}?>


                  </tbody>
                </table>
              </div>


            </div>
          </div>
        </div>
      </div>

      <?php include 'includes/bottom.php'; ?>

</body>

</html>

<?php ?>