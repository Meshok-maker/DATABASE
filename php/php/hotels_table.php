<?php
require 'home.php';
include '../html/Header.html';
?>

<script src="app.js"></script>

<script>
    function update(id) {
        return update_values(`http://${current_host}/php/api/get_hotels_by_id.php?id=${id}`);
    }
</script>

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
<th><input type='radio' name='selected' value='{$row['hotels_pk']}' onchange='update(this.value)'></th>
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
                <input type="text" name="hotel_name" id="hotel_name">
            </p>
            <p>
                Рейтинг
                <input type="number" name="raiting" min="1" max="5" id="raiting">
            </p>
            <p>
                Расположение отеля
                <select name="host_city" id="host_city">
                    <?php
                    foreach ($pdo->query("SELECT * FROM city;")as $row){
                        echo "<option value='{$row['id']}'>{$row['id']}:{$row['city_name']} </option>>";
                    }
                    ?>
                </select>
            </p>
            <p>
                Цена
                <input type="number" name="price" min="0" id="price">
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

