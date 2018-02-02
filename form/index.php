<?php include('../includes/prepend.php');
$glip = new IDCC_forms;
?>
<?php 
  if(isset($_POST['ftype']) && isset($_POST['church']) && isset($_POST['purpose']) && isset($_POST['Recurring']) && isset($_POST['dname']) && isset($_POST['dqid']) && isset($_POST['Vehicle']) && isset($_POST['phone']) && isset($_POST['pname']) && isset($_POST['pqid']) && isset($_POST['Contractname']) && isset($_POST['expdate']) && isset($_POST['hrin']) && isset($_POST['hrout'])){
    if(isset($_POST['Material']) && !empty($_POST['Material'])){
      $material = trim(htmlenties($_POST['Material']));
    }else{
      $material = 'none';
    }
    $type= trim(htmlentities($_POST['ftype']));
    $requesting_entity = trim(htmlentities($_POST['church']));
    $purpose_visit = trim(htmlentities($_POST['purpose']));
    $frequency = trim(htmlentities($_POST['Recurring']));
    $driver_name = trim(htmlentities($_POST['dname']));
    $driver_qid = trim(htmlentities($_POST['dqid']));
    $vehicle_number = trim(htmlentities($_POST['Vehicle']));
    $phone_number = trim(htmlentities($_POST['phone']));
    $passengers = trim(htmlentities($_POST['pname']));
    $passanger_qids = trim(htmlentities($_POST['pqid']));
    $employee = trim(htmlentities($_POST['Contractname']));
    $date = trim(htmlentities($_POST['expdate']));
    $time_in = trim(htmlentities($_POST['hrin']));
    $time_out = trim(htmlentities($_POST['hrout']));

    $feedback = $glip->submitForm($type, $requesting_entity, $purpose_visit, $frequency, $driver_name, $driver_qid, $vehicle_number, $phone_number, $passengers, $passanger_qids, $employee, $material, $date, $time_in, $time_out);

  }
?>
<!DOCTYPE html>
<html  lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Background | IDCC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <!-- Google Font -->
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Allerta+Stencil:400,700,900:normal" rel="stylesheet" type="text/css">
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <!-- Plugins CSS -->
    <link href="assets/css/normalize.css" type="text/css" rel="stylesheet" />
    <link href="../css/main.css" type="text/css" rel="stylesheet" />
    <link href="assets/css/iline-icons.css" type="text/css" rel="stylesheet" />
    <link href="assets/css/animate.css" type="text/css" rel="stylesheet" />
    <!--jquery -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- Main CSS -->
    <link href="assets/css/style.css" type="text/css" rel="stylesheet" />
    <link href="assets/css/responsive.css" type="text/css" rel="stylesheet" />
    <!-- Shortcut icon -->
  
  </head>
  <body>
    <!-- NAVIGATION START -->
    <nav class="navbar navbar-default">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
         <br><br>
             <a  href="index.html"> <img src="assets/images/logos.png" class="img-responsive" />
            </a>
          </div><br><br>
<h1 style="color:white;"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"Behold, how good and how pleasant<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp it is for brethren to dwell together in unity!" <font size="1">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp(Psalms: 133:1)</font></p></h1>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="navbar-collapse-1">
            <ul class="nav navbar-nav">
             
               <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">About Us

 <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li>
                    <a  href="bgg.html">
                      Background
                    </a>
                  </li>
                  <li>
                    <a  href="bg.html">
                     Establishment                    </a>
                  </li>
                  <li>
                    <a  href="products.html">
                      Organization Chart

                    </a>
                  </li>
                  <li>
                    <a  href="team.html">
                      Office Bearers


                    </a>
                  </li>
                 
                </ul>
              </li>
              

<li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">News &amp; Events

<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li>
                    <a  href="#">
                     Announcements
                    </a>
                  </li>
                  <li>
                    <a  href="#">
                     
