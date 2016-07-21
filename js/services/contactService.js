var contactService = (function() {

  window.requestParam = 'contacts';
  // Must be relative to callpoint from url string in main app.
  var requestUrl = '../api/index.php/';
  var templates = templateManager;
  var contact_results = [];

  var publicAPI = {

   contacts_like : function(param) {
     $.getJSON(requestUrl + 'like/contacts/' + param ,
         templates.displayContacts);
   },

   companies_like : function(stringPartial) {
      $.getJSON(requestUrl + 'like/company/' + stringPartial,
         templates.displayCompanies);
   },

   quick_search : function(param) {
      if(requestParam === 'contacts') {
         publicAPI.contacts_like(param);
      } else {
         publicAPI.companies_like(param);
      }
   },

   edit_contact_box_fill : function(param) {
      $.getJSON(requestUrl + 'like/contacts/' + param,
         function(data) {
            $.each(data, function(i, val) {
               contact_results.push(val['first_name'] + ' ' + val['last_name']);
            });
            $( "#tags" ).autocomplete({
              source: contact_results
            });
         });
   }
  };

  return publicAPI;

})();
