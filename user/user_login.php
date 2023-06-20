<?php
include('../includes/connect.php');
include('../function/common_function.php');
@session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User - Login </title>
  <!-- bootstrap link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
  integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- css link -->
  <link rel="stylesheet" href="../style.css">
  <!-- font aesome link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" 
  integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    body {
      overflow-x: hidden;
    }
  </style>
</head>

<body>
  <!-- navbar -->
  <div class="container-fluid p-0">
    <!-- first child -->
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
      <div class="container-fluid">
        <img src="../img/logo.jpg" alt="" class="logo">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../display_all.php">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="user_registration.php">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../contact.php">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../cart.php"><i class="fa-sharp fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Total Price: <?php total_cart_price(); ?> VND</a>
            </li>
          </ul>
          <form class="d-flex" action="search_product.php" method="get">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
            <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
          </form>
        </div>
      </div>
    </nav>

    <!-- calling cart function -->
    <?php
    cart();
    ?>
    <div class="container-fluid my-3">
      <h2 class="text-center text-info mb-3">User Login</h2>
      <div class="row d-flex align-items-center justify-content-center mt-5">
        <div class="col-lg-12 col-xl-6">
          <form action="" method="post" enctype="multipart/form-data">
            <!-- user -->
            <div class="form-outline mb-4">
              <label for="user_username" class="form-label">Username</label>
              <input type="text" id="user_username" class="form-control" placeholder="Enter Your Username" autocomplete="off" required="required" name="user_username">
            </div>
            <!-- password -->
            <div class="form-outline mb-4">
              <label for="user_password" class="form-label">Password</label>
              <input type="password" id="user_password" class="form-control" placeholder="Enter Your Password" autocomplete="off" required="required" name="user_password">
            </div>


            <div class="mt-4 pt-2">
              <input type="submit" value="Login" class="bg-info py-2 px-3 border-0 fw-bold" name="user_login">
              <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account
                <a href="user_registration.php" class="text-danger">Register</a>
              </p>
            </div>
          </form>
        </div>
      </div>
    </div>
</body>

</html>
<?php
if (isset($_POST['user_login'])) {
  $user_username = $_POST['user_username'];
  $user_password = $_POST['user_password'];
  $user_ip = getIPAddress();
  $select_query = "Select * from `user_table` where username='$user_username'";
  $result = mysqli_query($con, $select_query);
  $row_count = mysqli_num_rows($result);
  $row_data = mysqli_fetch_assoc($result);

  // cart item
  $select_query_cart = "Select * from `cart_detail` where ip_address='$user_ip'";
  $select_cart = mysqli_query($con, $select_query_cart);
  $row_count_cart = mysqli_num_rows($select_cart);
  if ($row_count > 0) {
    if (password_verify($user_password, $row_data['user_password'])) {
      // echo "<script>alert('Login Successful')</script>";
      if ($row_count == 1 and $row_count_cart == 0) {
        $_SESSION['username'] = $user_username;
        echo "<script>alert('Login Successful')</script>";
        echo "<script>window.open('../index.php','_self')</script>";
      } else {
        $_SESSION['username'] = $user_username;
        echo "<script>alert('Login Successful')</script>";
        echo "<script>window.open('./payment.php','_self')</script>";
      }
    } else {
      echo "<script>alert('Invalid Credentials')</script>";
    }
  } else {
    echo "<script>alewrt('Invalid Credentials')</script>";
  }
}
?>