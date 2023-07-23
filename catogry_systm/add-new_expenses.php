<?php
include "db_conn.php";
$id = $_GET['id'];
if (isset($_POST["submit"])) {
$price=$_POST['price'];
$date=$_POST['date'];
$payment=$_POST['payment'];
$comment=$_POST['comment'];
 $sql = "SELECT * FROM `categories` WHERE id_category = $id";
    $result = mysqli_query($conn, $sql);
   while ($row = mysqli_fetch_assoc($result)) {
     $id_user=$row["id_user"];

   }
if ($conn->connect_error) {
echo "<p>Error: Could not connect to database.<br/>
Please try again later.</p>";
die($conn -> error);
}

$query = "INSERT INTO expenses (user,category,date,payment,comment,price)  VALUES ('$id_user','$id','$date','$payment','$comment','$price')";
$result = $conn->query($query);

$query = "UPDATE `categories` SET amount = amount - $price WHERE id_category = $id";
$result = $conn->query($query);

if ($result) {
   header("Location: expenses.php?id=$id");
} else {
   echo   $conn -> error ;
   echo   "<br/>.The item was not added.";
   echo    "<br/>$query ";
}
$conn -> close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <title>Add Expense</title>
</head>
<body>
   <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #b63fac;">
   Expense
   </nav>
   <div class="container">
      <div class="text-center mb-4">
         <h3>Add New Expense</h3>
         <p class="text-muted">Complete the form below to add a new Expense</p>
      </div>
      <div class="container d-flex justify-content-center">
         <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="row mb-3">
               <div class="col">
                  <label class="form-label">Date:</label>
                  <input type="date" class="form-control" name="date" placeholder="Enter date.... ">
               </div>
               <div class="col">
               <label class="form-label">Payment:</label>
               <select name="payment" type="number" class="form-control">
                  <option value="1">Check</option>
                  <option value="2">Card</option>
                  <option value="3">Cash</option>
               </select>
            </div>
            </div>
            <div class="row mb-3">
            <div class="col">
               <label class="form-label">Price:</label>
               <input type="number" class="form-control" name="price" placeholder="Enter Price...">
            </div>
            <div class="col">
               <label class="form-label">Comment:</label>
               <input type="text" class="form-control" name="comment" placeholder="Enter Comment...">
            </div>
            </div>
            <div>
               <?php
               $sql = "SELECT * FROM `categories` WHERE id_category = $id";
               $result = mysqli_query($conn, $sql);
               $row = mysqli_fetch_assoc($result);
               ?>
               <button type="submit" class="btn btn-success" name="submit">Save</button>
               <a href="http://localhost/Assignment5Retajkhir/catogry_systm/expenses.php?id=<?php echo $row["id_category"] ?>" class="btn btn-danger">Cancel</a>
               
            </div>
         </form>
      </div>
   </div>
</body>
</html>