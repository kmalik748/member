<?php
require 'app/app.php';

$pageID = isset($_GET["id"]) ? $_GET["id"] : null;
$sql = "SELECT * FROM users WHERE id = $pageID";
$userDetails = phpMysqliFetchSingle($sql);
$fullName = $userDetails["first_name"].' '.$userDetails["middle_name"].' '.$userDetails["last_name"];


if(isset($_GET["delMembership"])){
    $memberShipHistoryID = $_GET["delMembership"];
    $sql = "DELETE FROM membership_history WHERE id=$memberShipHistoryID";
    if(phpRunSingleQuery($sql)){
        js_alert("Membership Removed!");
        js_redirect("admin_contactProfile_MMS.php?id=$pageID");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<?php
  $path =  "";
  $title =  "Member WebForms";
  require 'parts/head.php';
?>

<body>

<style>
    input[type="radio"], input[type="checkbox"] {
        margin-right: 7px;
        margin-left: 15px;
    }
</style>

<?php require 'parts/nav.php'; ?>

<!-- Page Content -->
<div class="container">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white">
            <li class="breadcrumb-item"><a href="admin_dashboard.php" class="appColor">Home</a></li>
            <li class="breadcrumb-item"><a href="admin_contact_showProfile.php?userID=<?php echo $pageID ?>" class="appColor"><?php echo $fullName; ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></li>
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
                        <i class="fas fas fa-bookmark mr-2"></i><?php echo $title; ?>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td>
                                    <a style="color: #337ab7 !important;text-decoration: underline; cursor: pointer;" data-toggle="modal" data-target="#myModal">Volunteer Form</a>
                                </td>
                                <td>2021-11-18</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <style>
            .well {
                min-height: 20px;
                padding: 19px;
                margin-bottom: 20px;
                background-color: #f5f5f5;
                border: 1px solid #e3e3e3;
                border-radius: 4px;
                -webkit-box-shadow: inset 0 1px 1px rgb(0 0 0 / 5%);
                box-shadow: inset 0 1px 1px rgb(0 0 0 / 5%);
            }
        </style>
        <!-- The Modal -->
        <div class="modal" id="myModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Volunteer Profile</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="form-group quiz-results-html">

                            <div><div class="well"><div class="format-questionLabel bottom-margin"><p>What events are you available to volunteer for?</p>
                                    </div><div class="format-questionResponse"><span id="editElement_715_462" data-uniqueid="715_462" style="display: none;"><input type="checkbox" id="715_462_0" name="715_462" data-uniqueid="715_462" data-formsessionid="715" data-formquestionid="462" value="603" checked="checked">&nbsp;<label for="715_462_0">Annual General Meeting</label><br><input type="checkbox" id="715_462_1" name="715_462" data-uniqueid="715_462" data-formsessionid="715" data-formquestionid="462" value="604">&nbsp;<label for="715_462_1">Fundraising Programs</label><br><input type="checkbox" id="715_462_2" name="715_462" data-uniqueid="715_462" data-formsessionid="715" data-formquestionid="462" value="605">&nbsp;<label for="715_462_2">Monthly Social Events</label><br><input type="checkbox" id="715_462_3" name="715_462" data-uniqueid="715_462" data-formsessionid="715" data-formquestionid="462" value="606">&nbsp;<label for="715_462_3">Webinars</label><br><input type="checkbox" id="715_462_4" name="715_462" data-uniqueid="715_462" data-formsessionid="715" data-formquestionid="462" value="607">&nbsp;<label for="715_462_4">Website Maintenance</label><br> <i class="icon-save saveUserResponse"></i> <i class="icon-remove removeUserResponse"></i></span><span id="labelElement_715_462" data-uniqueid="715_462" data-allowmemoeditrte="0">Annual General Meeting <i class="icon-edit editUserResponse"></i></span></div></div><div class="well"><div class="format-questionLabel bottom-margin"><p>Have you ever volunteered for us in the past?</p>
                                    </div><div class="format-questionResponse"><span id="editElement_715_463" data-uniqueid="715_463" style="display: none;"><select name="formEditElement" data-uniqueid="715_463" data-formsessionid="715" data-formquestionid="463"><option value="608" selected="selected">Yes</option><option value="609">No</option></select> <i class="icon-save saveUserResponse"></i> <i class="icon-remove removeUserResponse"></i></span><span id="labelElement_715_463" data-uniqueid="715_463" data-allowmemoeditrte="0">Yes <i class="icon-edit editUserResponse"></i></span></div></div><div class="well"><div class="format-questionLabel bottom-margin">Comments:</div><div class="format-questionResponse"><span id="editElement_715_464" data-uniqueid="715_464" style="display: none;"><textarea data-uniqueid="715_464" data-formsessionid="715" data-formquestionid="464" rows="10">Test</textarea> <i class="icon-save saveUserResponse"></i> <i class="icon-remove removeUserResponse"></i></span><span id="labelElement_715_464" data-uniqueid="715_464" data-allowmemoeditrte="0">Test <i class="icon-edit editUserResponse"></i></span></div></div></div><h3>T-Shirt Size</h3><div><div class="well"><div class="format-questionLabel bottom-margin"><p>T-Shirt Size</p>
                                    </div><div class="format-questionResponse"><span id="editElement_715_466" data-uniqueid="715_466" style="display: none;"><select name="formEditElement" data-uniqueid="715_466" data-formsessionid="715" data-formquestionid="466"><option value="610" selected="selected">Small</option><option value="611">Medium</option><option value="612">Large</option><option value="613">Extra Large</option></select> <i class="icon-save saveUserResponse"></i> <i class="icon-remove removeUserResponse"></i></span><span id="labelElement_715_466" data-uniqueid="715_466" data-allowmemoeditrte="0">Small <i class="icon-edit editUserResponse"></i></span></div></div></div></div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>



        <?php
        require 'parts/footer.php';
        ?>

        <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#example').DataTable();
            } );
        </script>
</body>

</html>
