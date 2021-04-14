<ul class="contactViewMenu">
    <li><i class="fas fa-user"></i><a href="admin_contact_showProfile.php?userID=<?php echo $userDetails["id"]; ?>" class="<?php if($title == "Contact Management") echo "active"; ?>">Contact Details</a></li>
    <li><i class="fas fa-building"></i><a href="admin_showOrganization.php?id=<?php echo $organization["id"]; ?>&userID=<?php echo $userDetails["id"]; ?>" class="<?php if($title == "") echo "active"; ?>">Organization</a></li>
    <li><i class="fas fa-heart"></i><a href="admin_donationHistory.php?id=<?php echo $userDetails["id"]; ?>" class="<?php if($title == "Donation History") echo "active"; ?>">Donation History</a></li>
    <li><i class="fas fa-edit"></i><a href="admin_editContact.php?id=<?php echo $userDetails["id"]; ?>" class="<?php if($title == "Edit Organization") echo "active"; ?>">Edit Contact</a></li>
<!--    <li><i class="fas fa-book"></i><a href="" class="--><?php //if($title == "") echo "active"; ?><!--">CEU Tracker</a></li>-->
    <li><i class="fas fa-envelope"></i><a data-toggle="modal" href="#emailContact">Email Contact</a></li>
    <li><i class="fas fa-at"></i><a href="admin_emailSubscription.php?id=<?php echo $userDetails["id"]; ?>" class="<?php if($title == "Email Subscription") echo "active"; ?>">Email Subscriptions</a></li>
<!--    <li><i class="fas fa-chart-bar"></i><a href="" class="--><?php //if($title == "") echo "active"; ?><!--">Engagement</a></li>-->
<!--    <li><i class="fas fa-user"></i><a href="" class="--><?php //if($title == "") echo "active"; ?><!--">Impersonate</a></li>-->
<!--    <li><i class="fas fa-bookmark"></i><a href="" class="--><?php //if($title == "") echo "active"; ?><!--">Membership (MMS)</a></li>-->
<!--    <li><i class="fas fa-bookmark"></i><a href="" class="--><?php //if($title == "") echo "active"; ?><!--">Forms</a></li>-->
<!--    <li><i class="fas fa-lock"></i><a href="" class="--><?php //if($title == "") echo "active"; ?><!--">Permissions</a></li>-->
<!--    <li><i class="fas fa-money-bill-alt"></i><a href="" class="--><?php //if($title == "") echo "active"; ?><!--">Purchase History</a></li>-->
<!--    <li><i class="fas fa-users"></i><a href="" class="--><?php //if($title == "") echo "active"; ?><!--">Related Contacts</a></li>-->
<!--    <li><i class="fas fa-download"></i><a href="" class="--><?php //if($title == "") echo "active"; ?><!--">Export Details</a></li>-->
<!--    <li><i class="fas fa-list-alt"></i><a href="" class="--><?php //if($title == "") echo "active"; ?><!--">vCard</a></li>-->
<!--    <li><i class="fas fa-tasks"></i><a href="" class="--><?php //if($title == "") echo "active"; ?><!--">Web Forms</a></li>-->
</ul>



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