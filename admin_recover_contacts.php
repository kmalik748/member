<?php
  require 'app/app.php';
    if(isset($_GET["recover"])){
        $id = $_GET["recover"];
        $sql = "UPDATE users set deleted=0, del_date=NULL WHERE id=$id";
        if(phpRunSingleQuery($sql)){
            js_alert("Contact was restored!");
            js_redirect("admin_recover_contacts.php");
        }else{
            js_alert("ERROR");
        }
    }
    if(isset($_GET["del"])){
        $id = $_GET["del"];
        $sql = "DELETE FROM users WHERE id=$id";
        if(phpRunSingleQuery($sql)){
            js_alert("Contact was deleted!");
            js_redirect("admin_recover_contacts.php");
        }else{
            js_alert("ERROR");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<?php
  $path =  "";
  $title =  "Deleted Contacts";
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
              <li class="breadcrumb-item active" aria-current="page">Deleted Contacts</li>
          </ol>
      </nav>


    <div class="widget-content">
        <div class="row mt-3 p-3">
            <div class="col-md-12">
                <table id="example" class="table table-striped table-bordered bg-white shadow" style="width:100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Deleted Date</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    require 'app/db.php';
                    $sql = "SELECT * FROM users WHERE deleted=1";
                    $res = mysqli_query($con, $sql);
                    while($row = mysqli_fetch_array($res)){
                        ?>
                        <tr>
                            <td>
                                <?php echo $row["id"]; ?>
                            </td>
                            <td>
                                <?php echo $row["first_name"]; ?>
                            </td>
                            <td>
                                <?php echo $row["del_date"]; ?>
                            </td>
                            <td>
                                <a href="admin_recover_contacts.php?recover=<?php echo $row["id"]; ?>" class="btn bg-appColor text-white mr-1">
                                    <i class="fas fa-history"></i>
                                    Recover Contact
                                </a>
                                <a href="admin_recover_contacts.php?del=<?php echo $row["id"]; ?>" class="btn btn-danger mr-1">
                                    <i class="fas fa-trash"></i>
                                    Permanent Delete
                                </a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Deleted Date</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

      <!-- Add new category -->
      <div class="modal" id="addNewRoleModal">
          <div class="modal-dialog">
              <div class="modal-content">

                  <form action="" method="POST">
                      <div class="modal-header">
                          <h4 class="modal-title">Add New Role</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>

                      <!-- Modal body -->
                      <div class="modal-body">
                          <div class="form-group">
                              <label for="exampleInputPassword1">Role Name</label>
                              <input type="text" class="form-control" name="role" placeholder="New Role Name">
                          </div>
                      </div>

                      <!-- Modal footer -->
                      <div class="modal-footer">
                          <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                          <button class="btn btn-danger" type="submit" name="add_newRole">Add</button>
                      </div>
                  </form>
                  <?php
                  if(isset($_POST["add_newRole"])){
                      $name = $_POST["role"];
                      $sql = "INSERT INTO committee_roles (role) VALUES ('$name')";
                      if(mysqli_query($con, $sql)){
                          js_alert("Role was added!");
                          js_redirect("./admin_committees.php");
                      }
                  }
                  ?>
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
