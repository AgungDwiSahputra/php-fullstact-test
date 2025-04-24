<?php
    require_once 'db.php';
    require_once 'ClientController.php';

    $controller = new ClientController($pdo);

    $method = $_SERVER['REQUEST_METHOD'];
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    $data = json_decode(file_get_contents('php://input'), true);

    echo $controller->handleRequest($method, $id, $data);
?>