
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
    Election - Cast Vote
  </title>

  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/material-dashboard.css?v=3.0.2" rel="stylesheet" />

  <script>
    function getVoter(val) {
      $.ajax({
      type: "POST",
      url: "functions/get_voter.php",
      data:'Id='+val,
      success: function(data){
        $("#voter").html(data);
      }
      });
    }
  </script>

</head>

<body class="g-sidenav-show bg-gray-200" style="background-image: url('assets/img/elections-bg.jpg');">

  <?php include 'includes/asides.php';?>

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

    <?php include 'includes/navbar.php';?>

      <div class="container-fluid py-4">

        <div class="row">
          <div class="col-lg-12 col-md-12 col-12 mx-auto">
            <div class="card my-4 z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                  <h4 class="text-white text-uppercase font-weight-bolder text-center mt-2 mb-0">Cast a vote now</h4>
                  <br />
                </div>
              </div>

              <div class="card-body">
                <div class="row">
                  <div class="col-lg-8 col-md-10 col-10 mx-auto">

                    <div class="alert alert-info alert-dismissible" id="messageInfo" style="display:none;">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    </div>

                    <form id="fupForm" role="form" method="post" class="text-start">

                      <!-- Category -->
                      <label class="form-label text-uppercase text-secondary font-weight-bolder">Voter Category</label>
                      <div class="input-group input-group-outline mb-3">
                        <select class="form-control" name="category" id="category" onChange="getVoter(this.value);" required>
                          <option value=""> </option>
                            <?php $ret = mysqli_query($con, "SELECT * FROM categories");
while ($result = mysqli_fetch_array($ret)) {?>

                          <option value="<?php echo htmlentities($result['category_name']); ?>"><?php echo htmlentities($result['category_name']); ?></option><?php }?>

                        </select>
                      </div>

                      <!-- Voter -->
                      <label class="form-label text-uppercase text-secondary font-weight-bolder">Voter (Registered only)</label>
                      <div class="input-group input-group-outline mb-3">
                        <select class="form-control" name="voter" id="voter" required>
                        </select>
                      </div>

                      <!-- Party -->
                      <label class="form-label text-uppercase text-secondary font-weight-bolder">Select Party</label>
                      <div class="input-group input-group-outline mb-3">
                        <select class="form-control" name="party" id="party" required>
                          <option value=""> </option>
                          <?php $ret = mysqli_query($con, "SELECT * FROM parties");
while ($result = mysqli_fetch_array($ret)) {?>

                          <option value="<?php echo htmlentities($result['party_id']); ?>"><?php echo htmlentities($result['party_name']); ?></option> <?php }?>

                        </select>
                      </div>

                      <!-- Position -->
                      <label class="form-label text-uppercase text-secondary font-weight-bolder">Select Position</label>
                      <div class="input-group input-group-outline mb-3">
                        <select class="form-control" name="position" id="position" required>
                          <option value=""> </option>
                          <?php $ret = mysqli_query($con, "SELECT * FROM positions");
while ($result = mysqli_fetch_array($ret)) {?>

                          <option value="<?php echo htmlentities($result['position_id']); ?>"><?php echo htmlentities($result['position_name']); ?></option> <?php }?>

                        </select>
                      </div>

                      <div class="text-center">
                        <button type="button" name="submit" class="btn bg-gradient-info w-100 my-4 mb-2" id="submit">Vote Now</button>
                      </div>

                    </form>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>

      <?php include 'includes/bottom.php';?>

  <script>
  $(document).ready(function() {
  $('#submit').on('click', function() {
  $("#submit").attr("disabled", "disabled");

  function refreshClass(){
    $("#messageInfo").removeClass("alert-success");
    $("#messageInfo").removeClass("alert-info");
    $("#messageInfo").removeClass("alert-warning");
    $("#messageInfo").removeClass("alert-primary");
  }

  var _position = $('#position').val();
  var _party = $('#party').val();
  var _voter = $('#voter').val();
  var _category = $('#category').val();

    $.ajax({
      url: "functions/save.php",
      type: "POST",
      data: {
        position: _position,
        party: _party,
        voter: _voter,
        category: _category
      },
      cache: false,
      success: function(dataResult){
        //var dataResult = JSON.parse(dataResult);
        if(dataResult.code==1){
          $("#submit").removeAttr("disabled");
          $('#fupForm').find('select').val('');
          refreshClass()
          $("#messageInfo").show();
          $("#messageInfo").addClass("alert-success");
          $('#messageInfo').html(dataResult.message);
         }
         else if(dataResult.code==2){
          $("#submit").removeAttr("disabled");
          $('#fupForm').find('select').val('');
          refreshClass()
          $("#messageInfo").show();
          $("#messageInfo").addClass("alert-warning");
          $('#messageInfo').html(dataResult.message);
        }
        else if(dataResult.code==3){
          $("#submit").removeAttr("disabled");
          $('#fupForm').find('select').val('');
          refreshClass()
          $("#messageInfo").show();
          $("#messageInfo").addClass("alert-danger");
          $('#messageInfo').html(dataResult.message);
        }
      }
    });

  });
  });
  </script>

</body>

</html>

<?php ?>