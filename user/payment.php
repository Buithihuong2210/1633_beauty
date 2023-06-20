<?php
include('../includes/connect.php');
include('../function/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>

    <div class="contanier">
        <br>
        <h2 class="text-center text-info">Payment Options</h2>
        <div class="row d-flex justify-content-center align-items-center my-5">
            <div class="col-md-6">
                <a href="http://www.paypal.com" target="_blank"><img src="../img/payment.jpg" alt="" style="width: 100%; margin-top: 5rem; margin-bottom:10rem;"></a>
            </div>
            <div class="col-md-6">
                <a href="#">
                    <h2 class="text-center">Payment Offline</h2>
                </a>
                
            </div>
            <div class="text-center">
            <a href="../index.php" class="text-decoration-none">
                    <h2 class="text-center btn btn-secondary">Homepage</h2>
                </a>
            </div>
            
        </div>
    </div>
</body>

</html>