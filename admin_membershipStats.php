<?php
  require 'app/app.php';
  require 'app/db.php';
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
  $title =  "Membership";
  require 'parts/head.php';
?>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css"></link>

<body>

  <?php require 'parts/nav.php'; ?>

  <!-- Page Content -->
  <div class="container">

      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white">
          <li class="breadcrumb-item"><a href="admin_dashboard.php" class="appColor">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Membership Management</li>
        </ol>
      </nav>
<br>
<hr>
      <div class="row">
          <div class="col-md-4">
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
          <div class="col-md-4">
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
          <div class="col-md-4">
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
	  </div>
      <div class="row">
          <div class="col-md-4">
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
          <div class="col-md-4">
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
          <div class="col-md-4">
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
	  </div>
      <div class="row">
          <div class="col-md-4">
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
          <div class="col-md-4">
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
          <div class="col-md-4">
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
	  </div>
  </div>

<?php
  require 'parts/footer.php';
?>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
</body>

</html>
