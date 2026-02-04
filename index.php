<!DOCTYPE html>
<html>
<head>
<title>Hackathon Evaluation</title>
<link rel="stylesheet" href="style.css">

<script>
function calcReview2(){
  let total =
    parseFloat(collab.value || 0) +
    parseFloat(design.value || 0) +
    parseFloat(code_quality.value || 0) +
    parseFloat(ui.value || 0) +
    parseFloat(functionality.value || 0) +
    parseFloat(progress.value || 0);
  r2.value = total.toFixed(2);
}

function calcReview3(){
  let total =
    parseFloat(teamwork.value || 0) +
    parseFloat(presentation.value || 0) +
    parseFloat(innovation.value || 0) +
    parseFloat(final_func.value || 0) +
    parseFloat(realtime.value || 0) +
    parseFloat(uniqueness.value || 0) +
    parseFloat(deployment.value || 0);
  r3.value = total.toFixed(2);
}
</script>
</head>

<body>
<div class="container">

<h2>Hackathon Evaluator Panel</h2>

<form action="save.php" method="POST">

<!-- Basic Info -->
<div class="card">
<label>Evaluator</label>
<input type="text" name="evaluator" required>

<label>Team ID</label>
<input type="text" name="team_id">

<label>Previous Remarks</label>
<textarea name="prev_remarks"></textarea>
</div>

<!-- Review 2 -->
<div class="card">
<h3>Review 2 (30 Marks)</h3>

<label>Collaboration</label>
<input id="collab" name="collab" type="number" step="0.1" oninput="calcReview2()">

<label>Design</label>
<input id="design" name="design" type="number" step="0.1" oninput="calcReview2()">

<label>Code Quality</label>
<input id="code_quality" name="code_quality" type="number" step="0.1" oninput="calcReview2()">

<label>User Interface</label>
<input id="ui" name="ui" type="number" step="0.1" oninput="calcReview2()">

<label>Functionality</label>
<input id="functionality" name="functionality" type="number" step="0.1" oninput="calcReview2()">

<label>Progress</label>
<input id="progress" name="progress" type="number" step="0.1" oninput="calcReview2()">

<div class="total-box">
Total: <input id="r2" name="review2_total" readonly>
</div>
</div>

<!-- Review 3 -->
<div class="card">
<h3>Review 3 (60 Marks)</h3>

<label>Team Work</label>
<input id="teamwork" name="teamwork" type="number" step="0.1" oninput="calcReview3()">

<label>Presentation</label>
<input id="presentation" name="presentation" type="number" step="0.1" oninput="calcReview3()">

<label>Innovation</label>
<input id="innovation" name="innovation" type="number" step="0.1" oninput="calcReview3()">

<label>Final Functionality</label>
<input id="final_func" name="final_func" type="number" step="0.1" oninput="calcReview3()">

<label>Real Time Use Case</label>
<input id="realtime" name="realtime" type="number" step="0.1" oninput="calcReview3()">

<label>Uniqueness</label>
<input id="uniqueness" name="uniqueness" type="number" step="0.1" oninput="calcReview3()">

<label>Deployment</label>
<input id="deployment" name="deployment" type="number" step="0.1" oninput="calcReview3()">

<div class="total-box">
Total: <input id="r3" name="review3_total" readonly>
</div>
</div>

<!-- Final Remarks -->
<div class="card">
<label>Final Remarks</label>
<textarea name="remarks"></textarea>
</div>

<button type="submit">Save Evaluation</button>

</form>
</div>
</body>
</html>