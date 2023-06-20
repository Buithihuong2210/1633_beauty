<?php 
if(isset($_GET['edit_products']))
{
    $edit_id=$_GET['edit_products'];
    // echo $edit_id;
    $get_data="Select * from `products` where product_id='$edit_id'";
    $result=mysqli_query($con,$get_data);
    $row=mysqli_fetch_assoc($result);
    $product_title=$row['product_title'];
    // echo $product_title;
    $product_description=$row['product_description'];
    $product_des_short=$row['product_des_short'];
    $product_keywords=$row['product_keywords'];
    $categories_id=$row['categories_id'];
    $brand_id=$row['brand_id'];
    $product_image1=$row['product_image1'];
    $product_image2=$row['product_image2'];
    $product_image3=$row['product_image3'];
    $product_price=$row['product_price'];
    $product_origin = $row['product_origin'];
    $product_expiration= $row['product_expiration'];
    $product_manufacture= $row['product_manufacture'];

    // fetching category name
    $select_category="Select * from `categories` where categories_id=$categories_id";
    $result_category=mysqli_query($con,$select_category);
    $row_category=mysqli_fetch_assoc($result_category);
    $categories_title=$row_category['categories_title'];
    // echo $categories_title;

    // fetching brand name
    $select_brand="Select * from `brands` where brand_id=$brand_id";
    $result_brand=mysqli_query($con,$select_brand);
    $row_brand=mysqli_fetch_assoc($result_brand);
    $brand_title=$row_brand['brand_title'];
    // echo $brand_title;
}   
?>
<div class="container mt-5">
    <h1 class="text-center">Edit Products</h1>
    <form action=""method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_title" class="form-label">Product Title</label>
            <input type="text" id="product_title" name="product_title" value="<?php echo $product_title ?>" class="form-control" required="required"></input>
        </div>
         <div class="form-outline w-50 m-auto mb-4">
            <label for="product_des_short" class="form-label">Product Description Short</label>
            <input type="text" id="product_des_short" name="product_des_short" value="<?php echo $product_des_short?>" class="form-control" required="required"></input>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_desc" class="form-label">Product Description</label>
            <input type="text" id="product_desc" name="product_desc" value="<?php echo $product_description ?>" class="form-control" required="required"></input>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_keywords" class="form-label">Product Keywords</label>
            <input type="text" id="product_keywords" name="product_keywords" value="<?php echo $product_keywords ?>" class="form-control" required="required"></input>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
        <label for="product_categories" class="form-label">Product Categories</label>
            <select name="product_categories" class="form-select">
                <option value="<?php echo $categories_title ?>"><?php echo $categories_title ?></option>
                <?php
                    $select_category_all="Select * from `categories`";
                    $result_category_all=mysqli_query($con,$select_category_all);
                  while($row_category_all=mysqli_fetch_assoc($result_category_all))
                  {
                    $categories_title=$row_category_all['categories_title'];
                    $categories_id=$row_category_all['categories_id'];
                    echo "<option value='$categories_id'>$categories_title</option>";
                  };  
                ?>
            </select>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
        <label for="product_brands" class="form-label">Product Brands</label>
            <select name="product_brands" class="form-select">
                <option value="<?php echo $brand_title ?>"><?php echo $brand_title ?></option>
                <?php
                    $select_brand_all="Select * from `brands`";
                    $result_brand_all=mysqli_query($con,$select_brand_all);
                  while($row_brand_all=mysqli_fetch_assoc($result_brand_all))
                  {
                    $brand_title=$row_brand_all['brand_title'];
                    $brand_id=$row_brand_all['brand_id'];
                    echo "<option value='$brand_id'>$brand_title</option>";
                  };  
                ?>
            </select>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image1" class="form-label">Product Image 1</label>
            <div class="d-flex"> 
            <input type="file" id="product_image1" name="product_image1" class="form-control w-90 m-auto" required="required"></input>
            <img src="./product_images/<?php echo $product_image1 ?>" alt="" class="pro_img">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image2" class="form-label">Product Image 2</label>
            <div class="d-flex">
            <input type="file" id="product_image2" name="product_image2" class="form-control w-90 m-auto" required="required"></input>
            <img src="./product_images/<?php echo $product_image2 ?>" alt="" class="pro_img">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image3" class="form-label">Product Image 3</label>
            <div class="d-flex">
            <input type="file" id="product_image3" name="product_image3" class="form-control w-90 m-auto" required="required"></input>
            <img src="./product_images/<?php echo $product_image3 ?>" alt="" class="pro_img">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_price" class="form-label">Product Price (VND)</label>
            <input type="number" id="product_price" name="product_price" value="<?php echo $product_price ?>" class="form-control" required="required"></input>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_origin" class="form-label">Origin</label>
            <input type="text" id="product_origin" name="product_origin" value="<?php echo $product_origin ?>" class="form-control" required="required"></input>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_expiration" class="form-label">Expiration</label>
            <input type="text" id="product_expiration" name="product_expiration" value="<?php echo $product_expiration ?>" class="form-control" required="required"></input>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_manufacture" class="form-label">Manufacture</label>
            <input type="text" id="product_manufacture" name="product_manufacture" value="<?php echo $product_manufacture ?>" class="form-control" required="required"></input>
        </div>
        <div class="w-50 m-auto">
            <input type="submit" name="edit_product" value="Update Product" class="btn btn-info px-3 mb-3">
        </div>
    </form>
</div>

<!-- update product -->
<?php
if(isset($_POST['edit_product']))
{
    $product_title=$_POST['product_title'];
    $product_desc=$_POST['product_desc'];
    $product_des_short=$_POST['product_des_short'];
    $product_keywords=$_POST['product_keywords'];
    $product_categories=$_POST['product_categories'];
    $product_brands=$_POST['product_brands'];
    $product_price=$_POST['product_price'];
    $product_origin=$_POST['product_origin'];
    $product_expiration=$_POST['product_expiration'];
    $product_manufacture=$_POST['product_manufacture'];

    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];

    $temp_product_image1=$_FILES['product_image1']['tmp_name'];
    $temp_product_image2=$_FILES['product_image2']['tmp_name'];
    $temp_product_image3=$_FILES['product_image3']['tmp_name'];

    // checking no file
    if($product_title=='' or $product_desc=='' or $product_des_short=='' or $product_keywords=='' 
    or $product_categories=='' or $product_brands='' or $product_image1=='' or $product_image2=='' or $product_image3==''
    or $product_price=='')
        {
            echo"<script>alert('Please fill all the fileds and continue the process')</script>";
        }else{
            move_uploaded_file($temp_product_image1,"./product_images/$product_image1");
            move_uploaded_file($temp_product_image2,"./product_images/$product_image2");
            move_uploaded_file($temp_product_image3,"./product_images/$product_image3");
            // query to update products
            $update_product="update `products` set product_title='$product_title', product_description='$product_desc',product_des_short='$product_des_short', product_keywords='$product_keywords',
             categories_id='$categories_id', brand_id='$brand_id', product_image1='$product_image1', product_image2='$product_image2',
              product_image3='$product_image3', product_price='$product_price',product_origin='$product_origin',product_expiration='$product_expiration',product_manufacture='$product_manufacture',
              date=NOW() where product_id=$edit_id";
              $result_update = mysqli_query($con,$update_product);
              if($result_update)
              {
                echo"<script>alert('Product updated successfully')</script>";
                echo"<script>window.open('./add_products.php','_self')</script>";
              }
        }
}
?>