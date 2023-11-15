const profileButton = document.querySelector(".profile");
const profileList = document.querySelector(".profile__list");

profileButton.addEventListener("click", function (e) {
  e.preventDefault();
  profileList.classList.toggle("show");
  e.stopPropagation();
});
document.addEventListener("click", function (e) {
  if (!profileList.contains(e.target)) {
    profileList.classList.remove("show");
  }
});

document.body.addEventListener("click", function () {
  profileList.classList.remove("show");
});

const sidebarBtn = document.querySelector(".sidebar__menu");
sidebarBtn.addEventListener("click", function (e) {
  e.preventDefault();
  $(".sidebar").toggleClass("compact");
});
// Функция для отображения работ определенного типа
function showForm(event, form) {
  event.preventDefault();
  const tabButtons = document.querySelectorAll(".tabs__button");
  tabButtons.forEach((button) => button.classList.remove("active"));
  event.target.classList.add("active");
  const formList = document.querySelectorAll(".auth-form");
  formList.forEach((item) => {
    if (item.dataset.form === form) {
      item.style.display = "block";
    } else {
      item.style.display = "none";
    }
  });
}
