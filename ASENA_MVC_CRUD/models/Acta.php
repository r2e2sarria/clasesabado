<?php
class Acta {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function obtenerTodos() {
        return $this->conn->query("SELECT * FROM actas");
    }

    public function obtenerResponsables() {
        return $this->conn->query("SELECT * FROM responsables");
    }

    public function guardarResponsable($nombre) {
        return $this->conn->query("INSERT INTO responsables (nombre) VALUES ('$nombre')");
    }

    public function crear($titulo, $fecha, $descripcion, $responsable, $estado, $archivo, $nombreArchivo) {
        $sql = "INSERT INTO actas 
        (titulo, fecha, descripcion, responsable, estado, archivo, nombre_archivo)
        VALUES 
        ('$titulo','$fecha','$descripcion','$responsable','$estado','$archivo','$nombreArchivo')";
        return $this->conn->query($sql);
    }

    public function eliminar($id) {
        return $this->conn->query("DELETE FROM actas WHERE id=$id");
    }
}