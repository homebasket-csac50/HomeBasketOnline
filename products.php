<?php 
    require_once('services/products.php');
	//session_start();
$con= mysqli_connect('localhost','root','','homebasket');
	if(isset($_SESSION['email']) && !empty($_SESSION['email'])) {
		   echo '';
    } else header('location:index.php');
		
		if(isset($_POST['insertSubmit'])) {
            $categoryId = $_POST['category_id'];
            $product_name = $_POST['product_name'];
            $quantity = $_POST['quantity'];
			insertProducts($categoryId, $product_name, $quantity);
			header('location:products.php');
		}
?>

<table>
  <tr>
	  <th>Product Id</th>
      <th>Category Name</th>
	  <th>Product Name</th>
      <th>Quantity</th>
  </tr>
  <tr>

	<?php 
		
		//$result = fetchProductsWithCategory()
		$query1 = "select p.product_id,c.category_name, p.product_name, p.quantity from category c join product_details p on c.category_id = p.category_id";
		$result1=mysqli_query($con,$query1);
		$output='';
		while($row = $result1->fetch_assoc()) {
			$output.= "<tr><td>{$row['product_id']}</td>
            <td>'{$row['category_name']}'</td>
            <td>'{$row['product_name']}'</td>
            <td>'{$row['quantity']}'</td></tr>";
								
		}
		echo $output;
	?>

  </tr>
</table>

<form action="products.php" method="POST">
		

		<div class="container">
		<label for="uname"><b>Category Name</b></label>
		<select class="box2" id="categoryId" name="category_id">
				<option value="0" >Select Category</option>;
					<?php 
						
							
							$query = "SELECT * from category";
							$result=mysqli_query($con,$query);
							
							
							$output='';
							while ($row = $result->fetch_assoc())  {
							echo "<option value='{$row['category_id']}'>{$row['category_name']}</option>";
						}
					?>
			</select> 
		</div>

        <div class="container">
		<label for="uname"><b>Product Name</b></label>
		<input type="text" name="product_name" placeholder="Product Name" name="product_name" required>
		</div>

        <div class="container">
		<label for="uname"><b>Quantity</b></label>
		<input type="number" name="quantity" placeholder="Quantity" name="quantity" required>
		</div>


		<div class="container" style="background-color:#f1f1f1">
		<button type="submit" name="insertSubmit" class="submit">Submit</button>
		</div>
	  </form>