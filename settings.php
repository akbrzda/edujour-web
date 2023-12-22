<?php
$title = $titlehead = "Профиль";
include "includes/header.php";
include "includes/sidebar.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["updateBtn"])) {
    $surname = $_POST['user_secname'];
    $name = $_POST['user_name'];
    $group = $_POST['user_group'];
    $email = $_SESSION['login'];

    $photo = "";
    if (!empty($_FILES['user_photo']['name'])) {
        $allowedExtensions = ["gif", "jpeg", "jpg", "svg", "png"];
        $fileExtension = pathinfo($_FILES['user_photo']['name'], PATHINFO_EXTENSION);
        
        if (in_array(strtolower($fileExtension), $allowedExtensions)) {
            $imageName = $email . "." . $fileExtension;
            $photo = $_FILES['user_photo']['name'];
            
            move_uploaded_file($_FILES['user_photo']['tmp_name'], "images/" . $imageName);
            system('utils/resize.bat ' . $photo . ' ' . $imageName, $sys);
            system('utils/th.bat ' . $imageName, $sys);
        }
    }

    $existingPhoto = $res["user_photo"];
    $imageName = !empty($photo) ? $imageName : basename($existingPhoto);

    $query = "UPDATE users SET user_name = :name, user_secname = :surname, user_group = :group, user_photo = :photo WHERE user_email = :email";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':surname', $surname);
    $stmt->bindParam(':group', $group);
    $stmt->bindParam(':photo', $imageName);
    $stmt->bindParam(':email', $email);

    $stmt->execute();

    header('Location: settings.php');
    exit;
}

?>
<div class="profile__block">
    <form action="settings.php" method="POST" class="update-form" data-form="update" enctype="multipart/form-data">
        <div class="form-group">
            <label class="form-label" for="user_photo">Фото</label>
            <input class="form-control" type="file" name="user_photo" />
        </div>
        <div class="form-group">
            <label class="form-label" for="user_secname">Фамилия</label>
            <input class="form-control" type="text" name="user_secname" required value='<?php echo $res["user_secname"]; ?>' />
        </div>
        <div class="form-group">
            <label class="form-label" for="user_name">Имя</label>
            <input class="form-control" type="text" name="user_name" required value='<?php echo $res["user_name"]; ?>' />
        </div>
        <div class="form-group">
            <label class="form-label" for="user_role">Роль</label>
            <select class="form-control" name="user_role" disabled>
                <option value="student">Студент</option>
                <option value="teacher">Преподаватель</option>
                <option value="admin">Администратор</option>
            </select>
        </div>
        <div class="form-group">
            <label class="form-label" for="user_group">Группа</label>
            <input class="form-control" type="text" name="user_group" value='<?php echo $res["user_group"]; ?>' />
        </div>
        <div class="form-group">
            <label class="form-label" for="user_email">Email</label>
            <input class="form-control" type="email" name="user_email" disabled value='<?php echo $res["user_email"]; ?>' />
        </div>
        <button class="btn btn-primary" type="submit" name="updateBtn" id="loginBtn">Обновить</button>
    </form>
</div>
<?php
include "includes/footer.php";
?>
