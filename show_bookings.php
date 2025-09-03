<?php include_once "conn.php"; 

$query="SELECT * FROM booking ";
$result=mysqli_query($conn,$query);



if (isset($_POST['delete_button'])) {
    $delete_b_id = isset($_POST['delete_b_id']) ? $_POST['delete_b_id'] : null;

    if ($delete_b_id !== null) {
        // Perform the delete operation
        $query = "DELETE FROM booking WHERE b_id = '$delete_b_id'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "<script>alert('Event deleted successfully!'); window.location.href = 'show_bookings.php';</script>";
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
        h1{
        
        }
    </style>
  </head>
  <body>
  

  <div class="content">
    
    <div class="container">
     <center> <h1 style="color:white;">Bokings</h1></center>
      

      <div class="table-responsive custom-table-responsive">
<div class="table">
        <table class="table table-hover">
          <thead>
            
                <th>Booking ID</th>
                <th>Customer ID</th>
                <th>Event Title</th>
                <th>Description</th>
                <th>Event_date</th>
                <th>Time</th>
                <th>Location</th>
                <th>foods</th>
                <th>Decorations</th>
                <th>Liqures</th>
                <th>Payments</th>
                <th>Guest Count</th>
                <th>Show customer details</th>
                <th>Delete</th>
                
            </tr>
          </thead>
          <tbody>
            <tr scope="row">
              
            <?php while ($raw = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $raw['b_id']; ?></td>
                    <td><?php echo $raw['c_id']; ?></td>
                    <td><?php echo $raw['title']; ?></td>
                    <td><?php echo $raw['description']; ?></td>
                    <td><?php echo $raw['event_date']; ?></td>
                    <td><?php echo $raw['time']; ?></td>
                    <td><?php echo $raw['location']; ?></td>
                    <td><?php echo $raw['foods']; ?></td>
                    <td><?php echo $raw['decorations']; ?></td>
                    <td><?php echo $raw['liqures']; ?></td>
                    <td><?php echo $raw['payments']; ?></td>
                    <td><?php echo $raw['guest_count']; ?></td>

                    <td>
                    <form action="show_customers2.php" method="POST">
                        <input type="hidden" name="show_button" value="<?php echo $raw['c_id'];?>">
                        <button type="submit" class="btn btn-primary">Show</button>
                    </form>
                </td>
                    <td>
                  
                    <form action="#" method="POST">
                        <input type="hidden" name="delete_b_id" value="<?php echo $raw['b_id'];?>">
                        <button type="submit" name="delete_button" onclick="checker();" class="btn btn-danger">Delete</button>
                    </form>

                </td>

                


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
            var result = confirm('Are you sure do you want to delete this event ?');
            if(result==false){
                event.preventDefault();
            }
        }
    </script>
  </body>
</html>























<!-- 
<!DOCTYPE html>
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
                <th>b_id</th>
                <th>c_id</th>
                <th>title</th>
                <th>description</th>
                <th>event_date</th>
                <th>time</th>
                <th>location</th>
                <th>foods</th>
                <th>decorations</th>
                <th>liqures</th>
                <th>Payments</th>
                <th>Guest Count</th>
                <th>Delete</th>
                <th>Show customer details</th>
            </tr>
        </thead>
        <?php while ($raw = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $raw['b_id']; ?></td>
                    <td><?php echo $raw['c_id']; ?></td>
                    <td><?php echo $raw['title']; ?></td>
                    <td><?php echo $raw['description']; ?></td>
                    <td><?php echo $raw['event_date']; ?></td>
                    <td><?php echo $raw['time']; ?></td>
                    <td><?php echo $raw['location']; ?></td>
                    <td><?php echo $raw['foods']; ?></td>
                    <td><?php echo $raw['decorations']; ?></td>
                    <td><?php echo $raw['liqures']; ?></td>
                    <td><?php echo $raw['payments']; ?></td>
                    <td><?php echo $raw['guest_count']; ?></td>

        
                    <td>
                  
                    <form action="#" method="POST">
                        <input type="hidden" name="delete_b_id" value="<?php echo $raw['b_id'];?>">
                        <button type="submit" name="delete_button" class="btn btn-primary">Delete</button>
                    </form>

                </td>

                <td>
                    <form action="show_customers2.php" method="POST">
                        <input type="hidden" name="show_button" value="<?php echo $raw['c_id'];?>">
                        <button type="submit" class="btn btn-primary">Show</button>
                    </form>
                </td>


                </tr>
            <?php 
            } 
            ?>
        </table>

</body>
</html> -->
