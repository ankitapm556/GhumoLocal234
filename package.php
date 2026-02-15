<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>package</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">
</head>
<body>

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

<div class="heading" style="background:url(images/header-bg-2.png) no-repeat">
   <h1>packages</h1>
</div>

<!-- packages section starts  -->

<section class="packages">

   <h1 class="heading-title">top destinations</h1>

   <div class="box-container">

      <div class="box">
         <div class="image">
            <img src="images/img-1.jpg" alt="">
         </div>
         <div class="content">
            <h3>Satkosia</h3>
            <p>The Satkosia canyon sanctuary was declared for the forests that encircle the Satkosia Gorge of the Mahanadi River, as well as the section of river that flows through the canyon. These forests include a wide diversity of ecosystems and a mosaic of landscapes with an intriguing floral and faunal composition.</p>
            <a href="satkosia.html" class="btn">Details</a>
         </div>
      </div>

      <div class="box">
         <div class="image">
            <img src="images/img-2.jpg" alt="">
         </div>
         <div class="content">
            <h3>Koraput Valley</h3>
            <p>This Valley, is well-known for its coffee plantations that are encircled by lovely gardens, streams, waterfalls, and valleys full of verdant forests.</p>
            <a href="koraput.html" class="btn">Details</a>
         </div>
      </div>

      <div class="box">
         <div class="image">
            <img src="images/img-3.jpg" alt="">
         </div>
         <div class="content">
           <h3>Kala Bhoomi Odisha Crafts Museum</h3>
            <p>Odisha Crafts Museum also known as Kalabhoomi designed by Architects' Studio, is a museum in Bhubaneswar, Odisha, India, dedicated to the art and crafts of Odisha. It was inaugurated by the Chief Minister of Odisha, Naveen Patnaik, on 22 March 2018.</p>
            <a href="book.php" class="btn">Details</a>
         </div>
      </div>

      <div class="box">
         <div class="image">
            <img src="images/img-4.jpg" alt="">
         </div>
         <div class="content">
           <h3>Koilighugar</h3>
            <p>its 200-foot cascade in Ahiraj rivulet, which comes from 'Chhuikhanch' woodland, is located close to Kushmelbahal village in Lakhanpur. Once it joins the Mahanadi River, it creates a picturesque oasis. Within is buried Maheswarnath, a submerged Shivalingam, with an outside one for pilgrims' convenience.</p>
            <a href="book.php" class="btn">Details</a> 
         </div>
      </div>

      <div class="box">
         <div class="image">
            <img src="images/img-5.jfif" alt="">
         </div>
         <div class="content">
            <h3>Deras Dam</h3>
            <p>Deras Dam, located around 20 km away from Bhubaneswar, is considered among the largest dams in Odisha. Established in the year 1967 as a water reservoir, the dam’s main source of water is rain water. This dam was constructed mainly for irrigation purposes. However, a few canals that originate from the dam also serve as the source of water for the animals living in the Chandaka Wildlife Sanctuary.</p>
            <a href="book.php" class="btn">Details</a>
         </div>
      </div>

      <div class="box">
         <div class="image">
            <img src="images/img-6.webp" alt="">
         </div>
         <div class="content">
            <h3>Pandava Bakhra Caves</h3>
            <p>Pandava Bakhara is an old cave that is associated with mythological stories. According to local people, the Pandavas spent a few days here during their exile in this rock shelter hence the name Pandava Bakhara. According to history, the Panchu Pandava brothers stayed in these caves during their Mahabharata-era exile (Vanvas). Therefore, this place is named after him, Pandava Bakhara.</p>
            <a href="book.php" class="btn">Details</a>
         </div>
      </div>

   </div>

</section>

<!-- packages section ends -->
















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