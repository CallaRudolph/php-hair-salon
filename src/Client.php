<?php
    class Client
    {
        private $client_name;
        private $phone_number;
        private $id;

        function __construct($client_name, $phone_number, $id = null)
        {
            $this->client_name = $client_name;
            $this->phone_number = $phone_number;
            $this->id = $id;
        }

        function setClientName($new_client_name)
        {
            $this->client_name = (string) $new_client_name;
        }

        function getClientName()
        {
            return $this->client_name;
        }

        function setPhoneNumber($new_phone_number)
        {
            $this->phone_number = (string) $new_phone_number;
        }

        function getPhoneNumber()
        {
            return $this->phone_number;
        }
    }

?>
