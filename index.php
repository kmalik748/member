<?php
  require 'app/app.php';
?>
<!DOCTYPE html>
<html lang="en">

<?php
  $path =  "";
  $title =  "Login";
  require 'parts/head.php';
?>
  <link href="vendor/css/login.css" rel="stylesheet">

<body>

  <?php require 'parts/nav.php'; ?>

  <!-- Page Content -->
  <div class="container">
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="img/user.png" id="icon" alt="User Icon" />
    </div>
    
    <h3>Welcome Back!</h3>
    <!-- Message from server -->
    <div class="container">
      <hr>
      <div id="alerts"></div>
    </div>
    <!-- Login Form -->
    <form>
      <input type="text" id="email" class="fadeIn second" name="email" placeholder="Email">
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password">
      <input type="button" id="login_btn" onclick="check_logIn()" class="fadeIn fourth" value="Log In">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="signup.php">Sign Up?</a>
    </div>

  </div>
</div>
  </div>

<?php
  require 'parts/footer.php';
?>
<script>
function check_logIn(){
  var email = $("#email").val();
  var password = $("#password").val();

  if(email==''){
            var invalidLogin = `<div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Error!</strong> Email must be filled!
                            </div>`;

            $("#alerts").html(invalidLogin);
    return;
  }
  if(password==''){
            var invalidLogin = `<div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Error!</strong> Password must be filled!
                            </div>`;
            $("#alerts").html(invalidLogin);
    return;
  }
  
  submit_logIn(email, password);
}

function submit_logIn(email, password){
    $("#login_btn").attr('value', 'Logging In...'); 
     $.ajax({
        url: "api/logIn.php",
        type: "post",
        data: {
          email: email,
          password: password
      },
        success: function (response) {
          $("#login_btn").attr('value', 'Sign Up');
          if(response.Response){
            var loginSuccess = `<div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>LoggedIn!</strong> Redirecting to dashboard....
                            </div>`;

            $("#alerts").html(loginSuccess);
            if(response.is_admin){
              window.location.replace("admin_dashboard.php");
            }else{
              window.location.replace("user_dashboard.php");
            }

          }
          if(!response.Response){
            var invalidLogin = `<div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Error!</strong> `+response.msg+`
                            </div>`;

            $("#alerts").html(invalidLogin);
          }
        },
        error: function(jqXHR, textStatus, errorThrown) {
          alert("Error while sending request!" + textStatus);
           console.log(textStatus, errorThrown);
        }
    });
}
</script>
</body>

</html>
