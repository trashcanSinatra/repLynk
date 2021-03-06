<?php

require 'IService.php';


class ContactService implements IService {

  public static function handle_routes($app) {

    $app->get('/contacts',function () {
      $model = new ContactModel();
      $contacts = $model->get_contacts();
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

      $app->put('/contact/:id', function($id) use ($app) {
        $contact = json_decode($app->request()->getBody());
        $updateData = array(
           'first_name' => $contact->first_name,
           'last_name' => $contact->last_name,
           'phone' => $contact->phone,
           'email' => $contact->email
        );

        try {
           $model = new ContactModel();
           $model->update_contact($id, $updateData);
           echo 1;
        }
        catch(Exception $e) {
           echo "Contact could not be updated \n" . $e->getMessage();
        }

      });

      $app->get('/contact/name/:first/:last',
         function($firstname, $lastname) {
            $model = new ContactModel();
            $contact = $model->get_contact_by_fullname($firstname, $lastname);
            echo json_encode($contact);
         }
      );

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
