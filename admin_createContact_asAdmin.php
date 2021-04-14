<?php
  require 'app/app.php';
?>
<!DOCTYPE html>
<html lang="en">

<?php
  $path =  "";
  $title =  "Create Administrator";
  require 'parts/head.php';
?>

<body>

  <?php require 'parts/nav.php'; ?>

  <!-- Page Content -->
  <div class="container">

      <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-white">
              <li class="breadcrumb-item"><a href="admin_dashboard.php" class="appColor">Home</a></li>
              <li class="breadcrumb-item"><a href="admin_contact.php" class="appColor">Contacts</a></li>
              <li class="breadcrumb-item active" aria-current="page">Create Administrator</li>
          </ol>
      </nav>


    <div class="widget-content" style="border: none; background: transparent;">
        <div class="row mt-3">


            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-edit mr-2"></i>Create Administrator
                    </div>
                    <div class="card-body">
                        <form method="POST" action="">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Organization Name </label>
                                <div class="col-sm-6">
                                    <select class="form-control" id="exampleFormControlSelect1" name="organization" required>
                                        <option>-- Select Organization --</option>
                                        <?php
                                        $rows = allOrganizations();
                                        foreach ($rows as $row){
                                            echo '
                                            <option value="'.$row["id"].'">'.$row["name"].'</option>
                                            ';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addOrganization">
                                        Add Organization
                                    </button>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Job Title</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="inputEmail3" name="jobTitle" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Salutation</label>
                                <div class="col-sm-6">
                                    <select class="form-control" id="exampleFormControlSelect1" name="salutation" required>
                                        <option>-- Select --</option>
                                        <option>Mr.</option>
                                        <option>M.</option>
                                        <option>Dr.</option>
                                        <option>Ms.</option>
                                        <option>Mrs.</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">First Name</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="inputEmail3" name="first_name" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Middle Name/Initial</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="inputEmail3" name="middle_name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Last Name</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="inputEmail3" name="last_name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-6">
                                    <input type="email" class="form-control" id="inputEmail3" name="email" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control" id="inputEmail3" name="pass" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Birth Date</label>
                                <div class="col-sm-6">
                                    <input type="date" class="form-control" id="inputEmail3" name="dob" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Phone</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="inputEmail3" name="contact_num" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Address</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="inputEmail3" name="address" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Gender</label>
                                <div class="col-sm-6">
                                    <select class="form-control" id="exampleFormControlSelect1" name="gender" required>
                                        <option>-- Select Gender --</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                        <option value="Rather Not Say">Rather Not Say</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Language</label>
                                <div class="col-sm-6">
                                    <select class="form-control" id="exampleFormControlSelect1" name="language" required>
                                        <option>-- Select Language --</option>
                                        <option value="English">English</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-info" name="add_new_contact">
                                    <i class="fa fa-save"></i>
                                    Add
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <?php
            if(isset($_POST["add_new_contact"])){
                $organization = $_POST["organization"];
                $jobTitle = $_POST["jobTitle"];
                $salutation = $_POST["salutation"];
                $first_name = $_POST["first_name"];
                $middle_name = $_POST["middle_name"];
                $last_name = $_POST["last_name"];
                $dob = $_POST["dob"];
                $contact_num = $_POST["contact_num"];
                $gender = $_POST["gender"];
                $language = $_POST["language"];
                $email = $_POST["email"];
                $pass = $_POST["pass"];
                $address = $_POST["address"];

                $sql = "INSERT INTO users (first_name, middle_name, last_name, email, password, organizationID,
                   jobTitle, salutation, dob, phone, gender, language, is_admin, address)
                    VALUES ('$first_name', '$middle_name', '$last_name', '$email', '$pass', '$organization',
                            '$jobTitle', '$salutation', '$dob', '$contact_num', '$gender', '$last_name', 1, '$address')";
                $output = phpRunSingleQuery($sql);

                if($output == true){
                    js_alert("Admin Added Successfully!");
                    js_redirect("admin_createContact.php");
                }else{
                    js_alert("Error! Check console for details! ");
                    js_redirect("admin_createContact.php");
                }
            }
            ?>


        </div>
    </div>


      <!-- Modal -->
      <div class="modal fade" id="addOrganization" tabindex="-1" role="dialog" aria-labelledby="addOrganization" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Add Organization</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <form>
                          <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Name</label>
                              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="New Organization Name">
                          </div>
                          <hr>
                          <div align="right">
                              <button type="submit" class="btn btn-info">
                                  <i class="mr-2 fas fa-save"></i>Add
                              </button>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>

<?php
  require 'parts/footer.php';
?>


</body>

</html>