Upcoming Events
              </a>
                  </li>
                  <li>
                    <a  href="#">
                     Circulars

                    </a>
                  </li>
<li>
                    <a  href="archives.html">
                     Archives
                    </a>
                  </li>
                 
                 
                </ul>
              </li>   
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Member Churches

 <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li>
                     <a target="_blank" href="brethren.html">
                      Brethren Churches 

                    </a>
                  </li>
                  <li>

                     <a href="#">
                       Doha Tamil Churches

                    </a>
                  </li>
                  <li>
                    <a target="_blank"  href="http://imtcdoha.com/">
                      Immanuel Mar Thoma Church

                    </a>
                  </li>
                  <li>
                    <a target="_blank"  href="http://mocdoha.org/">
                      Malankara Orthodox Church  

                    </a>
                  </li>
                  <li>
                     <a target="_blank"  href="pentecostal.html">
                      Pentecostal Churches

                    </a>
                  </li>
                  <li>
                    <a target="_blank"  href="http://smccqatar.com/">
                      St. Mary’s Malankara Church  

                    </a>
                  </li>
                  <li>
                    <a target="_blank"  href="https://en.wikipedia.org/wiki/St._Thomas_Evangelical_Church">
                      St. Thomas Evangelical Church 

                    </a>
                  </li>

<li>
                    <a target="_blank"  href="https://en.wikipedia.org/wiki/Church_of_South_India">
                      St. Thomas CSI Church  
                    </a>
                  </li>

<li>
                    <a target="_blank"  href="http://www.syromalabarqatar.com/Home.php">
                      St. Thomas Syro Malabar Church 

                    </a>
                  </li>

<li>
                    <a target="_blank"  href="#">
                                            Telugu Christian Fellowship  

                    </a>
                  </li>

<li>
                    <a target="_blank"  href="https://en.wikipedia.org/wiki/The_Pentecostal_Mission">
                      The Pentecostal Mission  

                    </a>
                  </li>

                </ul>
              </li>


<li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> Media Gallery

 <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li>
                    <a  href="#">
                      Photo Gallery
                    </a>
                  </li>
                  <li>
                    <a  href="#">
                     Video Gallery
              </a>
                  </li>
                  
                 
                </ul>
              </li>


<li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Policies

 <span class="caret"></span></a>
                <ul class="dropdown-menu">

<li>
                    <a  href="manual.html">
                      IDCC Manual
                    </a>
                  </li>
                  <li>
                    <a  href="f%26s.html">
                      Fire &amp; Safety Policy
                    </a>
                  </li>
                  <li>
                    <a  href="privacy-policy.html">
                      Privacy Policy
              </a>
                  </li>
                  <li>
                    <a  href="mp.html">
                       Maintenance Policy

                    </a>
                  </li>
                 
                 
                </ul>
              </li>
              
              


               <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Committees

 <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li>
                    <a  href="council-coordintrs.html">
                      Council Coordinators 
                    </a>
                  </li>
                  <li>
                    <a  href="executive-council.html">
                     Executive Council

              </a>
                  </li>
                  <li>
                    <a  href="features.html">
                     General Council

                    </a>
                  </li>
                  <li>
                    <a  href="safety.html">
                     Safety &amp; Security committee


                    </a>
                  </li>
 <li>
                    <a  href="maintance.html">
                      Maintenance Committee


                    </a>
                  </li>
 <li>
                    <a  href="special- project-commettee.html">
                     Special Project Committee


                    </a>
                  </li>
 
                 
                </ul>
              </li>
              

              

             <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> 

