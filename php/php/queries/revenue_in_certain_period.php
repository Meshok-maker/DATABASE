<?php
include "../Utils.php";
$query = "SELECT sum(price) FROM sales JOIN tours t on t.id = sales.tour_id WHERE sale_date > ? AND sale_date < ?";
echo "<p>Запрос: $query</p>";
echo Utils::renderSelectQueryToTable($query, [$_POST["initial_revenue_term"], $_POST["earnings_deadline"]]);
?>
<a class="buttons" href="../QuerysBD.php">Назад</a>
