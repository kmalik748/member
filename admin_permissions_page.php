<?php
  require 'app/app.php';
    if(isset($_POST["savePerm"])){
        $id = $_POST["uid"];

        $b1 = isset($_POST["b1"]) ? "1" : "";
        $b2 = isset($_POST["b2"]) ? "1" : "";
        $b3 = isset($_POST["b3"]) ? "1" : "";
        $b4 = isset($_POST["b4"]) ? "1" : "";
        $b5 = isset($_POST["b5"]) ? "1" : "";
        $b6 = isset($_POST["b6"]) ? "1" : "";
        $b7 = isset($_POST["b7"]) ? "1" : "";
        $b8 = isset($_POST["b8"]) ? "1" : "";
        $b9 = isset($_POST["b9"]) ? "1" : "";
        $b10 = isset($_POST["b10"]) ? "1" : "";
        $b11 = isset($_POST["b11"]) ? "1" : "";
        $b12 = isset($_POST["b12"]) ? "1" : "";
        $b13 = isset($_POST["b13"]) ? "1" : "";
        $b14 = isset($_POST["b14"]) ? "1" : "";
        $b15 = isset($_POST["b15"]) ? "1" : "";
        $b16 = isset($_POST["b16"]) ? "1" : "";
        $b17 = isset($_POST["b17"]) ? "1" : "";
        $b18 = isset($_POST["b18"]) ? "1" : "";
        $b19 = isset($_POST["b19"]) ? "1" : "";
        $b20 = isset($_POST["b20"]) ? "1" : "";
        $b21 = isset($_POST["b21"]) ? "1" : "";
        $b22 = isset($_POST["b22"]) ? "1" : "";
        $b23 = isset($_POST["b23"]) ? "1" : "";
        $b24 = isset($_POST["b24"]) ? "1" : "";
        $b25 = isset($_POST["b25"]) ? "1" : "";
        $b26 = isset($_POST["b26"]) ? "1" : "";
        $b27 = isset($_POST["b27"]) ? "1" : "";
        $b28 = isset($_POST["b28"]) ? "1" : "";
        $b29 = isset($_POST["b29"]) ? "1" : "";
        $b30 = isset($_POST["b30"]) ? "1" : "";
        $b31 = isset($_POST["b31"]) ? "1" : "";
        $b32 = isset($_POST["b32"]) ? "1" : "";
        $b33 = isset($_POST["b33"]) ? "1" : "";
        $b34 = isset($_POST["b34"]) ? "1" : "";
        $b35 = isset($_POST["b35"]) ? "1" : "";
        $b36 = isset($_POST["b36"]) ? "1" : "";
        $b37 = isset($_POST["b37"]) ? "1" : "";
        $b38 = isset($_POST["b38"]) ? "1" : "";
        $b39 = isset($_POST["b39"]) ? "1" : "";
        $b40 = isset($_POST["b40"]) ? "1" : "";

        $sql = "INSERT INTO permissions (b1, b2, b3, b4, b5, b6, b7, b8,b9, b10, b11, b12, b13, b14, b15, b16, b17, b18, b19, b20,
                         b21, b22, b23, b24, b25, b26, b27, b28, b29, b30, b31, b32, b33, b34, b35, b36, b37, b38, b39, b49, uid) VALUES 
                         ('$b1', '$b2', '$b3', '$b4')";

//        $sql = "UPDATE permissions SET
//                b1='$b1', b2='$b2', b3='$b3', b4='$b4', b5='$b4',
//                b6='$b6', b7='$b7', b8='$b8', b9='$b9', b10='$b10',
//                b11='$b11', b12='$b12', b13='$b13', b14='$b14', b15='$b15',
//                b16='$b16', b17='$b17', b18='$b18', b19='$b19', b20='$b20',
//                b21='$b21', b22='$b22', b23='$b23', b24='$b24', b25='$b25',
//                b26='$b26', b27='$b27', b28='$b28', b29='$b29', b30='$b30',
//                b31='$b31', b32='$b32', b33='$b33', b34='$b34', b35='$b35',
//                b36='$b36', b37='$b37', b38='$b38', b39='$b39', b40='$b40'
//                WHERE uid = $id";