Contact Us

 <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li>
                    <a  href="downloads/Religious Complex Site Plan.pdf" target="_blank"">
                     Religious Complex Site Plan
                    </a>
                  </li>
                  <li>
                    <a  href="downloads/IDCC Site Plan.pdf" target="_blank""">
                   IDCC Complex Site Plan
              </a>
                  </li>
                  <li>
                    <a  href="contact-copy.html">
                   Address & Route Map

                    </a>
                  </li>

 </li>
                  <li>
                    <a  href="forms.php">
                  Form Center
                    </a>
                  </li>
                 
 <li>
              <!-- <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">More <span class="caret"></span></a>
                <ul class="dropdown-menu">
               
                  <li><a class="#" href="#">News & Events</a></li>
                  <!--<li><a class="text-success" href="sign-up.html">Sign Up</a></li>
                  <li><a href="#"  >About</a></li>
                  <li><a href="#"  >Terms</a></li>
                  <li><a href="#"  >Contact</a></li>
                  <!--<li><a href="icons.html"  >Icons</a></li>
                  <li><a href="typography.html"  >Typography</a></li>
                </ul>
              </li>
            </ul>-->
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
      </nav>
    </header>
    <!-- NAVIGATION END -->
    <!-- MAIN CONTAINER -->
    <!--<div class="main-content">-->
      <!-- HEADER TREE -->
    
      <!-- HEADER TREE END -->
      <!-- FEATURES INTRODUCTION SECTION -->
      <section>
        <!-- .container -->
        <div class="container">
          <!-- .row -->
           <div class="row">
            <!-- .col-md-12 -->
            <div class="col-md-12">
                <h2>IDCC Forms/ Formats</h2>
             </div>
           
            <!-- /.col-md-12 -->
          </div>
          <div class="row">
            <!-- .col-md-12 -->
            <div class="col-md-1">
                
             </div>
            <div class="col-md-10">
            <?php if(isset($feedback)){
              echo '<span class="feedback">',$feedback,'</span>'; 
            }
            ?>
                <form action=""  method="post">
                    <div class="form-group">
                    <label for="ftype">Form Type</label>
                    <select id="ftype" class="form-control"  name="ftype" onchange="formtypes(this.value)"  required style="height : 40px" >
                      
                        <option value="Vehicle Access Permit" >Vehicle Access Permit</option>
                        <option value="Work Permit/Parking Permit" >Work Permit/Parking Permit</option>
                        <option value="Material Exit Pass" >Material Exit Pass</option>
                        <option value="Letters" >Letters</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                    <label for="exampleInputEmail1">Requesting Entity</label>
                    <select class="form-control"  name="church" required style="height : 40px">
                      <option value="IDCC Admin" >IDCC Admin</option>
                        <option value="Brethren Churches" >Brethren Churches</option>
                        <option value="Doha Tamil Churches" >Doha Tamil Churches</option>
                        <option value="Immanuel Mar Thoma Church" >Immanuel Mar Thoma Church</option>
                        <option value="Malankara Orthodox Church" >Malankara Orthodox Church</option>
                        <option value="Pentecostal Churches" >Pentecostal Churches</option>
                        <option value="St. Mary’s Malankara Church" >St. Mary’s Malankara Church</option>
                        <option value="St. Thomas Evangelical Church" >St. Thomas Evangelical Church</option>
                        <option value="St. Thomas CSI Church" >St. Thomas CSI Church</option>
                        <option value="St. Thomas Syro Malabar Church" >St. Thomas Syro Malabar Church</option>
                        <option value="Telugu Christian Fellowship" >Telugu Christian Fellowship</option>
                        <option value="The Pentecostal Mission" >The Pentecostal Mission </option>
                    </select>
                    </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1">Purpose of Visit</label>
                    <input type="text" pattern="^[A-Za-z\s]+$" class="form-control" id="exampleInputEmail1" name="purpose" required >  
                    </select>
                    </div> 
                    <div class="form-group">
                    <label for="exampleInputEmail1"> Recurring Frequency</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" min="1" name="Recurring" required >
                    </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1"> Driver's Name</label>
                    <input type="text" pattern="^[A-Za-z\s]+$" class="form-control" id="exampleInputEmail1" name="dname" required>
                    </div>
                     <div class="form-group">
                    <label for="exampleInputEmail1">Driver's QID</label>
                    <input type="text" pattern="^[0-9]+$" minlength="11" maxlength="11" class="form-control" id="exampleInputEmail1" name="dqid" required>
                    </div>
                    <!--
                    <div class="form-group">
                    <label for="exampleInputEmail1">Driver's Licensee Number</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="License" required>
                    </div>
                    -->
                     <div class="form-group">
                    <label for="exampleInputEmail1">Vehicle Plate Number</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="Vehicle" required>
                    </div>
                     <div class="form-group">
                    <label for="exampleInputEmail1">Cell Number</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" name="phone" required>
                    </div>
                    <div class="form-group"  id="container">
                   <table class="table"><tr><td style="width: 50%">
                               <label for="exampleInputEmail1">Passenger Name</label></td>
                           <td> <label for="exampleInputEmail1">QID</label></td>
                          </tr><tr><td>
                               <input type="text" pattern="^[A-Za-z\s]+$"  class="form-control"  name="pname" placeholder="Name" required>
                           </td><td>
               
                               <input type="text" pattern="^[0-9]+$" minlength="11" maxlength="11" class="form-control" name="pqid" placeholder="QID" required>
                 </td>
                          </tr></table>  
                </div>
                      
                    <div class="form-group">
                    <label for="exampleInputEmail1">Contract/Employee - Name</label>
                    <input type="text" pattern="^[A-Za-z\s]+$" class="form-control" id="exampleInputEmail1" name="Contractname" required>
                    </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1">Material if any</label>
                    <textarea  id="exampleInputEmail1" name="Material"></textarea>
                    </div>
                    
                    <div class="form-group">
                    <label for="exampleInputEmail1">date</label>
                    <input type="text" id="datepicker" class="form-control" name="expdate"  required>
                    </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1">Time In</label>
                    <table class="table">
                        <tr>
                            <td>
                                <select class="form-control" name="hrin" required>
                                    <?php 
                                     $max_hr = 13;
                                     $tid= 'AM';
                                      for($hr=1; $hr<$max_hr; $hr++){
                                        echo '<option value="'.$hr.' '.$tid.'">'.$hr.' '.$tid.'</option>';
                                      }
                                     ?>
                                     <?php 
                                     $max_hr = 13;
                                     $tid= 'PM';
                                      for($hr=1; $hr<$max_hr; $hr++){
                                        echo '<option value="'.$hr.' '.$tid.'">'.$hr.' '.$tid.'</option>';
                                      }
                                     ?>
                                </select>
                            </td>
                        </tr>
                    </table>
                    </div>
                    
                    <div class="form-group">
                    <label for="exampleInputEmail1">Time Out</label>
                    <table class="table">
                        <tr>
                            <td>
                                <select class="form-control" name="hrout" required>
                                  <?php 
                                    $max_hr = 13;
                                    $tid= 'AM';
                                    for($hr=1; $hr<$max_hr; $hr++){
                                      echo '<option value="'.$hr.' '.$tid.'">'.$hr.' '.$tid.'</option>';
                                    }
                                    ?>
                                    <?php 
                                    $max_hr = 13;
                                    $tid= 'PM';
                                    for($hr=1; $hr<$max_hr; $hr++){
                                      echo '<option value="'.$hr.' '.$tid.'">'.$hr.' '.$tid.'</option>';
                                    }
                                  ?>  
                                </select>
                            </td>
                        </tr>
                    </table>
                    </div>
                    
                    <div id="txtHint1">
                        
                    </div>
                    <div class="form-group" id="submitdiv">
                        <input type="submit" class="btn-info form-control" style="background-color: #337ab7; color: white; height: 40px" id="exampleInputEmail1" value="Submit">
                    </div>
                </form>
                
             </div>
            <div class="col-md-1">
                
             </div>
            <!-- /.col-md-12 -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container -->
      </section>
      <!-- FEATURES INTRODUCTION SECTION END -->
      <!-- FEATURES BODY SECTION -->
      
      <!-- FEATURES BODY SECTION END -->
      
