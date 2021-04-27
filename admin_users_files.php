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
  $title =  "Users Files";
  require 'parts/head.php';
?>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css"></link>

<body>
<style>
    .accordion-section .panel-default > .panel-heading {
        border: 0;
        background: #f4f4f4;
        padding: 0;
    }
    .accordion-section .panel-default .panel-title a {
        display: block;
        font-style: italic;
        font-size: 1.5rem;
    }
    .accordion-section .panel-default .panel-title a:after {
        font-family: 'FontAwesome';
        font-style: normal;
        font-size: 3rem;
        content: "\f106";
        color: #1f7de2;
        float: right;
        margin-top: -12px;
    }
    .accordion-section .panel-default .panel-title a.collapsed:after {
        content: "\f107";
    }
    .accordion-section .panel-default .panel-body {
        font-size: 1.2rem;
    }
</style>
  <?php require 'parts/nav.php'; ?>

  <!-- Page Content -->
  <div class="container">

      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white">
          <li class="breadcrumb-item"><a href="admin_dashboard.php" class="appColor">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Users Management</li>
        </ol>
      </nav>


      <section class="accordion-section clearfix mt-3" aria-label="Question Accordions">
          <div class="container">
              <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
      <?php
      $rows = phpMysqliFetchAll("SELECT * FROM users");
      foreach ($rows as $row){
          $uid = $row["id"];
          ?>
          <div class="panel panel-default">
              <div class="panel-heading p-3 mb-3" role="tab" id="heading0">
                  <h3 class="panel-title">
                      <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse_<?php echo $row["id"]; ?>" aria-expanded="true" aria-controls="collapse0">
                          What are the benefits of Solodev CMS?
                      </a>
                  </h3>
              </div>
              <div id="collapse_<?php echo $row["id"]; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading0">
                  <div class="panel-body px-3 mb-4">
                      <?php
          $rows1 = phpMysqliFetchAll("SELECT * FROM users_files WHERE user_id=$uid");
          foreach ($rows1 as $row1){
          ?>
                      <?php echo $row1["filename"]; ?>
                      <?php } ?>
                  </div>
              </div>
          </div>
          <?php
      }
      ?>
              </div>
        </div>
      </section>


  </div>

<?php
  require 'parts/footer.php';
?>

<script>
    $('.panel-collapse').on('show.bs.collapse', function () {
        $(this).parent('.panel').find('.fa-minus').show();
        $(this).parent('.panel').find('.fa-plus').hide();
    })
    $('.panel-collapse').on('hide.bs.collapse', function () {
        $(this).parent('.panel').find('.fa-minus').hide();
        $(this).parent('.panel').find('.fa-plus').show();
    })
</script>
</body>

</html>
