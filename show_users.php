<?php include_once "conn.php"; 

$query="SELECT * FROM user ";
$result=mysqli_query($conn,$query);

// Check if the delete button is clicked
if (isset($_POST['delete_button'])) {
    $delete_user_id = isset($_POST['delete_user_id']) ? $_POST['delete_user_id'] : null;

    if ($delete_user_id !== null) {
        // Perform the delete operation
        $query = "DELETE FROM user WHERE user_id = '$delete_user_id'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "<script>alert('user deleted successfully!'); window.location.href = 'show_users.php';</script>";
            exit();
        } else {
            echo "Error deleting customer: " . mysqli_error($conn);
        }
    }
}

?>


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
                <th>user_id</th>
                <th>username</th>
                <th>email</th>
                <th>phone_number</th>
                <th>password</th>
        
                <th>Delete customer</th>
                <th>Edit customer</th>
            
            </tr>
        </thead>
        <?php while ($raw = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $raw['user_id']; ?></td>
                    <td><?php echo $raw['username']; ?></td>
                    <td><?php echo $raw['email']; ?></td>
                    <td><?php echo $raw['phone_number']; ?></td>
                    <td><?php echo $raw['password']; ?></td>
                    
                <td>
                    <form action="#" method="POST">
                        <input type="hidden" name="delete_user_id" value="<?php echo $raw['user_id'];?>">
                        <button type="submit" name="delete_button" class="btn btn-primary">Delete </button>
                    </form>
                </td>
                <td>
                  <!-- Corrected version -->
                    <form action="edit\edit_user.php" method="POST">
                        <input type="hidden" name="edit_user_id" value="<?php echo $raw['user_id'];?>">
                        <button type="submit" name="edit_button" class="btn btn-primary">Edit </button>
                    </form>

                </td>
                   

                </tr>
            <?php 
            } 
            ?>
        </table>

</body>
</html>
