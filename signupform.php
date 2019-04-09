<!DOCTYPE html>
<html>

<head>
    <title>Signup</title>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" crossorigin="anonymous"></script>
</head>
<style>
    body {font-family: Arial, Helvetica, sans-serif;
        height: 100vh;
        background-image: url('https://prmceam.ac.in/wp-content/uploads/2015/03/background-learner.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        overflow: scroll;
    }

    
    /* Full-width input fields */
    input[type=text], input[type=password], input[type=email] {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }
    
    /* Set a style for all buttons */
    button {
      background-color: #4CAF90;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 100%;
    }
    
    button:hover {
      opacity: 0.8;
    }
    
    /* Extra styles for the cancel button */
    .cancelbtn {
      width: auto;
      padding: 10px 18px;
      background-color: #f44336;
    }
    
    /* Center the image and position the close button */
    .imgcontainer {
      text-align: center;
      margin: 24px 0 12px 0;
      position: relative;
    }
    
    img.avatar {
      width: 40%;
      border-radius: 50%;
    }
    
    .container {
      padding: 16px;
    }
    
    span.psw {
      float: right;
      padding-top: 16px;
    }
    
    /* The Modal (background) */
    .modal {
      display: none; /* Hidden by default */
      position: fixed; /* Stay in place */
      z-index: 1; /* Sit on top */
      left: 0;
      top: 0;
      width: 100%; /* Full width */
      height: 100%; /* Full height */
      overflow: auto; /* Enable scroll if needed */
      background-color: rgb(0,0,0); /* Fallback color */
      background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
      padding-top: 60px;
    }
    
    /* Modal Content/Box */
    .modal-content {
      background-color: #fefefe;
      margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
      border: 1px solid #888;
      width: 60%; /* Could be more or less, depending on screen size */
    }
    
    /* The Close Button (x) */
    .close {
      position: absolute;
      right: 25px;
      top: 0;
      color: #000;
      font-size: 35px;
      font-weight: bold;
    }
    
    .close:hover,
    .close:focus {
      color: red;
      cursor: pointer;
    }
    
    /* Add Zoom Animation */
    .animate {
      -webkit-animation: animatezoom 0.6s;
      animation: animatezoom 0.6s
    }
    
    @-webkit-keyframes animatezoom {
      from {-webkit-transform: scale(0)} 
      to {-webkit-transform: scale(1)}
    }
      
    @keyframes animatezoom {
      from {transform: scale(0)} 
      to {transform: scale(1)}
    }
    
    /* Change styles for span and cancel button on extra small screens */
    @media screen and (max-width: 300px) {
      span.psw {
         display: block;
         float: none;
      }
      .cancelbtn {
         width: 100%;
      }
    }
    .d-flex {
        justify-content: center;
        align-items: center;
        display: flex;
    }
    .heightClass {
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    </style>

<body>

    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
        <div>
            <h2 class="d-flex">
                Signup
            </h2>
        </div>
        <div>
            <form class="modal-content animate" action="signup.php" method='POST'>

                <div class="container">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <label for="fname"><b>First Name</b></label>
                        <input required type="text" placeholder="First Name" name="first_name">
                    </div>

                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <label for="lname"><b>Last Name</b></label>
                        <input type="text" placeholder="Last Name" name="last_name">
                    </div>

                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <label for="email"><b>Email</b></label>
                        <input required type="email" placeholder="Email" name="email">
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <label for="pwd"><b>Password</b></label>
                        <input type="password" placeholder="Password" name="password" required>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <label for="pwd"><b>Repeat Password</b></label>
                        <input type="password" placeholder="Repeat Password" name="r-password" required>
                    </div>

                    <button type="submit" name='submit'>Signup</button>
                    <a href='mainLogin.php'><button type="button" name="Login">Login</button></a>
                </div>

                <!-- <div class="container" style="background-color:#f1f1f1">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
        <span class="psw">Forgot <a href="#">password?</a></span>
        </div> -->
            </form>
        </div>
    </div>


</body>

</html>
