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
              <h3>Accounts</h3>
            </div>
            <table id="myTable">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Full Name</th>
                  <th>Email</th>
                  <th>Phone Number</th>
                  <th>City</th>
                </tr>
              </thead>
              <tbody id="tbody1"></tbody>
            </table>
          </div>
        </div>
      </main>

      <main>
        <div class="table-data">
          <div class="order">
            <div class="head">
              <h3 style="text-align: center !important">Manager Users</h3>
            </div>
            <div class="display">
              <br />
              <form method="POST">
                <div>
                  <div>
                    UID:
                    <input type="text" name="UID" id="uid" required/>
                    <br /><br />
                  </div>
                  <div>
                      Full Name:
                      <input type="text" name="fullname" id="fullname" required/>
                      <br /><br />
                    </div>
                  <div>
                    Email:&nbsp; <input type="email" name="email" id="email" required/>
                    <br /><br />
                  </div>
                  <div>
                    Number: <input type="tel" name="Number" id="number" required/>
                    <br /><br />
                  </div>
                  <div>
                      City: <input type="text" name="City" id="city" required/>
                      <br /><br />
                    </div>
                </div>

                <div class="buttons">
                  <button type="submit" name="insert">Insert</button>
                  <!-- <button id="update">Update</button>
                  <button id="delete">Delete</button> -->
                </div>
              </form>
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

 
  </body>
</html>
