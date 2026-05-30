<?php
require_once "controllers/ActaController.php";

$controller = new ActaController();

$action = $_GET['action'] ?? '';

switch ($action) {

    case 'crear':
        $controller->crear();
        break;

    case 'guardarResponsable':
        $controller->guardarResponsable();
        break;

    case 'eliminar':
        $controller->eliminar();
        break;

    default:
        $controller->index();
        break;
}