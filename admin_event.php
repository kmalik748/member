<?php
  require 'app/app.php';
  require 'app/db.php';
    if(isset($_POST["del_event"])){
        $id = $_POST["event_id"];
        $sql = "DELETE FROM event WHERE id=$id";
        if(phpRunSingleQuery($sql)){
			js_alert("Event Deleted!");
            js_redirect("admin_event.php");
        }else{
            js_alert("ERROR");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<?php
  $path =  "";
  $title =  "Event Management";
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
              <li class="breadcrumb-item active" aria-current="page">Event Management</li>
          </ol>
      </nav>


    <div class="widget-content">
        <div class="row mt-3">
            <div class="col-md-3" id="customNavTabs">
                <ul class="nav nav-tabs flex-column" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="New-tab" data-toggle="tab" href="#New" role="tab" aria-controls="New" aria-selected="true">
                            <i class="fas fa-2x fa-user appColor mr-2"></i>
                            <span>New Event</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="All-tab" data-toggle="tab" href="#All" role="tab" aria-controls="All" aria-selected="false">
                            <i class="fas fa-2x fa-building appColor mr-2"></i>
                            <span>All Events</span>
                        </a>
                    </li>
					<li class="nav-item">
                        <a class="nav-link" id="Reports-tab" data-toggle="tab" href="#Reports" role="tab" aria-controls="Reports" aria-selected="false">
							<i class="fas fa-2x fa-chart-bar appColor mr-2"></i>
                            <span>Reports</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="catagory-tab" data-toggle="tab" href="#catagory" role="tab" aria-controls="catagory" aria-selected="false">
                            <i class="fas fa-2x fa-users-cog appColor mr-2"></i>
                            <span>Catagories</span>
                        </a>
                    </li>
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
                    <div class="tab-pane fade show active" id="New" role="tabpanel" aria-labelledby="New-tab">

						
                <div class="card bg-white shadow" style="width:100%">
                    <div class="card-header">
                        <i class="fas fa-edit mr-2"></i>Create New Event
                    </div>
                    <div class="card-body">
                        <form method="POST" action="" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label for="Catagory" class="col-sm-3 col-form-label">Catagory Name </label>
                                <div class="col-sm-6">
                                    <select class="form-control" id="exampleFormControlSelect1" name="Catagory" required>
                                        <option>-- Select Catagory --</option>
                                        <?php
                                        $rows = allCatagories();
                                        foreach ($rows as $row){
                                            echo '
                                            <option value="'.$row["id"].'">'.$row["name"].'</option>
                                            ';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCatagory">
                                        Add Catagory
                                    </button>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Name" class="col-sm-3 col-form-label">Event Name</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="Name" name="Name" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Badge" class="col-sm-3 col-form-label">As Appears on Badge</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="Badge" name="Badge" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Description" class="col-sm-3 col-form-label">Description</label>
                                <div class="col-sm-6">
									<textarea rows="5" class="form-control" id="Description" name="Description" required></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Logo" class="col-sm-3 col-form-label">Event Logo</label>
                                <div class="col-sm-6">
                                    <input type="file" class="form-control" id="Logo" name="Logo" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Banner" class="col-sm-3 col-form-label">Event Banner</label>
                                <div class="col-sm-6">
                                    <input type="file" class="form-control" id="Banner" name="Banner" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Start" class="col-sm-3 col-form-label">Start Date</label>
                                <div class="col-sm-6">
                                    <input type="date" class="form-control" id="Start" name="Start" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="End" class="col-sm-3 col-form-label">End Date</label>
                                <div class="col-sm-6">
                                    <input type="date" class="form-control" id="End" name="End" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Address1" class="col-sm-3 col-form-label">Address 1</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="Address1" name="Address1" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Address2" class="col-sm-3 col-form-label">Address 2</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="Address2" name="Address2" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="City" class="col-sm-3 col-form-label">City</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="City" name="City" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Country" class="col-sm-3 col-form-label">Country</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="Country" name="Country" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Region" class="col-sm-3 col-form-label">Region</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="Region" name="Region" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="PostalCode" class="col-sm-3 col-form-label">Postal Code</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="PostalCode" name="PostalCode" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-info" name="add_new_event">
                                    <i class="fa fa-save"></i>
                                    Create
                                </button>
                            </div>
                        </form>

      <?php
        if(isset($_POST["add_new_event"])){
			$Catagory = $_POST["Catagory"];
            $Name = $_POST["Name"];
			$Badge = $_POST["Badge"];
			$Description = $_POST["Description"];
			$Start = $_POST["Start"];
			$End = $_POST["End"];
			$Address1 = $_POST["Address1"];
			$Address2 = $_POST["Address2"];
			$City = $_POST["City"];
			$Country = $_POST["Country"];
			$Region = $_POST["Region"];
			$PostalCode = $_POST["PostalCode"];
			if($_FILES['Logo']['name']!=''){
				$getLPro1="SELECT MAX(Id) FROM event";
				$getLPro2=mysqli_query($con,$getLPro1);
				$getLPro3=mysqli_fetch_assoc($getLPro2);
				$getLPro4=$getLPro3["MAX(Id)"]+1;
				$ImgName=$_FILES['Logo']['name'];
				$Ext=pathinfo($ImgName,PATHINFO_EXTENSION);
				$Logo='el'.$getLPro4.".".$Ext;

				$dir="uploads/";
				$dir=$dir.$Logo;
				move_uploaded_file($_FILES['Logo']['tmp_name'],$dir);
			}else{$Logo='';}
			if($_FILES['Banner']['name']!=''){
				$getLPro1="SELECT MAX(Id) FROM event";
				$getLPro2=mysqli_query($con,$getLPro1);
				$getLPro3=mysqli_fetch_assoc($getLPro2);
				$getLPro4=$getLPro3["MAX(Id)"]+1;
				$ImgName=$_FILES['Banner']['name'];
				$Ext=pathinfo($ImgName,PATHINFO_EXTENSION);
				$Banner='eb'.$getLPro4.".".$Ext;

				$dir="uploads/";
				$dir=$dir.$Banner;
				move_uploaded_file($_FILES['Banner']['tmp_name'],$dir);
			}else{$Banner='';}
			echo $Logo;
			echo $Banner;

            $sql = "INSERT INTO event (catagory, name, badge, description, logo, banner, start_date, end_date, address1, address2, city, country, region, code, date_time)
                    VALUES ('$Catagory', '$Name', '$Badge', '$Description', '$Logo', '$Banner', '$Start', '$End', '$Address1', '$Address2', '$City', '$Country', '$Region', '$PostalCode', now())";
            $output = phpRunSingleQuery($sql);

            if($output == true){
                js_alert("Events Added Successfully!");
                js_redirect("admin_event.php");
            }else{
                js_alert("Error! Check console for details! ");
                js_redirect("admin_event.php");
            }
        }
      ?>

                    </div>
                </div>
                    </div>
      <!-- Modal -->
      <div class="modal fade" id="addCatagory" tabindex="-1" role="dialog" aria-labelledby="addCatagory" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Add Catagory</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                          <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Name</label>
                              <input type="text" class="form-control" id="exampleInputEmail1" name="new_cat" placeholder="New Catagory Name">
                          </div>
                          <hr>
                          <div align="right">
                              <button type="submit" class="btn btn-info" name="add_new_cat">
                                  <i class="mr-2 fas fa-save"></i>Add
                              </button>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>

      <?php
        if(isset($_POST["add_new_cat"])){
            $name = $_POST["new_cat"];

            $sql = "INSERT INTO catagories (name) VALUES ('$name')";
            $output = phpRunSingleQuery($sql);
            if($output == true){
                js_alert("Catagory Added Successfully!");
                js_redirect("admin_event.php");
            }else{
                js_alert("Error! Check console for details! ");
                js_redirect("admin_event.php");
            }
        }
      ?>
						
                    <div class="tab-pane fade" id="All" role="tabpanel" aria-labelledby="All-tab">
                        <table id="example" class="table table-striped table-bordered bg-white shadow" style="width:100%">
                            <thead>
                            <tr>
                                <th>Catagory</th>
                                <th>Name</th>
                                <th>Badge</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            require 'app/db.php';
                            $sql = "SELECT * FROM event";
                            $res = mysqli_query($con, $sql);
                            while($row = mysqli_fetch_assoc($res)){
                                $Catagory = $row["catagory"];
                                $Name = $row["name"];
                                $Badge = $row["badge"];
                                $Start = $row["start_date"];
                                $End = $row["end_date"];
                                $event_id = $row["id"];
								
								$s = "SELECT * FROM catagories WHERE id = $Catagory";
								$r = mysqli_query($con, $s);
								$ro = mysqli_fetch_array($r);
								$Catagory = '<b>'.$ro["name"].'</b>';
								$rndom = rand();
                                ?>
                                <tr>
                                    <td><?php echo $Catagory; ?></td>
                                    <td><?php echo $Name; ?></td>
                                    <td><?php echo $Badge; ?></td>
                                    <td><?php echo $Start; ?></td>
                                    <td><?php echo $End; ?></td>
                                    <td>
                                        <a href="admin_editEvent.php?id=<?php echo $event_id; ?>" class="text-success mr-1">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="" class="text-danger mr-1" data-toggle="modal" data-target="#delEvent_<?php echo $rndom; ?>">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Catagory</th>
                                <th>Name</th>
                                <th>Badge</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="Reports" role="tabpanel" aria-labelledby="Reports-tab">
                        
                        <table id="example" class="table table-striped table-bordered bg-white shadow" style="width:100%">
                            <thead>
                            <tr>
                                <th>Catagory</th>
                                <th>Name</th>
                                <th>Badge</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                 <tr class="odd">
                                    <td class="sorting_1"><b>hello</b></td>
                                    <td>weqw</td>
                                    <td>asdas</td>
                                    <td>2311-12-31</td>
                                    <td>2312-12-31</td>
                                    <td>
                                        <a href="admin_editEvent.php?id=1" class="text-success mr-1">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="" class="text-danger mr-1" data-toggle="modal" data-target="#delEvent_1380693133">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
								<tr class="even">
                                    <td class="sorting_1"><b>hello</b></td>
                                    <td>asdas</td>
                                    <td>dsad</td>
                                    <td>1211-12-21</td>
                                    <td>2112-12-21</td>
                                    <td>
                                        <a href="admin_editEvent.php?id=2" class="text-success mr-1">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="" class="text-danger mr-1" data-toggle="modal" data-target="#delEvent_570901722">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Catagory</th>
                                <th>Name</th>
                                <th>Badge</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="catagory" role="tabpanel" aria-labelledby="catagory-tab">
                        
                        <table id="example" class="table table-striped table-bordered bg-white shadow" style="width:100%">
                            <thead>
                            <tr>
                                <th>Catagory</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            require 'app/db.php';
                            $sql = "SELECT * FROM catagories";
                            $res = mysqli_query($con, $sql);
                            while($row = mysqli_fetch_assoc($res)){
                                $Catagory = $row["name"];
								$rndom = rand();
                                ?>
                                <tr>
                                    <td><?php echo $Catagory; ?></td>
                                    <td>
                                        <a href="" class="text-danger mr-1" data-toggle="modal" data-target="#delCatagory_<?php echo $rndom; ?>">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Catagory</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                        </table>
								
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
