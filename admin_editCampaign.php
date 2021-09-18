<?php
  require 'app/app.php';

    $pageID = isset($_GET["id"]) ? $_GET["id"] : null;
    $sql = "SELECT * FROM campaign WHERE id = $pageID";
    $userDetails = phpMysqliFetchSingle($sql);

    $org = phpMysqliFetchSingle("SELECT * FROM recipient WHERE campaignID= '$pageID'");
    $orgName = $org["userID"];
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
              <li class="breadcrumb-item"><a href="admin_campaign.php" class="appColor">Email Campaigns</a></li>
              <li class="breadcrumb-item active" aria-current="page">Edit Campaign</li>
          </ol>+
      </nav>


    <div class="widget-content" style="border: none; background: transparent;">
        <div class="row mt-3">
            <div class="col-md-1">
                <div class="user_profile_left_section">
                    <?php //require 'admin_contactSideNav.php'; ?>
                </div>
            </div>


            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-edit mr-2"></i>Update Campaign
                    </div>
                    <div class="card-body">
                        <form method="POST" action="">
                            <div class="form-group row">
                                <label for="CampaignName" class="col-sm-3 col-form-label">Campaign Name</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="CampaignName" name="CampaignName" value="<?php echo $userDetails["name"]; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="SenderName" class="col-sm-3 col-form-label">Sender Name</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="SenderName" name="SenderName" value="<?php echo $userDetails["sender_name"]; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="SenderEmail" class="col-sm-3 col-form-label">Sender Email</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="SenderEmail" name="SenderEmail" value="<?php echo $userDetails["sender_email"]; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="EmailTitle" class="col-sm-3 col-form-label">Email Title</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="EmailTitle" name="EmailTitle" value="<?php echo $userDetails["title"]; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="EmailContent" class="col-sm-3 col-form-label">Email Content</label>
                                <div class="col-sm-6">
									<textarea rows="5" class="form-control" id="EmailContent" name="EmailContent" required><?php echo $userDetails["content"]; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Recipient" class="col-sm-3 col-form-label">Recipient</label>
                                <div class="col-sm-6">
                                    <select class="form-control" id="Recipient" name="Recipient[]" multiple required>
                                        <option>-- Select --</option>
                                        <?php
                                        $rows = allRecipients();
										$recipient = array();
										$recipient1 = "SELECT * FROM `recipient` WHERE `campaignID`= '$pageID'";
										$recipient2 = mysqli_query($con,$recipient1);
										if(mysqli_num_rows($recipient2)>0){
											while($recipient3=mysqli_fetch_assoc($recipient2)){
												$recipient[] = $recipient3['userID'];
											}
										}
                                        foreach ($rows as $row){
											$orgName = $org["userID"];
                                            echo '<option value="'.$row["id"].'"'; 
											if(in_array($row["id"],$recipient)){echo "selected"; }
											echo '>'.$row["email"].'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-info" name="edit_campaign">
                                    <i class="fa fa-save"></i>
                                    Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <?php
            if(isset($_POST["edit_campaign"])){
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
                $output = phpRunSingleQuery($sql);
				foreach ($Recipient as $rec){
					$sql = "INSERT INTO recipient (campaignID, userID) VALUES ('$last_id', '$rec')";
					$output2 = phpRunSingleQuery($sql);
					$sql = "SELECT `email` FROM users WHERE `id` = '$rec'";
					$output3 = phpMysqliFetchSingle($sql);
					mail($output3['email'],$EmailTitle,$EmailContent,'From: ' . $SenderEmail . "\r\n");
				}

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



<?php
  require 'parts/footer.php';
?>


</body>

</html>
