<?php
include "../Utils.php";
$query = "SELECT * FROM clients JOIN sales s on clients.id = s.client_id WHERE sale_date = ?";
echo "<p>Запрос: $query</p>";
echo Utils::renderSelectQueryToTable($query, [$_POST["buy_tickets_date"]]);
?>
<a class="buttons" href="../QuerysBD.php">Назад</a>
