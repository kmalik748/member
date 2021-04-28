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
<style>
    .bs-example{
        margin: 20px;
    }
    .accordion .fa{
        margin-right: 0.5rem;
        font-size: 24px;
        font-weight: bold;
        position: relative;
        top: 2px;
    }
</style>
<script>
    $(document).ready(function(){
        // Add down arrow icon for collapse element which is open by default
        $(".collapse.show").each(function(){
            $(this).prev(".card-header").find(".fa").addClass("fa-angle-down").removeClass("fa-angle-right");
        });

        // Toggle right and down arrow icon on show hide of collapse element
        $(".collapse").on('show.bs.collapse', function(){
            $(this).prev(".card-header").find(".fa").removeClass("fa-angle-right").addClass("fa-angle-down");
        }).on('hide.bs.collapse', function(){
            $(this).prev(".card-header").find(".fa").removeClass("fa-angle-down").addClass("fa-angle-right");
        });
    });
</script>

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



      <div class="accordion" id="accordionExample">
      <?php
      $rows = phpMysqliFetchAll("SELECT * FROM users");
      foreach ($rows as $row){
          $uid = $row["id"];
          $name = $row["first_name"].' '.$row["middle_name"].' '.$row["last_name"];
          ?>
          <div class="card">
              <div class="card-header" id="headingOne">
                  <h2 class="mb-0">
                      <button type="button" class="btn  text-dark" data-toggle="collapse" data-target="#open_<?php echo $row["id"]; ?>">
                          <i class="fa fa-angle-right"></i>
                          <i class="fas fa-user"></i> <?php echo $name; ?>
                      </button>
                  </h2>
              </div>
              <div id="open_<?php echo $row["id"]; ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                  <div class="card-body">
                      <div class="d-flex">
                      <?php
          $rows1 = phpMysqliFetchAll("SELECT * FROM users_files WHERE user_id=$uid");
          foreach ($rows1 as $row){
          ?>
                  <div class="flex flex-column mr-2">
                      <a target="_blank" href="uploads/<?php echo $row['filename']; ?>">
                          <p class="d-flex justify-content-center">
                              <i class="fas fa-3x fa-file-word"></i>
                          </p>
                          <p style="max-width: 100px;" class="text-center"><?php echo $row["filename"]; ?></p>
                      </a>
                  </div>
                      <?php } ?>

                      </div>
                  </div>
              </div>
          </div>
          <?php
      }
      ?>
     </div>






  </div>

<?php
  require 'parts/footer.php';
?>

</body>

</html>
