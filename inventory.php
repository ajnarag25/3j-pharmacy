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
          <a href="dashboard.php">
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
      <div class="table-data">
          <div class="order">
            <div class="head">
              <h3>Inventory List</h3>
              <div>
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add">Add</button>
                 <!-- Modal Add Inventory-->
                <div class="modal fade" id="add" tabindex="-1" aria-labelledby="add" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title text-dark" id="add">Add Inventory</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <form action="functions.php" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            <label for="" class="text-dark">Upload Product Image</label>
                            <input class="form-control" type="file" name="UploadImage" required>
                            <label for="" class="text-dark">Product ID</label>
                            <input class="form-control" type="text" name="ProductID" required>
                            <label for="" class="text-dark">Item Number</label>
                            <input class="form-control" type="number" name="ItemNumber" required>
                            <label for="" class="text-dark">Item Name</label>
                            <input class="form-control" type="text" name="ItemName" required>
                            <label for="" class="text-dark">Discount</label>
                            <input class="form-control" type="number" name="Discount" required>
                            <label for="" class="text-dark">MG</label>
                            <input class="form-control" type="number" name="MG" required>
                            <label for="" class="text-dark">Stock</label>
                            <input class="form-control" type="number" name="Stock" required>
                            <label for="" class="text-dark">Unit Price</label>
                            <input class="form-control" type="number" name="UnitPrice" required>
                            <label for="" class="text-dark">Status</label>
                            <input class="form-control" type="text" name="Status" required>
                            <label for="" class="text-dark">Description</label>
                            <textarea class="form-control" name="Description" id="" cols="10" rows="5" required></textarea>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-success" name="add_inventory">Add</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <table id="myTable">
              <thead>
                <tr>
                  <th>Image</th>
                  <th>Product ID</th>
                  <th>Item Number</th>
                  <th>Item Name</th>
                  <th>Discount %</th>
                  <th>MG</th>
                  <th>Stock</th>
                  <th>Unit Price</th>
                  <th>Status</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
              </thead>
              <?php 
                include('db_conn.php');

                $ref_table = "inventory";
                $fetchdata = $database->getReference($ref_table)->getValue();

                if($fetchdata > 0){
                  $i=0;
                  foreach($fetchdata as $key => $row){
                    ?>
                      <tr>
                        <td><img src="uploads/<?php echo $row['ImageName'] ?>" width="80" alt=""></td>
                        <td><?php echo $row['ProductID'] ?></td>
                        <td><?php echo $row['ItemNumber'] ?></td>
                        <td><?php echo $row['ItemName'] ?></td>
                        <td><?php echo $row['Discount'] ?></td>
                        <td><?php echo $row['MG'] ?></td>
                        <td><?php echo $row['Stock'] ?></td>
                        <td><?php echo $row['UnitPrice'] ?></td>
                        <td><?php echo $row['Status'] ?></td>
                        <td><?php echo $row['Description'] ?></td>
                        <td>
                          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit<?php echo $key; ?>">Edit</button>
                          <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?php echo $key; ?>">Delete</button>
                        </td>
                      </tr>

                      <!--Modal Edit-->
                      <div class="modal fade" id="edit<?php echo $key; ?>" tabindex="-1" aria-labelledby="edit" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title text-dark">Edit Inventory: <?php echo $row['ItemName'] ?></h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="functions.php" method="POST" enctype="multipart/form-data">
                              <div class="modal-body">
                                  <input type="hidden" name="pk_inventory" value="<?php echo $key ?>">
                                  <label for="" class="text-dark">New Product Image</label>
                                  <input class="form-control" type="file" name="UploadImage" required>
                                  <label for="" class="text-dark">Product ID</label>
                                  <input class="form-control" type="text" name="ProductID" value="<?php echo $row['ProductID'] ?>" required>
                                  <label for="" class="text-dark">Item Number</label>
                                  <input class="form-control" type="number" name="ItemNumber" value="<?php echo $row['ItemNumber'] ?>" required>
                                  <label for="" class="text-dark">Item Name</label>
                                  <input class="form-control" type="text" name="ItemName" value="<?php echo $row['ItemName'] ?>" required>
                                  <label for="" class="text-dark">Discount</label>
                                  <input class="form-control" type="number" name="Discount" value="<?php echo $row['Discount'] ?>" required>
                                  <label for="" class="text-dark">MG</label>
                                  <input class="form-control" type="number" name="MG" value="<?php echo $row['MG'] ?>" required>
                                  <label for="" class="text-dark">Stock</label>
                                  <input class="form-control" type="number" name="Stock" value="<?php echo $row['Stock'] ?>" required>
                                  <label for="" class="text-dark">Unit Price</label>
                                  <input class="form-control" type="number" name="UnitPrice" value="<?php echo $row['UnitPrice'] ?>" required>
                                  <label for="" class="text-dark">Status</label>
                                  <input class="form-control" type="text" name="Status" value="<?php echo $row['Status']  ?>" required>
                                  <label for="" class="text-dark">Description</label>
                                  <textarea class="form-control" name="Description" id="" value="<?php echo $row['Description'] ?>" cols="10" rows="5" required><?php echo $row['Description'] ?></textarea>

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="edit_inventory">Edit</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>


                      <!--Modal Delete-->
                      <div class="modal fade" id="delete<?php echo $key; ?>" tabindex="-1" aria-labelledby="delete" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title text-dark">Delete Product</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="functions.php" method="POST">
                              
                              <div class="text-center mt-4">
                              <h4 class="text-dark">Are you sure to delete this product?</h4>
                              <p class="text-dark">Deleting Product: <?php echo $row['ItemName'] ?></p>
                              </div>
                             
                              <input type="hidden" name="del_pk" value="<?php echo $key; ?>">
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger" name="del_inventory">Delete</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <?php
                  }
                }else{
                  ?>
                  <!-- <tr>
                    <td>No Record Retrieve</td>
                  </tr> -->
                  <?php
                }
              ?>
            
      
            </table>
          </div>
        </div>
      </main>
      <!-- MAIN -->
    </section>

  <!--Scripts-->
  <script src="js/login.js"></script>
  <script src="js/script.js"></script>
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <?php 
        if (isset($_SESSION['status']) && $_SESSION['status'] !='')
        {
    ?>
    <script>
        $(document).ready(function(){
            Swal.fire({
                icon: '<?php echo $_SESSION['status_icon'] ?>',
                title: '<?php echo $_SESSION['status'] ?>',
                confirmButtonColor: '#316498',
                confirmButtonText: 'Okay'
            });
            <?php  unset($_SESSION['status']); ?>
        })
    </script>
    <?php
    }else{
        unset($_SESSION['status']);
    }
    ?>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
    <script>
      $('#myTable').DataTable()
    </script>
</body>
</html>
