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
    
    if(isset($_POST['deleteProduct'])) { 
      $pId = $_POST['product_id'];
      $pname = $_POST['product_name'];
      $status = 0;
                                               
     updateProduct($pId, $pname, $status);
    }

    if(isset($_POST['editProduct'])) { 
      $pId = $_POST['category_id'];
      $pname = $_POST['category_name'];
      $status = 1;
                                               
     updateProduct($pId, $pname, $status);
    }
?>
<html>
<style>
body{
background-image:url("/new%20Projects/homeBasketOnline/assets/brook1.jpg");
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
<table style="color:	#000000"> 
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
                  c.category_id,
                  c.category_name,
                  p.product_name,
                  p.quantity
              FROM
                  category c
              JOIN product_details p ON
                  c.category_id = p.category_id and c.status = 1 and p.status = 1";
    $result1=mysqli_query($con,$query1);
		$output='';
		while($row = $result1->fetch_assoc()) {

      $output.= "
      <form action=products.php method='post'>
            <input type='hidden' name='product_id' id='product_id' value='{$row['product_id']}'><tr><td>{$row['product_id']}</td>
            <input type='hidden' name='category_name' id='category_name' value='{$row['category_name']}'><td>{$row['category_name']}</td>
            <input type='hidden' name='product_name' id='product_name' value='{$row['product_name']}'><td>{$row['product_name']}</td>
            <input type='hidden' name='quantity' id='quantity' value='{$row['quantity']}'><td>{$row['quantity']}</td>
            <td><input type='submit' value='deleteProduct' name='deleteProduct'/></td>
            <td><input type='button' id='myBtn' value='Edit' onclick=openbox1({$row['product_id']},'{$row['product_name']}') ></td</tr></form>";
								
		}
		echo $output;
	?>

<script>
function openbox1(productId, productName) {
   document.getElementById('catIdMain').value = productId;
   document.getElementById('catNameMain').value = productName;   
  modal.style.display = "block";
}
</script>




</div> 
</table>    

		</body>
    <!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>
</head>
<body>

<h2>Modal Example</h2>

<!-- Trigger/Open The Modal -->
<button id="myBtn">Open Modal</button>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <form action="products.php" class="form-container" method=post>
    <h1>Edit Product</h1>

    <label for="productId"><b>Product Id</b></label>
    <input type="text" name="category_id" id='catIdMain'  readOnly>

    <label for="productName"><b>Product Name </b></label>
    <input type="text" id="catNameMain" placeholder="Enter Category" name="category_name"  required>

    <input type="submit" name="editProduct" type="editProduct" class="btn" />
    
  </form>
  </div>

</div>
<?php
  
?>
<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
 function openbox(catId,categoryname,a,b,c) {
   alert(categoryname);
   //document.getElementById('catIdMain').value = catId;
   //document.getElementById('catNameMain').value = categoryname;   
  modal.style.display = "block";
}

document.querySelector('#myBtn').addEventListener('click', e => {
  console.log('#######')
})

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

</body>
</html>

