<?php
session_start();

// Definisikan username dan password yang benar
$correct_username = "admin";
$correct_password = "admin";

$error_message = "";

// Proses form login jika tombol login ditekan
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Periksa apakah username dan password sesuai
    if ($username === $correct_username && $password === $correct_password) {
        // Set session jika login berhasil
        $_SESSION['loggedin'] = true;
        header("Location: admin.php"); // Redirect ke halaman admin
        exit();
    } else {
        // Set pesan error jika login gagal
        $error_message = "* username = admin , password = admin";
    }
}

// Cek apakah user sudah login
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("Location: admin.php"); // Redirect langsung ke halaman admin jika sudah login
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login Admin</title>
    <style>
        body {
            font-family: "Winky Sans", sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .login-container {
            background-color: #fff;
            padding: 30px;
            width: 350px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .login-container h2 {

            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        .form-group input[type="text"],
        .form-group input[type="password"] {
            width: calc(100% - 12px);
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-group button {
            background-color: #5cb85c;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .form-group button:hover {
            background-color: #4cae4c;
        }

        .error-message {
            color: red;
            margin-top: 10px;
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Winky+Sans:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
</head>

<body>
    <div class="login-container">
        <h2>Login Admin</h2>
        <img src="img/logo.png" alt="">
        <?php if ($error_message): ?>
            <p class="error-message">Username/Password salah</p>
        <?php endif; ?>
        <form method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <button type="submit" name="login">Login</button>
            </div>
        </form>
        <?php if ($error_message): ?>
            <p class="error-message"><?php echo $error_message; ?></p>
        <?php endif; ?>
    </div>
</body>

</html>