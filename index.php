<?php require_once 'header.php';?>

<?php

$nameErr= $emailErr = $fileErr = $phoneErr = $genderErr = $stateErr = $deviceErr = $passwordErr = $cpasswordErr = $checkedErr="";
$name = $email= $file =  $phone = $gender = $state = $device= $password = $cpassword = $checked="";
$form_success = true;
$fileErr="";


if ($_SERVER["REQUEST_METHOD"] == "POST"){
  if (empty($_POST["name"])){
       $nameErr = "*Your name is required";
       $form_success = false;
  } else {
       $name = test_input($_POST["name"]);
  }
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
    $form_success = false;
  } elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
      $form_success = false;
  }else{
      $email = test_input($_POST["email"]);
      //checking if user exists in DB
      $check_user = "SELECT * FROM forms WHERE email='".$_POST['email']."' ";
      if ($res = mysqli_query($conn, $check_user)) {
          if(mysqli_num_rows($res)>0){
              $emailErr = "Email already in use, please use different email.";
              $form_success = false;
        }
    }
  }

 if (empty($_POST["phone"])){
    $phoneErr= "*mobile number is required";
    $form_success = false;
 } else {
    $phone = test_input($_POST["phone"]);
 }

 if (empty($_POST["gender"])){
  $genderErr = "*gender is required";
  $form_success = false;
 } else {
  $gender = test_input($_POST["gender"]);
 }

 if (empty($_POST["state"])){
  $stateErr = " *state name is required";
  $form_success = false;
 }else{
  $state = test_input($_POST["state"]);
 }
  if (empty($_POST["device"])) {
    $deviceErr = "Device is required";
    $form_success = false;  
  } else {
    $device = test_input($_POST["device"]);
  }

  if (isset($_POST["password"]) && empty($_POST["password"])) {
    $passwordErr = "*Password is required";
    $form_success = false;
  } else {
    $password = test_input($_POST["password"]);
  }
  if (isset($_POST["cpassword"]) && empty($_POST["cpassword"])) {
    $cpasswordErr = "*Confirm Password is required";
    $form_success = false;
  } else {
    $cpassword = test_input($_POST["cpassword"]);
  }
  if($_POST["password"] != $_POST["cpassword"]){
    echo "*Your passwords did not match";
    exit();
  }
  if (empty($_FILES["file"]["name"])) {
    $fileErr = "Profile pic is required";
    $form_success = false;
   } elseif($form_success) {
    $target_dir = "imgfolder/";
    $image_name = time() . '-' . basename($_FILES["file"]["name"]);
    $target_file = $target_dir . $image_name;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        $file= $target_file;
    } else {
        $fileErr = "ERROR UPLOADING FILE";
        $form_success = false;
    }
      $myhash = md5("$password");
      $sql = "INSERT INTO forms(name,email,file,phone,gender,state,device,password) 
      VALUE ('{$name}','{$email}','{$file}','{$phone}','{$gender}','{$state}','{$device}','{$myhash }')";
      if (mysqli_query($conn, $sql)) {
          header("location:login.php");
      } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
      mysqli_close($conn);
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
  
             <div class="navbar-header text-black  align-items-center mt-3">
             <div class="col"> <a href="#">
                         <img src="images/lotus.webp" alt="images/lotus.webp" width="170" height="100"> </a>
                      </div>
             </div>
    
                  <ul class="nav navbar-nav  justify-content-evenly w-50 align-items-center ">
                  
                      <li class="active">
                    
                        <a href="#" class="text-decoration-none text-black">HOME</a></li>
                          <li><a href="#"class= "text-decoration-none text-black">ABOUTT</a></li>
                            <li><a href="#"class= "text-decoration-none text-black"> COURSE</a></li>
                              <li><a href="#"class= "text-decoration-none text-black">BLOG</a></li>

                                  

                  </ul>
                      <ul class="nav navbar-nav navbar-right p-1 justify-content-evenly w-25 align-items-center">
                          <div class="button text-black bg-white ">
                             <button type="button" class="btn "><a href="login.php">LOGIN </a></button>
                          </div>
                            <div class="ms-5 "> <a href="#">
                               <img src="images/menu (1).png" alt="images/menu (1).png" width="60" height="40"> </a>
                            </div>
                          
                      </ul>
          </div>
   </nav>


<p class="fs-1 text-primary-emphasis  fst-italic text-center fw-bolder  ">Signup Form</p>

