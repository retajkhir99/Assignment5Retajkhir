<?php
include "db_conn.php";
$id = $_GET['id'];
if (isset($_POST["submit"])) {
  $name = $_POST['name'];
  $type = $_POST['type'];
  $amount = $_POST['amount'];

  $sql = "UPDATE `categories` SET `name_category`='$name',`type`='$type',`amount`='$amount' WHERE id_category = $id";
  $result = mysqli_query($conn, $sql);

  $sql = "SELECT * FROM `categories` WHERE id_category = $id LIMIT 1";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  
  $id2= $row["id_user"];
  if ($result) {
    header("Location: index.php?id=");
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
  <title>categories</title>
</head>

<body>
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #b63fac;">
  categories
  </nav>
  <div class="container">
    <div class="text-center mb-4">
      <h3>Edit categories</h3>
      <p class="text-muted">Click update after changing any information</p>
    </div>
    <?php
    $sql = "SELECT * FROM `categories` WHERE id_category = $id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>
    <div class="container d-flex justify-content-center">
      <form action="" method="post" style="width:50vw; min-width:300px;">
        <div class="row mb-3">
          <div class="col">
            <label class="form-label">Name:</label>
            <input type="text" class="form-control" name="name" value="<?php echo $row['name_category'] ?>">
          </div>
          <div class="col">
            <label class="form-label">Type :</label>
            <input type="text" class="form-control" name="type" value="<?php echo $row['type'] ?>">
          </div>
        </div>
        <div class="row mb-3">
          <div class="col">
          <label class="form-label">Amount:</label>
          <input type="number" class="form-control" name="amount" value="<?php echo $row['amount'] ?>">
        </div>
        </div>
       </div>
        <div>
          <button type="submit" class="btn btn-success" name="submit">Update</button>
          <a href="index.php?id=<?php echo $row["id_user"] ?>" class="btn btn-danger">Cancel</a>
        </div>
       </div>
       
      </form>
    </div>
  </div>
</body>
</html>