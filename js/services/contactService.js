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

   function update_contact(id, data, callback) {
      $.ajax({
         url: requestUrl + "contact/" + id,
         type: 'PUT',
         data: JSON.stringify(data),
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
          
         var contact_id = $("#edit_contact_id").val();
         var inputs = {
             first_name: $("#edit_first_name").val(),
             last_name: $("#edit_last_name").val(),
             phone: $("#edit_phone").val(),
             email: $("#edit_email").val()
         };
                
         update_contact(contact_id, inputs, templates.contact_update_form_reset);
          
      });
   }

  };

  return publicAPI;

})();
