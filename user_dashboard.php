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
        <p>User Role: <b><?php echo $membership; ?></b>!</p>
      </div>

      <hr>
  </div>

<?php
  require 'parts/footer.php';
?>

</body>

</html>
