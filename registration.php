<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register | Ghumo Local</title>

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
      <a href="login.php" class="btn-login" style="background:green;color:white;padding:10px 20px;border-radius:20px;">Login</a>
      <a href="registration.php" class="btn-register" style="background:green;color:white;padding:10px 20px;border-radius:20px;">Register</a>
   </nav>

   <div id="menu-btn" class="fas fa-bars"></div>

</section>
<!-- HEADER END -->

<!-- PAGE HEADING -->
<div class="heading" style="background:url(images/header-bg-3.png) no-repeat">
   <h1>Register Now!</h1>
</div>

<!-- REGISTRATION FORM -->
<section class="auth">

   <div class="auth-card">
      <h2>Create Account</h2>

      <form action="registration_form.php" method="post">

         <div class="inputBox">
            <span>Full Name</span>
            <input type="text" name="name" placeholder="Enter your full name" required>
         </div>

         <div class="inputBox">
            <span>Username</span>
            <input type="text" name="username" placeholder="Choose a username" required>
         </div>

         <div class="inputBox">
            <span>Email</span>
            <input type="email" name="email" placeholder="Enter your email" required>
         </div>

         <div class="inputBox">
            <span>Mobile Number</span>
            <input type="tel" name="phone" placeholder="Enter mobile number" required>
         </div>

         <div class="inputBox">
            <span>Gender</span>
            <select name="gender" required>
               <option value="">Select gender</option>
               <option value="Male">Male</option>
               <option value="Female">Female</option>
               <option value="Other">Other</option>
            </select>
         </div>

         <div class="inputBox">
            <span>City</span>
            <input type="text" name="city" placeholder="Enter your city" required>
         </div>

         <div class="inputBox">
            <span>Password</span>
            <input type="password" name="password" placeholder="Create password" required>
         </div>

         <div class="inputBox">
            <span>Confirm Password</span>
            <input type="password" name="cpassword" placeholder="Confirm password" required>
         </div>

         <div class="checkbox">
            <input type="checkbox" required>
            <label>I agree to the Terms & Conditions</label>
         </div>

         <input type="submit" value="Register" name="send" class="btn">

         <p class="auth-link">
            Already have an account?
            <a href="login.php">Login</a>
         </p>

      </form>
   </div>

</section>
<!-- REGISTRATION END -->

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
         <a href="#"> <i class="fas fa-map"></i> Bhubaneswar, India - 400104 </a>
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

<!-- Email Exists Popup -->
<div id="emailExistsPopup" class="popup-overlay">
  <div class="popup-content">
    <h2>Email Already Registered!</h2>
    <p>This email is already associated with an account. Please login or use a different email.</p>
    <button id="closeEmailPopup">Close</button>
  </div>
</div>

<script>
window.addEventListener('DOMContentLoaded', () => {
    const urlParams = new URLSearchParams(window.location.search);
    if(urlParams.get('error') === 'emailexists') {
        const popup = document.getElementById('emailExistsPopup');
        if(popup) popup.style.display = 'flex';

        // Remove the query string without reloading
        window.history.replaceState({}, document.title, "registration.php");
    }

    const closeBtn = document.getElementById('closeEmailPopup');
    if(closeBtn) {
        closeBtn.addEventListener('click', () => {
            document.getElementById('emailExistsPopup').style.display = 'none';
        });
    }

    const popupOverlay = document.getElementById('emailExistsPopup');
    if(popupOverlay){
        popupOverlay.addEventListener('click', (e) => {
            if(e.target === popupOverlay){
                popupOverlay.style.display = 'none';
            }
        });
    }
});
</script>


<!-- footer section ends -->
<script src="js/script.js"></script>

</body>
</html>
