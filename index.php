<?php
session_start(); // This is required to use $_SESSION

if (!isset($_SESSION["user"])) {
    header("Location: index.php");
    exit(); // Best practice to stop further execution
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>User Dashboard</title>

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .sidebar {
      height: 100vh;
      background: #343a40;
      color: white;
      padding-top: 20px;
    }
    .sidebar a {
      color: white;
      display: block;
      padding: 10px 20px;
      text-decoration: none;
    }
    .sidebar a:hover {
      background-color: #495057;
    }
    .content {
      padding: 20px;
    }
    .card {
      border-radius: 15px;
    }
  </style>
</head>
<body>
   
  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <nav class="col-md-3 col-lg-2 sidebar">
        <h4 class="text-center">Dashboard</h4>
        <a href="#">Home</a>
        <a href="#">Profile</a>
        <a href="#">Settings</a>
        <a href="#">Logout</a>
      </nav>

      <!-- Main Content -->
      <main class="col-md-9 ms-sm-auto col-lg-10 content">
        <h2>Welcome, User!</h2>
        <a href="logout.php" class="btn btn-warning">Logout</a>
        <p>This is your dashboard overview.</p>

        <div class="row">
          <div class="col-md-4 mb-3">
            <div class="card text-white bg-primary">
              <div class="card-body">
                <h5 class="card-title">Messages</h5>
                <p class="card-text">You have 3 new messages.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div class="card text-white bg-success">
              <div class="card-body">
                <h5 class="card-title">Tasks</h5>
                <p class="card-text">5 tasks pending.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div class="card text-white bg-warning">
              <div class="card-body">
                <h5 class="card-title">Notifications</h5>
                <p class="card-text">2 unread alerts.</p>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>