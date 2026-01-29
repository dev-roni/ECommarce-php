<?php
include_once '../db_connection.php';

if(isset($_POST['category_id'])){
    $category_id = $_POST['category_id'];
    
    $sql = "SELECT * FROM sub_cetegory WHERE cetegory_id='$category_id'";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) > 0){
        echo '<option value="">Select Sub Category</option>';
        while($row = mysqli_fetch_assoc($result)){
            echo '<option value="'.htmlspecialchars($row['id']).'">'.htmlspecialchars($row['sub_cetegory_name']).'</option>';
        }
    }else{
        echo '<option value="">Sub Category not available</option>';
    }
}
?>
