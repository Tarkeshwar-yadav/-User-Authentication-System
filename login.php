<?php
session_start(); // This is required to use $_SESSION

if (isset($_SESSION["user"])) {
    header("Location: index.php");
    exit(); // Best practice to stop further execution
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap Login Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="login.css">
  <style>
   
  </style>
</head>
<body>

  <div class="login-card">
<?php
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    require_once "database.php";

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if ($user) {
       if (password_verify($password, $user["password"])) {
    session_start();
    $_SESSION["user"] = $user["email"]; 
    header("Location: index.php");
    exit();
}
else {
            echo "<div class='alert alert-danger'>Password is incorrect</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Email does not match</div>";
    }
}
?>

    <h3>Welcome Back</h3>
    <form action="login.php" method="POST">
      <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
      </div>
      <div class="d-grid gap-2">
        <button type="submit" class="btn btn-custom" name="login">Login</button>
      </div>
    </form>
    
      <div>
        <p class="text-center text-muted mt-3">
      Don't have an account? <a href="registration.php">Sign up</a>
    </p>
     
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
