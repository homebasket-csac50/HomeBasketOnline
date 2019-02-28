<?php 
	session_start();
	if(isset($_SESSION['email']) && !empty($_SESSION['email'])) {
		   echo '';
    } else header('location:index.php');
		require_once('services/category.php');
		if(isset($_POST['insertSubmit'])) {
			$categoryName = $_POST['category_name'];
			insertCategory($categoryName);
			header('location:category.php');
		}

		$con= mysqli_connect('localhost','root','','homebasket');
		$query = "SELECT * from category";
		$result=mysqli_query($con,$query);
		
	?>
<!DOCTYPE html>
<html>
<head>
<style>
body{
background-image:url("/new%20Projects/homeBasketOnline/assets/peppers.jpg");
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
  margin-left: 1250px;
  margin-top: 40px;
  cursor: pointer;
}
.category {
  background-color: #4CAF50;
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
<body>
<input type="button" class="button" value="Logout">
<div class="logo">
<img src="/new%20Projects/homeBasketOnline/assets/loogoo.png" alt="loogoo" style="width:120px;height:80px;margin-top:-70px;margin-bottom:50px;">
<input type="button" class="category" value="ADD CATEGORY">
<div>
<ul>
  <li><a href="#HOME">HOME</a></li>
  <li><a href="#CATEGORY">CATEGORY</a></li>
  <li><a href="#PRODUCT">PRODUCT</a></li>
</ul>
</div>


<table style="width:450px;margin-top:-140px;">
  <tr>
    <th>Category ID</th>
    <th>Category Name</th>
	<th>Actions</th>
	</tr>
	<?php 
			
			$output='';
			while ($row = $result->fetch_assoc())  {
				$output.= "<tr><td>{$row['category_id']}</td>
				<td>{$row['category_name']}</td><td><b>Edit/Delete<b></td></tr>";
									
			}
			
			echo $output;
	?>

 
</table>
<form action="category.php" method="POST">
	<input type="text" name="category_name" />
	<input type="submit" name="insertSubmit" />
</form>
</html>


