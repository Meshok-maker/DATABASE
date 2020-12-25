<?php
include "../Utils.php";
$query = "SELECT * FROM clients WHERE visa < ?";
echo "<p>Запрос: $query</p>";
echo Utils::renderSelectQueryToTable($query, [$_POST["date"]]);
?>
<a class="buttons" href="../QuerysBD.php">Назад</a>
