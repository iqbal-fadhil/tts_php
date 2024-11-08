<?php
// generate_audio.php
session_start();
include 'db.php';
require 'vendor/autoload.php'; // gTTS library installation path

use Google\Cloud\TextToSpeech\TextToSpeechClient;
use Google\Cloud\Storage\StorageClient;

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['message' => 'Unauthorized']);
    exit;
}

$text = $_POST['text'];
$user_id = $_SESSION['user_id'];

// Generate audio file using gTTS
$file_path = "audio_files/" . uniqid() . ".mp3";
$tts = new \Google\Cloud\TextToSpeech\TextToSpeechClient();

$stmt = $pdo->prepare("INSERT INTO audio_files (user_id, text, file_path) VALUES (?, ?, ?)");
$stmt->execute([$user_id, $text, $file_path]);

echo json_encode(['message' => 'Audio generated successfully']);
