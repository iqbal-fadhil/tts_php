<?php
// audio_list.php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT * FROM audio_files WHERE user_id = ?");
$stmt->execute([$user_id]);
$audio_files = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Audio Files</title>
</head>
<body>
    <h1>My Audio Files</h1>
    <ul>
        <?php foreach ($audio_files as $audio): ?>
            <li><a href="<?php echo $audio['file_path']; ?>"><?php echo htmlspecialchars($audio['text']); ?></a></li>
        <?php endforeach; ?>
    </ul>
    <a href="dashboard.php">Back to Dashboard</a>
</body>
</html>
