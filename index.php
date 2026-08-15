<?php
require_once 'db.php';

$message = "";
$messageType = "";

// Form Submission Handle Karna
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (!empty($email) && !empty($password)) {
        try {
            // Password Hash Karna
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            // MongoDB me Insert karna
            $insertResult = $usersCollection->insertOne([
                'email'      => $email,
                'password'   => $hashedPassword,
                'created_at' => new MongoDB\BSON\UTCDateTime()
            ]);

            if ($insertResult->getInsertedCount() > 0) {
                $message = "User registered successfully!";
                $messageType = "success";
            }
        } catch (Exception $e) {
            $message = "Database Error: " . $e->getMessage();
            $messageType = "error";
        }
    } else {
        $message = "Please fill in all fields.";
        $messageType = "error";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login / Register</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h2>Login</h2>

        <?php if (!empty($message)): ?>
            <div class="alert" style="color: <?php echo $messageType === 'success' ? '#00ff88' : '#ff4d4d'; ?>; margin-bottom: 15px; text-align: center;">
                <?php echo htmlspecialchars($message); ?>
            </div>
        <?php endif; ?>

        <!-- Form wrapping inputs AND button together -->
        <form action="index.php" method="POST">
            <div class="input-group">
                <input type="email" name="email" placeholder="Email" required autocomplete="off">
            </div>

            <div class="input-group">
                <input type="password" name="password" placeholder="Password" required>
            </div>

            <!-- Submit Button inside </form> -->
            <button type="submit" class="btn-login">Login</button>
        </form>

        <p class="footer-text">
            Don't have an account? <a href="#">Register</a>
        </p>
    </div>
</body>

    <script src="script.js"></script>
</html>