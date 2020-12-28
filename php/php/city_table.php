<?php
require 'home.php';
include '../html/Header.html';
?>

<script src="app.js"></script>

<script>
    function update(id) {
        return update_values(`${location.protocol}//${current_host}/php/api/get_city_by_id.php?id=${id}`);
    }
</script>

<div class="m-2 tableSelectContainer">
    <h3 align="center">Таблица городов</h3>
<form action="Handlers/city.php" method="post">
    <table class = "table">
        <tr>
            <th>Выбор</th>
            <th>id</th>
            <th>Название города</th>
            <th>id Страны</th>
            <th>Название страны</th>
        </tr>

        <?
        foreach ($pdo->query("SELECT city.id city_pk, city_name,country_id,country_name FROM city join country c on c.id = city.country_id;") as $row) {
            echo "<tr>
<th><input type='radio' name='selected' value='{$row['city_pk']}' onchange='update(this.value)'></th>
            <th>{$row['city_pk']}</th>
            <th>{$row['city_name']}</th>
            <th>{$row['country_id']}</th>
            <th>{$row['country_name']}</th>
            </tr>";
        }
        ?>
    </table>
    <div class="m-3 p-1 workdbdiv">
        <h5 class="m-2"> Добавление, изменение и удаление данных в БД</h5>
        <div style="display: flex; flex-direction: column;">
            <input type ="hidden" name="table" value="city">
            <p>
                Название города
               <input type="text" name="city_name" id="city_name">
            </p>
            <p>
                Название страны
                <select name="country_id" id="country_id">
                <?php
                foreach ($pdo->query("SELECT * FROM country;")as $row){
                    echo "<option value='{$row['id']}'>{$row['id']}:{$row['country_name']} </option>>";
                }
                ?>
                </select>
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

