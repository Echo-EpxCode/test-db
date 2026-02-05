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
 <title>HashJuday </title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous"> </head>
<link rel="stylesheet" href="css/style.css">
<body>

<div class="d-flex">

    <!-- Sidebar -->
    <div class="bg-dark text-white sidebar p-3">
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
    <div class="flex-grow-1 content">
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
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>
