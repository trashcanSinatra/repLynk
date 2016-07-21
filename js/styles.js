$( document ).on( "pageinit", function( event ) {

   var searchInput = $('#addressBook');

   $('#toggleCompany').mousedown(function() {

      var color = $(this).css("background-color");
      var person = $('#togglePerson');

      if(color == 'rgb(210, 224, 24)') {

         return false;

      } else {

         $(this).css({

            "background-color" : "rgb(210, 224, 24)",
            "color" : "#49240a",
            "border-color" : "rgb(210, 224, 24)",
            "border-width" : "2px",
            "box-shadow" : "3px 3px grey"

         });
         person.css({

            "background-color" : "white",
            "color" : "#FE8B05",
            "border-color" : "rgb(210, 224, 24)",
            "border-width" : "1px",
            "box-shadow" : "3px 3px 3px grey"
         });

         searchInput.attr('placeholder', 'Search Companies...');

         // Define api search parameters for main page.
         requestParam = 'company/names';
      }
   });


   $('#togglePerson').mousedown(function() {

      var color = $(this).css("background-color");
      var company = $('#toggleCompany');

      if(color == 'rgb(210, 224, 24)') {

         return false;

      } else {

         $(this).css({
            "background-color" : "rgb(210, 224, 24)",
            "color" : "#49240a",
            "border-color" : "rgb(210, 224, 24)",
            "border-width" : "2px",
            "box-shadow" : "3px 3px grey"
         });
         company.css({
            "background-color" : "white",
            "color" : "#FE8B05",
            "border-color" : "rgb(210, 224, 24)",
            "border-width" : "1px",
            "box-shadow" : "3px 3px 3px grey"
         });

         searchInput.attr('placeholder', 'Search Contacts...');

         // Define api search parameters for main page.
         requestParam = 'contacts';
      }
   });
});
