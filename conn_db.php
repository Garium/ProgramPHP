<?php

$uri = "MYSQL_URI";

$fields = parse_url($uri);

// build the DSN including SSL settings
$link = "mysql:";
$link .= "host=" . $fields["host"];
$link .= ";port=" . $fields["port"];;
$link .= ";dbname=defaultdb";
$link .= ";sslmode=verify-ca;sslrootcert='D:/absolute/path/to/ssl/certs/ca.pem'";

try {
    $db = new PDO($link, $fields["user"], $fields["pass"]);

    $stmt = $db->query("SELECT VERSION()");
    print($stmt->fetch()[0]);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}