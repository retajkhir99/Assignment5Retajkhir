<?php
$email = $_POST['email'];
$password = $_POST['password'];

$conn = new mysqli("localhost","root","","expensetracker");

if($conn->connect_error){
    die("filed to connect :" .$conn->connect_error);
}
else{
    $stmt = $conn->prepare("SELECT * FROM users where email = ?");
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $stmt_result = $stmt->get_result();

    if($stmt_result->num_rows>0){
        $data=$stmt_result->fetch_assoc();
        if($data['password']===$password){

            $sql = "SELECT * FROM `users` WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
            $id=$row["id"];   
            header("Location:http://localhost/Assignment5Retajkhir/mainmenu.php?id=$id"); 
            }  
        }else{
            echo "Invalid Email or password";
        }
    }else{
        echo "Invalid Email or password";
    }
}
?>