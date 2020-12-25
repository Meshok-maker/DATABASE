<?php
include "../Utils.php";
$query = "SELECT * FROM tours WHERE YEAR(begin_date) = ?";
echo "<p>Запрос: $query</p>";
echo Utils::renderSelectQueryToTable($query, [$_POST["tours_in_this_year"]]);
?>
<a class="buttons" href="../QuerysBD.php">Назад</a>
