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
    <!-- <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    /> -->



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
          <a href="index.html">
            <i class="bx bx-user-pin"></i>
            <span class="text">Dashboard</span>
          </a>
        </li>
        <li class="active">
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
              <div class="form">
                <div>
                  UID:
                  <input type="text" name="UID" id="uid" />
                  <br /><br />
                </div>
                <div>
                    Full Name:
                    <input type="text" name="fullname" id="fullname" />
                    <br /><br />
                  </div>
                <div>
                  Email:&nbsp; <input type="email" name="email" id="email" />
                  <br /><br />
                </div>
                <div>
                  Number: <input type="tel" name="Number" id="number" />
                  <br /><br />
                </div>
                <div>
                    City: <input type="text" name="City" id="city" />
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
      var userNo = 0;
      var tbody = document.getElementById("tbody1");

      function AddItemToTable(uid, fullname, email, number, city) {
  let trow = document.createElement("tr");
  let td1 = document.createElement("td");
  let td2 = document.createElement("td");
  let td3 = document.createElement("td");
  let td4 = document.createElement("td");
  let td5 = document.createElement("td");

  td1.innerHTML = uid;
  td2.innerHTML = fullname;
  td3.innerHTML = email;
  td4.innerHTML = number;
  td5.innerHTML = city;

  trow.appendChild(td1);
  trow.appendChild(td2);
  trow.appendChild(td3);
  trow.appendChild(td4);
  trow.appendChild(td5);

  tbody.appendChild(trow);
}


function AddAllItemsToTable(TheUser) {
  userNo = 0;
  tbody.innerHTML = "";
  TheUser.forEach((element) => {
    AddItemToTable(
      element.uid,
      element.userName,
      element.email,
      element.contact,
      element.city,
      element.updatedAt
    );
  });
}

      // Import the functions you need from the SDKs you need
      import { initializeApp } from "https://www.gstatic.com/firebasejs/9.20.0/firebase-app.js";
          import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.20.0/firebase-analytics.js";
          import { getDatabase, set, ref, update, child, onValue, get, remove, onChildAdded, onChildChanged  } from "https://www.gstatic.com/firebasejs/9.20.0/firebase-database.js";
          import { getAuth, createUserWithEmailAndPassword, signInWithEmailAndPassword, onAuthStateChanged, signOut, sendEmailVerification, sendPasswordResetEmail, fetchSignInMethodsForEmail } from "https://www.gstatic.com/firebasejs/9.20.0/firebase-auth.js";
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
      function GetAllDataOnce() {
  const dbRef = ref(db);

  // Get all the initial data
  get(child(dbRef, "Users")).then((snapshot) => {
    var ListofUser = [];

    snapshot.forEach((childSnapshot) => {
      ListofUser.push(childSnapshot.val());
    });

    // Add the initial data to the table
    AddAllItemsToTable(ListofUser);

  });

}



      window.onload = GetAllDataOnce;

        const insert = document.getElementById("insert");
        const updates = document.getElementById("update");
        const del = document.getElementById("delete");

        insert.addEventListener("click", () => {
  const uid = document.getElementById("uid").value;
  const fullname = document.getElementById("fullname").value;
  const email = document.getElementById("email").value;
  const number = document.getElementById("number").value;
  const city = document.getElementById("city").value;

  // Check if all fields are filled
  if (uid && fullname && email && number && city) {
    // Validate email format
    if (!/\S+@\S+\.\S+/.test(email)) {
      window.alert("Please enter a valid email address.");
      return;
    }

    const dbRef = ref(db);
 
    get(child(dbRef, "Users/" + uid)).then((snapshot) => {
      if (snapshot.exists()) {
        window.alert("UID already exists.");
      } else {
        fetchSignInMethodsForEmail(auth, email).then((providers) => {
          if (providers.length > 0) {
            window.alert("Email already exists.");
          } else {
            createUserWithEmailAndPassword(auth, email, "password")
              .then((userCredential) => {
                const user = userCredential.user;
                set(ref(db, "Users/" + uid), {
                  uid: uid,
                  userName: fullname,
                  email: email,
                  contact: number,
                  city: city,
                })
                  .then(() => {
                    window.alert("User inserted successfully!");
                    location.reload();
                  })
                  .catch((error) => {
                    console.error(error);
                  });
              })
              .catch((error) => {
                console.error(error);
              });
          }
        });
      }
    });
  } else {
    window.alert("Please fill all fields.");
  }
});





updates.addEventListener("click", () => {
  const uid = document.getElementById("uid").value;
  const fullname = document.getElementById("fullname").value;
  const email = document.getElementById("email").value;
  const number = document.getElementById("number").value;
  const city = document.getElementById("city").value;

  // Check if UID is provided
  if (!uid) {
    window.alert("Please provide UID.");
    return;
  }

  // Check if all fields are empty
  if (!fullname && !email && !number && !city) {
    window.alert("Please fill at least one field.");
    return;
  }

  const dbRef = ref(db);
  get(child(dbRef, "Users/" + uid)).then((snapshot) => {
    if (snapshot.exists()) {
      const updateFields = {};
      if (fullname) {
        updateFields.userName = fullname;
      }
      if (email) {
        updateFields.email = email;
      }
      if (number) {
        updateFields.contact = number;
      }
      if (city) {
        updateFields.city = city;
      }
      update(ref(db, "Users/" + uid), updateFields)
        .then(() => {
          window.alert("User updated successfully!");
          location.reload();
        })
        .catch((error) => {
          console.error(error);
        });
    } else {
      window.alert("UID not found.");
    }
  });
});

del.addEventListener("click", () => {
  const uid = document.getElementById("uid").value;

  const dbRef = ref(db);

  if (!uid) {
    window.alert("Please provide UID.");
    return;
  }

  get(ref(db, "Users/" + uid)).then((snapshot) => {
    if (snapshot.exists()) {
      remove(ref(db, "Users/" + uid)).then(() => {
        window.alert("User with UID '" + uid + "'' has been deleted successfully.");
        location.reload();
      }).catch((error) => {
        console.error("Error deleting user:", error);
      });
    } else {
      window.alert("UID not found.");
    }
  }).catch((error) => {
    console.error("Error checking UID:", error);
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
