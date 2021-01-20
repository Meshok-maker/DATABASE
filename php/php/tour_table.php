<?php
require 'home.php';
include '../html/Header.html';
?>

<script src="app.js"></script>

<script>
    function update(id) {
        return update_values(`${location.protocol}//${current_host}/php/api/get_tours_by_id.php?id=${id}`);
    }
</script>


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
    foreach ($pdo->query("SELECT tours.id tours_id, type_tour, type_food, hotel_name, begin_date, end_date, is_needed_visa, tours.price tours_price FROM tours join hotels h on h.id = tours.hotel order by tours_id;") as $row) {
        $is_visa_needed = $row['is_needed_visa']?'да':'нет';
        echo "<tr>
<th><input type='radio' name='selected' value='{$row['tours_id']}' onchange='update(this.value)'></th>
            <th>{$row['tours_id']}</th>
            <th>{$row['type_tour']}</th>
            <th>{$row['type_food']}</th>
            <th>{$row['hotel_name']}</th>
            <th>{$row['begin_date']}</th>
            <th>{$row['end_date']}</th>
            <th>{$is_visa_needed}</th>
            <th>{$row['tours_price']}</th>
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
            <select name="type_tour" id="type_tour">
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
            <select name="type_food" id="type_food">
                <option value="Breakfast only">Breakfast only</option>
                <option value="Breakfast and lunch">Breakfast and lunch</option>
                <option value="All inclusive">All inclusive</option>
            </select>
        </p>
        <p>
            Отель
            <select name="hotel" id="hotel">
                <?php
                foreach ($pdo->query("SELECT * FROM hotels;") as $row) {
                    echo "<option value={$row['id']}>{$row['hotel_name']}</option>";
                }
                ?>

            </select>
        </p>
        <p>
            Начало тура
            <input type="date" name="begin_date" id="begin_date">
        </p>
        <p>
            Конец тура
            <input type="date" name="end_date" id="end_date">
        </p>
        <p>
            Требование визы
            <select name="is_needed_visa" id="is_needed_visa">
                <option value="0">нет</option>
                <option value="1">да</option>
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

