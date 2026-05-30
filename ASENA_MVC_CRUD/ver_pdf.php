<?php
require_once "config/database.php";

$id = $_GET['id'];

$sql = "SELECT archivo, nombre_archivo FROM actas WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if (ob_get_length()) ob_end_clean();

header("Content-Type: application/pdf");
header("Content-Disposition: inline; filename=".$row['nombre_archivo']);
header("Content-Length: " . strlen($row['archivo']));

echo $row['archivo'];
exit;