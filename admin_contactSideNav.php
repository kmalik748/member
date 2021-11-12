<ul class="contactViewMenu">
    <li><i class="fas fa-user"></i><a href="admin_contact_showProfile.php?userID=<?php echo $userDetails["id"]; ?>" class="<?php if($title == "Contact Management") echo "active"; ?>">Contact Details</a></li>
    <li><i class="fas fa-building"></i><a href="admin_showOrganization.php?id=<?php echo $organization["id"]; ?>&userID=<?php echo $userDetails["id"]; ?>" class="<?php if($title == "") echo "active"; ?>">Organization</a></li>
    <li><i class="fas fa-heart"></i><a href="admin_donationHistory.php?id=<?php echo $userDetails["id"]; ?>" class="<?php if($title == "Donation History") echo "active"; ?>">Donation History</a></li>
    <li><i class="fas fa-edit"></i><a href="admin_editContact.php?id=<?php echo $userDetails["id"]; ?>" class="<?php if($title == "Edit Organization") echo "active"; ?>">Edit Contact</a></li>
<!--    <li><i class="fas fa-book"></i><a href="" class="--><?php //if($title == "") echo "active"; ?><!--">CEU Tracker</a></li>-->
    <li><i class="fas fa-envelope"></i><a data-toggle="modal" href="#emailContact">Email Contact</a></li>
    <li><i class="fas fa-at"></i><a href="admin_emailSubscription.php?id=<?php echo $userDetails["id"]; ?>" class="<?php if($title == "Email Subscription") echo "active"; ?>">Email Subscriptions</a></li>
<!--    <li><i class="fas fa-chart-bar"></i><a href="" class="--><?php //if($title == "") echo "active"; ?><!--">Engagement</a></li>-->
    <li><i class="fas fa-user"></i><a style="cursor: pointer;" data-toggle="modal" data-target="#impersonate_modal">Impersonate</a></li>
    <li><i class="fas fa-bookmark"></i><a href="admin_contactProfile_MMS.php?id=<?php echo $userDetails["id"]; ?>" class="<?php if($title == "Member MMS") echo "active"; ?>">Membership (MMS)</a></li>
    <li><i class="fas fa-bookmark"></i><a href="admin_contactProfile_forms.php?id=<?php echo $userDetails["id"]; ?>" class="<?php if($title == "Member Forms") echo "active"; ?>">Forms</a></li>
<!--    <li><i class="fas fa-lock"></i><a href="" class="--><?php //if($title == "") echo "active"; ?><!--">Permissions</a></li>-->
    <li><i class="fas fa-money-bill-alt"></i><a href="admin_contactProfile_purchaseHistory.php?id=<?php echo $userDetails["id"]; ?>" class="<?php if($title == "Member Purchase History") echo "active"; ?>">Purchase History</a></li>
<!--    <li><i class="fas fa-users"></i><a href="" class="--><?php //if($title == "") echo "active"; ?><!--">Related Contacts</a></li>-->
    <li><i class="fas fa-download"></i><a href="parts/download.php?id=<?php echo $userDetails["id"]; ?>" class="<?php if($title == "") echo "active"; ?>">Export Details</a></li>
<!--    <li><i class="fas fa-list-alt"></i><a href="" class="--><?php //if($title == "") echo "active"; ?><!--">vCard</a></li>-->
    <li><i class="fas fa-tasks"></i><a href="admin_contactProfile_webForms.php?id=<?php echo $userDetails["id"]; ?>" class="<?php if($title == "Member WebForms") echo "active"; ?>">Web Forms</a></li>
</ul>

<button class="btn btn-success" data-toggle="modal" data-target="#resetPass">
    <i class="fas fa-lock"></i> Reset Password
</button>


<!-- Modal for reset pass-->
<div class="modal" id="resetPass">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Reset Password</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form method="POST" action="admin_contact_showProfile.php">
                    <input type="hidden" name="id" value="<?php echo $userDetails["id"]; ?>">
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" placeholder="Enter password" id="pwd" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary" name="resetPass"> <i class="fas fa-sync"></i> Reset</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="fas fa-times"></i> Cancel</button>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
            </div>

        </div>
    </div>
</div>


<!-- Modal impersonate_modal -->
<div class="modal" id="impersonate_modal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Impersonate Contact</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <p>If you continue, you will be logged out and logged in as the selected contact.</p>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button onclick="alert('Feature will be up after developing the users side panel!')" class="btn btn-success" data-dismiss="modal"><i class="fas fa-check"></i> Continue</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
            </div>

        </div>
    </div>
</div>

<div class="modal fade in" id="emailContact" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title" id="exampleModalLabel">Email: Justine Banks (justine@member365.com)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <form class="form-horizontal emailFormModal">

                    <div class="form-group form-row">
                        <label for="email-contact-subject" class="control-label mt-2 col-md-2">Subject:</label>
                        <div class="col-md-9">
                            <input class="form-control" type="text" name="email-contact-subject" id="email-contact-subject">
                        </div>
                    </div>

                    <div class="form-group form-row">
                        <label for="email-contact-cc" class="control-label mt-2 col-md-2">CC:</label>
                        <div class="col-md-9">
                            <input class="form-control" type="text" name="email-contact-cc" id="email-contact-cc" value="">
                        </div>
                    </div>

                    <div class="form-group form-row">
                        <label for="email-contact-bcc" class="control-label mt-2 col-md-2">BCC:</label>
                        <div class="col-md-9">
                            <input class="form-control" type="text" name="email-contact-bcc" id="email-contact-bcc">
                        </div>
                    </div>
                    <textarea name="email-contact-message" id="email-contact-message">
                        Email Body
                    </textarea>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-remove"></i>Cancel</button>
                <button type="button" class="btn btn-success" id="btn-email-send"><i class="fas fa-envelope mr-2"></i>Send</button>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript" src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'email-contact-message' );
</script>