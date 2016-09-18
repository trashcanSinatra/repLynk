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

   function update_contact(id, callback) {
      $.ajax({
         url: requestUrl + "contact/" + id,
         type: 'PUT',
         contentType: 'application/json',
         success: function(result) {
             callback(result);
         }
     });
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
   },

   get_contact : function(fullName) {

      var firstName = fullName.split(" ")[0];
      var lastName = fullName.split(" ")[1];

      get_contact_byName(firstName, lastName,
                        templates.editContactFormFiller);
   },

   edit_contact : function() {
      $('#edit_cust_submit').on('click', function() {
         contact_id = $("#edit_contact_id").val();
         console.log(contact_id);
         update_contact(contact_id, templates.contact_update_form_reset);
      });
   }

  };

  return publicAPI;

})();
