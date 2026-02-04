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

$result = $conn->query("SELECT * FROM evaluation ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
<title>All Evaluations</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
<h2>All Evaluations</h2>

<div class="card">
<table class="table">
<tr>
    <th>Evaluator</th>
    <th>Team</th>
    <th>Review 2</th>
    <th>Review 3</th>
    <th>Remarks</th>
</tr>

<?php while($row = $result->fetch_assoc()) { ?>
<tr>
    <td><?= $row['evaluator'] ?></td>
    <td><?= $row['team_id'] ?></td>
    <td><?= $row['review2_total'] ?></td>
    <td><?= $row['review3_total'] ?></td>
    <td><?= $row['remarks'] ?></td>
</tr>
<?php } ?>

</table>
</div>
</div>

</body>
</html>