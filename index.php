<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Boxicons -->
    <link
      href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css"
      rel="stylesheet"
    />
    <!-- My CSS -->
    <link rel="stylesheet" href="css/Analytics.css" />
    <link rel="stylesheet" href="css/crud.css" />
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/style.css" />
    <title>Dashboard | 3J's Pharmacy</title>
    <script src="https://www.gstatic.com/firebasejs/8.4.2/firebase.js"></script>
    <style>
      canvas {
        max-width: 700px;
        height: 500px;
        margin: 0 auto;
        display: block;
      }
    </style>
    <!-- <script src="/src/firebase.js"></script> -->
  </head>
 
<body>
  <!-- SIDEBAR -->
  <section id="sidebar">
    <h3 style="text-align: center; margin: 0 auto; display: table; margin-top: 30px;">3J's Pharmacy</h3>
    <ul class="side-menu top">
      <li class="active">
        <a href="index.php">
          <i class="bx bx-user-pin"></i>
          <span class="text">Dashboard</span>
        </a>
      </li>
      <li>
        <a href="users.php">
          <i class="bx bxs-user-account"></i>
          <span class="text">Accounts</span>
        </a>
      </li>
      <li>
        <a href="about.php">
          <i class='bx bxs-group'></i>
          <span class="text">About Us</span>
        </a>
      </li>
    </ul>
    <ul class="side-menu">
      <li>
        <a href="#" class="logout" id="logout">
          <i class="bx bxs-log-out-circle"></i>
          <span class="text">Logout</span>
        </a>
      </li>
    </ul>
  </section>
  <!-- SIDEBAR -->

  <section id="content">
    <nav>
      <i class="bx bx-menu"></i>
      <form action="#">
        <div class="form-input">

        </div>
      </form>
      <input type="checkbox" id="switch-mode" hidden />
      <label for="switch-mode" class="switch-mode"></label>
    </nav>

    <main>
      <div class="head-title">
        <div class="left">
          <h1>Admin Dashboard</h1>
        </div>
      </div>

      <ul class="box-info">
        <a href="sales.php">
          <li>
            <i class="bx bxs-calendar"></i>
            <span class="text">
              <p>Daily Sales Report</p>
            </span>
          </li>
        </a>
        <a href="orders.php">
          <li>
            <i class="bx bx-book"></i>
            <span class="text">
              <p>View ordered prescription</p>
            </span>
          </li>
        </a>
        <a href="inventory.php">
          <li>
            <i class="bx bxs-basket"></i>
            <span class="text">
              <p>Inventory List</p>
            </span>
          </li>
        </a>
        <a href="ongoing.php">
        <li>
          <i class="bx bxs-package"></i>
          <span class="text">
            <p>Ongoing Deliveries</p>
          </span>
        </li>
        </a>
      </ul>


    </main>

  </section>

  <!--Scripts-->
  <script src="js/login.js"></script>
  <script src="js/script.js"></script>
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.js"></script>

</body>
</html>
