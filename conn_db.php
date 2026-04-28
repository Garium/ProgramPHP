<?php
$dsn = "mysql:host=gradedunit1-benmacphee1-b4b3.c.aivencloud.com;dbname=gradedunit";
$dbusername = "avnadmin";
$dbpassword = "AVNS_J-oEd11luXOcdaQHysb";
try {
    $link = new PDO($dsn, $dbusername, $dbpassword);
    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>