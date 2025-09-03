<?php 
include_once 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $str=$_POST['title'];
    $query= "SELECT booking.title, booking.location, booking.guest_count, customer.C_name, customer.C_email
    FROM booking
    INNER JOIN customer ON booking.c_id = customer.c_id
    WHERE booking.title = '$str'";
    $result=mysqli_query($conn,$query);



if ($result && mysqli_num_rows($result) > 0) {
   
} else {
     $message = 'No records found for the selected title.';
     
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
     <center> <h1 style="color:white;">Attendance</h1></center>
      

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
                
            </tr>
          </thead>
          <tbody>
            <tr scope="row">
              
            <?php 
         if (isset($result) && mysqli_num_rows($result) > 0) {
            while ($raw = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $raw['title']; ?></td>
                    <td><?php echo $raw['location']; ?></td>
                    <td><?php echo $raw['guest_count']; ?></td>
                    <td><?php echo $raw['C_name']; ?></td>
                    <td><?php echo $raw['C_email']; ?></td>
                    
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
            echo "showMessage('$message')";
            
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
    <title>Document</title>

    <script>
        function showMessage(message) {
           alert(message); window.location.href = 'c_or_b.php';
        }
    </script>
</head>
<body>
    <!-- <form action="" method="post">
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
                            <button type="submit">Search</button>     
    </form> 


    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Location</th>
                <th>Guest count</th>
                <th>Customer Name</th>
                <th>Customer Email</th>
                
            </tr>
        </thead>
        <?php 
         if (isset($result) && mysqli_num_rows($result) > 0) {
            while ($raw = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $raw['title']; ?></td>
                    <td><?php echo $raw['location']; ?></td>
                    <td><?php echo $raw['guest_count']; ?></td>
                    <td><?php echo $raw['C_name']; ?></td>
                    <td><?php echo $raw['C_email']; ?></td>
                    
                </tr>
            <?php 
            } 
        } 
        ?>
    </table>

    <script>
        
        <?php
        if (!empty($message)) {
            echo "showMessage('$message')";
            
        }
        ?>
    </script>
</body>
</html> -->