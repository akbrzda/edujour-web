<?php
$title = $titlehead = "Пользователи";
include "includes/header.php";
include "includes/sidebar.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteBtn'])) {
    if (isset($_POST['user_id'])) {
        try {
            $query = "DELETE FROM users WHERE user_id = :user_id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':user_id', $_POST['user_id']);
            $stmt->execute();
            header('Location: users.php');
            exit;
        } catch (PDOException $e) {
            echo "Ошибка при удалении пользователя: " . $e->getMessage();
        }
    }
}

try {
    $query = "SELECT * FROM users ORDER BY user_id";
    $st = $conn->query($query);
    $res = $st->fetchAll();
    $i = 0;
} catch (PDOException $e) {
    echo "Ошибка доступа к БД: " . $e->getMessage();
}
?>

<form method="POST" action="">
    <table class='users'>
        <tbody>
            <tr>
                <th>№</th>
                <th>Фамилия</th>
                <th>Имя</th>
                <th>E-mail</th>
                <th>Дата регистрации</th>
                <th>Роль</th>
                <th>Группа</th>
                <th>Действия</th>
            </tr>
            <?php foreach ($res as $row): ?>
                <tr>
                    <td><?php echo ++$i; ?></td>
                    <td><?php echo $row['user_secname']; ?></td>
                    <td><?php echo $row['user_name']; ?></td>
                    <td><?php echo $row['user_email']; ?></td>
                    <td><?php echo $row['user_regdate']; ?></td>
                    <td>
                              <?php
                              switch ($row['user_role']) {
                                   case "1":
                                        echo "Администратор";
                                        break;
                                   case "2":
                                        echo "Преподаватель";
                                        break;
                                   case "3":
                                        echo "Студент";
                                        break;
                              }
                              ?>
                         </td>
                    <td><?php echo $row['user_group']; ?></td>
                    <td>
                            <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">
                            <button type="submit" name="deleteBtn">Удалить</button>
          
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</form>

<?php
include "includes/footer.php";
?>
