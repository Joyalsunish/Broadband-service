<?php
include('connection.php');

$customer_id = $_SESSION['userid'];
//echo  "haaaa";
//echo $customer_id;
//$sql="select * from user_reg where user_id='".$customer_id."'";
//$result=mysqli_query($data,$sql);
//$row=mysqli_fetch_array($result);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "ïnside post";
    // Handle form submission and update the database with new values
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phonenumber = $_POST['number'];
    $place = $_POST['place'];
    $aadharno = $_POST['aadharno'];
    $housename = $_POST['housename'];
    $pincode = $_POST['pincode'];

    $update_sql = "UPDATE user_reg SET name='$name', email='$email', ph_no='$phonenumber', place='$place', aadhar_no='$aadharno', house_name='$housename', pincode=$pincode WHERE user_id=$customer_id";
    if ($data->query($update_sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $data->error;
    }
}
else{
    echo "outside";
}

$sql = "SELECT *  FROM user_reg  WHERE user_id = '".$customer_id."'";
$result = $data->query($sql);

if ($result->num_rows > 0) {
    echo "Successfully	";
    $row = $result->fetch_assoc();
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Edit Profile</title>
</head>
<body>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
}

.container {
    background-color: #fff;
    width: 800px;
    margin: 10px auto;
    padding: 20px;
    border-radius: 20px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
}

label {
    font-weight: bold;
}

input[type="text"],
input[type="email"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 10px;
}

input[type="submit"] {
    background-color: #007BFF;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 10px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}

    </style>
    <div class="container">
        <h1>Edit Profile</h1>
        <form action="editprofile.php" method="POST">
            <label for="name">Username:</label>
            <input type="text" id=name" name="name" value="<?php echo $row["name"]; ?>">
            <br> 
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $row["email"]; ?>">
            <br>
            <label for="number">Phone number:</label>
            <input type="number" id="number" name="number" value="<?php echo $row["ph_no"]; ?>">
            <br>
            <label for="place">Place:</label>
            <input type="place" id="place" name="place" value="<?php echo $row["place"]; ?>">
            <br>
            <label for="aadharno">Aadhar number:</label>
            <input type="aadharno" id="aadharno" name="aadharno" value="<?php echo $row["aadhar_no"]; ?>">
            <br>
            <label for="housename">House name:</label>
            <input type="housename" id="housename" name="housename" value="<?php echo $row["house_name"]; ?>">
            <br>
            <label for="pincode">Pincode:</label>
            <input type="pincode" id="pincode" name="pincode" value="<?php echo $row["pincode"]; ?>">
            <br>
             <label class="form-label">Current password</label>
             <input type="password" id="password" name="current_password" value="<?php echo $row["password"]; ?>">
             <br>
           
            <input type="submit" value="Update Profile">
        </form>
    </div>
</body>
</html>
