<?php require_once 'header.php';?>
        <?php
          $id = $_SESSION['user_id'];
          $user_name = $_SESSION['n_ame'];
       
      $query = "SELECT * FROM product WHERE user_id = $id";
      $data = mysqli_query($conn, $query);
      $total = mysqli_num_rows($data);
         $productDetails = array(
       'name' => 'Sample Product',
       'price' => '$19.99',
       'description' => 'This is a sample product description.'
   );
   echo json_encode($productDetails);
        ?>
       <div id="product-container">
           <!-- Product details will be loaded here -->
       </div>
       <button id="load-product-btn">Load Product</button>
       <script src="script1.js"></script>
  
<?php require_once 'footer.php';?>