<br><br><br><br><br><br><br><br><br><br><!-- BEGIN FOOTER -->
        <footer class="page-footer">
        <!-- FOOTER CONTENT -->
        <div class="container">
          <!-- .row -->
          <div class="row">
            <!-- .col-md-12 -->
            <div class="col-md-12">
              <!-- .row -->
              <!--<div class="row">
                <aside class="col-md-4 col-sm-6 col-xs-12 text-left">
                  <h3  class="uppercase">Copyright</h3>
                  <span class="line-sep-gray"></span>
                  <p>
                      2015-2016 IDCC All right reserved.
                    
                  </p>-->
                 
                  <!-- /Newsletter Registration Form -->
 </aside>
               <aside class="col-md-4 col-sm-6 col-xs-12">
                   <!--<h3  class="uppercase">Designed by</h3>
                  <span class="line-sep-gray"></span>-->
                  <!-- address --><br><br>

                 <p> Designed by, <br><a target="_blank" href="http://adaptiz.com/">Adaptiz Tech Studios</a></p>
                  <!-- /address -->
                </aside>
</aside>
                <aside class="col-md-4 col-sm-6 col-xs-12 text-left">
                  <!-- Copyright Informations -->
                 <br><ul class="social">

                    <li><a href="#" class="icon-xl iline3-facebook27"></a></li>

                    <li><a href="#" class="icon-xl iline3-twitter19"></a></li>

                  </ul>
              </div>
                
               
              <!-- /.row -->
              <div class="row">
                <div class="col-md-12 text-center mar-top-sm">
                  <!-- .social -->
              
                  <!-- /.social -->
                </div>
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container -->
        <!-- FOOTER CONTENT -->
      </footer>
      <!-- FOOTER END -->
    </div>
    <!-- MAIN CONTAINER END -->
