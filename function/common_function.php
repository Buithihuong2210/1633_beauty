<?php
// include connecting file
// include('./includes/connect.php');

//getting products
function getproducts()
{
    global $con;
    // condition to check isser or not
    if (!isset($_GET['categories'])) {
        if (!isset($_GET['brands'])) {
            $select_query = "Select * from `products` order by rand() LIMIT 0,9";
            $result_query = mysqli_query($con, $select_query);
            // echo $row['product_title'];
            while($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                // $product_keywords = $row['product_keywords'];
                $categories_id = $row['categories_id'];
                $brand_id = $row['brand_id'];
                $product_des_short= $row['product_des_short'];
                echo "<div class='col-md-4 mb-2'>
        <div class='card' style='width: 18rem;'>
                  <img src='./admin/product_images/$product_image1' class='card-img-top' alt='...'>
                  <div class='card-body'>
                      <h5 class='card-title'>$product_title</h5>
                      <p class='card-text'>$product_des_short</p>
                      <p class='card-text text-danger'> <a class='bg-danger text-light text-decoration-none'>Price:</a>  $product_price VND</p>
                      <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                      <a href='product_detail.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                  </div>
        </div>
       </div>";
            }
        }
    }
}

// getting all products
function get_all_products()
{
    global $con;
    // condition to check isser or not
    if (!isset($_GET['categories'])) {
        if (!isset($_GET['brands'])) {

            $select_query = "Select * from `products` order by rand() LIMIT 0,20";
            $result_query = mysqli_query($con, $select_query);
            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                // $product_keywords = $row['product_keywords'];
                $categories_id = $row['categories_id'];
                $brand_id = $row['brand_id'];
                $product_des_short= $row['product_des_short'];
                // $product_image2 = $row['product_image2'];
                // $product_image3 = $row['product_image3'];
                echo "<div class='col-md-3 mb-2'>
        <div class='card' style='width: 18rem;'>
                  <img src='./admin/product_images/$product_image1' class='card-img-top' alt='...'>
                  <div class='card-body'>
                      <h5 class='card-title'>$product_title</h5>
                      <p class='card-text'>$product_des_short</p>
                      <p class='card-text text-danger'> <a class='bg-danger text-light text-decoration-none'>Price:</a> $product_price VND</p>
                      <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                      <a href='product_detail.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                  </div>
        </div>
       </div>";
            }
        }
    }
}


// getting unique categories
function get_unique_categories()
{
    global $con;
    // condition to check isser or not
    if (isset($_GET['categories'])) {
        $categories_id = $_GET['categories'];
        $select_query = "Select * from `products` where categories_id=$categories_id";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows == 0) {
            echo "<h2 class='text-center text-danger'>No stock for this category</h2>";
        }

        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $categories_id = $row['categories_id'];
            $brand_id = $row['brand_id'];
            $product_des_short= $row['product_des_short'];
            echo "<div class='col-md-4 mb-2'>
        <div class='card' style='width: 18rem;'>
                  <img src='./admin/product_images/$product_image1' class='card-img-top' alt='...'>
                  <div class='card-body'>
                      <h5 class='card-title'>$product_title</h5>
                      <p class='card-text'>$product_des_short</p>
                      <p class='card-text text-danger'> <a class='bg-danger text-light text-decoration-none'>Price:</a>  $product_price VND</p>
                      <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                      <a href='product_detail.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                  </div>
        </div>
       </div>";
        }
    }
}

