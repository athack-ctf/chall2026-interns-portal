<?php

$dbPath = '/var/www/html/data/app.sqlite';

// Create data directory if it doesn't exist
if (!is_dir('/var/www/html/data')) {
    mkdir('/var/www/html/data', 0755, true);
}

// Remove old database if it exists
if (file_exists($dbPath)) {
    unlink($dbPath);
}

// Create new database
$db = new PDO('sqlite:' . $dbPath);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Create users table
$db->exec('
    CREATE TABLE users (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        username TEXT UNIQUE NOT NULL,
        password TEXT NOT NULL,
        is_admin INTEGER DEFAULT 0
    )
');

// Hash passwords
$adminPassword = password_hash('admin_secret_pass_' . bin2hex(random_bytes(8)), PASSWORD_DEFAULT);
$internPassword = password_hash('aReaLyPaSsCoDe', PASSWORD_DEFAULT);

// Insert users
$stmt = $db->prepare('INSERT INTO users (username, password, is_admin) VALUES (?, ?, ?)');

$stmt->execute(['admin', $adminPassword, 1]);
$stmt->execute(['intern', $internPassword, 0]);

echo "Database seeded successfully!\n";
echo "- Admin user created (password is intentionally unknown)\n";
echo "- Intern user created (username: Intern, password: aReaLyPaSsCoDe)\n";