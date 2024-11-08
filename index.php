<?php
session_start();

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    // User is logged in, redirect to audio list page
    header("Location: audio_list.php");
} else {
    // User is not logged in, redirect to login page
    header("Location: login.php");
}
exit;
?>
