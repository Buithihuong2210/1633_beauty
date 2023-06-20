<?php
// include('../includes/connect.php');
if(isset($_POST['insert_product']))
{
    $product_title = $_POST['product_title'];
    $description = $_POST['description'];
    $product_des_short = $_POST['product_des_short'];
    $keywords = $_POST['keywords'];
    $product_categories = $_POST['product_categories'];
    $product_brands = $_POST['product_brands'];
    $product_price = $_POST['product_price'];
    $product_origin = $_POST['product_origin'];
    $product_expiration= $_POST['product_expiration'];
    $product_manufacture= $_POST['product_manufacture'];
    $product_status='true';
    // access img
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2= $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];
    // access imge tmp name
    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2= $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];

    // check empty condition
    if($product_title=='' or $description=='' or $product_des_shortor=='' or $keywords=='' or $product_categories=='' 
    or $product_brands=='' or $product_price=='' or $product_image1=='' or $product_image2== '' or $product_image3==''
    or $product_origin=='' or $product_expiration=='' or $product_manufacture=='')
    {
        echo "<script>alert('Please fill all the availabe fields')</script>";
        exit();
    }else{
        move_uploaded_file($temp_image1,"./product_images/$product_image1");
        move_uploaded_file($temp_image2,"./product_images/$product_image2");
        move_uploaded_file($temp_image3,"./product_images/$product_image3");
        
        // insert query
        $insert_products = "insert into `products`(product_title, product_description, product_des_short, product_keywords, categories_id,
         brand_id, product_image1, product_image2, product_image3, product_price, product_origin, product_expiration, product_manufacture, date, status)
        values('$product_title','$description', '$product_des_short', '$keywords','$product_categories', '$product_brands','$product_image1', '$product_image2', 
        '$product_image3','$product_price','$product_origin','$product_expiration','$product_manufacture',NOW(),'$product_status')";
        $result_query=mysqli_query($con,$insert_products);
        if ($result_query){
            echo "<script>alert('Successfully add the products')</script>";
            echo "<script>window.open('./index.php?view_products','_self')</script>";
        }
    }
}
?>
<!--  -->
    <div class="container mt-3">
        <h1 class="text-center">Add Products</h1>
    
    <!-- form -->
    <form action="" method="post" enctype="multipart/form-data">
        <!-- title -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_title" class="form-lable">Product Title</label>
            <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter product title" autocapitalize="off" required="required">
        </div>
        <!-- short description -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_des_short" class="form-lable">Short Description</label>
            <input type="text" name="product_des_short" id="product_des_short" class="form-control" placeholder="Enter product short description" autocapitalize="off" required="required">
        </div>
        <!-- description -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="description" class="form-lable">Description</label>
            <input type="text" name="description" id="description" class="form-control" placeholder="Enter product description" autocapitalize="off" required="required">
        </div>
        <!-- keywords -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_keywords" class="form-lable">Keywords</label>
            <input type="text" name="keywords" id="keywords" class="form-control" placeholder="Enter product keywords" autocapitalize="off" required="required">
        </div>
        <!-- categories -->
        <div class="form-outline mb-4 w-50 m-auto">
        <select name="product_categories" id="" class="form-select">
            <option value="">Select a Category</option>
            <?php
                $select_query="Select *from `categories`";
                $result_query=mysqli_query($con, $select_query);
                while($row=mysqli_fetch_assoc($result_query))
                {
                    $categories_title=$row['categories_title'];
                    $categories_id=$row['categories_id'];
                    echo "<option value='$categories_id'>$categories_title</option>";
                }
            ?>
        </select>
        </div>
        <!-- brands -->
        <div class="form-outline mb-4 w-50 m-auto">
        <select name="product_brands" id="" class="form-select">
            <option value="">Select a Brand</option>
            <?php
                $select_query="Select *from `brands`";
                $result_query=mysqli_query($con, $select_query);
                while($row=mysqli_fetch_assoc($result_query))
                {
                    $brand_title=$row['brand_title'];
                    $brand_id=$row['brand_id'];
                    echo "<option value='$brand_id'>$brand_title</option>";
                }
            ?>
        </select>
        </div>
        <!-- img1 -->
        <div class="form-outline mb-4 w-50 m-auto">
        <label for="product_image1" class="form-lable">Product Image 1</label>
        <input type="file" name="product_image1" id="product_image1" class="form-control" required="required">
        </div>
        <!-- img2 -->
        <div class="form-outline mb-4 w-50 m-auto">
        <label for="product_image2" class="form-lable">Product Image 2</label>
        <input type="file" name="product_image2" id="product_image2" class="form-control" required="required">
        </div>
        <!-- img3 -->
        <div class="form-outline mb-4 w-50 m-auto">
        <label for="product_image3" class="form-lable">Product Image 3</label>
        <input type="file" name="product_image3" id="product_image3" class="form-control" required="required">
        </div>
        <!-- price -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_price" class="form-lable">Product Price (VND)</label>
            <input type="number" name="product_price" id="product_price" class="form-control" placeholder="Enter product price" autocapitalize="off" required="required">  
        </div>
        <!-- origin -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_origin" class="form-lable">Product Origin</label>
            <input type="text" name="product_origin" id="product_origin" class="form-control" placeholder="Enter product origin" autocapitalize="off" required="required">  
        </div>
        <!-- expiration -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_expiration" class="form-lable">Product Expiration</label>
            <input type="text" name="product_expiration" id="product_expiration" class="form-control" placeholder="Enter product expiration" autocapitalize="off" required="required">  
        </div>
        <!-- manufacture -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_manufacture" class="form-lable">Product Manufacture</label>
            <input type="text" name="product_manufacture" id="product_manufacture" class="form-control" placeholder="Enter product manufacture" autocapitalize="off" required="required">  
        </div>
        <!--  -->
        <div class="form-outline mb-4 w-50 m-auto">
            <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Add Products">
        </div>
    </form>
    </div>