//        echo $sql; exit(); die();
        if(phpRunSingleQuery($sql)){
            js_alert("Permissions Updated!");
            js_redirect("admin_permissions.php");
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
                <form class="ml-3" method="post">
                    <input type="hidden" name="uid" value="<?php echo $_GET["userID"]; ?>">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="b1" name="b1">
                                <label class="form-check-label" for="b1">
                                    Users Management
                                </label>
                            </div>
                            <div class="form-check ml-4">
                                <input class="form-check-input" type="checkbox" value="" id="b2" name="b2">
                                <label class="form-check-label" for="b2">
                                    Add User
                                </label>
                            </div>
                            <div class="form-check ml-4">
                                <input class="form-check-input" type="checkbox" value="" id="b3" name="b3">
                                <label class="form-check-label" for="b3">
                                    Update User
                                </label>
                            </div>
                            <div class="form-check ml-4">
                                <input class="form-check-input" type="checkbox" value="" id="b4" name="b4">
                                <label class="form-check-label" for="b4">
                                    Delete User
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="b5" name="b5">
                                <label class="form-check-label" for="b5">
                                    Organizations Management
                                </label>
                            </div>
                            <div class="form-check ml-4">
                                <input class="form-check-input" type="checkbox" value="" id="b6" name="b6">
                                <label class="form-check-label" for="b6">
                                    Create Organization
                                </label>
                            </div>
                            <div class="form-check ml-4">
                                <input class="form-check-input" type="checkbox" value="" id="b7" name="b7">
                                <label class="form-check-label" for="b7">
                                    Update Organization
                                </label>
                            </div>
                            <div class="form-check ml-4">
                                <input class="form-check-input" type="checkbox" value="" id="b8" name="b8">
                                <label class="form-check-label" for="b8">
                                    Delete Organization
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="b9" name="b9">
                                <label class="form-check-label" for="b9">
                                    Membership Management
                                </label>
                            </div>
                            <div class="form-check ml-4">
                                <input class="form-check-input" type="checkbox" value="" id="b10" name="b10">
                                <label class="form-check-label" for="b10">
                                    Add new Membership
                                </label>
                            </div>
                            <div class="form-check ml-4">
                                <input class="form-check-input" type="checkbox" value="" id="b11" name="b11">
                                <label class="form-check-label" for="b11">
                                    Update Membership
                                </label>
                            </div>
                            <div class="form-check ml-4">
                                <input class="form-check-input" type="checkbox" value="" id="b12" name="b12">
                                <label class="form-check-label" for="b12">
                                    Delete Membership
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="b13" name="b13">
                                <label class="form-check-label" for="b13">
                                    Email Campaign Management
                                </label>
                            </div>
                            <div class="form-check ml-4">
                                <input class="form-check-input" type="checkbox" value="" id="b14" name="b14">
                                <label class="form-check-label" for="b14">
                                    Add a new Campaign
                                </label>
                            </div>
                            <div class="form-check ml-4">
                                <input class="form-check-input" type="checkbox" value="" id="b15" name="b15">
                                <label class="form-check-label" for="b15">
                                    Delete a new Campaign
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="b16" name="b16">
                                <label class="form-check-label" for="b16">
                                    Events Management
                                </label>
                            </div>
                            <div class="form-check ml-4">
                                <input class="form-check-input" type="checkbox" value="" id="b17" name="b17">
                                <label class="form-check-label" for="b17">
                                    Add Event
                                </label>
                            </div>
                            <div class="form-check ml-4">
                                <input class="form-check-input" type="checkbox" value="" id="b18" name="b18">
                                <label class="form-check-label" for="b18">
                                    Update Event
                                </label>
                            </div>
                            <div class="form-check ml-4">
                                <input class="form-check-input" type="checkbox" value="" id="b19" name="b19">
                                <label class="form-check-label" for="b19">
                                    Delete Event
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="b20" name="b20">
                                <label class="form-check-label" for="b20">
                                    Committee Management
                                </label>
                            </div>
                            <div class="form-check ml-4">
                                <input class="form-check-input" type="checkbox" value="" id="b21" name="b21">
                                <label class="form-check-label" for="b21">
                                    Add Committee
                                </label>
                            </div>
                            <div class="form-check ml-4">
                                <input class="form-check-input" type="checkbox" value="" id="b22" name="b22">
                                <label class="form-check-label" for="b22">
                                    Edit Committee
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="b23" name="b23">
                                <label class="form-check-label" for="b23">
                                    Certificates Management
                                </label>
                            </div>
                            <div class="form-check ml-4">
                                <input class="form-check-input" type="checkbox" value="" id="b24" name="b24">
                                <label class="form-check-label" for="b24">
                                    Create Certificate
                                </label>
                            </div>
                            <div class="form-check ml-4">
                                <input class="form-check-input" type="checkbox" value="" id="b25" name="b25">
                                <label class="form-check-label" for="b25">
                                    Update Certificate
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="b26" name="b26">
                                <label class="form-check-label" for="b26">
                                    Directory Management
                                </label>
                            </div>
                            <div class="form-check ml-4">
                                <input class="form-check-input" type="checkbox" value="" id="b27" name="b27">
                                <label class="form-check-label" for="b27">
                                    Add a new Directory
                                </label>
                            </div>
                            <div class="form-check ml-4">
                                <input class="form-check-input" type="checkbox" value="" id="b28" name="b28">
                                <label class="form-check-label" for="b28">
                                    Delete a Directory
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="b29" name="b29">
                                <label class="form-check-label" for="b29">
                                    LMS Management
                                </label>
                            </div>
                            <div class="form-check ml-4">
                                <input class="form-check-input" type="checkbox" value="" id="b30" name="b30">
                                <label class="form-check-label" for="b30">
                                    Add Course
                                </label>
                            </div>
                            <div class="form-check ml-4">
                                <input class="form-check-input" type="checkbox" value="" id="b31" name="b31">
                                <label class="form-check-label" for="b31">
                                    Update Course
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="b32" name="b32">
                                <label class="form-check-label" for="b32">
                                    Fundraiser Management
                                </label>
                            </div>
                            <div class="form-check ml-4">
                                <input class="form-check-input" type="checkbox" value="" id="b33" name="b33">
                                <label class="form-check-label" for="b33">
                                    Create Fundraiser
                                </label>
                            </div>
                            <div class="form-check ml-4">
                                <input class="form-check-input" type="checkbox" value="" id="b34" name="b34">
                                <label class="form-check-label" for="b34">
                                    Update Fundraiser
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="b35" name="b35">
                                <label class="form-check-label" for="b35">
                                    Jobs Management
                                </label>
                            </div>
                            <div class="form-check ml-4">
                                <input class="form-check-input" type="checkbox" value="" id="b36" name="b36">
                                <label class="form-check-label" for="b36">
                                    Add new Job
                                </label>
                            </div>
                            <div class="form-check ml-4">
                                <input class="form-check-input" type="checkbox" value="" id="b37" name="b37">
                                <label class="form-check-label" for="b37">
                                    Update Job
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="b38" name="b38">
                                <label class="form-check-label" for="b38">
                                    Store Management
                                </label>
                            </div>
                            <div class="form-check ml-4">
                                <input class="form-check-input" type="checkbox" value="" id="b39" name="b39">
                                <label class="form-check-label" for="b39">
                                    Add a new Product
                                </label>
                            </div>
                            <div class="form-check ml-4">
                                <input class="form-check-input" type="checkbox" value="" id="b40" name="b40">
                                <label class="form-check-label" for="b40">
                                    Edit Product
                                </label>
                            </div>
                        </div>
                        <div class="col-md-8 mx-auto">
                            <button class="btn w-100 bg-primary text-white" type="submit" name="savePerm">
                                <i class="fas fa-save mr-1"></i>Save Permissions
                            </button>
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
