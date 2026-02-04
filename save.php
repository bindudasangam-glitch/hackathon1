<?php
// InfinityFree DB connection
$conn = new mysqli(
    "sqlXXX.infinityfree.com",
    "DB_USERNAME",
    "DB_PASSWORD",
    "DB_NAME"
);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Safe receive (no warnings)
$evaluator = $_POST['evaluator'] ?? '';
$team_id = $_POST['team_id'] ?? '';
$prev_remarks = $_POST['prev_remarks'] ?? '';

$collab = $_POST['collab'] ?? 0;
$design = $_POST['design'] ?? 0;
$code_quality = $_POST['code_quality'] ?? 0;
$ui = $_POST['ui'] ?? 0;
$functionality = $_POST['functionality'] ?? 0;
$progress = $_POST['progress'] ?? 0;
$review2_total = $_POST['review2_total'] ?? 0;

$teamwork = $_POST['teamwork'] ?? 0;
$presentation = $_POST['presentation'] ?? 0;
$innovation = $_POST['innovation'] ?? 0;
$final_func = $_POST['final_func'] ?? 0;
$realtime = $_POST['realtime'] ?? 0;
$uniqueness = $_POST['uniqueness'] ?? 0;
$deployment = $_POST['deployment'] ?? 0;
$review3_total = $_POST['review3_total'] ?? 0;

$remarks = $_POST['remarks'] ?? '';

$sql = "INSERT INTO evaluation 
(evaluator, team_id, prev_remarks,
collab, design, code_quality, ui, functionality, progress, review2_total,
teamwork, presentation, innovation, final_func, realtime, uniqueness, deployment, review3_total,
remarks)
VALUES
('$evaluator', '$team_id', '$prev_remarks',
$collab, $design, $code_quality, $ui, $functionality, $progress, $review2_total,
$teamwork, $presentation, $innovation, $final_func, $realtime, $uniqueness, $deployment, $review3_total,
'$remarks')";

if ($conn->query($sql)) {
    echo "<h2>Saved Successfully ✅</h2>";
    echo "<a href='index.php'>Go Back</a>";
} else {
    echo "Error: " . $conn->error;
}
?>