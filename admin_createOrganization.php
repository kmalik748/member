<?php
  require 'app/app.php';
?>
<!DOCTYPE html>
<html lang="en">

<?php
  $path =  "";
  $title =  "Edit Organization";
  require 'parts/head.php';
?>

<body>

  <?php require 'parts/nav.php'; ?>

  <!-- Page Content -->
  <div class="container">

      <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-white">
              <li class="breadcrumb-item"><a href="admin_dashboard.php" class="appColor">Home</a></li>
              <li class="breadcrumb-item"><a href="admin_contact.php" class="appColor">Contacts</a></li>
              <li class="breadcrumb-item active" aria-current="page">Create Organization</li>
          </ol>
      </nav>


    <div class="widget-content" style="border: none; background: transparent;">
        <div class="row mt-3">

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-building mr-2"></i>Create Organizations
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Organization Name </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputEmail3">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Acronym</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputEmail3">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Website Address</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputEmail3"">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="inputEmail3">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Instagram Account</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputEmail3">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Twitter Account</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputEmail3">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Facebook Account</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputEmail3">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">LinkedIn Account</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputEmail3"">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Parent Organization</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option>Association Plus</option>
                                        <option>Demo Organization</option>
                                        <option>Organization 123</option>
                                        <option>Ahmed Complex</option>
                                        <option>UPT Inc.</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="float-right">
                                    <button type="submit" class="btn btn-info">ADD</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>



        </div>
    </div>

<?php
  require 'parts/footer.php';
?>


</body>

</html>
