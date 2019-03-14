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

<html>
<style>
body{
background-image:url("/new%20Projects/homeBasketOnline/assets/bg.png");


 background-position:center;
 background-size:cover;
 background-repeat:no-repeat;
 margin-top:100;
 margin-left:100;
 }
 ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: #f1f1f1;       
}

li a {
  display: block;
  color: #000;
  padding: 16px 20px;
  text-decoration: none;
  
}


li a:hover {
  background-color: #555;
  color: white;
}




.button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 10px 4px;
  margin-left: 1200px;
  margin-top: -50px;
  cursor: pointer;
}

.button1{
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 10px 4px;
  margin-left: 500px;
  margin-top: -30px;
  cursor: pointer;
  }

table, th, td {
  border: 1px solid black;
 
 
   margin-left: 500px;
  margin-top: 50px;
  }
  
 
 </style>
<body>
<a href='logout.php'><input type="button" class="button" value="logout"></a>

<div>	

<ul>
  <li><a href="#HOME">HOME</a></li>
  <li><a href="category.php">CATEGORY</a></li>
  <li><a href="#PRODUCT"><b>PRODUCT</b>s</a></li>

</ul>

<table>
<tr>
<td>
<form action="products.php" method="POST">
		

		<div class="container">
		<label for="uname"><b>Category Name</b></label>
		<select class="box2" id="categoryId" name="category_id">
				<option value="0" >Select Category</option>;
					<?php 
						
							
							$query = "SELECT * from category where status = 1";
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
		<button type="submit" name="insertSubmit" class="submit">add product</button>
    <button type="submit" name="insertSubmit" class="submit">edit</button>
    <button type="submit" name="insertSubmit" class="submit">delete</button>

		</div>
	  </form>

</td></tr>
</table>  
<table style="color:#fff"> 
 <tr>
     
    

    
    
    
    <th>Product ID</th>
    
	<th>Category Name</th>
	<th>Product Name </th>
	<th>Quantity</th>
	
  </tr>

	<?php 
		
		//$result = fetchProductsWithCategory()
		//$query1 = "select p.product_id,c.category_name, p.product_name, p.quantity from category c join product_details p on c.category_id = p.category_id";
    $query1 = "SELECT
                  p.product_id,
                  c.category_name,
                  p.product_name,
                  p.quantity
              FROM
                  category c
              JOIN product_details p ON
                  c.category_id = p.category_id and c.status = 1";
    $result1=mysqli_query($con,$query1);
		$output='';
		while($row = $result1->fetch_assoc()) {
			$output.= "<tr><td>{$row['product_id']}</td>
            <td>{$row['category_name']}</td>
            <td>{$row['product_name']}</td>
            <td>{$row['quantity']}</td>
            </tr>";
								
		}
		echo $output;
	?>





</div> 
</table>    

		</body>
</html>
