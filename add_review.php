<?php
$conn = mysqli_connect("localhost", "root", "", "ghumolocal");

if (!$conn) {
   die("Connection failed");
}

$name   = $_POST['name'];
$review = $_POST['review'];
$rating = $_POST['rating'];

$sql = "INSERT INTO reviews (name, review, rating) 
        VALUES ('$name', '$review', '$rating')";

mysqli_query($conn, $sql);

header("Location: about.php");
exit();
?>
