<?php
require_once "db.php";
session_start();

// Protect dashboard
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

$userId = $_SESSION['user_id'];
$query = "SELECT * FROM user_tbl WHERE id = $userId";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

// Handle Change Password Form
$changePassMsg = '';
if (isset($_POST['change_password'])) {
    $current = trim($_POST['current_password']);
    $new = trim($_POST['new_password']);
    $confirm = trim($_POST['confirm_password']);

    // 1️⃣ Verify current password
    if (password_verify($current, $row['password'])) {

        // 2️⃣ Check new password matches confirm
        if ($new === $confirm) {

            // 3️⃣ Hash new password
            $hashed = password_hash($new, PASSWORD_DEFAULT);

            // 4️⃣ Update in database
            $updateQuery = "UPDATE user_tbl SET password='$hashed' WHERE id=$userId";
            if (mysqli_query($conn, $updateQuery)) {
                $changePassMsg = '<div class="alert alert-success">Password updated successfully!</div>';
            } else {
                $changePassMsg = '<div class="alert alert-danger">Error updating password!</div>';
            }

        } else {
            $changePassMsg = '<div class="alert alert-warning">New password and confirm password do not match!</div>';
        }

    } else {
        $changePassMsg = '<div class="alert alert-danger">Current password is incorrect!</div>';
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HashJuday</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
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
        <h2>Change Password</h2>

        <div class="row">
            <div class="col-md-6">
                <div class="card mt-4">
                    <div class="card-body p-4">
                    <?php echo $changePassMsg; ?>
                        <form method="POST">
                            <div class="mb-3">
                                <label class="form-label">Current Password</label>
                                <input type="password" name="current_password" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">New Password</label>
                                <input type="password" name="new_password" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Confirm New Password</label>
                                <input type="password" name="confirm_password" class="form-control" required>
                            </div>

                            <button type="submit" name="change_password" class="btn btn-primary w-100">Update Password</button>
                        </form>
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