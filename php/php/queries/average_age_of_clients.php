<?php
include "../Utils.php";
$query = "SELECT CAST(avg(truncate(datediff(curdate(), dob) / 365.25, 0)) as unsigned) as avg_duration from clients";
echo "<p>Запрос: $query</p>";
echo Utils::renderSelectQueryToTable($query, []);
?>
<a class="buttons" href="../QuerysBD.php">Назад</a>

