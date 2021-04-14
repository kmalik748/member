<?php
  require 'app/app.php';

    $userID = isset($_GET["userID"]) ? $_GET["userID"] : null;
    $sql = "SELECT * FROM users WHERE id = $userID";
    $userDetails = phpMysqliFetchSingle($sql);
    $fullName = $userDetails["first_name"].' '.$userDetails["middle_name"].' '.$userDetails["last_name"];

    $pageID = isset($_GET["id"]) ? $_GET["id"] : null;
    $sql = "SELECT * FROM organizations WHERE id=".$pageID;
    $organization = phpMysqliFetchSingle($sql);
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
              <li class="breadcrumb-item"><a href="admin_contact.php" class="appColor"><?php echo $fullName; ?></a></li>
              <li class="breadcrumb-item"><a href="admin_contact_showProfile.php?userID=<?php echo $userDetails["id"]; ?>" class="appColor"><?php echo $organization["name"]; ?></a></li>
              <li class="breadcrumb-item active" aria-current="page">Edit Organization</li>
          </ol>
      </nav>


    <div class="widget-content" style="border: none; background: transparent;">
        <div class="row mt-3">
            <div class="col-md-2">
                <div class="user_profile_left_section">
                    <ul class="contactViewMenu">
                        <li><i class="fas fa-building"></i><a href="admin_showOrganization.php?id=<?php echo $pageID; ?>&userID=<?php echo $userID; ?>">Organization</a></li>
                        <li><i class="fas fa-edit"></i><a href="admin_editOrganization.php?id=<?php echo $organization["id"]; ?>&userID=<?php echo $userID; ?>" class="active">Edit Organization</a></li>
                    </ul>
                </div>
            </div>


            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-building mr-2"></i>Edit Organizations
                    </div>
                    <div class="card-body">
                        <form method="POST" action="">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Organization Name </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputEmail3" name="name" value="<?php echo $organization["name"]; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Acronym</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputEmail3" name="acronym" value="<?php echo $organization["acronym"]; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Website Address</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputEmail3" name="website" value="<?php echo $organization["website"]; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="inputEmail3" name="email" value="<?php echo $organization["email"]; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Instagram Account</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputEmail3" name="insta" value="<?php echo $organization["instagram"]; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Twitter Account</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputEmail3" name="twitter" value="<?php echo $organization["twitter"]; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Facebook Account</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputEmail3" name="facebook" value="<?php echo $organization["facebook"]; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">LinkedIn Account</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputEmail3" name="linkedin" value="<?php echo $organization["linkedin"]; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Address</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputEmail3" name="address" value="<?php echo $organization["address"]; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Contact #</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputEmail3" name="phone" value="<?php echo $organization["phone"]; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Parent Organization</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="exampleFormControlSelect1" name="parentOrg">
                                        <option value="Association Plus">Association Plus</option>
                                        <option value="Demo Organization">Demo Organization</option>
                                        <option value="Organization 123">Organization 123</option>
                                        <option value="Ahmed Complex">Ahmed Complex</option>
                                        <option value="UPT Inc.">UPT Inc.</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="float-right">
                                    <button type="submit" class="btn btn-info" name="update_org">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

            <?php
            if(isset($_POST["update_org"])){
                $name = $_POST["name"];
                $acronym = $_POST["acronym"];
                $website = $_POST["website"];
                $email = $_POST["email"];
                $insta = $_POST["insta"];
                $twitter = $_POST["twitter"];
                $facebook = $_POST["facebook"];
                $linkedin = $_POST["linkedin"];
                $address = $_POST["address"];
                $phone = $_POST["phone"];
                $parentOrg = $_POST["parentOrg"];

                $sql = "UPDATE organizations SET name='$name', acronym='$acronym', website='$website', email='$email', instagram='$insta',
                        twitter='$twitter', facebook='$facebook', linkedin='$linkedin', parentOrganization='$parentOrg', address='$address',
                        phone='$phone' WHERE id=$pageID";
                $res = phpRunSingleQuery($sql);
                if($res){
                    js_alert("Details Updated Successfully!");
                    js_redirect("admin_showOrganization.php?id=".$pageID."&userID=".$userID);
                }
            }
            ?>


        </div>
    </div>

<?php
  require 'parts/footer.php';
?>


</body>

</html>
