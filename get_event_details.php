
<?php
include_once "conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["next"])) {
    $b_id = rand(100, 1000);
    $c_id = $_POST['c_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $event_date = $_POST['event_date'];
    $time = $_POST['time']; 
    $location = $_POST['location']; 
    $foods = $_POST['foods']; 
    $decorations = $_POST['decorations']; 
    $liqures= $_POST['liqures']; 
    $payments=$_POST['payments'];
    $guest_count=$_POST['guest_count'];

    // Check ustomer ID already exists in the customer table
    $check_query = "SELECT * FROM customer WHERE c_id = ?";
    $check_stmt = mysqli_prepare($conn, $check_query);
    mysqli_stmt_bind_param($check_stmt, "s", $c_id);
    mysqli_stmt_execute($check_stmt);
    mysqli_stmt_store_result($check_stmt);

    if (mysqli_stmt_num_rows($check_stmt) > 0) {
       
        $insert_query = "INSERT INTO booking(b_id, c_id, title, description, event_date, time, location, foods, decorations, liqures, payments, guest_count)
                        VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";

        $insert_stmt = mysqli_prepare($conn, $insert_query);
        mysqli_stmt_bind_param($insert_stmt, "ssssssssssss", $b_id, $c_id, $title, $description, $event_date, $time, $location, $foods, $decorations, $liqures, $payments, $guest_count);
        $result = mysqli_stmt_execute($insert_stmt);

        if ($result) {
            echo "<script>alert('Data inserted successfully!'); window.location.href = 'c_or_b.php';</script>";
        } else {
            echo "<script>alert('Error: Data could not be inserted.');</script>";
            error_log("MySQL Error: " . mysqli_error($conn));
        }

        mysqli_stmt_close($insert_stmt);
    } else {
      
        echo "<script>alert('Error: Enter a valid customer ID.');</script>";
    }

    mysqli_stmt_close($check_stmt);
    mysqli_close($conn);
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
  
    <link rel="stylesheet" href="event_details_css/style.css">
     
  
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Event Details </title> 
</head>
<body>
    <div class="container">
        <header>Event Details</header>

        <form method="POST">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Event Details</span>

                    <div class="fields">
                        <div class="input-field">
                          <label for="c_id">Enter Customer ID:</label>
                            <input type="text" id="c_id" name="c_id" required>
                        </div>

                        <div class="input-field">
                            <label for="title">Event Title:</label>
                            <select name="title" id="title" required>
                                <option value="">.......</option>
                                <option value="Conferences">Conferences</option>
                                <option value="Product launches">Product launches</option>
                                <option value="Sports events">Sports events</option>
                                <option value="Exhibitions">Exhibitions</option>
                                <option value="Charity events">Charity events</option>
                                <option value="Workshops">Workshops</option>
                                <option value="Festivals">Festivals</option>
                                <option value="Company parties">Company parties</option>
                                <option value="Seminars">Seminars</option>
                                <option value="Weddings">Weddings</option>
                                <option value="Birthdays">Birthdays</option>
                                
                            </select>
                        </div>

                        <div class="input-field">
                            <label for="description">Description:</label>
                            <input type="text" id="description" name="description" required>
                        </div>

                        <div class="input-field">
                             <label for="event_date">Date:</label>
                            <input type="date" id="event_date" name="event_date"  min="" required>

                        </div>

                        <div class="input-field">
                            <label for="time">Time:</label>
                            <input type="time" id="time" name="time" required>

                        </div>

                        <div class="input-field">
                            <label for="location">Event Location:</label>
                            <input type="text" id="location" name="location" required>
                        </div>

                      
                <div class="details ID">
                    <span class="title">Foods Decorations Liqures</span>

                    <div class="fields">
                      

                        <div class="input-field">
                            <label for="foods">Foods:</label>
                            <input type="text" id="foods" name="foods" >
                        </div>

                        <div class="input-field">
                            <label for="decorations">Decorations:</label>
                            <input type="text" id="decorations" name="decorations" >
                        </div>

                        <div class="input-field">
                            <label for="liqures">Liqures:</label>
                            <input type="text" id="liqures" name="liqures" >
                        </div>

                       
                    </div>

                    <div class="details ID">
                    <span class="title">Payments</span>

                    <div class="fields">
                        
                        <div class="input-field">
                            <label for="payments">Payments:</label>
                             <input type="text" id="payments" name="payments" required>
                        </div>

                        <div class="input-field">
                            <label for="liqures">Guest Count:</label>
                            <input type="text" id="guest_count" name="guest_count" required>
                        </div>
                      
                    
                    </div>
                    <button class="nextBtn" type="submit" name="next">
                        <span class="btnText" >Done</span>
                        <i class="uil uil-navigator"></i>
                    </button>


                    
                </div> 
            </div>

        
            </div>
        </form>
        
    </div>

    <script src="script.js"></script>

    <script>
        var date = new Date();
        var tdate = date.getDate();
        if(tdate < 10){
            tdate = "0" + tdate;
        }
        var month = date.getMonth() + 1;
        if(month < 10){
            month = "0" + month;
        }
        var year = date.getUTCFullYear();
        var mindate = year + "-" + month + "-" + tdate;
        document.getElementById("event_date").setAttribute('min',mindate);
        console.log(midvalue);

        
    </script>
</body>
</html>


























<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel = "stylesheet"  href = "css/login_and_register_page.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-pzjw8+b/xmF5f7mKzysKnuuTnGWqMYtsFi6x2xL5OVktxFiKWoQ1g3gDsr8GRJYb" crossorigin="anonymous">
</head>
<body>
<div class="login_form">
  <div class="container">
    <div class="col-md-6">
    
<form method="POST">
    <h2>Event Details</h2>

  <label for="c_id">Enter Customer ID:</label>
  <input type="text" id="c_id" name="c_id" required>

  <label for="title">Event Title:</label>
  <input type="text" id="title" name="title" required>

  <label for="description">Description:</label>
  <input type="text" id="description" name="description" required>

  <label for="event_date">Date:</label>
  <input type="date" id="event_date" name="event_date" required>

  <label for="time">Time:</label>
  <input type="time" id="time" name="time" required>

  <label for="location">Event Location:</label>
  <input type="text" id="location" name="location" required>

  <h2>Food,Decorations,liqures</h2>

  <label for="foods">Foods:</label>
  <input type="text" id="foods" name="foods" required>

  <label for="decorations">Decorations:</label>
  <input type="text" id="decorations" name="decorations" required>

  <label for="liqures">Liqures:</label>
  <input type="text" id="liqures" name="liqures" required>

  <h2>Payments</h2>

  <label for="payments">Payments:</label>
  <input type="text" id="payments" name="payments" required>
 
  <button type="submit" name="next">Next</button>
  <button class="signup_button" onclick="window.location.href = '#'" >Cancel</button>
</form>
</div>
</div>
</div>

</body>
</html>
 -->


