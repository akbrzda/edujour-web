document.addEventListener("DOMContentLoaded", function () {
  var currentPath = window.location.pathname;
  var menuItems = document.querySelectorAll(".sidebar__nav-item");
  menuItems.forEach(function (item) {
    var link = item.querySelector(".sidebar__nav-link");
    if (link.getAttribute("href") === currentPath) {
      item.classList.add("active");
    }
  });
});
