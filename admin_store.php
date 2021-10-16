<?php
  require 'app/app.php';
    if(isset($_POST["add_new_product"])){
        $name = $_POST["name"];
        $overview = $_POST["overview"];
        $cat = $_POST["cat"];
        $m_price = $_POST["m_price"];
        $nm_price = $_POST["nm_price"];

        $banner=$_FILES['banner']['name'];
        $expbanner=explode('.',$banner);
        $bannerexptype=$expbanner[1];
        date_default_timezone_set('Australia/Melbourne');
        $date = date('m/d/Yh:i:sa', time());
        $rand=rand(10000,99999);
        $encname=$date.$rand;
        $bannername=md5($encname).'.'.$bannerexptype;
        $bannerpath="uploads/products/".$bannername;
        move_uploaded_file($_FILES["banner"]["tmp_name"],$bannerpath);


        $sql = "INSERT INTO products (name, description, cat, m_price, nm_price, banner) VALUES ('$name', '$overview', '$cat', $m_price, $nm_price, '$bannername')";
        if(phpRunSingleQuery($sql)){
            js_alert("Product Added!");
            js_redirect("admin_store.php");
        }else{
            js_alert("ERROR");
        }
    }
    if(isset($_POST["update_committee"])){
        $course_name = $_POST["course_name"];
        $course_content = $_POST["course_content"];
        $course_msg = $_POST["course_msg"];
        $course_id = $_POST["course_id"];
        $sql = "UPDATE lms set name='$course_name', content='$course_content', message='$course_msg' WHERE id=$course_id";
        if(phpRunSingleQuery($sql)){
            js_alert("Course Updated!");
            js_redirect("admin_lms.php");
        }else{
            js_alert("ERROR");
        }
    }
    if(isset($_GET["switch"])){
        $visible = $_GET["switch"];
        $id = $_GET["id"];
        $sql = "UPDATE lms set visible=$visible WHERE id=$id";
        if(phpRunSingleQuery($sql)){
            js_alert("Settings Updated!");
            js_redirect("admin_lms.php");
        }else{
            js_alert("ERROR");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<?php
  $path =  "";
  $title =  "Store";
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
              <li class="breadcrumb-item active" aria-current="page">Store</li>
          </ol>
      </nav>


    <div class="widget-content">
        <div class="row mt-3">
            <div class="col-md-3" id="customNavTabs">
                <ul class="nav nav-tabs flex-column" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="true">
                            <i class="fas fa-2x fa-cookie-bite appColor mr-2"></i>
                            <span>Add Product</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="organization-tab" data-toggle="tab" href="#organization" role="tab" aria-controls="organization" aria-selected="false">
                            <i class="fas fa-2x fa-tasks appColor mr-2"></i>
                            <span>Manage Products</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-9">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="card">
                                    <div class="card-header">
                                        <i class="fas fa-edit mr-2"></i>Add a new Fundraiser
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" action=""  enctype="multipart/form-data">
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Product Name</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="inputEmail3" name="name" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Description</label>
                                                <div class="col-sm-6">
                                                    <textarea class="form-control" name="overview" style="width: inherit"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Category:</label>
                                                <div class="col-sm-6">
                                                    <select class="form-control" id="exampleFormControlSelect1" name="cat">
                                                        <option>Select Category</option>
                                                        <option value="Artwork">Artwork</option>
                                                        <option value="Clothing">Clothing</option>
                                                        <option value="Drawing and Pastel">Drawing and Pastel</option>
                                                        <option value="Fundraiser">Fundraiser</option>
                                                        <option value="Insurance">Insurance</option>
                                                        <option value="Mixed Media and Printmaking">Mixed Media and Printmaking</option>
                                                        <option value="Publications">Publications</option>
                                                        <option value="Sponsorship">Sponsorship</option>
                                                        <option value="SWAG">SWAG</option>
                                                        <option value="Training">Training</option>
                                                        <option value="Watercolor">Watercolor</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Member Price</label>
                                                <div class="col-sm-6">
                                                    <input type="number" class="form-control" id="inputEmail3" name="m_price" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Non-Member Price</label>
                                                <div class="col-sm-6">
                                                    <input type="number" class="form-control" id="inputEmail3" name="nm_price" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Product Banner</label>
                                                <div class="col-sm-6">
                                                    <input type="file" class="form-control" id="inputEmail3" name="banner" required>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <button type="submit" class="btn btn-info w-100 mt-2 bg-appColor" name="add_new_product">
                                                        <i class="fas fa-save"></i>
                                                        Save
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="organization" role="tabpanel" aria-labelledby="organization-tab">
                        <a class="btn btn-info mb-2 float-right mr-3" href="admin_store.php">
                            Add new Product
                        </a>

                        <table id="example" class="table table-striped table-bordered bg-white shadow" style="width:100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Pic</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Non Member Price</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            require 'app/db.php';
                            $sql = "SELECT * FROM products";
                            $res = mysqli_query($con, $sql);
                            while($row = mysqli_fetch_array($res)){
                                $rndom = rand();
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $row["id"]; ?>
                                    </td>
                                    <td>
                                        <a href="" class="appColor"  data-toggle="modal" data-target="#editContact_<?php echo $rndom; ?>">
                                            <?php echo $row["name"]; ?>
                                        </a>
                                    </td>
                                    <td>
                                        <img style="width: 50px;" src="uploads/products/<?php echo $row["banner"]; ?>" alt="">
                                    </td>
                                    <td><?php echo strlen($row["description"]) >= 500 ?
                                            substr($row["description"], 0, 490) . ' <a data-toggle="modal" data-target="#editContact_<?php echo $rndom; ?>">[Read more]</a>' :
                                            $row["description"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $row["cat"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $row["m_price"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $row["nm_price"]; ?>
                                    </td>
                                    <td>
                                        <a href="" class="text-danger mr-1" data-toggle="modal" data-target="#editContact_<?php echo $rndom; ?>">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                                <!-- Membership Modal -->
                                <div class="modal" id="editContact_<?php echo $rndom; ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit Product Details</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <form action="" method="POST">
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                                                    <div class="form-group row">
                                                        <label for="EmailContent" class="col-sm-3 col-form-label">Name</label>
                                                        <div class="col-sm-12">
                                                            <input class="form-control" name="name" required="" value="<?php echo $row["name"]; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="EmailContent" class="col-sm-12 col-form-label">Details</label>
                                                        <div class="col-sm-12">
                                                            <textarea rows="5" class="form-control" name="content" required=""><?php echo $row["description"]; ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="EmailContent" class="col-sm-12 col-form-label">Member Price</label>
                                                        <div class="col-sm-12">
                                                            <input type="number" class="form-control" name="m_price" required="" value="<?php echo $row["m_price"]; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="EmailContent" class="col-sm-12 col-form-label">Non member price</label>
                                                        <div class="col-sm-12">
                                                            <input type="number" class="form-control" name="nm_price" required="" value="<?php echo $row["nm_price"]; ?>">
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-danger" name="update">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            if(isset($_POST["update"])){
                                $id = $_POST["id"];
                                $name = $_POST["name"];
                                $content = $_POST["content"];
                                $description = $_POST["content"];
                                $m_price = $_POST["m_price"];
                                $nm_price = $_POST["nm_price"];

                                $sql = "UPDATE products SET name='$name', description='$description', m_price=$m_price, nm_price=$nm_price
                                         WHERE id = $id";
                                if(mysqli_query($con, $sql)){
                                    js_alert("Product Updated!");
                                    js_redirect("./admin_store.php");
                                }else{
                                    js_alert(mysqli_error($con));
                                }
                            }
                            ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Pic</th>
                                <th>Description</th>
                                <th>Goal</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Actions</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

      <!-- Add new category -->
      <div class="modal" id="addNewRoleModal">
          <div class="modal-dialog">
              <div class="modal-content">

                  <form action="" method="POST">
                      <div class="modal-header">
                          <h4 class="modal-title">Add New Role</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>

                      <!-- Modal body -->
                      <div class="modal-body">
                          <div class="form-group">
                              <label for="exampleInputPassword1">Role Name</label>
                              <input type="text" class="form-control" name="role" placeholder="New Role Name">
                          </div>
                      </div>

                      <!-- Modal footer -->
                      <div class="modal-footer">
                          <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                          <button class="btn btn-danger" type="submit" name="add_newRole">Add</button>
                      </div>
                  </form>
                  <?php
                  if(isset($_POST["add_newRole"])){
                      $name = $_POST["role"];
                      $sql = "INSERT INTO committee_roles (role) VALUES ('$name')";
                      if(mysqli_query($con, $sql)){
                          js_alert("Role was added!");
                          js_redirect("./admin_committees.php");
                      }
                  }
                  ?>
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
