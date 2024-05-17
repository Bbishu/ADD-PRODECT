
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
<?php require_once 'footer.php';?>
