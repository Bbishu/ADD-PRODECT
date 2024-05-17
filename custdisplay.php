
<?php require_once 'header.php'; ?>



<div class="logo bg-info ">
  <nav class="navbar navbar-expand-lg navbar-inverse  ">
    <div class="container-fluid d-flex justify-content-between ">
     <div class="navbar-header">
        <div classs=" image">
            <img src="images/click.avif" alt="images/click.avif" width="150" height="100">
            </div>
        </div>
    
    <ul class="nav navbar-nav  justify-content-between w-50 ">
      <li><a href="#" class="text-decoration-none text-black fs-5 fst-italic">HOME</a></li>
      <li><a href="#"class= "text-decoration-none text-black fs-5 fst-italic">ABOUT</a></li>
      <li><a href="#"class= "text-decoration-none text-black fs-5 fst-italic"> CATEGORIRS</a></li>
      <li><a href="#"class= "text-decoration-none text-black fs-5 fst-italic">SHOP</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right p-2 justify-content-evenly me-3">
        <div class="button ms-5 text-black">
            <button type="button" class="btn bg-white fst-italic "> <a href="#"> LOGOUT </a> </button>
             <a href="#"><img src="images/1170678.png" alt="images/1170678.pngp" width="40" height="40"> </a>
        </div>
    </ul>
    </div>
   </nav>
</div>
  


  <nav class="navbar navbar-expand-lg navbar-light bg-white">

    <div class="container justify-content-center justify-content-md-between fst-italic">

      <div class="collapse navbar-collapse" id="navbarLeftAlignExample">
     
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link text-dark" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="#">Categories</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="#">Hot offers</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="#">Gift boxes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="#">Projects</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="#">Menu item</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="#">Menu name</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="bg-warning text-white py-5 fst-italic">
    <div class="container py-5">
      <h1 class="text-dark">
        Best products & <br />
        brands in our store
      </h1>
      <h3 class="fw-semibold text-dark">
        Trendy Products, Factory Prices, Excellent Service
      </h3>
      <button type="button" class="btn btn-outline-light fst-italic text-dark">
        Learn more
      </button>
      <button type="button" class="btn btn-light shadow-0 text-primary pt-2 border border-white fst-italic">
        <span class="pt-1">Purchase now</span>
      </button>
    </div>
  </div>

</header>

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

<section class="mt-5" style="background-color: #f5f5f5;">
  <div class="container text-dark pt-3">
    <header class="pt-4 pb-3 fst-italic">
      <h3>Why choose us</h3>
    </header>

    <div class="row mb-4 fst-italic">
      <div class="col-lg-4 col-md-6 ">
        <figure class="d-flex align-items-center mb-4">
          <span class="rounded-circle bg-white p-3 d-flex me-2 mb-2">
          <i class="bi bi-webcam"></i>
          </span>
          <figcaption class="info">
            <h6 class="title">Reasonable prices</h6>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmor</p>
          </figcaption>
        </figure>
   
      </div>
     
      <div class="col-lg-4 col-md-6">
        <figure class="d-flex align-items-center mb-4">
          <span class="rounded-circle bg-white p-3 d-flex me-2 mb-2">
          <i class="bi bi-shield-fill-check"></i>
          </span>
          <figcaption class="info">
            <h6 class="title">Best quality</h6>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmor</p>
          </figcaption>
        </figure>
       
      </div>
   
      <div class="col-lg-4 col-md-6">
        <figure class="d-flex align-items-center mb-4">
          <span class="rounded-circle bg-white p-3 d-flex me-2 mb-2">
          <i class="bi bi-send-fill"></i>
          </span>
          <figcaption class="info">
            <h6 class="title">Worldwide shipping</h6>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmor</p>
          </figcaption>
        </figure>
       
      </div>
  
      <div class="col-lg-4 col-md-6">
        <figure class="d-flex align-items-center mb-4">
          <span class="rounded-circle bg-white p-3 d-flex me-2 mb-2">
          <i class="bi bi-universal-access"></i>
          </span>
          <figcaption class="info">
            <h6 class="title">Customer satisfaction</h6>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmor</p>
          </figcaption>
        </figure>
    
      </div>
    
      <div class="col-lg-4 col-md-6">
        <figure class="d-flex align-items-center mb-4">
          <span class="rounded-circle bg-white p-3 d-flex me-2 mb-2">
          <i class="bi bi-person-hearts"></i>
          </span>
          <figcaption class="info">
            <h6 class="title">Happy customers</h6>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmor</p>
          </figcaption>
        </figure>

      </div>
     
      <div class="col-lg-4 col-md-6">
        <figure class="d-flex align-items-center mb-4">
          <span class="rounded-circle bg-white p-3 d-flex me-2 mb-2">
          <i class="bi bi-person-hearts"></i>
          </span>
          <figcaption class="info">
            <h6 class="title">Thousand items</h6>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmor</p>
          </figcaption>
        </figure>
      
      </div>
     
    </div>
  </div>

</section>

