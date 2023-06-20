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
  <link rel="stylesheet" href="contact.css">
</head>

<body>
  <!-- navbar -->
  <div class="container-fluid p-0">
    <!-- first child -->
    <?php include("./includes/first.php") ?>
    <!-- second child -->
    <?php include("./includes/second.php") ?>
    <!-- thrid child -->
    <?php include("./includes/third.php") ?>

    <!-- contact -->
    <div class="container">
      <div class="content">
        <div class="left-side">
          <div class="address details">
            <i class="fas fa-map-marker-alt"></i>
            <div class="topic">Address</div>
            <div class="text-one">1 Pham Van Dong</div>
            <div class="text-two">Ha Noi</div>
          </div>
          <div class="phone details">
            <i class="fas fa-phone-alt"></i>
            <div class="topic">Phone</div>
            <div class="text-one">0916435839</div>
            <div class="text-two">0834345678</div>
          </div>
          <div class="email details">
            <i class="fas fa-envelope"></i>5
            <div class="topic">Email</div>
            <div class="text-one">huongthubui2210@gmail.com</div>
            <div class="text-two">thaothanhhuong2210@gmail.com</div>
          </div>
        </div>
        <div class="right-side">
          <div class="topic-text">Send us a message</div>
          <br>
          <p>If you have any questions or need detailed product advice, you can send me a message from here. It is my pleasure to help you.</p>
          <br>
          <form action="#">
            <div class="input-box">
              <input type="text" placeholder="Enter your name">
            </div>
            <div class="input-box">
              <input type="text" placeholder="Enter your email">
            </div>
            <div class="input-box message-box">
            </div>
            <div class="button">
              <input type="button" value="Send Now">
            </div>
          </form>
        </div>
      </div>
    </div>
    <br>
    <!-- last child -->
    <!-- inclue footer -->
    <?php include("./includes/footer.php") ?>
  </div>
  <!-- bootstrap js link -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>