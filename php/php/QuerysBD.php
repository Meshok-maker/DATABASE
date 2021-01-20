<?php
require 'home.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AroundTheWorld</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">

</head>
<body>
<!-- Начало шапки -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <a class="navbar-brand" href="../index.php">
        <img src="../img/logo.jpg" width="150" height="50" class="d-inline-block align-top" alt="" loading="lazy">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="../index.php">Работа с БД <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="QuerysBD.php">Запросы к базе данных</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container">
    <div class="m-2 mb-3">
        <div class="bodyMain">
            <h2 class="m-3">Запросы к БД</h2>
            <div class="col m-3">
                <div class="row">
                    <form method="POST" action="queries/the_output_of_cities_with_a_letter.php">
                        <h6 class="m-1">1) Вывод всех городов, которые начинаются на определенную букву:
                            <input type="text" name="word">
                            <button type="submit" class="m-2 btn btn-outline-dark">Выполнить</button>
                        </h6>
                    </form>
                </div>
                <div class="row">
                    <form method="POST" action="queries/hotels_with_a_certain_price_and_rating.php">
                        <h6 class="m-1">2) Вывести отели, где цена ниже
                            <input type="number" name="number" min="0">
                            и рейтинг выше
                            <input type="number" name="rating" min="1" max="5">
                            <button type="submit" class="m-2 btn btn-outline-dark">Выполнить</button>
                        </h6>
                    </form>
                </div>
                <div class="row">
                    <form method="POST" action="queries/clients_visa_expires_before_a_certain_date.php">
                        <h6 class="m-1">3) Вывести клиентов, у которых виза кончается до определенной даты:
                            <input type="date" name="date">
                            <button type="submit" class="m-2 btn btn-outline-dark">Выполнить</button>
                        </h6>
                    </form>
                </div>
                <div class="row">
                    <form method="POST" action="queries/tours_by_type_of_food.php">
                        <h6 class="m-1">4) Вывести туры по типу питания:
                            <select name="type_food">
                                <option value="Breakfast only">Breakfast only</option>
                                <option value="Breakfast and lunch">Breakfast and lunch</option>
                                <option value="All inclusive">All inclusive</option>
                            </select>
                            <button type="submit" class="m-2 btn btn-outline-dark">Выполнить</button>
                        </h6>
                    </form>
                </div>
                <div class="row">
                    <form method="POST" action="queries/cities_by_given_country.php">
                        <h6 class="m-1">5) Вывести города по заданной стране:
                            <select name="all_countries">
                                <?
                                foreach ($pdo->query('SELECT DISTINCT id,country_name FROM country') as $row) {
                                    echo "<option value='{$row['id']}'>{$row['country_name']}</option>";
                                }
                                ?>
                            </select>
                            <button type="submit" name="title_date" class="m-2 btn btn-outline-dark">Выполнить</button>
                        </h6>
                    </form>
                </div>
                <div class="row">
                    <form method="POST" action="queries/age_and_full_name_of_clients_who_older_than_date.php">
                        <h6 class="m-1">6) Вывести возраст(сколько полных лет) клиентов, которые старше заданной даты:
                            <input type="date" name="age">
                            <button type="submit" class="m-2 btn btn-outline-dark">Выполнить</button>
                        </h6>
                    </form>
                </div>
                <div class="row">
                    <form method="POST" action="queries/tours_with_a_certain_type_and_price.php">
                        <h6 class="m-1">7) Вывести все туры по определенному типу и ниже определенной цены:
                            <select name="type_tour">
                                <option value="Auto tour">Auto tour</option>
                                <option value="Cruise">Cruise</option>
                                <option value="Mountain">Mountain</option>
                                <option value="Exotic">Exotic</option>
                                <option value="Healing">Healing</option>
                                <option value="Excursion">Excursion</option>
                                <option value="Business">Business</option>
                            </select>
                            <input type="number" name="price" min="0">
                            <button type="submit" class="m-2 btn btn-outline-dark">Выполнить</button>
                        </h6>
                    </form>
                </div>
                <div class="row">
                    <form method="POST" action="queries/tours_in_a_given_year.php">
                        <h6 class="m-1">8) Вывести все туры, которые были или будут в заданном году:
                            <input type="number" min="2000" name="tours_in_this_year">
                            <button type="submit" class="m-2 btn btn-outline-dark">Выполнить</button>
                        </h6>
                    </form>
                </div>

                <div class="row">
                    <form method="POST" action="queries/hotels_in_a_given_city.php">
                        <h6 class="m-1">9) Вывести отели, расположенные в заданном городе:
                            <select name="all_hotels">
                                <?
                                foreach ($pdo->query('SELECT DISTINCT id,city_name FROM city') as $row) {
                                    echo "<option value='{$row['id']}'>{$row['city_name']}</option>";
                                }
                                ?>
                            </select>
                            <button type="submit" class="m-2 btn btn-outline-dark">Выполнить</button>
                        </h6>
                    </form>
                </div>

                <div class="row">
                </div>

                <div class="row">
                    <form method="POST" action="queries/clients_who_bought_ticket_on_certain_date.php">
                        <h6 class="m-1">10) Вывести клиентов, которые купили билеты в определенную дату:
                            <input type="date" name="buy_tickets_date">
                            <button type="submit" class="m-2 btn btn-outline-dark">Выполнить</button>
                        </h6>
                    </form>
                </div>

                <div class="row">
                    <form method="POST" action="queries/average_age_of_clients.php">
                        <h6 class="m-1">11) Вывести средний возраст клиентов:
                            <button type="submit" class="m-2 btn btn-outline-dark">Выполнить</button>
                        </h6>
                    </form>
                </div>

                <div class="row">
                    <form method="POST" action="queries/revenue_in_certain_period.php">
                        <h6 class="m-1">12) Вывести выручку c
                            <input type="date" name="initial_revenue_term">
                            по
                            <input type="date" name="earnings_deadline">
                            <button type="submit" class="m-2 btn btn-outline-dark">Выполнить</button>
                        </h6>
                    </form>
                </div>

                <div class="row">
                    <form method="POST" action="queries/Most_popular_tours.php">
                        <h6 class="m-1">13) Вывести самый популярный тур
                            <button type="submit" class="m-2 btn btn-outline-dark">Выполнить</button>
                        </h6>
                    </form>
                </div>

                <div class="row">
                    <form method="POST" action="queries/Which_countries_have_the_most_hotels.php">
                        <h6 class="m-1">14) Количество отелей по странам
                            <button type="submit" class="m-2 btn btn-outline-dark">Выполнить</button>
                        </h6>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>