
<?php require_once 'header.php';?>


<?php
if(isset($_GET['id'])){
   $id = $_GET['id'];
         $query = "DELETE FROM product where id ='$id'";
         $data = mysqli_query($conn, $query);
        header('location: display.php');
}

require_once 'footer.php';

?>
