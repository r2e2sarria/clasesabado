<?php
$conn = new mysqli("localhost", "root", "", "asena_actas");

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}