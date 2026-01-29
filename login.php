<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
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

        .login-container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
        }

        .login-card {
            background-color: rgba(255, 255, 255, 0.9); /* সামান্য ট্রান্সপারেন্ট ব্যাকগ্রাউন্ড */
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
        }

        .login-card h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo-container {
            position: absolute;
            top: 20px;
            left: 20px;
            padding: 10px;
        }

        .btn-login {
            width: 100%;
        }
    </style>
</head>
<body>

<?php
require_once('db_connection.php');
  session_start();
  
  if(isset($_SESSION["Login"])){
	  header("Location: admin/dashboard.php");
  }
  
    $error = "";
    $success = "";
    
    if (isset($_POST['submit'])) {
		
        $email = $_POST['email'];
        $password = $_POST['password'];
    
        if(empty($email)) {
            $error = 'Please fill in your email.';
        }
        else if(empty($password)) {
            $error = 'Please fill in your password.';
        }
        else if(strlen($password) < 8 || strlen($password) > 20) {
            $error = 'Password must be 8-20 characters long.';
        }
        else{
			
			$sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'"; 
			$result = mysqli_query($conn, $sql); 
			$user = mysqli_fetch_all($result, MYSQLI_ASSOC);
			foreach ($user as $user_data) {
				$_SESSION["Login_Status"] = "logged in";
				$_SESSION["id"] = $user_data['id'];
				$_SESSION["role"] = $user_data['role'];
				
				if($user_data['role'] == 'admin'){
					header("Location: admin/dashboard.php");
				}
				
				if($user_data['role'] == 'user'){
					header("Location: index.php");
				}
			}
			
		}
    }
    ?>
    <div class="bg-image">
        <div class="login-container">
		 <!-- Logo on the left --> 
            <div class="login-card">
                <!-- Login Form -->
                <h2>Sign In</h2>
                <form method='POST' action='login.php'>
                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" name='email' class="form-control" id="email" placeholder="Enter your email" required>
                    </div>
                    
                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name='password' class="form-control" id="password" placeholder="Enter your password" required>
                    </div>

                    <!-- Login Button -->
                    <button type="submit" name="submit" class="btn btn-primary btn-login">Log In</button>

                    <!-- Forgot password and Sign up links -->
                    <div class="text-center mt-3">
                        <a href="#">Forgot your password?</a><br>
                        <a href="#">Don't have an account? Sign up</a>
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
