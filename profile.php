<?php require_once 'header.php';

if (!isset($_SESSION['user_id']) &&( $_SESSION['e_mail'] != true)){
    header('location:login.php');
    die();}

    
$id=$_SESSION['user_id'];
$query=mysqli_query($conn,"SELECT * FROM forms where id ='$id'")or die(mysqli_error());
$row=mysqli_fetch_array($query);

$id = $_SESSION["user_id"];
if(isset($_POST['update'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $state = $_POST['state'];
    $sql = "UPDATE forms SET name ='$name', email='$email' , phone = '$phone', gender = '$gender',
    state = '$state'   WHERE id = '$id'";
  if ($conn->query($sql) === TRUE) {
      echo "Record updated successfully";
  }
}
?>

<p class="fs-1 text-primary-emphasis  fst-italic text-center fw-bolder  ">Profile</p>


  <div class= "profil d-flex justify-content-evenly">
    <div class="profile_up">
 <div class="container-fluid d-flex justify-content-around ">
 <form method="POST" action="#"  enctype="multipart/form-data">
  <h1>Profile Update </h1>
    <div class="form-group mb-2"> 
    <input type="hidden" name="id" value="" >
      <label for="validationCustom01" class="form-label text-dark fw-bolder mt-2"> Name </label> 
      <input type="text" class="form-control border border-2  border-info" name="name"  style="width:370px"  value="<?php echo $row['name']; ?>">
    </div>

    <div class="form-group">
      <label for="validationCustomUsername" class="form-label text-dark fw-bolder ">Email</label> 
    
      <input type="email" class="form-control border border-2  border-info" name="email"  style="width:370px"  value="<?php echo $row['email']; ?>">
    </div>

   

    <div class="form_group">
      <label for="phone" class="form-label text-dark fw-bolder mt-2" > Phone number:</label>
      <input type="tel" class="form-control border border-2  border-info"  name="phone" style="width:370px"  value="<?php echo $row['phone'];?>">
    </div>

    <div class="form-group">
        <label for="gender" class="fw-bolder text-darkmt-2"> Gender:</label>
        <input type="radio" name="gender"  value="female"<?php if ($row['gender']== 'female'){echo 'checked';}?>>
        <label for="female" class="fw-bolder text-dark mt-2">Female</label>
        <input type="radio" name="gender" value="male"<?php if ($row['gender']== 'male'){echo 'checked';}?>>
        <label for="male" class="fw-bolder text-dark mt-2"> Male </label>
        <input type="radio" name="gender" value="other"<?php if ($row['gender']== 'other'){echo 'checked';}?>>
        <label for="other" class="fw-bolder text-dark mt-2">Other</label>
    </div> 

    <div class="form-group">
        <label for="state" class="fw-bolder text-dark mt-2">State:</label>
        <select  class="form-control border-2 border-info "  name="state" style="width:370px" required >
          <option value="NONE"> None </option>
        
          <option value="HP"<?php if($row ['state']== 'HP'){ echo 'selected';} ?>>Himachal Pradesh </option>
          <option value="DL"<?php if($row ['state']== 'DL'){ echo 'selected';} ?>>Delhi </option>
          <option value="HR"<?php if($row ['state']== 'HR'){ echo 'selected';} ?>>Haryana </option>
          <option value="PB"<?php if($row ['state']== 'PB'){ echo 'selected';} ?>>Punjab </option>
          <option value="LK"<?php if($row ['state']== 'LK'){ echo 'selected';} ?>>Ladakh </option>
          <option value="OD"<?php if($row ['state']== 'OD'){ echo 'selected';} ?>>Odisha </option>
          <option value="UP"<?php if($row ['state']== 'UP'){ echo 'selected';} ?>> U.P</option>
          <option value="ASM"<?php if($row ['state']== 'ASM'){ echo 'selected';} ?>>Assam</option>
          <option value="SKIM"<?php if($row ['state']== 'SKIM'){ echo 'selected';} ?>>Sikkim </option>
        </select>
     </div>

     
  
     <button class="btn btn-outline-info mt-2 " value= "update" name="update">UPDATE</button><br><br>
 </form>
 </div>
 </div>
    
 <div class="passwd_up">
<div class="container ">
<?php
 $passwordErr = $passErr= "" ;
    $error = false;
    if (isset($_POST['reset'])){
        $oldpass = $_POST['old_password'];
        $newpass = $_POST['new_password'];
        $cpass = $_POST['cpassword'];
        // Validate old password and new password
        if (empty($oldpass) || empty($newpass) || empty($cpass)){
            $passwordErr = 'All password fields are required.';
            $error = true;
        }else {
            $password = md5($oldpass); // Hash the old password
            if ($newpass != $cpass) {
                $passErr = 'Password does not match';
                $error = true;
            } elseif ($row['password'] != $password) {
                $passwordErr = 'Old password does not match';
                $error = true;
            }else {
                // Update the password in the database
                $newpass = md5($newpass); // Hash the new password
                $sql = "UPDATE forms SET password = '$newpass' WHERE id = '$id'";
                if (mysqli_query($conn, $sql)) {
                    // Password updated successfully
                    echo 'Password updated successfully!';
                    $error = false;
                }
            }
        }
    }

 ?>

<form action="#" method="post">
<h2>Password Reset </h2>
    <div class="form-group mt-3">
        <input type="password" name="old_password" class="form-control" style="width:370px"  maxlength="8" placeholder="Current Password">
    </div>
    <div class="form-group mt-2">
        <input type="password" name="new_password" class="form-control" style="width:370px"  maxlength="8" placeholder="New Password">
    </div>
    <div class="form-group mt-2">
        <input type="password" name="cpassword" class="form-control" style="width:370px"  maxlength="8" placeholder="Confirm New Password">
    </div>
    <div class="form-group mt-2">
    <button class="btn btn-outline-info " value= "reset" name="reset">RESET</button><br><br>
    </div>
 </form> 
 </div>
 </div>
 </div>


 <div class= "container">
 <?php
$profilepicErr = "";
if (isset($_POST['Upload'])) {
    if (isset($_FILES['newImage']) && $_FILES['newImage']['error'] === 0) {
        $target_dir = "imgfolder/";
        $image_name = time() .'-'. basename($_FILES["newImage"]["name"]);
        $target_file =  $target_dir . $image_name;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (in_array($imageFileType, ['jpg', 'jpeg', 'png'])) {
            if ($_FILES['newImage']['size'] <= 500000) {
               $deleteimage = $row['file'];
                if (move_uploaded_file($_FILES['newImage']['tmp_name'], $target_file)) {
                    $sql = "UPDATE forms SET file ='$target_file' WHERE id = $id";
                    if (mysqli_query($conn, $sql)) {
                        echo 'Image updated successfully!';
                    } else {
                    echo 'Error updating image: ' . mysqli_error($conn);
                    }
                } else {
                    $profilepicErr = 'Failed to upload the image.';
                }
            } else {
                $profilepicErr = 'Image size is too large. Maximum size is 1000KB.';
            }
        } else {
            $profilepicErr = 'Invalid image format. Only JPG, JPEG, and PNG are allowed.';
        }
    } else {
        $profilepicErr = 'Please select an image to upload.';
    }
}
?>
 <form method="POST" action=""enctype="multipart/form-data">
<h1 class = "fs-2 fw-bold ">UPDATE-IMAGE</h1>
    <div class="image">
    <img src="<?php echo $row['file'];?>"  width="170" height="100">
    </div>
        <label for="newImage" >Upload New Image:</label>
        <input type="file" class="form-control w-75 rounded-pill border-primary"   name="newImage" accept="image/*">
        <?php if(!empty($profilepicErr)){?>
        <span class="error text-danger"> <?php echo $profilepicErr;?></span>
        <?php }?>
        <br>
        <input type="submit" class="btn btn-primary me-1  " value= "Upload" name="Upload"><br>

</div>





<?php require_once 'footer.php';?>