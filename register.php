<?php
require_once 'db.php';

if (isset($_POST['register'])) {

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // ✅ Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // ✅ Current date and time
    $created_at = date('Y-m-d H:i:s');

    // Insert into database including created_at
    $query = "INSERT INTO user_tbl 
              (Firstname, Lastname, email, password, created_at) 
              VALUES ('$fname', '$lname', '$email', '$hashedPassword', '$created_at')";

    $output = mysqli_query($conn, $query);

    if ($output) {
        header("Location: index.php");
        exit;
    }
}
?>

<!doctype html>
<html lang="en">

<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Judy App</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous"> 
<link rel="stylesheet" href="css/style.css">
</head>

<body style="background: linear-gradient(#4facfe, #00f2fe);min-height: 100vh;">
 
 <div class="container-fluid py-5 h-100">
  <div class="row d-flex justify-content-center align-items-center h-100">
   <div class="col-12 col-md-8 col-lg-6 col-xl-4">
    <div class="card bg-dark text-white">
     <div class="card-body p-5 text-center">
      <h2 class="fw-bold mb-2 text-uppercase">Register</h2>
      <p class="text-white-50 mb-5">Start your journey with HashJudy!</p>
      <form class="form" action="" method="post">
       <div class="form-outline mb-4">
        <input type="text" name="fname" placeholder="First Name" class="form-control form-control-lg" id="floatingInput"> </div>
       <div class="form-outline mb-4">
       <div class="form-outline mb-4">
        <input type="text" name="lname" placeholder="Last Name" class="form-control form-control-lg"> </div>
       <div class="form-outline mb-4">
       <div class="form-outline mb-4">
        <input type="email" name="email" placeholder="Email Address" class="form-control form-control-lg"> </div>
       <div class="form-outline mb-4">
        <input type="password" name="password" placeholder="Password" class="form-control form-control-lg"> </div>
       <div class="form-outline mb-4 d-grid gap-2">
        <button type="submit" class="btn btn-info" name="register">Register </button>
       </div>
       <div>
        <p class="mb-2"> Already have an account? <a class="text-white-50 fw-bold" href="index.php">Login Here</a></p>
       </div>
       <hr class="my-4"> </form>
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