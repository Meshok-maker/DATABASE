# вывод всех городов, начинающихся на букву определенную букву
SELECT city_name FROM city WHERE city_name LIKE ?;
# вывести отели, где цена выше n-ой цены и рейтинг выше m-ого
SELECT hotel_name FROM hotels WHERE price > ? AND raiting > ?;
# вывести клиентов, у которых виза кончается до определенной даты
SELECT * FROM clients WHERE visa < ?;
# вывести туры по типу питания
SELECT * FROM tours WHERE type_food = ?;
# вывести города по заданной стране
SELECT city_name FROM city WHERE country_id = ?;
# вывести возраст(сколько полных лет) и ФИО клиентов, которых больше заданной даты
SELECT first_name, surname, middle_name, truncate(datediff(curdate(), dob) / 365.25, 0) as age FROM clients WHERE dob < ?;
# вывести все туры по определенному типу и ниже определенной цены
SELECT * FROM tours WHERE type_tour < ? AND price < ?;
# вывести все туры, которые будут в заданном году
SELECT * FROM tours WHERE YEAR(begin_date) = ?;
# вывести отели, расположенные в заданном городе
SELECT hotel_name FROM hotels WHERE hotel_name = ?;
# вывести отели с определенным типом размещения, определенной ценой и определенным рейтингом
SELECT hotel_name FROM hotels WHERE accommodation_type = ? AND price < ? AND raiting = ?;
# вывести клиентов, которые купили билеты в определенную дату
SELECT * FROM clients JOIN sales s on clients.id = s.client_id WHERE sale_date = ?;
# вывод среднего возраста клиентов
SELECT avg(truncate(datediff(curdate(), dob) / 365.25, 0)) as avg_duration from clients;
# вывести  выручку за определенный срок
SELECT sum(price) FROM sales JOIN tours t on t.id = sales.tour_id WHERE sale_date > ? AND sale_date < ?;

