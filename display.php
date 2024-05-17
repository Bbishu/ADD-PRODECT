<?php require_once 'header.php';
if (!isset($_SESSION['user_id']) &&( $_SESSION['e_mail'] != true)){
    header('location:login.php');
    die();}
    $id = $_SESSION['user_id'];
    $user_name = $_SESSION['n_ame'];
 
$query = "SELECT * FROM product WHERE user_id = $id";
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);

    
?>



<p class="fs-1 text-primary-emphasis  fst-italic text-center fw-bolder">Product List Page</p>
<button type="button" class="btn "> <a href="logout.php">LOGOUT </a></button>
<a href='prodect.php' class='btn btn-info btn-sm me-2 text-bold fw-bold float-end mb-2'>+ADD PRODUCT</a>

<div class="contanier">
    <div class="list" class="">
      <table class="table mt-1">
 
        <thead class="thead-light">
                <tr>
                <th scope="col">ID</th>
                <th scope="col">PRODUCT NAME</th>
                <th scope="col">IMAGE</th>
                <th scope="col">PRICE</th>
                <th scope="col">QUANTITY</th>
                <th scope="col">CREATED </th>
                <th scope="col">UPDATED </th>
                <th scope="col">USER NAME</th>
                <th scope="col">EDIT</th>
                <th scope="col">DELETE</th>
                </tr>
            </thead>
            <tbody>
            <?php
            if($total != 0)
             while($row = mysqli_fetch_assoc($data)){
            echo "<tr>";
                echo "<td>$row[id]</td>";
                echo "<td>$row[name]</td>";
                ?>
                <td>
                <img src="<?php echo $row['image'];?>"  width="100">
                </td>
                <?php
                echo "<td>$row[price]</td>";
                echo "<td>$row[quantity]</td>";
                echo "<td>$row[create_date] </td>";
                echo "<td>$row[update_date] </td>";
                echo "<td>  $user_name </td>";
             echo "<td><a href='prodected.php?id=$row[id]' class='btn btn-warning btn-sm'>Edit</a></td>";
               echo "<td><a href='delete.php?id=$row[id]'class='btn btn-danger btn-sm' onclick = 'return checkDelete()'>Delete</a></td>";
            echo "</tr>";
            
            }
            ?>
            <tbody> 
        </table>


    </div>
</div>


<?php require_once 'footer.php';?>