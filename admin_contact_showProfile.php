<?php
  require 'app/app.php';
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
                                    <a class="nav-link" href="#log-eblast" data-grid-trigger="datagrid_eblastlog" data-toggle="tab">eMarketing</a>
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
                                    <a class="nav-link" href="#tab-inquiry" data-grid-trigger="datagrid_inquirylog" data-toggle="tab">Inquiries</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#log-file" data-grid-trigger="datagrid_filelog" data-toggle="tab">Files</a>
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
                                                        <option id="telephone-call-log-option-1" value="1">
                                                            Membership
                                                        </option>
                                                        <option id="telephone-call-log-option-2" value="2">
                                                            Sponsorship
                                                        </option>
                                                        <option id="telephone-call-log-option-3" value="3">
                                                            Donation
                                                        </option>
                                                        <option id="telephone-call-log-option-4" value="4">
                                                            Event
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
                                            $insertEngagement = "INSERT INTO member_engagement (user_id, date_now)
                                                    VALUES ($pageID, '$date'";

                                        }
                                        ?>

                                    </div>

                                    <hr>

                                    <input type="hidden" data-for="datagrid_telephonelog" name="contactID" value="50869">
                                    <div class="gridContents" id="datagrid_telephonelog" data-url="/crm/logging/getLog/telephone/" data-recordsperpage="5" data-currentpage="1">No records were returned.</div>




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
                                    <input type="hidden" name="noteID" id="noteID" value="">
                                    <!--<label for="textareaNote" class="control-label">
                                        <strong>Notes</strong>
                                    </label>-->
                                    <textarea name="textareaNote" id="textareaNote" rows="6" class="form-control my-2" placeholder="Notes"></textarea>

                                    <div class="btn-margins">
                                        <a class="btn btn-success" href="javascript:" id="saveNote"><i class="icon-save"></i>Save</a>
                                        <a class="btn btn-danger" href="javascript:" id="cancelEditNote" style="display: none;"><i class="icon-remove"></i>Cancel Edit</a>
                                    </div>

                                    <hr>

                                    <div id="noteHistoryPane" style="display: none;">
                                        <!-- Start - For each note //-->
                                        <div id="noteHistoryPane_Notes"></div>
                                        <!-- End - For each note //-->
                                        <br>
                                        <a class="btn btn-primary btn-margins" name="viewAllNotes" id="viewAllNotes"><i class="icon-list"></i>View All Notes</a>
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
                                    <script type="text/javascript" src="/assets/javascript/emaillog.js"></script>

                                    <div id="email-log-view-pane"><table class="table table-striped table-bordered"><thead><tr><th><a href="javascript:;" data-column-name="sendDate" data-sort-order="asc" class="column-resort">Date Sent</a></th><th><a href="javascript:;" data-column-name="emailName" data-sort-order="asc" class="column-resort">Subject</a></th><th><a href="javascript:;" data-column-name="sender" data-sort-order="asc" class="column-resort">Sent By</a></th></tr></thead><tbody><tr><td>2019-04-25 13:41:12</td><td><a href="javascript:void(0);" id="eblast-view-modal" data-emailtype="email" data-id="520">Vote for your favorite Member365 Personality</a></td><td><a href="/crm/contacts/view/50712">Stephen Foley</a></td></tr><tr><td>2018-06-20 18:00:57</td><td><a href="javascript:void(0);" id="eblast-view-modal" data-emailtype="email" data-id="100">Your Payment For Invoice #MR-2018-0006 Has Been Processed.</a></td><td><a href="/crm/contacts/view/50712">Stephen Foley</a></td></tr><tr><td>2018-05-03 14:20:58</td><td><a href="javascript:void(0);" id="eblast-view-modal" data-emailtype="email" data-id="22">Member365 Purchase Invoice  - # MR-2018-0006</a></td><td><a href="/crm/contacts/view/null">System Email</a></td></tr></tbody></table><a class="btn btn-primary btn-margins" name="emaillog-view-all" style="display: none;"><i class="icon-list"></i>View All Emails</a></div>


                                    <div class="modal fade in" id="email-log-view-modal">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                                    <h3 class="modal-title event-name">Email History</h3>
                                                </div>
                                                <div class="modal-body">
                                                    <div id="email-log-view-pane-modal"></div>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="javascript:" class="btn btn-danger" data-dismiss="modal"><i class="icon-remove"></i>Close</a>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                </div>

                                <div class="tab-pane" id="log-eblast">
                                    <input type="hidden" data-for="datagrid_eblastlog" name="contactID" value="50869">
                                    <div class="gridContents" id="datagrid_eblastlog" data-url="/crm/logging/getLog/eblast/" data-recordsperpage="5" data-has-trigger="1">
                                        Loading...
                                    </div>
                                </div>

                                <div class="tab-pane" id="log-fax">

                                    <div id="fileManagementControlsFax" class="form-horizontal">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="fax-transmission-date" class="control-label">Fax Date</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input name="fax-transmission-date" class="form-control"
                                                       id="fax-transmission-date" placeholder=""
                                                       value="" type="text">
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
                                                    <input class="form-control-file border" type="file" id="file-select" name="file-select[]">
                                                </div>
                                                <a class="btn btn-success mt-2" href="" id="save-fax-log"><i class="icon-save"></i>Upload</a>
                                                <div id="uploadBarFax" class="top-bottom-margins" style="display: none;">
                                                    <p>Upload Progress:<br><progress id="faxProgress" min="0" max="100" value="0" style="width: 500px;">0% complete</progress></p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>



                                    <div class="modal fade in" id="fax-log-notification-modal" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                                    <h3 class="modal-title">Errors</h3>
                                                </div>
                                                <div class="modal-body">
                                                    <div id="fax-log-notification-pane"></div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-remove"></i>Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="tab-pane" id="tab-inquiry">
                                    <input type="hidden" data-for="datagrid_inquirylog" name="userID" value="50724">
                                    <div class="gridContents" id="datagrid_inquirylog" data-url="/crm/inquiries/getListing/listToReviewByUser/" data-recordsperpage="5" data-has-trigger="1">
                                        Loading...
                                    </div>
                                </div>

                                <div class="tab-pane" id="log-file">

                                    <div class="form-group" id="fileManagementControlsFile" style="margin-bottom: 2em">
                                        <label for="filelog-select" class="control-label">
                                            <strong>Upload File</strong>
                                        </label>
                                        <div class="emailFileAttch"><input type="file" id="filelog-select" name="filelog-select[]"></div>

                                        <a class="btn btn-success" href="javascript:;" id="save-file-log"><i class="icon-save"></i>Upload</a>
                                        <div id="uploadBarFile" class="top-bottom-margins" style="display: none;">
                                            <p>Upload Progress:<br><progress id="fileProgress" max="100" value="0" style="width: 500px;">0% complete</progress></p>
                                        </div>
                                    </div>

                                    <hr>

                                    <input type="hidden" data-for="datagrid_filelog" name="contactID" value="50869">
                                    <div class="gridContents" id="datagrid_filelog" data-url="/crm/logging/getLog/file/" data-recordsperpage="5" data-has-trigger="1">
                                        Loading...
                                    </div>



                                    <div class="modal fade in" id="file-log-notification-modal" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                                    <h3 class="modal-title">Errors</h3>
                                                </div>
                                                <div class="modal-body">
                                                    <div id="file-log-notification-pane"></div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-remove"></i>Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

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
                                        type: "spline",
                                        visible: true,
                                        showInLegend: true,
                                        name: "Score",
                                        dataPoints: [
                                            { label: "Mar 12th", y: 0 },
                                            { label: "Mar 14th", y: 0 },
                                            { label: "Mar 16th", y: 0 },
                                            { label: "Mar 18th", y: 0 },
                                            { label: "Mar 20th", y: 0 },
                                            { label: "Mar 22th", y: 0 },
                                            { label: "Mar 24th", y: 0 },
                                            { label: "Mar 28th", y: 0 }
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
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      ...
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                  </div>
              </div>
          </div>
      </div>

</body>

</html>
