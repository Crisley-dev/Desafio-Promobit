jQuery(function(){

//Set the action to view or not de password on login screen
    jQuery(".toggle-password").click(function() {
        jQuery(this).toggleClass("fa-eye fa-eye-slash");
        var input = jQuery(jQuery(this).attr("toggle"));
        if (input.attr("type") == "password") {
          input.attr("type", "text");
        } else {
          input.attr("type", "password");
        }
      });
      

      //apply the red border when the login error message exist on page

      if(jQuery('.zoom-in-zoom-out').length){
          jQuery('input').css({
            "border-color":"#ee2930"
          });
      }

})