<section class="mt-5 mb-4">
  <div class="container text-dark fst-italic">
    <header class="mb-4">
      <h3>Blog posts</h3>
    </header>

    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <article>
          <a href="#" class="img-fluid">
            <img class="rounded w-100" src="images/7318.jpg_wh1200.jpg" style="object-fit: cover;" height="160" />
          </a>
          <div class="mt-2 text-muted small d-block mb-1">
            <span>
              <i class="fa fa-calendar-alt fa-sm"></i>
              23.12.2022
            </span>
            <a href="#"><h6 class="text-dark">How to promote brands</h6></a>
            <p>When you enter into any new area of science, you almost reach</p>
          </div>
        </article>
      </div>
    
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <article>
          <a href="#" class="img-fluid">
            <img class="rounded w-100" src="images/sea-blue-board-the-ship-wallpaper-preview.jpg" style="object-fit: cover;" height="160" />
          </a>
          <div class="mt-2 text-muted small d-block mb-1">
            <span>
              <i class="fa fa-calendar-alt fa-sm"></i>
              13.12.2022
            </span>
            <a href="#"><h6 class="text-dark">How we handle shipping</h6></a>
            <p>When you enter into any new area of science, you almost reach</p>
          </div>
        </article>
      </div>
    
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <article>
          <a href="#" class="img-fluid">
            <img class="rounded w-100" src="images/ppp.jpg" style="object-fit: cover;" height="160" />
          </a>
          <div class="mt-2 text-muted small d-block mb-1">
            <span>
              <i class="fa fa-calendar-alt fa-sm"></i>
              25.11.2022
            </span>
            <a href="#"><h6 class="text-dark">How to promote brands</h6></a>
            <p>When you enter into any new area of science, you almost reach</p>
          </div>
        </article>
      </div>
   
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <article>
          <a href="#" class="img-fluid">
            <img class="rounded w-100" src="images/showing.avif" style="object-fit: cover;" height="160" />
          </a>
          <div class="mt-2 text-muted small d-block mb-1">
            <span>
              <i class="fa fa-calendar-alt fa-sm"></i>
              03.09.2022
            </span>
            <a href="#"><h6 class="text-dark">Success story of sellers</h6></a>
            <p>When you enter into any new area of science, you almost reach</p>
          </div>
        </article>
      </div>
    </div>
  </div>
</section>

<footer class="text-center text-lg-start text-muted mt-3" style="background-color: #f5f5f5;">
 
  <section class="">
    <div class="container text-center text-md-start pt-4 pb-4 fst-italic">
 
      <div class="row mt-3">
      
        <div class="col-12 col-lg-3 col-sm-12 mb-2">

          <a href="#" class="">
            <img src="images/click.avif" height="135" />
          </a>
          <p class="mt-2 text-dark">
            © 2023 Copyright: Click & Collect.com
          </p>
        </div>
       
        <div class="col-6 col-sm-4 col-lg-2">
          
          <h6 class="text-uppercase text-dark fw-bold mb-2">
            Store
          </h6>
          <ul class="list-unstyled mb-4">
            <li><a class="text-muted" href="#">About us</a></li>
            <li><a class="text-muted" href="#">Find store</a></li>
            <li><a class="text-muted" href="#">Categories</a></li>
            <li><a class="text-muted" href="#">Blogs</a></li>
          </ul>
        </div>
     
        <div class="col-6 col-sm-4 col-lg-2">
        
          <h6 class="text-uppercase text-dark fw-bold mb-2">
            Information
          </h6>
          <ul class="list-unstyled mb-4">
            <li><a class="text-muted" href="#">Help center</a></li>
            <li><a class="text-muted" href="#">Money refund</a></li>
            <li><a class="text-muted" href="#">Shipping info</a></li>
            <li><a class="text-muted" href="#">Refunds</a></li>
          </ul>
        </div>
        <div class="col-6 col-sm-4 col-lg-2">
     
          <h6 class="text-uppercase text-dark fw-bold mb-2">
            Support
          </h6>
          <ul class="list-unstyled mb-4">
            <li><a class="text-muted" href="#">Help center</a></li>
            <li><a class="text-muted" href="#">Documents</a></li>
            <li><a class="text-muted" href="#">Account restore</a></li>
            <li><a class="text-muted" href="#">My orders</a></li>
          </ul>
        </div>
      

   
        <div class="col-12 col-sm-12 col-lg-3">
      
          <h6 class="text-uppercase text-dark fw-bold mb-2">Newsletter</h6>
          <p class="text-muted">Stay in touch with latest updates about our products and offers</p>
          <div class="input-group mb-3">
            <input type="email" class="form-control border" placeholder="Email" aria-label="Email" aria-describedby="button-addon2" />
            <button class="btn btn-light border shadow-0" type="button" id="button-addon2" data-mdb-ripple-color="dark">
              Join
            </button>
          </div>
        </div>
     
      </div>

    </div>
  </section>


  <div class="">
    <div class="container">
      <div class="d-flex justify-content-between py-4 border-top">
       
        <div>
          <i class="fab fa-lg fa-cc-visa text-dark"></i>
          <i class="fab fa-lg fa-cc-amex text-dark"></i>
          <i class="fab fa-lg fa-cc-mastercard text-dark"></i>
          <i class="fab fa-lg fa-cc-paypal text-dark"></i>
        </div>

        <div class="dropdown dropup">
          <a class="dropdown-toggle text-dark" href="#" id="Dropdown" role="button" data-mdb-toggle="dropdown" aria-expanded="false"> <i class="flag-united-kingdom flag m-0 me-1"></i>English </a>

          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="Dropdown">
            <li>
              <a class="dropdown-item" href="#"><i class="flag-united-kingdom flag"></i>English <i class="fa fa-check text-success ms-2"></i></a>
            
          </ul>
        </div>
        
      </div>
    </div>
  </div>




<?php require_once 'footer.php';?>