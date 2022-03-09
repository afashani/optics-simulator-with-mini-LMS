<!DOCTYPE html>
<html lang="en">

<head>

	<!-- META ============================================= -->
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	
	
	<!-- PAGE TITLE HERE ============================================= -->
	<title>Optics Simulator </title>
	
	
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../assets/css/main.css"> 

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	
</head>
<body id="bg">
<div class="page-wrapper">

	
					<!-- Navigation Menu ==== -->
					<?php include '../include/header2.php' ?>
					<!-- Navigation Menu END ==== -->
               
	
    <!-- Header Top END ==== -->
    <!-- Content -->
	
    <div class="content">
        <div class = "bg-light head">
            <h1 class=" heading">Welcome To Wisdom Institution</h1>
        </div>
            <?php

            if(isset( $_SESSION['stdname'])){
                $content="";
            }else{
                $content="<a class='sign-in' style='margin: 15px;' href='login.php'>Sign In</a>
            <a class='sign-up' style='margin: 15px;' href='register.php'>Sign Up</a>";
            }
            echo $content;

            ?>
        

	</div>


	<!-- Footer ==== -->
    <footer>
		<?php include '../include/footer.html' ?> 
		
	</footer>
    <!-- Footer END ==== -->
	
</div>

<!-- External JavaScripts -->

</body>

</html>
