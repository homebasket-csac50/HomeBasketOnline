<?php
    require_once('headers.php');
?>
<?php 
	//session_start();
	if(!(isset($_SESSION['email']) && !empty($_SESSION['email']))) {
	  echo header('location:mainLogin.php');
	}
?>

<?php 

	require_once('services/category.php');
	require_once('services/products.php');
  
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


		
		if(isset($_POST['insertSubmit'])) {
			$categoryName = $_POST['category_name'];
			insertCategory($categoryName);
		}

		$con= mysqli_connect('localhost','root','','homebasket');
		$query = "SELECT * from category where status = 1";
		$result=mysqli_query($con,$query);

		if(isset($_POST['insertSubmitProduct'])) {
			$categoryId = $_POST['category'];
			$product_name = $_POST['product_name'];
			$quantity = $_POST['quantityMain'];
			$price = $_POST['price'];
			insertProducts($categoryId, $product_name, $quantity, $price);
		}
		
	?>

<!DOCTYPE html>
<html>

<head>
    <title>Category</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        height: 100vh;
        overflow: scroll;
    }
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
input[type=text], input[type=password], input[type=email] {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }

/* Modal Content */
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 50%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s;
  min-height: 70%;
  /* margin: 0 */
}

/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

.modal-header {
  padding: 2px 16px;
  background-color: #4CAF90;
  color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
  padding: 2px 20px;
  background-color: #4CAF90;
  color: white;
}
    /* td {
        display: flex;
    justify-content: center;
    align-items: center;
    } */

    .height100 {
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 100%;

        background-image: url('https://storage.pixteller.com/designs/designs-images/2017-07-24/04/backgrounds-abstract-background-image-1-5975ef8930012.png');
        background-repeat: no-repeat;
        background-size: cover;
    }
    button {
      background-color: #4CAF90;
      color: white;
      padding: 5px 10px;
      margin: 0;
      border: none;
      cursor: pointer;
      width: 30%;
      overflow:hidden;
    }
    
    button:hover {
      opacity: 0.8;
    }
    .modalButtons {
        color: white !important;
        padding: 5px 10px;
        margin: 0;
        border: none;
        cursor: pointer;
        width: 20%;
    }
    .modalButtons:hover {
        color: #4CAF90 !important;
        background-color: white !important;
    }
	
    select {
  width : 200px;
  height : 45px;
  border : none;
  text-decoration : none;
}

    ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  width: auto;
  overflow:hidden;
  background-color: #f1f1f1;       
}

li a {
  display: block;
  color: #000;
  padding: 16px 20px;
  text-decoration: none;
  overflow:hidden;
  align : right;
}

li a:hover {
  background-color: #5EBDA4;
  color: white;
  text-decoration:none;
  overflow:hidden;
}

.sidenav {
  height: 100%;
  width: 0px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #343A40;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 6px 6px 6px 25px;
  text-decoration: none;
	font-size: 15px;
  color: #111;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #111;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 30px;
}

@media screen and (max-height: 300px) {
  .sidenav {padding-top: 10px;}
  .sidenav a {font-size: 12px;}
}


#mySidenav table, th, td {
  margin-top:6000px;
  margin-left: 507px;
  border:  2px solid black;
border-collapse: collapse;
  
}
#mySidenav th, td {
  height:30px;
  width:30px;
  padding:4px;
  text-align: left;
}
</style>
<script>
	function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}

function myFunction() {
  var txt;
  if (confirm("Are you sure?")) {
    return true;
  } else {
  event.preventDefault(); 
    return false;
  }
}

</script>
<body>

	<div>
				<ul class="nav navbar-nav navbar-right right" style= "
						flex-direction: row;
						flex-direction: row;
						justify-content: flex-end;
						background-color: #F8F8F8;
				">
