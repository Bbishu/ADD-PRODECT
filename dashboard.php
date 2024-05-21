
<?php require_once 'header.php'; 



if (!isset($_SESSION['user_id']) &&( $_SESSION['e_mail'] != true)){
  header('location:login.php');
  die();}
  
?>


<nav class="navbar navbar-expand-lg navbar-inverse bg-warning ">
  <div class="container-fluid d-flex justify-content-around  ">
    <div class="navbar-header text-black  align-items-center mt-3">
     <div class="col"> <a href="#">
     <img src="images/lotus.webp" alt="images/lotus.webp" width="170" height="100"> </a>
     </div>
    </div>
 <ul class="nav navbar-nav  justify-content-evenly w-75 align-items-center ">
 <li><a href="profile.php"class= "text-decoration-none text-black">UPDATE PROFILE</a></li>
 <li><a href="prodect.php"class= "text-decoration-none text-black">ADD PRODECT</a></li>
 <li><a href="display.php"class= "text-decoration-none text-black">PRODECT LIST</a></li>
 </ul>
 
</div>
</nav>
<p class="fs-1 text-primary-emphasis  fst-italic text-center fw-bolder  ">HELLO! We are The Lotus Team</p>
<div class="text- dark px-3 py-4 text-primary-emphasis  fst-italic ">
    <h4 class="mb-4">We are more than just a company</h4>
    <p class="fs-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
<button type="button" class="btn "> <a href="logout.php">LOGOUT </a></button>
<section>
  <div class="container my-5 ">
    <header class="mb-4 fst-italic">
      <h2>New products</h2>
    </header>

    <div class="row">
        <?php
      
        $query="SELECT product.*, forms.name as user_name
        FROM product
        INNER JOIN forms ON product.user_id = forms.id";
        $result = $conn->query($query);
      
        while ($row = $result->fetch_assoc()) {
        ?>
      <div class="col-lg-3 col-md-6 col-sm-6 d-flex">
        <div class="card w-100 my-2 shadow-2-strong">
        <p class="card-text ms-1 fst-italic "> Vendor- <?php echo $row['user_name']; ?></p>
        <img src="<?php echo $row['image']; ?>" class="card-img-top" alt="<?php echo $row['image']; ?>"  style="width:230px;height:250px;">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title fst-italic"><?php echo $row['name']; ?></h5>
            <p class="card-text fst-italic"> Rs <?php echo $row['price']; ?></p>
            <div class="card-footer d-flex align-items-end pt-3 px-0 pb-0 mt-auto">
              <a href="#" class="btn btn-primary shadow-0 me-1 fst-italic">Add to cart</a>
              <a href="#" class="btn btn-warning shadow-0 me-1 ms-2 fst-italic">Buy Now</a>
            </div>
          </div>
        </div>
      </div>
      <?php
      }
  
      $conn->close();
      ?>
  </div>
 </div>
</section>
<?php require_once 'footer.php';?>
