<?php
  require 'app/app.php';
    if(isset($_POST["add_job"])){
        $title = $_POST["name"];
        $company_name = $_POST["company_name"];
        $description = $_POST["description"];
        $city = $_POST["city"];
        $cat = $_POST["cat"];
        $type = $_POST["type"];
        $range = $_POST["range"];
        $sql = "INSERT INTO jobs (title, company, description, city, cat, type, slry_range) VALUES ('$title', '$company_name', '$description', '$city', '$cat', '$type',
                                  '$range')";
        if(phpRunSingleQuery($sql)){
            js_alert("Job was Added!");
            js_redirect("admin_jobs.php");
        }else{
            js_alert("ERROR");
        }
    }
    if(isset($_POST["update_committee"])){
        $course_name = $_POST["course_name"];
        $course_content = $_POST["course_content"];
        $course_msg = $_POST["course_msg"];
        $course_id = $_POST["course_id"];
        $sql = "UPDATE lms set name='$course_name', content='$course_content', message='$course_msg' WHERE id=$course_id";
        if(phpRunSingleQuery($sql)){
            js_alert("Course Updated!");
            js_redirect("admin_lms.php");
        }else{
            js_alert("ERROR");
        }
    }
    if(isset($_GET["switch"])){
        $visible = $_GET["switch"];
        $id = $_GET["id"];
        $sql = "UPDATE lms set visible=$visible WHERE id=$id";
        if(phpRunSingleQuery($sql)){
            js_alert("Settings Updated!");
            js_redirect("admin_lms.php");
        }else{
            js_alert("ERROR");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<?php
  $path =  "";
  $title =  "Jobs";
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
              <li class="breadcrumb-item active" aria-current="page">Jobs</li>
          </ol>
      </nav>


    <div class="widget-content">
        <div class="row mt-3">
            <div class="col-md-3" id="customNavTabs">
                <ul class="nav nav-tabs flex-column" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="true">
                            <i class="fas fa-2x fa-book appColor mr-2"></i>
                            <span>Create a Job</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="organization-tab" data-toggle="tab" href="#organization" role="tab" aria-controls="organization" aria-selected="false">
                            <i class="fas fa-2x fa-tasks appColor mr-2"></i>
                            <span>Manage Jobs</span>
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
                                        <i class="fas fa-edit mr-2"></i>Open a new Job
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" action="">
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Job Title</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="inputEmail3" name="name" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Company Name</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="inputEmail3" name="company_name" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Campaign Description</label>
                                                <div class="col-sm-6">
                                                    <textarea class="form-control" name="description" style="width: inherit"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">City</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="inputEmail3" name="city" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Job Category:</label>
                                                <div class="col-sm-6">
                                                    <select class="form-control" id="exampleFormControlSelect1" name="cat">
                                                        <option>Select a Job Category</option>
                                                        <option value="Science">Science</option>
                                                        <option value="Management">Management</option>
                                                        <option value="Executive">Executive</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Job Type:</label>
                                                <div class="col-sm-6">
                                                    <select class="form-control" id="exampleFormControlSelect1" name="type">
                                                        <option>Select a Job Type</option>
                                                        <option value="Contract">Contract</option>
                                                        <option value="Full-Time">Full-Time</option>
                                                        <option value="Part-time">Part-time</option>
                                                        <option value="Contract">Contract</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Salary Range</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="inputEmail3" name="range" required placeholder="100-500">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <button type="submit" class="btn btn-info w-100 mt-2 bg-appColor" name="add_job">
                                                        <i class="fas fa-save"></i>
                                                        Post Job
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
                        <a class="btn btn-info mb-2 float-right mr-3" href="admin_lms.php">
                            Create New Course
                        </a>

                        <table id="example" class="table table-striped table-bordered bg-white shadow" style="width:100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>City</th>
                                <th>Category</th>
                                <th>Type</th>
                                <th>Range</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            require 'app/db.php';
                            $sql = "SELECT * FROM jobs";
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
                                            <?php echo $row["title"]; ?>
                                        </a>
                                    </td>
                                    <?php echo $row["company"]; ?>
                                    </td>
                                    <td><?php echo strlen($row["description"]) >= 500 ?
                                            substr($row["description"], 0, 490) . ' <a data-toggle="modal" data-target="#editContact_<?php echo $rndom; ?>">[Read more]</a>' :
                                            $row["description"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $row["city"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $row["cat"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $row["type"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $row["slry_range"]; ?>
                                    </td>
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
                                                <h4 class="modal-title">Edit Job Details</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <form action="" method="POST">
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                                                    <div class="form-group row">
                                                        <label for="EmailContent" class="col-sm-3 col-form-label">Title</label>
                                                        <div class="col-sm-12">
                                                            <input class="form-control" name="title" required="" value="<?php echo $row["title"]; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="EmailContent" class="col-sm-3 col-form-label">Company</label>
                                                        <div class="col-sm-12">
                                                            <input class="form-control" name="company" required="" value="<?php echo $row["company"]; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="EmailContent" class="col-sm-12 col-form-label">Details</label>
                                                        <div class="col-sm-12">
                                                            <textarea rows="5" class="form-control" name="description" required=""><?php echo $row["description"]; ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="EmailContent" class="col-sm-12 col-form-label">City</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" name="city" required="" value="<?php echo $row["city"]; ?>">
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-danger" name="update">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            if(isset($_POST["update"])){
                                $id = $_POST["id"];
                                $title = $_POST["title"];
                                $company = $_POST["company"];
                                $description = $_POST["description"];
                                $city = $_POST["city"];

                                $sql = "UPDATE jobs SET title='$title', description='$description', company='$company_name', city='$city' WHERE id = $id";
                                if(mysqli_query($con, $sql)){
                                    js_alert("Job Updated!");
                                    js_redirect("./admin_jobs.php");
                                }else{
                                    js_alert(mysqli_error($con));
                                }
                            }
                            ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>City</th>
                                <th>Category</th>
                                <th>Type</th>
                                <th>Range</th>
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
