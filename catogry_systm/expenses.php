<?php
include "db_conn.php";
$id = $_GET['id'];
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
    <?php
    if (isset($_GET["msg"])) {
      $msg = $_GET["msg"];
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      ' . $msg . '
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>
    <?php
        $sql = "SELECT * FROM `categories` WHERE id_category = $id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        ?>
    <a href="http://localhost/Assignment5Retajkhir/catogry_systm/add-new_expenses.php?id=<?php echo $row["id_category"] ?>" class="btn btn-dark mb-3">Add New Expenses </a>
    <a href="http://localhost/Assignment5Retajkhir/mainmenu.php?id=<?php echo $row["id_user"] ?>" class="btn btn-dark mb-3">Home </a>
    <a href="http://localhost/Assignment5Retajkhir/catogry_systm/index.php?id=<?php echo $row["id_user"] ?>" class="btn btn-dark mb-3">Categories</a>
<nav class="navbar navbar-light  fs-3 mb-5" style="background-color: #b63fac;">
<p>Name Category : <?php echo $row["name_category"] ?></P>
<p class="right-align">Amount : <?php echo $row["amount"] ?></p>
</nav>
  </nav>
    <table class="table table-hover text-center">
      <thead class="table-dark">
        <tr>
          <th scope="col">Comment</th>
          <th scope="col">Pric</th>
          <th scope="col">Payment</th>
          <th scope="col">Date</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM `expenses`  WHERE category = $id";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>
            <td><?php echo $row["comment"] ?></td>
            <td><?php echo $row["price"] ?></td>
            <?php
            $payment=$row["payment"];
        if( $payment==1)
        {
            $paym="Cach";
        }else if ($payment==2)
        {
            $paym="Card";
        }
        else{
            $paym="Check";
        }
        ?>
            <td><?php echo $paym ?></td>
            <td><?php echo $row["date"] ?></td>
            <td>
            <a href="http://localhost/Assignment5Retajkhir/catogry_systm/edit_expenses.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
              <a href="http://localhost/Assignment5Retajkhir/catogry_systm/delete_expenses.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
      </tbody>

    </table>
  </div>
</body>
</html>