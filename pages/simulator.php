<?php
if(!isset($_SESSION)){
    session_start();
}

$isDisplay="";
if(!isset( $_SESSION['stdId'])){
    header("location:login.php");
    $_SESSION['from_simulator']="You have to log in before use simulator";
}

?>

<!DOCTYPE html>
<head>
    <title>Optics Simulator</title>
    	
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
  
    <style> 
    main{
        position: relative;
    }
        canvas#defaultCanvas0{
            position: relative;
            width: 100% !important;
            height: calc(100vh - 100px) !important;
            padding: 0 5%;
        }
        table{
          background: rgba(255, 255, 255, 0.671);
        }
    </style>
</head>
<body id="bg">

    <script src="../include/p5.js" type="text/javascript"></script>
    <script src="../include/simulator.js" type="text/javascript"></script>
    <?php include '../include/header2.php' ?>
    
    <main>
    </main>   
    
    
    <div class="container">
    <div class="details">
        <h1>
            Properties
        </h1>
        <table class="table">
  <thead>
    <tr>
      <th scope="col" class="size">Size</th>
      <th scope="col" class="attitude">Attitude</th>
    </tr>
    <tr>
          <th scope="col" class="location">Location</th>
          <th scope="col" class="type">Type</th>
        </tr>
  </thead>
</table>
    </div>
    </div>
   
    <!-- Footer ==== -->
        <footer>
		<?php include '../include/footer.html' ?> 
		
	</footer>
    <!-- Footer END ==== -->
</body>
</html>