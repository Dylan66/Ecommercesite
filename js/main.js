$(document).ready(function(){
	$("#shipaddress_form").submit(function (e) {
      e.preventDefault();
      form = $(this).serialize();
      // alert(form);
      $.ajax({
      	url:"db-oper/ship_address.php",
        type:"POST",
        data:form,
        success:function(resp){
             console.log(resp);
             if (resp== "Shipping Address has been updated") {
                  alert(resp);
                  setTimeout(function(){
                       window.location = 'bill-ship-addresses.php';
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
    
});