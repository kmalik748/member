<?php
  require 'app/app.php';
    $pageID = isset($_GET["id"]) ? $_GET["id"] : null;
    $userID = isset($_GET["userID"]) ? $_GET["userID"] : null;

    $sql = "SELECT * FROM users WHERE id = $userID";
    $userDetails = phpMysqliFetchSingle($sql);
    $fullName = $userDetails["first_name"].' '.$userDetails["middle_name"].' '.$userDetails["last_name"];

    $sql = "SELECT * FROM organizations WHERE id=".$pageID;
    $organization = phpMysqliFetchSingle($sql);
?>
<!DOCTYPE html>
<html lang="en">

<?php
  $path =  "";
  $title =  "Organization Management";
  require 'parts/head.php';
?>

<body>

  <?php require 'parts/nav.php'; ?>

  <!-- Page Content -->
  <div class="container">

      <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-white">
              <li class="breadcrumb-item"><a href="admin_dashboard.php" class="appColor">Home</a></li>
              <li class="breadcrumb-item"><a href="admin_contact_showProfile.php?userID=<?php echo $userID ?>" class="appColor"><?php echo $fullName; ?></a></li>
              <li class="breadcrumb-item active" aria-current="page">Organization</li>
          </ol>
      </nav>


    <div class="widget-content" style="border: none; background: transparent;">
        <div class="row mt-3">
            <div class="col-md-2">
                <div class="user_profile_left_section">
                    <ul class="contactViewMenu">
                        <li><i class="fas fa-building"></i><a href="admin_showOrganization.php?id=<?php echo $organization["id"]; ?>&userID=<?php echo $userID; ?>" class="active">Organization</a></li>
                        <li><i class="fas fa-edit"></i><a href="admin_editOrganization.php?id=<?php echo $organization["id"]; ?>&userID=<?php echo $userID; ?>">Edit Organization</a></li>
                    </ul>
                </div>
            </div>


            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-building mr-2"></i>Organization
                    </div>
                    <div class="card-body">

                        <ul class="nav nav-tabs" id="secondNavTabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="#organization" data-toggle="tab"><?php echo $organization["name"]; ?></a>
                            </li>
                        </ul>
                        <div class="tab-content">

                            <div class="tab-pane active" id="organization">
                                <div>
                                    <p>
                                        <b>Address:</b>
                                        <span>
                                        <?php echo $organization["address"]; ?>
                                        </span>
                                    </p>
                                    <p>
                                        <b>Phone:</b>
                                        <span>
                                        <?php echo $organization["phone"]; ?>
                                        </span>
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <br>

                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-globe mr-2"></i>Social Media Links
                    </div>
                    <div class="card-body">
                        <p>
                            <i class="fab fa-twitter-square mr-2"></i><a href="<?php echo $organization["twitter"]; ?>"><?php echo $organization["twitter"]; ?></a>
                        </p>
                        <p>
                            <i class="fab fa-facebook-square mr-2"></i><a href="<?php echo $organization["facebook"]; ?>"><?php echo $organization["facebook"]; ?></a>
                        </p>
                        <p>
                            <i class="fab fa-linkedin mr-2"></i><a href="<?php echo $organization["linkedin"]; ?>"><?php echo $organization["linkedin"]; ?></a>
                        </p>
                    </div>
                </div>
            </div>



        </div>
    </div>

<?php
  require 'parts/footer.php';
?>


</body>

</html>
