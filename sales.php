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
    <link rel="stylesheet" href="css/sales.css" />

    <title>Daily Sales Report | 3J's Pharmacy</title>
    <script src="js/login.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.1/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.1/firebase-firestore.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.1/firebase-database.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.1/firebase-analytics.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
              <h3 style="text-align: center !important">Average Daily Sales</h3>
            </div>
            <div><canvas id="myChart"></canvas></div>
            <table>
              <thead>
                <tr></tr>
              </thead>
              <tbody></tbody>
            </table>
          </div>
        </div>
      </main>
      <!-- MAIN -->
    </section>
    <!-- CONTENT -->

    <script>
            const logout = document.getElementById("logout");
        logout.addEventListener("click", () => {
        localStorage.removeItem("isLoggedIn");
        window.location.href = "login.html";
      });

    </script>
    <script src="js/average.js"></script>
    <script src="js/script.js"></script>
    
    <!-- <script src="index.js"></script> -->
  </body>
</html>
