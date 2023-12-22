<?php
$title = $titlehead = "Войти";
include "includes/header.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["signBtn"])) {

$surname = addslashes($_POST['user_secname']);
$name = addslashes($_POST['user_name']);
$email = addslashes($_POST['user_email']);
$role = addslashes($_POST['user_role']);
$roleNum = '';
if ($role == 'teacher') {
     $roleNum = '2';
} else if ($role == 'student') {
     $roleNum = '3';
     $studentGroup = addslashes($_POST['user_group']);
} else {
     echo "Выберите свою роль!";
     exit;
}

$passwd = addslashes($_POST['user_password']);
if (!$email || !$passwd || !$name) {
     echo "<p>Вы задали не все параметры</p>";
      header('Location: registration.php');
     exit;
}
if ($_POST['user_password2'] <> $passwd) {
     echo "<p>Пароли не совпадают!</p>";
     header('Location: registration.php');
     exit;
}
$passwd = SHA1(md5($passwd));
$query = "Insert into users values
('', '$name','$surname','$email','$passwd','$roleNum', '$studentGroup', CURRENT_DATE(), '')";
$conn->exec($query);

$_SESSION['login'] = $email;
header('Location: lk.php');
exit;
}

?>

<body>
  <main class="content auth-page">
    <div class="container">
      <img src="./assets/images/logo.svg" alt="EduJour" class="logo" />
      <div class="auth-block">
        <form action="registration.php" method="POST" class="auth-form" data-form="registration">
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
          <button class="btn btn-primary" type="submit" id="loginBtn" name="signBtn">Зарегистрироваться</button>

        </form>
      </div>
    </div>
  </main>

  <?php
  include "includes/footer.php";
  ?>