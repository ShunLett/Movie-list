<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #1e3a8a; 
            color: #ffffff; 
        }
        .login-container {
            max-width: 400px;
            margin: 100px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2);
            color: #1e3a8a; 
        }
        .login-container h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .btn-primary {
            background-color: #1e3a8a;
            border-color: #1e3a8a;
        }
        .btn-primary:hover {
            background-color: #153e75;
            border-color: #153e75;
        }
    </style>
</head>
<body>
    <?php
    session_start();
    $message = null;

    if (isset($_POST['login'])) {
        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            $username = $_POST["username"];
            $password = $_POST["password"];

            if ($username == "adminslpo" && $password == "jimin13") {
                $_SESSION['isAuthenticated'] = true;
                header("Location: index.php");
                exit;
            } else {
                $message = "Incorrect username or password!";
            }
        } else {
            $message = "All fields are required!";
        }
    }
    ?>

    <div class="login-container">
        <h1>Login</h1>
        <form action="login.php" method="post">
            <?php if ($message): ?>
                <p style="color:red"><?php echo $message; ?></p>
            <?php endif; ?>
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control" />
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" />
            </div>
            <div class="d-grid">
                <input type="submit" name="login" value="Login" class="btn btn-primary" />
            </div>
        </form>
    </div>
</body>
</html>