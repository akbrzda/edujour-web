<nav class="sidebar d-flex-sb">
     <button class="sidebar__menu"></button>
     <a class="logo" href="/">
          <img alt="EduJour" src="./assets/images/logo.svg" />
     </a>
     <button class="burger-menu">
          <span class="burger-line"></span>
          <span class="burger-line"></span>
          <span class="burger-line"></span>
     </button>
     <?php
     if (isset($_SESSION['login'])) {
          $login = $_SESSION['login'];
          $query = "SELECT * FROM users WHERE user_email='$login'";
          $st = $conn->query($query);
          $res = $st->fetch(PDO::FETCH_BOTH);
          echo '<p id="user">' . $res["user_name"] . ' ' . $res["user_secname"] . '
</p>';
     }
     ?>
     <ul class="sidebar__nav-list">
          <li class="sidebar__nav-item">
               <a href="/lk.php" class="sidebar__nav-link"><i id="home-icon"></i>Главная</a>
          </li>
          <?php
          $position = $res["user_position"];
          if ($position == '2' or $position == '1') {
               ?>
               <li class="sidebar__nav-item">
                    <a href="/classes.php" class="sidebar__nav-link"><i id="classes-icon"></i>Группы</a>
               </li>
               <?php
          } else {

          }
          ?>
          <li class="sidebar__nav-item">
               <a href="/courses.php" class="sidebar__nav-link"><i id="courses-icon"></i>Курсы</a>
          </li>
          <li class="sidebar__nav-item">
               <a href="/attendance.php" class="sidebar__nav-link"><i id="attendance-icon"></i>Посещаемость</a>
          </li>
          <li class="sidebar__nav-item">
               <a href="/messages.php" class="sidebar__nav-link"><i id="messages-icon"></i>Сообщения <span
                         class="badge">4</span></a>
          </li>
          <?php
          if ($position == '1') {
               ?>
               <li class="sidebar__nav-item">
                    <a href="/users.php" class="sidebar__nav-link"><i id="users-icon"></i>Пользователи</a>
               </li>

               <?php
          } else {

          }
          ?>
     </ul>
     <a class="sign-out" href="logout.php">Выйти</a>
</nav>
<header class="header d-flex-sb">
     <div class="search__form">
          <button class="search__btn"></button>
          <input type="search" class="search__input" placeholder="Искать группы, курсы и др." />
     </div>
     <div class="profile__box d-flex-sb">
          <a class="profile__notification"><i></i></a>
          <a class="profile">
               <img src="./assets/images/avatar-placeholder.png" alt="Avatar" class="profile__img" />
          </a>
          <ul class="profile__list">
               <li class="profile__list-item"><a href="profile.php" class="profile__item-link">Личный кабинет</a></li>
               <li class="profile__list-item"><a href="settings.php" class="profile__item-link">Настройки</a></li>
               <li class="profile__list-item"><a class="profile__item-link" href="logout.php">Выйти</a></li>
          </ul>
     </div>
</header>
<main class="content">