<?php
$title = $titlehead = "Войти";
include "includes/header.php";

$email = "";
$_SESSION["error"] = "";

if (!isset($_SESSION["login"])) {
  if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["loginBtn"])) {
    $email = trim($_POST["authLogin"]);
    $password = trim($_POST["authPass"]);

    if (empty($email) || empty($password)) {
      $_SESSION["error"] = "Вы задали не все параметры!";
    } else {
      $query = "SELECT * FROM users WHERE user_email = :email";
      $stmt = $conn->prepare($query);
      $stmt->bindParam(":email", $email);
      $stmt->execute();
      $res = $stmt->fetch(PDO::FETCH_ASSOC);
      $password = Sha1(md5($password));
      if (!$res || $password <> $res['user_password']) {
        $_SESSION["error"] = 'Неверный логин или пароль!';
      } else {
        $_SESSION['login'] = $res['user_email'];
        header('Location: lk.php');
        exit;
      }
    }
  }
  ?>

  <main class="content auth-page">
    <div class="container">
      <img src="./assets/images/logo.svg" alt="EduJour" class="logo" />
      <div class="auth-block">
        <form action="login.php" method="POST" class="auth-form" data-form="login" style="display: block">
          <h2 class="title">Войти</h2>
          <div class="form-group">
            <label class="form-label" for="authLogin">Email</label>
            <input class="form-control" type="email" name="authLogin" value="<?= htmlspecialchars($email) ?>" />
          </div>
          <div class="form-group">
            <label class="form-label" for="authPass">Пароль</label>
            <input class="form-control" type="password" name="authPass" value="" />
          </div>
          <div class="error-box">
            <?php if (isset($_SESSION["error"])) {
              echo '<p class="text-danger">' . $_SESSION["error"] . '</p>';
              unset($_SESSION["error"]);
            } ?>

          </div>
          <div class="login__check d-flex-sb">
            <div class="login__check-box d-flex-sb">
              <input type="checkbox" name="user-check" id="user-check" />
              <label class="form-label" for="user-check">Запомнить меня</label>
            </div>
            <a href="" id="forgotPass">Забыли пароль?</a>
          </div>
          <button class="btn btn-primary" type="submit" name="loginBtn" id="loginBtn">Вход</button>
        </form>
        <div class="signup-box">
          <p>У Вас нет аккаунта? <a href="regQuery.php" id="signUp">Зарегистрироваться</a></p>
        </div>
      </div>
    </div>
  </main>

  <?php
} else {
  header("Location: lk.php");
}
include "includes/footer.php";
?>