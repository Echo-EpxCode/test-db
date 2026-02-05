<?php
require_once "db.php";
session_start();

if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    // 1️⃣ Check email only
    $query = "SELECT * FROM user_tbl WHERE email = '$email'";
    $output = mysqli_query($conn, $query);

    if (mysqli_num_rows($output) > 0) {

        $row = mysqli_fetch_assoc($output);

        // 2️⃣ Verify hashed password
        if (password_verify($password, $row['password'])) {

            // 3️⃣ Save session data
            $_SESSION['user_id']    = $row['id'];      // assuming id column
            $_SESSION['user_email'] = $row['email'];
            $_SESSION['user_name']  = $row['Firstname']." ".$row['Lastname'];
            $_SESSION['date'] = $row = $row['created_at'];

            header("Location: dashboard.php");
            exit;

        } else {
            echo "<script>alert('Wrong password!')</script>";
        }

    } else {
        echo "<script>alert('Email not registered!')</script>";
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
<link rel="stylesheet" href="css/style.css">
</head>

<body style="background: linear-gradient(#4facfe, #00f2fe);min-height: 100vh;">
 
 <div class="container-fluid py-5 h-100">
  <div class="row d-flex justify-content-center align-items-center h-100">
   <div class="col-12 col-md-8 col-lg-6 col-xl-4">
    <div class="card bg-dark text-white">
     <div class="card-body p-5 text-center">
   
      <h2 class="fw-bold mb-2 text-uppercase">LOGIN</h2>
      <p class="text-white-50 mb-5">Access your HashJudy account!</p>

      <form action="" method="post" class="form">

       <div class="form-outline mb-4">
        <input type="email" name="email" placeholder="Email Address" class="form-control form-control-lg"> </div>
        
       <div class="form-outline mb-4">
        <input type="password" name="password" placeholder="Password" class="form-control form-control-lg"> </div>

       <div class="form-outline mb-4 d-grid gap-2">
        <button type="submit" class="btn btn-info" name="login">Login </button>
       </div>

       <div>
        <p class="mb-2"> Don't have an account? <a class="text-white-50 fw-bold" href="register.php">Sign up</a></p>
       </div>

       <hr class="my-4">
    
    </form>
     </div>
    </div>
   </div>
  </div>
 </div>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>