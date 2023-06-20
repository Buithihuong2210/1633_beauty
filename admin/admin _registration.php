<?php
include('../includes/connect.php');
// include('../function/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Registration</title>
     <!-- bootstrap css link -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
     integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" 
    integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body
        {
            overflow: hidden;
        }
    </style>
</head>
<body>
    <div class="container-fluid m-3">
        <br>
<h2 class="text-center mb-5">Admin Registration</h2>
<div class="row d-flex justify-conten-center align-items-center">
    <div class="col-lg-6">
      <center> <img src="../img/Registration.jpg" alt="" class="img-fluid"> </center>
    </div>
    <div class="col-lg-4">
        <form action="" method="post">
            <div class="form-outline mb-4">
                <label for="admin_name" class="form-label">Username</label>
                <input type="text" id="admin_name" name="admin_name" placeholder="Enter your username" required="required" class="form-control">
            </div>
            <div class="form-outline mb-4">
                <label for="admin_email" class="form-label">Email</label>
                <input type="text" id="admin_email" name="admin_email" placeholder="Enter your email" required="required" class="form-control">
            </div>
            <div class="form-outline mb-4">
                <label for="admin_password" class="form-label">Password</label>
                <input type="password" id="admin_password" name="admin_password" placeholder="Enter your password" required="required" class="form-control">
            </div>
            <div class="form-outline mb-4">
                <label for="ad_confirm_password" class="form-label">Confirm Password</label>
                <input type="password" id="ad_confirm_password" name="ad_confirm_password" placeholder="Enter your Confirm password" required="required" class="form-control">
            </div>
            <div>
                <input type="submit" class="bg-info py-2 px-3 border-0" name="admin_registration" value="Register">
                <p class="small fw-bold mt-2 pt-1">Don't you have an account? <a href="admin_login.php" class="link-danger">Login</a></p>
            </div>
        </form>
    </div>

</div>
    </div>
</body>
</html>

<!-- php code -->
<?php
if(isset($_POST['admin_registration']))
{
$admin_name=$_POST['admin_name'];
$admin_email=$_POST['admin_email'];
$admin_password=$_POST['admin_password'];
$hash_password=password_hash($admin_password,PASSWORD_DEFAULT);
$ad_confirm_password=$_POST['ad_confirm_password'];
// // select query

$select_query="Select * from `admin_table` where admin_name='$admin_name' or admin_email='$admin_email'";
$result=mysqli_query($con,$select_query);
$rows_count=mysqli_num_rows($result);
if($rows_count>0)
{
    echo "<script>alert('Username and Email already exist')</script>";
}else if($admin_password!=$ad_confirm_password)
{
    echo "<script>alert('Password do not match')</script>";
}
else{
    $insert_query="insert into `admin_table` (admin_name,admin_email, admin_password) values('$admin_name','$admin_email','$hash_password')";
    $sql_execute=mysqli_query($con,$insert_query);
    echo "<script>alert('Register succesfull!!!')</script>";
    echo "<script>window.open('../admin/admin_login.php','_self')</script>";
}
} 
?>