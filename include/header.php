<header class="header rs-nav header-transparent">
    <!-- <div class="container"> -->
        <div class="row d-flex justify-content-between">
			
            <div class="col-md-2">
                <!-- <img src="../assets/images/logo2.png" alt="logo"> -->
            </div>
			<div class="col-md-10">
				<div class="top-bar">
					<div class="top-bar-left">
						<ul>
							<li><a href="#">Admin</a></li>
							<li><a href="#"></i>Student</a></li>
						</ul>
					</div>
				</div>
				
			</div>
			<div class="row">
				<div class="col-md-12 col-12-navbar">
					<div class="sticky-header navbar-expand-lg">
						<div class="menu-bar clearfix">
							<div class="clearfix">								
								<div class="nav-list">
									<div  class="menu-links navbar-collapse collapse justify-content-start"  id="menuDropdown">
										<ul class="navbar-nav">	
											<li class="active-home">
												<a class= "one-link" href="#">Home </a>
											</li>
											<li class = "pages">
												<a class = "one-link" href="#">Pages <i class="fa fa-chevron-down"></i></a>
													<ul class="sub-menu1">
														<li>
															<a class= "one-link" href="profile.html">Profile</a>
														</li>
														<li class ="activities">
															<a class= "one-link" href="#">Activities <i class="fa fa-chevron-right"></i></a>
																<ul class="sub-menu">
																	<li>
																		<a class= "one-link" href="#">Uploaded Activities</a>
																	</li>
																	<li>
																		<a class= "one-link" href="#">Upcoming Activities</a>
																	</li>
																</ul>
														</li>
														<li><a class= "one-link" href="#">About Us</i></a></li>
														<li><a class= "one-link" href="#">FAQ's</a></li>
														<li><a class= "one-link" href="#">Contact Us</i></a></li>
												</ul>
											</li>
											
											
											<li class="nav-dashboard">
												<a class= "one-link" href="javascript:;">Dashboard <i class="fa fa-chevron-down"></i></a>
												<ul class="sub-menu2">
													<li><a class= "one-link" href="#">Dashboard</a></li>
													<li><a class= "one-link" href="#">Courses</a></li>
													<li><a class= "one-link" href="#">Review</a></li>
													<li><a class= "one-link" href="#">Teacher Profile</a></li>
													
												</ul>
											</li>
											<li class="nav-simulator">
												<a class=one-link href="javascript:;">Optics Simulator <i class="fa fa-chevron-down"></i></a>
												<ul class="sub-menu3">
													<li><a class= "one-link" href="admin/index.html">How to Use</a></li>
													<li><a class= "one-link" href="admin/courses.html">Simulator</a></li>
													
												</ul>
											</li>
										
										<div class="nav-social-link"> 
											<!-- Search Button ==== -->
											<!-- <input type="text" class = "search" placeholder="Search.." name="search2">
											<button type="submit"><i class="fa fa-search"></i></button> -->
											<a class= "one-link" href="javascript:;"><i class="fa fa-facebook"></i></a>
											<a class= "one-link" href="javascript:;"><i class="fa fa-google-plus"></i></a>
											<a class= "one-link" href="javascript:;"><i class="fa fa-linkedin"></i></a>
										</ul>	
										</div> 
									</div>
								
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
            
        </div>
    <!-- </div> -->
	<script>
		window.onscroll = function() {myFunction()};

		var navbar = document.getElementById("menuDropdown");
		var sticky = navbar.offsetTop;

		function myFunction() {
		if (window.pageYOffset >= sticky) {
			navbar.classList.add("sticky")
		} else {
			navbar.classList.remove("sticky");
		}
		}
	</script>  
</header>

