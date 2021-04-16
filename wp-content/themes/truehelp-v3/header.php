<!DOCTYPE html>
<html>
  <head>
    <title>TrueHelp - India's first ML/AI based complete, comprehensive and continuous verification&trade; service for employees. Take an
    informed decision before hiring your next maid, driver, gardener or just about any employee for your home or office. We help you get their Aadhar verified, background verification and criminal history checked.</title>
    <meta name="description" content="TrueHelp&trade; - India's first ML/AI based complete, comprehensive and continuous verification&trade; service for employees. Take an informed decision before hiring your next maid, driver, gardener or just about any employee for your home or office. We help you get their Aadhar verified, background verification and criminal history checked.">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <?php wp_head(); ?>
    <style type="text/css">
      p,par{
    font-size: 21px;
    font-weight: 400;
    color: black;
}
		
.but{
	background-color: blue;
	color: white ;
	display:block;
}
 
		




    </style>
	  <script>
		  function counterFunction(){
			
						  
		  }
		  
		  // // change picture
    
function picchange1()
  {
  
document.getElementById("why").src="https://www.gettruehelp.com/wp-content/uploads/2020/10/why1.png";
document.getElementById("b1").classList.add("btnn-primary");
document.getElementById("b2").classList.remove("btnn-primary");
document.getElementById("b3").classList.remove("btnn-primary");
document.getElementById("b4").classList.remove("btnn-primary");
document.getElementById("b5").classList.remove("btnn-primary");
}
function picchange2()
  {
  
document.getElementById("why").src="https://www.gettruehelp.com/wp-content/uploads/2020/10/screen.png";
document.getElementById("b2").classList.add("btnn-primary");
document.getElementById("b1").classList.remove("btnn-primary");
document.getElementById("b3").classList.remove("btnn-primary");
document.getElementById("b4").classList.remove("btnn-primary");
document.getElementById("b5").classList.remove("btnn-primary");
}
function picchange3()
  {
  
document.getElementById("why").src="https://www.gettruehelp.com/wp-content/uploads/2020/10/screen1.png";
document.getElementById("b3").classList.add("btnn-primary");
document.getElementById("b1").classList.remove("btnn-primary");
document.getElementById("b2").classList.remove("btnn-primary");
document.getElementById("b4").classList.remove("btnn-primary");
document.getElementById("b5").classList.remove("btnn-primary");
}
function picchange4()
  {
  
document.getElementById("why").src="https://www.gettruehelp.com/wp-content/uploads/2020/10/why1.png";
document.getElementById("b4").classList.add("btnn-primary");
document.getElementById("b1").classList.remove("btnn-primary");
document.getElementById("b2").classList.remove("btnn-primary");
document.getElementById("b3").classList.remove("btnn-primary");
document.getElementById("b5").classList.remove("btnn-primary");

}
function picchange5()
  {
  
document.getElementById("why").src="https://www.gettruehelp.com/wp-content/uploads/2020/10/screen1.png";
document.getElementById("b5").classList.add("btnn-primary");
document.getElementById("b1").classList.remove("btnn-primary");
document.getElementById("b2").classList.remove("btnn-primary");
document.getElementById("b3").classList.remove("btnn-primary");
document.getElementById("b4").classList.remove("btnn-primary");
}




