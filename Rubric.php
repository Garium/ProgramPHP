
<?php

include 'includes/nav.php';

require 'conn_db.php';

ob_start()
?>

<html lang="en">
<style>
.radio-label {
   display: inline-block;
    vertical-align: top;
    margin-right: 3%;
}
.radio-input {
   display: inline-block;
    vertical-align: top;
}
fieldset {
    text-align: center;
}
.divForm {
    margin: auto;
    border: 1px solid black;
}
</style>
<body style="background-color: #432f5e;">  

<form name="RubricForm" action="" style="background-color: #432f5efloat:center" method="POST">
    <fieldset>
        <legend>Does your company take significant efforts to reduce it's carbon emissions  through energy-efficient practices, renewable energy sources, and emission reduction initiatives:</legend>
        <div class="divForm">
	<label class="radio-label">
        <input class="radio-input" type="radio" name="Q1" 
               value="Red"> Red
    </label>
    <label class="radio-label">
        <input class="radio-input" type="radio" name="Q1" 
               value="Yellow"> Yellow
    </label>
    <label class="radio-label">
        <input class="radio-input" type="radio" name="Q1" 
               value="Green"> Green 
    </label>
        </div>
    </fieldset>
	    <fieldset>
        <legend>Does your company derive a high percentage of it's companies energy consumption from renewablesources such as solar, wind, or hydropower:</legend>
        <div class="divForm">
	<label class="radio-label">
        <input class="radio-input" type="radio" name="Q2" 
               value="Red"> Red
    </label>
    <label class="radio-label">
        <input class="radio-input" type="radio" name="Q2" 
               value="Yellow"> Yellow
    </label>
    <label class="radio-label">
        <input class="radio-input" type="radio" name="Q2" 
               value="Green"> Green 
    </label>
        </div>
    </fieldset>
	    <fieldset>
        <legend>Does your company Fully commit to minimising waste generation and increasing recycling rates:</legend>
        <div class="divForm">
	<label class="radio-label">
        <input class="radio-input" type="radio" name="Q3" 
               value="Red"> Red
    </label>
    <label class="radio-label">
        <input class="radio-input" type="radio" name="Q3" 
               value="Yellow"> Yellow
    </label>
    <label class="radio-label">
        <input class="radio-input" type="radio" name="Q3" 
               value="Green"> Green 
    </label>
        </div>
    </fieldset>
	    <fieldset>
        <legend>Does your company Ensure the sustainability of the company's supply chian, considering the environmental impact of raw material sourcing and transportation:</legend>
        <div class="divForm">
	<label class="radio-label">
        <input class="radio-input" type="radio" name="Q4" 
               value="Red"> Red
    </label>
    <label class="radio-label">
        <input class="radio-input" type="radio" name="Q4" 
               value="Yellow"> Yellow
    </label>
    <label class="radio-label">
        <input class="radio-input" type="radio" name="Q4" 
               value="Green"> Green 
    </label>
        </div>
    </fieldset>	
	    <fieldset>
        <legend>Is your company energy efficient in it's buildings, facilities and Manufacturing Processes:</legend>
        <div class="divForm">
	<label class="radio-label">
        <input class="radio-input" type="radio" name="Q5" 
               value="Red"> Red
    </label>
    <label class="radio-label">
        <input class="radio-input" type="radio" name="Q5" 
               value="Yellow"> Yellow
    </label>
    <label class="radio-label">
        <input class="radio-input" type="radio" name="Q5" 
               value="Green"> Green 
    </label>
        </div>
    </fieldset>		
	    <fieldset>
        <legend>Does your company ensure the services or product that they provide have environmentally friendly attributes:</legend>
        <div class="divForm">
	<label class="radio-label">
        <input class="radio-input" type="radio" name="Q6" 
               value="Red"> Red
    </label>
    <label class="radio-label">
        <input class="radio-input" type="radio" name="Q6" 
               value="Yellow"> Yellow
    </label>
    <label class="radio-label">
        <input class="radio-input" type="radio" name="Q6" 
               value="Green"> Green 
    </label>
        </div>
    </fieldset>		
	    <fieldset>
        <legend>Does your company Engage with programs or initiatives for carbon offsetting to compensate for it's unavoidable emssions:</legend>
        <div class="divForm">
	<label class="radio-label">
        <input class="radio-input" type="radio" name="Q7" 
               value="Red"> Red
    </label>
    <label class="radio-label">
        <input class="radio-input" type="radio" name="Q7" 
               value="Yellow"> Yellow
    </label>
    <label class="radio-label">
        <input class="radio-input" type="radio" name="Q7" 
               value="Green"> Green 
    </label>
        </div>
    </fieldset>	
	    <fieldset>
        <legend>Does your company Adhere to enviromental standards and regulations, ensuring a compliance with the law:</legend>
        <div class="divForm">
	<label class="radio-label">
        <input class="radio-input" type="radio" name="Q8" 
               value="Red"> Red
    </label>
    <label class="radio-label">
        <input class="radio-input" type="radio" name="Q8" 
               value="Yellow"> Yellow
    </label>
    <label class="radio-label">
        <input class="radio-input" type="radio" name="Q8" 
               value="Green"> Green 
    </label>
        </div>
    </fieldset>	
		    <fieldset>
        <legend>Does your company consider the entire lifecycle of it's service or product, from  raw material extraction to disposal:</legend>
        <div class="divForm">
	<label class="radio-label">
        <input class="radio-input" type="radio" name="Q9" 
               value="Red"> Red
    </label>
    <label class="radio-label">
        <input class="radio-input" type="radio" name="Q9" 
               value="Yellow"> Yellow
    </label>
    <label class="radio-label">
        <input class="radio-input" type="radio" name="Q9" 
               value="Green"> Green 
    </label>
        </div>
    </fieldset>	
		    <fieldset>
        <legend>Does your company make an effort to ensure employees and educated and engaging in sustainability practices in and out of the workplace:</legend>
        <div class="divForm">
	<label class="radio-label">
        <input class="radio-input" type="radio" name="Q0" 
               value="Red"> Red
    </label>
    <label class="radio-label">
        <input class="radio-input" type="radio" name="Q0" 
               value="Yellow"> Yellow
    </label>
    <label class="radio-label">
        <input class="radio-input" type="radio" name="Q0" 
               value="Green"> Green 
    </label>
        </div>
    </fieldset>
	
	
	<div style="float:center">
	<button class="btn btn-block" name="Rubric_Submit" style="background-color: #2e2b33;color: #543e89;width: 80%;margin-left:10%;" id="identifier" type="submit">Register  </button>
	</div>
	
	
	
