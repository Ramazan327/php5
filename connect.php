<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=php", "root", "");
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>