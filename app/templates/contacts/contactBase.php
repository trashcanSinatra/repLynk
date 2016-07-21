{% include 'layout/header.php' %}
{% include 'layout/sidebar.php' %}
{% include 'layout/topbar.php' %}
{% include 'layout/appNav.php' %}

<div id="contactsApp">
   <div id="search">
    <div id="filterToggle">
      <button id="toggleCompany" class="toggleBtns" >
      <i class="fa fa-industry"></i>
       </button>

      <button id="togglePerson" class="toggleBtns">
      <i class="fa fa-users"></i>
       </button>
    </div>

    <div id="mainSearch">
    <input id="addressBook" type="text" placeholder="Search Contacts..." />
    </div>

    <div id="results">

    </div>
  </div>

  <div id="add_contact" style="display: none">
     <p>{{ current_url }}</p>
  </div>
  <div id="edit_contact" style="display: none">
      <div class="container">
         <div class="row">
            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
            <label for="tags">Enter Contact:</label>
            <input id="tags" placeholder="Search Contacts..." />
            <label for="first_name">First Name:</label>
            <input id="first_name" placeholder="First Name..." />
            <label for="last_name">Last Name:</label>
            <input id="last_name" placeholder="Last Name..." />
            <label for="edit_phone">Phone Number:</label>
            <input id="edit_phone" placeholder="Phone Number..." />
            </div>
            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
               <label for="edit_email">Email:</label>
               <input id="edit_email" placeholder="Email Address..." />
               <label for="edit_company">Company:</label>
               <input id="edit_company" placeholder="Company..." />
               <label for="edit_cust_type">Customer Type:</label>
               <select id="edit_cust_type">
               </select>
               <div id="edit_contact_btn_div">
                  <button id="edit_cust_submit" class="btn btn-success" type="button">Edit Contact</button>
                  <button id="edit_cust_delete" class="btn btn-danger" type="button">Delete Contact</button>
               </div>
          </div>
         </div>
      </div>
 </div>
  <div id="add_company" style="display: none"></div>
  <div id="edit_company" style="display: none"></div>
</div>

{% include 'layout/footer.php' %}
