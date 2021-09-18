<?php
  require 'app/app.php';

    $pageID = isset($_GET["id"]) ? $_GET["id"] : null;
    $sql = "SELECT * FROM event WHERE id = $pageID";
    $userDetails = phpMysqliFetchSingle($sql);

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
              <li class="breadcrumb-item"><a href="admin_event.php" class="appColor">Event Management</a></li>
              <li class="breadcrumb-item active" aria-current="page">Edit Event</li>
          </ol>
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
                        <i class="fas fa-edit mr-2"></i>Update Event
                    </div>
                    <div class="card-body">
                        <form method="POST" action="">
                            <div class="form-group row">
                                <label for="Catagory" class="col-sm-3 col-form-label">Catagory</label>
                                <div class="col-sm-6">
                                    <select class="form-control" id="Catagory" name="Catagory" required>
                                        <option>-- Select --</option>
                                        <?php
                                        $rows = allCatagories();
                                        foreach ($rows as $row){
											$catagory = $userDetails["catagory"];
                                            echo '<option value="'.$row["id"].'"'; 
											if($row["id"] == $catagory){echo "selected"; }
											echo '>'.$row["name"].'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Name" class="col-sm-3 col-form-label">Event Name</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="Name" name="Name" value="<?php echo $userDetails["name"]; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Badge" class="col-sm-3 col-form-label">As Appears on Badge</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="Badge" name="Badge" value="<?php echo $userDetails["badge"]; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Description" class="col-sm-3 col-form-label">Description</label>
                                <div class="col-sm-6">
									<textarea rows="5" class="form-control" id="Description" name="Description" required><?php echo $userDetails["description"]; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Logo" class="col-sm-3 col-form-label">Event Logo</label>
                                <div class="col-sm-6">
                                    <input type="file" class="form-control" id="Logo" name="Logo">
									<?php
										if($userDetails['logo']==''){}else{echo "<img src='uploads/".$userDetails['logo']."' height=50 >";}
									?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Banner" class="col-sm-3 col-form-label">Event Banner</label>
                                <div class="col-sm-6">
                                    <input type="file" class="form-control" id="Banner" name="Banner">
									<?php
										if($userDetails['banner']==''){}else{echo "<img src='uploads/".$userDetails['banner']."' height=50 >";}
									?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Start" class="col-sm-3 col-form-label">Start Date</label>
                                <div class="col-sm-6">
                                    <input type="date" class="form-control" id="Start" name="Start" value="<?php echo date('Y-m-d',strtotime($userDetails["start-date"])); ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="End" class="col-sm-3 col-form-label">End Date</label>
                                <div class="col-sm-6">
                                    <input type="date" class="form-control" id="End" name="End" value="<?php echo date('Y-m-d',strtotime($userDetails["end-date"])); ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Address1" class="col-sm-3 col-form-label">Address 1</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="Address1" name="Address1" value="<?php echo $userDetails["address1"]; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Address2" class="col-sm-3 col-form-label">Address 2</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="Address2" name="Address2" value="<?php echo $userDetails["address2"]; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="City" class="col-sm-3 col-form-label">City</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="City" name="City" value="<?php echo $userDetails["city"]; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Country" class="col-sm-3 col-form-label">Country</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="Country" name="Country" value="<?php echo $userDetails["country"]; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Region" class="col-sm-3 col-form-label">Region</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="Region" name="Region" value="<?php echo $userDetails["region"]; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="PostalCode" class="col-sm-3 col-form-label">Postal Code</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="PostalCode" name="PostalCode" value="<?php echo $userDetails["code"]; ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-info" name="edit_event">
                                    <i class="fa fa-save"></i>
                                    Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <?php
            if(isset($_POST["edit_event"])){
				$Catagory = $_POST["Catagory"];
				$Name = $_POST["Name"];
				$Badge = $_POST["Badge"];
				$Description = $_POST["Description"];
				$Start = $_POST["Start"];
				$End = $_POST["End"];
				$Address1 = $_POST["Address1"];
				$Address2 = $_POST["Address2"];
				$City = $_POST["City"];
				$Country = $_POST["Country"];
				$Region = $_POST["Region"];
				$PostalCode = $_POST["PostalCode"];
				if($_FILES['Logo']['name']!=''){
					echo 'Hello';
					$ImgName=$_FILES['Logo']['name'];
					$Ext=pathinfo($ImgName,PATHINFO_EXTENSION);
					$Logo='el'.$pageID.".".$Ext;

					$dir="uploads/".$Logo;
					move_uploaded_file($_FILES['Logo']['tmp_name'],$dir);
				}else{$Logo=$userDetails["logo"];}
				if($_FILES['Banner']['name']!=''){
					$ImgName=$_FILES['Banner']['name'];
					$Ext=pathinfo($ImgName,PATHINFO_EXTENSION);
					$Banner='eb'.$pageID.".".$Ext;

					$dir="uploads/".$Banner;
					move_uploaded_file($_FILES['Banner']['tmp_name'],$dir);
				}else{$Banner=$userDetails["banner"];}
				

				$sql = "UPDATE `event` SET `catagory`='$Catagory',`name`='$Name',`badge`='$Badge',`description`='$Description',`logo`='$Logo',`banner`='$Banner',`start_date`='$Start',`end_date`='$End',`address1`='$Address1',`address2`='$Address2',`city`='$City',`country`='$Country',`region`='$Region',`code`='$PostalCode',`date_time`='now()' WHERE id = '$pageID'";
				
				$output = phpRunSingleQuery($sql);

                if($output == true){
                    js_alert("Contact Updated Successfully!");
                    js_redirect("admin_editEvent.php?id=".$pageID);
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
