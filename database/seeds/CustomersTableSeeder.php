<?php
use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{

public function run()
{
    DB::table('customer')->delete();
    Customer::create(array(
        'cust_id'     => '1',
        'company_name'     => 'AWcode',
        'registered_name' => 'AWcode Co Ltd',
        'company_email'    => 'm@awcode.com',
        'cat_id'    => '1',
        'cust_status'    => '1'
    ));
    
    DB::table('contact')->delete();
    Contact::create(array(
        'contact_id'     => '1',
        'cust_id'     => '1',
        'firstname' => 'Mark',
        'surname'    => 'Walker',
        'phone'    => '',
        'mobile'    => '0815884380',
        'email'    => 'm@awcode.com',
        'position'    => 'founder'
    ));

    DB::table('category')->delete();
    Category::create(array(
        'cat_id'     => '1',
        'cat_name' => 'Information Technology'
    ));

    DB::table('address')->delete();
    Address::create(array(
        'address_id'     => '1',
        'cust_id'     => '1',
        'address_type' => '1',
        'address1'    => '244/127-128 Moo 6',
        'address2'    => 'Soi 16 Pornpranimit Road',
        'address3'    => 'Nongprue',
        'address_city'    => 'Banglamung',
        'address_province'    => 'Chonburi',
        'address_postcode'    => '20150',
        'country_id'    => '244/127-128 Moo 6',
    ));
    
    DB::table('country')->delete();
  	$file = fopen(__DIR__."/countries.csv","r");
	while(! feof($file)){
		$line = fgetcsv($file);
		if($line[0] !=""){
			Country::create(array(
				'iso_code2'     => $line[1],
				'iso_code3' => $line[2],
				'un_num'    => $line[3],
				'tel'    => $line[4],
				'country' => $line[0],
			));
		}
	}

	fclose($file);
   
}

}
