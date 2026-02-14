<?php
// Connect to database
$conn = mysqli_connect("localhost", "root", "", "ghumolocal");

if(isset($_POST['submit_review'])) {

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $rating = mysqli_real_escape_string($conn, $_POST['rating']);
   $review = mysqli_real_escape_string($conn, $_POST['review']);

   // ================= IMAGE UPLOAD =================
   $image_name = $_FILES['profile_photo']['name'];
   $image_tmp = $_FILES['profile_photo']['tmp_name'];
   $image_size = $_FILES['profile_photo']['size'];

   $upload_folder = "uploads/";

   // Create uploads folder if not exists
   if(!is_dir($upload_folder)){
      mkdir($upload_folder, 0777, true);
   }

   // Create unique image name
   $new_image_name = time() . "_" . basename($image_name);
   $target_file = $upload_folder . $new_image_name;

   // Allowed extensions
   $allowed_types = ['jpg','jpeg','png','gif'];
   $file_ext = strtolower(pathinfo($new_image_name, PATHINFO_EXTENSION));

   if(in_array($file_ext, $allowed_types)) {

      if($image_size <= 2 * 1024 * 1024) { // 2MB limit

         if(move_uploaded_file($image_tmp, $target_file)) {

            // Save to database (NOW includes profile_photo column)
            $query = "INSERT INTO reviews (name, rating, review, profile_photo) 
                      VALUES ('$name', '$rating', '$review', '$target_file')";

            if(mysqli_query($conn, $query)) {
               echo "<script>alert('Review saved to Ghumo Local!'); window.location.href='about.php';</script>";
            } else {
               echo "Database Error: " . mysqli_error($conn);
            }

         } else {
            echo "Failed to upload image.";
         }

      } else {
         echo "Image size must be less than 2MB.";
      }

   } else {
      echo "Only JPG, JPEG, PNG & GIF files allowed.";
   }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>

   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/auth.css">

</head>
<body>
   
<!-- header section starts  -->

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

<!-- header section ends -->

<div class="heading" style="background:url(images/header-bg-1.png) no-repeat">
   <h1>about us</h1>
</div>

<!-- about section starts  -->

<section class="about">

   <div class="image">
      <img src="images/about-img.jpg" alt="">
   </div>

   <div class="content">
      <h3>why choose us?</h3>
      <p>At Ghumo Local, quality and service go hand in hand. We are committed to delivering excellence at every stage of your journey by closely monitoring client satisfaction and continuously finding new ways to exceed expectations. Our focus is on providing true value for money—because exceptional value means getting every detail right, not just offering the lowest price.
         <p>Designed with you in mind, our travel packages are fully flexible and can be tailored or created from scratch to match your unique preferences. Backed by experienced travel experts and trusted resources, we turn your dream holiday into a seamless and memorable experience.      <div class="icons-container">
         <div class="icons">
            <i class="fas fa-map"></i>
            <span>top destinations</span>
         </div>
         <div class="icons">
            <i class="fas fa-hand-holding-usd"></i>
            <span>affordable price</span>
         </div>
         <div class="icons">
            <i class="fas fa-headset"></i>
            <span>24/7 guide service</span>
         </div>
      </div>
   </div>

</section>

<!-- about section ends -->

<!-- reviews section starts  -->

<section class="reviews">

   <h1 class="heading-title"> clients reviews </h1>

   <div class="swiper reviews-slider">

      <div class="swiper-wrapper">
         <?php
$result = mysqli_query($conn, "SELECT * FROM reviews ORDER BY id DESC");

while($row = mysqli_fetch_assoc($result)){
?>
  <div class="swiper-slide slide">
    <div class="stars">
      <?php for($i=1; $i<=5; $i++){
        echo $i <= $row['rating']
        ? '<i class="fas fa-star"></i>'
        : '<i class="far fa-star"></i>';
      } ?>
    </div>

    <p><?= $row['review']; ?></p>
    <h3><?= $row['name']; ?></h3>
    <span>traveler</span>
    
      <!-- ✅ Profile Photo Added -->
      <img src="<?= $row['profile_photo']; ?>" alt="profile">
  </div>
<?php } ?>


         <div class="swiper-slide slide">
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
            </div>
            <p>Many thanks to all travel team involved in arranging our holiday. Very efficient process from team to keep me advised of all requirements for the trip. Overall was very impressed with service provided and looking forward to next holiday with you!</p>
            <h3>Monalisa Dwibedy</h3>
            <span>traveler</span>
            <img src="images/pic-1.png" alt="">
         </div>

         <div class="swiper-slide slide">
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
            </div>
            <p>I had the most amazing holiday. This was my first time to Fiji and the InterContinental. I loved every moment & cannot wait to go back again. Booking with you guys was professional, easy & went without a hitch. Thank you</p>
            <h3>Prangya Satapathy</h3>
            <span>traveler</span>
            <img src="images/pic-2.png" alt="">
         </div>

         <div class="swiper-slide slide">
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
            </div>
            <p>The experience was stress free from booking through to receiving the details of the holiday and we would book with you guys again and recommend to family or friends Cheers</p>
            <h3>Smruti Pruseth</h3>
            <span>traveler</span>
            <img src="images/pic-3.png" alt="">
         </div>

         <div class="swiper-slide slide">
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
            </div>
            <p>You were great to deal with through a very difficult period. Checking comparable rates we got a great value holiday through this site. Everything came through in time and staff were helpful when required. I would definitely recommend this site and use again when booking my next holiday.</p>
            <h3>Ankita Behera</h3>
            <span>traveler</span>
            <img src="images/pic-4.png" alt="">
         </div>

         <div class="swiper-slide slide">
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
            </div>
            <p>Trouble free transaction and great service Will definitely book again. Thanks to Lisa for all your help adding another person to our trip</p>
            <h3>Yogesh Kotkar</h3>
            <span>traveler</span>
            <img src="images/pic-5.png" alt="">
         </div>

         <div class="swiper-slide slide">
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
            </div>
            <p>Excellent price and the service was efficient and accurate. Highly recommended</p>
            <h3>Divyanshi Jain</h3>
            <span>traveler</span>
            <img src="images/pic-6.png" alt="">
         </div>

      </div>

   </div>

</section>

<!-- reviews section ends -->

<!-- ADD REVIEW SECTION STARTS -->

<section class="review-section">
   <div class="review-container">
      <h2 class="heading-title">ADD YOUR REVIEW</h2>

      <!-- Important: enctype added for image upload -->
      <form action="" method="post" enctype="multipart/form-data" class="review-form">

         <div class="inputBox">
            <span>Your Name</span>
            <input type="text" name="name" placeholder="Enter Your Name" required>
         </div>

         <div class="inputBox">
            <span>Profile Photo</span>
            <input type="file" name="profile_photo" accept="image/*" required>
         </div>

         <div class="inputBox">
            <span>Rating</span>
            <select name="rating" required>
               <option value="" disabled selected>Select Rating</option>
               <option value="5">5 - Excellent</option>
               <option value="4">4 - Good</option>
               <option value="3">3 - Average</option>
               <option value="2">2 - Poor</option>
               <option value="1">1 - Terrible</option>
            </select>
         </div>

         <div class="inputBox">
            <span>Your Review</span>
            <textarea name="review" placeholder="Write Your Review Here..." required></textarea>
         </div>

         <button type="submit" name="submit_review" class="btn">Submit Review</button>
      </form>
   </div>
</section>


<!-- ADD REVIEW SECTION ENDS -->



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

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>

</html>
