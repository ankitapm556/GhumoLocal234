Login successful

<?php
include 'db.php';
session_start();

if(isset($_POST['login'])){

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    // Check if email exists
    $select = "SELECT * FROM user_form WHERE email = '$email' LIMIT 1";
    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){
        $user = mysqli_fetch_assoc($result);

        if($password === $user['password']){ // plain text
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            header('Location: home.php');
            exit;
        } else {
            $_SESSION['login_error'] = "Incorrect password!";
            header('Location: login.php');
            exit;
        }

        /*
        // Recommended for hashed passwords
        if(password_verify($password, $user['password'])){
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            header('Location: home.php');
            exit;
        } else {
            $_SESSION['login_error'] = "Incorrect password!";
            header('Location: login.php');
            exit;
        }
        */

    } else {
        $_SESSION['login_error'] = "Email not registered!";
        header('Location: login.php');
        exit;
    }
}
?>
