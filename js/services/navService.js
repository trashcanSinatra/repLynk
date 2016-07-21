var navService = (function() {

   var elements = ['search', 'add_contact', 'edit_contact', 'add_company', 'edit_comapny'];

   var publicAPI = {}

      publicAPI.contactController = function() {
         $(document).on('click', '#contactsNav li', function() {
            $("#contactsNav li").removeClass("active");
            $(this).addClass("active");

            for(i=0; i < elements.length; i++) {
               if($(this).attr("name") != elements[i]) {;
                  $("#" + elements[i]).hide();
               }
               else {
                  showDiv = $('#' + elements[i]);
                  showDiv.show();
               }
            }

         });
       }

    return publicAPI;
})();
