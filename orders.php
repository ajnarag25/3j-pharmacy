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
    <script src="js/login.js"></script>
    


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
          <a href="index.html">
            <i class="bx bx-user-pin"></i>
            <span class="text">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="users.html">
            <i class="bx bxs-user-account"></i>
            <span class="text">Accounts</span>
          </a>
        </li>
       <li>
				<a href="about.html">
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
              <tbody id="tbody1"></tbody>
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
    <!-- CONTENT -->
    <!-- Add a container for the graph -->
    <div id="chartContainer" style="height: 400px; width: 100%"></div>

    <!-- Add the JavaScript code to retrieve and display the data -->
    <script src="js/script.js"></script>

    <script type="module">
      var userNo = 0;
      var tbody = document.getElementById("tbody1");

  

      // Import the functions you need from the SDKs you need
      import { initializeApp } from "https://www.gstatic.com/firebasejs/9.16.0/firebase-app.js";
          import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.16.0/firebase-analytics.js";
          import { getDatabase, push, set, ref, update, child, onValue, get, remove, onChildAdded, onChildChanged, query, orderByChild, equalTo  } from "https://www.gstatic.com/firebasejs/9.16.0/firebase-database.js";
          import { getAuth, createUserWithEmailAndPassword, signInWithEmailAndPassword, onAuthStateChanged, signOut, sendEmailVerification, sendPasswordResetEmail } from "https://www.gstatic.com/firebasejs/9.16.0/firebase-auth.js";
   // TODO: Add SDKs for Firebase products that you want to use
      // https://firebase.google.com/docs/web/setup#available-libraries

      // Your web app's Firebase configuration
      // For Firebase JS SDK v7.20.0 and later, measurementId is optional
      const firebaseConfig = {
    apiKey: "AIzaSyAFfe8nm3qu9OP7wzTZXsqpsgSCBKVk4p0",
    authDomain: "j3spharmacy-d91bd.firebaseapp.com",
    databaseURL: "https://j3spharmacy-d91bd-default-rtdb.firebaseio.com",
    projectId: "j3spharmacy-d91bd",
    storageBucket: "j3spharmacy-d91bd.appspot.com",
    messagingSenderId: "32981017461",
    appId: "1:32981017461:web:85f0285adba6507e41293c",
    measurementId: "G-7TQ3FHGBST"
  };

      // Initialize Firebase
      const app = initializeApp(firebaseConfig);
      const analytics = getAnalytics(app);
      const db = getDatabase();

      //function to add data to firebase
      function AddItemToTable(orderId, dateAndTime, totalPrice, status, product) {
  let trow = document.createElement("tr");
  let td1 = document.createElement("td");
  let td2 = document.createElement("td");
  let td3 = document.createElement("td");
  let td4 = document.createElement("td");
  let td5 = document.createElement("td");

  td3.innerHTML = totalPrice;
  td5.innerHTML = product;

  td1.innerHTML = "Retrieving Data... "; // initialize the content of td2
  td2.innerHTML = "Retrieving Data... "; // initialize the content of td4
  td3.innerHTML = "Retrieving Data... "; // initialize the content of td4
  td4.innerHTML = "Retrieving Data..."; // initialize the content of td4

  trow.appendChild(td1);
  trow.appendChild(td2);
  trow.appendChild(td3);
  trow.appendChild(td4);
  trow.appendChild(td5);

  const dbRef2 = ref(db, "Orders/" + orderId + "/Pending");
onValue(dbRef2, (snapshot) => {
  const data = snapshot.val();
  // Remove the "Retrieving Data..." row if it exists
  const loadingRow = tbody.querySelector(".loading-row");
  if (loadingRow) {
    tbody.removeChild(loadingRow);
  }
  for (let uniqueKey in data) {
    if (data[uniqueKey].status == "Pending") {
      // Get value of orderId, dateAndTime, and status and set them to the table row
      let td1 = document.createElement("td");
      td1.innerHTML = data[uniqueKey].orderId;
      let td2 = document.createElement("td");
      td2.innerHTML = data[uniqueKey].dateAndTime;
      let td3 = document.createElement("td");
      let quantity = data[uniqueKey].ordersList[0].quantity;
      let price = data[uniqueKey].ordersList[0].model.price;
      let totalPrice = quantity * price;
      td3.innerHTML = totalPrice;
      let td4 = document.createElement("td");
      td4.innerHTML = data[uniqueKey].status;
      let td5 = document.createElement("td");
      td5.innerHTML = data[uniqueKey].ordersList[0].model.name;

      let trow = document.createElement("tr");
      trow.appendChild(td1);
      trow.appendChild(td2);
      trow.appendChild(td3);
      trow.appendChild(td4);
      trow.appendChild(td5);

      tbody.appendChild(trow);
    }
  }
});

// Add a "Retrieving Data..." row to the table
let loadingRow = document.createElement("tr");
loadingRow.classList.add("loading-row");
let td = document.createElement("td");
td.colSpan = 5;
tbody.appendChild(loadingRow);

  


}

    //function to add new row to table for every new order in firebase
    
    
function AddAllItemsToTable(orders) {
  for (let orderId in orders) {
    let order = orders[orderId];
    for (let uniqueKey in order) {
      let status = order[uniqueKey].status;
      let product = order[uniqueKey].product;
      let dateAndTime = order[uniqueKey].dateAndTime;
      let totalPrice = order[uniqueKey].totalPrice;
      
      AddItemToTable(orderId, dateAndTime, totalPrice, status, product);
    }
  }
}



function GetAllDataOnce() {
  const dbRef = ref(db);

  //function to get data from firebase
  get(child(dbRef, "Orders")).then((snapshot) => {
    if (snapshot.exists()) {
      console.log(snapshot.val());
      AddAllItemsToTable(snapshot.val());
    } else {
      console.log("No data available");
    }
  });
}
      window.onload = GetAllDataOnce;

      //function to check if the status in firebase Orders > UID > Pending > UniqueKey > status is "Pending" or "Delivered"

      function ListenForNewOrders() {
  const dbRef = ref(db, "Orders");
  onChildAdded(dbRef, (snapshot) => {
    const order = snapshot.val();
    const orderId = snapshot.key;
    for (let uniqueKey in order) {
      const status = order[uniqueKey].status;
      const product = order[uniqueKey].product;
      const dateAndTime = order[uniqueKey].dateAndTime;
      const totalPrice = order[uniqueKey].totalPrice;
      AddItemToTable(orderId, dateAndTime, totalPrice, status, product);
    }
  });
}

      //function to check if the status in firebase Orders > UID > Pending > UniqueKey > status is "Pending" or "Delivered"


      window.onload = ListenForNewOrders;

    </script>




      <script>
              const logout = document.getElementById("logout");

        logout.addEventListener("click", () => {
        localStorage.removeItem("isLoggedIn");
        window.location.href = "login.html";
      });

    </script>
    <!-- <script src="index.js"></script> -->
  </body>
</html>

