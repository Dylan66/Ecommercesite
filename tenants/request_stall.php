
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['tlogin']) == 0)
	{	
header('location:../login.php');
}
else{
	


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tenant | Request Stall</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>

   <script>
function getSubcat(val) {
	$.ajax({
	type: "POST",
	url: "get_subcat.php",
	data:'cat_id='+val,
	success: function(data){
		$("#subcategory").html(data);
	}
	});
}
function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>	


</head>
<body>
	<?php include('include/header.php');?>

	<div class="wrapper">
		<div class="container">
			<div class="row">
				<?php include('include/sidebar.php');?>				
				<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>Request Stall</h3>
							</div>
							<div class="module-body">
									<form id="request_form">								
										<input type="hidden" name="tenant_ID"  value="<?php echo $_SESSION['tid']; ?>" class="span8 tip" required>
										
										<div class="control-group">
											<label class="control-label" for="basicinput">Purpose for Request</label>
											<div class="controls">
											<textarea  name="purpose"  placeholder="Explain why you would want to be granted a stall to the owner" rows="6" class="span8 tip" required></textarea>  
											</div>
										</div>

										<div class="control-group">
											<div class="controls">
						                    <input type="checkbox" value="accepted" required> By continuing you agree to the terms and conditions outlined <a href="#" data-toggle="modal" data-target="#terms_and_conditions">Read More</a></div>
						                  </div>

										<div class="control-group">
											<div class="controls">
												<button type="submit" name="submit" class="btn btn-primary">Make Request</button>
											</div>
										</div>
									</form>
									</div>
								</div>


	
						
						
				</div><!--/.content-->
			</div><!--/.span9-->
		</div>
	</div><!--/.container-->
</div><!--/.wrapper-->
<div class="modal fade" id="terms_and_conditions" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Terms & Conditions
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              	<span aria-hidden="true">&times;</span></button>
            </h5>
          </div>
          <div class="modal-body">
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. 
          </p>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-primary" data-dismiss="modal">I Agree</button>
          </div>
        </div>
      </div>
    </div>
<?php include('include/footer.php');?>

	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
	<script src="scripts/datatables/jquery.dataTables.js"></script>
	<script>
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
			
			$('.close_btn').click(function (e) {
				e.preventDefault();
				setTimeout(function(){
                  window.location = 'manage-users.php';
                },2000);
			});

			//submit form
		    $("#request_form").submit(function (e) {
		      e.preventDefault();
		      form = $(this).serialize();
		      // alert(form);
		      $.ajax({
		      	url:"../db-oper/request_stall.php",
		        type:"POST",
		        data:form,
		        success:function(resp){
		             // console.log(resp);
		             if (resp== "Your request has been sent") {
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
		    });
		} );
	</script>
</body>
<?php } ?>