<span style="font-size:30px;cursor:pointer; position: fixed;
  left: 30px;" onclick="openNav()">&#9776; </span>

						<li><a href="javascript:void(0)" href="index.php">Home</a></li>
						<li ><a href="javascript:void(0)" id="addCategoryButton" > Add Category</a></li>
						<li><a href="javascript:void(0)" id="addProductButton"> Add Products</a></li>
						<li><a href="logout.php">Logout</a></li>
						<li><a href="javascript:void(0)" ><?php echo $_SESSION['email']  ?></a></li>
				</ul>
	</div>
						

	<div id="mySidenav" class="sidenav">
		<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
		<a href="index.php" style="color:white">HOME</a>
		<a href="products.php" style="color:white">PRODUCT</a>
		<a href="category.php" style="color:white">CATEGORY</a>
		<a href="about.php" style="color:white">ABOUT</a>
  </div>

    <!-- CATEGORIES -->
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 height100">
		
        <div class="d-flex">
          
        </div>
        <div style="width: 50vw; position:relative;height:300px; overflow:scroll">
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Category Id</th>
                        <th>Category Name</th>
                        
                    </tr>
                </thead>
                <tbody>
                <?php 
                      $output='';
                      while ($row = $result->fetch_assoc())  {
                        
                        $output.= "<form method='POST' action='category.php' onSubmit='myFunction()'>
                          <input type='hidden' name='category_id' id='category_id' value='{$row['category_id']}'>
                          <tr>
                            <td>{$row['category_id']}</td>
                          <input type='hidden' name='category_name' id='category_name'  value='{$row['category_name']}'>
                            <td>{$row['category_name']}</td>
                          	</tr>
                          </form>";
                        }
                        echo $output;
                  ?>
               <!-- <form method="POST" action="category.php" onSubmit="myFunction()">
                    <tr>
                        <td>val 1</td>
                        <td>val 2 </td>
                        <td>val 3</td>
                        <td>deleteCategory
                            <input type="Submit" name="deleteSubmit" Value="Delete" style="background-color: #4CAF90;color: white; padding: 5px 10px;margin: 0;border: none;cursor: pointer;width: 30%;overflow:hidden;" />
                            
                        </td>
                        <td>
                        <input type="button" name="editCategory" Value="Edit" style="background-color: #4CAF90;color: white; padding: 5px 10px;margin: 0;border: none;cursor: pointer;width: 30%;overflow:hidden;" / onclick=openbox();>
                           
                        </td>
                    </tr>
                </form> -->
                    
                </tbody>
						</table>
						
            
        </div>
				<div style="width:50px; height:100px;" ></div>
				<div style="width: 50vw; marging-top:100px; position:relative;height:300px; overflow:scroll">
				<table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Category Id</th>
                        <th>Category Name</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Product Quantity</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
		
                  //$result = fetchProductsWithCategory()
                  //$query1 = "select p.product_id,c.category_name, p.product_name, p.quantity from category c join product_details p on c.category_id = p.category_id";
                  $query1 = "SELECT
                                p.product_id,
                                c.category_id,
                                c.category_name,
                                p.product_name,
                                p.quantity,
                                p.price
                            FROM
                                category c
                            JOIN product_details p ON
                                c.category_id = p.category_id and c.status = 1 and p.status = 1";
                  $result1=mysqli_query($con,$query1);
                  $output='';
                  while($row = $result1->fetch_assoc()) {

                    $output.= "
                    <form action=products.php method='post' onSubmit='myFunction()'>
                          <input type='hidden' name='product_id' id='product_id' value='{$row['product_id']}'><tr><td>{$row['product_id']}</td>
                          <input type='hidden' name='category_name' id='category_name' value='{$row['category_name']}'><td>{$row['category_name']}</td>
                          <input type='hidden' name='product_name' id='product_name' value='{$row['product_name']}'><td>{$row['product_name']}</td>
                          <input type='hidden' name='price' id='price' value='{$row['price']}'><td>{$row['price']}</td>
                          <input type='hidden' name='quantity' id='quantity' value='{$row['quantity']}'><td>{$row['quantity']}</td>
                          </tr></form>";
                              
                  }
                  echo $output;
	              ?>
                
               <!-- <form method="POST" action="category.php" onSubmit="myFunction()">
                    <tr>
                        <td>val 1</td>
                        <td>val 2 </td>
                        <td>val 3</td>
                        <td>deleteCategory
                            <input type="Submit" name="deleteSubmit" Value="Delete" style="background-color: #4CAF90;color: white; padding: 5px 10px;margin: 0;border: none;cursor: pointer;width: 30%;overflow:hidden;" />
                            
                        </td>
                        <td>
                        <input type="button" name="editCategory" Value="Edit" style="background-color: #4CAF90;color: white; padding: 5px 10px;margin: 0;border: none;cursor: pointer;width: 30%;overflow:hidden;" / onclick=openbox();>
                           
                        </td>
                    </tr>
                </form> -->
                    
                </tbody>
            </table>
			
				

        
        </div>
		</div>
		



    <div id="categoryModal" class="modal" >

        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <!-- <span class="">&times;</span> -->
                <h2>Category</h2>
            </div>
            <form class="modal-content animate" action="index.php" method="POST" novalidate>

            <div class="modal-body">

                    <div class="">
                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12" id="addCatBlock" style="display:none;">
                            <label for="category"><b>Category</b></label>
                            <input required type="text" placeholder="Category" name="category_name">
                            
                        </div>
                       
                    </div>
                
            </div>
            <div class="modal-footer">
            <input type="submit" value="Add" class="modalButtons" id="addButton" name="insertSubmit" style="display:none; background-color: #4CAF90;" />
                                       
                <button class="modalButtons" id="closeButton">
                    Close
                </button>
            </div>
            </form>
        </div>

    </div>

		<div id="productModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <!-- <span class="">&times;</span> -->
                <h2>Products</h2>
            </div>
            <form class="modal-content animate" action="index.php" method="POST" novalidate>

            <div class="modal-body">

                    <div class="">
                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12" id="addCatBlock1" style="display:none;">
                         <label for="uname"><b>Category Name</b></label>
                          <select class="box2" id="categoryId" name="category">
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
                            <label for="category"><b>Products</b></label>
                            <input required type="text" placeholder="Product" name="product_name">

                            <label for="category"><b>Quantity</b></label>
                            <input required type="text" placeholder="Quantity" name="quantityMain">
														
														<label for="category"><b>Price</b></label>
                            <input required type="text" placeholder="Price" name="price">
                            
                        </div>
                    </div>
                
            </div>
            <div class="modal-footer">
            <input type="submit" value="Add" class="modalButtons" id="addButton" name="insertSubmitProduct" style="background-color: #4CAF90;" />
                <button class="modalButtons" id="closeButton">
                    Close
                </button>
            </div>
            </form>
        </div>

    </div>



