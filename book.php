<?php
session_start();
include 'db.php';

// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Logged-in user id
$user_id = $_SESSION['user_id'];

// Fetch booking history (SECURE WAY)
$stmt = $conn->prepare("SELECT * FROM book_form WHERE user_id = ? ORDER BY id DESC");
$stmt->bind_param("i", $user_id); // i = integer
$stmt->execute();
$booking_result = $stmt->get_result();
?>

<?php if (isset($_GET['confirmed'])): ?>
<script>
  window.onload = function () {
    showPopup("<?php echo $_GET['name']; ?>");
  }
</script>
<?php endif; ?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Book</title>

   <!-- swiper css -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- font awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css -->
   <link rel="stylesheet" href="css/auth.css">
   <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- header section starts -->
<section class="header">

   <a href="home.php" class="logo">Ghumo Local</a>

   <nav class="navbar">
      <a href="home.php">home</a>
      <a href="about.php">about</a>
      <a href="package.php">package</a>
      <a href="book.php">book</a>

      <?php if(isset($_SESSION['user_id'])): ?>
         <span style="color:#2e7d32;font-size:1.5rem;margin-right:10px;">
            Hi, <?php echo htmlspecialchars($_SESSION['user_name']); ?>
         </span>
         <a href="logout.php"
            style="background:red;color:white;padding:10px 20px;border-radius:20px;">
            Logout
         </a>
      <?php else: ?>
         <a href="login.php"
            style="background:green;color:white;padding:10px 20px;border-radius:20px;">
            Login
         </a>
         <a href="registration.php"
            style="background:green;color:white;padding:10px 20px;border-radius:20px;">
            Register
         </a>
      <?php endif; ?>
   </nav>

   <div id="menu-btn" class="fas fa-bars"></div>
</section>
<!-- header section ends -->

<div class="heading" style="background:url(images/header-bg-3.png) no-repeat">
   <h1>book now</h1>
</div>

<!-- booking section starts  -->

<section class="booking">

   <h1 class="heading-title">book your trip!</h1>

   <form action="book_form.php" method="post" class="book-form">

      <div class="flex">
         <div class="inputBox">
            <span>name :</span>
            <input type="text" placeholder="enter your name" name="name">
         </div>
         <div class="inputBox">
            <span>email :</span>
            <input type="email" placeholder="enter your email" name="email">
         </div>
         <div class="inputBox">
            <span>phone :</span>
            <input type="number" placeholder="enter your number" name="phone">
         </div>
         <div class="inputBox">
            <span>address :</span>
            <input type="text" placeholder="enter your address" name="address">
         </div>
         <div class="inputBox">
            <span>where to :</span>
            <input type="text" placeholder="place you want to visit" name="location">
         </div>
         <div class="inputBox">
            <span>how many :</span>
            <input type="number" placeholder="number of guests" name="guests">
         </div>
         <div class="inputBox">
            <span>arrivals :</span>
            <input type="date" name="arrivals">
         </div>
         <div class="inputBox">
            <span>leaving :</span>
            <input type="date" name="leaving">
         </div>
      </div>

      <input type="submit" value="submit" class="btn" name="send">

   </form>

</section>

<!-- booking section ends -->

<section class="booking-history">
  <h1 class="heading-title">My Bookings</h1>

  <div class="history-container">

  <?php if(mysqli_num_rows($booking_result) > 0): ?>
    <?php while($row = mysqli_fetch_assoc($booking_result)): ?>

      <div class="history-card">
        <h3><?= htmlspecialchars($row['location']) ?></h3>

        <p class="date">
          <strong>Booked on:</strong> <?= date('d M Y', strtotime($row['arrivals'])) ?>
        </p>

        <p><strong>Guests:</strong> <?= $row['guests'] ?></p>
        <p><strong>Arrival:</strong> <?= $row['arrivals'] ?></p>
        <p><strong>Leaving:</strong> <?= $row['leaving'] ?></p>

      </div>

    <?php endwhile; ?>
  <?php else: ?>
   <p class='no-bookings'>No bookings found.</p>
  <?php endif; ?>

  </div>
</section>

<div id="bookingPopup" class="popup-overlay" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5); align-items:center; justify-content:center;">
  <div class="popup-box" style="background:#fff; padding:30px; border-radius:10px; text-align:center; width:300px;">
    <h2>🎉 Booking Confirmed</h2>
    <p id="popupMessage"></p>
    <button onclick="closePopup()" style="padding:10px 20px; border:none; background:#4CAF50; color:white; border-radius:5px; cursor:pointer;">OK</button>
  </div>
</div>

<script>
function showPopup(name) {
  document.getElementById("popupMessage").innerText =
    "Hi " + name + ", your booking is confirmed!";
  document.getElementById("bookingPopup").style.display = "flex";
}

function closePopup() {
  // Hide the popup
  document.getElementById("bookingPopup").style.display = "none";

  // Redirect to book.php
  window.location.href = 'book.php';
}
</script>


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

<!-- footer section ends -->









<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- Booking Completed Popup -->
<div id="bookingPopup" class="popup-overlay">
  <div class="popup-content">
    <h2>Booking Completed!</h2>
    <p>Thank you for booking with us. Your reservation has been successfully completed.</p>
    <button id="closePopupBtn">Close</button>
  </div>
</div>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>