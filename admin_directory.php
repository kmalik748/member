<?php
  require 'app/app.php';
    if(isset($_GET["del"])){
        $id = $_GET["del"];
        $sql = "DELETE FROM directory WHERE id=$id";
        if(phpRunSingleQuery($sql)){
            js_alert("Directory Deleted!");
            js_redirect("admin_directory.php");
        }else{
            js_alert("ERROR");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<?php
  $path =  "";
  $title =  "Directory Management";
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
              <li class="breadcrumb-item active" aria-current="page">Directory Management</li>
          </ol>
      </nav>


    <div class="widget-content">
        <div class="row mt-3">
            <div class="col-md-3" id="customNavTabs">
                <ul class="nav nav-tabs flex-column" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="true">
                            <i class="fas fa-2x fa-user appColor mr-2"></i>
                            <span>Create Directory</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="organization-tab" data-toggle="tab" href="#organization" role="tab" aria-controls="organization" aria-selected="false">
                            <i class="fas fa-2x fa-list appColor mr-2"></i>
                            <span>List Directories</span>
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
                                        <i class="fas fa-edit mr-2"></i>Create New Directory
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" action="">
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Directory Name</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="inputEmail3" name="directory_name" required="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Membership Category</label>
                                                <div class="col-sm-6">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="Annual Membership" name="categories[]">
                                                        <label class="form-check-label" for="inlineCheckbox1">Annual Membership</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Certified Member" name="categories[]">
                                                        <label class="form-check-label" for="inlineCheckbox2">Certified Member</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="Gold Membership" name="categories[]">
                                                        <label class="form-check-label" for="inlineCheckbox3">Gold Membership</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Contact Classification</label>
                                                <div class="col-sm-6">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox11" value="Award Recipients" name="classification[]">
                                                        <label class="form-check-label" for="inlineCheckbox1">Award Recipients</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox22" value="Exhibitor" name="classification[]">
                                                        <label class="form-check-label" for="inlineCheckbox2">Exhibitor</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox33" value="Member Preferences" name="classification[]">
                                                        <label class="form-check-label" for="inlineCheckbox3">Member Preferences</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox34" value="Prospective Member" name="classification[]">
                                                        <label class="form-check-label" for="inlineCheckbox3">Prospective Member</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox35" value="Speaker" name="classification[]">
                                                        <label class="form-check-label" for="inlineCheckbox3">Speaker</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Display</label>
                                                <div class="col-sm-6">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox111" value="Public" name="display[]">
                                                        <label class="form-check-label" for="inlineCheckbox1">Public</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox222" value="Member Portal" name="display[]">
                                                        <label class="form-check-label" for="inlineCheckbox2">Member Portal</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <button type="submit" class="btn btn-info w-100 mt-2 bg-appColor" name="add_new_directory">
                                                        <i class="fas fa-save"></i>
                                                        Add Committee
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
                        <a class="btn btn-info mb-2 float-right mr-3" href="admin_directory.php">
                            Create New Directory
                        </a>

                        <table id="example" class="table table-striped table-bordered bg-white shadow" style="width:100%">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Membership Category</th>
                                <th>Contact Classification</th>
                                <th>Display</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            require 'app/db.php';
                            $sql = "SELECT * FROM directory";
                            $res = mysqli_query($con, $sql);
                            while($row = mysqli_fetch_array($res)){
                                ?>
                                <tr>
                                    <td><?php echo $row["directory_name"]; ?></td>
                                    <td><?php echo $row["categories"]; ?></td>
                                    <td><?php echo $row["classification"]; ?></td>
                                    <td><?php echo $row["display"]; ?></td>
                                    <td>
                                        <a href="admin_directory.php?del=<?php echo $row["id"]; ?>" class="text-danger mr-1">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                            }
                            if(isset($_POST["add_new_directory"])) {
                                $directory_name = $_POST['directory_name'];
                                $categories = implode(",",$_POST['categories']);
                                $classification = implode(",",$_POST['classification']);
                                $display = implode(",",$_POST['display']);
                                $sql = "INSERT INTO directory (directory_name, categories, classification, display)
                                        VALUES('$directory_name', '$categories', '$classification', '$display')";
                                if (mysqli_query($con, $sql)) {
                                    js_alert("Directory Added!");
                                    js_redirect("./admin_directory.php");
//                                }
                                }
                            }
                            ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Membership Category</th>
                                <th>Contact Classification</th>
                                <th>Display</th>
                                <th>Actions</th>
                            </tr>
                            </tfoot>
                        </table>
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
