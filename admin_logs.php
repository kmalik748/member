<?php
  require 'app/app.php';
  session_start();
  if(!isset($_SESSION["id"])){
    js_alert("Session Expired! Please login again to continue...");
    js_redirect("./");
  }
  if(isset($_SESSION["is_admin"]) && !$_SESSION["is_admin"]){
    js_redirect("./user_dashboard.php");
  }
?>
<!DOCTYPE html>
<html lang="en">

<?php
  $path =  "";
  $title =  "Admin Logs";
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
          <li class="breadcrumb-item active" aria-current="page">Users Management</li>
        </ol>
      </nav>

      <table id="example" class="table table-striped table-bordered bg-white shadow" style="width:100%">
        <thead>
            <tr>
                <th>Log ID</th>
                <th>Log Details</th>
                <th>Time</th>
            </tr>
        </thead>
        <tbody>
                <?php
                    $rows = phpMysqliFetchAll("SELECT * FROM adminlogs");
                    foreach ($rows as $row){
                        ?>
                            <tr>
                                <td><?php echo $row["id"]; ?></td>
                                <td><?php echo $row["message"]; ?></td>
                                <td><?php echo date("M d, Y    h:i A", strtotime($row["date_time"])); ?></td>
                            </tr>
                        <?php
                    }
                ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Log ID</th>
                <th>Log Details</th>
                <th>Time</th>
            </tr>
        </tfoot>
    </table>
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
