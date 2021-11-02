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
  $title =  "Membership Management";
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
  <div class="d-flex justify-content-center bg-white col-lg-8 col-md-10 col-sm-12 mx-auto p-2 shadow border-radius-5">
    <form class="form-inline" action="./admin_membership.php" method="post">
      <label for="membership" class="mx-2">Add New Membership:</label>
      <input type="text" class="form-control" placeholder="Membership Name" id="membership" name="membership_name">
      <input type="number" class="form-control mx-1" placeholder="$" id="membership" name="membership_price" style="width: 110px;">
      <button type="submit" class="btn btn-success mx-2" name="add_membership">Add</button>
    </form>
    <?php
    if(isset($_POST["add_membership"])){
      $name = $_POST["membership_name"];
      $price = $_POST["membership_price"];
      $sql = "INSERT INTO memberships (name, price) VALUES ('$name', $price)";
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
                <th>Subscription</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
                <?php
                    $sql = "SELECT * FROM memberships";
                    $res = mysqli_query($con, $sql);
                    while($row = mysqli_fetch_array($res)){
                        $rand = rand();
                        ?>
                            <tr>
                                <td><?php echo $row["name"]; ?></td>
                                <td><?php echo $row["price"]; ?></td>
                                <td>
                                  <a href="./admin_membership.php?member_id=<?php echo $row["id"]; ?>">
                                    <i class="fas fa-trash-alt text-danger"></i>
                                  </a>
                                    <a class="ml-2" id="view-all-phone-log" data-toggle="modal" data-target="#editMembership_<?php echo $rand; ?>">
                                        <i class="fas fa-edit text-success"></i>
                                    </a>
                                </td>
                            </tr>

                        <!-- Modal View All Notes -->
                        <div class="modal fade" id="editMembership_<?php echo $rand; ?>" tabindex="-1" role="dialog"  aria-hidden="true">
                            <div class="modal-dialog modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Notes Log</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="POST">
                                            <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                                            <div class="form-group">
                                                <label for="email">Name:</label>
                                                <input type="text" class="form-control" placeholder="Membership Name" name="edit_name" value="<?php echo $row["name"]; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="pwd">Price:</label>
                                                <input type="number" class="form-control" placeholder="$" id="pwd" name="edit_price" value="<?php echo $row["price"]; ?>">
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <button type="submit" class="btn btn-primary w-100" name="edit_membership">Submit</button>
                                                </div>
                                                <div class="col-md-6">
                                                    <button type="button" class="btn btn-primary w-100" data-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>
                                        </form>
                                        <?php
                                            if(isset($_POST["edit_membership"])){
                                                $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                                                $id = $_POST["id"];
                                                $name = $_POST["edit_name"];
                                                $price = $_POST["edit_price"];
                                                if(phpRunSingleQuery("UPDATE memberships SET name='$name', price=$price WHERE id=$id ")){
                                                    js_alert("Membership Updated!");
                                                    js_redirect($actual_link);
                                                }
                                            }
                                        ?>
                                    </div>
                                    <div class="modal-footer">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Subscription</th>
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
