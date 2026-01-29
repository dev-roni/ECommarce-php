<?php

function get_item_name($id,$conn){
	$sql = "SELECT * FROM product WHERE id=$id";
	$result = mysqli_query($conn, $sql); 
	$products = mysqli_fetch_all($result, MYSQLI_ASSOC);
	foreach ($products as $product){return $product['product_name'];}
}

function get_item_image($id,$conn){
	$sql = "SELECT * FROM product WHERE id=$id";
	$result = mysqli_query($conn, $sql); 
	$products = mysqli_fetch_all($result, MYSQLI_ASSOC);
	foreach ($products as $product){
		$target_dir = "http://localhost/project/bechakena/Assets/image/".$product['image_url'];
		return $target_dir;
		}
}

function get_cetegory_name($id,$conn){
	
	$sql = "SELECT * FROM product WHERE id=$id";
	$result = mysqli_query($conn, $sql); 
	$products = mysqli_fetch_all($result, MYSQLI_ASSOC);
	foreach ($products as $product){$product_id= $product['cetegory'];}
	
	$sql = "SELECT * FROM cetegory WHERE id=$product_id";
	$result = mysqli_query($conn, $sql); 
	$cetegorys = mysqli_fetch_all($result, MYSQLI_ASSOC);
	foreach ($cetegorys as $cetegory){return $cetegory['cetegory_name'];}
}

function get_sub_cetegory_name($id,$conn){
	
	$sql = "SELECT * FROM product WHERE id=$id";
	$result = mysqli_query($conn, $sql); 
	$products = mysqli_fetch_all($result, MYSQLI_ASSOC);
	foreach ($products as $product){$product_id= $product['sub_cetegory'];}
	
	$sql = "SELECT * FROM sub_cetegory WHERE id=$product_id";
	$result = mysqli_query($conn, $sql); 
	$sub = mysqli_fetch_all($result, MYSQLI_ASSOC);
	foreach ($sub as $sub_cetegory){return $sub_cetegory['sub_cetegory_name'];}
}


?>