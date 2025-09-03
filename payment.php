<?php include_once "header_Footer/header.php"?>
<?php include_once "conn.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["ok"])) {
  // Fetching values from the form
  $p_id = rand(100, 1000);

  $C_name = $_POST['C_name'];
  $payment_method = $_POST['payment_method'];
  $price = $_POST['price'];
  
  
 
  $query= "INSERT INTO payments(p_id, C_name, payment_method, price)
          VALUES (?,?,?,?)";

  $stmt=mysqli_prepare($conn,$query);
  mysqli_stmt_bind_param($stmt, "ssss",$p_id,$C_name,$payment_method,$price);
  $result = mysqli_stmt_execute($stmt);

  if ($result) {
    // Data inserted successfully
    echo "<script>alert('Data inserted successfully!'); window.location.href = 'admin.php';</script>";

} else {
    // Handle the error
    echo "<script>alert('Error: Data could not be inserted.');</script>";
    // Log detailed error for debugging:
    error_log("MySQL Error: " . mysqli_error($conn));
}



  // Close the statement
  mysqli_stmt_close($stmt);

  // Close the database connection
  mysqli_close($conn);
}
          





?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel = "stylesheet"  href = "css/login_and_register_page.css">

</head>
<body>
<div class="login_form">
    
<form method="POST">
    <h2>Payment Details</h2>

  <label for="C_name">Customer Name:</label>
  <input type="text" id="C_name" name="C_name" required>

  <label for="payment_method">Payment Method:</label>
  <input type="text" id="payment_method" name="payment_method" required>

  <label for="price">Price:</label>
  <input type="text" id="price" name="price" required>

  

  <button type="submit" name="ok">ok</button>
  <button class="signup_button" onclick="window.location.href = '#'" >Cancel</button>
</form>
</div>

</body>
</html>