// picture change end
		  

		  
		


	  
	  </script>
	  
	 
   
  </head>
  <body onload="counterFunction()">
    <!--Navbar-->
    
    <nav class="navbar navbar-expand-lg navbar-light white " style="border-bottom:1px solid #000;box-shadow: none;border-color: rgb(199 197 197);" >
      
      <a class="navbar-brand font-weight-bold" href="home" style="color: #0854fe; font-size: 27px" >
        <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png"  class ="logo-top" alt="TrueHelp Logo" >&nbsp TrueHelp
      </a>
      <!-- Collapse button -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
      aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="container">
        <!-- Collapsible content -->
        <div class="collapse navbar-collapse" id="basicExampleNav">
          <!-- Links -->
          <ul class="navbar-nav mr-auto">
            <li class="nav-item " id="actii1">
              <a class=" nav-link font-weight-normal" href="/" style="font-size: 20px; " onclick="change1()">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>&nbsp &nbsp
            <!-- Dropdown -->
            <li class="nav-item dropdown"  id="actii2">
              <a class="nav-link dropdown-toggle font-weight-normal" id="navbarDropdownMenuLink" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false" style="font-size: 20px" onclick="change2()">Verification</a>
              <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item font-weight-normal" href="aadhar-verification" style="font-size: 20px">ID Verification</a>
                <a class="dropdown-item font-weight-normal" href="criminal-background-check" style="font-size: 20px">Criminal Record Verification</a>
                <a class="dropdown-item font-weight-normal" href="address-verification" style="font-size: 20px">Address Verification</a>
				   <a class="dropdown-item font-weight-normal" href="health-check" style="font-size: 20px">Health Check Verification</a>
                <a class="dropdown-item font-weight-normal" href="#" style="font-size: 20px">Employment Verification</a>
                <a class="dropdown-item font-weight-normal" href="#" style="font-size: 20px">Education Verification</a>
              </div>
            </li>&nbsp &nbsp
            <!-- Dropdown -->
            <li class="nav-item dropdown"  id="actii2">
              <a class="nav-link dropdown-toggle font-weight-normal" id="navbarDropdownMenuLink" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false" style="font-size: 20px" onclick="change2()" href="/health-check">Health Check</a>
              <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item font-weight-normal" href="/employee-health-check" style="font-size: 20px">For Corporates</a>
                <a class="dropdown-item font-weight-normal" href="/school-health-check" style="font-size: 20px">For Schools</a>
              </div>
            </li>&nbsp &nbsp
            <li class="nav-item font-weight-normal"  id="actii4">
              <a class="nav-link" style="font-size: 20px" href="/aboutus" onclick="change4()">About Us</a>
            </li>&nbsp &nbsp
            <li class="nav-item font-weight-normal"  id="actii5">
              <a class="nav-link" style="font-size: 20px" href="#contact" onclick="change5()">Contact us</a>
            </li>
            
          </ul>
          <!-- Links -->
          <!--  change -->
          <script type="text/javascript">
          
          function change1()
          {
          document.getElementById("actii1").classList.add("active");
          document.getElementById("actii2").classList.remove("active");
          document.getElementById("actii3").classList.remove("active");
          document.getElementById("actii4").classList.remove("active");
          document.getElementById("actii5").classList.remove("active");
          }
          function change2()
          {
          
          document.getElementById("actii2").classList.add("active");
          document.getElementById("actii1").classList.remove("active");
          document.getElementById("actii3").classList.remove("active");
          document.getElementById("actii4").classList.remove("active");
          document.getElementById("actii5").classList.remove("active");
          }
          function change3()
          {
          document.getElementById("actii3").classList.add("active");
          document.getElementById("actii1").classList.remove("active");
          document.getElementById("actii2").classList.remove("active");
          document.getElementById("actii4").classList.remove("active");
          document.getElementById("actii5").classList.remove("active");
          }
          function change4()
          {
          document.getElementById("actii4").classList.add("active");
          document.getElementById("actii1").classList.remove("active");
          document.getElementById("actii2").classList.remove("active");
          document.getElementById("actii3").classList.remove("active");
          document.getElementById("actii5").classList.remove("active");
          }
          function change5()
          {
          document.getElementById("actii5").classList.add("active");
          document.getElementById("actii1").classList.remove("active");
          document.getElementById("actii2").classList.remove("active");
          document.getElementById("actii3").classList.remove("active");
          document.getElementById("actii4").classList.remove("active");
          }
          </script>
          <!-- picture change end -->
          <a href="/individuals"> <span class="navbar font-weight-bold" style="background-color: #0854fe; color: white; width: 150px;font-size: 15px; ">
          For Individuals</span></a>&nbsp &nbsp
          
          <a href="/business"><span class="navbar font-weight-bold" style="background-color: #0854fe; color: white; width:150px; font-size: 15px">
            For Businesses
          </span></a>
        </div>
      </div>
    </nav>
    <!--Navbar end-->

