<div class="main_content">
    <?php
    include "../Utils.php";
    $query = "SELECT hotel_name FROM hotels WHERE price <= ? AND raiting >= ?";
    echo Utils::renderSelectQueryToTable($query, [$_POST["number"], $_POST["rating"]]);
    echo "<p>Запрос: $query</p>";
    ?>
    <a class="buttons" href="../QuerysBD.php">Назад</a>
</div>