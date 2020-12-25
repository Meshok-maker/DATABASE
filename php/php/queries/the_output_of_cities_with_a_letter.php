<?php
include "../Utils.php";
$query = "SELECT city_name FROM city WHERE city_name LIKE '{$_POST["word"]}%'";
echo "<p>Запрос: $query</p>";
echo Utils::renderSelectQueryToTable($query, []);
?>
<a class="buttons" href="../QuerysBD.php">Назад</a>
