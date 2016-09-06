// instantiate Services
var contacts = contactService;
var nav = navService;

$( document ).on( "pageinit", function( event ) {

   // Activate contact navigation controller. Controls
   // the tabs for the contact Application.
   nav.contactController();

   // Handles the quick search for the phone book
   $('#addressBook').on('keyup', function() {
       contacts.quick_search(this.value);
    });

   // Handles the edit contact dropdown box,
   // and fills form when user selects contact.
   contacts.edit_contact_form_handler('C');


});
