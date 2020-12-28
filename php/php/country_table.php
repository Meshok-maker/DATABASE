<?php
require 'home.php';
include '../html/Header.html';
?>

<script src="app.js"></script>

<script>
    function update(id) {
        return update_values(`${location.protocol}//${current_host}/php/api/get_country_by_id.php?id=${id}`);
    }
</script>

<div class="m-2 tableSelectContainer">
<h3 align="center">Таблица стран</h3>
<form action="Handlers/country.php" method="post">
    <table class = "table">
        <tr>
            <th>Выбор</th>
            <th>id</th>
            <th>Название страны</th>
        </tr>

        <?
        foreach ($pdo->query("SELECT * FROM country;") as $row) {
            echo "<tr>
<th><input type='radio' name='selected' value='{$row['id']}' onchange='update(this.value)'></th>
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
               <input type="text" name="country_name" id="country_name">
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