</body>

<script>
    var modal = document.getElementById('categoryModal');

    // Get the button that opens the modal
    var btn = document.getElementById("addCategoryButton");

    // Get the <span> element that closes the modal
    var span = document.getElementById("closeButton");
    
	  var addbtn = document.getElementById("addButton");
    
    var editbtn = document.getElementById("editButton");
    
    // When the user clicks the button, open the modal 
    btn.onclick = function () {
        modal.style.display = "block";
        addbtn.style.display = "block";
        document.getElementById("addCatBlock").style.display = "block";
        editbtn.style.display = "none";
         document.getElementById("editCatBlock").style.display = "none"
    }

     
     // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }



		// for product modal

		var pmodal = document.getElementById('productModal');

    // Get the button that opens the modal
    var btn1 = document.getElementById("addProductButton");

    // Get the <span> element that closes the modal
    var span1 = document.getElementById("closeButton");
    
	  var addbtn1 = document.getElementById("addButton");
    
    
    // When the user clicks the button, open the modal 
    btn1.onclick = function () {
			pmodal.style.display = "block";
      addbtn1.style.display = "block";
      document.getElementById("addCatBlock1").style.display = "block";        
    }
  
     // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
			pmodal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
					pmodal.style.display = "none";
        }
    }

</script>


</html>


<?php 
    require_once('footer.php');
?>