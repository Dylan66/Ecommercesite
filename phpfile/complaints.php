<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
    {   
header('location:login.php');
}
else{
if(isset($_GET['action']) && $_GET['action']=="add"){
  $id=intval($_GET['id']);
  if(isset($_SESSION['cart'][$id])){
    $_SESSION['cart'][$id]['quantity']++;
  }else{
    $sql_p="SELECT * FROM products WHERE id={$id}";
    $query_p=mysqli_query($con,$sql_p);
    if(mysqli_num_rows($query_p)!=0){
      $row_p=mysqli_fetch_array($query_p);
      $_SESSION['cart'][$row_p['id']]=array("quantity" => 1, "price" => $row_p['productPrice']);
    
    }else{
      $message="Product ID is invalid";
    }
  }
    echo "<script>alert('Product has been added to the cart')</script>";
    echo "<script type='text/javascript'> document.location ='my-cart.php'; </script>";
}


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
      <meta name="keywords" content="MediaCenter, Template, eCommerce">
      <meta name="robots" content="all">

      <title>Shopping Portal | Complaints Section</title>
     
      <!-- Bootstrap Core CSS -->
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      
      <!-- Customizable CSS -->
      <link rel="stylesheet" href="assets/css/main.css">
      <link rel="stylesheet" href="assets/css/green.css">
      <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/owl.transitions.css">
    <!--<link rel="stylesheet" href="assets/css/owl.theme.css">-->
    <link href="assets/css/lightbox.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/rateit.css">
    <link rel="stylesheet" href="assets/css/bootstrap-select.min.css">

    <!-- Demo Purpose Only. Should be removed in production -->
    <link rel="stylesheet" href="assets/css/config.css">

    <link href="assets/css/green.css" rel="alternate stylesheet" title="Green color">
    <link href="assets/css/blue.css" rel="alternate stylesheet" title="Blue color">
    <link href="assets/css/red.css" rel="alternate stylesheet" title="Red color">
    <link href="assets/css/orange.css" rel="alternate stylesheet" title="Orange color">
    <link href="assets/css/dark-green.css" rel="alternate stylesheet" title="Darkgreen color">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

  </head>
    <body class="cnt-home">
  
    
  
    <!-- ============================================== HEADER ============================================== -->
<header class="header-style-1">
<?php include('includes/top-header.php');?>
<?php include('includes/main-header.php');?>
<?php include('includes/menu-bar.php');?>
</header>

<!-- ============================================== HEADER : END ============================================== -->
<div class="body-content outer-top-xs" id="top-banner-and-menu">
  <div class="container">
    <div class="furniture-container homepage-container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-3 sidebar">
          <!-- ================================== TOP NAVIGATION ================================== -->
          <?php include('includes/side-menu.php');?>
          <!-- ================================== TOP NAVIGATION : END ================================== -->
        </div><!-- /.sidemenu-holder -->  
        
        <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
          <!-- ========================================== SECTION – HERO ========================================= -->
        
          <div id="hero" class="homepage-slider3">
            <h4 class="text" style="color: royalblue; text-transform: uppercase;"><i class="fa fa-pencil"></i> Raise Complaints</h4>
            <form class="complaints_form outer-top-xs" method="POST">
              <div class="form-group">
                  <label class="info-title" for="exampleInputEmail1">Email Address <span class="text-danger">*</span></label>
                  <input type="email" name="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" value="<?php echo($_SESSION['login']) ?>" readonly required>
              </div>
                <div class="form-group">
                  <label class="info-title" for="exampleInputPassword1">Message <span class="text-danger">*</span></label>
               
                  <textarea name="msg" class="form-control" placeholder="Type your Complaints here" required></textarea>
                </div>
                <button type="submit" class="btn-upper btn btn-primary checkout-page-button" name="login"><i class="fa fa-paper-plane"></i> Send Complaint</button>
            </form>

          </div>
        </div>
      

      </div><!-- /.homebanner-holder -->
      
    </div><!-- /.row -->    

<?php include('includes/brands-slider.php');?>
</div>
</div>
<?php include('includes/footer.php');?>
  
  <script src="assets/js/jquery-1.11.1.min.js"></script>
  
  <script src="assets/js/bootstrap.min.js"></script>
  
  <script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
  <script src="assets/js/owl.carousel.min.js"></script>
  
  <script src="assets/js/echo.min.js"></script>
  <script src="assets/js/jquery.easing-1.3.min.js"></script>
  <script src="assets/js/bootstrap-slider.min.js"></script>
    <script src="assets/js/jquery.rateit.min.js"></script>
    <script type="text/javascript" src="assets/js/lightbox.min.js"></script>
    <script src="assets/js/bootstrap-select.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
  <script src="assets/js/scripts.js"></script>

  <!-- For demo purposes – can be removed on production -->
  
  <script src="switchstylesheet/switchstylesheet.js"></script>
  
  <script>
    $(document).ready(function(){ 
      $(".changecolor").switchstylesheet( { seperator:"color"} );
      $('.show-theme-options').click(function(){
        $(this).parent().toggleClass('open');
        return false;
      });
    });

    $(window).bind("load", function() {
       $('.show-theme-options').delay(2000).trigger('click');
    });
    //submit form
    $(".complaints_form").submit(function (e) {
      e.preventDefault();
      form = $(this).serialize();
      // alert(form);
      $.ajax({
        url:"db-oper/send_complaint.php",
        type:"POST",
        data:form,
        success:function(resp){
             console.log(resp);
             if (resp== "Thank you for your message. We shall get back to you as soon as possible") {
                  alert(resp);
                  setTimeout(function(){
                       location.reload();
             },1000);
             }
             else{
                  alert(resp);
                  // console.log(resp);
             }
        },
        error:function(){

        },
      });
    })
  </script>
  <!-- For demo purposes – can be removed on production : End -->

  

</body>
</html>
<?php } ?>