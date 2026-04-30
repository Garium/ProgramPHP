<?php
try {
    $host    = 'gradedunit1-benmacphee1-b4b3.c.aivencloud.com';
    $port    = 17172;                    
    $db      = 'gradedunit';              
    $user    = 'avnadmin';
    $pass    = 'AVNS_J-oEd11luXOcdaQHysb';
    $charset = 'utf8mb4';
    $caPath  = __DIR__ . '/ca.pem';         

    $dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset";

    $link = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
        PDO::MYSQL_ATTR_SSL_CA       => $caPath]);

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}