<!DOCTYPE html>
<html>
<head>
    <title>Connection Management</title>
    
    <style>
        .approve-button {
            background-color: #4CAF50; /* Green */
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }
        
        .delete-button {
            background-color: #f44336; /* Red */
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <?php
    // Sample PHP code to handle button actions
    if (isset($_POST['approve'])) {
        // Code to approve the connection
        // Replace this with your actual approval logic
        echo "Connection Approved!";
    } elseif (isset($_POST['delete'])) {
        // Code to delete the connection
        // Replace this with your actual deletion logic
        echo "Connection Deleted!";
    }
    ?>

    <!-- Display buttons for approving and deleting connections -->
    <form method="post">
        <input type="submit" class="approve-button" name="approve" value="Approve Connection">
        <input type="submit" class="delete-button" name="delete" value="Delete Connection">
    </form>
</body>
</html>
