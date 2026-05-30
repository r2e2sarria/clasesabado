<?php
require_once "models/Acta.php";
require_once "config/database.php";

class ActaController {
    private $model;

    public function __construct() {
        global $conn;
        $this->model = new Acta($conn);
    }

    public function index() {
        $actas = $this->model->obtenerTodos();
        $responsables = $this->model->obtenerResponsables();
        require "views/home.php";
    }

    public function crear() {

        $archivo = null;
        $nombreArchivo = null;

        if(isset($_FILES['archivo']) && $_FILES['archivo']['tmp_name'] != "") {
            $archivo = file_get_contents($_FILES['archivo']['tmp_name']);
            $archivo = addslashes($archivo);
            $nombreArchivo = $_FILES['archivo']['name'];
        }

        $this->model->crear(
            $_POST['titulo'],
            $_POST['fecha'],
            $_POST['descripcion'],
            $_POST['responsable'],
            $_POST['estado'],
            $archivo,
            $nombreArchivo
        );

        header("Location: index.php");
    }

    public function guardarResponsable() {
        $this->model->guardarResponsable($_POST['nombre']);
    }

    public function eliminar() {
        $this->model->eliminar($_GET['id']);
        header("Location: index.php");
    }
}