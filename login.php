<?php require_once 'header.php'; ?>

<?php

if (isset($_SESSION['user_id']) &&( $_SESSION['e_mail'] == true)){
  header('location:dashboard.php');
  die();
}

if(isset($_COOKIE['emailid'])){
   $emailid = $_COOKIE['emailid'];
  }else{
    $emailid = "";
  }

$emailErr = $passwordErr = $msgErr = "";
$email = $password ="";
$form_success = true;

if (empty($_POST["email"]) &&  empty($_POST["password"])){
  $emailErr = "Email is required";
  $$passwordErr = "password is required";
  $form_success = false;
} elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  $emailErr = "Invalid email format";
  $form_success = false;
}else{
  $email = test_input($_POST["email"]);
  $password = test_input($_POST["password"]);
  //checking if user exists in DB
  $password = md5($_POST["password"]);
  $check_user = "SELECT * FROM forms WHERE email='".$_POST['email']."' AND password ='".$password."'" or die(mysql_error());;
  if ($result = mysqli_query($conn, $check_user)) {
    if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result)){
      $_SESSION["user_id"]= $row['id'];
      $_SESSION["e_mail"]= $row['email'];
      $_SESSION["n_ame"]= $row['name'];
  
      if(isset($_REQUEST['rememberMe'])){
        setcookie('emailid',$_REQUEST['email'],time()+5);
      }
      header("location:dashboard.php");
    }
      }else{
        $msgErr="Email / Password does not exist";
           $form_success = false;
          }
      }
  }

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>

<nav class="navbar navbar-expand-lg navbar-inverse bg-warning ">
  <div class="container-fluid d-flex justify-content-around  ">
   <div class="navbar-header text-black  align-items-center ">
     <div class="col"> <a href="#">
        <img src="images/lotus.webp" alt="images/lotus.webp" width="170" height="100"> </a>
      </div>
    </div>

 <ul class="nav navbar-nav  justify-content-evenly w-75 align-items-center ">
   <li><a href="login.php" class="text-decoration-none text-black">LOGIN</a></li>
      <li><a href="index.php"class= "text-decoration-none text-black">NEW REGISTER</a></li>
        <li><a href="#"class= "text-decoration-none text-black"> COURSE</a></li>
          <li><a href="#"class= "text-decoration-none text-black">BLOG</a></li>

  </ul>
  <ul class="nav navbar-nav navbar-right p-1 justify-content-evenly w-25 align-items-center">
    <div class="ms-5 "> <a href="#">
    <img src="images/nav.png" alt="images/nav.png" width="60" height="40"> </a>
    </div>
  </ul>
  </div>
</nav>


<p class="fs-1 text-primary-emphasis  fst-italic text-center fw-bolder  ">We are The Lotus Team</p>


<div class ="container">
<form method = "POST" action = "#">
<div class="row ">
  <div class="col-sm-6">
   <p>Please login to your account</p>
   <span class="error "> <?php echo $msgErr;?></span> 
   
   <div class ="form-group">
   <input type="email" class="form-control border border-2  border-info mt-2" name="email"  style="width:280px" placeholder= "abcd@gmail.com"
   value= "<?php echo $emailid; ?>" required>
   </div>

   <div class ="form-group">
   <input type="password"  class="form-control sm-2 border-2 border-warning mt-2 " name="password" style="width:280px" maxlength="8" placeholder="Password"required>
   </div>

   <div class ="form-group ">
   <input type="checkbox" class="form-check-input border border-black"  name="rememberMe"  id="rememberMe">
   <lable for ="rememberMe">RememberMe </lable>
   </div>
   <div class=" form-group  mt-2">
   <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit">Log in</button>
   <a class="text-dark" href="#">Forgot password?</a>
   </div>

   <div class="d-flex align-items-center pb-2">
   <p class="mb-0 me-2">Don't have an account?</p>
   <a href="http://localhost/oct19/index.php"> <button type="button" class="btn btn-outline-danger" >Create new</button> </a>
   </div>
  </div>

  <div class="col-sm-6 ">
    <div class="text- dark px-3 py-4 text-primary-emphasis  fst-italic ">
    <h4 class="mb-4">We are more than just a company</h4>
    <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
  </div>
</div>
</form>
</div>


<?php require_once 'footer.php';?>