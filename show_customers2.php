<?php
include_once "conn.php"; 


if(isset($_POST['show_button']) && !empty($_POST['show_button'])) {
  
    $show_button = mysqli_real_escape_string($conn, $_POST['show_button']);

    $query = "SELECT * FROM customer WHERE c_id = '$show_button'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Error in query: " . mysqli_error($conn));
    }
}
else {
    echo "No customer ID provided.";
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

    
    
    
    
    <link rel="stylesheet" href="table_css/css/style.css">

    <title>Customer Details</title>
    <style>
        h1{
        
        }
    </style>
  </head>
  <body>
  

  <div class="content">
    
    <div class="container">
     <center> <h1 style="color:white;">Customer Details</h1></center>
      

      <div class="table-responsive custom-table-responsive">
<div class="table">
<?php if(isset($result)) { ?>
        <table class="table table-hover">
          <thead>
            
          <tr>
                    <th>Customer ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                </tr>
          </thead>
          <tbody>
            <tr scope="row">
              
            <?php while ($raw = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $raw['c_id']; ?></td>
                    <td><?php echo $raw['C_name']; ?></td>
                    <td><?php echo $raw['C_email']; ?></td>
                    <td><?php echo $raw['C_phone']; ?></td>
                    <td><?php echo $raw['C_address']; ?></td>
                </tr>
            <?php } ?>
            
            
          </tbody>
        </table>
        <?php } ?>
        </div>
      </div>


    </div>

  </div>
    
    

    <script src="table_css/js/jquery-3.3.1.min.js"></script>
    <script src="table_css/js/popper.min.js"></script>
    <script src="table_css/js/bootstrap.min.js"></script>
    <script src="table_css/js/main.js"></script>
  </body>
</html>

























<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Details</title>
    <style>
        table {
            width: 75%;
            border-collapse: collapse;
            margin-top: 20px;
            padding: 25px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <?php if(isset($result)) { ?>
        <table>
            <thead>
                <tr>
                    <th>c_id</th>
                    <th>C_name</th>
                    <th>C_email</th>
                    <th>C_phone</th>
                    <th>C_address</th>
                </tr>
            </thead>
            <?php while ($raw = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $raw['c_id']; ?></td>
                    <td><?php echo $raw['C_name']; ?></td>
                    <td><?php echo $raw['C_email']; ?></td>
                    <td><?php echo $raw['C_phone']; ?></td>
                    <td><?php echo $raw['C_address']; ?></td>
                </tr>
            <?php } ?>
        </table>
    <?php } ?>

</body>
</html> -->
