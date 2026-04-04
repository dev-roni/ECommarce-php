<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            margin: 0;
        }

        .bg-image {
            background-image: url('assets/img/background.jpg'); /* আপনার ইমেজের URL এখানে দিন */
            background-size: cover;
            background-position: center;
            height: 100%;
        }

        .signup-container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
        }

        .signup-card {
            background-color: rgba(255, 255, 255, 0.9); /* সামান্য ট্রান্সপারেন্ট ব্যাকগ্রাউন্ড */
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
        }

        .signup-card h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo-container {
            position: absolute;
            top: 20px;
            left: 20px;
            padding: 10px;
        }

        .btn-signup {
            width: 100%;
        }
    </style>
</head>
<body>
<?php
require_once('db_connection.php');
session_start();

$error = "";
$success = "";

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validation
    if (empty($name)) {
        $error = 'Please fill in your name.';
    } elseif (empty($email)) {
        $error = 'Please fill in your email.';
    } elseif (empty($password)) {
        $error = 'Please fill in your password.';
    } elseif (strlen($password) < 8 || strlen($password) > 20) {
        $error = 'Password must be 8-20 characters long.';
    } elseif ($password !== $confirm_password) {
        $error = 'Passwords do not match.';
    } else {
        // Check if email already exists
        $sql_check = "SELECT * FROM users WHERE email = '$email'";
        $result_check = mysqli_query($conn, $sql_check);
        if (mysqli_num_rows($result_check) > 0) {
            $error = 'Email already exists.';
        } else {
            // Insert new user
            $sql = "INSERT INTO users (name, email, password, role) VALUES ('$name', '$email', '$password', 'user')";
            if (mysqli_query($conn, $sql)) {
                $regi_success = 'Registration successful! Please log in.';
                header("Location: login.php?regi_success=" . urlencode($regi_success));
            } else {
                $error = 'Registration failed. Please try again.';
            }
        }
    }
}
?>
    <div class="bg-image">
        <div class="signup-container">
            <div class="signup-card">
                <!-- Sign Up Form -->
                <h2>Sign Up</h2>
                <?php if ($error) { ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php } ?>
                <?php if ($success) { ?>
                    <div class="alert alert-success"><?php echo $success; ?></div>
                <?php } ?>
                <form method="POST" action="registration.php">
                    <!-- Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter your full name" required>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email" required>
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" required>
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Confirm your password" required>
                    </div>

                    <!-- Sign Up Button -->
                    <button type="submit" name="submit" class="btn btn-primary btn-signup">Sign Up</button>

                    <!-- Login link -->
                    <div class="text-center mt-3">
                        <a href="login.php">Already have an account? Log in</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS (Optional, for enhanced functionality) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>