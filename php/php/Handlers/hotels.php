<?php
require '../home.php';
include '../../html/Header.html';

//print_r($_POST);

if(!empty($_POST)) {
    if(isset($_POST['add'])) {
        $sql = "INSERT INTO hotels(host_city, hotel_name, raiting, price) VALUES (:host_city, :hotel_name, :raiting, :price)";
        $queryAdd = $pdo->prepare($sql);
        $value = array(':host_city'=>$_POST['host_city'],':hotel_name'=>$_POST['hotel_name'],':raiting'=>$_POST['raiting'],':price'=>$_POST['price']);
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
        echo "<a class='m-3 btn btn-outline-dark' href='../hotels_table.php'>Назад</a>";
    }

    if(isset($_POST['delete'])) {
        $sql = "DELETE FROM hotels WHERE id='{$_POST['selected']}'";
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
        echo "<a class='m-3 btn btn-outline-dark' href='../hotels_table.php'>Назад</a>";
    }

    if(isset($_POST['edit'])) {
        $sql = "UPDATE hotels SET host_city=:host_city, hotel_name=:hotel_name, raiting=:raiting, price=:price WHERE id='{$_POST['selected']}'";
        $queryEdit= $pdo->prepare($sql);
        $value = array(':host_city'=>$_POST['host_city'],':hotel_name'=>$_POST['hotel_name'],':raiting'=>$_POST['raiting'],':price'=>$_POST['price']);
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
        echo "<a class='m-3 btn btn-outline-dark' href='../hotels_table.php'>Назад</a>";
    }
}

?>

<?php
include '../../html/Footer.html';
?>


