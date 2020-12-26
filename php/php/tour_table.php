<?php
require 'home.php';
include '../html/Header.html';
?>
<div class="formSelTab m-2 tableSelectContainer">
    <form method="post" action="clients_table.php">
        <button value="clients" class="m-2 btn btn-light">Клиенты</button>
    </form>
    <form method="post" action="country_table.php">
        <button value="country" class="m-2 btn btn-light">Страны</button>
    </form>
    <form method="post" action="city_table.php">
        <button value="city" class="m-2 btn btn-light">Города</button>
    </form>
    <form method="post" action="hotels_table.php">
        <button value="hotels" class="m-2 btn btn-light">Отели</button>
    </form>
    <form method="post" action="tour_table.php">
        <button value="tours" class="m-2 btn btn-outline-light">Туры</button>
    </form>
    <form method="post" action="sales_table.php">
        <button value="sales" class="m-2 btn btn-light">Продажи</button>
    </form>
</div>
<div class="m-2 tableSelectContainer">
<h3 align="center">Таблица туров</h3>
<form action="Handlers/tours.php" method="post">
<table class = "table">
    <tr>
        <th>Выбор</th>
        <th>id</th>
        <th>Тип тура</th>
        <th>Тип питания</th>
        <th>Отели</th>
        <th>Начало тура</th>
        <th>Конец тура</th>
        <th>Требование визы</th>
        <th>Цена</th>
    </tr>

    <?
    foreach ($pdo->query("SELECT * FROM tours;") as $row) {
        echo "<tr>
<th><input type='radio' name='selected' value='{$row['id']}'></th>
            <th>{$row['id']}</th>
            <th>{$row['type_tour']}</th>
            <th>{$row['type_food']}</th>
            <th>{$row['hotel']}</th>
            <th>{$row['begin_date']}</th>
            <th>{$row['end_date']}</th>
            <th>{$row['is_needed_visa']}</th>
            <th>{$row['price']}</th>
            </tr>";
    }
    ?>
</table>
<div class="m-3 p-1 workdbdiv">
    <h5 class="m-2"> Добавление, изменение и удаление данных в БД</h5>
    <div style="display: flex; flex-direction: column;">
        <input type ="hidden" name="table" value="tours">
        <p>
            Тип тура
            <select name="type_tour">
                <option value="Auto tour">Auto tour</option>
                <option value="Cruise">Cruise</option>
                <option value="Mountain">Mountain</option>
                <option value="Exotic">Exotic</option>
                <option value="Healing">Healing</option>
                <option value="Excursion">Excursion</option>
                <option value="Business">Business</option>
            </select>
        </p>
        <p>
            Тип питания
            <select name="type_food">
                <option value="Breakfast only">Breakfast only</option>
                <option value="Breakfast and lunch">Breakfast and lunch</option>
                <option value="All inclusive">All inclusive</option>
            </select>
        </p>
        <p>
            Отель
            <input type="text" name="hotel">
        </p>
        <p>
            Начало тура
            <input type="date" name="begin_date">
        </p>
        <p>
            Конец тура
            <input type="date" name="end_date">
        </p>
        <p>
            Требование визы
            <input type="number" name="is_needed_visa" value="1" min="0" max="1">
        </p>
        <p>
            Цена
            <input type="number" name="price" min="0">
        </p>
        <div>
            <button type="submit" name="add" class="m-2 btn btn-light">Добавить</button>
            <button type="submit" name="edit" class="m-2 btn btn-light">Изменить всё</button>
            <button type="submit" name="delete" class="m-2 btn btn-light">Удалить</button>
        </div>
    </div>
</div>
</form>
</div>
<?
include '../html/Footer.html';
?>

