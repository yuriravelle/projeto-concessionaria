<?php
// arquivo config.php - para sua aplicação PHP
if (!defined('HOST')) {
    define('HOST', "localhost:3307");
    define('USER', "root");
    define('PASS', "");
    define('BASE', "concessionaria");
}

$conn = new mysqli(HOST, USER, PASS, BASE);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}
?>