// getting unique brand
function get_unique_brands()
{
    global $con;
    // condition to check isser or not
    if (isset($_GET['brands'])) {
        $brand_id = $_GET['brands'];
        $select_query = "Select * from `products` where brand_id=$brand_id";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows == 0) {
            echo "<h2 class='text-center text-danger'>No stock for this brand</h2>";
        }
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $categories_id = $row['categories_id'];
            $brand_id = $row['brand_id'];
            $product_des_short= $row['product_des_short'];
            echo "<div class='col-md-4 mb-2'>
        <div class='card' style='width: 18rem;'>
                  <img src='./admin/product_images/$product_image1' class='card-img-top' alt='...'>
                  <div class='card-body'>
                      <h5 class='card-title'>$product_title</h5>
                      <p class='card-text'>$product_des_short</p>
                      <p class='card-text text-danger'> <a class='bg-danger text-light text-decoration-none'>Price:</a>  $product_price VND</p>
                      <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                      <a href='product_detail.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                  </div>
        </div>
       </div>";
        }
    }
}

// display brand in sidenav
function getbrands()
{
    global $con;
    $select_brands = "Select *from `brands`";
    $result_brands = mysqli_query($con, $select_brands);

    while ($row_data = mysqli_fetch_assoc($result_brands)) {
        $brand_title = $row_data['brand_title'];
        $brand_id = $row_data['brand_id'];
        echo " <li class='nav-item'> <a href='index.php?brands= $brand_id' class='nav-link text-light'>$brand_title</a></li>";
    }
}

// display categories in sidenav
function getcategories()
{
    global $con;
    $select_categories = "Select *from `categories`";
    $result_categories = mysqli_query($con, $select_categories);

    while ($row_data = mysqli_fetch_assoc($result_categories)) {
        $categories_title = $row_data['categories_title'];
        $categories_id = $row_data['categories_id'];
        echo " <li class='nav-item'> <a href='index.php?categories= $categories_id' class='nav-link text-light'>$categories_title</a></li>";
    }
}

// search products
function search_product()
{
    global $con;
    if (isset($_GET['search_data_product'])) {
        $search_data_value = $_GET['search_data'];
        $search_query = "Select * from `products` where product_title like '%$search_data_value%'";
        $result_query = mysqli_query($con, $search_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows == 0) {
            echo "<h2 class='text-center text-danger'>No result match. No products found on this category!</h2>";
        }
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $categories_id = $row['categories_id'];
            $brand_id = $row['brand_id'];
            $product_des_short= $row['product_des_short'];
            echo "<div class='col-md-4 mb-2'>
        <div class='card' style='width: 18rem;'>
                  <img src='./admin/product_images/$product_image1' class='card-img-top' alt='...'>
                  <div class='card-body'>
                      <h5 class='card-title'>$product_title</h5>
                      <p class='card-text'>$product_des_short</p>
                      <p class='card-text'>Price: $product_price VND</p>
                      <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                      <a href='product_detail.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                  </div>
        </div>
       </div>";
        }
    }
}

