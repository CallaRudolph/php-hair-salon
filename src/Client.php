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

        function save()
        {
            $executed = $GLOBALS['DB']->exec("INSERT INTO clients (client_name, phone_number) VALUES ('{$this->getClientName()}', '{$this->getPhoneNumber()}')");
            if ($executed) {
                $this->id = $GLOBALS['DB']->lastInsertId();
                return true;
            } else {
                return false;
            }
        }

        function getId()
        {
            return $this->id;
        }

        static function getAll()
        {
            $returned_clients = $GLOBALS['DB']->query("SELECT * FROM clients;");
            $clients = array();
            foreach($returned_clients as $client) {
                $client_name = $client['client_name'];
                $phone_number = $client['phone_number'];
                $client_id = $client['id'];
                $new_client = new Client($client_name, $phone_number, $client_id);
                array_push($clients, $new_client);
            }
            return $clients;
        }

        static function deleteAll()
        {
            $executed = $GLOBALS['DB']->exec("DELETE FROM clients;");
            if ($executed) {
                return true;
            } else {
                return false;
            }
        }
    }

?>