<!-- Back to top -->
     <div id="back-to-top" class="back-to-top">
       <a href="#" class="icon iline2-thin16 no-margin"></a>
     </div>
     <!-- Back to top end -->


    <!-- Plugins JS -->
    <script src="assets/js/libs/jquery-1.11.2.min.js"></script>
    <script src="assets/js/libs/jqBootstrapValidation.js"></script>
    <script src="assets/js/libs/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js/libs/imagesloaded.js"></script>
    <script src="assets/js/libs/jquery.magnific-popup.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/libs/isotope.pkgd.min.js"></script>
    <script src="assets/js/libs/ParallaxScrolling.js"></script>
    <script src="assets/js/libs/jquery.mailchimp.js"></script>
    <script src="assets/js/libs/wow.min.js"></script>
    <script src="assets/js/libs/jquery.fittext.js"></script>
    <script src="assets/js/libs/jquery.lettering.js"></script>
    <script src="assets/js/libs/jquery.textillate.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
      <script type="text/javascript">
            var counter = 1;
            $(function(){
             $('p#add_field').click(function(){
             counter += 1;
             $('#container').append(
            '<table class="table"><tr><td style="width: 50%"><input id="field_' + counter + '" name="Passengersname[]' + '" type="text" class="form-control" placeholder="Name" value="-"/>'
             + '</td><td><input id="holidayreason_' + counter + '" name="Passengersqid[]' + '" type="text" class="form-control" placeholder="QID" value="-" /></td></tr></table>'
              );

             });
            });
            </script>
            <style>.red-star {
    color: red;
}</style>
<link rel="stylesheet" href="datepickerjs/jquery-ui.css">
  <script src="datepickerjs/jquery-1.10.2.js"></script>
  <script src="datepickerjs/jquery-ui.js"></script>
 <script>
function formtypes(str) {
    if(str=='Letters')
    {
  window.location.href = 'letter.php';
  } 
}
 </script>

  <script>
  $(function() {
    $( "#datepicker" ).datepicker({ minDate: 0});
  });
  </script>
  
  
  </body>
</html>