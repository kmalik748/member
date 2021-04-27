<?php
  require 'app/app.php';
  session_start();
  if(!isset($_SESSION["id"])){
    js_alert("Session Expired! Please login again to continue...");
    js_redirect("./");
  }
  if(isset($_SESSION["is_admin"]) && !$_SESSION["is_admin"]){
    js_redirect("./user_dashboard.php");
  }
?>
<!DOCTYPE html>
<html lang="en">

<?php
  $path =  "";
  $title =  "Admin Dashboard";
  require 'parts/head.php';
?>

<body>

  <?php require 'parts/nav.php'; ?>

  <!-- Page Content -->
  <div class="container">

      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white">
          <li class="breadcrumb-item"><a href="admin_dashboard.php" class="appColor">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Admin Dashboard</li>
        </ol>
      </nav>

      <div class="jumbotron bg-white shadow">
        <h1 class="appColor" style="font-family: system-ui;">Admin Control Panel</h1>
        <p>Welcome back, <b class="appColor"><?php echo $_SESSION["name"]; ?></b>!</p>
      </div>

      <hr>


      <div class="row">
          <div class="col-md-3">
              <div class="myCard">
                  <div class="d-flex flex-row justify-content-around">
                      <div class="d-flex align-items-center">
                          <i class="fas fa-users fa-3x appColorLight"></i>
                      </div>
                      <div>
                          <div class="d-flex flex-column">
                              <p class="font-size-xx-large m-0 ml-3 appColor font-weight-bold">Users</p>
                              <p class="text-center m-0 font-size-xx-large appColor">32</p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-md-3">
              <div class="myCard">
                  <div class="d-flex flex-row justify-content-around">
                      <div class="d-flex align-items-center">
                          <i class="fas fa-user-shield fa-3x appColorLight"></i>
                      </div>
                      <div>
                          <div class="d-flex flex-column">
                              <p class="font-size-xx-large m-0 ml-3 appColor font-weight-bold">Active</p>
                              <p class="text-center m-0 font-size-xx-large appColor">32</p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-md-3">
              <div class="myCard">
                  <div class="d-flex flex-row justify-content-around">
                      <div class="d-flex align-items-center">
                          <i class="fas fa-user-lock fa-3x appColorLight"></i>
                      </div>
                      <div>
                          <div class="d-flex flex-column">
                              <p class="font-size-xx-large m-0 ml-3 appColor font-weight-bold">Blocked</p>
                              <p class="text-center m-0 font-size-xx-large appColor">32</p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-md-3">
              <div class="myCard">
                  <div class="d-flex flex-row justify-content-around">
                      <div class="d-flex align-items-center">
                          <i class="fas fa-list fa-3x appColorLight"></i>
                      </div>
                      <div>
                          <div class="d-flex flex-column">
                              <p class="font-size-xx-large m-0 ml-3 appColor font-weight-bold">Membership</p>
                              <p class="text-center m-0 font-size-xx-large appColor">32</p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <div class="row">
          <div class="col-md-6">
              <div class="myCard">
                  <h2 class="appColor">What would you like to do next?</h2>
                  <div class="dropdown">
                      <button class="btn btn-secondary dropdown-toggle bg-appColor adminDashboardBtn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Select an Option
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="font-size: large;">
                          <a class="dropdown-item" href="#">Invite an <b>Administrator</b> to Member365</a>
                          <a class="dropdown-item" href="admin_createContact.php">Create a <b>Contact</b></a>
                          <a class="dropdown-item" href="admin_createOrganization.php">Create an <b>Organization</b></a>
                          <a class="dropdown-item" href="#">Create an <b>Event Registration Form</b></a>
                          <a class="dropdown-item" href="#">Send an <b>Email Campaign</b></a>
                          <a class="dropdown-item" href="#">Create a <b>Form</b> to collect data</a>
                          <a class="dropdown-item" href="#">Create a <b>Contact List</b></a>
                          <a class="dropdown-item" href="#">Send an <b>Invoice</b></a>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-md-6">
              <div class="myCard bg-appColorLight" align="center">
                  <h3 style="font-size: xx-large;" >Book Zoom Meeting</h3>
                  <p style="font-size: medium;" class="">Get help from a Customer Success Coach</p>
                  <button class="btn btn-info btn-lg bg-appColor">Book Call</button>
              </div>
          </div>
      </div>

      <div class="row">
          <div class="col-md-6">
              <div class="card">
                  <div class="card-header">
                      Engagement Analytics Aggregate
                  </div>
                  <div class="card-body">
                      <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                      <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                      <script>

                          window.onload = function () {

                              var chart = new CanvasJS.Chart("chartContainer", {
                                  theme:"light2",
                                  animationEnabled: true,
                                  title:{
                                      text: "Member Engagement Aggregate"
                                  },
                                  axisY :{
                                      title: "Y-axis",
                                  },
                                  toolTip: {
                                      shared: "true"
                                  },
                                  legend:{
                                      cursor:"pointer",
                                      itemclick : toggleDataSeries
                                  },
                                  data: [{
                                      type: "spline",
                                      visible: true,
                                      showInLegend: true,
                                      name: "Score",
                                      dataPoints: [
                                          { label: "Mar 12th", y: 2.22 },
                                          { label: "Mar 14th", y: 2.20 },
                                          { label: "Mar 16th", y: 2.44 },
                                          { label: "Mar 18th", y: 2.45 },
                                          { label: "Mar 20th", y: 2.58 },
                                          { label: "Mar 22th", y: 2.44 },
                                          { label: "Mar 24th", y: 2.40 },
                                          { label: "Mar 28th", y: 2.72 }
                                      ]
                                  },
                                      {
                                          type: "spline",
                                          showInLegend: true,
                                          visible: true,
                                          name: "Users",
                                          dataPoints: [
                                              { label: "Mar 12th", y: 1.22 },
                                              { label: "Mar 14th", y: 4.20 },
                                              { label: "Mar 16th", y: 1.44 },
                                              { label: "Mar 18th", y: 3.45 },
                                              { label: "Mar 20th", y: 2.43 },
                                              { label: "Mar 22th", y: 2.74 },
                                              { label: "Mar 24th", y: 2.90 },
                                              { label: "Mar 28th", y: 1.72 }
                                          ]
                                      },
                                      {
                                          type: "spline",
                                          visible: true,
                                          showInLegend: true,
                                          name: "Actions",
                                          dataPoints: [
                                              { label: "Mar 12th", y: 2.66 },
                                              { label: "Mar 14th", y: 2.77 },
                                              { label: "Mar 16th", y: 1.44 },
                                              { label: "Mar 18th", y: 3.45 },
                                              { label: "Mar 20th", y: 2.11 },
                                              { label: "Mar 22th", y: 2.91 },
                                              { label: "Mar 24th", y: 3.40 },
                                              { label: "Mar 28th", y: 2.11 }
                                          ]
                                      }
                                  ]
                              });
                              chart.render();

                              function toggleDataSeries(e) {
                                  if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible ){
                                      e.dataSeries.visible = false;
                                  } else {
                                      e.dataSeries.visible = true;
                                  }
                                  chart.render();
                              }

                          }

                      </script>
                  </div>
              </div>
          </div>
          <div class="col-md-6">
              <div class="card">
                  <div class="card-header">
                      Engagement Analytics Aggregate
                  </div>
                  <div class="card-body">
                      <div id="circleChart" style="height: 370px; width: 100%;"></div>
                      <script>

                              var chart1 = new CanvasJS.Chart("circleChart", {
                                  theme: "light2", // "light1", "light2", "dark1", "dark2"
                                  exportEnabled: true,
                                  animationEnabled: true,
                                  title: {
                                      text: "Members Summary"
                                  },
                                  data: [{
                                      type: "pie",
                                      startAngle: 25,
                                      toolTipContent: "<b>{label}</b>: {y}%",
                                      showInLegend: "true",
                                      legendText: "{label}",
                                      indexLabelFontSize: 16,
                                      indexLabel: "{label} - {y}%",
                                      dataPoints: [
                                          { y: 13, label: "Annual Membership" },
                                          { y: 2, label: "Certified Member" },
                                          { y: 5, label: "Corporate Membership" },
                                          { y: 11, label: "Gold Membership" }
                                      ]
                                  }]
                              });
                              chart1.render();

                      </script>
                  </div>
              </div>
          </div>
      </div>
  </div>

<?php
  require 'parts/footer.php';
?>

</body>

</html>
