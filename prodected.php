<?php require_once 'header.php';

if (!isset($_SESSION['user_id']) &&( $_SESSION['e_mail'] != true)){
  header('location:login.php');
  die();}



if(isset($_GET['id'])){
$id = $_GET['id'];
      $query = "SELECT * FROM product where id ='$id'";
      $data = mysqli_query($conn, $query);
      $total = mysqli_num_rows($data);
      $row = mysqli_fetch_assoc($data);
}

$profilepicErr = "";

if(isset($_POST['update'])){
  if (isset($_FILES['newImage']) && $_FILES['newImage']['error'] === 0) {
    $target_dir = "imgfolder/";
    $image_name = time() .'-'. basename($_FILES["newImage"]["name"]);
    $target_file =  $target_dir . $image_name;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if (in_array($imageFileType, ['jpg', 'jpeg', 'png'])) {
        if ($_FILES['newImage']['size'] <= 500000) {
           $deleteimage = $row['image'];
            if (move_uploaded_file($_FILES['newImage']['tmp_name'], $target_file)) {
                $sql = "UPDATE product SET image ='$target_file' WHERE id = $id";
                if (mysqli_query($conn, $sql)) {
                  header("location:display.php");
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
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $update_date = date('Y-m-d H:i:s');
        
    $sql = "UPDATE product SET name ='$name', price = '$price' , quantity = '$quantity', update_date = '$update_date'  WHERE id = '$id'";
    $data = mysqli_query($conn, $query);
  if ($conn->query($sql) === TRUE) {
     header("location:display.php");
  }
}

?>


<p class="fs-1 text-primary-emphasis  fst-italic text-center fw-bolder  ">UPDATE PRODECT </p>

<div class="upform d-flex justify-content-around">
 <form method="POST" action="#"  enctype="multipart/form-data">
  <div class="container-fluid">

    <div class="form-group mb-2"> 
      <label for="validationCustom01" class="form-label text-dark fw-bolder mt-2 ">Prodct Name*</label> 
      <input type="text" class="form-control border border-2  border-info" name="name"  style="width:370px" placeholder= "Name"   value="<?php echo $row['name']; ?>" >
    </div>

    <div class="form_group">
      <label for="price" class="form-label text-dark fw-bolder mt-2" > Price:*</label>
      <input type="number" class="form-control border border-2  border-info"  name="price"  size= "8" style="width:370px"   value="<?php echo $row['price']; ?>" >
    </div>

    <div class="form-group">
      <label for="quantity" class="form-label text-dark fw-bolder mt-2" > quantity:*</label>
      <input type="number" class="form-control border border-2  border-info"  name="quantity" style="width:370px"  value="<?php echo $row['quantity']; ?>" >
    </div>

    <p class = " fw-bold mt-2">UPDATE-IMAGE:</p>
    <div class="image">
    <img src="<?php echo $row['image'];?>"  width="170" height="100">
    </div>
        <label for="newImage" >Upload New Image:</label>
        <input type="file" class="form-control w-75 rounded-pill border-primary"   name="newImage" accept="image/*">
        <?php if(!empty($profilepicErr)){?>
        <span class="error text-danger"> <?php echo $profilepicErr;?></span>
        <?php }?>

    <div class="form-group">
    <button class="btn bg-warning mt-2 p-2 " value= "update" name="update">UPDATE</button>
    </div>
 
  </div>
</form> 


<?php require_once 'footer.php';?>
