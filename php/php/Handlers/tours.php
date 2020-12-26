<?php
require '../home.php';
include '../../html/Header.html';

print_r($_POST);

if(!empty($_POST)) {
    if(isset($_POST['add'])) {
        $sql = "INSERT INTO tours(type_tour, type_food, hotel, begin_date, end_date, is_needed_visa, price) 
                VALUES (:type_tour, :type_food, :hotel, :begin_date, :end_date, :is_needed_visa, :price)";
        $queryAdd = $pdo->prepare($sql);
        $value = array(':type_tour'=>$_POST['type_tour'],':type_food'=>$_POST['type_food'],':hotel'=>$_POST['hotel'],':begin_date'=>$_POST['begin_date'],':end_date'=>$_POST['end_date'],':is_needed_visa'=>$_POST['is_needed_visa'],':price'=>$_POST['price']);
        if($queryAdd ->execute($value)) {
            echo "
            <div class='alert alert-primary m-3' role='alert'>
              <h4 class='alert-heading'>Успешно!</h4>
              <p>Запрос выполнен успешно</p>
              <hr>
              <p class='mb-0'>Чтобы вернуться, нажмите кнопку назад</p>
            </div>
        ";
        }
        else
        {
            echo "
            <div class='alert alert-danger m-3' role='alert'>
              <h4 class='alert-heading'>Провал</h4>
              <p>Не выполнено</p>
              <hr>
              <p class='mb-0'>Что-то пошло не так, нажмите кнопку `назад`</p>
            </div>
        ";
        }
        echo "<a class='m-3 btn btn-outline-dark' href='../tour_table.php'>Назад</a>";
    }

    if(isset($_POST['delete'])) {
        $sql = "DELETE FROM tours WHERE id='{$_POST['selected']}'";
        $queryDelete = $pdo->prepare($sql);
        //print_r($queryDelete);
        if($queryDelete->execute())
        {
            echo "
           <div class='alert alert-primary m-3' role='alert'>
              <h4 class='alert-heading'>Успешно!</h4>
              <p>Запрос выполнен успешно</p>
              <hr>
              <p class='mb-0'>Чтобы вернуться, нажмите кнопку назад</p>
            </div>
        ";
        }
        else
        {
            echo "
             <div class='alert alert-danger m-3' role='alert'>
              <h4 class='alert-heading'>Провал</h4>
              <p>Не выполнено</p>
              <hr>
              <p class='mb-0'>Что-то пошло не так, нажмите кнопку `назад`</p>
            </div>
        ";
        }
        echo "<a class='m-3 btn btn-outline-dark' href='../tour_table.php'>Назад</a>";
    }

    if(isset($_POST['edit'])) {
        $sql = "UPDATE tours SET type_tour=:type_tour, type_food=:type_food, hotel=:hotel, begin_date=:begin_date, end_date=:end_date, is_needed_visa=:is_needed_visa, price=:price  WHERE id='{$_POST['selected']}'";
        $queryEdit= $pdo->prepare($sql);
        $value = array(':type_tour'=>$_POST['type_tour'],':type_food'=>$_POST['type_food'],':hotel'=>$_POST['hotel'],':begin_date'=>$_POST['begin_date'],':end_date'=>$_POST['end_date'],':is_needed_visa'=>$_POST['is_needed_visa'],':price'=>$_POST['price']);
        if($queryEdit->execute($value)) {
            echo "
            <div class='alert alert-primary m-3' role='alert'>
              <h4 class='alert-heading'>Успешно!</h4>
              <p>Запрос выполнен успешно</p>
              <hr>
              <p class='mb-0'>Чтобы вернуться, нажмите кнопку назад</p>
            </div>
        ";
        }
        else
        {
            echo "
            <div class='alert alert-danger m-3' role='alert'>
              <h4 class='alert-heading'>Провал</h4>
              <p>Не выполнено</p>
              <hr>
              <p class='mb-0'>Что-то пошло не так, нажмите кнопку `назад`</p>
            </div>
        ";
        }
        echo "<a class='m-3 btn btn-outline-dark' href='../tour_table.php'>Назад</a>";
    }
}

?>

<?php
include '../../html/Footer.html';
?>


