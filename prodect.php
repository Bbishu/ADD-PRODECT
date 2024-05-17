<?php require_once 'header.php';?>

<?php
 

$nameErr=  $imageErr =  $priceErr = $quantityErr = "";
$name = $image =  $price = $quantity = $checked = $id =  "";
$form_success = true;
$imageErr="";


$id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST"){
  if (empty($_POST["name"])){
       $nameErr = "*Your name is required";
       $form_success = false;
  } else {
       $name = test_input($_POST["name"]);
  }
  

  if (empty($_POST["price"])) {
    $priceErr = "*Price is required";
    $form_success = false;
  } else{
      $price = test_input($_POST["price"]);
  }

 if (empty($_POST["quantity"])){
  $quantityErr = "*Quantity is required";
  $form_success = false;
 } else {
  $quantity = test_input($_POST["quantity"]);
 }

 if (empty($_FILES["image"]["name"])) {
  $imageErr = "Profile pic is required";
  $form_success = false;
 } elseif($form_success) {
  $target_dir = "imgfolder/";
  $image_name = time() . '-' . basename($_FILES["image"]["name"]);
  $target_file = $target_dir . $image_name;
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
      $image = $target_file;
  } else {
      $imageErr = "ERROR UPLOADING FILE";
      $form_success = false;
  }
      $sql = "INSERT INTO product(name,image,price,quantity,user_id) 
      VALUE ('{$name}','{$image}','{$price}','{$quantity}','{$id}')";
      if (mysqli_query($conn, $sql)) {
          header("location:display.php");
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


<p class="fs-1 text-primary-emphasis  fst-italic text-center fw-bolder  "> ADD PRODECT</p>

<form method="POST" action="#"  enctype="multipart/form-data">
 <div class="container-fluid d-flex justify-content-around ">
   <div class="form">
    <div class="form-group mb-2"> 
      <label for="validationCustom01" class="form-label text-dark fw-bolder mt-2 ">Prodct Name*</label> 
      <?php if(!empty($nameErr)){?>
      <span class="error "> <?php echo $nameErr;?></span> 
      <?php }?>
      <input type="text" class="form-control border border-2  border-info" name="name"  style="width:370px" placeholder= "Name"  value = "<?php echo $name?>" >
    </div>

    <div class="form_group mt-3">
      <lable for ="file" class= "form-label text-dark fw-bolder"> Select Image:*</label> <br>
      <?php if(!empty($imageErr)){?>
      <span class="error "> <?php echo $imageErr;?></span> 
      <?php }?>
      <input type="file" class="form-control  border border-2 border-info" style= "width:370px" value="<?php echo $image;?>" id = "image" name="image" >
    </div>

    <div class="form_group">
      <label for="price" class="form-label text-dark fw-bolder mt-2" > Price:*</label>
      <?php if(!empty($priceErr)){?>
      <span class="error "> <?php echo $priceErr?></span> 
      <?php }?>
      <input type="number" class="form-control border border-2  border-info"  name="price"  size= "8" style="width:370px"  value = "<?php echo $price?>" >
    </div>

    <div class="form-group">
      <label for="quantity" class="form-label text-dark fw-bolder mt-2" > quantity:*</label>
      <?php if(!empty($quantityErr)){?>
      <span class="error "> <?php echo $quantityErr;?></span> 
      <?php }?>
      <input type="number" class="form-control border border-2  border-info"  name="quantity" style="width:370px"  value = "<?php echo $quantity?>" >
    </div>

    


    <div class="form-group">
      <button type="submit" class="btn btn-primary border border-black mt-2 " name="submit" value ="submit" style="width:370px" >ADD</button>
    </div>
  </div>
 </form> 

 
 </div>





<?php require_once 'footer.php';?>
