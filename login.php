<?php
// 1) Start session once, before any output
session_start();

// 2) Redirect logged‑in users away from the login page
//    Use the same session key your login handler sets.
//    In your nav you used $_SESSION['user_id'], so we check that here.
//    If your login code uses a different key, replace 'user_id' with that key.
if (isset($_SESSION['user_id'])) {
    header("Location: home.php");
    exit();
}

// 3) Prepare error message if any
$error = '';
if (isset($_SESSION['login_error'])) {
    $error = $_SESSION['login_error'];
    unset($_SESSION['login_error']); // remove after showing once
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login | Ghumo Local</title>

   <!-- font awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- main site css -->
   <link rel="stylesheet" href="css/style.css">

   <!-- login / register css -->
   <link rel="stylesheet" href="css/auth.css">
</head>
<body>

<!-- HEADER -->
<section class="header">

   <a href="home.php" class="logo">Ghumo Local</a>

   <nav class="navbar">
      <a href="home.php">home</a>
      <a href="about.php">about</a>
      <a href="package.php">package</a>
      <a href="book.php">book</a>

      <?php if (isset($_SESSION['user_id'])): ?>
         <span style="font-size: 1.7rem; color: #2e7d32; margin-right: 10px;">
            Hi, <?php echo htmlspecialchars($_SESSION['user_name']); ?>
         </span>
         <a href="logout.php" class="btn-login" style="background:red;color:white;padding:10px 20px;border-radius:20px;">Logout</a>
      <?php else: ?>
         <a href="login.php" class="btn-login" style="background:green;color:white;padding:10px 20px;border-radius:20px;">Login</a>
         <a href="registration.php" class="btn-register" style="background:green;color:white;padding:10px 20px;border-radius:20px;">Register</a>
      <?php endif; ?>
   </nav>

   <div id="menu-btn" class="fas fa-bars"></div>

</section>
<!-- HEADER END -->

<!-- PAGE HEADING -->
<div class="heading" style="background:url(images/header-bg-3.png) no-repeat">
   <h1>Login</h1>
</div>

<!-- LOGIN FORM -->
<section class="auth">

   <div class="auth-card">
   <h2>Welcome Back</h2>

   <?php if ($error != ''): ?>
      <p style="color:red; text-align:center; margin-bottom:15px;"><?php echo htmlspecialchars($error); ?></p>
   <?php endif; ?>

   <form action="login_form.php" method="post">
         <div class="inputBox">
            <span>Email</span>
            <input type="email" name="email" placeholder="Enter your email" required>
         </div>

         <div class="inputBox">
            <span>Password</span>
            <input type="password" name="password" placeholder="Enter your password" required>
         </div>

         <div class="checkbox">
            <input type="checkbox">
            <label>Remember me</label>
         </div>

         <input type="submit" value="Login" name="login" class="btn">

         <p class="auth-link">
            Don’t have an account?
            <a href="registration.php">Register</a>
         </p>

      </form>
   </div>

</section>
<!-- LOGIN END -->

<!-- footer section starts  -->

<section class="footer">

   <div class="box-container">

      <div class="box">
         <h3>quick links</h3>
         <a href="home.php"> <i class="fas fa-angle-right"></i> home</a>
         <a href="about.php"> <i class="fas fa-angle-right"></i> about</a>
         <a href="package.php"> <i class="fas fa-angle-right"></i> package</a>
         <a href="book.php"> <i class="fas fa-angle-right"></i> book</a>
      </div>

      <div class="box">
         <h3>extra links</h3>
         <a href="#"> <i class="fas fa-angle-right"></i> ask questions</a>
         <a href="#"> <i class="fas fa-angle-right"></i> about us</a>
         <a href="#"> <i class="fas fa-angle-right"></i> privacy policy</a>
         <a href="#"> <i class="fas fa-angle-right"></i> terms of use</a>
      </div>

      <div class="box">
         <h3>contact info</h3>
         <a href="#"> <i class="fas fa-phone"></i> +123-456-7890 </a>
         <a href="#"> <i class="fas fa-phone"></i> +111-222-3333 </a>
         <a href="#"> <i class="fas fa-envelope"></i> ghumolocal@gmail.com </a>
         <a href="#"> <i class="fas fa-map-marker-alt"></i> Bhubaneswar, India - 400104 </a>
      </div>

      <div class="box">
         <h3>follow us</h3>
         <a href="#"> <i class="fab fa-facebook-f"></i> facebook </a>
         <a href="#"> <i class="fab fa-twitter"></i> twitter </a>
         <a href="#"> <i class="fab fa-instagram"></i> instagram </a>
         <a href="#"> <i class="fab fa-linkedin"></i> linkedin </a>
      </div>

   </div>

   <div class="credit"> created by <span>Ghumo Local</span> | all rights reserved! </div>

</section>

<!-- footer section ends -->

<!-- Registration Success Popup -->
<div id="registerPopup" class="popup-overlay">
  <div class="popup-content">
    <h2>Registration Successful!</h2>
    <p>Your account has been created. Please login to continue.</p>
    <button id="closeRegisterPopup">Close</button>
  </div>
</div>

<script>
window.addEventListener('DOMContentLoaded', () => {
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('register') === 'success') {
        const popup = document.getElementById('registerPopup');
        if(popup) popup.style.display = 'flex';
        // Remove the query string without reloading
        window.history.replaceState({}, document.title, "login.php");
    }

    // Close popup button
    const closeBtn = document.getElementById('closeRegisterPopup');
    if(closeBtn) {
        closeBtn.addEventListener('click', () => {
            document.getElementById('registerPopup').style.display = 'none';
        });
    }

    // Close if clicking outside content
    const popupOverlay = document.getElementById('registerPopup');
    if(popupOverlay){
        popupOverlay.addEventListener('click', (e) => {
            if(e.target === popupOverlay){
                popupOverlay.style.display = 'none';
            }
        });
    }
});
</script>

<script src="js/script.js"></script>

</body>
</html>
