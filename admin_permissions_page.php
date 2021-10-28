<?php
  require 'app/app.php';
    if(isset($_POST["del_contact"])){
        $id = $_POST["contact_id"];
        $sql = "DELETE FROM users WHERE id=$id";
        if(phpRunSingleQuery($sql)){
            js_alert("Contact Deleted!");
            js_redirect("admin_contact.php");
        }else{
            js_alert("ERROR");
        }
    }
    if(isset($_POST["del_org"])){
        $id = $_POST["org_id"];
        $sql = "DELETE FROM organizations WHERE id=$id";
        if(phpRunSingleQuery($sql)){
            js_alert("Organization Deleted!");
            js_redirect("admin_contact.php");
        }else{
            js_alert("ERROR");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<?php
  $path =  "";
  $title =  "Admin Permissions";
  require 'parts/head.php';
?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css"></link>
<style>
    label{
        margin-bottom: 10px !important;
    }
</style>

<body>

  <?php require 'parts/nav.php'; ?>

  <!-- Page Content -->
  <div class="container">

      <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-white">
              <li class="breadcrumb-item"><a href="admin_dashboard.php" class="appColor">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Admin Permissions</li>
          </ol>
      </nav>


    <div class="widget-content p-2">
        <div class="row mt-3">
            <div class="col-md-12">
                <h3>Permissions Management</h3>
                <hr>
                <form class="ml-3">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="b1" name="">
                                <label class="form-check-label" for="b1">
                                    Users Management
                                </label>
                            </div>
                            <div class="form-check ml-4">
                                <input class="form-check-input" type="checkbox" value="" id="b2" name="">
                                <label class="form-check-label" for="b2">
                                    Add User
                                </label>
                            </div>
                            <div class="form-check ml-4">
                                <input class="form-check-input" type="checkbox" value="" id="b2" name="">
                                <label class="form-check-label" for="b2">
                                    Update User
                                </label>
                            </div>
                            <div class="form-check ml-4">
                                <input class="form-check-input" type="checkbox" value="" id="b2" name="">
                                <label class="form-check-label" for="b2">
                                    Delete User
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="b3" name="">
                                <label class="form-check-label" for="b3">
                                    Organizations Management
                                </label>
                            </div>
                            <div class="form-check ml-4">
                                <input class="form-check-input" type="checkbox" value="" id="b4" name="">
                                <label class="form-check-label" for="b4">
                                    Create Organization
                                </label>
                            </div>
                            <div class="form-check ml-4">
                                <input class="form-check-input" type="checkbox" value="" id="b5" name="">
                                <label class="form-check-label" for="b5">
                                    Update Organization
                                </label>
                            </div>
                            <div class="form-check ml-4">
                                <input class="form-check-input" type="checkbox" value="" id="b6" name="">
                                <label class="form-check-label" for="b6">
                                    Delete Organization
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="b7" name="">
                                <label class="form-check-label" for="b7">
                                    Membership Management
                                </label>
                            </div>
                            <div class="form-check ml-4">
                                <input class="form-check-input" type="checkbox" value="" id="b8" name="">
                                <label class="form-check-label" for="b8">
                                    Add new Membership
                                </label>
                            </div>
                            <div class="form-check ml-4">
                                <input class="form-check-input" type="checkbox" value="" id="b9" name="">
                                <label class="form-check-label" for="b9">
                                    Update Membership
                                </label>
                            </div>
                            <div class="form-check ml-4">
                                <input class="form-check-input" type="checkbox" value="" id="b10" name="">
                                <label class="form-check-label" for="b10">
                                    Delete Membership
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="b11" name="">
                                <label class="form-check-label" for="b11">
                                    Email Campaign Management
                                </label>
                            </div>
                            <div class="form-check ml-4">
                                <input class="form-check-input" type="checkbox" value="" id="b12" name="">
                                <label class="form-check-label" for="b12">
                                    Add a new Campaign
                                </label>
                            </div>
                            <div class="form-check ml-4">
                                <input class="form-check-input" type="checkbox" value="" id="b13" name="">
                                <label class="form-check-label" for="b13">
                                    Delete a new Campaign
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="b14" name="">
                                <label class="form-check-label" for="b14">
                                    Events Management
                                </label>
                            </div>
                            <div class="form-check ml-4">
                                <input class="form-check-input" type="checkbox" value="" id="b15" name="">
                                <label class="form-check-label" for="b15">
                                    Add Event
                                </label>
                            </div>
                            <div class="form-check ml-4">
                                <input class="form-check-input" type="checkbox" value="" id="b16" name="">
                                <label class="form-check-label" for="b16">
                                    Update Event
                                </label>
                            </div>
                            <div class="form-check ml-4">
                                <input class="form-check-input" type="checkbox" value="" id="b17" name="">
                                <label class="form-check-label" for="b17">
                                    Delete Event
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="b18" name="">
                                <label class="form-check-label" for="b18">
                                    Committee Management
                                </label>
                            </div>
                            <div class="form-check ml-4">
                                <input class="form-check-input" type="checkbox" value="" id="b19" name="">
                                <label class="form-check-label" for="b19">
                                    Add Committee
                                </label>
                            </div>
                            <div class="form-check ml-4">
                                <input class="form-check-input" type="checkbox" value="" id="b20" name="">
                                <label class="form-check-label" for="b20">
                                    Edit Committee
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="b21" name="">
                                <label class="form-check-label" for="b21">
                                    Certificates Management
                                </label>
                            </div>
                            <div class="form-check ml-4">
                                <input class="form-check-input" type="checkbox" value="" id="b22" name="">
                                <label class="form-check-label" for="b22">
                                    Create Certificate
                                </label>
                            </div>
                            <div class="form-check ml-4">
                                <input class="form-check-input" type="checkbox" value="" id="b23" name="">
                                <label class="form-check-label" for="b23">
                                    Update Certificate
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="b24" name="">
                                <label class="form-check-label" for="b24">
                                    Directory Management
                                </label>
                            </div>
                            <div class="form-check ml-4">
                                <input class="form-check-input" type="checkbox" value="" id="b25" name="">
                                <label class="form-check-label" for="b25">
                                    Add a new Directory
                                </label>
                            </div>
                            <div class="form-check ml-4">
                                <input class="form-check-input" type="checkbox" value="" id="b26" name="">
                                <label class="form-check-label" for="b26">
                                    Delete a Directory
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="b1" name="">
                                <label class="form-check-label" for="b1">
                                    Users Management
                                </label>
                            </div>
                            <div class="form-check ml-4">
                                <input class="form-check-input" type="checkbox" value="" id="b2" name="">
                                <label class="form-check-label" for="b2">
                                    Add User
                                </label>
                            </div>
                            <div class="form-check ml-4">
                                <input class="form-check-input" type="checkbox" value="" id="b2" name="">
                                <label class="form-check-label" for="b2">
                                    Update User
                                </label>
                            </div>
                            <div class="form-check ml-4">
                                <input class="form-check-input" type="checkbox" value="" id="b2" name="">
                                <label class="form-check-label" for="b2">
                                    Delete User
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="b3" name="">
                                <label class="form-check-label" for="b3">
                                    Organizations Management
                                </label>
                            </div>
                            <div class="form-check ml-4">
                                <input class="form-check-input" type="checkbox" value="" id="b4" name="">
                                <label class="form-check-label" for="b4">
                                    Create Organization
                                </label>
                            </div>
                            <div class="form-check ml-4">
                                <input class="form-check-input" type="checkbox" value="" id="b5" name="">
                                <label class="form-check-label" for="b5">
                                    Update Organization
                                </label>
                            </div>
                            <div class="form-check ml-4">
                                <input class="form-check-input" type="checkbox" value="" id="b6" name="">
                                <label class="form-check-label" for="b6">
                                    Delete Organization
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="b7" name="">
                                <label class="form-check-label" for="b7">
                                    Membership Management
                                </label>
                            </div>
                            <div class="form-check ml-4">
                                <input class="form-check-input" type="checkbox" value="" id="b8" name="">
                                <label class="form-check-label" for="b8">
                                    Add new Membership
                                </label>
                            </div>
                            <div class="form-check ml-4">
                                <input class="form-check-input" type="checkbox" value="" id="b9" name="">
                                <label class="form-check-label" for="b9">
                                    Update Membership
                                </label>
                            </div>
                            <div class="form-check ml-4">
                                <input class="form-check-input" type="checkbox" value="" id="b10" name="">
                                <label class="form-check-label" for="b10">
                                    Delete Membership
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="b11" name="">
                                <label class="form-check-label" for="b11">
                                    Email Campaign Management
                                </label>
                            </div>
                            <div class="form-check ml-4">
                                <input class="form-check-input" type="checkbox" value="" id="b12" name="">
                                <label class="form-check-label" for="b12">
                                    Add a new Campaign
                                </label>
                            </div>
                            <div class="form-check ml-4">
                                <input class="form-check-input" type="checkbox" value="" id="b13" name="">
                                <label class="form-check-label" for="b13">
                                    Delete a new Campaign
                                </label>
                            </div>
                        </div>
                    </div>
                </form>
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
