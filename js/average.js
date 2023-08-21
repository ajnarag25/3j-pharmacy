// Initialize Firebase
var config = {
  apiKey: "AIzaSyAKMScDPsn1Z8MjVi9dJEfZBtKNZuNqZ90",
  authDomain: "planit-4dff7.firebaseapp.com",
  databaseURL: "https://planit-4dff7-default-rtdb.firebaseio.com",
  projectId: "planit-4dff7",
  storageBucket: "planit-4dff7.appspot.com",
  messagingSenderId: "35523219990",
  appId: "1:35523219990:web:adf77f203a27af45835b37",
  measurementId: "G-GF8TRV3JX3",
};
firebase.initializeApp(config);

// Get a reference to the database
var database = firebase.database();

// Get a reference to the "Graph" collection
var graphRef = database.ref("Average Engage Time");

// Create a Chart.js chart with initial data
var ctx = document.getElementById("myChart").getContext("2d");
var chart = new Chart(ctx, {
  type: "line",
  data: {
    labels: [
      "Monday",
      "Tuesday",
      "Wednesday",
      "Thursday",
      "Friday",
      "Saturday",
      "Sunday",
    ],
    datasets: [
      {
        label: "Average Engage Time",
        data: [0, 0, 0],
        backgroundColor: [
          "rgba(255, 99, 132, 0.2)",
          "rgba(54, 162, 235, 0.2)",
          "rgba(255, 206, 86, 0.2)",
        ],
        borderColor: [
          "rgba(255, 99, 132, 1)",
          "rgba(54, 162, 235, 1)",
          "rgba(255, 206, 86, 1)",
        ],
        borderWidth: 1,
      },
    ],
  },
  options: {
    scales: {
      yAxes: [
        {
          ticks: {
            beginAtZero: true,
          },
        },
      ],
    },
  },
});

// Listen for changes to the data in the Firebase Realtime Database and update the chart
graphRef.on("value", function (snapshot) {
  var MondayData = snapshot.child("Monday").child("Data").val();
  var TuesdayData = snapshot.child("Tuesday").child("Data").val();
  var WednesdayData = snapshot.child("Wednesday").child("Data").val();
  var ThursdayData = snapshot.child("Thursday").child("Data").val();
  var FridayData = snapshot.child("Friday").child("Data").val();
  var SatData = snapshot.child("Saturday").child("Data").val();
  var SunData = snapshot.child("Sunday").child("Data").val();

  chart.data.datasets[0].data = [
    MondayData,
    TuesdayData,
    WednesdayData,
    ThursdayData,
    FridayData,
    SatData,
    SunData,
  ];
  chart.update();
});
