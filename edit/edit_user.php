<?php
include_once("..\conn.php");

if (isset($_POST['edit_button'])) {
    $edit_user_id = isset($_POST['edit_user_id']) ? $_POST['edit_user_id'] : null;

    if ($edit_user_id !== null) {
        $query = "SELECT * FROM user WHERE user_id = '$edit_user_id'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
    }
}

if (isset($_POST['update_button'])) {
    $edit_user_id = $_POST['edit_user_id'];
    $user_name = $_POST['username'];
    $user_email = $_POST['email'];
    $user_phone = $_POST['phone_number'];
    $user_password = $_POST['password'];
   
    // Update customer details
    $query = "UPDATE user SET 
              username = '$user_name', 
              email = '$user_email',
              phone_number = '$user_phone',  
              password = '$user_password' 
             
              WHERE user_id = '$edit_user_id'";

    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Data updated successfully!'); window.location.href = '../admin_dashboard.php';</script>";
        
        exit();
    } else {
        echo "Error updating customer details: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User Details</title>
    <link rel="stylesheet" href="style.css">
    <style>
        form {
            width: 50%;
            margin: 20px auto;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
        }

        button {
            padding: 10px;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

    <form action="" method="POST">
        <h1>Edit user details</h1>
        <br>
    <input type="hidden" name="edit_user_id" value="<?php echo $edit_user_id; ?>">

        
        <label for="username">Name:</label>
        <input type="text" name="username" value="<?php echo $row['username']; ?>" required>
        
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $row['email']; ?>" required>

        <label for="phone_number">Phone:</label>
        <input type="text" name="phone_number" value="<?php echo $row['phone_number']; ?>" required>

        <label for="password">password:</label>
        <input type="password" name="password" value="<?php echo $row['password']; ?>" required>

        
<br><br>
        <button type="submit" name="update_button" class="btn btn-primary">Update</button>
    </form>

</body>
</html>
