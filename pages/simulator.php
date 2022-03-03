<!DOCTYPE html>
<head>
    <title>Optics Simulator</title>
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
    </style>
</head>
<body id="bg">

    <script src="../include/p5.js" type="text/javascript"></script>
    <script src="../include/simulator.js" type="text/javascript"></script>
    <?php include '../include/header2.html' ?> 
    
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