<?php
include "../Utils.php";
$query = "SELECT city_name FROM city WHERE country_id = ?";
echo "<p>Запрос: $query</p>";
echo Utils::renderSelectQueryToTable($query, [$_POST["all_countries"]]);
?>
<a class="buttons" href="../QuerysBD.php">Назад</a>
