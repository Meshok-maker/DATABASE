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
        <button value="tours" class="m-2 btn btn-light">Туры</button>
    </form>
    <form method="post" action="sales_table.php">
        <button value="sales" class="m-2 btn btn-outline-light">Продажи</button>
    </form>
</div>
<div class="m-2 tableSelectContainer">
<h3 align="center">Таблица продаж</h3>
<form action="queryHandler.php" method="post">
    <table class = "table">
        <tr>
            <th>Выбор</th>
            <th>id</th>
            <th>Дата продажи</th>
            <th>ФИО клиента</th>
            <th>id Тура</th>
        </tr>

        <?
        foreach ($pdo->query("SELECT sales.id sales_pk, sale_date, surname,first_name,middle_name, tour_id  FROM sales join clients c on c.id = sales.client_id") as $row) {
            $fio= "{$row['surname']} {$row['first_name']} {$row['middle_name']}";
            echo "<tr>
<th><input type='radio' name='selected' value='{$row['sales_pk']}'></th>
            <th>{$row['sales_pk']}</th>
            <th>{$row['sale_date']}</th>
            <th>{$fio}</th>
            <th>{$row['tour_id']}</th>
            </tr>";
        }
        ?>
    </table>
    <div class="m-3 p-1 workdbdiv">
        <h5 class="m-2"> Добавление, изменение и удаление данных в БД</h5>
        <div style="display: flex; flex-direction: column;">
            <input type ="hidden" name="table" value="city">
            <p>
                Дата продажи
                <input type="date" name="sale_date">
            </p>
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
                id Тура
                <select name="country_id">
                    <?php
                    foreach ($pdo->query("SELECT id FROM tours order by id;")as $row){
                        echo "<option value='{$row['id']}'>{$row['id']}</option>>";
                    }
                    ?>
                </select>
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

