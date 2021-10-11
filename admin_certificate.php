<?php
  require 'app/app.php';
    if(isset($_POST["add_new_committee"])){
        $name = $_POST["name"];
        $content = $_POST["content"];
        $sql = "INSERT INTO certificates (name,content) VALUES ('$name', '$content')";
        if(phpRunSingleQuery($sql)){
            js_alert("Certificate Added!");
            js_redirect("admin_certificate.php");
        }else{
            js_alert("ERROR");
        }
    }
    if(isset($_POST["update_committee"])){
        $committee_name = $_POST["committee_name"];
        $committee_desc = $_POST["committee_desc"];
        $commettiee_id = $_POST["commettiee_id"];
        $sql = "UPDATE certificates set name='$committee_name', content='$committee_desc' WHERE id=$commettiee_id";
        if(phpRunSingleQuery($sql)){
            js_alert("Certificate Updated!");
            js_redirect("admin_certificate.php");
        }else{
            js_alert("ERROR");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<?php
  $path =  "";
  $title =  "Certificates Management";
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
              <li class="breadcrumb-item active" aria-current="page">Committees Management</li>
          </ol>
      </nav>


    <div class="widget-content">
        <div class="row mt-3">
            <div class="col-md-3" id="customNavTabs">
                <ul class="nav nav-tabs flex-column" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="true">
                            <i class="fas fa-2x fa-user appColor mr-2"></i>
                            <span>Create Certificate</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="organization-tab" data-toggle="tab" href="#organization" role="tab" aria-controls="organization" aria-selected="false">
                            <i class="fas fa-2x fa-building appColor mr-2"></i>
                            <span>Manage Certificate</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-9">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="card">
                                    <div class="card-header">
                                        <i class="fas fa-edit mr-2"></i>Add new certificate
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" action="">
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Name</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="inputEmail3" name="name" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Content</label>
                                                <div class="col-sm-6">
<!--                                                    <input type="text" class="form-control" id="inputEmail3" name="certificate_name" required>-->
                                                    <textarea class="form-control" name="content" style="width: inherit"></textarea>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <button type="submit" class="btn btn-info w-100 mt-2 bg-appColor" name="add_new_committee">
                                                        <i class="fas fa-save"></i>
                                                        Save Certificate
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="organization" role="tabpanel" aria-labelledby="organization-tab">
                        <a class="btn btn-info mb-2 float-right mr-3" href="admin_committees.php">
                            Create New Committee
                        </a>

                        <table id="example" class="table table-striped table-bordered bg-white shadow" style="width:100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Certificate Name</th>
                                <th>Content</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            require 'app/db.php';
                            $sql = "SELECT * FROM certificates";
                            $res = mysqli_query($con, $sql);
                            while($row = mysqli_fetch_array($res)){
                                $rndom = rand();
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $row["id"]; ?>
                                    </td>
                                    <td>
                                        <a href="" class="appColor"  data-toggle="modal" data-target="#editContact_<?php echo $rndom; ?>">
                                            <?php echo $row["name"]; ?>
                                        </a>
                                    </td>
                                    <td><?php echo $row["content"]; ?></td>
                                    <td>
                                        <a href="" class="text-danger mr-1" data-toggle="modal" data-target="#editContact_<?php echo $rndom; ?>">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                                <!-- Membership Modal -->
                                <div class="modal" id="editContact_<?php echo $rndom; ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit Committee Details</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <form action="" method="POST">
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <input type="hidden" name="commettiee_id" value="<?php echo $row["id"]; ?>">
                                                    <div class="form-group row">
                                                        <label for="EmailContent" class="col-sm-3 col-form-label">Name</label>
                                                        <div class="col-sm-12">
                                                            <input class="form-control" id="EmailContent" name="committee_name" required="" value="<?php echo $row["name"]; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="EmailContent" class="col-sm-3 col-form-label">Content</label>
                                                        <div class="col-sm-12">
                                                            <textarea rows="5" class="form-control" id="EmailContent" name="committee_desc" required=""><?php echo $row["content"]; ?></textarea>
                                                        </div>
                                                    </div>


                                                </div>

                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-danger" name="update_committee">Update</button>
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
                                <th>#</th>
                                <th>Certificate Name</th>
                                <th>Content</th>
                                <th>Actions</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="administrator" role="tabpanel" aria-labelledby="administrator-tab">

                        <button class="btn btn-info mb-2 float-right mr-3"
                           data-toggle="modal" data-target="#addNewRoleModal">
                            Add New Role
                        </button>

                        <table id="example" class="table table-striped table-bordered bg-white shadow" style="width:100%">
                            <thead>
                            <tr>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            require 'app/db.php';
                            $sql = "SELECT * FROM committee_roles";
                            $res = mysqli_query($con, $sql);
                            while($row = mysqli_fetch_array($res)){
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $row["role"]; ?>
                                    </td>
                                    <td>
                                        <a href="" class="text-danger mr-1" data-toggle="modal" data-target="#delContact_<?php echo $rndom; ?>">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                                <!-- Membership Modal -->
                                <div class="modal" id="delContact_<?php echo $rndom; ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <form action="" method="POST">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Delete a Role</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <input type="hidden" value="<?php echo $row["id"]; ?>" name="contact_id">
                                                    Are you sure, you want to delete this role?
                                                </div>

                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                                                    <a  class="btn btn-danger" href="admin_committees.php?delRole=<?php echo $row["id"]; ?>">Delete</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            if(isset($_GET["delRole"])){
                                $id = $_GET["delRole"];
                                $sql = "DELETE FROM committee_roles WHERE id = $id";
                                if(mysqli_query($con, $sql)){
                                    js_alert("Role Deleted!");
                                    js_redirect("./admin_committees.php");
                                }
                            }
                            ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
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
