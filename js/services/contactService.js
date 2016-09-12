var contactService = (function() {

  //PRIVATE MEMBERS
  window.requestParam = 'contacts';
  // Must be relative to callpoint from url string in main app.
  var requestUrl = '../api/index.php/';
  var templates = templateManager;


  // PRIVATE METHODS
  function contacts_like(partial, callback) {
    return $.getJSON(requestUrl + 'like/contacts/' + partial, callback);
  }

  function companies_like(partial, callback) {
     $.getJSON(requestUrl + 'like/company/' + partial, callback);
   }

   function get_contact_byName(first, last, callback) {
      $.getJSON(requestUrl + 'contact/name/' + first + "/" + last, callback);
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

   edit_contact_dropdown : function() {
      // Retrieves contacts based on value in "Enter Contact" box.
         lookup = $('#tags').val();
         if(lookup) {
          contacts_like(lookup, templates.fillContactDropdown);
         }
      // Create an array with the name in the #tags field.  Perform
      // a GET request for the contact matching first and last name.
      // $('#tags').on('blur', function() {
      //   var fullname = $('#tags').val().split(" ");
      //   alert(fullname[0] + " " + fullname[1]);
      // });
   },

   get_contact : function(fullName) {

      var firstName = fullName.split(" ")[0];
      var lastName = fullName.split(" ")[1];

      get_contact_byName(firstName, lastName,
                        templates.editContactFormFiller);
   }

  };

  return publicAPI;

})();
