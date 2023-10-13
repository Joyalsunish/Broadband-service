<?php
include_once'connection.php';
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST") 
{
    echo"gfghfgfgh";
    $F_date=date("d/m/y");
    $user_id=$_SESSION['userid'];
    $feedback=$_POST['comments'];
    $rating=$_POST['rating'];
echo $F_date;
echo $user_id;
echo $feedback;
echo $rating;

    $sql="insert into feedback(user_id,F_date,feedback,rating) values('$user_id','$F_date','$feedback','$rating')";
    $result=mysqli_query($data,$sql);
    
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <link rel="stylesheet" href="feedback.css">
</head>
<body>
    <div class="container">
        <h2>Feedback Form</h2>
        <form action="feedback.php" method="POST">

            <label for="rating">Rating:</label>
            <select id="rating" name="rating" required>
                <option value="" disabled selected>Select a rating</option>
                <option value="Excellent">Excellent</option>
                <option value="Good">Good</option>
                <option value="Average">Average</option>
                <option value="Below Average">Below Average</option>
                <option value="Poor">Poor</option>
            </select>

            <label for="comments">Comments:</label>
            <textarea id="comments" name="comments" rows="4" required></textarea>

            <button type="submit">Submit Feedback</button>
        </form>
    </div>
</body>
</html>
