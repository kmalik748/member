<?php
  require 'app/app.php';

    $pageID = isset($_GET["id"]) ? $_GET["id"] : null;
    $sql = "SELECT * FROM users WHERE id = $pageID";
    $userDetails = phpMysqliFetchSingle($sql);
    $fullName = $userDetails["first_name"].' '.$userDetails["middle_name"].' '.$userDetails["last_name"];

    $orgID = $userDetails["organizationID"];
    $org = phpMysqliFetchSingle("SELECT * FROM organizations WHERE id= $orgID");
    $orgName = $org["name"];
?>
<!DOCTYPE html>
<html lang="en">

<?php
  $path =  "";
  $title =  "Edit Organization";
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
              <li class="breadcrumb-item active" aria-current="page">Edit Organization</li>
          </ol>
      </nav>


    <div class="widget-content" style="border: none; background: transparent;">
        <div class="row mt-3">
            <div class="col-md-2">
                <div class="user_profile_left_section">
                    <?php require 'admin_contactSideNav.php'; ?>
                </div>
            </div>


            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-edit mr-2"></i>Update Contact
                    </div>
                    <div class="card-body">
                        <form method="POST" action="">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Organization Name </label>
                                <div class="col-sm-6">
                                    <select class="form-control" id="exampleFormControlSelect1" name="organization" value="<?php echo $userDetails["organizationID"]; ?>" required>
                                        <?php
                                        $rows = allOrganizations();
                                        foreach ($rows as $row){
                                            echo '
                                            <option value="'.$row["id"].'"'; if($row["id"]==$orgID) echo "selected"; echo '>
                                                '.$row["name"].'
                                            </option>
                                            ';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Job Title</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="inputEmail3" name="jobTitle" value="<?php echo $userDetails["jobTitle"]; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Salutation</label>
                                <div class="col-sm-6">
                                    <select class="form-control" id="exampleFormControlSelect1" name="salutation" required>
                                        <option <?php if($userDetails["salutation"]=="Mr.") echo "selected"; ?>>Mr.</option>
                                        <option <?php if($userDetails["salutation"]=="M.") echo "selected"; ?>>M.</option>
                                        <option <?php if($userDetails["salutation"]=="Dr.") echo "selected"; ?>>Dr.</option>
                                        <option <?php if($userDetails["salutation"]=="Ms.") echo "selected"; ?>>Ms.</option>
                                        <option <?php if($userDetails["salutation"]=="Mrs.") echo "selected"; ?>>Mrs.</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">First Name</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="inputEmail3" name="first_name" value="<?php echo $userDetails["first_name"]; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Middle Name/Initial</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="inputEmail3" name="middle_name" value="<?php echo $userDetails["middle_name"]; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Last Name</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="inputEmail3" name="last_name" value="<?php echo $userDetails["last_name"]; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-6">
                                    <input type="email" class="form-control" id="inputEmail3" name="email" value="<?php echo $userDetails["email"]; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control" id="inputEmail3" name="pass" value="<?php echo $userDetails["password"]; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Birth Date</label>
                                <div class="col-sm-6">
                                    <input type="date" class="form-control" id="inputEmail3" name="dob"  value="<?php echo $userDetails["dob"]; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Phone</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="inputEmail3" name="contact_num"  value="<?php echo $userDetails["phone"]; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Address</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="inputEmail3" name="address"  value="<?php echo $userDetails["address"]; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Gender</label>
                                <div class="col-sm-6">
                                    <select class="form-control" id="exampleFormControlSelect1" name="gender"  value="<?php echo $userDetails["gender"]; ?>" required>
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
                                        <option value="English">English</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-info" name="edit_contact">
                                    <i class="fa fa-save"></i>
                                    Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <?php
            if(isset($_POST["edit_contact"])){
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


                $sql = "UPDATE users SET first_name='$first_name', middle_name='$middle_name', last_name='$last_name', email='$email',
                        password='$pass', organizationID='$organization', jobTitle='$jobTitle', salutation='$salutation', dob='$dob',
                        phone='$contact_num', gender='$gender', language='$language', address='$address' WHERE id=$pageID";

                $output = phpRunSingleQuery($sql);

                if($output == true){
                    js_alert("Contact Updated Successfully!");
                    js_redirect("admin_editContact.php?id=".$pageID);
                }else{
                    js_alert("Error! Check console for details! ");
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
