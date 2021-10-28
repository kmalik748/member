<?php
  require 'app/app.php';
    if(isset($_POST["del_contact"])){
        $id = $_POST["contact_id"];
        $sql = "DELETE FROM users WHERE id=$id";
        if(phpRunSingleQuery($sql)){
            js_alert("Contact Deleted!");
            js_redirect("admin_contact.php");
        }else{
            js_alert("ERROR");
        }
    }
    if(isset($_POST["del_org"])){
        $id = $_POST["org_id"];
        $sql = "DELETE FROM organizations WHERE id=$id";
        if(phpRunSingleQuery($sql)){
            js_alert("Organization Deleted!");
            js_redirect("admin_contact.php");
        }else{
            js_alert("ERROR");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<?php
  $path =  "";
  $title =  "Admin Permissions";
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
              <li class="breadcrumb-item active" aria-current="page">Admin Permissions</li>
          </ol>
      </nav>


    <div class="widget-content">
        <div class="row mt-3">
            <div class="col-md-12">
                <table id="example" class="table table-striped table-bordered bg-white shadow" style="width:100%">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Membership</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    require 'app/db.php';
                    $sql = "SELECT * FROM users WHERE is_admin=0";
                    //                            echo $sql;
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
                                <a href="admin_permissions_page.php?userID=<?php echo $user; ?>">
                                    <?php echo $row["first_name"]; ?>
                                </a>
                            </td>
                            <td><?php echo $membership; ?></td>
                            <td>
                                <a href="admin_permissions_page.php?userID=<?php echo $user; ?>" class="mr-1">
                                    <i class="fas fa-edit"></i> &nbsp; Update Permissions
                                </a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Membership</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                </table>
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
