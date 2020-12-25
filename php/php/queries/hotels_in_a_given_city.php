<?php
include "../Utils.php";
$query = "SELECT hotel_name FROM hotels WHERE host_city = ?";
echo "<p>Запрос: $query</p>";
echo Utils::renderSelectQueryToTable($query, [$_POST["all_hotels"]]);
?>
<a class="buttons" href="../QuerysBD.php">Назад</a>
