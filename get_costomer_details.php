
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

   
    <link rel="stylesheet" href="customer_register_css/fonts/material-icon/css/material-design-iconic-font.min.css">

    
    <link rel="stylesheet" href="customer_register_css/css/style.css">
</head>
<body>

    <div class="main">

       
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Customer Register Area</h2>
                        <form method="POST" action="send.php" class="register-form" id="register-form">
                            <div class="form-group">
                            
                            <!-- <label for="C_name">Customer Name:</label> -->
                            <input type="text" id="C_name" name="C_name" placeholder="Customer Name" required>
                            </div>
                            <div class="form-group">
                            
                                <!-- <label for="C_email">Customer email:</label> -->
                                    <input type="text" id="C_email" name="C_email" placeholder="Customer Email" oninput="validateEmail()" required>
                                    <span id="error" style="color: red;"></span>
                            </div>
                            <div class="form-group">

                                    <!-- <label for="C_phone">Customer Phone number:</label> -->
                                 <input type="text" id="C_phone" name="C_phone"  placeholder="Customer phone" required oninput="validatePhoneNumber()" required>
                                 <span id="phone-number-error" style="color: red;"></span>
                            </div>
                            <div class="form-group">
                                        <!-- <label for="C_address">Customer Address:</label> -->
                                        <input type="address" id="C_address"  placeholder="Customer Address" name="C_address" >
                            </div>
                            <div class="form-group">
                            <input type="hidden" name="customer_id" value="<?= $c_id ?>">
                            </div>
                            <div class="form-group form-button">
                                    <input type="submit" name="next" id="signup" class="form-submit" value="Register"/>
                                    <!-- <button type="submit" name="next" class="form-submit">Next</button> -->
                                    <!-- <button class="signup_button" onclick="window.location.href = '#'" >Cancel</button> -->
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="customer_register_css/images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="get_event_details.php" class="signup-image-link">Already customer</a>
                    </div>
                </div>
            </div>
        </section>

        
       
    </div>

    <!-- JS -->
    <script src="customer_register_css/vendor/jquery/jquery.min.js"></script>
    <script src="customer_register_css/js/main.js"></script>

    <script>
        var emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

        function validateEmail() {
            var emailInput = document.getElementById('C_email');
            var errorSpan = document.getElementById('error');

            if (emailPattern.test(emailInput.value)) {
                errorSpan.textContent = '';
            } else {
                errorSpan.textContent = 'Invalid email address';
            }
        }

        document.getElementById('emailForm').addEventListener('submit', function (event) {
            var emailInput = document.getElementById('C_email');

            if (!emailPattern.test(emailInput.value)) {
                alert('Please enter a valid email address');
                event.preventDefault();
            }
        });



        function validatePhoneNumber() {
        var phoneNumber = document.getElementById('C_phone').value;
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
    
<form method="POST" action="send.php">
    <h2>Customer Details</h2>

  <label for="C_name">Customer Name:</label>
  <input type="text" id="C_name" name="C_name" required>

  <!-- <label for="C_email">Customer email:</label>
  <input type="text" id="C_email" name="C_email" required> 

        <label for="C_email">Customer email:</label>
        <input type="text" id="C_email" name="C_email" oninput="validateEmail()" required>
        <span id="error" style="color: red;"></span>

  <label for="C_phone">Customer Phone number:</label>
  <input type="text" id="C_phone" name="C_phone" required>

  
  <label for="C_address">Customer Address:</label>
  <input type="address" id="C_address" name="C_address" >

<!-- Add a hidden input field to store $c_id -
<input type="hidden" name="customer_id" value="<?= $c_id ?>">


  <button type="submit" name="next">Next</button>
  <button class="signup_button" onclick="window.location.href = '#'" >Cancel</button>
</form>
</div>

<script>
        var emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

        function validateEmail() {
            var emailInput = document.getElementById('C_email');
            var errorSpan = document.getElementById('error');

            if (emailPattern.test(emailInput.value)) {
                errorSpan.textContent = '';
            } else {
                errorSpan.textContent = 'Invalid email address';
            }
        }

        document.getElementById('emailForm').addEventListener('submit', function (event) {
            var emailInput = document.getElementById('C_email');

            if (!emailPattern.test(emailInput.value)) {
                alert('Please enter a valid email address');
                event.preventDefault();
            }
        });
    </script>
</body>
</html> -->
