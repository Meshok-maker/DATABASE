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
    foreach ($pdo->query("SELECT * FROM tours;") as $row) {
        echo "<tr>
<th><input type='radio' name='selected' value='{$row['id']}' onchange='update(this.value)'></th>
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
            <input type="text" name="hotel" id="hotel">
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
            <input type="number" name="is_needed_visa" value="1" min="0" max="1" id="is_needed_visa">
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

