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
        <button value="hotels" class="m-2 btn btn-outline-light">Отели</button>
    </form>
    <form method="post" action="tour_table.php">
        <button value="tours" class="m-2 btn btn-light">Туры</button>
    </form>
    <form method="post" action="sales_table.php">
        <button value="sales" class="m-2 btn btn-light">Продажи</button>
    </form>
</div>
<div class="m-2 tableSelectContainer">
<h3 align="center">Таблица отелей</h3>
<form action="Handlers/hotels.php" method="post">
    <table class = "table">
        <tr>
            <th>Выбор</th>
            <th>id</th>
            <th>Название отеля</th>
            <th>Рейтинг</th>
            <th>Цена за место</th>
            <th>id Города</th>
            <th>Название города</th>
        </tr>
        <?
        foreach ($pdo->query("SELECT hotels.id hotels_pk,hotel_name,raiting,price,host_city,city_name FROM hotels join city c on c.id = hotels.host_city;") as $row) {
            echo "<tr>
<th><input type='radio' name='selected' value='{$row['hotels_pk']}'></th>
            <th>{$row['hotels_pk']}</th>
            <th>{$row['hotel_name']}</th>
            <th>{$row['raiting']}</th>
            <th>{$row['price']}</th>
            <th>{$row['host_city']}</th>
            <th>{$row['city_name']}</th>
            </tr>";
        }
        ?>
    </table>
    <div class="m-3 p-1 workdbdiv">
        <h5 class="m-2"> Добавление, изменение и удаление данных в БД</h5>
        <div style="display: flex; flex-direction: column;">
            <input type ="hidden" name="table" value="hotels">
            <p>
                Название отеля
                <input type="text" name="hotel_name">
            </p>
            <p>
                Рейтинг
                <input type="number" name="raiting" min="1" max="5">
            </p>
            <p>
                Расположение отеля
                <select name="host_city">
                    <?php
                    foreach ($pdo->query("SELECT * FROM city;")as $row){
                        echo "<option value='{$row['id']}'>{$row['id']}:{$row['city_name']} </option>>";
                    }
                    ?>
                </select>
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

