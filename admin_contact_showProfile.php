<?php

require 'app/app.php';

if(isset($_POST["resetPass"])){
    $id = $_POST["id"];
    $password = $_POST["password"];
    $s = "UPDATE users SET password='$password' WHERE id=$id";
    if(phpRunSingleQuery($s)){
        js_alert("Password Updated Successfully");
        js_redirect("admin_contact_showProfile.php?userID=$id");
    }
}

  $pageID = isset($_GET["userID"]) ? $_GET["userID"] : null;


  $sql = "SELECT * FROM users WHERE id = $pageID";
  $userDetails = phpMysqliFetchSingle($sql);

  $sql = "SELECT * FROM organizations WHERE id=".$userDetails["organizationID"];
  $organization = phpMysqliFetchSingle($sql);

  $fullName = $userDetails["first_name"].' '.$userDetails["middle_name"].' '.$userDetails["last_name"];
?>
<!DOCTYPE html>
<html lang="en">

<?php
  $path =  "";
  $title =  "Contact Management";
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
              <li class="breadcrumb-item"><a href="admin_contact.php" class="appColor">Contacts</a></li>
              <li class="breadcrumb-item active" aria-current="page"><?php echo $fullName; ?></li>
          </ol>
      </nav>


    <div class="widget-content" style="border: none; background: transparent;">
        <div class="row mt-3">
            <div class="col-md-2">
                <div class="user_profile_left_section">
                    <?php require 'admin_contactSideNav.php'; ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="col-md-12">



                    <div class="widget">
                        <div class="widget-content ">

                            <div class="row">

                                <div class="col-sm-3">
                                    <div class="contactPortrait">
                                        <form action="" method="post" accept-charset="utf-8" id="frmCurrentForm">
                                            <input type="hidden" name="displayImage" id="displayImage" value="woman5eebdb2b3ff40.jpg">
                                            <input type="hidden" name="pageView" id="pageView" value="">
                                            <div id="imageContainer" style="width:100% !important;">
                                                <img src="img/user.jpg" alt="" id="img_displayImage">
                                                <div class="contenthover">
                                                    <a href="javascript:" id="btnUploadPhotos" data-toggle="modal" data-target="#modal_logo_upload"><i class="fas fa-upload"></i></a>
                                                    <a onclick="removeDP()" id="btnDeletePhotos"><i class="fas fa-trash"></i></a>
                                                </div>
                                            </div>
                                            <script>
                                                function removeDP(){
                                                    confirm("Do you want to delete this file?");
                                                }
                                            </script>


                                            <div id="modal_logo_upload" class="modal fade in" tabindex="-1">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Upload File</h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Use the following form to upload a new file:</p>

                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">File:</label>
                                                                <div class="col-md-9">
                                                                    <span id="fileInputDiv_File"><input type="file" id="file_displayImage" name="file_displayImage"></span>
                                                                    <div style="width: 120px; background-image: url(/assets/images/progressbar.gif); border-radius: 5px; display: none;" id="FileUploadProgress_File">&nbsp;</div>
                                                                    <input type="hidden" name="fileField" id="fileField" value="file_displayImage">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <span id="lyr_statusFile" style="color: red;"></span>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-remove"></i>Cancel</button>
                                                            <button type="button" class="btn btn-primary" id="btnUpload_File"><i class="icon-upload"></i>Upload</button>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->




                                            <!--
                                                    <div id="modal_logo_upload_OLD" class="modal-medium hide fade in" style="display: none; ">
                                                        <div class="modal-header">
                                                            <a class="close" data-dismiss="modal"><i class="icon-remove"></i></a>
                                                            <h3>Upload File</h3>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Use the following form to upload a new file:</p>
                                                            <p>File:</p>
                                                                    <span id="fileInputDiv_File"><input type="file" name="file_displayImage" id="file_displayImage" /></span>
                                                                    <input type="hidden" name="fileField" id="fileField" value="file_displayImage">
                                                                    <div id="FileUploadProgress_File" style="display: none;">&nbsp;</div>
                                                                    <span id="lyr_statusFile" style="color: red;"></span>
                                                        </div><!-- .modal-body
                                                        <div class="modal-footer">
                                                            <button class="btn btn-medium" data-dismiss="modal">Close</button> &nbsp;
                                                            <button class="btn btn-primary" id="btnUpload_File">Upload</button>
                                                        </div>

                                                    </div>

                                                    -->
                                        </form>

                                    </div>
                                </div>

                                <div class="col-sm-9">

                                    <h1 class="contactName">
                                        <?php echo $fullName; ?>
                                    </h1>
                                    <p>
                                        <span id="orgName-container"><?php echo $organization["name"]; ?></span><br>
                                        <a href="#emailContact" data-toggle="modal"><?php echo $userDetails["email"]; ?></a><br>
                                        Member #:
                                            <span id="member-number-text"><?php echo $userDetails["id"]; ?></span>
                                            <br>

                                        Phone:
                                        <?php echo $userDetails["phone"]; ?>
                                        <br>
                                        Language: English<br>
                                    </p>
                                </div>
                            </div>

                            <div>


                                <!-- <p>
                <a href="mailto:{emailAddress1}">justine@member365.com</a>

                                                                                    </p>-->
                                <!-- if tabs are enabled, addresses will be shown in tabbed panes instead of a list view -->
