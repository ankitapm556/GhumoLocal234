<?php

   $connection = mysqli_connect('localhost','root','','book_db');

   if(isset($_POST['send'])){
      $email = $_POST['email'];
      $password = $_POST['password'];

      $request = " insert into login_form(email,password) values('$email','$password') ";
      mysqli_query($connection, $request);

      header('location:login.php'); 

   }else{
      echo 'something went wrong please try again!';
   }

?>