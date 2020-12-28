<?php
require '../home.php';

if(!empty($_GET)) {
    header('application/json');
    $id = $_GET['id'];
    $query = $pdo->prepare('SELECT * FROM city WHERE id=?');
    $query->execute([$id]);
    echo json_encode($query->fetchAll(PDO::FETCH_ASSOC)[0]);
}