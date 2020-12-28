<?php
require 'home.php';
include '../html/Header.html';
?>

<script src="app.js"></script>

<script>
    function update(id) {
        return update_values(`http://${current_host}/php/api/get_sales_by_id.php?id=${id}`);
    }
</script>

<div class="m-2 tableSelectContainer">
<h3 align="center">Таблица продаж</h3>
<form action="Handlers/sales.php" method="post">
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
<th><input type='radio' name='selected' value='{$row['sales_pk']}'onchange='update(this.value)'></th>
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
            <input type ="hidden" name="table" value="sales">
            <p>
                Дата продажи
                <input type="date" name="sale_date" id="sale_date">
            </p>
            <p>
                Клиент
                <select name="client_id" id="client_id">
                    <?php
                    foreach ($pdo->query("SELECT id, surname,first_name,middle_name FROM clients order by id;")as $row){
                        echo "<option value='{$row['id']}'>{$row['id']} - {$row['surname']} {$row['first_name']} {$row['middle_name']}</option>>";
                    }
                    ?>
                </select>
            </p>
            <p>
                id Тура
                <select name="tour_id" id="tour_id">
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

