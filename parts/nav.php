  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top mb-3 myCustomNav">
    <div class="container">
      <a class="navbar-brand" href="#">Ace Motorsports</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <?php
          session_start();
          if(isset($_SESSION["id"]) && $_SESSION["is_admin"]){
            ?>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item <?php if($title=='User Dashboard' || $title=='Admin Dashboard') echo 'active'; ?>">
            <a class="nav-link" href="./admin_dashboard.php">Dashboard</a>
          </li>
          <li class="nav-item <?php if($title=='Users') echo 'active'; ?>">
            <a class="nav-link" href="./admin_users.php">Users</a>
          </li>
          <li class="nav-item <?php if($title=='Membership') echo 'active'; ?>">
            <a class="nav-link" href="./admin_membership.php">Membership Plans</a>
          </li>
          <li class="nav-item <?php if($title=='Contact Management') echo 'active'; ?>">
            <a class="nav-link" href="./admin_contact.php">Contacts</a>
          </li>
          <li class="nav-item">
              <div class="dropdown">
                <button type="button" class="btn btn-primary dropdown-toggle bg-transparent border-0" data-toggle="dropdown">
                  <img src="img/user.jpg" class="rounded" id="nav_user_pic"> <?php echo $_SESSION["name"]; ?>
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">Profile</a>
                  <a class="dropdown-item" href="#">Settings</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="./parts/logout.php">Logout</a>
                </div>
              </div>
          </li>
        </ul>
            <?php
          }
          if(isset($_SESSION["id"]) && !$_SESSION["is_admin"]){
            ?>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item <?php if($title=='User Dashboard' || $title=='Admin Dashboard') echo 'active'; ?>">
            <a class="nav-link" href="./admin_dashboard.php">Dashboard</a>
          </li>
          <li class="nav-item">
              <div class="dropdown">
                <button type="button" class="btn btn-primary dropdown-toggle bg-dark border-0" data-toggle="dropdown">
                  <img src="img/user.jpg" class="rounded" id="nav_user_pic"> <?php echo $_SESSION["name"]; ?>
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">Profile</a>
                  <a class="dropdown-item" href="#">Settings</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="./parts/logout.php">Logout</a>
                </div>
              </div>
          </li>
        </ul>
            <?php
          }
          if(!isset($_SESSION["id"])){
            ?>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item <?php if($title=='Login') echo 'active'; ?>">
            <a class="nav-link" href="./">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if($title=='SignUp') echo 'active'; ?>" href="./signup.php">SignUp</a>
          </li>
        </ul>
          <?php
          }
        ?>
      </div>
    </div>
  </nav>