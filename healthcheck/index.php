<?php
   $curl = curl_init('https://api.gettruehelp.com/api/get-survey-info');
   curl_setopt($curl, CURLOPT_POSTFIELDS, [
     'api_key' => 'QiCeyK4CspesJHUoVM5XP9MhY06gvIKFvomcbnZp5OLlN4bVrkgEFG0HLMJ2pNyMxXtcDplJ85LKEw02kz5WrANZLJifEa9K6iOWmUJkS4PAb5yYtGyJnz1oMdPyN4eTj5hkknvgkhcCUDX53qVvkfaBxV31ALynXt5k6mrL9y0w2ZjRaVbjkEBxeMNSexMMyxZcfO6L',
     'employee_id' => $_GET['eid'],
     'visitor_id' => $_GET['vid']
   ]);
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
   $res = curl_exec($curl);
   curl_close($curl);
   $response = json_decode($res);
   
   if (!isset($response->response->data)) {
     header('location : gettruehelp.com');
   }
?>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="msapplication-tap-highlight" content="no"/>
      <!-- Font Awesome -->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
      <!-- Google Fonts -->
      <link rel="stylesheet" href="css/montserratfont.css">
      <!-- Bootstrap core CSS -->
      <link href="css/bootstrap.css" rel="stylesheet">
      <!-- Material Design Bootstrap -->
      <link href="css/mdb.css" rel="stylesheet">
      <!-- local css -->
      <link href="css/style.css" rel="stylesheet">
      <link href="css/profile.css" rel="stylesheet" type="text/css">
      <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <meta name="description" content="">
      <meta name="author" content="">
      <title>TrueHelp</title>
      <style type="text/css">
         .blu {
            color: #338bea !important;
         }
      </style>
   </head>
   <body>
      <!--Navbar-->
      <nav class="navbar navbar-expand-lg navbar-light white">
         <a class="navbar-brand font-weight-bold" href="index.php" style=" font-size: 27px" >
         <img src="images/logo.png"  class ="logo-top" alt="mdb logo">&nbsp TrueHelp
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
                  <li class="nav-item">
                     <a class="nav-link font-weight-bold" style="font-size: 20px;" href="#">&nbsp &nbsp Home 
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link font-weight-bold" style="font-size: 20px" href="#">&nbsp &nbsp Services</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link font-weight-bold" style="font-size: 20px" href="#">&nbsp &nbsp Why Truehelp</a>
                  </li>
                  <li class="nav-item font-weight-bold">
                     <a class="nav-link font-weight-bold" style="font-size: 20px" href="#">&nbsp &nbsp About us</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link font-weight-bold" style="font-size: 20px" href="#">&nbsp &nbsp Contact us</a>
                  </li>
               </ul>
               <!-- Links -->
               <a href="#"> <span class="navbar font-weight-bold" style="border-radius: 25px; background-color: blue; color: white; width: 150px;font-size: 15px; margin-left: 20px">
               For Individuals    </span></a>&nbsp &nbsp
               <a href="#"><span class="navbar font-weight-bold" style="border-radius: 25px; background-color: blue; color: white; width:150px; font-size: 15px;margin-left: 20px ">
               For Business
               </span></a>
            </div>
         </div>
      </nav>
      <!--Navbar end-->
      <div class="container my-4">
         <h3 class="font-weight-bold blu">Hello
            <?php echo $response->response->data->employees->first_name ?? '' ?>,
         </h3>
         <h5 class="ver5" style="font-weight: 500;">
            <?php if($response->response->data->survey->survey_end == ''): ?>
               <span class="shade-bl">Screenings available for</span> 
            <?php else: ?>
               <span class="shade-bl">Screenings Completed for</span> 
            <?php endif; ?>
            <?php echo $response->response->data->employers->b2b_company_name ?? '' ?> ( 
            <?php echo $response->response->data->employers->b2b_brand_name ?? '' ?> )
               
         </h5>
      </div>

      <!-- cart -->
      <?php if($response->response->data->survey->survey_end == ''): ?>
         <a href="https://healthcheck.truehelp.io/?sid=<?php echo md5($response->response->data->survey->id); ?>" target="_blank">
            <div class="container">
               <div class="my-3 py-2 z-depth-1" style="background-color: rgb(253 253 253); border-radius: 20px" >
                  <section class="px-md-3 mx-md-3  text-lg-left dark-grey-text name-box">
                     <section class="at-a-glance-margin">
                        <div class="col-md-12 mb-md-0">
                           <h5 class="ver5">
                              <div class="d-flex align-items-stretch ">
                                 <div class="w-100 ver4 shade-bl">Awaiting response
                                 </div>
                                 <div class="flex-grow-1 ">
                                    <i class="fas fa-angle-right" style="font-size: 18px;"></i>
                                 </div>
                              </div>
                           </h5>
                           <h5 class="font-weight-bold ver4 blu"><?php echo $response->response->data->survey->created_at ? date('d M Y', strtotime($response->response->data->survey->created_at)) : '' ?></h5>
                        </div>
                     </section>
                  </section>
               </div>
            </div>
         </a>
      <?php else : ?>
         <?php if($response->response->data->survey->severity == 'RED'): ?>
            <div class="container">
               <div class="my-3 py-2 z-depth-1 border border-danger" style="background-color: rgb(253 253 253); border-radius: 20px;">
                  <section class="px-md-3 mx-md-3 text-lg-left dark-grey-text name-box">
                     <section class="at-a-glance-margin">
                        <div class="col-md-12 mb-md-0">
                           <h5 class="ver5">
                              <div class="d-flex align-items-stretch">
                                 <div class="w-100 ver4 shade-bl" style="color: #FC1102 ">
                                       Person is COVID positive
                                 </div>
                                 <div class="flex-grow-1 ">
                                    <!-- <i class="fas fa-angle-right" style="font-size: 18px; color: #fff;"></i> -->
                                 </div>
                              </div>
                           </h5>
                           <h5 class="font-weight-bold ver5" style="color: #000000;">
                              Screening completed
                           </h5>
                           <h5 class="font-weight-bold ver5 blu">
                              <?php echo $response->response->data->survey->created_at ? date('d M Y', strtotime($response->response->data->survey->created_at)) : '' ?>
                           </h5>
                        </div>
                     </section>
                  </section>
               </div>
            </div>
         <?php elseif($response->response->data->survey->severity == 'YELLOW'): ?>
            <div class="container">
               <div class="my-3 py-2 z-depth-1 border border-warning" style="background-color: rgb(253 253 253); border-radius: 20px;">
                  <section class="px-md-3 mx-md-3 text-lg-left dark-grey-text name-box">
                     <section class="at-a-glance-margin">
                        <div class="col-md-12 mb-md-0">
                           <h5 class="ver5">
                              <div class="d-flex align-items-stretch">
                                 <div class="w-100 ver4 shade-bl" style="color: #ddc40c ">
                                       Person is not safe today
                                 </div>
                                 <div class="flex-grow-1 ">
                                    <!-- <i class="fas fa-angle-right" style="font-size: 18px; color: #fff;"></i> -->
                                 </div>
                              </div>
                           </h5>
                           <h5 class="font-weight-bold ver5" style="color: #000000;">
                              Screening completed
                           </h5>
                           <h5 class="font-weight-bold ver5 blu">
                              <?php echo $response->response->data->survey->created_at ? date('d M Y', strtotime($response->response->data->survey->created_at)) : '' ?>
                           </h5>
                        </div>
                     </section>
                  </section>
               </div>
            </div>
         <?php elseif($response->response->data->survey->severity == 'GREEN'): ?>
            <div class="container">
               <div class="my-3 py-2 z-depth-1 border border-success" style="background-color: rgb(253 253 253); border-radius: 20px;">
                  <section class="px-md-3 mx-md-3 text-lg-left dark-grey-text name-box">
                     <section class="at-a-glance-margin">
                        <div class="col-md-12 mb-md-0">
                           <h5 class="ver5">
                              <div class="d-flex align-items-stretch">
                                 <div class="w-100 ver4 shade-bl" style="color: #11cb09 ">
                                       Person is safe today
                                 </div>
                                 <div class="flex-grow-1 ">
                                    <!-- <i class="fas fa-angle-right" style="font-size: 18px; color: #fff;"></i> -->
                                 </div>
                              </div>
                           </h5>
                           <h5 class="font-weight-bold ver5" style="color: #000000;">
                              Screening completed
                           </h5>
                           <h5 class="font-weight-bold ver5 blu">
                              <?php echo $response->response->data->survey->created_at ? date('d M Y', strtotime($response->response->data->survey->created_at)) : '' ?>
                           </h5>
                        </div>
                     </section>
                  </section>
               </div>
            </div>
         <?php else: ?>
         <h5 class="ver5"><span class="medium-bl">Contact to your admin before coming.</h5>
         <?php endif; ?>
      <?php endif; ?>
      <div class="container" style="padding-left: 2rem !important;padding-top: 2rem !important;"><h2 class="font-weight-bold ver4" style="color: #000000;">History</h2></div>
      <?php foreach ($response->response->data->old_survey as $key => $value): ?>
         <?php
            if($value->severity == 'GREEN'){
               $color = '#11cb09';
               $border = 'border border-success';
            } elseif($value->severity == 'RED'){
               $color = '#FC1102';
               $border = 'border border-danger';
            } elseif($value->severity == 'YELLOW'){
               $color = '#FFE000';
               $border = 'border border-warning';
            } else {
               $color = '#5d5c5a85';
               $border = 'border';
            }
            if($key != 0):
         ?>
            <div class="container">
               <div class="my-3 py-2 z-depth-1 <?php echo $border; ?>" style="background-color: rgb(253 253 253); border-radius: 20px;">
                  <section class="px-md-3 mx-md-3 text-lg-left dark-grey-text name-box">
                     <section class="at-a-glance-margin">
                        <div class="col-md-12 mb-md-0">
                           <h5 class="ver5">
                              <div class="d-flex align-items-stretch">
                                 <div class="w-100 ver4 shade-bl" style="color: <?php echo $color; ?>">
                                    <?php if($value->survey_end == ''): ?>
                                       Screening not done
                                    <?php else: ?>
                                       <?php if($value->severity == 'GREEN'): ?>
                                       Screening done - Safe
                                       <?php elseif($value->severity == 'RED'): ?>
                                          Screening done - Positive
                                       <?php elseif($value->severity == 'YELLOW'): ?>
                                          Screening done - Unsafe
                                       <?php endif; ?>
                                    <?php endif; ?>
                                 </div>
                                 <div class="flex-grow-1 ">
                                    <!-- <i class="fas fa-angle-right" style="font-size: 18px; color: #fff;"></i> -->
                                 </div>
                              </div>
                           </h5>
                           <h5 class="font-weight-bold ver4 blu">
                              <?php echo $response->response->data->survey->created_at ? date('d M Y', strtotime($value->created_at)) : '' ?>
                           </h5>
                        </div>
                     </section>
                  </section>
               </div>
            </div>
         <?php endif; ?>
      <?php endforeach; ?>

      <!-- card end -->
      <div class="container img-section">
         <center> <img src="images/health.png" class="img-fluid"></center>
      </div>
      <!-- Footer -->
      <footer class="page-footer font-small indigo" >
      <!-- Footer Links -->
      <div class="container text-center text-md-left">
         <!-- Grid row -->
         <div class="row">
            <!-- Grid column -->
            <div class="col-md-3 mx-auto">
               <br>
               <!-- Links -->
               <a class="navbar-brand font-weight-bold" href="https://www.gettruehelp.com" target="_blank" style="color: rgb(255 255 255); font-size: 27px" >
                <img src="images/logo.png" class="logo-top" alt="mdb logo">&nbsp TrueHelp
               </a>
            </div>
            <!-- Grid column -->
            <hr class="clearfix w-100 d-md-none">
            <!-- Grid column -->
            <div class="col-md-3 mx-auto">
               <br>
               <!-- Links -->
               <h5 class="font-weight-bold text-uppercase mt-3 mb-4">services</h5>
               <ul class="list-unstyled">
                  <li>
                     <a href="#!" target="_blank">ID Verification</a>
                  </li>
                  <li>
                     <a href="#!" target="_blank">Criminal Verification</a>
                  </li>
                  <li>
                     <a href="#!" target="_blank">Address Verification</a>
                  </li>
                  <li>
                     <a href="#!" target="_blank">Employee Self Onboarding</a>
                  </li>
                  <li>
                     <a href="#!" target="_blank">Employee Self Health Check</a>
                  </li>
               </ul>
            </div>
            <!-- Grid column -->
            <hr class="clearfix w-100 d-md-none">
            <!-- Grid column -->
            <div class="col-md-3 mx-auto">
               <br>
               <!-- Links -->
               <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Company</h5>
               <ul class="list-unstyled">
                  <li>
                     <a href="#!" target="_blank">Privacy Policy</a>
                  </li>
                  <li>
                     <a href="#!" target="_blank">Terms and Conditions</a>
                  </li>
                  <li>
                     <a href="#!" target="_blank">Certificates</a>
                  </li>
                  <li>
                     <a href="#!" target="_blank">About Us</a>
                  </li>
               </ul>
            </div>
            <!-- Grid column -->
            <hr class="clearfix w-100 d-md-none">
         </div>
         <!-- Grid row -->
      </div>
      <!-- Footer Links -->
      <div class="footer-copyright text-center py-3">
         <!-- Facebook -->
         <a class="fb-ic">
         <i class="fab fa-facebook-f fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
         </a>
         <!-- Twitter -->
         <a class="tw-ic">
         <i class="fab fa-twitter fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
         </a>
         <!--Linkedin -->
         <a class="li-ic">
         <i class="fab fa-linkedin-in fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
         </a>
      </div>
      <!-- Copyright -->
      <div class="footer-copyright text-center py-3">&copy; 2020 Copyright <a href="https://www.gettruehelp.com" target="_blank">Project91 Advance Technologies Private Limited</a>. All Rights Reserved.
      </div>
      <!-- Copyright -->
      <!-- JQuery -->
      <script type="text/javascript" src="js/jQuery.js"></script>
      <!-- Bootstrap tooltips -->
      <script type="text/javascript" src="js/popper.js"></script>
      <!-- Bootstrap core JavaScript -->
      <script type="text/javascript" src="js/bootstrap.js"></script>
      <!-- MDB core JavaScript -->
      <script type="text/javascript" src="js/mdb.js"></script>
      <!-- local javascript -->
      <script type="text/javascript" src="bot-js/bot-js.js"></script>
   </body>
</html>
