<h1 class="text-center text-success">View Products</h1>
<table class="table table-bordered-mt-5">
    <thead class="bg-info">
        <tr class="text-center">
            <th>Product ID</th>
            <th>Product Title</th>
            <th>Product Image</th>
            <th>Product Price</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php 
        $get_products="Select * from `products`";
        $result=mysqli_query($con,$get_products);
        $number=0;
        while($row=mysqli_fetch_assoc($result))
        {
            $product_id=$row['product_id'];
            $product_title=$row['product_title'];
            // $product_description=$row['product_description'];
            $product_image1=$row['product_image1'];
            $product_price=$row['product_price'];
            $status=$row['status'];
            $number++;
            ?>
            <tr class='text-center'>
            <td><?php echo$number; ?></td>
            <td><?php echo$product_title; ?></td>
            <td><img src='./product_images/<?php echo $product_image1; ?>' class='pro_img'></td>
            <td><?php echo $product_price; ?> VND</td>
            <!-- <td>0</td> -->
            <td><?php echo $status; ?></td>
            <td><a href='index.php?edit_products=<?php echo $product_id ?>' class='text-light'><i class='fa-regular fa-pen-to-square'></i></a></td>
            <td><a href='index.php?delete_products=<?php echo $product_id ?>' class='text-light'
            type='button' class='text-light' data-bs-toggle='modal' data-bs-target='#exampleModal'>
            <i class='fa-solid fa-trash'></i></a></td>
        </tr>
        <?php
        }
        ?>
        
    </tbody>

</table>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-body">
        <h4>Are you sure want to delete this?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><a href="./index.php?view_products" class="text-light text-decoration-none">No</a></button>
        <button type="button" class="btn btn-primary"><a href="index.php?delete_products=<?php echo $product_id ?>" class="text-light text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>