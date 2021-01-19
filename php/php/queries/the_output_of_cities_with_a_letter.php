<?php
include "../Utils.php";
$query = "SELECT city_name FROM city WHERE city_name LIKE ?";
echo "<p>Запрос: $query</p>";
echo Utils::renderSelectQueryToTable($query, ["{$_POST["word"]}%"]);
?>
<a class="buttons" href="../QuerysBD.php">Назад</a>
