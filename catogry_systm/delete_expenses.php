<?php
include "db_conn.php";
$id = $_GET["id"];

$sql = "SELECT * FROM `expenses`  WHERE id = $id";
$result = mysqli_query($conn, $sql);
 while ($row = mysqli_fetch_assoc($result)) {
  $catogry=$row["category"];
 }

$sql = "DELETE FROM `expenses` WHERE id = $id ";
$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location:expenses.php?id=$catogry");
  }
 else {
  echo "Failed: " . mysqli_error($conn);
}
