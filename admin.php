<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

/* =========================
   Railway MySQL Connection
   ========================= */
$conn = new mysqli(
    "containers-us-west-XXX.railway.app",  // MYSQL_HOST
    "MYSQL_USERNAME",                      // MYSQL_USER
    "MYSQL_PASSWORD",                      // MYSQL_PASSWORD
    "MYSQL_DATABASE",                      // MYSQL_DATABASE
    3306                                  // MYSQL_PORT
);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

/* =========================
   Fetch evaluations
   ========================= */
$sql = "SELECT evaluator, team_id, review2_total, review3_total, remarks 
        FROM evaluation 
        ORDER BY id DESC";

$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Evaluation Results</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>All Hackathon Evaluations</h2>

    <div class="card">
        <table style="width:100%; border-collapse:collapse;">
            <tr style="background:#e6f4ec;">
                <th>Evaluator</th>
                <th>Team ID</th>
                <th>Review-2</th>
                <th>Review-3</th>
                <th>Remarks</th>
            </tr>

            <?php if ($result && $result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['evaluator']) ?></td>
                        <td><?= htmlspecialchars($row['team_id']) ?></td>
                        <td><?= $row['review2_total'] ?></td>
                        <td><?= $row['review3_total'] ?></td>
                        <td><?= htmlspecialchars($row['remarks']) ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" style="text-align:center;">No evaluations found</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>
</div>

</body>
</html>

<?php $conn->close(); ?>
