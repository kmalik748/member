<?php
  require 'app/app.php';
  session_start();
  if(!isset($_SESSION["id"])){
    js_alert("Session Expired! Please login again to continue...");
    js_redirect("./");
  }

                    require 'app/db.php';
                    $user = $_SESSION["id"];
                    $sql = "SELECT * FROM membership_history WHERE userID = $user ORDER BY id DESC LIMIT 1";
                    $res = mysqli_query($con, $sql);
                    if(mysqli_num_rows($res)){
                      $row = mysqli_fetch_array($res);
                      $membership = $row["membershipID"];
                      $s = "SELECT * FROM memberships WHERE id = $membership";
                      $r = mysqli_query($con, $s);
                      $ro = mysqli_fetch_array($r);
                      $membership = $ro["name"];
                      $membership = "<span class='text-primary'>$membership</span>";
                    }else{
                      $membership = "<span class='text-danger'>New User</span>";
                    }

?>
<!DOCTYPE html>
<html lang="en">

<?php
  $path =  "";
  $title =  "User Dashboard";
  require 'parts/head.php';
?>

<body>

  <?php require 'parts/nav.php'; ?>

  <!-- Page Content -->
  <div class="container">

      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="admin_dashboard.php" class="text-primary">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">User Dashboard</li>
        </ol>
      </nav>

      <div class="jumbotron">
        <h1>Welcome back, <b><?php echo $_SESSION["name"]; ?></b>!</h1>
        <p>Your Role: <b><?php echo $membership; ?></b>!</p>
      </div>

      <hr>

      <div class="row">
          <div class="col-md-6">
              <div class="row">
                  <div class="col-md-6">
                      <div class="box w-100 userHomeBox">
                          <div class="boxContent d-flex flex-column align-items-center px-3 py-3">
                              <i class="fas fa-briefcase fa-4x"></i>
                              <h2 class="font-weight-normal">Jobs</h2>
                              <p>Find jobs that match your skills, knowledge and experience </p>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="box w-100 userHomeBox">
                          <div class="boxContent d-flex flex-column align-items-center px-3 py-3">
                              <i class="fas fa-shopping-cart fa-4x"></i>
                              <h2 class="font-weight-normal">Shop Online</h2>
                              <p>Browse and purchase products in our online store.</p>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-12 mt-3">
                      <div class="box w-100 userHomeBox">
                          <div class="boxContent d-flex flex-column align-items-center px-3 py-3">
                              <i class="fas fa-book fa-4x"></i>
                              <h2 class="font-weight-normal">Training Zone</h2>
                              <p>Training that supports corporate objectives, learning needs, job performance and career development.</p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-md-6">sfd</div>
      </div>

  </div>

<?php
  require 'parts/footer.php';
?>

</body>

</html>
