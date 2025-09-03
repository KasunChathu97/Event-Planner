<?php
include_once("../conn.php");

if (isset($_POST['edit_button'])) {
    $edit_booking_id = isset($_POST['edit_b_id']) ? $_POST['edit_b_id'] : null;

    if ($edit_booking_id !== null) {
        $query = "SELECT * FROM booking WHERE b_id = '$edit_booking_id'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
    }
}

if (isset($_POST['update_button'])) {
    $edit_booking_id = $_POST['edit_b_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $event_date = $_POST['event_date'];
    $time = $_POST['time'];
    $location = $_POST['location'];
    $foods = $_POST['foods'];
    $decorations = $_POST['decorations'];
    $liqures = $_POST['liqures'];
    $payments = $_POST['payments'];

    // Update event details
    $query = "UPDATE booking SET 
              title = '$title', 
              description = '$description',
              event_date = '$event_date',  
              time = '$time',
              location = '$location',
              foods = '$foods',
              decorations = '$decorations',
              liqures = '$liqures',
              payments = '$payments'
             
              WHERE b_id = '$edit_booking_id'";

    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Data updated successfully!'); window.location.href = '../show_customers_admin.php';</script>";
        exit();
    } else {
        echo "Error updating event details: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event Details</title>
    <link rel="stylesheet" href="style.css">
    <style>
        form {
            width: 50%;
            margin: 20px auto;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
        }

        button {
            padding: 10px;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

    <form action="" method="POST">
        <h1>Edit event details</h1>
        <br>
    <input type="hidden" name="edit_b_id" value="<?php echo $edit_booking_id; ?>">

        <label for="title">Event Title:</label>
        <!-- <input type="text" name="title" value="<?php echo $row['title']; ?>" required> -->
        <select name="title"  id="title" required>
                                <option value="<?php echo $row['title']; ?>"><?php echo $row['title']; ?></option>
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
    </select><br>                
        
        <label for="description">Event Description:</label>
        <input type="text" name="description" value="<?php echo $row['description']; ?>" required>

        <label for="event_date">Event Date:</label>
        <input type="date" name="event_date" value="<?php echo $row['event_date']; ?>" required>

        <label for="time">Event Time:</label>
        <input type="text" name="time" value="<?php echo $row['time']; ?>" required>

        <label for="location">Event Location:</label>
        <input type="text" name="location" value="<?php echo $row['location']; ?>" required>

        <label for="foods">Foods:</label>
        <input type="text" name="foods" value="<?php echo $row['foods']; ?>" required>

        <label for="decorations">Decorations:</label>
        <input type="text" name="decorations" value="<?php echo $row['decorations']; ?>" required>

        <label for="liqures">Liqures:</label>
        <input type="text" name="liqures" value="<?php echo $row['liqures']; ?>" required>

        <label for="payments">Payments:</label>
        <input type="text" name="payments" value="<?php echo $row['payments']; ?>" required>
<br><br>
        <button type="submit" name="update_button" class="btn btn-primary">Update</button>
        
    </form>
    

</body>
</html>
