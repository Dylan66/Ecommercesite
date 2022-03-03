$(document).ready(function() {
	function checkEmail(){
      // $("#loaderIcon").show();
      jQuery.ajax({
        url: 'Auth/check_comp_email.php',
        type: 'POST',
        data:'email='+$("#comp_email").val(),
        type: "POST",
        success:function(data){
          $("#company-availability-status").html(data);
          // $("#loaderIcon").hide();
        },
        error:function (){}
        });
      
    }
    function checkUserEmail(){
      // $("#loaderIcon").show();
      jQuery.ajax({
        url: 'Auth/check_user_email.php',
        type: 'POST',
        data:'email='+$("#user_email").val(),
        type: "POST",
        success:function(data){
          $("#user-availability-status").html(data);
          // $("#loaderIcon").hide();
        },
        error:function (){}
        });
      
    }
});