
<?php
require 'conn_db.php';
include 'includes/nav.php';

$company_ID = $_SESSION['company_ID'];
$certifice_ID = $certificate_Level = $certificate_Ref= $date = $CompanyName = "";
$stmt = $link->prepare("SELECT certificate_progress.certifice_ID, certificate_progress.certificate_Ref, account_rubrics.certificate_Level, account_rubrics.Rubric_date , company_account.CompanyName
FROM certificate_progress 
INNER JOIN account_rubrics ON certificate_progress.Rubric_ID=account_rubrics.Rubric_ID
INNER JOIN company_account ON company_account.company_ID=account_rubrics.company_ID
WHERE company_account.company_ID = ?
ORDER by account_rubrics.Rubric_date ASC LIMIT 1;");
$stmt->bind_param("i", $company_ID);
if ($stmt->execute()) {
$stmt->store_result();
$stmt->bind_result($certifice_ID, $certificate_Ref, $certificate_Level, $date, $CompanyName);
$stmt->fetch();
}else {
	echo "Error: " . $stmt->error;
}
$classname = 'bronze';
if($certificate_Level == "Gold"){
   $classname = 'gold';
 }
else if($certificate_Level == "Silver"){
   $classname = 'silver';
 }
?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Certificate of Achievement</title>
<style>
body {

	font-family: "Vidaloka", serif;
	font-weight: 400;
	font-style: normal;
	background: #432f5e;
    margin: 0;
    padding: 0;
}
.gold{
    width: 80%;
    max-width: 800px;
    margin: 50px auto;
    padding: 40px;
    border: 10px solid #856A00;
    background: #fff;
    box-shadow: 0 0 20px rgba(0,0,0,0.1);
    position: relative;
}
.silver{
    width: 80%;
    max-width: 800px;
    margin: 50px auto;
    padding: 40px;
    border: 10px solid  #A9A9A9;
    background: #fff;
    box-shadow: 0 0 20px rgba(0,0,0,0.1);
    position: relative;
}
.bronze{
    width: 80%;
    max-width: 800px;
    margin: 50px auto;
    padding: 40px;
    border: 10px solid #CD8032;
    background: #fff;
    box-shadow: 0 0 20px rgba(0,0,0,0.1);
    position: relative;
}
.certificate-header {
    text-align: center;
    font-size: 2.5em;
    font-weight: bold;
    margin-bottom: 20px;
}

.certificate-body {
    text-align: center;
    font-size: 1.2rem;
    margin: 20px 0;
}
.certificate-footer {
    display: flex;
    justify-content: space-between;
    margin-top: 50px;
    padding: 0 50px;
}
.referanceNum {
    text-align: center;
    font-weight: bold;
	font-size: 0.6em;
}
</style>
</head>
<body>

<div class="logrow <?php echo $classname ?>">
    <div class="certificate-header" id='logrow <?php echo $classname ?> '>
        Certificate of Achievement
    </div>
    <div class="certificate-body">
        <p>This is to certify that</p>
        <h1><?php echo $CompanyName; ?></h1>
        <p>has successfully achieved the level of</p>
        <h1><?php echo $certificate_Level; ?></h1>

    </div>
    <div class="certificate-footer">
        <div class="referanceNum">
			<p>Certificate Referance Number:</p>
            <?php echo $certificate_Ref;?>
        </div>
        <div class="date">
            <?php echo $date; ?>
        </div>
    </div>
</div>

</body>
</html>

<?php include 'includes/FooterLoggedIn.php';?>