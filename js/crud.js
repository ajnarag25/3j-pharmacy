var uniqueKey, ageV, emailV, fullnameV, numberV;

function readFom() {
  uniqueKey = document.getElementById("unique").value;
  ageV = document.getElementById("age").value;
  emailV = document.getElementById("email").value;
  fullnameV = document.getElementById("fullname").value;
  numberV = document.getElementById("number").value;
  console.log(uniqueKey, ageV, emailV, numberV, fullnameV);
}

document.getElementById("insert").onclick = function () {
  readFom();

  firebase
    .database()
    .ref("Users/" + uniqueKey)
    .set({
      age: ageV,
      email: emailV,
      fullname: fullnameV,
      number: numberV,
    });
  alert("Data Inserted");
  // document.getElementById("roll").value = "";
  document.getElementById("age").value = "";
  document.getElementById("email").value = "";
  document.getElementById("fullname").value = "";
  document.getElementById("number").value = "";
};


document.getElementById("update").onclick = function () {
  readFom();

  firebase
    .database()
    .ref("Users/" + uniqueKey)
    .update({
      age: ageV,
      email: emailV,
      fullname: fullnameV,
      number: numberV,
    });
  alert("Data Update");
  document.getElementById("age").value = "";
  document.getElementById("email").value = "";
  document.getElementById("fullname").value = "";
  document.getElementById("number").value = "";
};
document.getElementById("delete").onclick = function () {
  readFom();

  firebase
    .database()
    .ref("Users/" + uniqueKey)
    .remove();
  alert("Data Deleted");
  document.getElementById("age").value = "";
  document.getElementById("email").value = "";
  document.getElementById("fullname").value = "";
  document.getElementById("number").value = "";
};

const signupForm = document.querySelector("#signup-form");
const userTableBody = document.querySelector("#user-table tbody");

// Get a reference to your database
const database = firebase.database();

signupForm.addEventListener("submit", (e) => {
  e.preventDefault();

  const email = signupForm["emails"].value;
  const password = signupForm["password"].value;

  firebase
    .auth()
    .createUserWithEmailAndPassword(email, password)
    .then((userCredential) => {
      // User created
      const newUser = userCredential.user;
      const email = newUser.email;
      const uid = newUser.uid;
      const created = newUser.metadata.creationTime;
      const signedIn = newUser.metadata.lastSignInTime;

      // Format the created and signed-in dates
      const options = {
        year: "numeric",
        month: "long",
        day: "numeric",
        hour: "numeric",
        minute: "numeric",
      };
      const createdDate = new Date(created).toLocaleString("en-US", options);
      const signedInDate = new Date(signedIn).toLocaleString("en-US", options);

      // Save the user's data to the database
      database
        .ref("usersUID/" + uid)
        .set({
          email: email,
          created: createdDate,
          signedIn: signedInDate,
          uid: uid,
        })
        .then(() => {
          // Reload the page after the data is saved
          location.reload();
        });

      // Clear the input fields
      signupForm.reset();
    })
    .catch((error) => {
      // Error occurred
    });
});

var uniqueKeys;

function readForm() {
  uniqueKeys = document.getElementById("uniques").value;
  console.log(uniqueKeys);
}

document.getElementById("deletes").onclick = function () {
  readForm();

  firebase
    .database()
    .ref("usersUID/" + uniqueKeys)
    .remove()
    .then(function () {
      alert("Data Deleted");
      // location.reload(); // Reload the page
    })
    .catch(function (error) {
      console.error(error);
    });
};

const deleteButton = document.querySelector("#deletes");

deleteButton.addEventListener("click", () => {
  const uid = document.querySelector("#uniques").value;

  firebase
    .auth()
    .delete(uid)
    .then(() => {
      // User account deleted successfully
      console.log("User account deleted successfully");
    })
    .catch((error) => {
      // An error occurred
      console.log(error);
    });
});
