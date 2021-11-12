<?php
  require 'app/app.php';

    $pageID = isset($_GET["id"]) ? $_GET["id"] : null;
    $sql = "SELECT * FROM users WHERE id = $pageID";
    $userDetails = phpMysqliFetchSingle($sql);
    $fullName = $userDetails["first_name"].' '.$userDetails["middle_name"].' '.$userDetails["last_name"];


    if(isset($_GET["delMembership"])){
        $memberShipHistoryID = $_GET["delMembership"];
        if(empty($memberShipHistoryID)){
            js_alert("User do not have any subscriptions to memberships!");
            js_redirect("admin_contactProfile_MMS.php?id=$pageID");
        }
        $sql = "DELETE FROM membership_history WHERE id=$memberShipHistoryID";
        if(phpRunSingleQuery($sql)){
            js_alert("Membership Removed!");
            js_redirect("admin_contactProfile_MMS.php?id=$pageID");
        }
    }

    $sql = "SELECT * FROM membership_history WHERE userID = $pageID ORDER BY id DESC";
    $memberShipHistory = phpMysqliFetchSingle($sql);
?>
<!DOCTYPE html>
<html lang="en">

<?php
  $path =  "";
  $title =  "Member MMS";
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
                        <div class="jumbotron">
                            <p>Submitted On: <?php echo $memberShipHistory["date_time"]; ?></p>
                            <hr class="my-4">
                            <a href="admin_contactProfile_MMS.php?id=<?php echo $pageID; ?>&delMembership=<?php echo $memberShipHistory["id"]; ?>" class="btn btn-danger">
                                <i class="fas fa-trash mr-2"></i>Delete Membership
                            </a>
                            <p class="mt-2">Delete this membership application.</p>
                        </div>

                        <div class="bg-dark text-white p-1">
                            <p class="m-0 p-0">Contact Information</p>
                        </div>
                        <table class="table">
                            <tbody>
                            <tr>
                                <td class="font-weight-bold">Name</td>
                                <td><?php echo $fullName; ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><?php echo $userDetails["email"]; ?></td>
                            </tr>
                            <tr>
                                <td>Job Title</td>
                                <td><?php echo $userDetails["jobTitle"]; ?></td>
                            </tr>
                            <tr>
                                <td>Date of Birth</td>
                                <td><?php echo $userDetails["dob"]; ?></td>
                            </tr>
                            <tr>
                                <td>Gender</td>
                                <td><?php echo $userDetails["gender"]; ?></td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td><?php echo $userDetails["phone"]; ?></td>
                            </tr>
                            <tr>
                                <td>Language</td>
                                <td><?php echo $userDetails["language"]; ?></td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td><?php echo $userDetails["address"]; ?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>





        </div>
    </div>

        <?php
        if(isset($_POST["add_donation"])){
            $scheme = $_POST["scheme"];
            $date = $_POST["date"];
            $method = $_POST["method"];
            $amount = $_POST["amount"];
            $source = $_POST["source"];

            $sql = "INSERT INTO donation_history (userID, campaign, payment_method, amount, source) VALUES 
                    ($pageID, '$scheme', '$method', '$amount', '$source')";
            $res = phpRunSingleQuery($sql);
            if($res){
                js_alert("Donation Added!");
                js_redirect("admin_donationHistory.php?id=".$pageID);
            }else{
                js_alert("Error! Please check console for more details");
                js_redirect("admin_donationHistory.php?id=".$pageID);
            }
        }
        ?>


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
