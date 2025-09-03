<?php include_once "conn.php"; 

$query="SELECT * FROM customer ";
$result=mysqli_query($conn,$query);


// Check if the delete button is clicked
if (isset($_POST['delete_button'])) {
    $delete_customer_id = isset($_POST['delete_c_id']) ? $_POST['delete_c_id'] : null;

    if ($delete_customer_id !== null) {
        // Perform the delete operation
        $query = "DELETE FROM customer WHERE c_id = '$delete_customer_id'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "<script>alert('Customer deleted successfully!'); window.location.href = 'show_customers.php';</script>";
            exit();
        } else {
            echo "Error deleting customer: " . mysqli_error($conn);
        }
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
        .a{
           position: inherit;
        }
    </style>
  </head>
  <body>

    
  <div class="a">
    <a  href="c_or_b.php">Home</a>
  </div>
  <div class="content">
    
    <div class="container">
     <center> <h1 style="color:white;">Customers</h1></center>
      

      <div class="table-responsive custom-table-responsive">
<div class="table">
        <table class="table table-hover">
          <thead>
            
                <th>Customer ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Show bookings</th>
                <th>Edit customer</th>

                
                
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
                    <td>
                    <form action="show_customer_booked.php" method="POST">
                        <input type="hidden" name="customer_id" value="<?php echo $raw['c_id'];?>">
                        <button type="submit" name="show_bookings" class="btn btn-success">Show</button>
                    </form>
                </td>
                <td>
                  <!-- Corrected version -->
                    <form action="edit\customer_details_edit.php" method="POST">
                        <input type="hidden" name="edit_c_id" value="<?php echo $raw['c_id'];?>">
                        <button type="submit" name="edit_button" class="btn btn-warning">Edit</button>
                    </form>

                </td>
                <!--<td>
                    <form action="#" method="POST">
                        <input type="hidden" name="delete_c_id" value="<?php echo $raw['c_id'];?>">
                        <button type="submit" name="delete_button" onclick="checker();" class="btn btn-danger">Delete</button>
                    </form>
                </td>-->
                
                   

                </tr>
            <?php 
            } 
            ?>
            
          </tbody>
        </table>
        </div>
      </div>


    </div>

  </div>
    
    

    <script src="table_css/js/jquery-3.3.1.min.js"></script>
    <script src="table_css/js/popper.min.js"></script>
    <script src="table_css/js/bootstrap.min.js"></script>
    <script src="table_css/js/main.js"></script>

    <script>
        function checker(){
            var result = confirm('Are you sure do you want to delete this customer ?');
            if(result==false){
                event.preventDefault();
            }
        }
    </script>
  </body>
</html>































<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple HTML Table</title>
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

    <table>
        <thead>
            <tr>
                <th>c_id</th>
                <th>C_name</th>
                <th>C_email</th>
                <th>C_phone</th>
                <th>C_address</th>
                <th>Show customer bookings</th>
                <th>Delete customer</th>
                <th>Edit customer</th>
            
            </tr>
        </thead>
        <?php while ($raw = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $raw['c_id']; ?></td>
                    <td><?php echo $raw['C_name']; ?></td>
                    <td><?php echo $raw['C_email']; ?></td>
                    <td><?php echo $raw['C_phone']; ?></td>
                    <td><?php echo $raw['C_address']; ?></td>
                    <td>
                    <form action="show_customer_booked.php" method="POST">
                        <input type="hidden" name="customer_id" value="<?php echo $raw['c_id'];?>">
                        <button type="submit" name="show_bookings" class="btn btn-primary">Show bookings</button>
                    </form>
                </td>
                <td>
                    <form action="#" method="POST">
                        <input type="hidden" name="delete_c_id" value="<?php echo $raw['c_id'];?>">
                        <button type="submit" name="delete_button" class="btn btn-primary">Delete customer</button>
                    </form>
                </td>
                <td>
                  Corrected version
                    <form action="edit\customer_details_edit.php" method="POST">
                        <input type="hidden" name="edit_c_id" value="<?php echo $raw['c_id'];?>">
                        <button type="submit" name="edit_button" class="btn btn-primary">Edit customer</button>
                    </form>

                </td>
                   

                </tr>
            <?php 
            } 
            ?>
        </table>

</body>
</html> -->
