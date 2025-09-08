<?php
// test_db.php
// Simple PHP script to test MySQL database connection via GitHub Actions

// Database credentials (replace with your hosting details)
$host = "sql213.ezyro.com"; // e.g., localhost or db123.hosting.com
$db   = "ezyro_39753987_Lumi";
$user = "ezyro_39753987";
$pass = "3e7824f01de";

try {
    // PDO connection
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Simple query to test
    $stmt = $pdo->query("SELECT NOW() AS current_time");
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $db_time = $row['current_time'];

    $status = "✅ Connection successful!";
} catch (PDOException $e) {
    $status = "❌ Connection failed: " . $e->getMessage();
    $db_time = "N/A";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP MySQL Test</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; text-align: center; padding: 50px; }
        h1 { color: #4A90E2; }
        p { font-size: 1.1rem; color: #333; }
        .box { background: #fff; padding: 25px; border-radius: 12px; display: inline-block; box-shadow: 0 4px 12px rgba(0,0,0,0.1); }
        .success { color: green; }
        .error { color: red; }
    </style>
</head>
<body>
    <div class="box">
        <h1>Database Connection Test</h1>
        <p>Status: <span class="<?= strpos($status, 'successful') !== false ? 'success' : 'error' ?>"><?= $status ?></span></p>
        <p>Server Time from DB: <?= htmlspecialchars($db_time) ?></p>
    </div>
</body>
</html>
