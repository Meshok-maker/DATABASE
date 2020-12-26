<?php
require '../home.php';
include '../../html/Header.html';

//print_r($_POST);

if(!empty($_POST)) {
    if(isset($_POST['add'])) {
        $sql = "INSERT INTO sales(client_id, tour_id, sale_date) VALUES (:client_id, :tour_id, :sale_date)";
        $queryAdd = $pdo->prepare($sql);
        $value = array(':client_id'=>$_POST['client_id'],':tour_id'=>$_POST['tour_id'],':sale_date'=>$_POST['sale_date']);
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
        echo "<a class='m-3 btn btn-outline-dark' href='../sales_table.php'>Назад</a>";
    }

    if(isset($_POST['delete'])) {
        $sql = "DELETE FROM sales WHERE id='{$_POST['selected']}'";
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
        echo "<a class='m-3 btn btn-outline-dark' href='../sales_table.php'>Назад</a>";
    }

    if(isset($_POST['edit'])) {
        $sql = "UPDATE sales SET client_id=:client_id, tour_id=:tour_id, sale_date=:sale_date WHERE id='{$_POST['selected']}'";
        $queryEdit= $pdo->prepare($sql);
        $value = array(':client_id'=>$_POST['client_id'],':tour_id'=>$_POST['tour_id'],':sale_date'=>$_POST['sale_date']);
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
        echo "<a class='m-3 btn btn-outline-dark' href='../sales_table.php'>Назад</a>";
    }
}

?>

<?php
include '../../html/Footer.html';
?>


