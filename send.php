
<?php include_once "header_Footer/header.php"?>
<?php include_once "conn.php"; 


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $c_id = rand(100, 1000);
    $C_name = $_POST['C_name'];
    $C_email = $_POST['C_email'];
    $C_phone = $_POST['C_phone'];
    $C_address = $_POST['C_address']; 

    
    $query= "INSERT INTO customer(c_id, C_name, C_email, C_phone, C_address)
            VALUES (?,?,?,?,?)";

    $stmt=mysqli_prepare($conn,$query);
    mysqli_stmt_bind_param($stmt, "sssss",$c_id,$C_name,$C_email,$C_phone,$C_address);
    $result = mysqli_stmt_execute($stmt);


    if ($result) {
      
      echo "<script>alert('Data inserted successfully! Your ID is: ($c_id)   Your id sent via Email..');  window.location.href = 'get_event_details.php'; </script>";

  } else {
     
      echo "<script>alert('Error: Data could not be inserted.');</script>";
      // Log detailed error for debugging:
      error_log("MySQL Error: " . mysqli_error($conn));
  }
  
  

    // Close the statement
    mysqli_stmt_close($stmt);

    // Close the database connection
    mysqli_close($conn);
}
            


// Example usage
// $customerID = "123456";
// $customerEmail = "customer@example.com";





?>


<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if(isset($_POST["next"])){
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'kasundeni1997@gmail.com';
    $mail->Password ='rrlb jrrv oara ikxb';
    $mail->SMTPSecure ='ssl';
    $mail->Port = 465;

    $mail->setFrom('kasundeni1997@gmil.com');

    $mail->addAddress($_POST["C_email"]);

    $mail->isHTML(true);

    $mail->Subject = 'Your registration sucsess..!!';
    $mail->Body ='Thank you for choosing our service here is your customer ID: '.$c_id;

    $mail->send();

    echo"
    
    <script>
    alert('Sent Succesfully');
    document.location.href ='email.php';

    </script>
    ";
}



?>