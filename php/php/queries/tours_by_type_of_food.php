<?php
include "../Utils.php";
$query = "SELECT * FROM tours WHERE type_food = ?";
echo "<p>Запрос: $query</p>";
echo Utils::renderSelectQueryToTable($query, [$_POST["type_food"]]);
?>
<a class="buttons" href="../QuerysBD.php">Назад</a>
