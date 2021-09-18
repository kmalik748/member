<?php
  require 'app/app.php';
?>
<!DOCTYPE html>
<html lang="en">

<?php
  $path =  "";
  $title =  "Create Organization";
  require 'parts/head.php';
?>

<body>

  <?php require 'parts/nav.php'; ?>

  <!-- Page Content -->
  <div class="container">

      <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-white">
              <li class="breadcrumb-item"><a href="admin_dashboard.php" class="appColor">Home</a></li>
              <li class="breadcrumb-item"><a href="admin_Email.php" class="appColor">Email Campains</a></li>
              <li class="breadcrumb-item active" aria-current="page">Create Email</li>
          </ol>
      </nav>


    <div class="widget-content" style="border: none; background: transparent;">
        <div class="row mt-3">


            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-edit mr-2"></i>Create New Email Campains
                    </div>
                    <div class="card-body">
                        <form method="POST" action="">
                            <div class="form-group row">
                                <label for="CampaignName" class="col-sm-3 col-form-label">Campaign Name</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="CampaignName" name="CampaignName" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="SenderName" class="col-sm-3 col-form-label">Sender Name</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="SenderName" name="SenderName" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="SenderEmail" class="col-sm-3 col-form-label">Sender Email</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="SenderEmail" name="SenderEmail" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="EmailTitle" class="col-sm-3 col-form-label">Email Title</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="EmailTitle" name="EmailTitle" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="EmailContent" class="col-sm-3 col-form-label">Email Content</label>
                                <div class="col-sm-6">
									<textarea rows="5" class="form-control" id="EmailContent" name="EmailContent" required></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Recipient" class="col-sm-3 col-form-label">Recipient</label>
                                <div class="col-sm-6">
                                    <select class="form-control" id="Recipient" name="Recipient[]" multiple required>
                                        <option>-- Select --</option>
                                        <?php
                                        $rows = allRecipients();
                                        foreach ($rows as $row){
                                            echo '
                                            <option value="'.$row["id"].'">'.$row["email"].'</option>
                                            ';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-info" name="add_new_email">
                                    <i class="fa fa-save"></i>
                                    Next
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>



        </div>
    </div>

      <?php
        if(isset($_POST["add_new_email"])){
            $CampaignName = $_POST["CampaignName"];
            $SenderName = $_POST["SenderName"];
            $SenderEmail = $_POST["SenderEmail"];
            $EmailTitle = $_POST["EmailTitle"];
            $EmailContent = $_POST["EmailContent"];
            $Recipient = $_POST["Recipient"];

            $sql = "INSERT INTO campaign (name, sender_name, sender_email, title, content, date_time)
                    VALUES ('$CampaignName', '$SenderName', '$SenderEmail', '$EmailTitle', '$EmailContent',now())";
            $output = phpRunSingleQuery($sql);
			$last_id = $con->insert_id;
			foreach ($Recipient as $rec){
				$sql = "INSERT INTO recipient (campaignID, userID) VALUES ('$last_id', '$rec')";
				$output2 = phpRunSingleQuery($sql);
				$sql = "SELECT `email` FROM users WHERE `id` = '$rec'";
				$output3 = phpMysqliFetchSingle($sql);
				mail($output3['email'],$EmailTitle,$EmailContent,'From: ' . $SenderEmail . "\r\n");
			}

            if($output == true){
                js_alert("Email Added Successfully!");
                js_redirect("admin_createEmail.php");
            }else{
                js_alert("Error! Check console for details! ");
                js_redirect("admin_createEmail.php");
            }
        }
      ?>

<?php
  require 'parts/footer.php';
?>


</body>

</html>
