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
  <div class="d-flex justify-content-center bg-white col-lg-6 col-md-8 col-sm-10 mx-auto p-2 shadow border-radius-5">
    <form class="form-inline" action="./admin_membership.php" method="post">
      <label for="membership" class="mx-2">Add New Membership:</label>
      <input type="text" class="form-control" placeholder="Membership Name" id="membership" name="membership_name">
      <button type="submit" class="btn btn-success mx-2" name="add_membership">Add</button>
    </form>
    <?php
    if(isset($_POST["add_membership"])){
      $name = $_POST["membership_name"];
      $sql = "INSERT INTO memberships (name) VALUES ('$name')";
      if(mysqli_query($con, $sql)){
        js_alert("New Membership Category Added!");
        js_redirect("./admin_membership.php");
      }else{
        js_alert(mysqli_error($con));
      }
    }
    if(isset($_GET["member_id"])){
      $id = $_GET["member_id"];
      $sql = "DELETE FROM memberships WHERE id = $id";
      if(mysqli_query($con, $sql)){
        js_alert("Membership category was deleted!");
        js_redirect("./admin_membership.php");
      }else{
        js_alert(mysqli_error($con));
      }
    }
    ?>
  </div>
<hr>
      <table id="example" class="table table-striped table-bordered bg-white shadow" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
                <?php
                    $sql = "SELECT * FROM memberships";
                    $res = mysqli_query($con, $sql);
                    while($row = mysqli_fetch_array($res)){
                        ?>
                            <tr>
                                <td><?php echo $row["name"]; ?></td>
                                <td>
                                  <a href="./admin_membership.php?member_id=<?php echo $row["id"]; ?>">
                                    <i class="fas fa-trash-alt text-danger"></i>
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
