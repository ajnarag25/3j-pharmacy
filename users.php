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
    <title>Accounts | 3J's Pharmacy</title>
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
        <li >
          <a href="index.php">
            <i class="bx bx-user-pin"></i>
            <span class="text">Dashboard</span>
          </a>
        </li>
        <li class="active">
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
          <a class="nav-link active" id="users-tab" data-bs-toggle="tab" href="#tab-content-users">Users</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="admin-tab" data-bs-toggle="tab" href="#tab-content-admin">Admin</a>
        </li>
      </ul>

      <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="tab-content-users" role="tabpanel" aria-labelledby="users-tab">
            <div class="table-data">
              <div class="order">
                <div class="head">
                  <h3>Manage Users</h3>
                  <div>
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add">Add</button>
                    <!-- Modal Add Account-->
                    <div class="modal fade" id="add" tabindex="-1" aria-labelledby="add" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title text-dark" id="add">Add User's</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <form action="functions.php" method="POST">
                            <div class="modal-body">
                                <label class="text-dark" for="">UID</label>
                                <input class="form-control" type="text" name="uid" required>
                                <label class="text-dark" for="">Full Name</label>
                                <input class="form-control" type="text" name="fname" required>
                                <label class="text-dark" for="">Email</label>
                                <input class="form-control" type="text" name="email" required>
                                <label class="text-dark" for="">Contact no.</label>
                                <input class="form-control" type="text" name="contact" required>
                                <label class="text-dark" for="">City</label>
                                <input class="form-control" type="text" name="city" required>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-success" name="add_user">Add</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <table id="myTable1">
                  <thead>
                    <tr>
                      <th>UID</th>
                      <th>Fullname</th>
                      <th>Email</th>
                      <th>Contact</th>
                      <th>City</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <?php 
                    include('db_conn.php');

                    $ref_table = "users";
                    $fetchdata = $database->getReference($ref_table)->getValue();

                    if($fetchdata > 0){
                      $i=0;
                      foreach($fetchdata as $key => $row){
                        ?>
                          <tr>
                            <td><?php echo $row['uid'] ?></td>
                            <td><?php echo $row['fullname'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo $row['contact'] ?></td>
                            <td><?php echo $row['city'] ?></td>
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
                                  <h5 class="modal-title text-dark">Edit Account of <?php echo $row['fullname'] ?></h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="functions.php" method="POST">
                                  <div class="modal-body">
                                      <input type="hidden" name="pk" value="<?php echo $key ?>">
                                      <label class="text-dark" for="">UID</label>
                                      <input class="form-control" type="text" name="uid" value="<?php echo $row['uid'] ?>" required>
                                      <label class="text-dark" for="">Full Name</label>
                                      <input class="form-control" type="text" name="fname" value="<?php echo $row['fullname'] ?>" required>
                                      <label class="text-dark" for="">Email</label>
                                      <input class="form-control" type="text" name="email" value="<?php echo $row['email'] ?>" required>
                                      <label class="text-dark" for="">Contact no.</label>
                                      <input class="form-control" type="text" name="contact" value="<?php echo $row['contact'] ?>" required>
                                      <label class="text-dark" for="">City</label>
                                      <input class="form-control" type="text" name="city" value="<?php echo $row['city'] ?>" required>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="edit_user">Edit</button>
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
                                  <h5 class="modal-title text-dark">Delete Account</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="functions.php" method="POST">
                                  
                                  <div class="text-center mt-4">
                                  <h4 class="text-dark">Are you sure to delete this account?</h4>
                                  <p class="text-dark">Deleting Account of: <?php echo $row['fullname'] ?></p>
                                  </div>
                                
                                  <input type="hidden" name="del_pk" value="<?php echo $key; ?>">
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger" name="del_user">Delete</button>
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
          </div>
        <div class="tab-pane fade" id="tab-content-admin" role="tabpanel" aria-labelledby="admin-tab">
        <div class="table-data">
            <div class="order">
              <div class="head">
                <h3>Manage Admin</h3>
                <div>
                  <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add_admin">Add</button>
                  <!-- Modal Add Account Admin-->
                  <div class="modal fade" id="add_admin" tabindex="-1" aria-labelledby="add_admin" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title text-dark" id="add">Add Admin</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="functions.php" method="POST">
                          <div class="modal-body">
                              <label class="text-dark" for="">Name</label>
                              <input class="form-control" type="text" name="name" required>
                              <label class="text-dark" for="">Email</label>
                              <input class="form-control" type="text" name="email" required>
                              <label class="text-dark" for="">Password</label>
                              <input class="form-control" type="password" name="a_password" required>
                              <label class="text-dark" for="">Retype Password</label>
                              <input class="form-control" type="password" name="a_repassword" required>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" name="add_admin">Add</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <table id="myTable2">
                <thead>
                  <tr>
                    <th>User UID</th>
                    <th>Email</th>
                    <th>Name</th>
                    <th>Action</th>
                    <!-- <th>Username</th>
                    <th>Password</th> -->
                  </tr>
                </thead>
                    <?php 
                      include('db_conn.php');
                      $users = $auth->listUsers();
                      
                      if (!empty($users)) {
                        $i = 0;
                        foreach ($users as $user) {
                            $key = $user->uid;

                            $email = $user->email;
                            $username = $user->displayName;

                            ?>
                            <tr>
                                <td><?php echo $key;?></td>
                                <td><?php echo $email; ?></td>
                                <td><?php echo $username; ?></td>
                                <td>
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit_admin<?php echo $i; ?>">Edit</button>
                                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete_admin<?php echo $i; ?>">Delete</button>
                                </td>
                            </tr>

                            <!-- Modal Edit -->
                            <div class="modal fade" id="edit_admin<?php echo $i; ?>" tabindex="-1" aria-labelledby="edit_admin" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title text-dark">Edit Account of <?php echo $username; ?></h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="functions.php" method="POST">
                                      <div class="modal-body">
                                          <input type="hidden" name="user_id" value="<?php echo $key ?>">
                                          <label class="text-dark" for="">Email</label>
                                          <input class="form-control" type="text" name="email" value="<?php echo $email; ?>" required>
                                          <label class="text-dark" for="">Name</label>
                                          <input class="form-control" type="text" name="name" value="<?php echo $username; ?>" required>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="edit_admin">Edit</button>
                                      </div>
                                    </form>
                                  </div>
                              </div>
                            </div>

                            <!-- Modal Delete -->
                            <div class="modal fade" id="delete_admin<?php echo $i; ?>" tabindex="-1" aria-labelledby="delete_admin" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title text-dark">Delete Account</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="functions.php" method="POST">
                                      
                                      <div class="text-center mt-4">
                                      <h4 class="text-dark">Are you sure to delete this account?</h4>
                                      <p class="text-dark">Deleting Account of: <?php echo $username; ?></p>
                                      </div>
                                    
                                      <input type="hidden" name="user_id" value="<?php echo $key ?>">
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger" name="del_admin">Delete</button>
                                      </div>
                                    </form>
                                  </div>
                              </div>
                            </div>
                            <?php

                            $i++;
                        }
                      } else {
                        // echo "<tr><td colspan='4'>No users available</td></tr>";
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
    <!-- <div id="chartContainer" style="height: 400px; width: 100%"></div> -->

    <script src="js/script.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery.js"></script>
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
      $('#myTable1').DataTable();
      $('#myTable2').DataTable();
    </script>
  </body>
</html>
