<?php
  include('db_conn.php');
  session_start();
?>
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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
    <title>Dashboard | 3J's Pharmacy</title>
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
        <li class="active" >
          <a href="index.php">
            <i class="bx bx-user-pin"></i>
            <span class="text">Dashboard</span>
          </a>
        </li>
        <li >
          <a href="users.php">
            <i class="bx bxs-user-account"></i>
            <span class="text">Accounts</span>
          </a>
        </li>
       <li>
				<a href="about.php">
					<i class='bx bxs-group' ></i>
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
      <!-- NAVBAR -->
      <nav>
        <i class="bx bx-menu"></i>
        <form action="#">
          <div class="form-input">
            </button>
          </div>
        </form>
        <input type="checkbox" id="switch-mode" hidden />
        <label for="switch-mode" class="switch-mode"></label>
      </nav>

      <main>
        <div class="table-data">
          <div class="order">
            <div class="head">
              <h3 style="text-align: center !important">Sales Report</h3>
            </div>
            <form action="functions.php" method="POST">
              <div class="row text-center">
                <div class="col">
                  <label for="start_date">Start Date:</label>
                  <input class="form-control" type="date" name="start_date" id="start_date" required>
                </div>
                <div class="col">
                  <label for="end_date">End Date:</label>
                  <input class="form-control" type="date" name="end_date" id="end_date" required>
                </div>
              </div>
              <div class="text-center mt-3">
                <button class="btn btn-primary w-50" name="generate_report">Generate Report</button>
              </div>
            </form>

            <table class="mt-5" id="myTable">
              <thead>
                  <tr>
                      <th>Customer Name</th>
                      <th>Date Ordered</th>
                      <th>Date Delivered</th>
                      <th>Product</th>
                      <th>Amount</th>
                  </tr>
              </thead>
              <tbody>
                <?php
                // Display the stored report from the session
                if (isset($_SESSION['sales_report'])) {
                    echo $_SESSION['sales_report'];
                }
                ?>
            </tbody>
          </table>
          </div>
        </div>
      </main>
      <!-- MAIN -->
    </section>
    <!-- CONTENT -->

  <!--Scripts-->
  <script src="js/login.js"></script>
  <script src="js/script.js"></script>
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
  <script>
    $('#myTable').DataTable();
  </script>
</body>
</html>
