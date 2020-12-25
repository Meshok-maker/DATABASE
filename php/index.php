<?php
require './php/home.php';
include './html/Header.html';
?>
    <div class="row m-3 tableSelectContainer">
                    <div class="formSelTab m-2">
                                <form method="post" action="php/clients_table.php">
                                    <button value="clients" class="m-2 btn btn-light">Клиенты</button>
                                </form>
                                <form method="post" action="php/country_table.php">
                                    <button value="country" class="m-2 btn btn-light">Страны</button>
                                </form>
                                <form method="post" action="php/city_table.php">
                                    <button value="city" class="m-2 btn btn-light">Города</button>
                                </form>
                                <form method="post" action="php/hotels_table.php">
                                    <button value="hotels" class="m-2 btn btn-light">Отели</button>
                                </form>
                                <form method="post" action="php/tour_table.php">
                                    <button value="tours" class="m-2 btn btn-light">Туры</button>
                                </form>
                                <form method="post" action="php/sales_table.php">
                                    <button value="sales" class="m-2 btn btn-light">Продажи</button>
                                </form>
                    </div>
<?php
    include './html/Footer.html';
?>