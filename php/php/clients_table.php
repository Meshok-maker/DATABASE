<?php
require 'home.php';
include '../html/Header.html';
?>
<div class="formSelTab m-2 tableSelectContainer">
    <form method="post" action="clients_table.php">
        <button value="clients" class="m-2 btn btn-outline-light">Клиенты</button>
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
        <button value="tours" class="m-2 btn btn-light">Туры</button>
    </form>
    <form method="post" action="sales_table.php">
        <button value="sales" class="m-2 btn btn-light">Продажи</button>
    </form>
</div>
<div class="m-2 tableSelectContainer">
<h3 align="center">Таблица Клиентов</h3>
<form action="queryHandler.php" method="post">
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
<th><input type='radio' name='selected' value='{$row['id']}'></th>
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
               <input type="text" name="surname">
            </p>
            <p>
                Имя
                <input type="text" name="first_name">
            </p>
            <p>
                Отчество
                <input type="text" name="middle_name">
            </p>
            <p>
                Дата рождения
                <input type="date" name="dob">
            </p>
            <p>
                Адрес
                <input type="text" name="adress">
            </p>
            <p>
                Телефон
                <input type="text" name="telephone">
            </p>
            <p>
                Окончание визы
                <input type="date" name="visa">
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

