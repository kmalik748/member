<?php
  require 'app/app.php';
    if(isset($_POST["del_contact"])){
        $id = $_POST["contact_id"];
        $sql = "DELETE FROM users WHERE id=$id";
        if(phpRunSingleQuery($sql)){
  http://localhost/member/admin_contact.php          js_alert("Contact Deleted!");
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
              <li class="breadcrumb-item active" aria-current="page">Contact Management</li>
          </ol>
      </nav>


    <div class="widget-content">
        <div class="row mt-3">
            <div class="col-md-3" id="customNavTabs">
                <ul class="nav nav-tabs flex-column" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="true">
                            <i class="fas fa-2x fa-user appColor mr-2"></i>
                            <span>Contacts</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="organization-tab" data-toggle="tab" href="#organization" role="tab" aria-controls="organization" aria-selected="false">
                            <i class="fas fa-2x fa-building appColor mr-2"></i>
                            <span>Chapters</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="administrator-tab" data-toggle="tab" href="#administrator" role="tab" aria-controls="administrator" aria-selected="false">
                            <i class="fas fa-2x fa-users-cog appColor mr-2"></i>
                            <span>Administrators</span>
                        </a>
                    </li>
<!--                    <li class="nav-item">-->
<!--                        <a class="nav-link" id="Reports-tab" data-toggle="tab" href="#Reports" role="tab" aria-controls="Reports" aria-selected="false">-->
<!--                            <i class="fas fa-2x fa-chart-bar appColor mr-2"></i>-->
<!--                            <span>Reports</span>-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li class="nav-item">-->
<!--                        <a class="nav-link" id="Settings-tab" data-toggle="tab" href="#Settings" role="tab" aria-controls="Settings" aria-selected="false">-->
<!--                            <i class="fas fa-2x fa-cogs appColor mr-2"></i>-->
<!--                            <span>Settings</span>-->
<!--                        </a>-->
<!--                    </li>-->
                </ul>
            </div>
            <div class="col-md-9">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <a class="btn btn-info mb-2 float-right mr-3" href="admin_createContact.php">
                            Create New Contact
                        </a>

                        <table id="example" class="table table-striped table-bordered bg-white shadow" style="width:100%">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Membership</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            require 'app/db.php';
                            $sql = "SELECT * FROM users WHERE is_admin=0";
//                            echo $sql;
                            $res = mysqli_query($con, $sql);
                            while($row = mysqli_fetch_array($res)){
                                $user = $row["id"];
                                $s = "SELECT * FROM membership_history WHERE userID = $user ORDER BY id DESC LIMIT 1";
                                $r = mysqli_query($con, $s);
                                if(mysqli_num_rows($r)){
                                    $ro = mysqli_fetch_array($r);
                                    $membership = $ro["membershipID"];
                                    $s = "SELECT * FROM memberships WHERE id = $membership";
                                    $r = mysqli_query($con, $s);
                                    $ro = mysqli_fetch_array($r);
                                    $membership = '<b>'.$ro["name"].'</b>';
                                }else{
                                    $membership = "<span class='appColor'>New User</span>";
                                }
                                $rndom = rand();
                                ?>
                                <tr>
                                    <td>
                                        <a href="admin_contact_showProfile.php?userID=<?php echo $user; ?>">
                                            <img src="img/user.jpg" class="rounded mr-2" id="nav_user_pic">
                                            <span class="appColor">
                                                <?php echo $row["first_name"]; ?>
                                            </span>
                                            <p class="font-italic text-dark mb-0" style="margin-left: 35px;"><?php echo $row["email"]; ?></p>
                                        </a>
                                    </td>
                                    <td><?php echo $membership; ?></td>
                                    <td>
                                        <a href="admin_contact_showProfile.php?userID=<?php echo $user; ?>" class="text-info mr-1">
                                            <i class="fas fa-user"></i>
                                        </a>
                                        <a href="admin_editContact.php?id=<?php echo $user; ?>" class="text-success mr-1">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="" class="text-danger mr-1" data-toggle="modal" data-target="#delContact_<?php echo $rndom; ?>">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                                <!-- Membership Modal -->
                                <div class="modal" id="delContact_<?php echo $rndom; ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="" method="POST">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Soft Delete Contact</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <input type="hidden" name="contact_id" value="<?php echo $row["id"]; ?>">
                                                    Are you sure, soft delete contact <?php echo $row["first_name"]; ?>?
                                                </div>

                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-danger" name="del_contact">Delete</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            if(isset($_POST["update_membership"])){
                                $uid = $_POST["user_id"];
                                $membership = $_POST["membership"];
                                $sql = "INSERT INTO membership_history (userID, membershipID) VALUES($uid, $membership)";
                                if(mysqli_query($con, $sql)){
                                    js_alert("Membership Updated!");
                                    js_redirect("./admin_users.php");
                                }
                            }
                            ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Membership</th>
                                <th>Actions</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="organization" role="tabpanel" aria-labelledby="organization-tab">
                        <a class="btn btn-info mb-2 float-right mr-3" href="admin_createOrganization.php">
                            Create New Organization
                        </a>

                        <table id="example" class="table table-striped table-bordered bg-white shadow" style="width:100%">
                            <thead>
                            <tr>
                                <th>Organization Name</th>
                                <th>Category</th>
                                <th>Options</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            require 'app/db.php';
                            $sql = "SELECT * FROM organizations";
                            $res = mysqli_query($con, $sql);
                            while($row = mysqli_fetch_array($res)){
                                $org_name = $row["name"];
                                $org_id = $row["id"];
                                $id = $row["category_id"];
                                $s = "SELECT * FROM organization_category WHERE id = $id";
                                $r = mysqli_query($con, $s);
                                if(mysqli_num_rows($r)){
                                    $ro = mysqli_fetch_array($r);
                                    $cat = $ro["cat"];
                                }
                                $rndom = rand();
                                ?>
                                <tr>
                                    <td>
                                        <a href="admin_contact_showProfile.php?userID=<?php echo $user; ?>" class="appColor">
                                            <?php echo $org_name; ?>
                                        </a>
                                    </td>
                                    <td><?php echo $cat; ?></td>
                                    <td>
                                        <a href="admin_showOrganization.php?id=<?php echo $org_id; ?>" class="text-info mr-1">
                                            <i class="fas fa-user"></i>
                                        </a>
                                        <a href="admin_editOrganization.php?id=<?php echo $org_id; ?>" class="text-success mr-1">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="" class="text-danger mr-1" data-toggle="modal" data-target="#delContact_<?php echo $rndom; ?>">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                                <!-- Membership Modal -->
                                <div class="modal" id="delContact_<?php echo $rndom; ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Soft Delete Contact</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <form action="" method="POST">
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <input type="hidden" name="org_id" value="<?php echo $row["id"]; ?>">
                                                    Are you sure, soft delete  organization <?php echo $org_name; ?>?
                                                </div>

                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-danger" name="del_org">Delete</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            if(isset($_POST["update_membership"])){
                                $uid = $_POST["user_id"];
                                $membership = $_POST["membership"];
                                $sql = "INSERT INTO membership_history (userID, membershipID) VALUES($uid, $membership)";
                                if(mysqli_query($con, $sql)){
                                    js_alert("Membership Updated!");
                                    js_redirect("./admin_users.php");
                                }
                            }
                            ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Organization Name</th>
                                <th>Category</th>
                                <th>Options</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="administrator" role="tabpanel" aria-labelledby="administrator-tab">

                        <a class="btn btn-info mb-2 float-right mr-3" href="admin_createContact_asAdmin.php">
                            Create Administrator
                        </a>

                        <table id="example" class="table table-striped table-bordered bg-white shadow" style="width:100%">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Permissions</th>
                                <th>Last Login</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            require 'app/db.php';
                            $sql = "SELECT * FROM users WHERE is_admin=1";
                            $res = mysqli_query($con, $sql);
                            while($row = mysqli_fetch_array($res)){
                                $user = $row["id"];
                                $s = "SELECT * FROM membership_history WHERE userID = $user ORDER BY id DESC LIMIT 1";
                                $r = mysqli_query($con, $s);
                                if(mysqli_num_rows($r)){
                                    $ro = mysqli_fetch_array($r);
                                    $membership = $ro["membershipID"];
                                    $s = "SELECT * FROM memberships WHERE id = $membership";
                                    $r = mysqli_query($con, $s);
                                    $ro = mysqli_fetch_array($r);
                                    $membership = '<b>'.$ro["name"].'</b>';
                                }else{
                                    $membership = "<span class='appColor'></span>";
                                }
                                $rndom = rand();
                                ?>
                                <tr>
                                    <td>
                                        <a href="admin_contact_showProfile.php?userID=<?php echo $user; ?>">
                                            <img src="img/user.jpg" class="rounded mr-2" id="nav_user_pic">
                                            <span class="appColor">
                                                <?php echo $row["first_name"]; ?>
                                            </span>
                                            <p class="font-italic text-dark mb-0" style="margin-left: 35px;"><?php echo $row["email"]; ?></p>
                                        </a>
                                    </td>
                                    <td>
                                        <p>Manage Permissions: Yes</p>
                                        <p>Manage Inquiries: No</p>
                                        <p>Portal Administrator: No</p>
                                    </td>
                                    <td>
                                        2021-04-12
                                    </td>
                                    <td>
                                        <a href="admin_contact_showProfile.php?userID=<?php echo $user; ?>" class="text-info mr-1">
                                            <i class="fas fa-user"></i>
                                        </a>
                                        <a href="admin_editContact.php?id=<?php echo $user; ?>" class="text-success mr-1">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="" class="text-danger mr-1" data-toggle="modal" data-target="#delContact_<?php echo $rndom; ?>">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                                <!-- Membership Modal -->
                                <div class="modal" id="delContact_<?php echo $rndom; ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <form action="" method="POST">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Soft Delete Contact</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <input type="hidden" value="<?php echo $row["id"]; ?>" name="contact_id">
                                                    Are you sure, soft delete this contact?
                                                </div>

                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-danger" name="del_contact">Delete</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            if(isset($_POST["update_membership"])){
                                $uid = $_POST["user_id"];
                                $membership = $_POST["membership"];
                                $sql = "INSERT INTO membership_history (userID, membershipID) VALUES($uid, $membership)";
                                if(mysqli_query($con, $sql)){
                                    js_alert("Membership Updated!");
                                    js_redirect("./admin_users.php");
                                }
                            }
                            ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Membership</th>
                                <th>Actions</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="Reports" role="tabpanel" aria-labelledby="Reports-tab">
                        Reports Tab Content
                    </div>
                    <div class="tab-pane fade" id="Settings" role="tabpanel" aria-labelledby="Settings-tab">
                        Settings Tab Content
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
