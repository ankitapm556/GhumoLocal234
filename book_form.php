<?php
session_start();
include 'db.php';

// 🚫 Stop booking if user not logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

if (isset($_POST['send'])) {

    // Logged-in user id
    $user_id = $_SESSION['user_id'];

    // Form data
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $phone    = $_POST['phone'];
    $address  = $_POST['address'];
    $location = $_POST['location'];
    $guests   = $_POST['guests'];
    $arrivals = $_POST['arrivals'];
    $leaving  = $_POST['leaving'];

    // ✅ Prepared statement
    $stmt = $conn->prepare(
        "INSERT INTO book_form 
        (user_id, name, email, phone, address, location, guests, arrivals, leaving)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)"
    );

    $stmt->bind_param(
        "isssssiss",
        $user_id,
        $name,
        $email,
        $phone,
        $address,
        $location,
        $guests,
        $arrivals,
        $leaving
    );

    if ($stmt->execute()) {
        // ✅ Redirect with confirmation flag
        header("Location: book.php?confirmed=1&name=" . urlencode($name));
        exit;
    } else {
        echo "❌ Booking failed. Please try again.";
    }

} else {
    echo "❌ Invalid request!";
}
?>
