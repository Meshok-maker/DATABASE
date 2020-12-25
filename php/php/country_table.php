<?php
require 'home.php';
include '../html/Header.html';
?>
<div class="formSelTab m-2 tableSelectContainer">
    <form method="post" action="clients_table.php">
        <button value="clients" class="m-2 btn btn-light">Клиенты</button>
    </form>
    <form method="post" action="country_table.php">
        <button value="country" class="m-2 btn btn-outline-light">Страны</button>
    </form>
    <form method="post" action="city_table.php">
        <button value="city" class="m-2 btn btn-light">Города</button>
    </form>
    <form method="post" action="hotels_table.php">
        <button value="hotels" class="m-2 btn btn-light">Отели</button>
    </form>
    <form method="post" action="tour_table.php">
        <button value="tours" class="m-2 btn btn-light">Туры</button>
    </form>
    <form method="post" action="sales_table.php">
        <button value="sales" class="m-2 btn btn-light">Продажи</button>
    </form>
</div>
<div class="m-2 tableSelectContainer">
<h3 align="center">Таблица стран</h3>
<form action="queryHandler.php" method="post">
    <table class = "table">
        <tr>
            <th>Выбор</th>
            <th>id</th>
            <th>Название страны</th>
        </tr>

        <?
        foreach ($pdo->query("SELECT * FROM country;") as $row) {
            echo "<tr>
<th><input type='radio' name='selected' value='{$row['id']}'></th>
            <th>{$row['id']}</th>
            <th>{$row['country_name']}</th>
            </tr>";
        }
        ?>
    </table>
    <div class="m-3 p-1 workdbdiv">
        <h5 class="m-2"> Добавление, изменение и удаление данных в БД</h5>
        <div style="display: flex; flex-direction: column;">
            <input type ="hidden" name="table" value="country">
            <p>
                Название страны
               <input type="text" name="country_name">
            </p>
            <div>
                <button type="submit" name="add" class="m-2 btn btn-light">Добавить</button>
                <button type="submit" name="delete" class="m-2 btn btn-light">Удалить</button>
            </div>
        </div>
    </div>
</form>
</div>
<?
include '../html/Footer.html';
?>

