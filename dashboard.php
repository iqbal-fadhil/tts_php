<?php
// dashboard.php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome to the Dashboard</h1>
    <form id="audioForm">
        <textarea name="text" placeholder="Enter text to generate audio" required></textarea>
        <button type="button" onclick="generateAudio()">Generate Audio</button>
    </form>
    <a href="audio_list.php">My Audio Files</a>

    <script>
    function generateAudio() {
        const formData = new FormData(document.getElementById('audioForm'));
        fetch('generate_audio.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
        });
    }
    </script>
</body>
</html>
