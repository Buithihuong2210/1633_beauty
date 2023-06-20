<!-- connect file -->
<?php
include('./includes/connect.php');
include('./function/common_function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Beauty Website</title>
  <!-- bootstrap link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- font aesome link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- css link -->
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <!-- navbar -->
  <div class="container-fluid p-0">
    <!-- first child -->
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
      <div class="container-fluid">
        <img src="img/logo.jpg" alt="" class="logo">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="display_all.php">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./user/user_registration.php">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="cart.php"><i class="fa-sharp fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
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
    <!-- second child -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Welcome Guest</a>
        </li>
        <?php
        if (!isset($_SESSION['username'])) {
          echo "<li class='nav-item'>
          <a class='nav-link' href='./user/user_login.php'>Login</a>
        </li>";
        } else {
          echo "<li class='nav-item'>
          <a class='nav-link' href='./user/logout.php'>Logout</a>
        </li>";
        }
        ?>
      </ul>
    </nav>
    <!-- thrid child -->
    <div class="bg-light">
      <h3 class="text-center">Beauty Cometics</h3>
      <p class="text-center">Communications is at the heart</p>
    </div>
    <!-- FOURTH child-table -->
    <div class="container">
      <div class="row">
        <form action="" method="post">
          <table class="table table-bordered text-center">

            <!-- php code -->
            <?php
            global $con;
            $get_ip_add = getIPAddress();
            $total_price = 0;
            $cart_query = "Select * from `cart_detail` where ip_address='$get_ip_add'";
            $result = mysqli_query($con, $cart_query);
            $result_count = mysqli_num_rows($result);
            if ($result_count > 0) {
              echo "<thead>
                  <tr>
                      <th>Product Name</th>
                      <th>Product Image</th>
                      <th>Quanlity</th>
                      <th>Total Price</th>
                      <th>Delete</th>
                      <th colspan='2'>Operations</th>
                  </tr>
              </thead>
              <tbody>";

              while ($row = mysqli_fetch_array($result)) {
                $product_id = $row['product_id'];
                $select_products = "Select * from `products` where product_id='$product_id'";
                $result_products = mysqli_query($con, $select_products);
                while ($row_product_price = mysqli_fetch_array($result_products)) {
                  $product_price = array($row_product_price['product_price']);
                  $price_table = $row_product_price['product_price'];
                  $product_title = $row_product_price['product_title'];
                  $product_image1 = $row_product_price['product_image1'];
                  $product_value = array_sum($product_price);
                  $total_price += $product_value;
            ?>
                  <tr>
                    <td><?php echo $product_title ?></td>
                    <td><img src="./img/<?php echo $product_image1 ?>" alt="" class="cart_img"></td>
                    <td><input type="number" name="qty" class="form-input w-50"></td>
                    <?php
                    $get_ip_add = getIPAddress();
                    if (isset($_POST['update_cart'])) {
                      $quantities = $_POST['qty'];
                      $update_cart = "update `cart_detail` set quanlity=$quantities where ip_address= '$get_ip_add'";
                      $result_products_quanlity = mysqli_query($con, $update_cart);
                      $total_price = $total_price * $quantities;
                    }
                    ?>
                    <td><?php echo $price_table; ?> VND</td>
                    <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
                    <td>
                      <input type="submit" value="Update Cart" name="update_cart" id="" class="bg-info px-2 py-2 border-0 mx-3 text-light">
                      <input type="submit" value="Remove Item" name="remove_cart" id="" class="bg-danger px-2 py-2 border-0 mx-3">
                    </td>
                  </tr>
            <?php
                }
              }
            } else {
              echo "<h2 class='text-center text-danger'>Cart is Emty</h2>";
            }
            ?>
            </tbody>
          </table>
          <!-- subtotal -->
          <div class="d-flex mb-5">
            <?php
            $get_ip_add = getIPAddress();
            $cart_query = "Select * from `cart_detail` where ip_address='$get_ip_add'";
            $result = mysqli_query($con, $cart_query);
            $result_count = mysqli_num_rows($result);
            if ($result_count > 0) {
              echo "<h4 class='px-3'>Subtotal: <strong class='text-info'> $total_price VND</strong></h4>
            <input type='submit' value='Continue Shopping' name='continue_shopping' class='bg-danger px-3 py-2 border-0 mx-3'>
            <button class='bg-info p-3 py-2 border-0 mx-3'><a href='./user/checkout.php' class='text-light text-decoration-none'>Checkout</a></button>";
            } else {
              echo "<input type='submit' value='Continue Shopping' name='continue_shopping' class='bg-info px-3 py-2 border-0 mx-3'>";
            }
            if (isset($_POST['continue_shopping'])) {
              echo "<script>window.open('index.php','_self')</script>";
            }
            ?>

          </div>
      </div>
    </div>
    </form>
    <!-- function remove item -->
    <?php
    function remove_cart_item()
    {
      global $con;
      if (isset($_POST['remove_cart'])) {
        foreach ($_POST['removeitem'] as $remove_id) {
          echo $remove_id;
          $delete_query = "Delete from `cart_detail` where product_id='$remove_id'";
          $run_delete = mysqli_query($con, $delete_query);
          if ($run_delete) {
            echo "<script>window.open('cart.php','_self')</script>";
          }
        }
      }
    }
    echo $remove_item = remove_cart_item();
    ?>
    <!-- inclue footer -->
    <?php include("./includes/footer.php") ?>
  </div>

  <!-- bootstrap js link -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>