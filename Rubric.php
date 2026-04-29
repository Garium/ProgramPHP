<?php
ob_start();
include 'includes/nav.php';
require 'conn_db.php';

$error_message = "";

function getRandomString($n) {
    return bin2hex(random_bytes($n / 2));
}

if (isset($_POST['Rubric_Submit'])) {
    $company_ID = $_SESSION['company_ID'];

    // Collect all 10 answers in an array 
    $questions = ['Q1','Q2','Q3','Q4','Q5','Q6','Q7','Q8','Q9','Q0'];
    $answers   = [];
    foreach ($questions as $q) {
        $answers[$q] = isset($_POST[$q]) ? trim($_POST[$q]) : '';
    }

    // Validate: all answered
    if (in_array('', $answers, true)) {
        $error_message = "Please submit all answers.";
    } else {
        // Score
        $QTotal = 0;
        foreach ($answers as $val) {
            if ($val === 'Yellow')      $QTotal += 5;
            elseif ($val === 'Green')   $QTotal += 10;
            // Red = 0
        }

        // Certificate level
        if     ($QTotal >= 90) $certificate_Level = "Gold";
        elseif ($QTotal >= 50) $certificate_Level = "Silver";
        else                   $certificate_Level = "Bronze";

        $date = date("Y-m-d");   

        // Insert rubric
        try{
            $stmt = $link->prepare(
            "INSERT INTO account_rubrics (Company_ID, Rubric_date, points, certificate_Level)
             VALUES (:company_ID, :date, :QTotal, :certificate_Level)"
            );

            $result = $stmt->execute([
            ':company_ID' => $company_ID,
            ':date' => $date,
            ':QTotal' => $QTotal,
            ':certificate_Level' => $certificate_Level
            ]);

            $Rubric_ID = $link->lastInsertId();

            // Insert certificate_progress (unified — was duplicated in two branches)
            $certificateAchieved = ($QTotal == 100) ? 1 : 0;
            $certificate_Ref     = getRandomString(50);
            $voucherPoints       = 0;
            $amountPaid          = 0.00;

            $stmt = $link->prepare(
            "INSERT INTO certificate_progress
             (Rubric_ID, certificate_Ref, Voucher_Points, amount_Paid, Certificate_Achieved)
             VALUES (:Rubric_ID, :certificate_Ref, :Voucher_Points, :amount_Paid, :Certificate_Achieved)"
            );

            $stmt->execute([
            ':Rubric_ID' => $Rubric_ID,
            ':certificate_Ref' => $certificate_Ref,
            ':Voucher_Points' => $voucherPoints,
            ':amount_Paid' => $amountPaid,
            ':Certificate_Achieved' => $certificateAchieved
            ]);


            // Redirect — works because no HTML has been output yet
            if ($QTotal == 100) {
                header("Location: certificate.php");
            } else {
                $points_needed = 100 - $QTotal;
                header("Location: cart.php?points_needed=" . urlencode($points_needed));
            }
            exit();
        } catch(PDOException $e) {
            $error_message = "error: " . $e->getMessage();
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Sustainability Rubric</title>
    <style>
        body { background-color: #432f5e; color: #f3eaff; font-family: sans-serif; }
        .radio-label  { display: inline-block; vertical-align: top; margin-right: 3%; }
        .radio-input  { display: inline-block; vertical-align: top; }
        fieldset      { text-align: center; margin: 1rem auto; max-width: 800px;
                        border: 1px solid #b794f6; border-radius: 8px; padding: 1rem; }
        legend        { padding: 0 .5rem; }
        .divForm      { margin: auto; padding: .5rem; }
        .submit-btn   { background-color: #2e2b33; color: #b794f6;
                        width: 80%; margin: 1rem 10%; padding: .75rem; border: none;
                        border-radius: 6px; cursor: pointer; font-size: 1rem; }
        .submit-btn:hover { background-color: #1f1c24; }
        .error-msg    { margin: 1rem auto; text-align: center; font-size: 1.5rem;
                        color: #ffb4b4; }
    </style>
</head>
<body>

<?php if (!empty($error_message)): ?>
    <div class="error-msg"><?= htmlspecialchars($error_message) ?></div>
<?php endif; ?>

<?php
// All ten questions in one array — single source of truth, easy to edit
$rubricQuestions = [
    'Q1' => "Does your company take significant efforts to reduce its carbon emissions through energy-efficient practices, renewable energy sources, and emission reduction initiatives?",
    'Q2' => "Does your company derive a high percentage of its energy consumption from renewable sources such as solar, wind, or hydropower?",
    'Q3' => "Does your company fully commit to minimising waste generation and increasing recycling rates?",
    'Q4' => "Does your company ensure the sustainability of its supply chain, considering the environmental impact of raw material sourcing and transportation?",
    'Q5' => "Is your company energy efficient in its buildings, facilities and manufacturing processes?",
    'Q6' => "Does your company ensure the services or products that it provides have environmentally friendly attributes?",
    'Q7' => "Does your company engage with programs or initiatives for carbon offsetting to compensate for its unavoidable emissions?",
    'Q8' => "Does your company adhere to environmental standards and regulations, ensuring compliance with the law?",
    'Q9' => "Does your company consider the entire lifecycle of its services or products, from raw material extraction to disposal?",
    'Q0' => "Does your company make an effort to ensure employees are educated and engaging in sustainability practices in and out of the workplace?",
];
?>

<form name="RubricForm" action="" method="POST">
<?php foreach ($rubricQuestions as $name => $text): ?>
    <fieldset>
        <legend><?= htmlspecialchars($text) ?></legend>
        <div class="divForm">
            <?php foreach (['Red','Yellow','Green'] as $colour): ?>
                <label class="radio-label">
                    <input class="radio-input" type="radio"
                           name="<?= $name ?>" value="<?= $colour ?>"
                           <?= (($_POST[$name] ?? '') === $colour) ? 'checked' : '' ?>>
                    <?= $colour ?>
                </label>
            <?php endforeach; ?>
        </div>
    </fieldset>
<?php endforeach; ?>

    <button class="submit-btn" name="Rubric_Submit" type="submit">Submit Rubric</button>
</form>

</body>
</html>
<?php include 'includes/FooterLoggedIn.php'; ?>