<?php 
	session_start();
  require_once('services/category.php');
  
  if(isset($_POST['editCategory'])) {
    $categoryId = $_POST['category_id'];
    $categoryName = $_POST['category_name'];
 
    updateCategory($categoryId, $categoryName, 1);
  }

  if(isset($_POST['deleteSubmit'])) {
    $categoryId = $_POST['category_id'];
    $categoryName = $_POST['category_name'];
    updateCategory($categoryId, $categoryName, 0);
  }
  if(isset($_SESSION['email']) && !empty($_SESSION['email'])) {
		   echo '';
    } else header('location:index.php');
		
		if(isset($_POST['insertSubmit'])) {
			$categoryName = $_POST['category_name'];
			insertCategory($categoryName);
			header('location:category.php');
		}

		$con= mysqli_connect('localhost','root','','homebasket');
		$query = "SELECT * from category where status = 1";
		$result=mysqli_query($con,$query);
		
	?>
<!DOCTYPE html>
<html>
<head>
<style>
body{
background-image:url("/new%20Projects/homeBasketOnline/assets/brook1.jpg");
height:700px;
background-position:center;
background-size:cover;
background-repeat: no-repeat;
}
ul {
  list-style-type: none;
  margin-top: -20px;;
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
  background-color:;
  color: white;
}
.button {
  background-color: #0000ff;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 10px 4px;
  margin-left: 1250px;
  margin-top: 40px;
  cursor: pointer;
}
.category { 
  background-color: #0000ff; 
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 10px 4px;
  margin-top:-40px;
  margin-left: 510px;
  cursor: pointer;
}
table, th, td {
  margin-top:10px;
  margin-left: 507px;
  border: 2px solid black;
  border-collapse: collapse;
}
th, td {
  height:20px;
  width:50px;
  padding:4px;
  text-align: left;
}
</style>
</head>
<script>

var catid = getElementById('category_id').value;
var category_name = getElementById('category_id').value;

</script>
<body>
<input type="button" class="button" value="Logout">
<div >
<img src="/new%20Projects/homeBasketOnline/assets/loogoo.png" alt="loogoo" style="width:120px;height:80px;margin-top:-70px;margin-bottom:50px;">
<input type="button" class="category" value="ADD CATEGORY">
<div>
<ul>
  <li><a href="#HOME">HOME</a></li>
  <li><a href="#CATEGORY">CATEGORY</a></li>
  <li><a href="products.php">PRODUCT</a></li>
</ul>
</div>
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
    <form action="category.php" class="form-container" method=post>
    <h1>Edit Category</h1>

    <label for="catgoryId"><b>Category Id</b></label>
    <input type="text" name="category_id" id='catIdMain'  readOnly>

    <label for="categoryname"><b>Category </b></label>
    <input type="text" id="catNameMain" placeholder="Enter Category" name="category_name"  required>

    <input type="submit" name="editCategory" type="editCategory" class="btn" />
    
  </form>
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
 function openbox(catId,categoryname) {
   //alert(categoryname);
   document.getElementById('catIdMain').value = catId;
   document.getElementById('catNameMain').value = categoryname;   
  modal.style.display = "block";
}

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


<table style="width:450px;margin-top:-140px;">
  <tr>
    <th>Category ID</th>
    <th>Category Name</th>
	<th>Actions</th>
	</tr>
	<?php 
						$output='';
			while ($row = $result->fetch_assoc())  {
        $output.= "<form action=category.php method='post'>
        <input type='hidden' name='category_id' id='category_id' value='{$row['category_id']}'><tr><td>{$row['category_id']}</td>
        <input type='hidden' name='category_nam id='category_name'  value='{$row['category_name']}'><td>{$row['category_name']}</td>
        <td><b><input type='button' id='myBtn' value='Edit' onclick=openbox({$row['category_id']},'{$row['category_name']}') > / <input type='submit' name='deleteSubmit' value='Delete' readonly/><b></td></tr></form>";
					}
						echo $output;
	?>
</table>
<form action="category.php" method="POST">
	<input type="text" name="category_name" />
  <input type="submit" name="insertSubmit" /><br>
  <button type="edit" name="edit" class="submit">edit</button>
    <button type="delete" name="delete" class="submit">delete</button>

</form>
</html>


