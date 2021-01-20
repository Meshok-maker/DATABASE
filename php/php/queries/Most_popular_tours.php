<?php
include "../Utils.php";


$query = "select type_tour, hotel, begin_date, end_date, count(*) as amount from tours join sales s on tours.id = s.tour_id group by tours.id order by amount desc limit 1 ";
echo "<p>Запрос: $query</p>";
echo Utils::renderSelectQueryToTable($query, []);
?>
<a class="buttons" href="../QuerysBD.php">Назад</a>
