<?php
include "../Utils.php";
$query = "SELECT first_name, surname, middle_name, truncate(datediff(curdate(), dob) / 365.25, 0) as age FROM clients WHERE dob < ?";
echo "<p>Запрос: $query</p>";
echo Utils::renderSelectQueryToTable($query, [$_POST["age"]]);
?>
<a class="buttons" href="../QuerysBD.php">Назад</a>

