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
            echo "<script>alert('Customer deleted successfully!'); window.location.href = 'show_customers_admin.php';</script>";
            exit();
        } else {
            echo "Error deleting customer: " . mysqli_error($conn);
        }
    }
}

?>




<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Admin dashboard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="admin_db_css/style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<style>
    .app-content {
  max-height: 100%;
  overflow-y: auto;
}

/* Add this style to ensure the body and HTML take up the full height of the viewport */
body, html {
  height: 100%;
  margin: 0;
}
</style>
</head>
<body>

<div class="app-container">
  <div class="sidebar">
    <div class="sidebar-header">
      <div class="app-icon">
      
      </div>
    </div>
    <ul class="sidebar-list">
     
      <li class="sidebar-list-item ">
        <a href="admin_dashboard.php">
          
          <span>Show Users</span>
        </a>
      </li>
      <li class="sidebar-list-item active">
        <a href="show_customers_admin.php">
         
          <span>Show customers</span>
        </a>
      </li>
      <li class="sidebar-list-item">
        <a href="show_bookings_admin.php">
          
          <span>Show bookings</span>
        </a>
      </li>
      <li class="sidebar-list-item">
        <a href="update_history.php">
         
          <span>Edit history (bookings)</span>
        </a>
      </li>

      <li class="sidebar-list-item">
        <a href="upcoming_events.php">
         
          <span>Upcoming Events</span>
        </a>
      </li>

      <li class="sidebar-list-item">
        <a href="past_events_admin.php">
         
          <span>Past events</span>
        </a>
      </li>

    </ul>
    <!-- <div class="account-info">
      <div class="account-info-picture">
        <img src="https://images.unsplash.com/photo-1527736947477-2790e28f3443?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTE2fHx3b21hbnxlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=900&q=60" alt="Account">
      </div>
      <div class="account-info-name">Monica G.</div>
      <button class="account-info-more">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"/><circle cx="19" cy="12" r="1"/><circle cx="5" cy="12" r="1"/></svg>
      </button>
    </div> -->
  </div>
  <div class="app-content">
    <div class="app-content-header">
      <h1 class="app-content-headerText">Admin Dashboard</h1>
      <button class="mode-switch" title="Switch Theme">
        <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
          <defs></defs>
          <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
        </svg>
      </button>
      <button class="app-content-headerButton"  onclick="window.location.href = 'register.php'">Add User</button>
    </div>


<!-- search area -->
    <form action="search_dates2.php" method="post">
    <div class="app-content-actions">
      <!-- <input class="search-bar" placeholder="Search..." type="date"> -->
      </div>  
             
	                <input class="search-bar" type="date" name="search" placeholder="Serch Date &hellip;">	
                              
					<input type="submit" class="btn btn-info btn-sm" value="Search">
	                            
                       
							</form>
   

<div class="app-content-actions">
      <div class="app-content-actions-wrapper">
        <div class="filter-button-wrapper">
        
          <button class="action-button filter jsFilter"><span>Filter</span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-filter"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/></svg></button>
          <div class="filter-menu">

                <label>Category</label>
                
                <form action="search_event_attendance2.php" method="post">
               
	                                <!-- <input class="input" type="" name="search" placeholder="Serch Date &hellip;">	 -->

								<select class="input" name="title" id="title" required>
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
                           
	                            
								
	                                <!-- <a class="button button-primary button-block" type="submit" href="#">Search</a> -->
									<input type="submit" class="button button-primary button-block" value="Search">
	                          
                                    </select>
							</form>

               
                            </div>
           
          
        </div>
        <button class="action-button list active" title="List View">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg>
        </button>
        <button class="action-button grid" title="Grid View">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
        </button>
      </div>
    </div>

    <h3 class="app-content-headerText">Customers</h3>
    <br>
    <table class="table table-hover">
    
        <thead>
            <tr>
               
            <th>Customer ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Show bookings</th>
                <th>Edit customer</th>
                <th>Delete customer</th>
                
                
            </tr>
        </thead>
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
                    <form action="edit\customer_details_edit2.php" method="POST">
                        <input type="hidden" name="edit_c_id" value="<?php echo $raw['c_id'];?>">
                        <button type="submit" name="edit_button" class="btn btn-warning">Edit</button>
                    </form>

                </td>
                <td>
                    <form action="#" method="POST">
                        <input type="hidden" name="delete_c_id" value="<?php echo $raw['c_id'];?>">
                        <button type="submit" name="delete_button" onclick="checker();" class="btn btn-danger">Delete</button>
                    </form>
                </td>
                
                   

                </tr>
            <?php 
            } 
            ?>
        </table>
        

</div>
      
      
      
      
      
      
      
      
      
    </div>
  </div>
</div>
        <br><br><br><br><br>
        <h1>11</h1>
<!-- partial -->
  <script  src="admin_db_css/script.js"></script>
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






















































<!-- <?php include_once "conn.php"; 

$query="SELECT * FROM customer ";
$result=mysqli_query($conn,$query);



if (isset($_POST['delete_button'])) {
    $delete_customer_id = isset($_POST['delete_c_id']) ? $_POST['delete_c_id'] : null;

    if ($delete_customer_id !== null) {
        
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
                <th>Delete customer</th>
                
                
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
                        <button type="submit" name="show_bookings" class="btn btn-success">Show bookings</button>
                    </form>
                </td>
                <td>
                  
                    <form action="edit\customer_details_edit.php" method="POST">
                        <input type="hidden" name="edit_c_id" value="<?php echo $raw['c_id'];?>">
                        <button type="submit" name="edit_button" class="btn btn-warning">Edit customer</button>
                    </form>

                </td>
                <td>
                    <form action="#" method="POST">
                        <input type="hidden" name="delete_c_id" value="<?php echo $raw['c_id'];?>">
                        <button type="submit" name="delete_button" onclick="checker();" class="btn btn-danger">Delete customer</button>
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
            var result = confirm('Are you sure do you want to delete this customer ?');
            if(result==false){
                event.preventDefault();
            }
        }
    </script>
  </body>
</html>



 -->



























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
