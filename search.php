<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css_file/search.css">
    <title>Search</title>
</head>
<body>
<form method="POST" action=" ">
  <input type="text" name="submit" placeholder="Search by Date...">
  <button type="submit">Search</button>
</form>
</body>
</html>
<?php
include "db_conn.php";
$id = $_GET['id'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "expensetracker";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $search_term = $_POST['submit'];
    
    $sql =  "SELECT * FROM expenses WHERE date = '$search_term' AND user = $id "; 
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
           while ($row = mysqli_fetch_assoc($result))
           {
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
            echo "<p>Date: " . $row["date"] . "- Price: " . $row["price"] . " - Comment: " . $row["comment"] ." - Payment: ". $paym  ."</p>"; 
           }
    } 
    else {
         echo "<p>No results found Date.</p>";
      }

}
mysqli_close($conn);
?>