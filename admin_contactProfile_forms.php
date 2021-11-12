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
  $title =  "Member Forms";
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
                        <div class="widget-content">

                            <div class="widget formQuestionWrap" id="">
                                <div class="widget-content"><div class="formQuestionWrap" id="">

                                        <h2>Volunteer Profile</h2><div class="subHeaderText"><p>Who. what, when, where, why?</p>
                                        </div>

                                    </div><div class="formQuestionWrap" id="">

                                        <div class="qOutputWrap single-select"><p class="fbValidation1 alert alert-danger" style=" display: none;" id="validationMessage_259">REQUIRED</p><div id="validationMessage2_259" class="fbValidation2 tooltip right" role="tooltip" style="display:none;"><div class="tooltip-arrow"></div><div class="tooltip-inner">REQUIRED</div></div><input type="hidden" data-mandatory="1" data-elementtype="select" data-name="fbresponse_sselect_259" data-questionid="259"><div class="well">
                                                <div class="questionText" data-for="259"> <label for="fbresponse_sselect_259"><p>Why do you want to Volunteer?<span>*</span></p>
                                                    </label></div>

                                                <select id="fbresponse_sselect_259" name="fbresponse_sselect_259"><option value="">-- Select --</option><option value="355" selected="selected">I would like to give back</option><option value="356">I have never volunteered before</option><option value="357">It is that time in my life</option><option value="358">Not sure</option></select>
                                                <div class="clear"></div>
                                            </div></div><!-- End of single-select //-->

                                    </div><div class="formQuestionWrap" id="">

                                        <div class="qOutputWrap multiple-radio-vertical"><p class="fbValidation1 alert alert-danger" style=" display: none;" id="validationMessage_209">REQUIRED</p><div id="validationMessage2_209" class="fbValidation2 tooltip right" role="tooltip" style="display:none;"><div class="tooltip-arrow"></div><div class="tooltip-inner">REQUIRED</div></div><input type="hidden" data-mandatory="1" data-elementtype="radio" data-name="fbresponse_radio_209" data-questionid="209"><div class="well">
                                                <div class="questionText" data-for="209"><p>Have you volunteered with us before?<span>*</span></p>
                                                </div>

                                                <label for="209_267"><input type="radio" id="209_267" name="fbresponse_radio_209" value="267" checked="checked">Yes</label><br> <label for="209_268"><input type="radio" id="209_268" name="fbresponse_radio_209" value="268">No</label><br>
                                                <div class="clear"></div>
                                            </div></div><!-- End of multiple-radio-vertical //-->

                                    </div>    </div>
                            </div><div class="widget formQuestionWrap" id="">
                                <div class="widget-content"><div class="formQuestionWrap" id="">

                                        <h2>Reference</h2><div class="subHeaderText"><p>Please attach a letter of reference who can attest to your volunteer work.</p>
                                        </div>

                                    </div><div class="formQuestionWrap" id="">

                                        <div class="qOutputWrap file"><p class="fbValidation1 alert alert-danger" style=" display: none;" id="validationMessage_207">REQUIRED</p><div id="validationMessage2_207" class="fbValidation2 tooltip right" role="tooltip" style="display:none;"><div class="tooltip-arrow"></div><div class="tooltip-inner">REQUIRED</div></div><input type="hidden" data-mandatory="0" data-elementtype="file" data-name="fbresponse_file_207" data-questionid="207" data-validtypes="" data-minimumfiles="0" data-maximumfiles="3" data-maximumfilesize="0"><div class="well">
                                                <div class="questionText" data-for="207">Letter of recommendation</div>

                                                <a href="javascript:;" class="btn btn-primary top-bottom-margins" data-filetype="fbresponse_file" data-purpose="fb_file_upload" data-alias="207" data-directory="/formBuilderUploads/207"><i class="icon-plus"></i> Select Files</a><br><div id="fileContainer_207" class="dynamicWideList"><div class="list"></div></div>
                                                <div class="clear"></div>
                                            </div></div><!-- End of file //-->

                                    </div>    </div>
                            </div><div class="widget formQuestionWrap" id="">
                                <div class="widget-content"><div class="formQuestionWrap" id="">

                                        <h2>Availability</h2>

                                    </div><div class="formQuestionWrap" id="">

                                        <div class="qOutputWrap multiple-checkbox-vertical"><p class="fbValidation1 alert alert-danger" style=" display: none;" id="validationMessage_212">REQUIRED</p><div id="validationMessage2_212" class="fbValidation2 tooltip right" role="tooltip" style="display:none;"><div class="tooltip-arrow"></div><div class="tooltip-inner">REQUIRED</div></div><input type="hidden" data-mandatory="1" data-elementtype="radio" data-name="fbresponse_checkbox_212[]" data-questionid="212"><div class="well">
                                                <div class="questionText" data-for="212"><p>What events are you available for?<span>*</span></p>
                                                </div>

                                                <label for="212_274"><input type="checkbox" id="212_274" name="fbresponse_checkbox_212[]" value="274" checked="checked">Monthly Spotlights</label><br> <label for="212_275"><input type="checkbox" id="212_275" name="fbresponse_checkbox_212[]" value="275" checked="checked">Annual Conference</label><br> <label for="212_276"><input type="checkbox" id="212_276" name="fbresponse_checkbox_212[]" value="276" checked="checked">Speaker Meet &amp; Greet</label><br> <label for="212_542"><input type="checkbox" id="212_542" name="fbresponse_checkbox_212[]" value="542" checked="checked">Summer Boat Cruise</label><br>
                                                <div class="clear"></div>
                                            </div></div><!-- End of multiple-checkbox-vertical //-->

                                    </div>    </div>
                            </div><div class="widget formQuestionWrap" id="">
                                <div class="widget-content"><div class="formQuestionWrap" id="">

                                        <h2>T-Shirt Size</h2><div class="subHeaderText"><p>We often provide T-Shirts to all volunteers at the event itself.&nbsp; Please indicate your size.</p>
                                        </div>

                                    </div><div class="formQuestionWrap" id="">

                                        <div class="qOutputWrap multiple-radio-horizontal"><p class="fbValidation1 alert alert-danger" style=" display: none;" id="validationMessage_211">REQUIRED</p><div id="validationMessage2_211" class="fbValidation2 tooltip right" role="tooltip" style="display:none;"><div class="tooltip-arrow"></div><div class="tooltip-inner">REQUIRED</div></div><input type="hidden" data-mandatory="1" data-elementtype="radio" data-name="fbresponse_radio_211" data-questionid="211"><div class="well">
                                                <div class="questionText" data-for="211"><p>T-Shirt Size<span>*</span></p>
                                                </div>

                                                <label for="211_269"><input type="radio" id="211_269" name="fbresponse_radio_211" value="269">XS</label>  <label for="211_270"><input type="radio" id="211_270" name="fbresponse_radio_211" value="270">S</label>  <label for="211_271"><input type="radio" id="211_271" name="fbresponse_radio_211" value="271">M</label>  <label for="211_272"><input type="radio" id="211_272" name="fbresponse_radio_211" value="272" checked="checked">L</label>  <label for="211_273"><input type="radio" id="211_273" name="fbresponse_radio_211" value="273">XL</label>
                                                <div class="clear"></div>
                                            </div></div><!-- End of multiple-radio-horizontal //-->

                                    </div><div class="formQuestionWrap" id="">

                                        <div class="qOutputWrap text"><p class="fbValidation1 alert alert-danger" style=" display: none;" id="validationMessage_538">REQUIRED</p><div id="validationMessage2_538" class="fbValidation2 tooltip right" role="tooltip" style="display:none;"><div class="tooltip-arrow"></div><div class="tooltip-inner">REQUIRED</div></div><input type="hidden" data-mandatory="1" data-elementtype="text" data-name="fbresponse_text_538" data-questionid="538"><div class="well">
                                                <div class="questionText" data-for="538">Nickname for Shirt Sleeve<span>*</span></div>

                                                <input type="text" id="538" name="fbresponse_text_538" value="">
                                                <div class="clear"></div>
                                            </div></div><!-- End of text //-->

                                    </div>    </div>
                            </div>

                            <a href="admin_contactProfile_forms.php?id=<?php echo $pageID; ?>" class="btn btn-lg btn-success pull-right pixSubmitBtn">
                                <i class="icon-save"></i>Save
                            </a>

                        </div>
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
