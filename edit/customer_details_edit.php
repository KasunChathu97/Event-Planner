<?php
include_once("..\conn.php");

if (isset($_POST['edit_button'])) {
    $edit_customer_id = isset($_POST['edit_c_id']) ? $_POST['edit_c_id'] : null;

    if ($edit_customer_id !== null) {
        $query = "SELECT * FROM customer WHERE c_id = '$edit_customer_id'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
    }
}

if (isset($_POST['update_button'])) {
    $edit_customer_id = $_POST['edit_c_id'];
    $customer_name = $_POST['C_name'];
    $customer_phone = $_POST['C_phone'];
    $customer_email = $_POST['C_email'];
    $customer_address = $_POST['C_address'];
   
    // Update customer details
    $query = "UPDATE customer SET 
              C_name = '$customer_name', 
              C_email = '$customer_email',
              C_phone = '$customer_phone',  
              C_address = '$customer_address' 
             
              WHERE c_id = '$edit_customer_id'";

    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Data updated successfully!'); window.location.href = '../show_customers.php';</script>";
        
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
    <title>Edit Customer Details</title>
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
        <h1>Edit customer details</h1>
        <br>
    <input type="hidden" name="edit_c_id" value="<?php echo $edit_customer_id; ?>">

        
        <label for="client_name">Customer Name:</label>
        <input type="text" name="C_name" value="<?php echo $row['C_name']; ?>" required>
        
        <label for="client_email">Customer Email:</label>
        <input type="email" name="C_email" value="<?php echo $row['C_email']; ?>" required>

        <label for="client_phone">Customer Phone:</label>
        <input type="text" name="C_phone" value="<?php echo $row['C_phone']; ?>" required>

        <label for="client_address">Customer Address:</label>
        <input type="text" name="C_address" value="<?php echo $row['C_address']; ?>" required>

        
<br><br>
        <button type="submit" name="update_button" class="btn btn-primary">Update</button>
    </form>

</body>
</html>
