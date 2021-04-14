<?php
  require 'app/app.php';
?>
<!DOCTYPE html>
<html lang="en">

<?php
  $path =  "";
  $title =  "SignUp";
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
    
    <h3>Sign Up to continue..</h3>
    <!-- Message from server -->
    <div class="container">
      <hr>
      <div id="alerts"></div>
    </div>

    <!-- Login Form -->
    <form>
      <input type="text" id="name" class="fadeIn second" name="username" placeholder="Full Name" required>
      <input type="email" id="email" class="fadeIn second" name="email" placeholder="Email" required>
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="password" required>
      <input type="button" id="signup_btn" class="fadeIn fourth" value="Sign Up" onclick="check_signUp()">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="./">Already have account?</a>
    </div>

  </div>
</div>
  </div>

<?php
  require 'parts/footer.php';
?>
<script>
function check_signUp(){
  var name = $("#name").val();
  var email = $("#email").val();
  var password = $("#password").val();

  if(name==''){
    var invalidLogin = `<div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Error!</strong> Name must be filled!
                    </div>`;

    $("#alerts").html(invalidLogin);
    return;
  }
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
  
  submit_signUp(name, email, password);
}

function submit_signUp(name, email, password){
    $("#signup_btn").attr('value', 'Signing Up...'); 
     $.ajax({
        url: "api/signUp.php",
        type: "post",
        data: {
          username: name,
          email: email,
          password: password
      },
        success: function (response) {
          console.log(response);
          $("#signup_btn").attr('value', 'Sign Up');
          if(response.Response){
            var loginSuccess = `<div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Success!</strong> Login to continue...
                            </div>`;

            $("#alerts").html(loginSuccess);
          }else{
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
