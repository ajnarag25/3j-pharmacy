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
    <title>Orders & Prescription | 3J's Pharmacy</title>
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
        <li class="active" >
          <a href="dashboard.php">
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
					<i class='bx bxs-group' ></i>
					<span class="text">About Us</span>
				</a>
			</li>
      </ul>
      <ul class="side-menu">
        <li>
          <a href="logout.php" class="logout" id="logout">
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
   
          </div>
        </form>
        <input type="checkbox" id="switch-mode" hidden />
        <label for="switch-mode" class="switch-mode"></label>
      </nav>

      <main>

      <ul class="nav nav-tabs" id="myTabs">
        <li class="nav-item">
          <a class="nav-link active" id="orders-tab" data-bs-toggle="tab" href="#tab-content-orders">Orders</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="prescription-tab" data-bs-toggle="tab" href="#tab-content-prescription">Prescription</a>
        </li>
      </ul>

        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="tab-content-orders" role="tabpanel" aria-labelledby="orders-tab">
            <div class="table-data">
                <div class="order">
                  <div class="head">
                    <h3>Orders</h3>
                  </div>
                  <table id="myTable1">
                    <thead>
                      <tr>
                        <th>Date Ordered</th>
                        <th>Product ID</th>
                        <th>Item Number</th>
                        <th>Item Name</th>
                        <th>Discount %</th>
                        <th>Unit Price</th>
                      </tr>
                    </thead>
                  <?php 
                    include('db_conn.php');

                    $ref_table = "orders";
                    $fetchdata = $database->getReference($ref_table)->getValue();

                    if($fetchdata > 0){
                      $i=0;
                      foreach($fetchdata as $key => $row){
                    ?>
                    <tr>
                      <td><?php echo $row['DateOrder']; ?></td>
                      <td><?php echo $row['ProductID']; ?></td>
                      <td><?php echo $row['ItemNumber']; ?></td>
                      <td><?php echo $row['ItemName']; ?></td>
                      <td><?php echo $row['Discount']; ?></td>
                      <td><?php echo $row['UnitPrice']; ?></td>
                    </tr>

                    <?php 
                      }
                    }
                    ?>
                  </table>
                  <!--FOR TESTING ADD-->
                  <!-- <form action="functions.php" method="POST">
                      <button class="btn btn-primary" name="add_orders">Add Order</button>
                  </form> -->
                </div>
              </div>
          </div>
        <div class="tab-pane fade" id="tab-content-prescription" role="tabpanel" aria-labelledby="prescription-tab">
            <div class="table-data">
              <div class="order">
                <div class="head">
                  <h3>Prescription</h3>
                </div>
                <table id="myTable2">
                  <thead>
                    <tr>
                      <th>Fullname</th>
                      <th>Shipping Address</th>
                      <th>Contact</th>
                      <th>Status</th>
                      <th>Prescription</th>
                    </tr>
                  </thead>
                  <?php 
                    include('db_conn.php');

                    $ref_table = "orders";
                    $fetchdata = $database->getReference($ref_table)->getValue();

                    if($fetchdata > 0){
                      $i=0;
                      foreach($fetchdata as $key => $row){
                    ?>
                    <tr>
                      <td><?php echo $row['FullName']; ?></td>
                      <td><?php echo $row['ShipAddress']; ?></td>
                      <td><?php echo $row['Contact']; ?></td>
                      <td><?php echo $row['Status']; ?></td>
                      <td><button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#view<?php echo $key; ?>">View</button></td>
                    </tr>

                      <!--Modal View Prescription-->
                      <div class="modal fade" id="view<?php echo $key; ?>" tabindex="-1" aria-labelledby="delete" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title text-dark">Prescription of: <?php echo $row['FullName']; ?></h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="text-center mt-4">
                              <h4 class="text-dark">This is prescription view</h4>
                              <p class="text-dark">The Content goes here...</p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>

                    <?php 
                      }
                    }
                    ?>
                </table>
              </div>
            </div>
        </div>
      
      </div>
   
      </main>
    <!-- MAIN -->
    </section>
    <!-- CONTENT -->
    <div id="chartContainer" style="height: 400px; width: 100%"></div>
    <script src="js/script.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
    <script>
      $('#myTable1').DataTable();
      $('#myTable2').DataTable();
    </script>

 
  </body>
</html>
