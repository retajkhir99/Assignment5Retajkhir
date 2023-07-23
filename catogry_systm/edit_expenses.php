<?php
include "db_conn.php";
$id = $_GET['id'];

if (isset($_POST["submit"])) {
  $price=$_POST['price'];
  $date=$_POST['date'];
  $payment=$_POST['payment'];
  $comment=$_POST['comment'];

  $sql = "SELECT * FROM `expenses` WHERE id = $id ";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $id_user=$row["user"];
  $id_category=$row["category"];

  $sql = "UPDATE `expenses` SET  `date`='$date',`comment`='$comment',`user`='$id_user',`category`='$id_category',`payment`='$payment',`price`='$price'  WHERE id = $id";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location: expenses.php?id=$id_category");
  } else {
    echo "Failed: " . mysqli_error($conn);
  }
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
  <title>Expenses</title>
</head>

<body>
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #b63fac;">
  Expenses
  </nav>
  <div class="container">
    <div class="text-center mb-4">
      <h3>Edit Expenses</h3>
      <p class="text-muted">Click update after changing any information</p>
    </div>
    <?php
    $sql = "SELECT * FROM `expenses` WHERE id = $id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>
    <div class="container d-flex justify-content-center">
      <form action="" method="post" style="width:50vw; min-width:300px;">
        <div class="row mb-3">
        <div class="col">
            <label class="form-label">price:</label>
            <input type="number" class="form-control" name="price" value="<?php echo $row['price'] ?>">
          </div>
         <div class="col">
            <label class="form-label">Date :</label>
            <input type="date" class="form-control" name="date" value="<?php echo $row['date'] ?>">
          </div>
        </div>
        <div class="row mb-3">
          <div class="col">
               <label class="form-label">Payment:</label>
               <select name="payment" type="number" class="form-control">
                  <option value="1">Check</option>
                  <option value="2">Card</option>
                  <option value="3">Cash</option>
               </select>
          </div>
          <div class="col">
            <label class="form-label">Commant:</label>
            <input type="text" class="form-control" name="comment" value="<?php echo $row['comment'] ?>">
          </div>
       </div>
       <div>
          <button type="submit" class="btn btn-success" name="submit">Update</button>
          <a href="http://localhost/Assignment5Retajkhir/catogry_systm/expenses.php?id=<?php echo $row["category"] ?>" class="btn btn-danger">Cancel</a>
        </div>
      </form>
    </div>
  </div>
</body>
</html>