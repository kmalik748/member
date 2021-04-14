<?php
  require 'app/app.php';

    $pageID = isset($_GET["id"]) ? $_GET["id"] : null;
    $sql = "SELECT * FROM users WHERE id = $pageID";
    $userDetails = phpMysqliFetchSingle($sql);
    $fullName = $userDetails["first_name"].' '.$userDetails["middle_name"].' '.$userDetails["last_name"];

    $sql = "SELECT * FROM organizations WHERE id=".$userDetails["organizationID"];
    $organization = phpMysqliFetchSingle($sql);
?>
<!DOCTYPE html>
<html lang="en">

<?php
  $path =  "";
  $title =  "Email Subscription";
  require 'parts/head.php';
?>

<body>

  <?php require 'parts/nav.php'; ?>

  <!-- Page Content -->
  <div class="container">

      <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-white">
              <li class="breadcrumb-item"><a href="admin_dashboard.php" class="appColor">Home</a></li>
              <li class="breadcrumb-item"><a href="admin_contact_showProfile.php?userID=9" class="appColor"><?php echo $fullName; ?></a></li>
              <li class="breadcrumb-item active" aria-current="page">Email Subscription</li>
          </ol>
      </nav>


    <div class="widget-content" style="border: none; background: transparent;">
        <div class="row mt-3">
            <div class="col-md-2">
                <div class="user_profile_left_section">
                    <?php require 'admin_contactSideNav.php'; ?>
                </div>
            </div>


            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-envelope mr-2"></i>Set Email Preferences
                    </div>
                    <div class="card-body">
                        <div align="center">
                            <h3 style="font-family: system-ui;" >Available Subscriptions</h3>
                            <p >You may subscribe to these available subscriptions by selecting
                                from the following list and clicking the "Update Email Settings" button.</p>
                            <div style="max-width: 300px; text-align: left;">
                                <form method="POST" action="">
                                    <?php
                                        $emailSettings = phpMysqliFetchSingle("SELECT * FROM email_settings WHERE user_id=$pageID ORDER BY id DESC LIMIT 1");
//                                        print_r($emailSettings);
                                    ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="defaultCheck1" name="general"
                                            <?php if($emailSettings["general"]=="on") echo "checked"; ?>>
                                        <label class="form-check-label" for="defaultCheck1">
                                            General Updates
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="defaultCheck1" name="job"
                                            <?php if($emailSettings["job"]=="on") echo "checked"; ?>>
                                        <label class="form-check-label" for="defaultCheck1">
                                            Job Posting Alerts
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="defaultCheck1" name="review"
                                            <?php if($emailSettings["review"]=="on") echo "checked"; ?>>
                                        <label class="form-check-label" for="defaultCheck1">
                                            Year in Review
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="defaultCheck1" name="data"
                                            <?php if($emailSettings["data"]=="on") echo "checked"; ?>>
                                        <label class="form-check-label" for="defaultCheck1">
                                            Data Management Express
                                        </label>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-2" name="email_settings">Update email settings</button>
                                </form>
                                <?php
                                if(isset($_POST["email_settings"])){
                                    $general = $_POST["general"];
                                    $job = $_POST["job"];
                                    $review = $_POST["review"];
                                    $data = $_POST["data"];

                                    $sql = "INSERT INTO email_settings (user_id, general, job, review, data) VALUES 
                                            ($pageID, '$general', '$job', '$review', '$data')";
                                    if(phpRunSingleQuery($sql)){
                                        js_alert('Email Settings Updated!');
                                        js_redirect('admin_emailSubscription.php?id='.$pageID);
                                    }else{
                                        js_alert('ERROR! Check Console');
                                    }
                                }
                                ?>
                            </div>
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
