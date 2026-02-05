<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

/* =========================
   Railway MySQL Connection
   ========================= */
$conn = new mysqli(
    "containers-us-west-XXX.railway.app",   // MYSQL_HOST
    "MYSQL_USERNAME",                       // MYSQL_USER
    "MYSQL_PASSWORD",                       // MYSQL_PASSWORD
    "MYSQL_DATABASE",                       // MYSQL_DATABASE
    3306                                   // MYSQL_PORT
);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

/* =========================
   Get form data safely
   ========================= */
$evaluator     = $_POST['evaluator'] ?? '';
$team_id       = $_POST['team_id'] ?? '';
$prev_remarks  = $_POST['prev_remarks'] ?? '';

$collab        = $_POST['collab'] ?? 0;
$design        = $_POST['design'] ?? 0;
$code_quality  = $_POST['code_quality'] ?? 0;
$ui            = $_POST['ui'] ?? 0;
$functionality = $_POST['functionality'] ?? 0;
$progress      = $_POST['progress'] ?? 0;

$review2_total = $collab + $design + $code_quality + $ui + $functionality + $progress;

$teamwork      = $_POST['teamwork'] ?? 0;
$presentation  = $_POST['presentation'] ?? 0;
$innovation    = $_POST['innovation'] ?? 0;
$final_func    = $_POST['final_func'] ?? 0;
$realtime      = $_POST['realtime'] ?? 0;
$uniqueness    = $_POST['uniqueness'] ?? 0;
$deployment    = $_POST['deployment'] ?? 0;

$review3_total = $teamwork + $presentation + $innovation + $final_func + $realtime + $uniqueness + $deployment;

$remarks       = $_POST['remarks'] ?? '';

/* =========================
   Prepared Statement (SAFE)
   ========================= */
$stmt = $conn->prepare("
INSERT INTO evaluation (
    evaluator, team_id, prev_remarks,
    collab, design, code_quality, ui, functionality, progress, review2_total,
    teamwork, presentation, innovation, final_func, realtime, uniqueness, deployment, review3_total,
    remarks
) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)
");

$stmt->bind_param(
    "sssiiiiiiiiiiiiiiis",
    $evaluator,
    $team_id,
    $prev_remarks,
    $collab,
    $design,
    $code_quality,
    $ui,
    $functionality,
    $progress,
    $review2_total,
    $teamwork,
    $presentation,
    $innovation,
    $final_func,
    $realtime,
    $uniqueness,
    $deployment,
    $review3_total,
    $remarks
);

if ($stmt->execute()) {
    echo "<h2>Evaluation Saved Successfully ✅</h2>";
    echo "<a href='index.php'>Go Back</a>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
