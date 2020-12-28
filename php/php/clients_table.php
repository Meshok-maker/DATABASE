<?php
require 'home.php';
include '../html/Header.html';
?>

<script src="app.js"></script>

<script>
    function update(id) {
        return update_values(`http://${current_host}/php/api/get_clients_by_id.php?id=${id}`);
    }
</script>

<div class="m-2 tableSelectContainer">
<h3 align="center">Таблица Клиентов</h3>
<form action="Handlers/client.php" method="post">
    <table class = "table">
        <tr>
            <th>Выбор</th>
            <th>id</th>
            <th>Фамилия</th>
            <th>Имя</th>
            <th>Отчество</th>
            <th>Дата рождения</th>
            <th>Адрес</th>
            <th>Телефон</th>
            <th>Дата окончания визы</th>
        </tr>

        <?
        foreach ($pdo->query("SELECT * FROM clients;") as $row) {
            echo "<tr>
<th><input type='radio' name='selected' value='{$row['id']}' onchange='update(this.value)'></th>
            <th>{$row['id']}</th>
            <th>{$row['surname']}</th>
            <th>{$row['first_name']}</th>
            <th>{$row['middle_name']}</th>
            <th>{$row['dob']}</th>
            <th>{$row['adress']}</th>
            <th>{$row['telephone']}</th>
            <th>{$row['visa']}</th>
            </tr>";
        }
        ?>
    </table>
    <div class="m-3 p-1 workdbdiv">
        <h5 class="m-2"> Добавление, изменение и удаление данных в БД</h5>
        <div style="display: flex; flex-direction: column;">
            <input type ="hidden" name="table" value="clients">
            <p>
                Фамилия
               <input type="text" name="surname" id="surname">
            </p>
            <p>
                Имя
                <input type="text" name="first_name" id="first_name">
            </p>
            <p>
                Отчество
                <input type="text" name="middle_name" id="middle_name">
            </p>
            <p>
                Дата рождения
                <input type="date" name="dob" id="dob">
            </p>
            <p>
                Адрес
                <input type="text" name="adress" id="adress">
            </p>
            <p>
                Телефон
                <input type="text" name="telephone" id="telephone">
            </p>
            <p>
                Окончание визы
                <input type="date" name="visa" id="visa">
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

