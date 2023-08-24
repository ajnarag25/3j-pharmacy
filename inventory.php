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
            </div>
            <table id="myTable">
              <thead>
                <tr>
                  <th>Product ID</th>
                  <th>Item Number</th>
                  <th>Item Name</th>
                  <th>Discount %</th>
                  <th>MG</th>
                  <th>Stock</th>
                  <th>Unit Price</th>
                  <th>Status</th>
                  <th>Description</th>

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
              <h3 style="text-align: center !important">Manage Inventory</h3>
            </div>
            <div class="display">
              <br />
              <div class="form">
                <div>
                  Product ID:
                  <input type="number" name="pid" id="pid" />
                  <br /><br />
                </div>
                <div>
                    Item Number:
                    <input type="number" name="ItemN" id="itemn" />
                    <br /><br />
                  </div>
                  <div>
                    Item Name:&nbsp; <input type="text" name="Name" id="name" />
                    <br /><br />
                  </div>
                <div>
                  Discount: <input type="number" name="Discount" id="discount" />
                  <br /><br />
                </div>
                <div>
                  MG: <input type="number" name="MG" id="mg" />
                  <br /><br />
                </div>
                <div>
                    Stock: <input type="number" name="Stock" id="stock" />
                    <br /><br />
                  </div>
                  <div>
                    Unit Price: ₱ <input type="number" name="Price" id="price" />
                    <br /><br />
                  </div>
                  <div>
                    Status: <input type="text" name="Status" id="status" />
                    <br /><br />
                  </div>
                  <div>
                    Description: <input type="textarea" name="Detail" id="detail" />
                    <br /><br />
                  </div>
                  <div>
                    Image Path: <input type="textarea" name="ImagePath" id="imagePath" />
                    <br /><br />
                  </div>
              </div>

              <div class="buttons">
                <button id="insert">Insert</button>
                <button id="update">Update</button>
                <button id="delete">Delete</button>
              </div>
            </div>
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

</body>
</html>
