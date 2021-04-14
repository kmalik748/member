<?php
  require 'app/app.php';

    $pageID = isset($_GET["id"]) ? $_GET["id"] : null;
    $sql = "SELECT * FROM users WHERE id = $pageID";
    $userDetails = phpMysqliFetchSingle($sql);
    $fullName = $userDetails["first_name"].' '.$userDetails["middle_name"].' '.$userDetails["last_name"];
?>
<!DOCTYPE html>
<html lang="en">

<?php
  $path =  "";
  $title =  "Donation History";
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
              <li class="breadcrumb-item active" aria-current="page">Donations</li>
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
                        <i class="fas fa-heart mr-2"></i>Donations
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Add New Donation
                        </button>
                    </div>
                </div>

                <div class="card mt-5">
                    <div class="card-header">
                        <i class="fas fa-heart mr-2"></i>Recent Donations
                    </div>
                    <div class="card-body">
                            <table id="example" class="table table-striped table-bordered bg-white shadow" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Campaign</th>
                                    <th>Type</th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Source</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                require 'app/db.php';
                                $sql = "SELECT * FROM donation_history";
                                $res = mysqli_query($con, $sql);
                                while($row = mysqli_fetch_array($res)){
                                    ?>
                                    <tr>
                                        <td><?php echo $row["campaign"]; ?></td>
                                        <td><?php echo $row["payment_method"]; ?></td>
                                        <td><?php echo $row["date"]; ?></td>
                                        <td><?php echo $row["amount"]; ?></td>
                                        <td><?php echo $row["source"]; ?></td>
                                    <?php
                                }
                                ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Campaign</th>
                                    <th>Type</th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Source</th>
                                </tr>
                                </tfoot>
                            </table>
                    </div>
                </div>



        </div>
    </div>


        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Donation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Select Campaign</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="scheme" required>
                                        <option>-- Select --</option>
                                        <option value="Campaign Scheme 1">Campaign Scheme 1</option>
                                        <option value="Campaign Scheme 2">Campaign Scheme 2</option>
                                        <option value="Campaign Scheme 3">Campaign Scheme 3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Payment Date</label>
                                <input type="date" class="form-control" name="date" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1" class="mr-3">Payment Method</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="method" id="inlineRadio1" value="option1">
                                    <label class="form-check-label" for="inlineRadio1">Check</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="method" id="inlineRadio2" value="option2">
                                    <label class="form-check-label" for="inlineRadio2">Cash</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Amount</label>
                                <input type="text" class="form-control" name="amount" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Donation Source</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="source" required>
                                <option>-- Select --</option>
                                <option>Career Fair</option>
                                <option>Friend</option>
                                <option>Friend of a friend</option>
                                <option>Print Advertisement</option>
                                <option>Internet</option>
                                </select>
                            </div>
                            <hr>
                            <div class="float-right">
                                <button type="submit" class="btn btn-primary" name="add_donation">Save</button>
                                <button type="submit" class="btn btn-secondary">Cancel</button>
                            </div>
                        </form>
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
