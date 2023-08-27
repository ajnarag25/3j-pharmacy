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
    <title>Ongoing Deliveries | 3J's Pharmacy</title>
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
   
          </div>
        </form>
        <input type="checkbox" id="switch-mode" hidden />
        <label for="switch-mode" class="switch-mode"></label>
      </nav>

      <main>

      <ul class="nav nav-tabs" id="myTabs">
        <li class="nav-item">
          <a class="nav-link active" id="pending-tab" data-bs-toggle="tab" href="#tab-content-pending">Pending Orders</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="fordel-tab" data-bs-toggle="tab" href="#tab-content-fordel">For Delivery</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="delivered-tab" data-bs-toggle="tab" href="#tab-content-delivered">Delivered</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="history-tab" data-bs-toggle="tab" href="#tab-content-history">History</a>
        </li>
      </ul>

        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="tab-content-pending" role="tabpanel" aria-labelledby="pending-tab">
            <div class="table-data">
                <div class="order">
                  <div class="head">
                    <h3>Pending Orders</h3>
                  </div>
                  <table id="myTable1">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Contact</th>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Date</th>
                        <th>Mode of Payment</th>
                        <th>Amount</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                  <?php 
                    include('db_conn.php');

                    $ref_table = "orders";
                    $fetchdata = $database->getReference($ref_table)->getValue();

                    if($fetchdata > 0){
                      $i=0;
                      foreach($fetchdata as $key => $row){
                        if($row['Status'] === 'Pending'){
                    ?>
                    <tr>
                        <td><input type="checkbox"></td>
                        <td><?php echo $row['FullName']; ?></td>
                        <td><?php echo $row['ShipAddress']; ?></td>
                        <td><?php echo $row['Contact']; ?></td>
                        <td><?php echo $row['ItemName']; ?></td>
                        <td><?php echo $row['Quantity']; ?></td>
                        <td><?php echo $row['DateOrder']; ?></td>
                        <td><?php echo $row['ModPay']; ?></td>
                        <td><?php echo $row['Amount']; ?></td>
                        <td><?php echo $row['Status']; ?></td>
                    </tr>
                    <?php 
                        }else{
                            // echo "No Pending orders";
                        }
                      }
                    }
                    ?>
                  </table>

                </div>
                
              </div>

                <button class="btn btn-success">Approved</button>
                <button class="btn btn-danger">Decline</button>

          </div>
        <div class="tab-pane fade" id="tab-content-fordel" role="tabpanel" aria-labelledby="fordel-tab">
            <div class="table-data">
              <div class="order">
                <div class="head">
                  <h3>For Delivery Orders</h3>
                </div>
                <table id="myTable2">
                  <thead>
                    <tr>
                        <th>Name</th>
                        <th>Item</th>
                        <th>Product Price</th>
                        <th>Quantity</th>
                        <th>Total Payment</th>
                        <th>Mode of Payment</th>
                        <th>Mode of Delivery</th>
                    </tr>
                  </thead>
                  <?php 
                    include('db_conn.php');

                    $ref_table = "orders";
                    $fetchdata = $database->getReference($ref_table)->getValue();

                    if($fetchdata > 0){
                      $i=0;
                      foreach($fetchdata as $key => $row){
                        if($row['Status'] === 'Approved'){
                    ?>
                        <tr>
                        <td><?php echo $row['FullName']; ?></td>
                        <td><?php echo $row['ItemName']; ?></td>
                        <td><?php echo $row['UnitPrice']; ?></td>
                        <td><?php echo $row['Quantity']; ?></td>
                        <td><?php echo $row['TotalPay']; ?></td>
                        <td><?php echo $row['ModPay']; ?></td>
                        <td><?php echo $row['ModDel']; ?></td>
                        </tr>

                    <?php 
                        }else{
                            // echo "No Approved orders";
                        }
                      }
                    }
                    ?>
                </table>
              </div>
            </div>
        </div>

        <div class="tab-pane fade" id="tab-content-delivered" role="tabpanel" aria-labelledby="delivered-tab">
            <div class="table-data">
              <div class="order">
                <div class="head">
                  <h3>Delivered Orders</h3>
                </div>
                <table id="myTable3">
                  <thead>
                    <tr>
                        <th>Name</th>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Total Payment</th>
                        <th>Mode of Payment</th>
                    </tr>
                  </thead>
                  <?php 
                    include('db_conn.php');

                    $ref_table = "orders";
                    $fetchdata = $database->getReference($ref_table)->getValue();

                    if($fetchdata > 0){
                      $i=0;
                      foreach($fetchdata as $key => $row){
                        if($row['Status'] === 'Delivered'){
                    ?>
                    <tr>
                      <td><?php echo $row['FullName']; ?></td>
                      <td><?php echo $row['ItemName']; ?></td>
                      <td><?php echo $row['Quantity']; ?></td>
                      <td><?php echo $row['TotalPay']; ?></td>
                      <td><?php echo $row['ModPay']; ?></td>
                    </tr>

                    <?php 
                        }else{
                             // echo "No Delivered orders";
                        }
                      }
                    }
                    ?>
                </table>
              </div>
            </div>
        </div>
      
        <div class="tab-pane fade" id="tab-content-history" role="tabpanel" aria-labelledby="history-tab">
            <div class="table-data">
              <div class="order">
                <div class="head">
                  <h3>History</h3>
                </div>
                <table id="myTable4">
                  <thead>
                    <tr>
                        <th>Date Ordered</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Item</th>
                        <th>Contact</th>
                        <th>Quantity</th>
                        <th>Total Payment</th>
                        <th>Mode of Payment</th>
                        <th>Mode of Delivery</th>
                        <th>Status</th>
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
                      <td><?php echo $row['FullName']; ?></td>
                      <td><?php echo $row['ShipAddress']; ?></td>
                      <td><?php echo $row['ItemName']; ?></td>
                      <td><?php echo $row['Contact']; ?></td>
                      <td><?php echo $row['Quantity']; ?></td>
                      <td><?php echo $row['TotalPay']; ?></td>
                      <td><?php echo $row['ModPay']; ?></td>
                      <td><?php echo $row['ModDel']; ?></td>
                      <td><?php echo $row['Status']; ?></td>
                    </tr>

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
      $('#myTable3').DataTable();
      $('#myTable4').DataTable();
    </script>

 
  </body>
</html>