<form method="POST" action="#"  enctype="multipart/form-data">
 <div class="container-fluid d-flex justify-content-around ">
   <div class="form">
    <div class="form-group mb-2"> 
      <label for="validationCustom01" class="form-label text-dark fw-bolder mt-2 ">Name*</label> 
      <?php if(!empty($nameErr)){?>
      <span class="error "> <?php echo $nameErr;?></span> 
      <?php }?>
      <input type="text" class="form-control border border-2  border-info" name="name"  style="width:370px" placeholder= "Name"  value = "<?php echo $name?>" >
    </div>

    <div class="form-group">
      <label for="validationCustomUsername" class="form-label text-dark fw-bolder ">Email*</label> 
      <?php if(!empty($emailErr)){?>
      <span class="error "> <?php echo $emailErr;?></span> 
      <?php }?>
      <input type="email" class="form-control border border-2  border-info" name="email"  style="width:370px" placeholder= "abcd@gmail.com"  value = "<?php echo $email?>" >
    </div>

    <div class="form_group mt-3">
      <lable for ="file" class= "form-label text-dark fw-bolder"> Select profile photo:*</label> <br>
      <?php if(!empty($fileErr)){?>
      <span class = "error"> <?php echo $fileErr;?></span>
      <?php }?>
      <input type="file" class="form-control  border border-2 border-info" style= "width:370px" value="<?php echo $file;?>" id = "file" name="file" >
    </div>

    <div class="form_group">
      <label for="phone" class="form-label text-dark fw-bolder mt-2" > Phone number:*</label>
      <?php if(!empty($phoneErr)){?>
      <span class="error "> <?php echo $phoneErr;?></span>
      <?php }?>
      <input type="tel" class="form-control border border-2  border-info"  name="phone" style="width:370px" pattern="[0-9]{3}-[0-9]{4}-[0-9]{3}"  placeholder="123-1234-123" value = "<?php echo $phone?>" >
    </div>

    <div class="form-group">
        <label for="gender" class="fw-bolder text-darkmt-2"> Gender:*</label>
        <?php if(!empty($genderErr)){?>
        <span class="error"> <?php echo $genderErr;?></span>
        <?php }?>
        <input type="radio" name="gender" value="female" <?php if($gender == 'female'){ echo 'checked';} ?> required>
        <label for="female" class="fw-bolder text-dark mt-2" >Female</label>
        <input type="radio" name="gender"  value="male" <?php if($gender == 'male'){ echo 'checked';} ?>required>
        <label for="male" class="fw-bolder text-dark mt-2" > Male </label>
        <input type="radio" name="gender"value="other" <?php if($gender == 'other'){ echo 'checked';} ?>required> 
        <label for="other" class="fw-bolder text-dark mt-2">Other</label>
    </div> 

    <div class="form-group">
        <label for="state" class="fw-bolder text-dark mt-2">State:*</label>
        <?php if(!empty($stateErr)){?>
        <span class="error"> <?php echo $stateErr;?></span>
        <?php }?>
        <select  class="form-control border-2 border-info "  name="state" style="width:370px" required >
          <option value="NONE" <?php if($state == 'NONE'){ echo 'checked';}?>> None </option>
          <option value="HP" <?php if($state == 'HP'){ echo 'checked';}?>>Himachal Pradesh </option>
          <option value="DL" <?php if($state == 'DL'){ echo 'checked';}?>>Delhi </option>
          <option value="HR"  <?php if($state == 'HR'){ echo 'checked';}?>>Haryana </option>
          <option value="PB"  <?php if($state == 'PB'){ echo 'checked';}?>>Punjab </option>
          <option value="LK" <?php if($state == 'LK'){ echo 'checked';}?>>Ladakh </option>
          <option value="OD" <?php if($state == 'OD'){ echo 'checked';}?>>Odisha </option>
          <option value="UP" <?php if($state == 'UP'){ echo 'checked';}?>> U.P</option>
          <option value="ASM"  <?php if($state == 'ASM'){ echo 'checked';}?>>Assam</option>
          <option value="SKIM" <?php if($state == 'SKIM'){ echo 'checked';}?>>Sikkim </option>
        </select>
     </div>

     <div class="form-group">
        <label for="device" class="fw-bolder text-darkmt-2"> Device:*</label>
        <?php if(!empty($deviceErr)){?>
        <span class="error"> <?php echo $deviceErr;?></span>
        <?php }?>
        <input type="radio" name="device" value="phone" <?php if($device == 'phone'){ echo 'checked';} ?>>
        <label for="phone" class="fw-bolder text-dark mt-2" >Phone</label>
        <input type="radio" name="device"  value="laptop" <?php if($device == 'laptop'){ echo 'checked';} ?>>
        <label for="laptop" class="fw-bolder text-dark mt-2" > Laptop</label>
        <input type="radio" name="device"value="other" <?php if($device == 'other'){ echo 'checked';} ?>> 
        <label for="other" class="fw-bolder text-dark mt-2">Other</label>
    </div> 

    <div class="form-group mt-2">
        <label for="password" class="form-label fw-bolder text-dark">Password:*</label>
        <?php if(!empty($passwordErr)){?>
        <span class="error "> <?php echo $passwordErr;?></span>
        <?php }?>
        <input type="password"  class="form-control sm-2 border-2 border-warning " name="password" style="width:370px" maxlength="8" placeholder="********"required>
    </div>

    <div class="form-group mt-2">
        <label for="cpassword" class="form-label fw-bolder text-dark">Confirm Password:*</label>
        <?php if(!empty($cpasswordErr)){?>
        <span class="error "> <?php echo $cpassword;?> </span>
        <?php }?>
        <input type="password"  class="form-control sm-2 border-2 border-warning " name="cpassword" style="width:370px" maxlength="8" placeholder="********" required>
     </div>

     <div class="form-group mt-2">
        <input class="form-check-input border border-black" type="checkbox"   name="checked" value ="checked" <?php if($checked){ echo 'checked';}?> required>
        <label class="form-check-label fw-bolder text-dark " for="gridCheck"> Terms & Conditions* </label>
        <?php if(!empty($checkedErr)){?>
        <span class="error "><?php echo $checkedErr;?></span>
        <?php }?>
    </div>


    <div class="form-group">
      <button type="submit" class="btn btn-primary border border-black mt-2" name="submit" value ="submit" style="width:370px" >Register</button>
    </div>
    <div class="d-flex align-items-center pb-2 mt-2">
   <p class="mb-0 me-2">Already a member?</p>
   <a href="login.php"> <button type="button" class="btn btn-outline-danger" >Login here</button> </a>
   </div>
  </div>
 </form> 

 <div class="side_banner">
    <img src="images/qqq.jpg" alt="images/qqq.jpg" class="mt-5 rounded-5" width="300" height="270"> <br>
    <img src="images/aaaa.jpg" alt="images/aaaa.jpg" class="mt-5 rounded-5" width="300" height="270">
  </div>
 </div>





<?php require_once 'footer.php';?>
