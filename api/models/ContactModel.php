<?php
   class ContactModel extends ModelBase {


      public function get_contacts($type = false)
      {
         $query = (!$type) ?
         Pixie::table('contacts')->select('*') :
         Pixie::table('contacts')->where('company_type',strtoupper($type));

         return $query->get();
      }


      public function get_contact($id)
      {
        $contact = Pixie::table('contacts')->where('id', $id);
        return $contact->get();
      }


      public function like_contacts($param)
      {
        $selectList = array('contacts.id', 'contacts.first_name',
            'contacts.last_name', 'contacts.email', 'contacts.phone',
            'companies.biz_name');

        $contacts = Pixie::table('contacts')
            ->select($selectList)
            ->where('lookup', 'LIKE', "%$param%")
            ->join('companies', 'companies.id', '=', 'company_id');

        return $contacts->get();
      }

   }
 ?>