</form>
</body>
</html>

<?php
$error_message = "";
if(isset($_POST['Rubric_Submit'])){
	$company_ID = $_SESSION['company_ID'];
	if (isset($_POST['Q1'])){
	$Q1 = $_POST['Q1'];
	} else {
	$Q1 = '';
	} 
	if (isset($_POST['Q2'])){
	$Q2 = trim($_POST['Q2']);
	} else {
	$Q2 = '';
	} 
	if (isset($_POST['Q3'])){
	$Q3 = $_POST['Q3'];
	} else {
	$Q3 = '';
	} 
	if (isset($_POST['Q4'])){
	$Q4 = trim($_POST['Q4']);
	} else {
	$Q4 = '';
	} 
	if (isset($_POST['Q5'])){
	$Q5 = $_POST['Q5'];
	} else {
	$Q5 = '';
	} 
	if (isset($_POST['Q6'])){
	$Q6 = trim($_POST['Q6']);
	} else {
	$Q6 = '';
	} 
	if (isset($_POST['Q7'])){
	$Q7 = $_POST['Q7'];
	} else {
	$Q7 = '';
	} 
	if (isset($_POST['Q8'])){
	$Q8 = trim($_POST['Q8']);
	} else {
	$Q8 = '';
	} 
	if (isset($_POST['Q9'])){
	$Q9 = $_POST['Q9'];
	} else {
	$Q9 = '';
	} 
	if (isset($_POST['Q0'])){
	$Q0 = trim($_POST['Q0']);
	} else {
	$Q0 = '';
	} 
	$Qarray = array($Q1,$Q2,$Q3,$Q4,$Q5,$Q6,$Q7,$Q8,$Q9,$Q0);
	$QTotal = 0;
	foreach ($Qarray as $x){
	if (empty($x)) {
		$error_message = "Please Submit all answers";
	}
	}
	if (empty($error_message)){
	foreach ($Qarray as $x){
		if ($x == "Red") {
	}
	elseif ($x == "Yellow") {
		$QTotal = $QTotal + 5;
	}
	else{
		$QTotal = $QTotal + 10;
	}
	}
	echo $QTotal;
	if ($QTotal >= 90) {
		$certificate_Level = "Gold";
	}
	elseif ($QTotal  >= 50) {
		$certificate_Level = "Silver";
	}
	else{
		$certificate_Level = "Bronze";
	}
	
	$date = date("Y/m/d");
	
	$stmt = $link->prepare("INSERT INTO account_rubrics (Company_ID,Rubric_date,points,certificate_Level) VALUES (?, ?, ?,?)");
	if (!$stmt) {
    die("Prepare failed: (" . $link->errno . ") " . $link->error);
}
	$stmt->bind_param("isis", $company_ID, $date, $QTotal, $certificate_Level);

	if ($stmt->execute()) {
    $Rubric_ID = $link->insert_id;
		if ($QTotal == 100){
			function getRandomString($n) {
				return bin2hex(random_bytes($n / 2));
			}
			$certificateAchieved = true;
			$certificate_Ref = getRandomString(50);
			$voucherPoints = 0;
			$amountPaid = 0.00;
			$stmt = $link->prepare("INSERT INTO certificate_progress (Rubric_ID,certificate_Ref,Voucher_Points,amount_Paid,Certificate_Achieved) VALUES (?, ?, ?,?,?)");
			$stmt->bind_param("isiii",$Rubric_ID,$certificate_Ref,$voucherPoints,$amountPaid, $certificateAchieved);
			if (!$stmt) {
				die("Prepare failed: (" . $link->errno . ") " . $link->error);
			}
			if ($stmt->execute()) {
				header("Location: certificate.php");
				ob_end_flush();
				exit();
			}else {
				echo "Error: " . $stmt->error;
			}
		}
		else {
			function getRandomString($n) {
				return bin2hex(random_bytes($n / 2));
			}
			$certificateAchieved = false;
			$certificate_Ref = getRandomString(50);
			$voucherPoints = 0;
			$amountPaid = 0.00;
			$stmt = $link->prepare("INSERT INTO certificate_progress (Rubric_ID,certificate_Ref,Voucher_Points,amount_Paid,Certificate_Achieved) VALUES (?, ?, ?,?,?)");
			$stmt->bind_param("isiii",$Rubric_ID,$certificate_Ref,$voucherPoints,$amountPaid, $certificateAchieved);
			if (!$stmt) {
				die("Prepare failed: (" . $link->errno . ") " . $link->error);
			}
			if ($stmt->execute()) {
				$points_needed = 100 - $QTotal;
				header("Location: cart.php?points_needed=$points_needed");
				ob_end_flush();
				exit();			
			}else {
				echo "Error: " . $stmt->error;
			}
		}
	

	} else {
		echo "Error3: " . $stmt->error;
	}
	
	}
}
?>
<html>
<body>
<?php if (!empty($error_message)): ?>
    <div style="margin-bottom: 0px; text-align: center;font-size:3vw;">
        <?php echo htmlspecialchars($error_message); ?>
    </div>
<?php endif; ?>
</body>
</html>

<?php
	include 'includes/FooterLoggedIn.php';

?>

