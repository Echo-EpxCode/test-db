<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HashJuday</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <style>
        /* Custom hover effects for sidebar links */
        .sidebar .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1); /* Slight white overlay on hover */
            border-radius: 5px; /* Rounded corners for better look */
            transition: background-color 0.3s ease; /* Smooth transition */
        }
        /* Optional: Hover effect for the card */
        .card:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Add shadow on hover */
            transition: box-shadow 0.3s ease;
        }

        .sidebar {
            width: 250px;
            min-height: 100vh;
        }
        .content {
            padding: 20px;
        }
    </style>
</head>

<body>

<div class="d-flex">
    <!-- Sidebar -->
    <div id="sidebar" class="bg-dark text-white sidebar p-3 collapse d-md-block">
        <h4 class="text-center mb-4">Dashboard</h4>
        <ul class="nav nav-pills flex-column">
            <li class="nav-item mb-2">
                <a href="dashboard.php" class="nav-link text-white">Account</a>
            </li>
            <li class="nav-item mb-2">
                <a href="changePwd.php" class="nav-link text-white">Change Password</a>
            </li>
            <li class="nav-item mt-4">
                <a href="logout.php" class="nav-link text-danger">Logout</a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="flex-grow-1 content" style="background: linear-gradient(#4facfe, #00f2fe); min-height: 100vh;">
        <button class="btn btn-dark mb-3 d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar" aria-expanded="false" aria-controls="sidebar">
            Menu
        </button>
        <h2>Welcome to HashJuday</h2>
        <p>Once you hash, you never crash.</p>

        <div class="row">
            <div class="col-md-6">
                <div class="card mt-4">
                    <div class="card-body p-4">
                        <!-- Profile Info Display -->
                        <h3 class="card-title">Profile Info</h3>
                        <p class="card-text"><strong>Full Name:</strong> <?php echo $_SESSION['user_name']; ?></p>
                        <p class="card-text"><strong>Email:</strong> <?php echo $_SESSION['user_email']; ?></p>
                        <p class="card-text"><strong>Registered On:</strong> <?php echo $_SESSION['date']; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6"></div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</body>

</html>