<!--                                <ul class="nav nav-tabs">-->
<!--                                    <li class="active"><a href="#tab_0" data-toggle="tab">-->
<!--                                            Business</a></li>-->
<!--                                    <li><a href="#tab_1" data-toggle="tab">-->
<!--                                            Organization</a></li>-->
<!--                                </ul>-->

                                <ul class="nav nav-tabs" id="secondNavTabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#tab_0">Business</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#tab_1">Organization</a>
                                    </li>
                                </ul>


                                <div class="tab-content">
                                    <div class="tab-pane active " id="tab_0">
                                        <p>
                                            <b>Address:</b>
                                            <span>
                                        <?php echo $userDetails["address"]; ?>
                                        </span>
                                        </p>
                                        <p>
                                            <b>Phone:</b>
                                            <span>
                                        <?php echo $userDetails["phone"]; ?>
                                        </span>
                                        </p>
                                    </div>
                                    <div class="tab-pane " id="tab_1">
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

                    <div class="card">
                        <div class="card-header">Communication &amp; File Log</div>
                        <div class="card-body">

                            <ul class="nav nav-tabs" id="secondNavTabs">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#log-telephone" data-toggle="tab">Calls</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#log-email" data-toggle="tab">Emails</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#log-fax" data-grid-trigger="datagrid_faxlog" data-toggle="tab">Faxes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#log-notes" data-toggle="tab">Notes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#log-file" data-grid-trigger="datagrid_filelog" data-toggle="tab">Files</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#inquiries" data-grid-trigger="datagrid_inquiries" data-toggle="tab">Inquires</a>
                                </li>
                            </ul>
                            <div class="tab-content">

                                <div class="tab-pane active" id="log-telephone">
                                    <div id="telephone-log-form-container" class="form-horizontal">
                                        <form action="" method="POST">
                                            <div class="form-group top-bottom-margins">
                                                <label for="telephone-call-date" class="control-label col-md-3">
                                                    Call Date
                                                </label>
                                                <div class="col-md-7">
                                                    <input name="telephone-call-date" class="form-control" type="date" required>
                                                </div>
                                            </div>

                                            <div class="form-group top-bottom-margins">
                                                <label for="phoneLogOutcomeOptions" class="control-label col-md-3">
                                                    Outcome
                                                </label>
                                                <div class="col-md-7">
                                                    <select id="phoneLogOutcomeOptions" class="form-control" name="phoneLogOutcomeOptions" required>
                                                        <option id="telephone-call-log-option-1" value="Membership">
                                                            Membership
                                                        </option>
                                                        <option id="telephone-call-log-option-2" value="Sponsorship">
                                                            Sponsorship
                                                        </option>
                                                        <option id="telephone-call-log-option-3" value="Donation">
                                                            Donation
                                                        </option>
                                                        <option id="telephone-call-log-option-4" value="Event">
                                                            Event
                                                        </option>
                                                        <option id="telephone-call-log-option-4" value="Other">
                                                            Other
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group top-bottom-margins">
                                                <label for="telephone-call-notes" class="control-label col-md-3">
                                                    Notes
                                                </label>
                                                <div class="col-md-7">
                                                <textarea id="telephone-call-notes" name="telephone-call-notes"
                                                          class="form-control" placeholder="Notes" required></textarea>
                                                </div>
                                            </div>

                                            <button class="btn btn-success" id="save-phone-log" type="submit" name="save_telephone">
                                                <i class="fas fa-save"></i> Save
                                            </button>
                                            <button class="btn btn-primary" type="button" id="view-all-phone-log" data-toggle="modal" data-target="#viewAllTelephoneRecords">
                                                <i class="fas fa-list"></i> View All
                                            </button>
                                        </form>
                                        <?php
                                        if(isset($_POST["save_telephone"])){
                                            $date = $_POST["telephone-call-date"];
                                            $outcome = $_POST["phoneLogOutcomeOptions"];
                                            $notes = $_POST["telephone-call-notes"];
                                            $insertUserLog = "INSERT INTO communication_logs_calls (user_id, call_date, outcome, notes)
                                                    VALUES ($pageID, '$date', '$outcome', '$notes')";
                                            js_alert($insertUserLog);
                                            $insertEngagement = "INSERT INTO member_engagement (user_id, date_now)
                                                    VALUES ($pageID, '$date')";
                                            js_alert($insertEngagement);
                                            $adminID = getloggedInUserId();
                                            $adminLog = insertAdminLog("Inserted Engagement For UserID # $pageID By Admin # $adminID");

                                            if(phpRunSingleQuery($insertEngagement) && phpRunSingleQuery($insertUserLog) && $adminLog){
                                                js_alert("Log Inserted");

                                            }else{
                                                js_alert("Error occurred while inserting record");
                                            }
                                            js_redirect("admin_contact_showProfile.php?userID=".$pageID);
                                        }
                                        ?>
                                    </div>


                                    <div id="telephone-log-notification-modal" class="modal fade in" style="display: none; ">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <a class="close" data-dismiss="modal"><i class="icon-remove"></i></a>
                                                    <h3 class="event-name">Note</h3>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="clearfix">
                                                        <div id="telephone-log-notification-pane"></div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="javascript:" class="btn btn-danger" data-dismiss="modal"><i class="icon-remove"></i>Close</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="modal_telephoneLogViewall" class="modal fade in" style="display: none; ">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <a class="close" data-dismiss="modal"><i class="icon-remove"></i></a>
                                                    <h3>Phone Log History</h3>
                                                </div>
                                                <div class="modal-body">

                                                </div>
                                                <div class="modal-footer">
                                                    <a href="javascript:" class="btn btn-danger" data-dismiss="modal"><i class="icon-remove"></i>Close</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="tab-pane" id="log-notes">
                                    <form action="" method="POST">

                                        <textarea name="textareaNote" id="textareaNote" rows="6" class="form-control my-2" placeholder="Notes"></textarea>

                                        <div class="btn-margins">
                                            <button class="btn btn-success" type="submit" id="view-all-phone-log" name="saveNotes">
                                                <i class="fas fa-save"></i> Save
                                            </button>
                                            <button class="btn btn-primary" type="button" id="view-all-phone-log" data-toggle="modal" data-target="#viewAllNotesRecords">
                                                <i class="fas fa-list"></i> View All
                                            </button>
                                        </div>

                                    </form>
                                    <?php
                                        if(isset($_POST["saveNotes"])){
                                            $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                                            $notes = $_POST["textareaNote"];
                                            $date = date("Y-m-d");
                                            if(phpRunSingleQuery("INSERT INTO user_notes (notes, userID, date_time) VALUES ('$notes', $pageID, '$date')")){
                                                js_alert("Notes Log Inserted");
                                                js_redirect($actual_link);
                                            }
                                        }
                                    ?>


                                    <!-- Modal View All Notes -->
                                    <div class="modal fade" id="viewAllNotesRecords" tabindex="-1" role="dialog" aria-labelledby="viewAllNotesRecords" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Notes Log</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <table id="example" class="table table-striped table-bordered bg-white shadow" style="width:100%">
                                                        <thead>
                                                        <tr>
                                                            <th>Notes</th>
                                                            <th>Date</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                        $rows = phpMysqliFetchAll("SELECT * FROM user_notes WHERE userID=$pageID");
                                                        foreach ($rows as $row){
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $row["notes"];  ?></td>
                                                                <td><?php echo $row["date_time"];  ?></td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        ?>
                                                        </tbody>
                                                        <tfoot>
                                                        <tr>
                                                            <th>Notes</th>
                                                            <th>Date</th>
                                                        </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modalViewAllNotes" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                                    <h5 class="modal-title">Notes History: Justine Banks</h5>
                                                </div>
                                                <div class="modal-body" id="noteHistoryPane_ModalNotes">

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-remove"></i>Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="tab-pane " id="log-email">
                                    <p class="lead mt-2">No records Found!</p>
                                </div>

                                <div class="tab-pane" id="log-fax">

                                    <div id="fileManagementControlsFax" class="form-horizontal">
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="fax-transmission-date" class="control-label">Fax Date</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input name="fax-transmission-date" class="form-control"
                                                           id="fax-transmission-date" placeholder=""
                                                           value="" type="date">
                                                </div>
                                            </div>


                                            <div class="row top-bottom-margins">
                                                <div class="col-md-12">
                                                    <label class="btn btn-default">
                                                        <input type="radio" name="fax-transmission-type" id="fax-transmission-incoming"
                                                               value="incoming"> Incoming
                                                    </label>
                                                    <label class="btn btn-default">
                                                        <input type="radio" name="fax-transmission-type" id="fax-transmission-outgoing" value="outgoing"> Outgoing
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="row top-bottom-margins">
                                                <div class="col-md-12">
                                                    <div class="emailFileAttch">
                                                        <input class="form-control-file border" type="file" id="file-select" name="the_file">
                                                    </div>
                                                    <button type="submit" name="fexSend" class="btn btn-success mt-2" id="save-fax-log">
                                                        <i class="icon-save"></i>Upload
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        <?php
                                        if(isset($_POST["fexSend"])){
                                            $date = $_POST["fax-transmission-date"];
                                            $type = $_POST["fax-transmission-type"];


                                            $errors = []; // Store errors here

                                            $fileExtensionsAllowed = ['jpeg','jpg','png', 'doc', 'docx', 'pdf', 'txt', 'xlx', 'xlxs']; // These will be the only file extensions allowed

                                            $fileName = $_FILES['the_file']['name'];
                                            $fileSize = $_FILES['the_file']['size'];
                                            $fileTmpName  = $_FILES['the_file']['tmp_name'];
                                            $fileType = $_FILES['the_file']['type'];

                                            $fileExtension = strtolower(end(explode('.',$fileName)));

                                            $uploadPath = 'uploads/' . basename($fileName);



                                            if (! in_array($fileExtension,$fileExtensionsAllowed)) {
                                                $errors[] = "This file extension is not allowed. Please upload a JPEG or PNG file";
                                            }

                                            if ($fileSize > 4000000) {
                                                $errors[] = "File exceeds maximum size (4MB)";
                                            }

                                            if (empty($errors)) {
                                                $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

                                                if ($didUpload) {
                                                    js_console_log("The file " . basename($fileName) . " has been uploaded");
                                                } else {
                                                    js_console_log("An error occurred. Please contact the administrator.");
                                                }
                                            } else {
                                                foreach ($errors as $error) {
                                                    js_console_log("These are the errors" . "\n");
                                                }
                                            }

                                            $date = date("Y-m-d");

                                            $sql = "INSERT INTO users_files (user_id, category, filename, date_time) VALUES
                                                    ($pageID, 'Fax Log', '$fileName', '$date')";
                                            phpRunSingleQuery($sql);


                                            $sql = "INSERT INTO communication_logs_faxes (user_id, date, type) VALUES
                                                    ($pageID, '$date', '$type')";

                                            insertAdminLog("Fax File Uploaded to User ID # $pageID");

                                            if(phpRunSingleQuery($sql)){
                                                js_alert("File Uploaded!");
                                                js_redirect("admin_contact_showProfile.php?userID=".$pageID);
                                            }
                                        }
                                        ?>

                                    </div>


                                </div>

                                <div class="tab-pane" id="log-file">

                                    <div class="form-group" id="fileManagementControlsFile" style="margin-bottom: 2em">
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <label for="filelog-select" class="control-label">
                                                <strong>Upload File</strong>
                                            </label>
                                            <div class="emailFileAttch"><input type="file" id="filelog-select" name="file"></div>

                                            <button type="submit" name="upload_file" class="btn btn-success mt-2" id="save-file-log">
                                            <i class="fas fa-save"></i> Upload
                                            </button>
                                        </form>
                                    </div>
                                    <?php
                                        if(isset($_POST["upload_file"])){
                                            $errors = []; // Store errors here

                                            $fileExtensionsAllowed = ['jpeg','jpg','png', 'doc', 'docx', 'pdf', 'txt', 'xlx', 'xlxs']; // These will be the only file extensions allowed

                                            $fileName = $_FILES['file']['name'];
                                            $fileSize = $_FILES['file']['size'];
                                            $fileTmpName  = $_FILES['file']['tmp_name'];
                                            $fileType = $_FILES['file']['type'];

                                            $fileExtension = strtolower(end(explode('.',$fileName)));

                                            $uploadPath = 'uploads/' . basename($fileName);



                                            if (! in_array($fileExtension,$fileExtensionsAllowed)) {
                                                $errors[] = "This file extension is not allowed. Please upload a JPEG or PNG file";
                                            }

                                            if ($fileSize > 4000000) {
                                                $errors[] = "File exceeds maximum size (4MB)";
                                            }

                                            if (empty($errors)) {
                                                $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

                                                if ($didUpload) {
                                                    js_console_log("The file " . basename($fileName) . " has been uploaded");
                                                } else {
                                                    js_console_log("An error occurred. Please contact the administrator.");
                                                }
                                            } else {
                                                foreach ($errors as $error) {
                                                    alert($error);
                                                    js_console_log("These are the errors" . "\n");
                                                }
                                            }
                                            $sql = "INSERT INTO users_files (user_id, category, filename) VALUES
                                                    ($pageID, 'Simple File', '$fileName')";
                                            phpRunSingleQuery($sql);

                                            insertAdminLog("File Uploaded to User ID # $pageID");

                                            if(phpRunSingleQuery($sql)){
                                                js_alert("File Uploaded!");
                                                js_redirect("admin_contact_showProfile.php?userID=".$pageID);
                                            }
                                        }
                                    ?>

                                </div>

                                <div class="tab-pane " id="inquiries">
                                    <p class="lead mt-2">No inquiries records Found!</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-md-4 m-0 p-0">
                <!--Subscription  Summary-->
                <div class="card">
                    <div class="card-header"><i class="fas fa-money-bill-wave"></i> Membership/Subscription Summary</div>
                    <div class="card-body">

                        <ul class="nav nav-tabs" id="secondNavTabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="#certifiedMember" data-toggle="tab">Certified Member</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#goldMembership" data-toggle="tab">Gold Membership</a>
                            </li>
                        </ul>
                        <div class="tab-content">

                            <div class="tab-pane active" id="certifiedMember">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td>Category</td>
                                        <td>Certified Member</td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>
                                            <div class="form-group mb-0">
                                                <select class="form-control" id="exampleFormControlSelect1">
                                                    <option>Active</option>
                                                    <option>Lapsed</option>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Renewal Date</td>
                                        <td>
                                            <div class="form-group mb-0">
                                                <input type="date" class="form-control" id="exampleFormControlInput1">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Inception Date</td>
                                        <td>
                                            <div class="form-group mb-0">
                                                <input type="date" class="form-control" id="exampleFormControlInput1">
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>

                            </div>

                            <div class="tab-pane" id="goldMembership">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td>Category</td>
                                        <td>Gold Member</td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>
                                            <div class="form-group mb-0">
                                                <select class="form-control" id="exampleFormControlSelect1">
                                                    <option>Active</option>
                                                    <option>Lapsed</option>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Renewal Date</td>
                                        <td>
                                            <div class="form-group mb-0">
                                                <input type="date" class="form-control" id="exampleFormControlInput1">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Inception Date</td>
                                        <td>
                                            <div class="form-group mb-0">
                                                <input type="date" class="form-control" id="exampleFormControlInput1">
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
                <!--Engagement Score-->
                <div class="card mt-2">
                    <div class="card-header"><i class="fas fa-chart-bar"></i> Engagement Score 0</div>
                    <div class="card-body">
                        <div id="chartContainer" style="height: 270px; width: 100%;"></div>
                        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                        <script>

                            window.onload = function () {

                                var chart = new CanvasJS.Chart("chartContainer", {
                                    theme:"light2",
                                    animationEnabled: true,
                                    title:{
                                        text: "Engagement"
                                    },
                                    axisY :{
                                        title: "Y-axis",
                                    },
                                    toolTip: {
                                        shared: "true"
                                    },
                                    legend:{
                                        cursor:"pointer",
                                        itemclick : toggleDataSeries
                                    },
                                    data: [{
                                        type: "line",
                                        visible: true,
                                        showInLegend: true,
                                        name: "Score",
                                        dataPoints: [
                                            <?php
                                            for ($day = 0; $day <= 7; $day++) {
                                                $date = new DateTime("$day days ago");
                                                $temp_date = $date->format('Y-m-d');
                                                $sql = "SELECT users_files.date_time, communication_logs_calls.call_date,
                                                        communication_logs_faxes.date
                                                        FROM users_files,communication_logs_calls,communication_logs_faxes
                                                        WHERE users_files.user_id=$pageID AND 
                                                        (users_files.date_time = '$temp_date' OR communication_logs_calls.call_date = '$temp_date'
                                                        OR communication_logs_faxes.date = '$temp_date')";
                                                $res = mysqli_query($GLOBALS["con"], $sql);
                                                if(mysqli_num_rows($res)){
                                                    echo '{ label: "'.$temp_date.'", y: 1 },';
                                                }else{
                                                    echo '{ label: "'.$temp_date.'", y: 0 },';
                                                }
                                            }
                                            ?>
                                        ]
                                    }
                                    ]
                                });
                                chart.render();

                                function toggleDataSeries(e) {
                                    if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible ){
                                        e.dataSeries.visible = false;
                                    } else {
                                        e.dataSeries.visible = true;
                                    }
                                    chart.render();
                                }

                            }

                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
  require 'parts/footer.php';
?>




      <!-- Modal View All telephone Records -->
      <div class="modal fade" id="viewAllTelephoneRecords" tabindex="-1" role="dialog" aria-labelledby="viewAllTelephoneRecords" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Call Logs</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <table id="example" class="table table-striped table-bordered bg-white shadow" style="width:100%">
                          <thead>
                          <tr>
                              <th>Call Date</th>
                              <th>OutCome</th>
                              <th>Notes</th>
                          </tr>
                          </thead>
                          <tbody>
                          <?php
                          $rows = phpMysqliFetchAll("SELECT * FROM communication_logs_calls WHERE user_id=$pageID");
                          foreach ($rows as $row){
                              ?>
                              <tr>
                                  <td><?php echo $row["call_date"];  ?></td>
                                  <td><?php echo $row["outcome"];  ?></td>
                                  <td><?php echo $row["notes"];  ?></td>
                              </tr>
                          <?php
                          }
                          ?>
                          </tbody>
                          <tfoot>
                          <tr>
                              <th>Call Date</th>
                              <th>OutCome</th>
                              <th>Notes</th>
                          </tr>
                          </tfoot>
                      </table>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                  </div>
              </div>
          </div>
      </div>

</body>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>

</html>
