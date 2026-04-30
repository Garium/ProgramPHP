<?php
session_start();
 require 'conn_db.php';
$company_ID = $_SESSION['company_ID'];
$stmt = $link->prepare("UPDATE company_account SET accountStatus = 'Inactive' WHERE company_ID = :cid");
$stmt->execute([':cid' => $company_ID]);
session_unset();
session_destroy();
header("Location: Home.php");
exit();
?>
