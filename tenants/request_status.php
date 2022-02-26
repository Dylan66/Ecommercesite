
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['tlogin'])==0)
	{	
header('location:../login.php');
}
else{
// date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );

if(isset($_GET['del']))
{
    mysqli_query($con,"DELETE from products where id = '".$_GET['id']."'");
    $_SESSION['delmsg']="Product deleted !!";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tenant | Application status</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
</head>
<body>
<?php include('include/header.php');?>

	<div class="wrapper">
		<div class="container-fluid">
			<div class="row">
<?php include('include/sidebar.php');?>				
			<div class="span9">
					<div class="content">
    
	<div class="module">
							<div class="module-head">
								<h3>Request Status</h3>
							</div>
							<div class="module-body table">
								<?php if(isset($_GET['del']))
								{?>
								<div class="alert alert-error">
									<button type="button" class="close close_btn" data-dismiss="alert">×</button>
								<strong>Oh snap!</strong> 	<?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
								</div>
								<?php } ?>

								<br />

							
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
									
									<?php 
										$myProducts = $_SESSION['tid'];
										
										$query = mysqli_query($con,"SELECT * from stalls WHERE tenant_ID = '$myProducts'");
										if ($query->num_rows) 
										{
										?>
											<thead>
												<tr>
													<th>Date</th>
													<th>Purpose</th>
													<th>Status</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
											<?php 
											while($row=mysqli_fetch_array($query))
											{
											?>									
											<tr>
												<td><?php echo htmlentities(date("F j, Y h:m:s a", strtotime($row["created"])));?></td>
												<td><?php echo htmlentities($row['purpose']);?></td>
												<?php if ($row['status'] == 0): ?>
													<td><b style="color: teal">Pending</b></td>
													<td><a class="cancel_btn" id="<?php echo $row['stall_id']?>" onClick="return confirm('Are you sure you want to reject this request?')"><i class="icon-remove-sign"></i></a></td>
												<?php endif ?>
												<?php if ($row['status'] == 1): ?>
													<td><b style="color: green">Approved</b></td>
													<td><i class="icon-check"></i></td>
												<?php endif ?>
												<?php if ($row['status'] == 2): ?>
													<td><b style="color: orange">Cancelled</b></td>
													<td><i class="icon-check"></i></td>
												<?php endif ?>
												<?php if ($row['status'] == 3): ?>
													<td><b style="color: red">Rejected</b></td>
													<td><i class="icon-check"></i></td>
												<?php endif ?>
											</tr>
											<?php  
											} 
										}
										else{
											echo "<p class='text-info lead align-center'>No records in database. Add new products</p>";
											$myProducts = $_SESSION['tid'];
											echo $myProducts;
										}
										?>
										
										
								</table>
							</div>
						</div>						
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

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
                  window.location = 'manage-products.php';
                },2000);
			});

			$(".cancel_btn").click(function (e) {
		      e.preventDefault();
		      cancel_id = $(this).attr("id");
		      // alert(cancel_id);
		      $.ajax({
		      	url:"../db-oper/cancel_stall.php",
		        type:"GET",
		        data:{cancel_id:cancel_id},
		        success:function(resp){
		             // console.log(resp);
		             if (resp== "Request cancelled") {
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