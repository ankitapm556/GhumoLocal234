<?php
include 'db.php'; // Connect to your database

if(isset($_POST['send'])){
   $name = $_POST['name'];
   $username = $_POST['username'];
   $email = $_POST['email'];
   $phone = $_POST['phone'];
   $gender = $_POST['gender'];
   $city = $_POST['city'];
   $pass = $_POST['password'];
   $cpass = $_POST['cpassword'];

   // Check if passwords match
   if($pass != $cpass){
       header('Location: registration.php?error=passwordmismatch');
       exit;
   } else {
       // Check if email already exists
       $select = "SELECT * FROM user_form WHERE email = '$email'";
       $result = mysqli_query($conn, $select);

       if(mysqli_num_rows($result) > 0){
           // Email already exists
           header('Location: registration.php?error=emailexists');
           exit;
       } else {
           // Insert into database
           $insert = "INSERT INTO user_form(name, username, email, phone, gender, city, password) 
                      VALUES('$name','$username','$email','$phone','$gender','$city','$pass')";
           mysqli_query($conn, $insert);

           // Registration success
           header('Location: login.php?register=success');
           exit;
       }
   }
}
?>
