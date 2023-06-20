<?php
include('../includes/connect.php');
include('../function/common_function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
     integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" 
     crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css link -->
    <link rel="stylesheet" href="../style.css">
    <style>
        .admin_image
        {
            width: 100px;
            object-fit: contain;
        }
        .pro_img
        {
            width: 100px;
            object-fit: contain;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../img/logo.jpg" alt="" class="logo">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                    <li class="nav-item">
                    <a href="./index.php" class="nav-link">Welcome</a>
                    </li>
                    </ul>
                </nav>    
            </div>
        </nav>
        <!-- second child -->
        <div class="bg-light">
            <h3 class="text-center p-2">Manage Details</h3>
        </div>
        <!-- third child -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="p-4">
                    <a href="./index.php"><img src="../img/user1.jpg" alt="" class="admin_image"></a>
                    <p class="text-light text-center">Admin</p>
                </div>
                <!-- button*10 -->
                <div class="button text-center">
                    <button class="my-3"><a href="index.php?add_products" class="nav-link text-light bg-info my-1">Add Products</a></button>
                    <button><a href="index.php?view_products" class="nav-link text-light bg-info my-1">View Products</a></button>
                    <button><a href="index.php?add_categories" class="nav-link text-light bg-info my-1">Add Categories</a></button>
                    <button><a href="index.php?view_categories" class="nav-link text-light bg-info my-1">View Categories</a></button>
                    <button><a href="index.php?add_brand" class="nav-link text-light bg-info my-1">Add Brands</a></button>
                    <button><a href="index.php?view_brands" class="nav-link text-light bg-info my-1">View Brand</a></button>
                    <button><a href="#" class="nav-link text-light bg-info my-1">All Order</a></button>
                    <button><a href="#" class="nav-link text-light bg-info my-1">All Payment</a></button>
                    <button><a href="#" class="nav-link text-light bg-info my-1">List Customer</a></button>
                    <button><a href="admin_login.php" class="nav-link text-light bg-info my-1">Login</a></button>
                    <button><a href="ad_logout.php" class="nav-link text-light bg-info my-1">Logout</a></button>
                </div>
            </div>
        </div>
        <!-- fourth child -->
        <div class="container my-5">
            <?php
            if(isset($_GET['add_products']))
            {
                include ('add_products.php');
            }
            if(isset($_GET['add_categories']))
            {
                include ('add_categories.php');
            }
            if(isset($_GET['add_brand']))
            {
                include ('add_brand.php');
            }
            if(isset($_GET['view_products']))
            {
                include ('view_products.php');
            }
            if(isset($_GET['edit_products']))
            {
                include ('edit_products.php');
            }
            if(isset($_GET['delete_products']))
            {
                include ('delete_products.php');
            }
            if(isset($_GET['view_categories']))
            {
                include ('view_categories.php');
            }
            if(isset($_GET['view_brands']))
            {
                include ('view_brands.php');
            }
            if(isset($_GET['edit_categories']))
            {
                include ('edit_categories.php');
            }
            if(isset($_GET['edit_brand']))
            {
                include ('edit_brand.php');
            }
            if(isset($_GET['delete_categories']))
            {
                include ('delete_categories.php');
            }
            if(isset($_GET['delete_brand']))
            {
                include ('delete_brand.php');
            }
            ?>       
        </div>
        <?php include('../includes/footer.php'); ?>
    </div>
    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>