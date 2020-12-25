<?php
include "../Utils.php";
$query = "SELECT hotel_name FROM hotels WHERE accommodation_type = ? AND price < ? AND raiting >= ?";
echo "<p>Запрос: $query</p>";
echo Utils::renderSelectQueryToTable($query, [$_POST["accommodation_type"], $_POST["price"], $_POST["rating"]]);
?>
<a class="buttons" href="../QuerysBD.php">Назад</a>
