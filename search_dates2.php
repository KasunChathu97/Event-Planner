<?php 
include_once 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $str=$_POST['search'];
    $query= "SELECT booking.title, booking.location, booking.guest_count, customer.C_name, customer.C_email, customer.C_phone, customer.C_address
    FROM booking
    INNER JOIN customer ON booking.c_id = customer.c_id
    WHERE booking.event_date = '$str'";
    $result=mysqli_query($conn,$query);


    if ($result && mysqli_num_rows($result) > 0) {
   
    } else {
         $message = 'No records found for the selected Date.';
    }
}
?>




<!doctype html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="table_css/fonts/icomoon/style.css">

    <link rel="stylesheet" href="table_css/css/owl.carousel.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    
    <!-- <link rel="stylesheet" href="table_css/css/bootstrap.min.css"> -->
    
    
    <link rel="stylesheet" href="table_css/css/style.css">

    <title>Bokings</title>
    <style>
        h1{
        
        }

        
    </style>
   <script>
        function showMessage(message) {
            alert(message); window.location.href = 'admin_dashboard.php';
        }
    </script>
  </head>
  <body>
  

  <div class="content">
    
    <div class="container">
     <center> <h1 style="color:white;">Dates</h1></center>
      

      <div class="table-responsive custom-table-responsive">
<div class="table">
        <table class="table table-hover">
          <thead>
          <tr>
                <th>Title</th>
                <th>Location</th>
                <th>Guest count</th>
                <th>Customer Name</th>
                <th>Customer Email</th>
                <th>Customer Phone</th>
                <th>Customer Address</th>
            </tr>
          </thead>
          <tbody>
            <tr scope="row">
              
            <?php 
        if (isset($result)) {
            while ($raw = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $raw['title']; ?></td>
                    <td><?php echo $raw['location']; ?></td>
                    <td><?php echo $raw['guest_count']; ?></td>
                    <td><?php echo $raw['C_name']; ?></td>
                    <td><?php echo $raw['C_email']; ?></td>
                    <td><?php echo $raw['C_phone']; ?></td>
                    <td><?php echo $raw['C_address']; ?></td>
                </tr>
            <?php 
            } 
        } 
        ?>
            
            
          </tbody>
        </table>
        </div>
      </div>


    </div>

  </div>
    
  <script>
        
        <?php
        if (!empty($message)) {
            echo "showMessage('$message');";
        }
        ?>
    </script>

    <script src="table_css/js/jquery-3.3.1.min.js"></script>
    <script src="table_css/js/popper.min.js"></script>
    <script src="table_css/js/bootstrap.min.js"></script>
    <script src="table_css/js/main.js"></script>
  </body>
</html>




















<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Date search</title>

    <script>
        function showMessage(message) {
            alert(message);
        }
    </script>
</head>
<body>
   

    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Location</th>
                <th>Guest count</th>
                <th>Customer Name</th>
                <th>Customer Email</th>
                <th>Customer Phone</th>
                <th>Customer Address</th>
            </tr>
        </thead>
        <?php 
        if (isset($result)) {
            while ($raw = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $raw['title']; ?></td>
                    <td><?php echo $raw['location']; ?></td>
                    <td><?php echo $raw['guest_count']; ?></td>
                    <td><?php echo $raw['C_name']; ?></td>
                    <td><?php echo $raw['C_email']; ?></td>
                    <td><?php echo $raw['C_phone']; ?></td>
                    <td><?php echo $raw['C_address']; ?></td>
                </tr>
            <?php 
            } 
        } 
        ?>
    </table>

    <script>
        
        <?php
        if (!empty($message)) {
            echo "showMessage('$message');";
        }
        ?>
    </script>
</body>
</html> -->
