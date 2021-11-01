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
  $title =  "Users";
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
          <li class="breadcrumb-item active" aria-current="page">Users Management</li>
        </ol>
      </nav>

      <table id="example" class="table table-striped table-bordered bg-white shadow" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Membership</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
                <?php
                    require 'app/db.php';
                    $sql = "SELECT * FROM users WHERE is_admin=0 and deleted=0";
                    $res = mysqli_query($con, $sql);
                    while($row = mysqli_fetch_array($res)){
                      $user = $row["id"];
                      $s = "SELECT * FROM membership_history WHERE userID = $user ORDER BY id DESC LIMIT 1";
                      $r = mysqli_query($con, $s);
                      if(mysqli_num_rows($r)){
                        $ro = mysqli_fetch_array($r);
                        $membership = $ro["membershipID"];
                        $s = "SELECT * FROM memberships WHERE id = $membership";
                        $r = mysqli_query($con, $s);
                        $ro = mysqli_fetch_array($r);
                        $membership = '<b>'.$ro["name"].'</b>';
                      }else{
                        $membership = "<span class='appColor'>New User</span>";
                      }
                      $rndom = rand();
                        ?>
                            <tr>
                                <td>
                                    <a href="admin_contact_showProfile.php?userID=<?php echo $user; ?>">
                                        <img src="img/user.jpg" class="rounded mr-2" id="nav_user_pic"><?php echo $row["first_name"]; ?>
                                    </a>
                                </td>
                                <td><?php echo $row["email"]; ?></td>
                                <td><?php echo $membership; ?></td>
                                <td>
                                    <a href="" class="btn bg-appColorLight" data-toggle="modal" data-target="#membershipModal_<?php echo $rndom; ?>">
                                      Update Membership
                                    </a>
                                </td>
                            </tr>
                            <!-- Membership Modal -->
                            <div class="modal" id="membershipModal_<?php echo $rndom; ?>">
                              <div class="modal-dialog">
                                <div class="modal-content">

                                  <!-- Modal Header -->
                                  <div class="modal-header">
                                    <h4 class="modal-title">Change Membership Plan</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  </div>

                                  <!-- Modal body -->
                                  <div class="modal-body">
                                    <form method="post" action="admin_users.php">
                                      <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
                                        <div class="form-group">
                                          <label for="sel1">Select Membership Plan:</label>
                                          <select class="form-control" id="sel1" name="membership">
                                            <?php
                                                $sql1 = "SELECT * FROM memberships";
                                                $res1 = mysqli_query($con, $sql1);
                                                while($row1 = mysqli_fetch_array($res1)){
                                            ?>
                                                <option value="<?php echo $row1['id']; ?>"><?php echo $row1["name"]; ?></option>
                                            <?php
                                                }
                                            ?>
                                          </select>
                                        </div>
                                  </div>

                                  <!-- Modal footer -->
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-success" name="update_membership">Update Membership</button>
                                  </div>
                                    </form>
                                </div>
                              </div>
                            </div>
                        <?php
                    }
                    if(isset($_POST["update_membership"])){
                      $uid = $_POST["user_id"];
                      $membership = $_POST["membership"];
                      $sql = "INSERT INTO membership_history (userID, membershipID) VALUES($uid, $membership)";
                      if(mysqli_query($con, $sql)){
                        js_alert("Membership Updated!");
                        js_redirect("./admin_users.php");
                      }
                    }
                ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Membership</th>
                <th>Actions</th>
            </tr>
        </tfoot>
    </table>
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
