// Dashboard
const allSideMenu = document.querySelectorAll("#sidebar .side-menu.top li a");

allSideMenu.forEach((item) => {
  const li = item.parentElement;

  item.addEventListener("click", function () {
    allSideMenu.forEach((i) => {
      i.parentElement.classList.remove("active");
    });
    li.classList.add("active");
  });
});

// TOGGLE SIDEBAR
const menuBar = document.querySelector("#content nav .bx.bx-menu");
const sidebar = document.getElementById("sidebar");

menuBar.addEventListener("click", function () {
  sidebar.classList.toggle("hide");
});

const switchMode = document.getElementById("switch-mode");

// check if dark or white from local storage
const isDarkModeEnabled = localStorage.getItem('isDarkModeEnabled') === 'true';
if (isDarkModeEnabled) {
  document.body.classList.add("dark");
  switchMode.checked = true;
}

switchMode.addEventListener("change", function () {
  if (this.checked) {
    document.body.classList.add("dark");
    localStorage.setItem('isDarkModeEnabled', 'true'); 
  } else {
    document.body.classList.remove("dark");
    localStorage.setItem('isDarkModeEnabled', 'false');
  }
});


