<?php

    /**
     *
     */
    class Address
    {
        public $address_id;
        public $title;
        public $first_name;
        public $last_name;
        public $phone_num;
        public $address1;
        public $address2;
        public $address3;
        public $city_town;
        public $post_code;
        public $country;
        public $status;

        function __construct($address_id, $title, $first_name, $last_name, $phone_num, $address1, $address2, $address3, $city_town, $post_code, $country, $status)
        {
            $this->address_id = $address_id;
            $this->title = $title;
            $this->first_name = $first_name;
            $this->last_name = $last_name;
            $this->phone_num = $phone_num;
            $this->address1 = $address1;
            $this->address2 = $address2;
            $this->address3 = $address3;
            $this->city_town = $city_town;
            $this->post_code = $post_code;
            $this->country = $country;
            $this->status = $status;
        }

        public function fullname()
        {
            return $this->title.' '.$this->first_name .' '.$this->last_name;
        }
    }

    /**
     *
     */
    class ShippingAddress
    {
        public $name;
        public $phone;
        public $street1;
        public $street2;
        public $city;
        public $zip;
        public $country;

        function __construct($full_name, $phone_num, $street1, $street2, $city, $zip, $country)
        {
            $this->name = $name;
            $this->phone = $phone;
            $this->street1 = $street1;
            $this->street2 = $street2;
            $this->city = $city;
            $this->zip = $zip;
            $this->country = $country;
        }
    }



 ?>
