<?php
require 'IService.php';


class ContactService implements IService {

  public static function handle_routes($app) {

    $app->get('/contacts',function () {
      $model = new ContactModel();
      $contacts = (!$type) ? $model->get_contacts() : $model->get_contacts($type);
      echo json_encode($contacts);
     });

     $app->get('/contacts/:type', function ($type) {
        $model = new ContactModel();
        $contacts = (!$type) ? $model->get_contacts() : $model->get_contacts($type);
        echo json_encode($contacts);
     });

     $app->get('/contact/:id', function($id) {
        $model = new ContactModel();
        $contact = $model->get_contact($id);
        echo json_encode($contact);
      });

      $app->get('/like/contacts/:param', function($param) {
         $model = new ContactModel();
         $contacts = $model->like_contacts($param);
         echo json_encode($contacts);
      });

     $app->get('/like/company/:param', function($param) {
        $model = new CompanyModel();
        $companies = $model->like_companies($param);
        echo json_encode($companies);
     });


  }  // END: Function handle_routes()

}  // END: Class
?>
