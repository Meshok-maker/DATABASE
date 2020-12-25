<?php
include "../Utils.php";
$query = "SELECT * FROM tours WHERE type_tour = ? AND price < ?";
echo "<p>Запрос: $query</p>";
echo Utils::renderSelectQueryToTable($query, [$_POST["type_tour"], $_POST["price"]]);
?>
<a class="buttons" href="../QuerysBD.php">Назад</a>
