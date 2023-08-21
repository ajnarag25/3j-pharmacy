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


    <title>Inventory List | 3J's Pharmacy</title>
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
          <a href="index.html">
            <i class="bx bx-user-pin"></i>
            <span class="text">Dashboard</span>
          </a>
        </li>
        <li >
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
    <!-- CONTENT -->
    <div id="chartContainer" style="height: 400px; width: 100%"></div>


    <script src="js/script.js"></script>

    <script type="module">
const tbody = document.getElementById("tbody1");

    // Function to create table rows and add data to them
function AddItemToTable(pid, itemn, name, discount, mg, stock, price, status, detail, imagePath) {
    const tr = document.createElement("tr");
    tr.innerHTML = `
        <td>${pid}</td>
        <td>${itemn}</td>
        <td>${name}</td>
        <td>${discount}</td>
        <td>${mg}</td>
        <td>${stock}</td>
        <td>${price}</td>
        <td>${status}</td>
        <td>${detail}</td>
    `;
    tbody.appendChild(tr);
}

// Call GetAllDataOnce function when the page loads
window.addEventListener('load', GetAllDataOnce);


function AddAllItemsToTable(items) {
  tbody.innerHTML = "";
  items.forEach((item) => {
    AddItemToTable(
      item.pid,
      item.itemn,
      item.name,
      item.discount,
      item.mg,
      item.stock,
      item.price,
      item.status,
      item.detail,
      item.imagePath
    );
  });
}


      // Import the functions you need from the SDKs you need
      import { initializeApp } from "https://www.gstatic.com/firebasejs/9.16.0/firebase-app.js";
          import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.16.0/firebase-analytics.js";
          import { getDatabase, push, set, ref, update, child, onValue, get, remove, onChildAdded, onChildChanged  } from "https://www.gstatic.com/firebasejs/9.16.0/firebase-database.js";
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
          const auth = getAuth();

      const db = getDatabase();

      auth.onAuthStateChanged(user => {
  if (user) {
    // User is signed in
    console.log("User is logged in");

   onChildAdded(ref(db, "Medicines"), (snapshot) => {
      const data = snapshot.val();
      AddItemToTable(data.pid, data.itemn, data.name, data.discount, data.mg, data.stock, data.price, data.status, data.detail, data.imagePath);
    });

  } else {


    // User is signed out
    console.log("User is logged out");
    // Add your code to show content for non-authenticated users here
  }
});
      
      function GetAllDataOnce() {
  const dbRef = ref(db);
  const pid = document.getElementById("pid").value; // Get the value of the input element with ID "name"


  // Get data for a specific item name
  get(child(dbRef, "Medicines" + pid)).then((snapshot) => {
    var ListofItems = [];
    if (snapshot.exists()) {
      snapshot.forEach((childSnapshot) => {
        ListofItems.push(childSnapshot.val());
      });
      AddAllItemsToTable(ListofItems);
    } else {
      console.log("No data available");
    }
  });
}



      window.onload = GetAllDataOnce;

        const insert = document.getElementById("insert");
        const updates = document.getElementById("update");
        const del = document.getElementById("delete");

        insert.addEventListener("click", () => {
  const itemn = document.getElementById("itemn").value;
  const name = document.getElementById("name").value;
  const discount = document.getElementById("discount").value;
  const mg = document.getElementById("mg").value;
  const stock = document.getElementById("stock").value;
  const price = document.getElementById("price").value;
  const status = document.getElementById("status").value;
  const detail = document.getElementById("detail").value;
  const imagePath = document.getElementById("imagePath").value;

  if (itemn && name && discount && mg && stock && price && status && detail && imagePath) {
    const dbRef = ref(db);

    const medicinesRef = child(dbRef, "Medicines");

// Add a new item to the database
const newMedicineRef = push(medicinesRef);

// Get the unique key generated by push()
const newMedicineKey = newMedicineRef.key;

    set(newMedicineRef, {
      itemn: itemn,
      name: name,
      discount: discount,
      mg: mg,
      stock: stock,
      price: price,
      status: status,
      detail: detail,
      imagePath: imagePath
    })
    .then(() => {
      // Handle success
      console.log("New medicine added successfully!");
      window.alert("New medicine added successfully!");
    })
    .catch((error) => {
      // Handle errors
      console.error("Error adding new medicine: ", error);
      window.alert("Error adding new medicine: " + error.message);
    });
  } else {
    window.alert("Please fill all fields.");
  }
});


        updates.addEventListener("click", () => {
    const pid = document.getElementById("pid").value;
    const itemn = document.getElementById("itemn").value;
    const name = document.getElementById("name").value;
    const discount = document.getElementById("discount").value;
    const mg = document.getElementById("mg").value;
    const stock = document.getElementById("stock").value;
    const price = document.getElementById("price").value;
    const status = document.getElementById("status").value;
    const detail = document.getElementById("detail").value;
    const imagePath = document.getElementById("imagePath").value;

     // Check if UID is provided
  if (!pid) {
    window.alert("Please provide Product ID.");
    return;
  }

  // Check if all fields are empty
  if (!itemn && !name && !discount && !mg && !stock && !price && !status && !detail && !imagePath) {
    window.alert("Please fill at least one field.");
    return;
  }


    const dbRef = ref(db);
    get(child(dbRef, "Medicines" + pid)).then((snapshot) => {
      if (snapshot.exists()) {
        const updateFields = {};
        if (itemn) {
        updateFields.itemn = itemn;
        }
        if (name) {
        updateFields.name = name;
        }
        if (discount) {
        updateFields.discount = discount;
        }
        if (mg) {
        updateFields.mg = mg;
        }
        if (stock) {
        updateFields.stock = stock;
        }
        if (price) {
        updateFields.price = price;
        }
        if (status) {
        updateFields.status = status;
        }
        if (detail) {
        updateFields.detail = detail;
        }
        if (imagePath) {
        updateFields.imagePath = imagePath;
        }
update(ref(db, "Medicines" + pid), updateFields)
    .then(() => {
    window.alert("Item updated successfully!");
    location.reload();
    })
    .catch((error) => {
    console.error(error);
    });
  } else {
      window.alert("Product ID not found.");
    }
});
});

        del.addEventListener("click", () => {
    const pid = document.getElementById("pid").value;

    const dbRef = ref(db);
    if (!pid) {
    window.alert("Please provide Product ID.");
    return;
  }

  get(ref(db, "Medicines" + pid)).then((snapshot) => {
    if (snapshot.exists()) {
    remove(ref(db, "Medicines" + pid))
    .then(() => {
    window.alert("Item deleted successfully!");
    location.reload();
    })
    .catch((error) => {
      console.error("Error deleting item:", error);
    });
  } else {
      window.alert("Product ID not found.");
    }
  }).catch((error) => {
    console.error("Error checking Product ID:", error);
  });
});

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
