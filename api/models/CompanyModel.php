<?php

   class CompanyModel extends ModelBase {

   	public function get_company_names()
      {
   		$query = Pixie::table('companies')->
            select(array('id', 'biz_name', 'city'));

   		return $query->get();
   	}

      public function like_companies($stringPartial)
      {
         $companies = Pixie::table('companies')->
            where('biz_name', 'LIKE', "%$stringPartial%");

         return $companies->get();
      }
   }

 ?>
