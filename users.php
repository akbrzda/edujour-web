<?php
$title = $titlehead = "Пользователи";
include "includes/header.php";
include "includes/sidebar.php";
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
                         <td>
                              <?php echo ++$i; ?>
                         </td>
                         <td>
                              <?php echo $row['user_secname']; ?>
                         </td>
                         <td>
                              <?php echo $row['user_name']; ?>
                         </td>
                         <td>
                              <?php echo $row['user_email']; ?>
                         </td>
                         <td>
                              <?php echo $row['user_regdate']; ?>
                         </td>
                         <td>
                              <?php
                              switch ($row['user_position']) {
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
                         <td>
                              <?php echo $row['user_group']; ?>
                         </td>
                         <td>
                              <a href="remove.php?user=<?php echo $row['user_email']; ?>">Удалить</a>
                         </td>
                    </tr>
               <?php endforeach; ?>
          </tbody>
     </table>
</form>


<?php
include "includes/footer.php";
?>