var contactService = (function() {

  //PRIVATE MEMBERS 
  window.requestParam = 'contacts';
  // Must be relative to callpoint from url string in main app.
  var requestUrl = '../api/index.php/';
  var templates = templateManager;


  // PRIVATE METHODS
  function contacts_like(partial, callback) {
    $.getJSON(requestUrl + 'like/contacts/' + partial, callback);
  }

  function companies_like(partial, callback) {
     $.getJSON(requestUrl + 'like/company/' + partial, callback);
   }


  // PUBLIC API
  var publicAPI = {

   quick_search : function(param) {
      if(requestParam === 'contacts') {
         contacts_like(param, templates.displayContacts);
      } else {
         companies_like(param, templates.displayCompanies);
      }
   },

   edit_contact_form_handler : function(param) {
      // Retrieves contacts based on value in "Enter Contact" box.
      contacts_like(param, templates.fillContactDropdown);

      // Create an array with the name in the #tags field.  Perform
      // a GET request for the contact matching first and last name.
      $('#tags').on('blur', function() {
        var lookup = $('#tags').val().split(" ");
        alert(lookup[0] + " " + lookup[1]);
      });
   }

  };

  return publicAPI;

})();
