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

    <title>Accounts | 3J's Pharmacy</title>
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

      <div class="table-data">
          <div class="order">
            <div class="head">
              <h3>Orders & Prescription</h3>
              <div>
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add">Add</button>
              </div>
            </div>
            <table id="myTable">
              <thead>
                <tr>
                  <th>Order ID</th>
                  <th>Date & Time</th>
                  <th>Total Price</th>
                  <th>Status</th>
                  <th>Product Name</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tr>
                <td>Alfreds Futterkiste</td>
                <td>Maria Anders</td>
                <td>Germany</td>
                <td>Germany</td>
                <td>Germany</td>
                <td>
                  <button class="btn btn-primary">Edit</button>
                  <button class="btn btn-danger">Delete</button>
                </td>
              </tr>
      
            </table>
          </div>
        </div>
      </main>
      <!-- MAIN -->
      <!-- Modal -->
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
                confirmButtonColor: 'rgb(139, 43, 43',
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
 
  </body>
</html>
