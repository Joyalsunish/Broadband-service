<!DOCTYPE html>
<html>
<head>
    <title>Broadband Service Portal</title>
</head>
<body>
    <h1>Welcome to the Broadband Service Portal</h1>
    
    <h2>Current Plan:</h2>
    <!-- PHP code will populate the current plan here -->

    <h2>Change Plan:</h2>
    <form action="update_plan.php" method="post">
        <label for="new_plan">Select a new plan:</label>
        <select name="new_plan" id="new_plan">
            <option value="plan1">Plan 1</option>
            <option value="plan2">Plan 2</option>
            <option value="plan3">Plan 3</option>
        </select>
        <input type="submit" value="Change Plan">
    </form>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $newPlan = $_POST["new_plan"];
    


    // Redirect the user back to the homepage after updating
    header("Location: index.html ");
    exit();
}
?>
