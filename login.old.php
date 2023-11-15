<?php
$title = $titlehead = "Войти";
include "includes/header.php";
?>

<body>
  <main class="content auth-page">
    <div class="container">
      <img src="./assets/images/logo.svg" alt="EduJour" class="logo" />
      <div class="auth-block">
        <div class="tabs">
          <button class="tabs__button active" onclick="showForm(event, 'login')">Вход</button>
          <button class="tabs__button" onclick="showForm(event, 'registr')">Регистрация</button>
        </div>
        <form action="./controller/auth.php" method="POST" class="auth-form" data-form="login" style="display: block">
          <h2 class="title">Войти</h2>
          <div class="form-group">
            <label class="form-label" for="authLogin">Email</label>
            <input class="form-control" type="email" name="authLogin" required value="<?php $email ?>" />
          </div>
          <div class="form-group">
            <label class="form-label" for="authPass">Пароль</label>
            <input class="form-control" type="password" name="authPass" required />
          </div>
          <div class="login__check d-flex-sb">
            <div class="login__check-box d-flex-sb">
              <input type="checkbox" name="user-check" id="user-check" />
              <label class="form-label" for="user-check">Запомнить меня</label>
            </div>
            <a href="" id="forgotPass">Забыли пароль?</a>
          </div>
          <input class="btn btn-primary" type="submit" value="Вход" name="loginBtn" />
        </form>
        <form action="./controller/reg.php" method="POST" class="auth-form" data-form="registr" style="display: none">
          <h2 class="title">Регистрация</h2>
          <div class="form-group">
            <label class="form-label" for="user_secname">Фамилия</label>
            <input class="form-control" type="text" name="user_secname" required />
          </div>
          <div class="form-group">
            <label class="form-label" for="user_name">Имя</label>
            <input class="form-control" type="text" name="user_name" required />
          </div>
          <div class="form-group">
            <label class="form-label" for="user_role">Роль</label>
            <select class="form-control" name="user_role" required>
              <option value="" selected></option>
              <option value="student">Студент</option>
              <option value="teacher">Преподаватель</option>
            </select>
          </div>
          <div class="form-group">
            <label class="form-label" for="user_group">Группа</label>
            <input class="form-control" type="text" name="user_group" />
          </div>
          <div class="form-group">
            <label class="form-label" for="user_email">Email</label>
            <input class="form-control" type="email" name="user_email" required />
          </div>
          <div class="form-group">
            <label class="form-label" for="user_password">Пароль</label>
            <input class="form-control" type="password" name="user_password" required />
          </div>
          <div class="form-group">
            <label class="form-label" for="user_password2">Пароль (еще раз)</label>
            <input class="form-control" type="password" name="user_password2" required />
          </div>
          <button class="btn btn-primary" type="submit" id="loginBtn">Зарегистрироваться</button>

        </form>
      </div>
    </div>
  </main>

  <?php
  include "includes/footer.php";
  ?>