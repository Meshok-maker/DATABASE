<?php
include "../Utils.php";


$query = "select country_name, count(*) as amount from country join city c on country.id = c.country_id join hotels h on c.id = h.host_city group by country.id order by amount desc";
echo "<p>Запрос: $query</p>";
echo Utils::renderSelectQueryToTable($query, []);
?>
<a class="buttons" href="../QuerysBD.php">Назад</a>
