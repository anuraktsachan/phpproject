<?php include('config.php'); ?>


<?php
if (isset($_POST['submit'])) {
echo hiiiiiiiiiiiiiiiiiiiiii;
	$filename = $_FILES['image']['name'];
	$filetmpname = $_FILES['image']['tmp_name'];
	$folder = 'resources/images/';
	move_uploaded_file($filetmpname, $folder . $filename);

	$name 		= isset($_POST['product-name']) ? $_POST['product-name'] : '';
	$price 		= isset($_POST['product-price']) ? $_POST['product-price'] : '';
	$category 	= isset($_POST['dropdown']) ? $_POST['dropdown'] : '';
	$tag		= isset($_POST['tag']) ? $_POST['tag'] : '';
	$description = isset($_POST['textfield']) ? $_POST['textfield'] : '';
	$tag_array 		= json_encode($tag);

	$query = "INSERT INTO products (name,image,price,category,tags,description) VALUES('$name','$filename',$price,$category,'$tag_array','$description')";

	$result = mysqli_query($connection, $query)
		or die("Values cannot be Inserted!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!" . mysqli_error($connection));
	}
?>	