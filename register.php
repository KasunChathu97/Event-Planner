
<?php
include_once "conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {
   
    $user_id = rand(100, 1000);
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $password = $_POST['password'];

    // Check if the username
    $check_query = "SELECT * FROM user WHERE username = ?";
    $check_stmt = mysqli_prepare($conn, $check_query);
    mysqli_stmt_bind_param($check_stmt, "s", $username);
    mysqli_stmt_execute($check_stmt);
    mysqli_stmt_store_result($check_stmt);

    if (mysqli_stmt_num_rows($check_stmt) > 0) {
        echo "<script>alert('Error: Username already exists. Please choose a different username.');</script>";
    } else {
        $insert_query = "INSERT INTO user(user_id, username, email, phone_number, password)
                        VALUES (?,?,?,?,?)";

        $insert_stmt = mysqli_prepare($conn, $insert_query);
        mysqli_stmt_bind_param($insert_stmt, "sssss", $user_id, $username, $email, $phone_number, $password);
        $result = mysqli_stmt_execute($insert_stmt);

        if ($result) {
            echo "<script>alert('Data inserted successfully!'); window.location.href = 'admin_dashboard.php';</script>";
        } else {
            echo "<script>alert('Error: Data could not be inserted.');</script>";
            error_log("MySQL Error: " . mysqli_error($conn));
        }

        mysqli_stmt_close($insert_stmt);
    }

    mysqli_stmt_close($check_stmt);
    mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Registration </title>
    <link rel="stylesheet" href="css/style.css">
    <script>
      function validatePassword() {
        var password = document.getElementById('password').value;
        var passwordError = document.getElementById('password-error');

        
        if (password.length < 8) {
          passwordError.textContent = 'Password must have at least 8 characters.';
          return false;
        }

      
        if (!/[A-Z]/.test(password)) {
          passwordError.textContent = 'Password must contain at least one uppercase letter.';
          return false;
        }

       
        passwordError.textContent = '';

        return true;
      }


      function validatePhoneNumber() {
        var phoneNumber = document.getElementById('phone_number').value;
        var phoneNumberError = document.getElementById('phone-number-error');

       
        var phoneRegex = /^\d{10}$/; 
        if (!phoneRegex.test(phoneNumber)) {
          phoneNumberError.textContent = 'Invalid phone number. Please enter a 10-digit number.';
          return false;
        }

        
        phoneNumberError.textContent = '';

        return true;
      }

    </script>

    <style>
      .input-box {
      padding-bottom: 5px; 
      }


      .policy {
      padding-top: 5px;
      }
    </style>
  </head>
  <body>
    <div class="wrapper">
      <h2>User Registration</h2>
      <form method="POST" onsubmit="return validatePassword();">
        <div class="input-box">
          <input type="text" id="username" name="username" placeholder="Enter user name" required>
        </div>
        <div class="input-box">
          <input type="text" id="email" name="email" placeholder="Enter user email"  oninput="validateEmail()" required>
          <span id="error" style="color: red;"></span>
        </div>
        
        <div class="input-box">
          <input type="text" id="phone_number" name="phone_number" placeholder="Enter phone number" required oninput="validatePhoneNumber()" required>
          <span id="phone-number-error" style="color: red;"></span>
        </div>
        <div class="input-box">
          <input type="password" id="password" name="password" placeholder="Enter password" required oninput="validatePassword()">
          <span id="password-error" style="color: red;"></span>
        
        </div>
        <br><br>
        <div class="policy">
        </div>
        <div class="input-box button">
          <input type="submit" name="register" value="Register Now">
        </div>
        <div class="text">
        </div>
      </form>
    </div>

    <script>
        var emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

        function validateEmail() {
            var emailInput = document.getElementById('email');
            var errorSpan = document.getElementById('error');

            if (emailPattern.test(emailInput.value)) {
                errorSpan.textContent = '';
            } else {
                errorSpan.textContent = 'Invalid email address';
            }
        }

        document.getElementById('emailForm').addEventListener('submit', function (event) {
            var emailInput = document.getElementById('email');

            if (!emailPattern.test(emailInput.value)) {
                alert('Please enter a valid email address');
                event.preventDefault();
            }
        });
    </script>

  </body>
</html>









<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel = "stylesheet"  href = "css/login_and_register_page.css">

</head>
<body>
<div class="login_form">

<form method="POST">
    <h2>User Registration</h2>

  <label for="username">Username:</label>
  <input type="text" id="username" name="username" required>

  <label for="Email">Email:</label>
  <input type="text" id="email" name="email" required>

  <label for="Phone Number">Phone Number:</label>
  <input type="text" id="phone_number" name="phone_number" required>

  <label for="password">Password:</label>
  <input type="password" id="password" name="password" required>

 
  <button type="submit" name="register">Register</button>
  <button class="signup_button" onclick="window.location.href = 'login.php'" >Log In</button>
</form>
</div>

</body>
</html> -->
