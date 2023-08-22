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
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
    
    <title>Orders & Prescription | 3J's Pharmacy</title>
  
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
            </div>
            <table id="myTable">
              <thead>
                <tr>
                  <th>Order ID</th>
                  <th>Date & Time</th>
                  <th>Total Price</th>
                  <th>Status</th>
                  <th>Product Name</th>
                </tr>
              </thead>
              <tr>
                <td>Alfreds Futterkiste</td>
                <td>Maria Anders</td>
                <td>Germany</td>
                <td>Germany</td>
                <td>Germany</td>
              </tr>
              <tr>
                <td>Centro comercial Moctezuma</td>
                <td>Francisco Chang</td>
                <td>Mexico</td>
                <td>Mexico</td>
                <td>Mexico</td>
              </tr>
            </table>
          </div>
        </div>
      </main>

      <main>
        <!--
        <div class="table-data">
          <div class="order">
            <div class="head">
              <h3 style="text-align: center !important">Add Medicine</h3>
            </div>
            <div class="display">
              <br />
              <div class="form">
                <div>
                  Unique Key:
                  <input type="text" name="UniqueKey" id="unique" />
                  <br /><br />
                </div>
                <div>
                  Age: <input type="text" name="Age" id="age" /> <br /><br />
                </div>
                <div>
                  Email:&nbsp; <input type="text" name="email" id="email" />
                  <br /><br />
                </div>
                <div>
                  Full Name:
                  <input type="text" name="fullname" id="fullname" />
                  <br /><br />
                </div>
                <div>
                  Number: <input type="text" name="Number" id="number" />
                  <br /><br />
                </div>
              </div>

              <div class="buttons">
                <button id="insert">Insert</button>
                <button id="read">Read</button>
                <button id="update">Update</button>
                <button id="delete">Delete</button>
              </div>
            </div>
          </div>
        </div>
      
      </main>-->
      <!-- MAIN -->
    </section>
    <!-- Scripts -->
    <div id="chartContainer" style="height: 400px; width: 100%"></div>
    <script src="js/script.js"></script>
    <script src="js/jquery.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
    <script>
      $('#myTable').DataTable()
    </script>
  </body>
</html>