//  view detail function
function view_details()
{
    global $con;
    // condition to check isser or not
    if (isset($_GET['product_id'])) {
        if (!isset($_GET['categories'])) {
            if (!isset($_GET['brands'])) {
                $product_id = $_GET['product_id'];
                $select_query = "Select * from `products`  where product_id=$product_id";
                $result_query = mysqli_query($con, $select_query);
                while ($row = mysqli_fetch_assoc($result_query)) {
                    $product_id = $row['product_id'];
                    $product_title = $row['product_title'];
                    $product_description = $row['product_description'];
                    $product_keywords = $row['product_keywords'];
                    $product_image1 = $row['product_image1'];
                    $product_price = $row['product_price'];
                    $product_image2 = $row['product_image2'];
                    $product_image3 = $row['product_image3'];
                    $product_origin = $row['product_origin'];
                    $product_expiration = $row['product_expiration'];
                    $product_manufacture = $row['product_manufacture'];
                    $categories_id = $row['categories_id'];
                    $brand_id = $row['brand_id'];
                    $status = $row['status'];
                    echo "<div class='col-md-4 mb-2'>
        <div class='card' style='width: 18rem;'>
                  <img src='./admin/product_images/$product_image1' class='card-img-top' alt='...'>
                  <div class='card-body'>
                      <h5 class='card-title'>$product_title</h5>
                      <br>
                      <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                      <a href='index.php' class='btn btn-secondary'>Go Home</a>
                  </div>
        </div>
       </div>
       <div class='col-md-8'>
            <div class='row'>
                <div class='col-md-12'>   
                <br>
                <br>
                <br>
                    <h4 class='text-center text-info mb-5'>Related Product</h4>
                </div>
                <div class='col-md-6'>
                <br>
                <img src='./admin/product_images/$product_image2' class='card-img-top' alt='$product_title'>
                </div>
                <div class='col-md-6'>
                <img src='./admin/product_images/$product_image3' class='card-img-top' alt='$product_title'>
                </div>
            </div>
        </div>
        
        <div class='col-lg-12 col-md-12 col-sm-12'>
        <br>
        <br>
                        <h3 class='box-title mt-5 text-info mb-5'>General Info</h3>
                        
                        <div class='table-responsive'>
                            <table class='table table-striped table-product'>
                                <tbody>
                                <tr>
                                    <td width='390' class='fw-bold'>Price</td>
                                    <td>$product_price VND</td>
                                </tr>
                                
                                <tr>
                                    <td width='390' class='fw-bold'>Description</td>
                                    <td>$product_description</td>
                                </tr>
                                
                                <tr>
                                    <td width='390' class='fw-bold'>Origin</td>
                                    <td>$product_origin</td>
                                </tr>
                                
                                <tr>
                                    <td width='390' class='fw-bold'>Expiration</td>
                                    <td>$product_expiration</td>
                                </tr>
                                
                                <tr>
                                    <td width='390' class='fw-bold'>Manufacture	</td>
                                    <td>$product_manufacture</td>
                                </tr>
                                
                                <tr>
                                    <td class='fw-bold'>Status</td>
                                    <td>$status</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>";
                }
            }
        }
    }
}

// get ip address function
function getIPAddress()
{

    //whether ip is from the share internet  
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    //whether ip is from the remote address  
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

// cart function
function cart()
{
    if (isset($_GET['add_to_cart'])) {
        global $con;
        $get_ip_add = getIPAddress();
        $get_product_id = $_GET['add_to_cart'];

        $select_query = "Select * from `cart_detail` where ip_address='$get_ip_add' and product_id ='$get_product_id'";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows > 0) {
            echo "<script>alert('This item is already present inside cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        } else {
            $inset_query = "insert into `cart_detail`(product_id,ip_address,quanlity) values($get_product_id,'$get_ip_add',0)";
            $result_query = mysqli_query($con, $inset_query);
            echo "<script>alert('This item is already present inside cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
}

// function to get cart item number
function cart_item()
{
    if (isset($_GET['add_to_cart'])) {
        global $con;
        $get_ip_add = getIPAddress();

        $select_query = "Select * from `cart_detail` where ip_address='$get_ip_add'";
        $result_query = mysqli_query($con, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);
    } else {
        global $con;
        $get_ip_add = getIPAddress();

        $select_query = "Select * from `cart_detail` where ip_address='$get_ip_add'";
        $result_query = mysqli_query($con, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);
    }
    echo $count_cart_items;
}

// total price
function total_cart_price()
{
    global $con;
    $get_ip_add = getIPAddress();
    $total_price = 0;
    $cart_query = "Select * from `cart_detail` where ip_address='$get_ip_add'";
    $result = mysqli_query($con, $cart_query);
    while ($row = mysqli_fetch_array($result)) {
        $product_id = $row['product_id'];
        $select_products = "Select * from `products` where product_id='$product_id'";
        $result_products = mysqli_query($con, $select_products);
        while ($row_product_price = mysqli_fetch_array($result_products)) {
            $product_price = array($row_product_price['product_price']);
            $product_value = array_sum($product_price);
            $total_price += $product_value;
        }
    }
    echo $total_price;
}
