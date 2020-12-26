<?php
require '../home.php';
include '../../html/Header.html';

//print_r($_POST);

if(!empty($_POST)) {
    if(isset($_POST['add'])) {
        $sql = "INSERT INTO country(country_name) VALUES (:country_name)";
        $queryAdd = $pdo->prepare($sql);
        $value = array(':country_name'=>$_POST['country_name']);
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
        echo "<a class='m-3 btn btn-outline-dark' href='../country_table.php'>Назад</a>";
    }

    if(isset($_POST['delete'])) {
        $sql = "DELETE FROM country WHERE id='{$_POST['selected']}'";
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
        echo "<a class='m-3 btn btn-outline-dark' href='../country_table.php'>Назад</a>";
    }

    if(isset($_POST['edit'])) {
        $sql = "UPDATE country SET country_name=:country_name WHERE id='{$_POST['selected']}'";
        $queryEdit= $pdo->prepare($sql);
        $value = array(':country_name'=>$_POST['country_name']);
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
        echo "<a class='m-3 btn btn-outline-dark' href='../country_table.php'>Назад</a>";
    }
}

?>

<?php
include '../../html/Footer.html';
?>


