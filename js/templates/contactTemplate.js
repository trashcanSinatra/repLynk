var templateManager = (function() {

  // Private Props
  var contact_results = [];
  // Private Methods

  function clear_form(form_id) {
     form_id.find('input').each(function() {
        this.value = "";
     });
  }

  function phoneSwap(dataVal) {
    width = $( window ).width();
    var html = "";

    if(width >= 600) {
       html += "<p id=\"phoneText\">" + dataVal + "</p>";
    } else {
       html += "<a href=\"tel:" + dataVal + "\">";
       html += "<i class=\"fa fa-phone-square phoneIcon\"></i>";
       html += "</a>";
    }
    return html;
  }

  // PUBLIC API

  var templates = {

    displayContacts : function(data) {
      var results = $('#results');
      if(data.length >= 1) {
         // Reset results div.
         results.html("");
            $.each(data, function(i, val) {
               var list = "<div class=\"resultLine\">";
                   list += "<div id=\"floatLeftCompany\">";
                   list += "<a class=\"hvr-shrink\" id=\"linkFix\" href=\"mailto:" + val['email'] + "\">"
                   list += val['first_name'] + " ";
                   list += val['last_name'];
                   list += "</a>" + "<br />";
                   list += "<span class=\"biz_span\">" + val['biz_name'].toUpperCase() + "</span>";
                   list += "</div>";
                   list += "<div class=\"floatRight\">";
                   list += phoneSwap(val['phone']);
                   list += "</div>";
                   list += "<div class=\"clear\"></div>";
                   list += "</div>";
               results.append(list);
            });
       } else {
         results.html("");
         results.append("<p id=\"noMatch\">No Matches...</p>");
       }
      },

   displayCompanies : function(data) {
      var results = $('#results');
      if(data.length >= 1) {
         // Reset results div.
         results.html("");
         var maps = "http://maps.google.com/maps?q=";
            $.each(data, function(i, val) {
               var list = "<div class=\"resultLine\" style=\"height:60px;\">";
                   list += "<div id=\"floatLeftCompany\">";
                   list += "<a class=\"hvr-shrink\" id=\"linkFix\" href=\"";
                   list += maps + val['address'] + val['city'] + val['state'] + val['zip'];
                   list += "\">"
                   list += val['biz_name'];
                   list += "</a>" + "<br />";
                   list += "<span>" + val['city'].toUpperCase() + "</span>";
                   list += "</div>";
                   list += "<div class=\"floatRight\">";
                   list +=  phoneSwap(val['phone']);
                   list += "</div>";
                   list += "<div class=\"clear\"></div>";
                   list += "</div>";
               results.append(list);
            });
       } else {
         results.html("");
         results.append("<p id=\"noMatch\">No Matches...</p>");
       }
   },

   fillContactDropdown : function(data) {
      contact_results = [];
      $.each(data, function(i, val) {
         contact_results.push(val['first_name'] + ' ' + val['last_name']);
      });

      $( "#tags" ).autocomplete({
        delay: 0,
        minLength: 1,
        source: contact_results
      });
   },

   editContactFormFiller : function(data) {
      inputs = {
         contact_id: $('#edit_contact_id'),
         first_name: $("#edit_first_name"),
         last_name: $("#edit_last_name"),
         phone: $("#edit_phone"),
         email: $("#edit_email")
      };

      $.each(data, function(i, val) {
         inputs.contact_id.val(val["id"]);
         inputs.first_name.val(val['first_name']);
         inputs.last_name.val(val['last_name']);
         inputs.phone.val(val['phone']);
         inputs.email.val(val['email']);
      });
   },

   contact_update_form_reset : function(result) {
      if(result == 1) {
         clear_form($('#contact_update_form'));
      } else {
         alert(result);
      }
   }
  };

  return templates;

})();
